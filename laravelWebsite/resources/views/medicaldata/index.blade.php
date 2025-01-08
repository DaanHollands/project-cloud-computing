<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Medical Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($records === null && $invoices == null)
                        <div class="text-center">
                            <h3 class="text-lg font-bold mb-4">{{ __('No Records or Invoices Found') }}</h3>
                            <p class="text-gray-600">{{ __('There are no medical records or invoices to display at the moment.') }}</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Medical Records -->
                            <div>
                                <h3 class="text-lg font-bold mb-4">{{ __('Medical Records') }}</h3>
                                @if ($records === null)
                                    <p class="text-gray-600">{{ __('No medical records found.') }}</p>
                                @else
                                    <ul class="list-disc list-inside space-y-2">
                                        @foreach ($records as $record)
                                            <li>
                                                <a href="{{ route('meddata.record.show', ['id' => $record->getId()]) }}" class="text-blue-500 hover:underline">
                                                    {{ $record->getTitle() }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            <!-- Invoices -->
                            <div>
                                <h3 class="text-lg font-bold mb-4">{{ __('Invoices') }}</h3>
                                @if ($invoices === null)
                                    <p class="text-gray-600">{{ __('No invoices found.') }}</p>
                                @else
                                    <ul class="list-disc list-inside space-y-2">
                                        @foreach ($invoices as $invoice)
                                            <li>
                                                <a href="{{ route('meddata.invoice.show', ['id' => $invoice->getId()]) }}" class="text-blue-500 hover:underline">
                                                    {{ $invoice->getTitle() }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
