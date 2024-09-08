<?php

namespace App\Http\Controllers\Developer;

use App\Enums\ControllerNames;
use App\Enums\ActionMethods;
use App\Enums\NotificationMethods;
use App\Http\Controllers\Controller;
use App\Http\Requests\School\StoreSchoolRequest;
use App\Http\Requests\School\UpdateSchoolRequest;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $schools = School::query();

        if ($request->has('simple-search')) {
            $input = $request->input('simple-search');
            $schools->whereAny([
                'abbreviation',
                'name',
                'director_matricula'
            ], 'like', $input . '%');
        }

        if ($request->has('hiddenSchoolDeactivated') && $request->input('hiddenSchoolDeactivated') == 1) {
            $schools->onlyTrashed();
        }

        $schools = $schools->orderBy('id')->paginate(
            $request->has('perpage') ? $request->input('perpage') : 10,
            ['abbreviation', 'name', 'director_matricula', 'color', 'deleted_at']
        )->withQueryString();

        return view('Pages.Developer.School.List.listSchools', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $candidates = User::whereIn('role', ['DIR'])->get();
        return view('Pages.Developer.School.Create.createSchool', compact('candidates', 'candidates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolRequest $request)
    {
        School::create($request->validated());

        $this->notifyDevelopers(ControllerNames::School, $request->validated('abbreviation'), NotificationMethods::Stored);

        /**
         * Send user back to the correspondent list page
         */
        return redirect()->route('developer.schools.listSchools')->with('Success', $this->actionMessages(ControllerNames::School, $request->validated('abbreviation'), ActionMethods::Stored));
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        return view('Pages.Developer.School.Show.showSchool', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        $candidates = User::whereIn('role', ['DIR'])->get();

        return view('Pages.Developer.School.Edit.editSchool', compact('school', 'candidates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {
        $school->update($request->validated());

        $this->notifyDevelopers(ControllerNames::School, $school->abbreviation, NotificationMethods::Updated);

        return redirect()->route('developer.schools.show', $school)->with('Success', $this->actionMessages(ControllerNames::School, $school->abbreviation, ActionMethods::Updated));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $school->delete();

        $this->notifyDevelopers(ControllerNames::School, $school->abbreviation, NotificationMethods::Destroyed);

        return redirect()->route('developer.schools.index')->with('Success', $this->actionMessages(ControllerNames::School, $school->abbreviation, ActionMethods::Destroyed));
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(School $school)
    {
        $school->restore();

        $this->notifyDevelopers(ControllerNames::School, $school->abbreviation, NotificationMethods::Restored);

        return redirect()->route('developer.schools.index')->with('Success', $this->actionMessages(ControllerNames::School, $school->abbreviation, ActionMethods::Restored));
    }
}
