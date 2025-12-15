<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6">
        <h2 class="text-2xl font-serif font-bold text-university-900 text-center">Iniciar Sesión</h2>
        <p class="text-sm text-slate-600 text-center mt-2">Ingresa tus credenciales para continuar</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
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
                autocomplete="current-password"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" 
                    type="checkbox" 
                    class="rounded border-slate-300 text-university-700 shadow-sm focus:ring-university-500" 
                    name="remember">
                <span class="ml-2 text-sm text-slate-600">Recordarme</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-university-700 hover:text-university-800 font-medium transition-colors" 
                   href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full btn-university">
                Iniciar Sesión
            </button>
        </div>

        @if (Route::has('register'))
            <div class="text-center pt-4 border-t border-slate-200">
                <p class="text-sm text-slate-600">
                    ¿No tienes una cuenta? 
                    <a href="{{ route('register') }}" class="text-university-700 hover:text-university-800 font-medium transition-colors">
                        Regístrate aquí
                    </a>
                </p>
            </div>
        @endif
    </form>
</x-guest-layout>