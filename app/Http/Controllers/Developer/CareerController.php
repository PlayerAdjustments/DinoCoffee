<?php

namespace App\Http\Controllers\Developer;

use App\Enums\ControllerNames;
use App\Enums\ActionMethods;
use App\Enums\NotificationMethods;
use App\Http\Controllers\Controller;
use App\Http\Requests\Career\StoreCareerRequest;
use App\Http\Requests\Career\UpdateCareerRequest;
use App\Models\Career;
use App\Models\CareerCode;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $careers = Career::query();

        if ($request->has('simple-search')) {
            $input = $request->input('simple-search');
            $careers->whereAny([
                'abbreviation',
                'name',
                'coordinador_matricula',
                'school_abbreviation'
            ], 'like', $input . '%');
        }

        if ($request->has('hiddenCareerDeactivated') && $request->input('hiddenCareerDeactivated') == 1) {
            $careers->onlyTrashed();
        }

        $careers = $careers->orderBy('school_abbreviation')->paginate(
            $request->has('perpage') ? $request->input('perpage') : 10,
            ['abbreviation', 'name', 'coordinador_matricula', 'school_abbreviation', 'color', 'deleted_at']
        )->withQueryString();

        return view('Pages.Developer.Career.list', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::with('principal')->get(['abbreviation', 'name', 'director_matricula']);
        $candidates = User::whereIn('role', ['COO'])->get();
        return view('Pages.Developer.Career.Create', compact('candidates', 'schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCareerRequest $request)
    {
        Career::create($request->validated());

        $this->notifyDevelopers(ControllerNames::Career, $request->validated('abbreviation'), NotificationMethods::Stored);

        /**
         * Send user back to the correspondent list page
         */
        return redirect()->route('developer.careers.index')->with('Success', $this->actionMessages(ControllerNames::Career, $request->validated('abbreviation'), ActionMethods::Stored));
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        $career_codesObj = CareerCode::where('career_abbreviation', $career->abbreviation)->get(['id', 'code', 'deleted_at']);

        return view('Pages.Developer.Career.show', compact('career', 'career_codesObj'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        $schools = School::query()->get(['abbreviation', 'name', 'director_matricula']);
        $candidates = User::whereIn('role', ['COO'])->get();

        return view('Pages.Developer.Career.edit', compact('career', 'candidates', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCareerRequest $request, Career $career)
    {
        $career->update($request->validated());

        /**
         * Update career_codes joined value.
         */
        $career_codes = CareerCode::where('career_abbreviation', $career->abbreviation)->withTrashed()->get();
        foreach ($career_codes as $code) {
            CareerCode::where('joined', $code->joined)->update(['joined' => $code->career_abbreviation . '-' . $code->code]);
        }

        $this->notifyDevelopers(ControllerNames::Career, $career->abbreviation, NotificationMethods::Updated);

        return redirect()->route('developer.careers.show', $career)->with('Success', $this->actionMessages(ControllerNames::Career, $career->abbreviation, ActionMethods::Updated));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        $career->delete();

        $this->notifyDevelopers(ControllerNames::Career, $career->abbreviation, NotificationMethods::Destroyed);

        return redirect()->route('developer.careers.index')->with('Success', $this->actionMessages(ControllerNames::Career, $career->abbreviation, ActionMethods::Destroyed));
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(Career $career)
    {
        $career->restore();

        $this->notifyDevelopers(ControllerNames::Career, $career->abbreviation, NotificationMethods::Restored);

        return redirect()->route('developer.careers.index')->with('Success', $this->actionMessages(ControllerNames::Career, $career->abbreviation, ActionMethods::Restored));
    }
}
