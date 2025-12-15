<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-serif font-bold text-3xl text-university-900 leading-tight">
                    Auto-Matrícula
                </h2>
                <p class="mt-1 text-sm text-slate-600">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</p>
            </div>
            <a href="{{ route('dashboard') }}"
               class="inline-flex items-center px-4 py-2 bg-slate-100 border border-slate-300 rounded-md font-medium text-sm text-slate-700 hover:bg-slate-200 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        {{-- Mensajes --}}
        @if(session('success'))
            <div class="p-4 rounded-lg bg-green-50 border border-green-200">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <p class="ml-3 text-sm text-green-800 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 rounded-lg bg-red-50 border border-red-200">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <p class="ml-3 text-sm text-red-800 font-medium">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        {{-- Seleccionar Materia --}}
        <div class="university-card">
            <div class="university-card-header">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <h3 class="text-lg font-semibold">Seleccionar Materia</h3>
                </div>
            </div>

            <div class="p-6">
                <form method="GET" action="{{ route('mi.matricular') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                    <div class="md:col-span-2">
                        <label for="materia_id" class="block text-sm font-semibold text-slate-900 mb-2">
                            Materia
                            <span class="text-red-500">*</span>
                        </label>
                        <select name="materia_id"
                                id="materia_id"
                                class="input-university w-full"
                                required>
                            <option value="">Seleccione una materia</option>
                            @foreach($materias as $m)
                                <option value="{{ $m->id }}" {{ (string)$materiaId === (string)$m->id ? 'selected' : '' }}>
                                    {{ $m->codigo }} - {{ $m->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="btn-university w-full inline-flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Ver Grupos
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Grupos Disponibles --}}
        <div class="university-card">
            <div class="university-card-header">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <h3 class="text-lg font-semibold">Grupos Disponibles</h3>
                </div>
            </div>

            @if(!$materiaId)
                <div class="p-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-slate-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <p class="text-slate-600 font-medium">Selecciona una materia</p>
                    <p class="text-sm text-slate-500 mt-1">Usa el formulario superior para ver los grupos disponibles</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="table-university">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Docente</th>
                                <th>Horario</th>
                                <th>Cupos</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($grupos as $g)
                                <tr>
                                    <td>
                                        <span class="font-mono font-semibold text-university-700">{{ $g->codigo }}</span>
                                    </td>
                                    <td>
                                        <div class="text-sm text-slate-900">
                                            {{ $g->docente ? $g->docente->nombre . ' ' . $g->docente->apellido : 'Sin asignar' }}
                                        </div>
                                    </td>
                                    <td>
                                        @if($g->horarios->count())
                                            <div class="space-y-1">
                                                @foreach($g->horarios as $h)
                                                    <div class="text-xs text-slate-700">
                                                        <span class="font-semibold">{{ $h->dia }}</span> 
                                                        {{ \Carbon\Carbon::parse($h->hora_inicio)->format('H:i') }} - 
                                                        {{ \Carbon\Carbon::parse($h->hora_fin)->format('H:i') }} 
                                                        <span class="text-slate-500">({{ ucfirst($h->tipo) }})</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-xs text-slate-500">Sin horario</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-2">
                                            <span class="font-semibold text-slate-900">{{ $g->cupo_actual }}/{{ $g->cupo_maximo }}</span>
                                            <span class="badge-info">{{ $g->cupos_disponibles }} disp.</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex justify-center">
                                            <form method="POST" action="{{ route('mi.matricular.store') }}">
                                                @csrf
                                                <input type="hidden" name="grupo_id" value="{{ $g->id }}">
                                                <button type="submit"
                                                        class="btn-university inline-flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                    </svg>
                                                    Matricular
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-12 text-center">
                                        <svg class="w-12 h-12 mx-auto text-slate-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                        <p class="text-slate-600 font-medium">No hay grupos disponibles</p>
                                        <p class="text-sm text-slate-500 mt-1">No existen grupos con cupo para esta materia</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>
</x-app-layout>