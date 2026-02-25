@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <form method="GET" class="mb-6 flex flex-wrap gap-4">

        {{-- Recherche --}}
        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Rechercher un événement..."
            class="px-4 py-2 bg-gray-700 text-white rounded-lg">

        {{-- Filtre responsable --}}
        <select name="responsable" class="px-4 py-2 bg-gray-700 text-white rounded-lg">
            <option value="">Tous les responsables</option>
            @foreach($responsables as $resp)
                <option value="{{ $resp }}" {{ request('responsable') == $resp ? 'selected' : '' }}>
                    {{ $resp }}
                </option>
            @endforeach
        </select>

        {{-- Filtre date --}}
        <input type="date" name="date" value="{{ request('date') }}"
            class="px-4 py-2 bg-gray-700 text-white rounded-lg">

        <button class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
            Filtrer
        </button>

    </form>


    {{-- Titre --}}
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-4xl font-bold text-white">Liste des événements</h1>

        <a href="{{ route('events.create') }}"
           class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg transition">
            Créer un événement
        </a>
    </div>

    {{-- Tableau --}}
    <div class="overflow-hidden rounded-xl shadow-xl bg-white/10 backdrop-blur-lg">
        <table class="w-full text-left">
            <thead class="bg-white/20 text-gray-200">
                <tr>
                    <th class="p-4 text-lg font-semibold">Nom</th>
                    <th class="p-4 text-lg font-semibold">Responsable</th>
                    <th class="p-4 text-lg font-semibold">Dates</th>
                    <th class="p-4 text-lg font-semibold">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-white/10">
                @forelse ($events as $event)
                    <tr class="hover:bg-white/5 transition">

                        {{-- NOM --}}
                        <td class="p-4 font-semibold text-white">
                            {{ $event->title }}
                        </td>

                        {{-- RESPONSABLE --}}
                        <td class="p-4 text-white">
                            {{ $event->responsable }}
                        </td>

                        {{-- DATES --}}
                        <td class="p-4 text-white">
                            {{ $event->start_date }} — {{ $event->end_date }}
                        </td>

                        {{-- ACTIONS --}}
                        <td class="p-4 flex gap-3">

                            {{-- Voir --}}
                            <a href="{{ route('events.show', $event->id) }}"
                               class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow transition">
                                Voir
                            </a>

                            {{-- Modifier --}}
                            <a href="{{ route('events.edit', $event->id) }}"
                               class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg shadow transition">
                                Modifier
                            </a>

                            {{-- Supprimer --}}
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                  onsubmit="return confirm('Supprimer cet événement ?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg shadow transition">
                                    Supprimer
                                </button>
                            </form>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-6 text-center text-gray-300">
                            Aucun événement pour le moment.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6 text-center">
        {{ $events->links('pagination::tailwind') }}
    </div>

</div>
@endsection
