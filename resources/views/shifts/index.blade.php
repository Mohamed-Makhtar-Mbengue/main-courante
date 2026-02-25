@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto space-y-10">
    <form method="GET" class="mb-6 flex flex-wrap gap-4">

        {{-- Recherche agent --}}
        <input type="text" name="agent" value="{{ request('agent') }}"
            placeholder="Rechercher un agent..."
            class="px-4 py-2 bg-gray-700 text-white rounded-lg">

        {{-- Filtre événement --}}
        <select name="event_id" class="px-4 py-2 bg-gray-700 text-white rounded-lg">
            <option value="">Tous les événements</option>
            @foreach($events as $event)
                <option value="{{ $event->id }}" {{ request('event_id') == $event->id ? 'selected' : '' }}>
                    {{ $event->title }}
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


    <h1 class="text-3xl font-bold">Liste des shifts</h1>

    <div class="flex justify-end">
        <a href="{{ route('shifts.create') }}"
           class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg transition">
            Créer un shift
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl shadow-xl bg-gray-800">
        <table class="w-full text-left">
            <thead class="bg-gray-700 text-gray-300">
                <tr>
                    <th class="p-4 text-lg font-semibold">Agent</th>
                    <th class="p-4 text-lg font-semibold">Carte Pro</th>
                    <th class="p-4 text-lg font-semibold">Début</th>
                    <th class="p-4 text-lg font-semibold">Fin</th>
                    <th class="p-4 text-lg font-semibold">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-700">
                @forelse($shifts as $shift)
                    <tr class="hover:bg-gray-700/50 transition">

                        <td class="p-4 text-white font-medium">
                            {{ $shift->user->name ?? '—' }}
                        </td>

                        <td class="p-4 text-gray-300">
                            {{ $shift->carte_pro ?? '—' }}
                        </td>

                        <td class="p-4 text-gray-300">
                            {{ \Carbon\Carbon::parse($shift->h_arrivee)->format('H:i') }}
                        </td>

                        <td class="p-4 text-gray-300">
                            {{ \Carbon\Carbon::parse($shift->h_depart)->format('H:i') }}
                        </td>

                        <td class="p-4 flex items-center gap-3">
                            <a href="{{ route('shifts.edit', $shift) }}"
                               class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg shadow transition">
                                Modifier
                            </a>

                            <form action="{{ route('shifts.destroy', $shift) }}" method="POST"
                                  onsubmit="return confirm('Supprimer ce shift ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg shadow transition">
                                    Supprimer
                                </button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-400">
                            Aucun shift pour le moment.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="text-center">
        {{ $shifts->links('pagination::tailwind') }}
    </div>

</div>
@endsection
