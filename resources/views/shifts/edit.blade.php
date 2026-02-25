@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto space-y-10">

    <h1 class="text-3xl font-bold text-center">Modifier un shift</h1>

    <div class="bg-gray-800 rounded-2xl shadow-xl p-8">

        <form action="{{ route('shifts.update', $shift) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Événement --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Événement</label>
                <select name="event_id"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white"
                        required>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}"
                            {{ $shift->event_id == $event->id ? 'selected' : '' }}>
                            {{ $event->title }}
                        </option>
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
                        <option value="{{ $user->id }}"
                            {{ $shift->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Type --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Type</label>
                <select name="type"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white"
                        required>
                    <option value="jour" {{ $shift->type == 'jour' ? 'selected' : '' }}>Jour</option>
                    <option value="nuit" {{ $shift->type == 'nuit' ? 'selected' : '' }}>Nuit</option>
                </select>
            </div>

            {{-- Carte Pro --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Carte professionnelle</label>
                <input type="text" name="carte_pro"
                       value="{{ $shift->carte_pro }}"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white">
            </div>

            {{-- Heure d'arrivée --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Heure d'arrivée</label>
                <input type="time" name="h_arrivee"
                       value="{{ substr($shift->h_arrivee, 0, 5) }}"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white"
                       required>
            </div>

            {{-- Heure de départ --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Heure de départ</label>
                <input type="time" name="h_depart"
                       value="{{ substr($shift->h_depart, 0, 5) }}"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white"
                       required>
            </div>

            {{-- Signature --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Signature</label>
                <input type="text" name="signature"
                       value="{{ $shift->signature }}"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white">
            </div>

            {{-- Bouton --}}
            <button class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-3 rounded-lg shadow-md">
                Mettre à jour
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
