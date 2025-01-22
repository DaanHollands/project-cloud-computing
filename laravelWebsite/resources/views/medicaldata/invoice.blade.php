<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoice Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">{{ $invoice->getTitle() }}</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Invoice Information -->
                        <div>
                            <p class="text-gray-600"><strong>{{ __('Invoice ID:') }}</strong> {{ $invoice->getId() }}</p>
                            <p class="text-gray-600"><strong>{{ __('User ID:') }}</strong> {{ $invoice->getUserId() }}</p>
                            <p class="text-gray-600">
                                <strong>{{ __('Status:') }}</strong> 
                                <span class="{{ $invoice->getIsPaid() ? 'text-green-500' : 'text-red-500' }}">
                                    {{ $invoice->getIsPaid() ? __('Paid') : __('Unpaid') }}
                                </span>
                            </p>
                        </div>

                        <!-- Invoice Image -->
                        <div>
                            <p class="text-gray-600 font-bold mb-2">{{ __('Invoice Image:') }}</p>
                            <img src="{{ $invoice->getImageUrl() }}" alt="{{ $invoice->getTitle() }}" class="rounded shadow-md w-full max-w-sm">
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('meddata.index') }}" class="text-blue-500 hover:underline">
                            {{ __('Back to Medical Data') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
