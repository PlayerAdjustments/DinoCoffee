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

        if ($request->has('simple-search')) {
            $input = $request->input('simple-search');
            $midterms->where(function ($query) use ($input) {
                $query->where('midtermCode', 'like', $input . '%')
                      ->orWhere('abbreviation', 'like', $input . '%')
                      ->orWhere('fullName', 'like', $input . '%');
            });
        }

        if ($request->has('hiddenMidtermDeactivated') && $request->input('hiddenMidtermDeactivated') == 1) {
            $midterms->onlyTrashed();
        }

        $midterms = $midterms->orderBy('id')->paginate(
            $request->input('perage', 10),
            ['midtermCode', 'abbreviation', 'fullName', 'startDate', 'endDate', 'deleted_at']
        )->withQueryString();

        return view('Pages.Developer.Midterm.list', compact('midterms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMidtermRequest $request)
    {
        $midterm = Midterm::create($request->validated());

        $this->notifyDevelopers(ControllerNames::Midterm, $midterm->midtermCode, NotificationMethods::Stored);

        return redirect()->route('developer.midterms.index')
            ->with('success', $this->actionMessages(ControllerNames::Midterm, $midterm->midtermCode, ActionMethods::Stored));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMidtermRequest $request, Midterm $midterm)
    {
        $midterm->update($request->validated());

        $this->notifyDevelopers(ControllerNames::Midterm, $midterm->midtermCode, NotificationMethods::Updated);

        return redirect()->route('developer.midterms.index')
            ->with('success', $this->actionMessages(ControllerNames::Midterm, $midterm->midtermCode, ActionMethods::Updated));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Midterm $midterm)
    {
        $midterm->delete();

        $this->notifyDevelopers(ControllerNames::Midterm, $midterm->midtermCode, NotificationMethods::Destroyed);

        return redirect()->route('developer.midterms.index')
            ->with('success', $this->actionMessages(ControllerNames::Midterm, $midterm->midtermCode, ActionMethods::Destroyed));
    }

    public function restore($id)
    {
        $midterm = Midterm::withTrashed()->find($id);

        if (!$midterm) {
            return redirect()->back()->with('info', 'The requested midterm does not exist or has been deactivated.');
        }

        $midterm->restore();

        return redirect()->route('developer.midterms.index')
        ->with('success', 'Midterm restored successfully.');
    }


}
