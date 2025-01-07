<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use App\Services\MQTTService;

class SensorsController extends Controller
{
    private MQTTService $mqtt;

    public function __construct(MQTTService $mqtt)
    {
        $this->mqtt = $mqtt;
    }

    public function index()
    {
        // Get the sensor data from cache
        $sensorData = Cache::get('sensor_data', []);

        return view('sensors', compact('sensorData'));
    }
}
