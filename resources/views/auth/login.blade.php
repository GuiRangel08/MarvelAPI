<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
  
        <x-jet-validation-errors class="mb-4" />
  
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
  
        <div>
         
        @if (session('error'))
            <div class="alert alert-warning">
                ______________________    
                {{ session('error') }}
                ______________________
            </div>    
        @endif
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex items-center justify-center mt-4 align-middle">
                <a href="{{ route('auth.google') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>