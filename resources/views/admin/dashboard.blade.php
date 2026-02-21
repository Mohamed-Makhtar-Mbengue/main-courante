@extends('layouts.app')

@section('content')
<div class="min-h-screen p-10 bg-gray-900 text-gray-100">

    <h1 class="text-4xl font-bold mb-2">Tableau de bord administrateur</h1>
    <p class="opacity-70 mb-10">Bienvenue, {{ auth()->user()->name }}</p>

    <div class="overflow-hidden rounded-xl shadow-xl bg-white/10 backdrop-blur-lg">
        <table class="w-full text-left">
            <thead class="bg-white/20 text-gray-200">
                <tr>
                    <th class="p-4 text-lg font-semibold">Catégorie</th>
                    <th class="p-4 text-lg font-semibold">Total</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                <tr>
                    <td class="p-4">Utilisateurs</td>
                    <td class="p-4 font-bold text-2xl">{{ $usersCount }}</td>
                </tr>
                <tr>
                    <td class="p-4">Événements</td>
                    <td class="p-4 font-bold text-2xl">{{ $eventsCount }}</td>
                </tr>
                <tr>
                    <td class="p-4">Services</td>
                    <td class="p-4 font-bold text-2xl">{{ $shiftsCount }}</td>
                </tr>
                <tr>
                    <td class="p-4">Main courante</td>
                    <td class="p-4 font-bold text-2xl">{{ $mainCouranteCount }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h2 class="text-3xl font-bold mt-12 mb-6 text-center">Gestion rapide</h2>

    <div class="flex flex-wrap justify-center gap-6">
        <a href="{{ route('events.index') }}"
           class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg transition">
            Gérer les événements
        </a>

        <a href="{{ route('users.index') }}"
           class="px-8 py-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-lg transition">
            Gérer les utilisateurs
        </a>

        <a href="{{ route('shifts.index') }}"
           class="px-8 py-4 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg shadow-lg transition">
            Ajouter un service
        </a>

        <a href="{{ route('maincourante.index') }}"
           class="px-8 py-4 bg-orange-600 hover:bg-orange-700 text-white font-semibold rounded-lg shadow-lg transition">
            Ajouter une entrée main courante
        </a>
    </div>

</div>
@endsection
