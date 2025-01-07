<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;

class MQTTService
{
    private MqttClient $client;
    private array $data = [];
    private int $topicsCount = 0;
    private int $receivedCount = 0;

    public function __construct()
    {
        $this->client = new MqttClient(
            env('MQTT_BROKER_HOST'),
            env('MQTT_BROKER_PORT'),
            env('MQTT_CLIENT_ID')
        );

        $settings = (new ConnectionSettings())
            ->setUsername(env('MQTT_USERNAME'))
            ->setPassword(env('MQTT_PASSWORD'));

        // Try connecting
        try {
            $this->client->connect($settings);
            Log::info("Connected to MQTT broker successfully.");
        } catch (\Exception $e) {
            Log::error("Failed to connect to MQTT broker: " . $e->getMessage());
        }
    }

    public function subscribeAndGetData($topics)
    {
        if (!$this->client->isConnected()) {
            Log::error("Client is not connected to the broker.");
            return [];
        }

        $this->topicsCount = count($topics);
        $this->receivedCount = 0;

        foreach ($topics as $topic) {
            $this->client->subscribe($topic, function ($topic, $message) {
                Log::info("Received message on topic $topic: $message");
                $this->data[$topic] = json_decode($message, true);

                if ($this->data[$topic]) {
                    Log::info("Decoded data: " . print_r($this->data[$topic], true));
                } else {
                    Log::warning("Failed to decode message: $message");
                }

                $this->receivedCount++;

                if ($this->receivedCount === $this->topicsCount) {
                    $this->client->interrupt();  // Exit the loop after all topics have received a message
                }
            });
        }

        $this->client->loop(true, 10);

        return $this->data;
    }

    public function disconnect()
    {
        if ($this->client->isConnected()) {
            $this->client->disconnect();
            Log::info("Disconnected from MQTT broker.");
        }
    }
}
