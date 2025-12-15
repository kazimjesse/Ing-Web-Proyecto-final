<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-serif font-bold text-university-900 text-center">Verifica tu Correo</h2>
        <p class="text-sm text-slate-600 text-center mt-2">
            ¡Gracias por registrarte! Antes de comenzar, verifica tu dirección de correo haciendo clic en el enlace que te enviamos.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200">
            <div class="flex items-start">
                <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <p class="ml-3 text-sm text-green-800 font-medium">
                    Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
                </p>
            </div>
        </div>
    @endif

    <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg mb-6">
        <div class="flex">
            <svg class="w-5 h-5 text-blue-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
            </svg>
            <div class="ml-3">
                <p class="text-sm text-blue-800">
                    Si no recibiste el correo, te enviaremos otro con gusto.
                </p>
            </div>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
            @csrf
            <button type="submit" class="btn-university w-full sm:w-auto inline-flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Reenviar Correo
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                    class="text-sm text-slate-600 hover:text-university-700 font-medium transition-colors underline">
                Cerrar Sesión
            </button>
        </form>
    </div>
</x-guest-layout>