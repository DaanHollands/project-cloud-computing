<?php

namespace App\Models;

use App\Services\SoapService;

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
        $this->firstName = $params['FirstName'];
        $this->lastName = $params['LastName'];
        $this->email = $params['Email'];
        $this->birthDate = $params['BirthDate'];
        $this->postalCode = $params['Address']['PostalCode'];
        $this->street = $params['Address']['Street'];
        $this->houseNumber = $params['Address']['HouseNumber'];
        $this->country = $params['Address']['Country'];
        $this->phoneNumber = $params['PhoneNumber'];
        return true;
    }
}
