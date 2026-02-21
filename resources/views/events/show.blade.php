@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto space-y-10">

    {{-- Informations de l'événement --}}
    <div class="bg-gray-800 rounded-2xl shadow-xl p-8">
        <h1 class="text-4xl font-bold mb-4">{{ $event->name }}</h1>

        <p class="text-gray-300 text-lg mb-2">
            <span class="font-semibold text-white">Responsable :</span> {{ $event->responsable }}
        </p>

        <p class="text-gray-300 text-lg mb-2">
            <span class="font-semibold text-white">Du :</span> {{ $event->start_date }}
            <span class="font-semibold text-white">au :</span> {{ $event->end_date }}
        </p>

        <p class="text-gray-300 text-lg mt-4">
            {{ $event->description }}
        </p>
    </div>

    {{-- Section Services --}}
    <div class="bg-gray-800 rounded-2xl shadow-xl p-8">
        <h2 class="text-3xl font-bold mb-6">Services (Jour / Nuit)</h2>

        {{-- Formulaire d'ajout de service --}}
        <form action="{{ route('shifts.store') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Agent --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Agent</label>
                    <select name="user_id"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Type --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Type</label>
                    <select name="type"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500">
                        <option value="jour">Journée</option>
                        <option value="nuit">Nuit</option>
                    </select>
                </div>

                {{-- Carte Pro --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Carte Pro</label>
                    <input type="text" name="carte_pro"
                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Heure arrivée --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Heure arrivée</label>
                    <input type="time" name="heure_arrivee"
                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Heure départ --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Heure départ</label>
                    <input type="time" name="heure_depart"
                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500">
                </div>

            </div>

            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md">
                Ajouter service
            </button>
        </form>
    </div>

    {{-- Section Main Courante --}}
    <div class="bg-gray-800 rounded-2xl shadow-xl p-8">
        <h2 class="text-3xl font-bold mb-6">Main courante</h2>

        {{-- Formulaire d'ajout --}}
        <form action="{{ route('maincourante.store') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Heure --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Heure de l'évènement</label>
                    <input type="time" name="heure_evenement"
                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Description --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                    <textarea name="description" rows="4"
                              class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

            </div>

            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md">
                Ajouter
            </button>
        </form>
    </div>

    {{-- Bouton retour --}}
    <a href="{{ route('events.index') }}"
       class="inline-block px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg shadow-md">
        Retour
    </a>

</div>
@endsection
