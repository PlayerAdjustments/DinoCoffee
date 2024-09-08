<?php

namespace App\Http\Controllers\Developer;

use App\Enums\ControllerNames;
use App\Enums\ActionMethods;
use App\Enums\NotificationMethods;
use App\Http\Controllers\Controller;
use App\Http\Requests\Generation\StoreGenerationRequest;
use App\Http\Requests\Generation\UpdateGenerationRequest;
use App\Models\Generation;
use Illuminate\Http\Request;

class GenerationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $generations = Generation::query();

        if ($request->has('simple-search')) {
            $input = $request->input('simple-search');
            $generations->whereAny([
                'code',
            ], 'like', $input . '%');
        }

        if ($request->has('hiddenGenerationDeactivated') && $request->input('hiddenGenerationDeactivated') == 1) {
            $generations->onlyTrashed();
        }

        $generations = $generations->orderBy('id')->paginate(
            $request->has('perpage') ? $request->input('perpage') : 10,
            ['code', 'start_date', 'end_date', 'deleted_at']
        )->withQueryString();

        return view('Pages.Developer.Generation.list', compact('generations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenerationRequest $request)
    {
        Generation::create($request->validated());

        $this->notifyDevelopers(ControllerNames::Generation, $request->validated('code'), NotificationMethods::Stored);

        /**
         * Send user back to the correspondent list page
         */
        return redirect()->route('developer.generations.index')->with('Success', $this->actionMessages(ControllerNames::Generation, $request->validated('code'), ActionMethods::Stored));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenerationRequest $request, Generation $generation)
    {
        $generation->update($request->validated());

        $this->notifyDevelopers(ControllerNames::Generation, $generation->code, NotificationMethods::Updated);

        return redirect()->route('developer.generations.index', $generation)->with('Success', $this->actionMessages(ControllerNames::Generation, $generation->code, ActionMethods::Updated));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Generation $generation)
    {
        $generation->delete();

        $this->notifyDevelopers(ControllerNames::Generation, $generation->code, NotificationMethods::Destroyed);

        return redirect()->route('developer.generations.index')->with('Success', $this->actionMessages(ControllerNames::Generation, $generation->code, ActionMethods::Destroyed));
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(Generation $generation)
    {
        $generation->restore();

        $this->notifyDevelopers(ControllerNames::Generation, $generation->code, NotificationMethods::Restored);

        return redirect()->route('developer.generations.index')->with('Success', $this->actionMessages(ControllerNames::Generation, $generation->code, ActionMethods::Restored));
    }
}
