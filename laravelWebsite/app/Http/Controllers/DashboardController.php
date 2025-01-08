<?php

namespace App\Http\Controllers;

use RakibDevs\Weather\Weather;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch weather data for Temse, Belgium (using the country code and city code)
        $wt = new Weather();
        $weather = null;
        $weather = $wt->getCurrentByCity('Zaventem');

        return view('dashboard', compact('weather'));
    }
}
