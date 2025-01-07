<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agenda Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">{{ __('Agenda Events') }}</h3>

                    @if($data && count($data) > 0)
                    <table class="table-auto w-full border-collapse bg-transparent mt-4">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">{{ __('ID') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Title') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Date') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Time Begin') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Time End') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $event)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $event->id }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $event->title }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $event->date->year }}-{{ str_pad($event->date->month, 2, '0', STR_PAD_LEFT) }}-{{ str_pad($event->date->day, 2, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ str_pad($event->timeBegin->hour, 2, '0', STR_PAD_LEFT) }}:{{ str_pad($event->timeBegin->minute, 2, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ str_pad($event->timeEnd->hour, 2, '0', STR_PAD_LEFT) }}:{{ str_pad($event->timeEnd->minute, 2, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="{{ route('agenda.show', $event->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                        View
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p class="text-center text-gray-600 mt-8">{{ __('No events found.') }}</p>
                    @endif

                    <div class="mt-6 text-center">
                        <a href="{{ route('agenda.create') }}"
                           class="text-blue-500 hover:underline">{{ __('Create new event') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
