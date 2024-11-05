<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Hash;
use SensitiveParameter;
use SoapClient;

//https://laravel.com/docs/11.x/authentication#adding-custom-user-providers
class SoapUserProvider implements UserProvider
{
    protected SoapClient $soapClient;

    public function __construct()
    {
        $this->soapClient = new SoapClient(env('SOAP_API_WSDL'));
    }

    public function retrieveById($identifier) : ?Authenticatable
    {
        $userData = $this->getUserById($identifier);

        if($userData)
        {
            return $this->userDataToUser($userData);
        }
        return null;
    }

    public function retrieveByToken($identifier, #[SensitiveParameter] $token): ?Authenticatable
    {
        $userData = $this->getUserById($identifier);
        if($userData && $this->isTokenValid($userData, $token))
        {
            return $this->userDataToUser($userData);
        }
        return null;
    }

    public function updateRememberToken(Authenticatable $user, #[SensitiveParameter] $token): void
    {
        try
        {
            $response = $this->soapClient->__soapCall('UpdateRememberToken',
                [   'Id' => $user->getAuthIdentifier(),
                    'Password' => $user->getAuthPassword(),
                    'Token' => $token]);
        } catch (\SoapFault $e) {
        }
    }

    public function retrieveByCredentials(#[SensitiveParameter] array $credentials): ?Authenticatable
    {
        try {
            $response = $this->soapClient->__soapCall('GetUserByEmail', [$credentials]);
        } catch (\SoapFault $e) {
            return null;
        }
        $userData = [
            'userId' => $response->GetUserByEmailResult->UserId,
            'email' => $response->GetUserByEmailResult->Email,
            'fullName' => $response->GetUserByEmailResult->FullName,
        ];
        return $this->userDataToUser($userData);
    }

    public function validateCredentials(Authenticatable $user, #[SensitiveParameter] array $credentials): bool
    {
        if(Hash::check($credentials['password'], $user->getAuthPassword()) && $user->getAuthIdentifier() === $credentials['email'])
        {
            return true;
        }
        return false;
    }

    public function rehashPasswordIfRequired(Authenticatable $user, #[SensitiveParameter] array $credentials, bool $force = false): void
    {

    }

    protected function getUserById($id) : ?array
    {
        try {
            $response = $this->soapClient->__soapCall('GetUserById', ['Id' => $id]);
            if($response->GetUserByIdResult->UserId !== -1)
            {
                return [
                    'userId' => $response->GetUserByIdResultd->UserId,
                    'email' => $response->GetUserByIdResult->Email,
                    'fullName' => $response->GetUserByIdResult->FullName,
                ];
            }

        } catch (\SoapFault $e) {
            return null;
        }
        return null;
    }

    protected function userDataToUser(array $userData) : Authenticatable
    {
        return new User($userData['userId'], $userData['email'], $userData['fullName']);
    }

    protected function isTokenValid(array $userData, string $token): bool
    {
        if(isset($userData['token']) && $userData['token'] === $token)
            return true;
        return false;
    }
}
