<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Filter Reservations for Table ') . $id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">{{ __('Filter Reservations') }}</h3>

                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('restaurant.filter', $id) }}">
                        @csrf
                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">{{ __('Start Date') }}</label>
                            <input type="datetime-local" id="start_date" name="start_date" value="{{ old('start_date') }}" required class="mt-1 block w-full" />
                        </div>
                        <div class="mb-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700">{{ __('End Date') }}</label>
                            <input type="datetime-local" id="end_date" name="end_date" value="{{ old('end_date') }}" required class="mt-1 block w-full" />
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('Filter') }}</button>
                        </div>
                    </form>

                    <!-- Results Table -->
                    @if($reservations && count($reservations) > 0)
                        <h3 class="text-lg font-bold mt-8">{{ __('Filtered Reservations') }}</h3>
                        <table class="table-auto w-full border-collapse bg-transparent mt-4">
                            <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Reservation ID') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('User ID') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Date & Time') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Duration') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Number of Persons') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $reservation['id'] }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $reservation['userId'] }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($reservation['dateTime'])->format('Y-m-d H:i:s') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $reservation['duration'] }} minutes</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $reservation['numberOfPersons'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @elseif($reservations === null)
                        <p class="text-center text-gray-600 mt-8">{{ __('Please select a date range to filter the reservations.') }}</p>
                    @else
                        <p class="text-center text-gray-600 mt-8">{{ __('No reservations found for this time range.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
