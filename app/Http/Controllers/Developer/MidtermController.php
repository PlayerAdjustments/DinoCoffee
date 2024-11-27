<?php

namespace App\Http\Controllers\Developer;

use App\Enums\ControllerNames;
use App\Enums\ActionMethods;
use App\Enums\NotificationMethods;
use App\Http\Controllers\Controller;
use App\Http\Requests\Midterm\StoreMidtermRequest;
use App\Http\Requests\Midterm\UpdateMidtermRequest;
use App\Models\Midterm;
use Illuminate\Http\Request;

class MidtermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $midterms = Midterm::query();

        if ($request->has('simple-search')){
            $input = $request->input('simple-search');
            $midterms->whereAny([
                'midtermCode',
                'abbreviation',
                'fullName'
            ], 'like', $input . '%');
        }

        if ($request->has('hiddenMidtermDeactivated') && $request->input('hiddenMidtermDeactivated') == 1) {
            $midterms->onlyTrashed();
        }

        $midterms = $midterms->orderBy('id')->paginate(
        $request->has('perage') ? $request->input('perage') : 10,
        ['midtermCode', 'abbreviation', 'fullName', 'startDate', 'endDate', 'deleted_at']
        )->withQueryString();

        return view('Pages.Developer.Midterm.list', compact('midterms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMidtermRequest $request)
    {
        Midterm::create($request->validated());

        $this->notifyDevelopers(ControllerNames::Midterm, $request->validated('midtermCode'), NotificationMethods::Stored);

        return redirect()->route('developer.midterm.index')->with('Success', $this->actionMessages(ControllerNames::Midterm, $request->validated('midtermCode'), ActionMethods::Stored));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMidtermRequest $request, Midterm $midterm)
    {
        $midterm->update($request->validated());

        $this->notifyDevelopers(ControllerNames::Midterm, $midterm->midtermCode, NotificationMethods::Updated);

        return redirect()->route('developer.midterm.index', $midterm)->with('Success', $this->actionMessages(ControllerNames::Midterm, $midterm->midtermCode, ActionMethods::Updated));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Midterm $midterm)
    {
        $midterm->delete();

        $this->notifyDevelopers(ControllerNames::Midterm, $midterm->code, NotificationMethods::Destroyed);

        return redirect()->route('developer.midterm.index')->with('Success', $this->actionMessages(ControllerNames::Midterm, $midterm->midtermCode, ActionMethods::Destroyed));
    }
}
