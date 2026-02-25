@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    {{-- FORMULAIRE D’AJOUT RAPIDE --}}
    <div class="bg-gray-800 p-6 rounded-2xl shadow-xl text-white mb-10">

        <h2 class="text-2xl font-bold mb-4">Ajouter une entrée rapide</h2>

        <form action="{{ route('main-courante.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Sélection événement --}}
            <div>
                <label class="block mb-1 text-gray-300">Événement</label>
                <select name="event_id" required
                        class="w-full px-4 py-2 bg-gray-700 rounded-lg">
                    <option value="">Sélectionner un événement</option>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}">
                            {{ $event->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Heure --}}
            <div>
                <label class="block mb-1 text-gray-300">Heure</label>
                <input type="time" name="heure_evenement" required
                    class="w-full px-4 py-2 bg-gray-700 rounded-lg">
            </div>

            {{-- Description --}}
            <div>
                <label class="block mb-1 text-gray-300">Description</label>
                <textarea name="description" rows="3" required
                        class="w-full px-4 py-2 bg-gray-700 rounded-lg"
                        placeholder="Décrire l’événement rapidement..."></textarea>
            </div>

            {{-- Bouton --}}
            <button class="w-full py-3 bg-blue-600 hover:bg-blue-700 rounded-lg shadow font-semibold">
                Ajouter
            </button>
        </form>

    </div>



    <h1 class="text-3xl font-bold text-white">Main Courante</h1>

    <div class="bg-white/10 p-6 rounded-xl shadow-xl">
        <table class="w-full text-left text-white">
            <thead>
                <tr class="border-b border-gray-600">
                    <th class="py-2">Événement</th>
                    <th class="py-2">Heure</th>
                    <th class="py-2">Description</th>
                    <th class="py-2">Agent</th>
                    <th class="py-2">Date</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($entries as $entry)
                    <tr class="border-b border-gray-700">
                        <td class="py-2">{{ $entry->event->title }}</td>
                        <td class="py-2">{{ $entry->heure_evenement }}</td>
                        <td class="py-2">{{ $entry->description }}</td>
                        <td class="py-2">{{ $entry->user->name ?? 'N/A' }}</td>
                        <td class="py-2">{{ $entry->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $entries->links() }}
        </div>
    </div>

</div>
@endsection
