<x-guest-layout>
   <div class="card">
    
    <div class="card-body">
        <div class="mb-4 text-sm text-gray-600">
            ¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace para restablecer su contraseña que le permitirá elegir una nueva.
        </div>
    
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
    
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
    
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    Enviar enlace para restablecer contraseña de correo electrónico
                </x-primary-button>
            </div>
        </form>
    </div>
    
   </div>
   
</x-guest-layout>
