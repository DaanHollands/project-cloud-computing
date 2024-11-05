<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SOAP\SoapUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// Ensure this points to your SOAP user model

class RegisterController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle the registration
    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email', // Assuming you have a users table
            'password' => 'required|min:6',
            'full_name' => 'required|string|max:255', // Additional field
        ]);

        if ($validator->fails()) {
            redirect()->back()->withErrors($validator)->withInput();
        }

        $hashedPassword = Hash::make($request->input('password'));
        // Prepare data for the SOAP request
        $userData = [
            'email' => $request->input('email'),
            'password' => $hashedPassword,
            'name' => $request->input('full_name'),
        ];

        // Call the SOAP service to register the user
        try {
            $soapClient = new \SoapClient(env('SOAP_API_WSDL'));
            $response = $soapClient->__soapCall('Register', [$userData]);

            if ($response->RegisterResult !== -1) {
                $user = new SoapUser($response->RegisterResult, $request->input('email'), $request->input('full_name'));
                Auth::login($user);
                return redirect()->route('/home')->with('success', 'Registration successful!');
            } else {
                return redirect()->back()->withErrors(['registration' => 'User registration failed.'])->withInput();
            }
        } catch (\SoapFault $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()])->withInput();
        }
    }
}
