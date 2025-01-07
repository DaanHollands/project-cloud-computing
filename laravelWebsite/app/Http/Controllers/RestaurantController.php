<?php

namespace App\Http\Controllers;

use App\Services\ReservationService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RestaurantController extends Controller
{
    private ReservationService $service;

    public function __construct(ReservationService $service)
    {
        $this->service = $service;
    }

   public function index()
   {
        return view('restaurant.index');
   }

    public function show($id)
    {
        $allReservations = collect($this->service->findByTableId($id));
        $now = Carbon::now();

        $reservations = $allReservations->filter(function ($reservation) use ($now) {
            $startDateTime = Carbon::parse($reservation['dateTime']);
            $endDateTime = $startDateTime->copy()->addMinutes($reservation['duration']);

            return $startDateTime->lte($now) && $endDateTime->gte($now) || $startDateTime->gt($now);
        });

        return view('restaurant.show', compact('reservations', 'id'));
    }

    public function showFilterForm(Request $request, $id)
    {
        $reservations = null;

        if ($request->has('start_date') && $request->has('end_date')) {
            // Validate the incoming request
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);

            $reservations = $this->service->findByTableIdAndDateTime($id, $request->input('start_date'), $request->input('end_date'));
        }

        return view('restaurant.filter', compact('reservations', 'id'));
    }

    public function create(Request $request, $id)
    {
        return view('restaurant.create', compact('id'));
    }

    public function store(Request $request, $id)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'userId' => 'required|integer',
            'dateTime' => 'required|date',
            'duration' => 'required|integer',
            'numberOfPersons' => 'required|integer',
        ]);

        $userId = $request->userId;
        $dateTime = $validated['dateTime'];
        $duration = $validated['duration'];
        $numberOfPersons = $validated['numberOfPersons'];

        $reservation = $this->service->createReservation($id, $userId, $dateTime, $duration, $numberOfPersons);

        return redirect()->route('restaurant.index', ['id' => $id])->with('success', 'Reservation created successfully!');
    }

}
