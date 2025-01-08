<?php

namespace App\Http\Controllers;
use App\Services\SoapService;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function get()
    {
        $userEmail = auth()->user()->email;
        $userData = SoapService::getUserByEmail($userEmail);

        return view('profile.setData', ['userData' => $userData]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'birthDate' => 'required|date',
            'postalCode' => 'required|string',
            'street' => 'required|string',
            'houseNumber' => 'required|string',
            'country' => 'required|string',
            'phoneNumber' => 'nullable|string',
        ]);

        $response = SoapService::createUser(
            auth()->user()->email,
            $validated['firstName'] . ' ' . $validated['lastName'],
            $validated['birthDate'],
            $validated['postalCode'],
            $validated['street'],
            $validated['houseNumber'],
            $validated['country']);
        if($response){
            return redirect()->route('dashboard');
        } else {
            return view('profile.setData')->withErrors(["Couldn't create userdata"]);
        }
    }
}
