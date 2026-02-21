<!DOCTYPE html>
<html lang="fr" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900 text-gray-100 min-h-screen">

    {{-- NAVBAR --}}
    <nav class="bg-gray-800 text-white px-6 py-4 shadow-lg">
        <div class="flex items-center justify-between">
            <a href="/" class="text-xl font-bold">Main Courante</a>

            <div class="flex items-center gap-6">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-400">Dashboard</a>
                <a href="{{ route('events.index') }}" class="hover:text-blue-400">Événements</a>
                <a href="{{ route('users.index') }}" class="hover:text-blue-400">Utilisateurs</a>
                <a href="{{ route('shifts.index') }}" class="hover:text-blue-400">Services</a>
                <a href="{{ route('maincourante.index') }}" class="hover:text-blue-400">Main Courante</a>

                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg">
                            Déconnexion
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    {{-- CONTENU --}}
    <main class="py-10 px-6">
        @yield('content')
    </main>

</body>
</html>
