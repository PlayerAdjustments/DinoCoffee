<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->safe(['matricula', 'password', 'deleted_at']);
        $remember_me = $request->validated('remember_me');

        Log::info('Credentials: '.print_r($credentials, true).' Remember_me: '.print_r($remember_me, true));

        if(!Auth::attempt($credentials, $remember_me))
        {
            return back()->withInput()->withErrors(['auth' => 'Invalid Credentials']);
        }

        $request->session()->regenerate();

        switch(Auth::user()->role)
        {
            case 'DEV':
                Log::debug('User accesed! Developer');
                Log::debug(print_r(Auth::user(), true));
                return to_route('dashboard.main')->with('Debug', 'Welcome!');

            case 'ADM':
                Log::debug('User accesed! Administrative');
                break;

            default:
                return back()->withInput()->withErrors(['auth' => "Your account doesn't have a role."]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('main.login')->with('Success', 'Logged out.');
    }
}
