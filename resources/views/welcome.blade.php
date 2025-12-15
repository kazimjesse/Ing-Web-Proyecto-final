<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Sistema de Matrícula') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|merriweather:700,900" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gradient-to-br from-slate-50 to-slate-100">
        <div class="min-h-screen flex flex-col">
            
            {{-- Header --}}
            <header class="bg-white border-b border-slate-200 shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <svg class="w-10 h-10 text-university-700 mr-3" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 45 L20 75 L50 70 L50 40 Z" fill="currentColor" opacity="0.9"/>
                                <path d="M50 40 L50 70 L80 75 L80 45 Z" fill="currentColor" opacity="0.7"/>
                                <path d="M20 45 L50 40 L80 45" stroke="currentColor" stroke-width="2" fill="none"/>
                                <rect x="30" y="20" width="40" height="3" fill="currentColor"/>
                                <path d="M25 23 L50 18 L75 23 L50 28 Z" fill="currentColor"/>
                                <circle cx="75" cy="23" r="2" fill="currentColor"/>
                                <line x1="75" y1="25" x2="75" y2="35" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                            <span class="text-2xl font-serif font-bold text-university-900">
                                {{ config('app.name', 'Sistema de Matrícula') }}
                            </span>
                        </div>
                        @if (Route::has('login'))
                            <nav class="flex gap-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" 
                                       class="px-4 py-2 rounded-md bg-university-700 text-white font-medium hover:bg-university-800 transition-colors">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" 
                                       class="px-4 py-2 rounded-md border-2 border-university-700 text-university-700 font-medium hover:bg-university-50 transition-colors">
                                        Iniciar Sesión
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" 
                                           class="px-4 py-2 rounded-md bg-university-700 text-white font-medium hover:bg-university-800 transition-colors">
                                            Registrarse
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </div>
                </div>
            </header>

            {{-- Hero Section --}}
            <main class="flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-8 py-20">
                <div class="max-w-4xl mx-auto text-center">
                    <h1 class="font-serif font-bold text-5xl sm:text-6xl text-university-900 mb-6">
                        Bienvenido al Sistema de Matrícula
                    </h1>
                    <p class="text-xl text-slate-600 mb-12 max-w-2xl mx-auto">
                        Plataforma académica para la gestión integral de estudiantes, docentes, materias y planes de estudio.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-16">
                        <div class="bg-white rounded-lg p-6 shadow-md border border-slate-200">
                            <div class="w-12 h-12 bg-university-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-university-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-slate-900 mb-2">Gestión de Estudiantes</h3>
                            <p class="text-sm text-slate-600">Administra la información académica y personal de los estudiantes</p>
                        </div>

                        <div class="bg-white rounded-lg p-6 shadow-md border border-slate-200">
                            <div class="w-12 h-12 bg-university-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-university-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-slate-900 mb-2">Planes de Estudio</h3>
                            <p class="text-sm text-slate-600">Organiza materias y estructura curricular por semestres</p>
                        </div>

                        <div class="bg-white rounded-lg p-6 shadow-md border border-slate-200">
                            <div class="w-12 h-12 bg-university-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-university-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-slate-900 mb-2">Proceso de Matrícula</h3>
                            <p class="text-sm text-slate-600">Facilita la inscripción de estudiantes en grupos y materias</p>
                        </div>
                    </div>

                    @guest
                        <div class="mt-12">
                            <a href="{{ route('login') }}" 
                               class="inline-flex items-center px-8 py-3 rounded-md bg-university-700 text-white font-semibold text-lg hover:bg-university-800 transition-colors shadow-lg">
                                Acceder al Sistema
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    @endguest
                </div>
            </main>

            {{-- Footer --}}
            <footer class="bg-white border-t border-slate-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    <p class="text-center text-sm text-slate-600">
                        © {{ date('Y') }} Sistema de Matrícula Académica. Todos los derechos reservados.
                    </p>
                </div>
            </footer>

        </div>
    </body>
</html>