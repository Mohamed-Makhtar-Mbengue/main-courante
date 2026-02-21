@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">

    {{-- Titre --}}
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-4xl font-bold">Liste des événements</h1>

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
                    <th class="p-4 text-lg font-semibold">Fiche</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-white/10">
                @forelse ($events as $event)
                    <tr class="hover:bg-white/5 transition">
                        <td class="p-4 font-semibold text-white">
                            {{ $event->name }}
                        </td>

                        <td class="p-4">
                            {{ $event->responsable }}
                        </td>

                        <td class="p-4">
                            {{ $event->start_date }} — {{ $event->end_date }}
                        </td>

                        <td class="p-4">
                            <a href="{{ route('events.show', $event->id) }}"
                               class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow transition">
                                Voir
                            </a>
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

</div>
@endsection
