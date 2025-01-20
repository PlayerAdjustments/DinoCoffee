<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //? Get the student info
        $students = User::where('role', 'ALU')->withTrashed()->get()->except(['birthday', 'password', 'cedula_profesional', 'created_by']);
        //? Configure the columns settings
        $columns = [
            ['name' => 'Usuario', 'searchable' => true, 'inputLength' => 'Long'],
            ['name' => 'Rol', 'searchable' => true, 'inputLength' => 'Small'],
            ['name' => 'Sexo', 'searchable' => true, 'inputLength' => 'Small'],
            ['name' => 'Carrera', 'searchable' => true, 'inputLength' => 'Small'],
            ['name' => 'Celular', 'searchable' => true, 'inputLength' => 'Long'],
            ['name' => 'Status', 'searchable' => true, 'inputLength' => 'Small']
        ];
        //? Configure the routes for the action button for each student retrieved.
        $students->transform(function ($student) {
            $student->routes = [
                ['name' => 'Show', 'route' => 'dashboard.main', 'params' => $student->id],
                ['name' => 'Edit', 'route' => 'dashboard.main', 'params' => $student->id],
                ['name' => 'Delete', 'route' => 'dashboard.main', 'params' => $student->id],
                ['name' => 'Restore', 'route' => 'dashboard.main', 'params' => $student->id],
            ];
            return $student;
        });
        //? Return the view with the data provided
        return view('Pages.Dashboard.Users.Index', [
            'data' => $students,
            'columnDetails' => $columns
        ]);
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
