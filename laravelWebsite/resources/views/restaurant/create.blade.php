<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Reservation for Restaurant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">{{ __('Reservation Form') }}</h3>

                    <form action="{{ route('restaurant.store', $id) }}" method="POST">
                        @csrf
                        <!-- Hidden userId field, automatically set to the logged-in user's ID -->
                        <input type="hidden" name="userId" value="{{ auth()->user()->id }}">

                        <div class="mb-4">
                            <label for="dateTime" class="block text-sm font-semibold text-gray-700">{{ __('Date and Time') }}</label>
                            <input type="datetime-local" id="dateTime" name="dateTime" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="duration" class="block text-sm font-semibold text-gray-700">{{ __('Duration (minutes)') }}</label>
                            <input type="number" id="duration" name="duration" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="numberOfPersons" class="block text-sm font-semibold text-gray-700">{{ __('Number of Persons') }}</label>
                            <input type="number" id="numberOfPersons" name="numberOfPersons" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Create Reservation') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
