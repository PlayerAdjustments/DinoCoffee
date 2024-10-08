<?php

namespace App\Http\Controllers\Developer;

use App\Enums\ControllerNames;
use App\Enums\ActionMethods;
use App\Enums\NotificationMethods;
use App\Http\Controllers\Controller;
use App\Http\Requests\CareerCode\StoreCareerCodeRequest;
use App\Http\Requests\CareerCode\UpdateCareerCodeRequest;
use App\Models\CareerCode;

class CareerCodeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCareerCodeRequest $request)
    {
        CareerCode::create($request->validated());

        $this->notifyDevelopers(ControllerNames::CareerCode, $request->validated('joined'), NotificationMethods::Stored);

        /**
         * Send user back to the correspondent list page
         */
        return redirect()->route('developer.careers.show', $request->validated('career_abbreviation'))->with('Success', $this->actionMessages(ControllerNames::CareerCode, $request->validated('joined'), ActionMethods::Stored));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCareerCodeRequest $request, CareerCode $careercode)
    {
        $careercode->update($request->validated());

        $this->notifyDevelopers(ControllerNames::CareerCode, $careercode->joined, NotificationMethods::Updated);

        return redirect()->route('developer.careers.show', $careercode->career_abbreviation)->with('Success', $this->actionMessages(ControllerNames::CareerCode, $careercode->joined, ActionMethods::Updated));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CareerCode $careercode)
    {

        $careercode->delete();

        $this->notifyDevelopers(ControllerNames::CareerCode, $careercode->joined, NotificationMethods::Destroyed);

        return redirect()->route('developer.careers.show', $careercode->career_abbreviation)->with('Success', $this->actionMessages(ControllerNames::CareerCode, $careercode->joined, ActionMethods::Destroyed));
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(CareerCode $careercode)
    {
        $careercode->restore();

        $this->notifyDevelopers(ControllerNames::CareerCode, $careercode->joined, NotificationMethods::Restored);

        return redirect()->route('developer.careers.show', $careercode->career_abbreviation)->with('Success', $this->actionMessages(ControllerNames::CareerCode, $careercode->joined, ActionMethods::Restored));
    }
}
