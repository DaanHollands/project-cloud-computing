<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MedDataService;

use App\grpc\MedicalDataServiceClient;
use \Grpc\Status;
use App\grpc\GetByUserIdRequest;
use App\grpc\GetByIdRequest;
use App\grpc\MedicalRecordResponse;

class MedicalDataController extends Controller
{
    private MedDataService $service;

    public function __construct(MedDataService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $data = $this->service->getMedicalRecordsFromUser(auth()->id());
        dd($data);
        return view('medicaldata.index', compact('data'));
    }

    public function test()
    {
        // Address of the gRPC server
        $host = 'medicaldata:50051';
        
        // Create a gRPC client
        $client = new MedicalDataServiceClient($host, [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);

        // Create a request object
        $request = new GetByIdRequest();
        $request->setId(1); // Example ID

        // Make a gRPC call
        list($response, $status) = $client->GetMedicalRecordById($request)->wait();

        // Check response
        if ($status->code === Status::ok()) {
            return response()->json([
                'success' => true,
                'data' => $response->getTitle(),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => $status->details,
        ]);
    }
}
