<?php

namespace App\SOAP;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use SoapClient;

//https://laravel.com/docs/11.x/authentication#the-authenticatable-contract
class SoapUser implements Authenticatable
{
    protected int $id;
    protected string $email;
    protected string $fullName;
    protected string $token;

    public function __construct(int $id, string $email, string $fullName)
    {
        $this->id = $id;
        $this->email = $email;
        $this->fullName = $fullName;
    }

    public function getAuthIdentifierName(): string
    {
        return 'email';
    }

    public function getAuthIdentifier()
    {
        return $this->email;
    }

    public function getAuthPasswordName(): string
    {
        return 'password';
    }

    public function getAuthPassword(): ?string
    {
        try {
            $soapClient = new SoapClient('http://soap_dotnet:5109/auth?wsdl');
            $requestData = ['Id' => $this->id];

            $response = $soapClient->__soapCall('GetPasswordHash', [$requestData]);

            if(isset($response))
            {
                return $response->GetPasswordHashResult;
            }

        } catch (\SoapFault $e) {
            return null;
        }
        return null;
    }

    public function getRememberToken(): string
    {
        return $this->token;
    }

    public function setRememberToken($value): void
    {
        $this->token = $value;
    }

    public function getRememberTokenName(): string
    {
        return 'token';
    }
}
