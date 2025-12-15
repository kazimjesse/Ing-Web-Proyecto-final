<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-serif font-bold text-university-900 text-center">Recuperar Contraseña</h2>
        <p class="text-sm text-slate-600 text-center mt-2">
            Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" class="text-slate-700 font-medium" />
            <x-text-input id="email" 
                class="input-university mt-1.5" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus
                placeholder="tu.email@ejemplo.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full btn-university">
                Enviar Enlace de Recuperación
            </button>
        </div>

        <div class="text-center pt-4 border-t border-slate-200">
            <a href="{{ route('login') }}" class="text-sm text-university-700 hover:text-university-800 font-medium transition-colors inline-flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver al inicio de sesión
            </a>
        </div>
    </form>
</x-guest-layout>