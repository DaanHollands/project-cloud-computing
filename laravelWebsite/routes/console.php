<?php

use App\Jobs\FetchSensorData;
use App\Services\MQTTService;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function () {
    try {
        $mqttService = app(MQTTService::class);
        $fetchDataJob = new FetchSensorData($mqttService);
        $fetchDataJob->handle();
        Log::info('MQTT data fetched and updated.');
    } catch (\Exception $e) {
        Log::error('Error in scheduled task: ' . $e->getMessage());
    }
})->everyMinute();
