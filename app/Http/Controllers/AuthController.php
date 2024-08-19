<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthLoginRequest $request)
    {
        $credentials = $request->safe(['matricula', 'password', 'deleted_at']);
        $remember = $request->validated('remember');

        if (!Auth::attempt($credentials, $remember)) {
            return back()->withInput()->withErrors(['auth' => 'Invalid Credentials']);
        }

        $request->session()->regenerate();

        switch (Auth::user()->role) {
            case 'DEV':
                return redirect()->intended(route('developer.index'));
                break;
            case 'ADM':

                break;
            case 'DIR':

                break;
            case 'COO':

                break;
            case 'DOC':

                break;
            case 'ALU':

                break;
            default:
                return back()->withInput()->withErrors(['auth' => "Your account doesn't have a role."]);
                break;
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('Success','You have logged out.');
    }
}
