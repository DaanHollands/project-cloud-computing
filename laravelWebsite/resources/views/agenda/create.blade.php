<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Agenda Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">{{ __('Create New Event') }}</h3>

                    <!-- Agenda Creation Form -->
                    <form method="POST" action="{{ route('agenda.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-gray-700">{{ __('Select User') }}</label>
                            <select id="user_id" name="user_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="" disabled selected>{{ __('Select a User') }}</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Event Title') }}</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                            <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700">{{ __('Event Date') }}</label>
                            <input type="date" id="date" name="date" value="{{ old('date') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div class="mb-4">
                            <label for="time_begin" class="block text-sm font-medium text-gray-700">{{ __('Start Time') }}</label>
                            <input type="time" id="time_begin" name="time_begin" value="{{ old('time_begin') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div class="mb-4">
                            <label for="time_end" class="block text-sm font-medium text-gray-700">{{ __('End Time') }}</label>
                            <input type="time" id="time_end" name="time_end" value="{{ old('time_end') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('Create Event') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
