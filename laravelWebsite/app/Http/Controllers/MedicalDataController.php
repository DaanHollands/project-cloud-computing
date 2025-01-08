<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MedDataService;
use Illuminate\Support\Facades\Auth;

class MedicalDataController extends Controller
{
    private MedDataService $service;

    public function __construct(MedDataService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $id = auth()->id();
        $recordsResponse = $this->service->getMedicalRecordsByUserId($id);
        $invoicesResponse = $this->service->getInvoicesByUserId($id);

        $records = $recordsResponse ? $recordsResponse->getRecords() : null;
        $invoices = $invoicesResponse ? $invoicesResponse->getInvoices() : null;

        return view('medicaldata.index', compact('records', 'invoices'));
    }

    public function show_record($id)
    {
        $record = $this->service->getMedicalRecordById($id);
    }

    public function show_invoice($id)
    {
        $invoice = $this->service->getInvoiceById($id);
    }
}
