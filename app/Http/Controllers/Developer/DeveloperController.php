<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;

class DeveloperController extends Controller
{
    public function index()
    {
        return view('Pages.Developer.Index');
    }
}
