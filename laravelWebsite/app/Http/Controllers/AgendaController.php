<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AgendaService;
use App\Services\SoapService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{

    private AgendaService $service;
    private SoapService $soap_service;

    public function __construct(AgendaService $service, SoapService $soap_service)
    {
        $this->service = $service;
        $this->soap_service = $soap_service;
    }

    public function index()
    {
        $response_data = $this->service->getAllEventsByUser(auth()->id());
        $response_data = collect($response_data)->first();
        $data = [];
        foreach ($response_data as $key => $value) {
            $data[] = json_decode(json_encode($value));
        }
        return view('agenda.index', compact('data'));
    }

    public function show(Request $request, $id)
    {
        $response_data = $this->service->getAgendaEvent($id);
        $response_data = collect($response_data)->first();
        $event = json_decode(json_encode($response_data));

        $doctor_email = User::find($event->doctorId)->email;
        $doctor_name = $this->soap_service->getUserByEmail($doctor_email);
        $doctor = $doctor_name['FirstName'] . ' ' . $doctor_name['LastName'];

        return view('agenda.show', compact('event', 'doctor'));
    }

    public function create()
    {
        $users = User::all();
        return view('agenda.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time_begin' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i|after:time_begin',
        ]);

        try {
            $doctor_id = Auth::id();
            
            $date = $validated['date'];
            $timeBegin = $validated['time_begin'];
            $timeEnd = $validated['time_end'];
    
            $response = $this->service->createEvent(
                $validated['user_id'],
                $doctor_id,
                $validated['title'],
                $validated['description'],
                $validated['date'], 
                $validated['time_begin'], 
                $validated['time_end']
            );

            if (isset($response['data']['createAgendaEvent']['id'])) {
                return redirect()->route('agenda.index')->with('success', 'Agenda event created successfully!');
            } else {
                return back()->withErrors(['error' => 'Failed to create agenda event.']);
            }
    
        } catch (\Exception $e) {
            \Log::error("Error creating agenda event via GraphQL: " . $e->getMessage());
            return back()->withErrors(['error' => 'There was an error creating the event. Please try again.']);
        }
    }
}
