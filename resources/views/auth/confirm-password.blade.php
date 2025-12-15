<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-serif font-bold text-university-900 text-center">Confirmar Contraseña</h2>
        <p class="text-sm text-slate-600 text-center mt-2">
            Esta es un área segura de la aplicación. Por favor confirma tu contraseña para continuar.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" value="Contraseña" class="text-slate-700 font-medium" />
            <x-text-input id="password" 
                class="input-university mt-1.5" 
                type="password"
                name="password"
                required 
                autocomplete="current-password"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full btn-university">
                Confirmar
            </button>
        </div>
    </form>
</x-guest-layout>