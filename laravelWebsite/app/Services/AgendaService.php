<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use function Illuminate\Log\log;

class AgendaService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('GRAPHQL_AGENDA_API_URL'),
            'headers' => ['Content-Type' => 'application/json'],
        ]);
    }

    private function sendRequest($query, $variables = [])
    {
        try
        {
            $response = $this->client->post('', [
                'json' => [
                    'query' => $query,
                    'variables' => $variables,
                ]
                ]);
            $response_data = json_decode($response->getBody()->getContents(), true);

            if (isset($responseData['errors'])) {
                throw new \Exception(json_encode($response_Data['errors']));
            }

            if (isset($response_data['data'])) {
                return $response_data['data'];
            }

            Log::error('No data returned in the response');
            return null;
        } catch (RequestException $e)
        {
            Log::error($e);
            return null;
        }
    }

    public function getAgendaEvent($id)
    {
        $query = <<<'GRAPHQL'
        query ($id: ID!) {
            getAgenda(id: $id) {
                id
                userId
                doctorId
                title
                description
                date {
                    year
                    month
                    day
                }
                timeBegin {
                    hour
                    minute
                }
                timeEnd {
                    hour
                    minute
                }
            }
        }
        GRAPHQL;

        return $this->sendRequest($query, ['id' => $id]);
    }

    public function getAllEventsByUser($userId)
    {
        $query = <<<'GRAPHQL'
        query ($userId: Int!) {
            listAgendas(userId: $userId) {
                id
                title
                date {
                    year
                    month
                    day
                }
                timeBegin {
                    hour
                    minute
                }
                timeEnd {
                    hour
                    minute
                }
            }
        }
        GRAPHQL;

        return $this->sendRequest($query, ['userId' => $userId]);
    }

    public function createEvent($userId, $doctorId, $title, $description, $date, $timeBegin, $timeEnd)
    {
        $dateObj = \Carbon\Carbon::parse($date);
        $formattedDate = [
            'year' => $dateObj->year,
            'month' => $dateObj->month,
            'day' => $dateObj->day,
        ];

        $timeBeginObj = \Carbon\Carbon::parse($timeBegin);
        $formattedTimeBegin = [
            'hour' => $timeBeginObj->hour,
            'minute' => $timeBeginObj->minute,
        ];

        $timeEndObj = \Carbon\Carbon::parse($timeEnd);
        $formattedTimeEnd = [
            'hour' => $timeEndObj->hour,
            'minute' => $timeEndObj->minute,
        ];

        $query = <<<'GRAPHQL'
        mutation ($userId: Int!, $doctorId: Int!, $title: String!, $description: String, $date: DateInputRequired!, $timeBegin: TimeInputRequired!, $timeEnd: TimeInputRequired!) {
            createAgendaEvent(userId: $userId, doctorId: $doctorId, title: $title, description: $description, date: $date, timeBegin: $timeBegin, timeEnd: $timeEnd) {
                id
                title
            }
        }
        GRAPHQL;

        $variables = [
            'userId' => $userId,
            'doctorId' => $doctorId,
            'title' => $title,
            'description' => $description,
            'date' => $formattedDate,
            'timeBegin' => $formattedTimeBegin,
            'timeEnd' => $formattedTimeEnd,
        ];

        return $this->sendRequest($query, $variables);
    }

    public function updateEvent($id, $title = null, $description = null, $date = null, $timeBegin = null, $timeEnd = null)
    {
        $query = <<<'GRAPHQL'
        mutation ($id: Int!, $title: String, $description: String, $date: DateInput, $timeBegin: TimeInput, $timeEnd: TimeInput) {
            updateAgendaEvent(ID: $id, title: $title, description: $description, date: $date, timeBegin: $timeBegin, timeEnd: $timeEnd) {
                id
                title
            }
        }
        GRAPHQL;

        $variables = [
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'date' => $date,
            'timeBegin' => $timeBegin,
            'timeEnd' => $timeEnd
        ];

        return $this->sendRequest($query, $variables);
    }

    public function deleteEvent($id)
    {
        $query = <<<'GRAPHQL'
        mutation ($id: ID!) {
            deleteAgendaEvent(id: $id)
        }
        GRAPHQL;

        return $this->sendRequest($query, ['id' => $id]);
    }

    public function filterEventsByTimeRange($userId, $beginDate, $endDate)
    {
        $query = <<<'GRAPHQL'
        query ($userId: Int!, $fromDate: DateInput!, $toDate: DateInput!) {
            getAgendaEvents(userId: $userId, fromDate: $fromDate, toDate: $toDate) {
                id
                title
                date {
                    year
                    month
                    day
                }
                timeBegin {
                    hour
                    minute
                }
                timeEnd {
                    hour
                    minute
                }
            }
        }
        GRAPHQL;

        $variables = [
            'userId' => $userId,
            'fromDate' => $beginDate,
            'toDate' => $endDate
        ];

        return $this->sendRequest($query, $variables)['getAgendaEvents'];
    }
}
