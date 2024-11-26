<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\ControllerNames;
use App\Enums\ActionMethods;
use App\Enums\NotificationMethods;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Schedule;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $schedules = Schedule::query();

        if ($request->has('simple-search')) {
            $input = $request->input('simple-search');
            $schedules->whereAny([
                'code',
            ], 'like', $input . '%');
        }

        if ($request->has('hiddenScheduleDeactivated') && $request->input('hiddenScheduleDeactivated') == 1) {
            $schedules->onlyTrashed();
        }

        $schedules = $schedules->orderBy('id')->paginate(
            $request->has('perpage') ? $request->input('perpage') : 10,
            ['code', 'start_hour', 'end_hour', 'deleted_at']
        )->withQueryString();

        return view('Pages.Developer.Schedule.list', compact('shedules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {
        Schedule::create($request->validated());

        $this->notifyDevelopers(ControllerNames::Schedule, $request->validated('code'), NotificationMethods::Stored);

        /**
         * Send user back to the correspondent list page
         */
        return redirect()->route('developer.schedules.index')->with('Success', $this->actionMessages(ControllerNames::Schedule, $request->validated('code'), ActionMethods::Stored));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $schedule->update($request->validated());

        $this->notifyDevelopers(ControllerNames::Schedule, $schedule->code, NotificationMethods::Updated);

        return redirect()->route('developer.schedules.index', $schedule)->with('Success', $this->actionMessages(ControllerNames::Schedule, $schedule->code, ActionMethods::Updated));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        $this->notifyDevelopers(ControllerNames::Schedule, $schedule->code, NotificationMethods::Destroyed);

        return redirect()->route('developer.schedules.index')->with('Success', $this->actionMessages(ControllerNames::Schedule, $schedule->code, ActionMethods::Destroyed));
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(Schedule $schedule)
    {
        $schedule->restore();

        $this->notifyDevelopers(ControllerNames::Schedule, $schedule->code, NotificationMethods::Restored);

        return redirect()->route('developer.schedules.index')->with('Success', $this->actionMessages(ControllerNames::Schedule, $schedule->code, ActionMethods::Restored));
    }
}
