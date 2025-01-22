<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">{{ __('Update Your Profile Information') }}</h3>

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form action="{{ route('profile') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- First Name -->
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700">{{ __('First Name: ') }}</h4>
                            <x-text-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" required
                                          value="{{ old('firstName', $userData['FirstName'] ?? '') }}" />
                            <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
                        </div>

                        <!-- Last Name -->
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700">{{ __('Last Name: ') }}</h4>
                            <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" required
                                          value="{{ old('lastName', $userData['LastName'] ?? '') }}" />
                            <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                        </div>

                        <!-- Birth Date -->
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700">{{ __('Birth Date: ') }}</h4>
                            <x-text-input id="birthDate" class="block mt-1 w-full" type="date" name="birthDate" required
                                          value="{{ old('birthDate', $userData['BirthDate'] ?? '') }}" />
                            <x-input-error :messages="$errors->get('birthDate')" class="mt-2" />
                        </div>

                        <!-- Postal Code -->
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700">{{ __('Postal Code: ') }}</h4>
                            <x-text-input id="postalCode" class="block mt-1 w-full" type="text" name="postalCode" required
                                          value="{{ old('postalCode', $userData['Address']['PostalCode'] ?? '') }}" />
                            <x-input-error :messages="$errors->get('postalCode')" class="mt-2" />
                        </div>

                        <!-- Street -->
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700">{{ __('Street: ') }}</h4>
                            <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" required
                                          value="{{ old('street', $userData['Address']['Street'] ?? '') }}" />
                            <x-input-error :messages="$errors->get('street')" class="mt-2" />
                        </div>

                        <!-- House Number -->
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700">{{ __('House Number: ') }}</h4>
                            <x-text-input id="houseNumber" class="block mt-1 w-full" type="text" name="houseNumber" required
                                          value="{{ old('houseNumber', $userData['Address']['HouseNumber'] ?? '') }}" />
                            <x-input-error :messages="$errors->get('houseNumber')" class="mt-2" />
                        </div>

                        <!-- Country -->
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700">{{ __('Country: ') }}</h4>
                            <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" required
                                          value="{{ old('country', $userData['Address']['Country'] ?? '') }}" />
                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-gray-700">{{ __('Phone Number: ') }}</h4>
                            <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber"
                                          value="{{ old('phoneNumber', $userData['PhoneNumber'] ?? '') }}" />
                            <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                                {{ __('Save Changes') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
