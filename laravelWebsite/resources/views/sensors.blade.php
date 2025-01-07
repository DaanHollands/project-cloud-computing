<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sensor Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (empty($sensorData))
                        <div class="text-center">
                            <h3 class="text-lg font-bold mb-4">{{ __('Fetching Sensor Data...') }}</h3>
                            <p class="text-gray-600">{{ __('Please wait while we retrieve the latest sensor readings.') }}</p>
                            <div class="mt-6">
                                <svg class="animate-spin h-8 w-8 text-gray-600 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </div>
                        </div>
                    @else
                        <h3 class="text-lg font-bold mb-4">{{ __('Current Sensor Readings') }}</h3>

                        <table class="table-auto w-full border-collapse bg-transparent">
                            <thead>
                            <tr class="bg-transparent">
                                <th class="border border-gray-300 px-4 py-2">{{ __('Sensor') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Value') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ __('Blood Pressure') }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    Systolic: {{ $sensorData['sensors/bloodPressure']['systolic'] }} <br>
                                    Diastolic: {{ $sensorData['sensors/bloodPressure']['diastolic'] }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ __('Temperature') }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $sensorData['sensors/temperature']['temperature'] }} °C
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ __('Humidity') }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $sensorData['sensors/humidity']['humidity'] }} %
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ __('Oxygen Level') }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $sensorData['sensors/oxygen']['oxygenLevel'] }} %
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="mt-6 text-center">
                            <p class="text-gray-600 text-sm">{{ __('Data is refreshed periodically.') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
