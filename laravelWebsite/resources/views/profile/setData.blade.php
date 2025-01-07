<x-app-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form action="{{ route('profile') }}" method="POST">
        @csrf

        <!-- First Name -->
        <div>
            <x-input-label for="firstName" :value="__('First Name')" />
            <x-text-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" required
                          value="{{ old('firstName', $userData['FirstName'] ?? '') }}" />
            <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div>
            <x-input-label for="lastName" :value="__('Last Name')" />
            <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" required
                          value="{{ old('lastName', $userData['LastName'] ?? '') }}" />
            <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
        </div>

        <!-- Birth Date -->
        <div>
            <x-input-label for="birthDate" :value="__('Birth Date')" />
            <x-text-input id="birthDate" class="block mt-1 w-full" type="date" name="birthDate" required
                          value="{{ old('birthDate', $userData['BirthDate'] ?? '') }}" />
            <x-input-error :messages="$errors->get('birthDate')" class="mt-2" />
        </div>

        <!-- Postal Code -->
        <div>
            <x-input-label for="postalCode" :value="__('Postal Code')" />
            <x-text-input id="postalCode" class="block mt-1 w-full" type="text" name="postalCode" required
                          value="{{ old('postalCode', $userData['Address']['PostalCode'] ?? '') }}" />
            <x-input-error :messages="$errors->get('postalCode')" class="mt-2" />
        </div>

        <!-- Street -->
        <div>
            <x-input-label for="street" :value="__('Street')" />
            <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" required
                          value="{{ old('street', $userData['Address']['Street'] ?? '') }}" />
            <x-input-error :messages="$errors->get('street')" class="mt-2" />
        </div>

        <!-- House Number -->
        <div>
            <x-input-label for="houseNumber" :value="__('House Number')" />
            <x-text-input id="houseNumber" class="block mt-1 w-full" type="text" name="houseNumber" required
                          value="{{ old('houseNumber', $userData['Address']['HouseNumber'] ?? '') }}" />
            <x-input-error :messages="$errors->get('houseNumber')" class="mt-2" />
        </div>

        <!-- Country -->
        <div>
            <x-input-label for="country" :value="__('Country')" />
            <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" required
                          value="{{ old('country', $userData['Address']['Country'] ?? '') }}" />
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div>
            <x-input-label for="phoneNumber" :value="__('Phone Number')" />
            <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber"
                          value="{{ old('phoneNumber', $userData['PhoneNumber'] ?? '') }}" />
            <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <!-- Submit Button -->
            <x-primary-button class="ms-3">
                {{ __('Sla Op!') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
