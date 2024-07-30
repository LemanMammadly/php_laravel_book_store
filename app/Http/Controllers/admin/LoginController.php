<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        try {
            if (Auth::attempt($credentials)) {
                if (Auth::user()->isAdmin == 1 || Auth::user()->isSuperAdmin == 1) {
                    $request->session()->regenerate();
                    return redirect()->intended('admin1');
                } else {
                    Auth::logout();
                    return back()->withErrors([
                        'email' => 'You are not authorized to access this page.',
                    ])->onlyInput('email');
                }
            }
            return back()->withErrors([
                'email' =>  'The provided credentials do not match our records.',
            ])->onlyInput('email');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }
}
