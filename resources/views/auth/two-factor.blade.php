<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Please enter the 6-digit verification code sent to your email address.') }}
    </div>

    
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('two-factor.verify.post') }}">
        @csrf

        
        <div>
            <x-input-label for="code" :value="__('Verification Code')" />
            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus autocomplete="off" maxlength="6" />
            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Verify') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>