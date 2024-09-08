<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudyPlan\StoreStudyPlanRequest;
use App\Models\CareerCode;
use App\Models\Notification;
use App\Models\StudyPlan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudyPlanController extends Controller
{
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
        StudyPlan::create($request->validated());
        $career_abbreviation = CareerCode::where('joined', $request->validated('career_code'))->pluck('career_abbreviation')->first();
        
        /**
         * Include the $this->notifyDevelopers() function and replace the with sucess message.
         */

        return redirect()->route('developer.careers.show', $career_abbreviation)->with('Success', 'StudyPlan ' . $request->validated('code') . ' has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudyPlan $studyPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudyPlan $studyPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudyPlan $studyPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudyPlan $studyPlan)
    {
        $studyPlan->delete();

        foreach (User::whereIn('role', ['DEV', 'ADM'])->pluck('matricula') as $m) {
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han desactivado un plan de estudios (' . $studyPlan->code . ')!',
                'body' => 'Corroboren la información, antes de realizar cualquier cambio.',
                'icon' => 'Seri_Confused.png',
                'created_by' => Auth::user()->matricula
            ]);
        }

        return redirect()->route('developer.careers.show', $studyPlan->careerCode->career_abbreviation)->with('Success', 'Study plan ' . $studyPlan->code . ' has been deleted.');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(StudyPlan $studyPlan)
    {
        $studyPlan->restore();

        foreach (User::whereIn('role', ['DEV', 'ADM'])->pluck('matricula') as $m) {
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han restaurado un plan de estudios (' . $studyPlan->code . ')!',
                'body' => 'Corroboren la información, antes de realizar cualquier cambio.',
                'icon' => 'Seri_Reading.png',
                'created_by' => Auth::user()->matricula
            ]);
        }

        return redirect()->route('developer.careers.show', $studyPlan->careerCode->career_abbreviation)->with('Success', 'Study Plan ' . $studyPlan->code . ' has been restored');
    }
}
