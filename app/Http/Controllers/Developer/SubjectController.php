<?php

namespace App\Http\Controllers\Developer;

use App\Enums\ControllerNames;
use App\Enums\ActionMethods;
use App\Enums\NotificationMethods;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subject\StoreSubjectRequest;
use App\Http\Requests\Subject\UpdateSubjectRequest;
use App\Models\Notification;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public $controllerName = ControllerNames::Subject;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subjects = Subject::query();

        if ($request->has('simple-search')) {
            $input = $request->input('simple-search');
            $subjects->whereAny([
                'name',
            ], 'like', $input . '%');
        }

        if ($request->has('hiddenSubjectDeactivated') && $request->input('hiddenSubjectDeactivated') == 1) $subjects->onlyTrashed();

        $subjects = $subjects->orderBy('id')->paginate(
            $request->has('perpage') ? $request->input('perpage') : 10,
            ['slug', 'name', 'deleted_at']
        )->withQueryString();

        return view('Pages.Developer.Subject.list', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        Subject::create($request->validated());

        $this->NotifyDevelopers(ControllerNames::Subject, $request->validated('name'), NotificationMethods::Stored);

        /**
         * Send user back to the correspondent list page
         */
        return redirect()->route('developer.subjects.index')->with('Success', $this->ActionMessages(ControllerNames::Subject, $request->validated('name'), ActionMethods::Stored));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->validated());

        $this->NotifyDevelopers(ControllerNames::Subject, $subject->name, NotificationMethods::Updated);

        return redirect()->route('developer.subjects.index', $subject)->with('Success', $this->ActionMessages(ControllerNames::Subject, $subject->name, ActionMethods::Updated));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        $this->NotifyDevelopers(ControllerNames::Subject, $subject->name, NotificationMethods::Destroyed);

        return redirect()->route('developer.subjects.index')->with('Success', $this->ActionMessages(ControllerNames::Subject, $subject->name, ActionMethods::Destroyed));
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(Subject $subject)
    {
        $subject->restore();

        $this->NotifyDevelopers(ControllerNames::Subject, $subject->name, NotificationMethods::Restored);

        return redirect()->route('developer.subjects.index')->with('Success', $this->ActionMessages(ControllerNames::Subject, $subject->name, ActionMethods::Restored));
    }
}
