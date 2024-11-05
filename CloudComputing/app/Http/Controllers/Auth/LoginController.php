<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Ensure you have a login view at this path
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        // Log the incoming request data
        Log::info('Login attempt:', [
            'email' => $request->input('email'),
            'timestamp' => now(),
        ]);

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            Log::warning('Login attempt failed validation:', [
                'errors' => $validator->errors()->toArray(),
                'timestamp' => now(),
            ]);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            Log::info('User logged in successfully:', [
                'email' => $request->input('email'),
                'timestamp' => now(),
            ]);
            return redirect()->route('profile');
        }

        // Log failed login attempt
        Log::warning('Login attempt failed:', [
            'email' => $request->input('email'),
            'timestamp' => now(),
        ]);
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/'); // Change this to your desired logout redirect route
    }
}
