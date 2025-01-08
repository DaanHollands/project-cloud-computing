<?php

namespace App\Services;

use Grpc\MedicalDataServiceClient;

require_once __DIR__ . "/../../grpc/GetByIdRequest.php";
require_once __DIR__ . "/../../grpc/GetByUserIdRequest.php";
require_once __DIR__ . "/../../grpc/InvoiceResponse.php";
require_once __DIR__ . "/../../grpc/InvoicesListResponse.php";
require_once __DIR__ . "/../../grpc/MedicalRecordResponse.php";
require_once __DIR__ . "/../../grpc/MedicalRecordsListResponse.php";

class MedDataService
{
    private MedicalDataServiceClient $client;

    public function __construct()
    {  

        $this->client = new MedicalDataServiceClient(env('MEDICALDATA_URL'), [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
            'max_receive_message_length' => 50 * 1024 * 1024,
            'max_send_message_length' => 50 * 1024 * 1024,
    ]);
    }

    public function getMedicalRecordsByUserId($id)
    {
        try
        {
            $request = new \GetByUserIdRequest();
            $request->setUserId($id);

            list($response, $status) = $this->client->GetMedicalRecordsByUserId($request)->wait();
            if ($status->code === 0) {
                return $response;
            }

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getMedicalRecordById($id)
    {
        try
        {
            $request = new \GetByIdRequest();
            $request->setId($id);

            list($response, $status) = $this->client->GetMedicalRecordById($request)->wait();
            if ($status->code === 0) {
                return $response;
            }

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getInvoicesByUserId($id)
    {
        try
        {
            $request = new \GetByUserIdRequest();
            $request->setUserId($id);

            list($response, $status) = $this->client->GetInvoicesByUserId($request)->wait();
            if ($status->code === 0) {
                return $response;
            }

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getInvoiceById($id)
    {
        try
        {
            $request = new \GetByIdRequest();
            $request->setId($id);

            list($response, $status) = $this->client->GetInvoiceById($request)->wait();
            if ($status->code === 0) {
                return $response;
            }

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }    
}
