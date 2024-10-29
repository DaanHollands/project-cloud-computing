<?php

namespace App\SOAP;

use Exception;
use Laminas\Soap\Client;
use SoapClient;

class LoginService
{
    protected SoapClient $client;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $wsdl = "http://localhost:8001/?wsdl";
        try {
            $this->client = new SoapClient($wsdl, [
                'trace' => true,
                'exceptions' => true
            ]);
        } catch (\SoapFault $e) {
            throw new Exception("SOAP Client initialization error: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function login($email, $password)
    {
        try {
            // Make a call to the C# SOAP service’s VerifyUser method
            $response = $this->client->login([
                'email' => $email,
                'password' => $password,
            ]);

            // Assuming response is a boolean indicating success or failure
            return $response->LoginResult;
        } catch (Exception $e) {
            throw new Exception("SOAP Request error: " . $e->getMessage());
        }
    }
}
