<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function loginPage()
    {
        if (auth()->user()) {
            return redirect(route('home'));
        } else {
            return view('login');
        }
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function signupPage()
    {
        if (auth()->user()) {
            return redirect(route('home'));
        } else {
            return view('sign-up');
        }
    }
    public function signup(Request $request): RedirectResponse
    {
        $validation = $request->validate([
            'email' => ['unique:users', 'email:rfc,dns', 'required'],
            'password' => ['required', Password::min(8)],
            'age' => 'required|lt:100',
            'name' => ['unique:users', 'required'],
            'gender' => 'required'
        ]);
        // dd($request->all());

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::login($user);
        return redirect()->route('home')->withSuccess('Registered Successfully');

    }
    public function checkLogin()
    {
        if (auth()->user()) {
            return redirect(route('/'));
        } else {
            return redirect(route('/login'));
        }
    }
}
