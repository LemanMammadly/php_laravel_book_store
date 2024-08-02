<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $userId = null;
        $auth_user = null;
        if (Auth::check() && Auth::user()) {
            $userId = Auth::user()->id;
            $auth_user = Auth::user();
        }
        $isTrue = 0;
        if (Auth::check() && Auth::user()->isSuperAdmin) {
            $isTrue = 1;
        }

        $admin_id = null;

        $users = User::where('id', '!=', $userId)->get();

        return view('admin.home.index', compact('users', 'isTrue', 'auth_user'));
    }

    public function updateView($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('admin.users.update.index', compact('user'));
    }

    public function update(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'isAdmin' => 'sometimes|boolean',
            'isActive' => 'sometimes|boolean',
            'slug' => 'string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'isAdmin' => $request->has('isAdmin') ? 1 : 0,
                'isActive' => $request->has('isActive') ? 1 : 0,
                'slug' => strtolower($request->name)
            ]);

            if ($user->isDirty()) {
                $user->save();
            }
            return redirect()->route('admin.home');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function updateViewUser($slug)
    {
        $user = User::where('slug', $slug)->first();
        if ($user->isAdmin || $user->isSuperAdmin) {
            return redirect()->route('notfound');
        }
        return view('admin.users.userupdate.index', compact('user'));
    }

    public function updateUser(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->where('isAdmin', 0)->first();

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'isAdmin' => 'sometimes|boolean',
            'isActive' => 'sometimes|boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'isAdmin' => $request->has('isAdmin') ? 1 : 0,
                'isActive' => $request->has('isActive') ? 1 : 0,
                'slug' => strtolower($request->name)
            ]);

            if ($user->isDirty()) {
                $user->save();
            }
            return redirect()->route('admin.home');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }
}
