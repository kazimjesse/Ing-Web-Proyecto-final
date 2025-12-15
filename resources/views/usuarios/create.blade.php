<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-serif font-bold text-3xl text-university-900 leading-tight">
                    Crear Nuevo Usuario
                </h2>
                <p class="mt-1 text-sm text-slate-600">Registra un nuevo usuario en el sistema</p>
            </div>
            <a href="{{ route('usuarios.index') }}"
               class="inline-flex items-center px-4 py-2 bg-slate-100 border border-slate-300 rounded-md font-medium text-sm text-slate-700 hover:bg-slate-200 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver
            </a>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Errores de validación --}}
        @if ($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <div class="ml-3">
                        <h3 class="text-sm font-semibold text-red-800">Hay errores en el formulario:</h3>
                        <ul class="mt-2 text-sm text-red-700 list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        {{-- Formulario --}}
        <div class="university-card">
            <div class="university-card-header">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                    <h3 class="text-lg font-semibold">Información del Usuario</h3>
                </div>
            </div>

            <div class="p-8">
                <form method="POST" action="{{ route('usuarios.store') }}" class="space-y-6">
                    @csrf

                    {{-- Nombre y Apellido --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nombre" class="block text-sm font-semibold text-slate-900 mb-2">
                                Nombre
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="nombre"
                                   name="nombre" 
                                   value="{{ old('nombre') }}"
                                   class="input-university w-full"
                                   placeholder="Ej: Juan"
                                   required>
                        </div>

                        <div>
                            <label for="apellido" class="block text-sm font-semibold text-slate-900 mb-2">
                                Apellido
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="apellido"
                                   name="apellido" 
                                   value="{{ old('apellido') }}"
                                   class="input-university w-full"
                                   placeholder="Ej: Pérez"
                                   required>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-900 mb-2">
                            Correo Electrónico
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="email" 
                               id="email"
                               name="email" 
                               value="{{ old('email') }}"
                               class="input-university w-full"
                               placeholder="usuario@ejemplo.com"
                               required>
                        <p class="mt-1 text-xs text-slate-500">Este será el correo de acceso al sistema</p>
                    </div>

                    {{-- Rol --}}
                    <div>
                        <label for="rol" class="block text-sm font-semibold text-slate-900 mb-2">
                            Rol del Usuario
                            <span class="text-red-500">*</span>
                        </label>
                        <select id="rol"
                                name="rol" 
                                class="input-university w-full"
                                required>
                            <option value="">Seleccione un rol</option>
                            <option value="estudiante" {{ old('rol') == 'estudiante' ? 'selected' : '' }}>Estudiante</option>
                            <option value="docente" {{ old('rol') == 'docente' ? 'selected' : '' }}>Docente</option>
                            <option value="administrador" {{ old('rol') == 'administrador' ? 'selected' : '' }}>Administrador</option>
                        </select>
                        <p class="mt-1 text-xs text-slate-500">Define los permisos y accesos del usuario</p>
                    </div>

                    {{-- Plan de Estudios (solo para estudiantes) --}}
                    <div id="planBox" style="display:none;">
                        <label for="plan_estudios_id" class="block text-sm font-semibold text-slate-900 mb-2">
                            Plan de Estudios
                            <span class="text-red-500">*</span>
                        </label>
                        <select id="plan_estudios_id"
                                name="plan_estudios_id" 
                                class="input-university w-full">
                            <option value="">Seleccione un plan de estudios</option>
                            @foreach($planes as $plan)
                                <option value="{{ $plan->id }}" {{ old('plan_estudios_id') == $plan->id ? 'selected' : '' }}>
                                    {{ $plan->nombre }} ({{ $plan->codigo }})
                                </option>
                            @endforeach
                        </select>
                        <p class="mt-1 text-xs text-slate-500">Asigna el programa académico del estudiante</p>
                    </div>

                    {{-- Contraseñas --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="password" class="block text-sm font-semibold text-slate-900 mb-2">
                                Contraseña
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="password" 
                                   id="password"
                                   name="password" 
                                   class="input-university w-full"
                                   placeholder="••••••••"
                                   required>
                            <p class="mt-1 text-xs text-slate-500">Mínimo 8 caracteres</p>
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-slate-900 mb-2">
                                Confirmar Contraseña
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="password" 
                                   id="password_confirmation"
                                   name="password_confirmation" 
                                   class="input-university w-full"
                                   placeholder="••••••••"
                                   required>
                        </div>
                    </div>

                    {{-- Información adicional --}}
                    <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg">
                        <div class="flex">
                            <svg class="w-5 h-5 text-blue-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <div class="ml-3">
                                <h4 class="text-sm font-semibold text-blue-900">Nota importante</h4>
                                <p class="mt-1 text-sm text-blue-800">El usuario recibirá las credenciales de acceso por correo electrónico. Asegúrate de que la dirección de correo sea correcta.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Botones --}}
                    <div class="flex justify-end gap-3 pt-6 border-t border-slate-200">
                        <a href="{{ route('usuarios.index') }}"
                           class="inline-flex items-center px-6 py-2.5 bg-white border-2 border-slate-300 rounded-md font-medium text-sm text-slate-700 hover:bg-slate-50 transition-colors">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="btn-university inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            Crear Usuario
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>

    {{-- Script para mostrar/ocultar plan de estudios --}}
    <script>
        const rolSelect = document.querySelector('select[name="rol"]');
        const planBox = document.getElementById('planBox');
        const planSelect = document.querySelector('select[name="plan_estudios_id"]');

        function togglePlan() {
            if (rolSelect.value === 'estudiante') {
                planBox.style.display = 'block';
                planSelect.required = true;
            } else {
                planBox.style.display = 'none';
                planSelect.required = false;
                planSelect.value = '';
            }
        }

        rolSelect.addEventListener('change', togglePlan);
        togglePlan();
    </script>
</x-app-layout>