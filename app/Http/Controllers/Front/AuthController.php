<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('front.auth.index');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'string|max:255|required',
            'email' => 'string|max:255|email|required|unique:users',
            'password' => 'string|min:8|required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'slug' => strtolower($request->name),
            ]);

            return redirect()->route('home')->with('success', 'Register succesfully!');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Registered failed' . $ex->getMessage())->withInput();
        }
    }

    public function login(Request $request)
    {
        $credentials =  $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('home');
                dd($request->all());
            }
            return back()->withErrors(['email' => 'The provided credentials do not match our records'])->onlyInput('email');
        } catch (\Exception $ex) {
            dd($ex->getMessage());
            return redirect()->back()->with('error', 'An error occurred: ' . $ex->getMessage())->withInput();
        }
    }
}
