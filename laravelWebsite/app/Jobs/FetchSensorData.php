<?php

namespace App\Jobs;

use App\Services\MQTTService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class FetchSensorData
{
    private MQTTService $mqtt;

    public function __construct(MQTTService $mqtt)
    {
        $this->mqtt = $mqtt;
    }

    public function handle()
    {
        $topics = [
            'sensors/bloodPressure',
            'sensors/temperature',
            'sensors/humidity',
            'sensors/oxygen',
        ];

        $sensorData = $this->mqtt->subscribeAndGetData($topics);

        // Store the data in the cache or a database (as an example, we're using Cache)
        Cache::put('sensor_data', $sensorData, now()->addMinutes(10));

        Log::info("MQTT data updated successfully.");
    }
}
