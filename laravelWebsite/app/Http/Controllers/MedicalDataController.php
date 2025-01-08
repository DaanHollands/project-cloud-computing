<?php

namespace App\Http\Controllers;

use App\Services\MedDataService;

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

        $records = $recordsResponse ? collect($recordsResponse->getRecords()) : collect([]);
        $invoices = $invoicesResponse ? collect($invoicesResponse->getInvoices()) : collect([]);
        // dd($records, $invoices);
        return view('medicaldata.index', compact('records', 'invoices'));
    }

    public function show_record($id)
    {
        $record = $this->service->getMedicalRecordById($id);
        return view('medicaldata.record', compact('record'));
    }

    public function show_invoice($id)
    {
        $invoice = $this->service->getInvoiceById($id);
        return view('medicaldata.invoice', compact('invoice'));
    }
}
