<section>
    <header class="mb-6">
        <h2 class="text-lg font-semibold text-slate-900">
            Actualizar Contraseña
        </h2>
        <p class="mt-1 text-sm text-slate-600">
            Asegúrate de usar una contraseña larga y segura para proteger tu cuenta.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Contraseña Actual -->
        <div>
            <x-input-label for="update_password_current_password" value="Contraseña Actual" class="text-slate-700 font-medium" />
            <x-text-input id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="input-university mt-1.5" 
                autocomplete="current-password"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- Nueva Contraseña -->
        <div>
            <x-input-label for="update_password_password" value="Nueva Contraseña" class="text-slate-700 font-medium" />
            <x-text-input id="update_password_password" 
                name="password" 
                type="password" 
                class="input-university mt-1.5" 
                autocomplete="new-password"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            <p class="mt-2 text-xs text-slate-500">Mínimo 8 caracteres. Se recomienda usar letras, números y símbolos.</p>
        </div>

        <!-- Confirmar Contraseña -->
        <div>
            <x-input-label for="update_password_password_confirmation" value="Confirmar Nueva Contraseña" class="text-slate-700 font-medium" />
            <x-text-input id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="input-university mt-1.5" 
                autocomplete="new-password"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Botones -->
        <div class="flex items-center gap-4 pt-4 border-t border-slate-200">
            <x-primary-button>Actualizar Contraseña</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm text-green-600 flex items-center"
                >
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Contraseña actualizada
                </p>
            @endif
        </div>
    </form>
</section>