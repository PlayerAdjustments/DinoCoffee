<?php

namespace App\Http\Controllers\Developer;

use App\Enums\ActionMethods;
use App\Enums\ControllerNames;
use App\Enums\NotificationMethods;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudyPlan\StoreStudyPlanRequest;
use App\Http\Requests\StudyPlan\UpdateStudyPlanRequest;
use App\Models\CareerCode;
use App\Models\StudyPlan;
use Illuminate\Http\Request;

class StudyPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudyPlanRequest $request)
    {
        $model = StudyPlan::create($request->validated());

        $this->notifyDevelopers(ControllerNames::StudyPlan, $request->validated('code'), NotificationMethods::Stored);
        
        return redirect()->route('developer.careers.show', $model->careercodes->career_abbreviation)->with('Success', "StudyPlan {$request->validated('code')} has been created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudyPlanRequest $request, StudyPlan $studyplan)
    {
        $studyplan->update($request->safe()->except(['unique_code_careercode']));

        $this->notifyDevelopers(ControllerNames::StudyPlan, $studyplan->code, NotificationMethods::Updated);

        return redirect()->route('developer.careers.show', $studyplan->careercodes->career_abbreviation)->with('Success', "StudyPlan {$studyplan->code} has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudyPlan $studyplan)
    {
        $studyplan->delete();

        $this->notifyDevelopers(ControllerNames::StudyPlan, $studyplan->code, NotificationMethods::Destroyed);

        return redirect()->route('developer.careers.show', $studyplan->careercodes->career_abbreviation)->with('Success', $this->actionMessages(ControllerNames::StudyPlan, $studyplan->code, ActionMethods::Destroyed));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function restore(StudyPlan $studyplan)
    {
        $studyplan->restore();

        $this->notifyDevelopers(ControllerNames::StudyPlan, $studyplan->code, NotificationMethods::Restored);

        return redirect()->route('developer.careers.show', $studyplan->careercodes->career_abbreviation)->with('Success', $this->actionMessages(ControllerNames::StudyPlan, $studyplan->code, ActionMethods::Restored));
    }
}
