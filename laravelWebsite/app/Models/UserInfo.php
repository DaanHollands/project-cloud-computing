<?php

namespace App\Models;

use App\Services\SoapService;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use SoapClient;
use SoapFault;

class UserInfo
{
    public string $email;
    public string $firstName;
    public string $lastName;
    public string $birthDate;
    public ?string $postalCode;
    public ?string $street;
    public ?string $houseNumber;
    public ?string $country;
    public ?string $phoneNumber;

    public function getUserInfo(): bool
    {
        $params = SoapService::getUserByEmail(auth()->user()->email);
        if($params === null){
            return false;
        }
        $names = explode(' ', $params['FullName']);
        $this->firstName = $names[0];
        $this->lastName = $params[1];
        $this->email = $params['Email'];
        $this->birthDate = $params['BirthDate'];
        $this->postalCode = $params['PostalCode'];
        $this->street = $params['Street'];
        $this->houseNumber = $params['HouseNumber'];
        $this->country = $params['Country'];
        $this->phoneNumber = $params['PhoneNumber'];
        return true;
    }
}
