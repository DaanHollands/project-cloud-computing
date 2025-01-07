<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agenda Event Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">{{ __('Agenda Event Details') }}</h3>

                    <div class="mb-6">
                        <h4 class="text-lg font-medium text-gray-700">{{ __('Event Title: ') }}</h4>
                        <p>{{ $event->title }}</p>
                    </div>

                    <div class="mb-6">
                        <h4 class="text-lg font-medium text-gray-700">{{ __('Description: ') }}</h4>
                        <p>{{ $event->description ?? 'No description provided.' }}</p>
                    </div>

                    <div class="mb-6">
                        <h4 class="text-lg font-medium text-gray-700">{{ __('Doctor: ') }}</h4>
                        <p>{{ $doctor ?? 'Doctor name not found' }}</p>
                    </div>

                    <div class="mb-6">
                        <h4 class="text-lg font-medium text-gray-700">{{ __('Date: ') }}</h4>
                        <p>{{ $event->date->year }}-{{ str_pad($event->date->month, 2, '0', STR_PAD_LEFT) }}-{{ str_pad($event->date->day, 2, '0', STR_PAD_LEFT) }}</p>
                    </div>

                    <div class="mb-6">
                        <h4 class="text-lg font-medium text-gray-700">{{ __('Time Begin: ') }}</h4>
                        <p>{{ str_pad($event->timeBegin->hour, 2, '0', STR_PAD_LEFT) }}:{{ str_pad($event->timeBegin->minute, 2, '0', STR_PAD_LEFT) }}</p>
                    </div>

                    <div class="mb-6">
                        <h4 class="text-lg font-medium text-gray-700">{{ __('Time End: ') }}</h4>
                        <p>{{ str_pad($event->timeEnd->hour, 2, '0', STR_PAD_LEFT) }}:{{ str_pad($event->timeEnd->minute, 2, '0', STR_PAD_LEFT) }}</p>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('agenda.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">{{ __('Back to Agenda') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
