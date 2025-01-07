<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalDataController extends Controller
{
    public function index()
    {
        return view('medicaldata.index');
    }
}
