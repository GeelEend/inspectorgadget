<x-guest-layout>

        <x-auth-card>
            <x-slot name="logo"></x-slot>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <!-- ... -->


            @if (session('message'))
                <div class="alert alert-danger">{{ session('message') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="flex justify-center">
                    <a href="/inloggen/azure" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">
                        {{ 'Login met Landstede' }}
                    </a>
                </div>

            </form>





    </x-auth-card>
</x-guest-layout>
</div>
