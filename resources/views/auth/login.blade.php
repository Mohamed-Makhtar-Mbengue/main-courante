@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4">
    <div class="w-full max-w-md bg-gray-800 rounded-2xl shadow-xl p-8">

        <h2 class="text-3xl font-bold text-center text-white mb-8">
            Connexion
        </h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                    Adresse Email
                </label>

                <input id="email"
                       type="email"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       autofocus
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 
                              focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                              @error('email') border-red-500 @enderror"
                       placeholder="exemple@email.com">

                @error('email')
                    <p class="mt-2 text-sm text-red-400">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                    Mot de passe
                </label>

                <input id="password"
                       type="password"
                       name="password"
                       required
                       autocomplete="current-password"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 
                              focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                              @error('password') border-red-500 @enderror"
                       placeholder="••••••••">

                @error('password')
                    <p class="mt-2 text-sm text-red-400">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Remember + Forgot --}}
            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-300">
                    <input type="checkbox"
                           name="remember"
                           class="mr-2 rounded bg-gray-700 border-gray-600 text-blue-600 focus:ring-blue-500"
                           {{ old('remember') ? 'checked' : '' }}>
                    Se souvenir de moi
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-sm text-blue-400 hover:text-blue-300">
                        Mot de passe oublié ?
                    </a>
                @endif
            </div>

            {{-- Submit --}}
            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 transition duration-200 text-white font-semibold py-3 rounded-lg shadow-md">
                Se connecter
            </button>

        </form>
    </div>
</div>
@endsection