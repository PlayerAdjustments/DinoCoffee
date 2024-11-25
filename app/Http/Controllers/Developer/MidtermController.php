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
    public function index()
    {
 
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
    public function store(Request $request)
    {
        //
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
