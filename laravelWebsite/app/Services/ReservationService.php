<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Carbon\Carbon;
use Exception;

class ReservationService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'http://restaurant:8080/reservations';
    }

    /**
     * Create a new reservation via the REST API.
     */
    public function createReservation($tableId, $userId, $dateTime, $duration, $numberOfPersons)
    {
        $offset = Carbon::now()->format('P');
        $finalDateTime = $dateTime . $offset;

        try {

            $response = Http::asForm()->post($this->baseUrl, [
                'tableId' => $tableId,
                'userId' => $userId,
                'dateTime' => $finalDateTime,
                'duration' => $duration,
                'numberOfPersons' => $numberOfPersons,
            ]);

            return $response->json();
        } catch (Exception $e) {
            throw new Exception('Failed to create reservation: ' . $e->getMessage());
        }
    }

    /**
     * Find a reservation by its ID via the REST API.
     */
    public function findById($id)
    {
        try {
            $response = Http::get("{$this->baseUrl}/{$id}");

            $this->handleApiResponse($response);
            return $response->json();
        } catch (Exception $e) {
            throw new Exception('Failed to fetch reservation by ID: ' . $e->getMessage());
        }
    }

    /**
     * Find reservations for a specific table ID via the REST API.
     */
    public function findByTableId($tableId)
    {
        try {
            $response = Http::get("{$this->baseUrl}/table/{$tableId}");

            $this->handleApiResponse($response);
            return $response->json();
        } catch (Exception $e) {
            throw new Exception('Failed to fetch reservations for table: ' . $e->getMessage());
        }
    }

    /**
     * Find reservations for a specific table ID within a date-time range via the REST API.
     */
    public function findByTableIdAndDateTime($tableId, $startDateTime, $endDateTime)
    {
        // Format the start and end date time to match the API expectations (e.g., ISO 8601 format)
        $startDateTimeFormatted = \Carbon\Carbon::parse($startDateTime)->toIso8601String();
        $endDateTimeFormatted = \Carbon\Carbon::parse($endDateTime)->toIso8601String();

        try {
            $response = Http::get("{$this->baseUrl}/table/{$tableId}/dateTime", [
                'startDateTime' => $startDateTimeFormatted,
                'endDateTime' => $endDateTimeFormatted,
            ]);

            $this->handleApiResponse($response);
            return $response->json();
        } catch (Exception $e) {
            throw new Exception('Failed to fetch reservations for table within date range: ' . $e->getMessage());
        }
    }

    /**
     * Handle API responses.
     */
    private function handleApiResponse(Response $response)
    {
        if ($response->failed()) {
            throw new Exception('API Error: ' . $response->body());
        }
    }
}
