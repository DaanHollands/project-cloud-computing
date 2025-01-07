<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Restaurant Tables') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">{{ __('Select a Table') }}</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @for ($i = 1; $i <= 5; $i++)
                            <a href="{{ url('/restaurant/' . $i) }}"
                               class="block p-4 text-center bg-blue-100 border border-blue-300 rounded-lg shadow-sm hover:bg-blue-200 transition">
                                <h4 class="text-lg font-semibold text-blue-700">Table {{ $i }}</h4>
                            </a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
