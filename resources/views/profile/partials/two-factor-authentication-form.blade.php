<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Two-Factor Authentication') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Add additional security to your account using two-factor authentication.') }}
        </p>
    </header>

    <div class="mt-6 space-y-6">
        @if (session('status'))
            <div class="p-4 mb-4 text-sm text-green-800 bg-green-50 rounded-lg">
                {{ session('status') }}
            </div>
        @endif

        <div class="flex items-center">
            <div class="flex-1">
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Two-factor authentication is currently 
                    <strong>{{ auth()->user()->two_factor_enabled ? 'enabled' : 'disabled' }}</strong>.
                </p>
            </div>

            <div class="flex items-center gap-4">
                @if (auth()->user()->two_factor_enabled)
                    <form method="post" action="{{ route('two-factor.disable') }}">
                        @csrf
                        <x-danger-button type="submit">
                            {{ __('Disable') }}
                        </x-danger-button>
                    </form>
                @else
                    <form method="post" action="{{ route('two-factor.enable') }}">
                        @csrf
                        <x-primary-button type="submit">
                            {{ __('Enable') }}
                        </x-primary-button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</section>