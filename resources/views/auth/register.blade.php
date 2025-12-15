<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-serif font-bold text-university-900 text-center">Crear Cuenta</h2>
        <p class="text-sm text-slate-600 text-center mt-2">Completa el formulario para registrarte</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre Completo')" class="text-slate-700 font-medium" />
            <x-text-input id="name" 
                class="input-university mt-1.5" 
                type="text" 
                name="name" 
                :value="old('name')" 
                required 
                autofocus 
                autocomplete="name"
                placeholder="Juan Pérez" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" class="text-slate-700 font-medium" />
            <x-text-input id="email" 
                class="input-university mt-1.5" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autocomplete="username"
                placeholder="tu.email@ejemplo.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Contraseña')" class="text-slate-700 font-medium" />
            <x-text-input id="password" 
                class="input-university mt-1.5"
                type="password"
                name="password"
                required 
                autocomplete="new-password"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-slate-700 font-medium" />
            <x-text-input id="password_confirmation" 
                class="input-university mt-1.5"
                type="password"
                name="password_confirmation"
                required 
                autocomplete="new-password"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full btn-university">
                Crear Cuenta
            </button>
        </div>

        <div class="text-center pt-4 border-t border-slate-200">
            <p class="text-sm text-slate-600">
                ¿Ya tienes una cuenta? 
                <a href="{{ route('login') }}" class="text-university-700 hover:text-university-800 font-medium transition-colors">
                    Inicia sesión aquí
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>