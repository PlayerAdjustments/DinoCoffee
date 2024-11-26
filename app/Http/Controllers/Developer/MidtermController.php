<?php

namespace App\Http\Controllers;

use App\Enums\ControllerNames;
use App\Enums\ActionMethods;
use App\Enums\NotificationMethods;
use App\Http\Controllers\Controller;
use App\Http\Requests\Generation\StoreMidtermRequest;
use App\Http\Requests\Generation\UpdateMidtermRequest;
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

        if ($request->has('hiddenGenerationDeactivated') && $request->input('hiddenGenerationDeactivated') == 1) {
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
    public function store(Request $request)
    {
        Midterm::create($request->validated());
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
