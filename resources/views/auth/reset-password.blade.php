<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-serif font-bold text-university-900 text-center">Restablecer Contraseña</h2>
        <p class="text-sm text-slate-600 text-center mt-2">Ingresa tu nueva contraseña</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" class="text-slate-700 font-medium" />
            <x-text-input id="email" 
                class="input-university mt-1.5" 
                type="email" 
                name="email" 
                :value="old('email', $request->email)" 
                required 
                autofocus 
                autocomplete="username"
                placeholder="tu.email@ejemplo.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Nueva Contraseña')" class="text-slate-700 font-medium" />
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
                Restablecer Contraseña
            </button>
        </div>
    </form>
</x-guest-layout>