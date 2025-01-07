<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservation Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">{{ __('Reservation Information') }}</h3>

                    <table class="table-auto w-full border-collapse bg-transparent">
                        <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 font-semibold">{{ __('Reservation ID') }}</th>
                            <th class="border border-gray-300 px-4 py-2 font-semibold">{{ __('Table ID') }}</th>
                            <th class="border border-gray-300 px-4 py-2 font-semibold">{{ __('User ID') }}</th>
                            <th class="border border-gray-300 px-4 py-2 font-semibold">{{ __('Date & Time') }}</th>
                            <th class="border border-gray-300 px-4 py-2 font-semibold">{{ __('Duration (minutes)') }}</th>
                            <th class="border border-gray-300 px-4 py-2 font-semibold">{{ __('Number of Persons') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $reservation['id'] }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $reservation['tableId'] }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $reservation['userId'] }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($reservation['dateTime'])->format('Y-m-d H:i:s') }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $reservation['duration'] }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $reservation['numberOfPersons'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="mt-6 text-center">
                        <a href="{{ route('restaurant.create', ['id' => $id]) }}"
                           class="text-blue-500 hover:underline">{{ __('Create new reservation') }}</a>
                    </div>

                    <!-- Link to the filter page -->
                    <div class="mt-6 text-center">
                        <a href="{{ route('restaurant.filter', ['id' => $id])}}"
                           class="text-blue-500 hover:underline">{{ __('Filter Reservations by Date & Time') }}</a>
                    </div>

                    <div class="mt-6 text-center">
                        <a href="{{ route('restaurant.index') }}"
                           class="text-blue-500 hover:underline">{{ __('Back to Reservations') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
