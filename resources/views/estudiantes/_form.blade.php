<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label for="nombre" class="block text-sm font-semibold text-slate-900 mb-2">
            Nombre
            <span class="text-red-500">*</span>
        </label>
        <input type="text" 
               id="nombre"
               name="nombre"
               value="{{ old('nombre', $estudiante->nombre ?? '') }}"
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
               value="{{ old('apellido', $estudiante->apellido ?? '') }}"
               class="input-university w-full"
               placeholder="Ej: Pérez"
               required>
    </div>

    <div>
        <label for="cedula" class="block text-sm font-semibold text-slate-900 mb-2">
            Cédula
            <span class="text-red-500">*</span>
        </label>
        <input type="text" 
               id="cedula"
               name="cedula"
               value="{{ old('cedula', $estudiante->cedula ?? '') }}"
               class="input-university w-full"
               placeholder="Ej: 8-123-4567"
               required>
    </div>

    <div>
        <label for="email" class="block text-sm font-semibold text-slate-900 mb-2">
            Correo Electrónico
            <span class="text-red-500">*</span>
        </label>
        <input type="email" 
               id="email"
               name="email"
               value="{{ old('email', $estudiante->email ?? '') }}"
               class="input-university w-full"
               placeholder="estudiante@ejemplo.com"
               required>
    </div>

    <div>
        <label for="telefono" class="block text-sm font-semibold text-slate-900 mb-2">
            Teléfono
        </label>
        <input type="text" 
               id="telefono"
               name="telefono"
               value="{{ old('telefono', $estudiante->telefono ?? '') }}"
               class="input-university w-full"
               placeholder="Ej: 6123-4567">
    </div>

    <div>
        <label for="plan_estudios_id" class="block text-sm font-semibold text-slate-900 mb-2">
            Plan de Estudios
            <span class="text-red-500">*</span>
        </label>
        <select id="plan_estudios_id"
                name="plan_estudios_id"
                class="input-university w-full"
                required>
            <option value="">Seleccione un plan</option>
            @foreach ($planes as $plan)
                <option value="{{ $plan->id }}"
                    {{ old('plan_estudios_id', $estudiante->plan_estudios_id ?? '') == $plan->id ? 'selected' : '' }}>
                    {{ $plan->codigo }} - {{ $plan->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="md:col-span-2">
        <label for="direccion" class="block text-sm font-semibold text-slate-900 mb-2">
            Dirección
        </label>
        <textarea id="direccion"
                  name="direccion" 
                  rows="3"
                  class="input-university w-full"
                  placeholder="Dirección completa del estudiante">{{ old('direccion', $estudiante->direccion ?? '') }}</textarea>
    </div>

</div>