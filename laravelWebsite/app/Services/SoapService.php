<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use SoapClient;
use SoapFault;

class SoapService
{
    private static ?SoapClient $client = null;
    public static function initialize(): void
    {
        if(self::$client == null) {
            try {
                self::$client = new SoapClient(env('SOAP_API_WSDL'));
            } catch (SoapFault $exception) {
                Log::error($exception);
            }
        }
    }

    private static function callMethod($method, $parameters)
    {
        if(self::$client == null) {
            self::initialize();
        }

        try {
            return self::$client->__soapCall($method, [$parameters]);
        } catch (SoapFault $exception) {
            Log::error($exception);
        }
    }

    public static function createUser(
        string $email,
        string $fullName,
        string $birthDate,
        string $postalCode,
        string $street,
        int $houseNumber,
        string $country) : bool
    {
        if(self::$client == null) {
            self::initialize();
        }

        $parameters = [
            'Email' => $email,
            'FullName' => $fullName,
            'BirthDate' => $birthDate,
            'PostalCode' => $postalCode,
            'Street' => $street,
            'HouseNumber' => $houseNumber,
            'Country' => $country
        ];
        $response = self::callMethod("CreateUser", $parameters);

        return $response->CreateUserResult;
    }

    public static function updateAddress(
        string $email,
        string $street,
        string $houseNumber,
        string $postalCode,
        string $country) : bool
    {
        if(self::$client == null) {
            self::initialize();
        }

        $parameters = [
            'Email' => $email,
            'PostalCode' => $postalCode,
            'Street' => $street,
            'HouseNumber' => $houseNumber,
            'Country' => $country
        ];
        $response = self::callMethod("UpdateAddress", $parameters);
        return $response->UpdateAddressResult;
    }

    public static function setPhoneNumber(string $email, string $phoneNumber) : bool
    {
        if(self::$client == null) {
            self::initialize();
        }
        $parameters = [
            'Email' => $email,
            'PhoneNumber' => $phoneNumber
        ];
        $response = self::callMethod("SetPhoneNumber", $parameters);
        return $response->SetPhoneNumberResult;
    }

    public static function test()
    {

    }
    public static function getUserByEmail(string $email): ?array
    {
        if (self::$client === null) {
            self::initialize();
        }
        $parameters = [
            'Email' => $email,
        ];
        $response = self::callMethod("GetUserByEmail", $parameters);

        if (!isset($response->GetUserByEmailResult)) {
            return null;
        }

        // Convert top-level object to array
        $user = (array)$response->GetUserByEmailResult;

        // Check and convert the Address field if it exists and is an object
        if (isset($user['Address']) && is_object($user['Address'])) {
            $user['Address'] = (array)$user['Address'];
        }

        return $user;
    }

    public static function deleteProfile(string $email) : bool
    {
        if(self::$client == null) {
            self::initialize();
        }
        $parameters = [
            'Email' => $email
        ];
        $response = self::callMethod("DeleteProfile", $parameters);
        return $response->DeleteProfileResult;
    }
}
