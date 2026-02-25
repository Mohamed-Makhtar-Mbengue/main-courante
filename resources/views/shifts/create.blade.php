@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto space-y-10">

    <h1 class="text-3xl font-bold text-center">Créer un shift</h1>

    <div class="bg-gray-800 rounded-2xl shadow-xl p-8">

        <form action="{{ route('shifts.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Événement --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Événement</label>
                <select name="event_id"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white"
                        required>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}">{{ $event->title }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Agent --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Agent</label>
                <select name="user_id"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white"
                        required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Type --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Type</label>
                <select name="type"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white"
                        required>
                    <option value="jour">Jour</option>
                    <option value="nuit">Nuit</option>
                </select>
            </div>

            {{-- Carte Pro --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Carte professionnelle</label>
                <input type="text" name="carte_pro"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white"
                       placeholder="Numéro de carte pro (optionnel)">
            </div>

            {{-- Heure d'arrivée --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Heure d'arrivée</label>
                <input type="time" name="h_arrivee"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white"
                       required>
            </div>

            {{-- Heure de départ --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Heure de départ</label>
                <input type="time" name="h_depart"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white"
                       required>
            </div>

            {{-- Signature --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Signature</label>
                <input type="text" name="signature"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white"
                       placeholder="Signature (optionnel)">
            </div>

            {{-- Bouton --}}
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md">
                Créer le shift
            </button>

        </form>

    </div>

    <div class="text-center">
        <a href="{{ route('shifts.index') }}"
           class="inline-block px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg shadow-md">
            Retour
        </a>
    </div>

</div>
@endsection
