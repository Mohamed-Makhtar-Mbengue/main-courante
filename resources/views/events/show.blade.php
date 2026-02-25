@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto space-y-10">

    {{-- HEADER --}}
    <div class="bg-gray-800 p-8 rounded-2xl shadow-xl text-white">
        <h1 class="text-4xl font-bold mb-4">{{ $event->title }}</h1>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <p class="text-gray-300">Responsable :</p>
                <p class="text-xl font-semibold">{{ $event->responsable }}</p>
            </div>

            <div>
                <p class="text-gray-300">Dates :</p>
                <p class="text-xl font-semibold">
                    {{ $event->start_date->format('d/m/Y') }} — {{ $event->end_date->format('d/m/Y') }}
                </p>
            </div>
        </div>

        @if($event->description)
            <div class="mt-6">
                <p class="text-gray-300">Description :</p>
                <p class="text-white">{{ $event->description }}</p>
            </div>
        @endif
    </div>

    {{-- SERVICES --}}
    <div class="bg-gray-800 p-8 rounded-2xl shadow-xl text-white">
        <h2 class="text-3xl font-bold mb-6">Services</h2>

        @if($event->shifts->isEmpty())
            <p class="text-gray-400">Aucun service enregistré.</p>
        @else
            <div class="space-y-4">
                @foreach($event->shifts as $shift)
                    <div class="bg-gray-700 p-4 rounded-xl flex justify-between items-center">
                        <div>
                            <p class="font-semibold">{{ $shift->user->name }}</p>
                            <p class="text-gray-300 text-sm">
                                {{ $shift->start_time }} — {{ $shift->end_time }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- MAIN COURANTE --}}
    <div class="bg-gray-800 p-8 rounded-2xl shadow-xl text-white">
        <h2 class="text-3xl font-bold mb-6">Main courante</h2>

        {{-- Formulaire d'ajout --}}
        <form action="{{ route('main-courante.store') }}" method="POST" class="space-y-4 mb-8">
            @csrf

            <input type="hidden" name="event_id" value="{{ $event->id }}">

            <div>
                <label class="block mb-1 text-gray-300">Heure de l’événement</label>
                <input type="time" name="heure_evenement" required
                       class="w-full px-4 py-2 bg-gray-700 rounded-lg">
            </div>

            <div>
                <label class="block mb-1 text-gray-300">Description</label>
                <textarea name="description" rows="3" required
                          class="w-full px-4 py-2 bg-gray-700 rounded-lg"></textarea>
            </div>

            <button class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg shadow font-semibold">
                Ajouter à la main courante
            </button>
        </form>

        {{-- Liste des entrées --}}
        @if($event->entries->isEmpty())
            <p class="text-gray-400">Aucune entrée pour le moment.</p>
        @else
            <div class="space-y-4">
                @foreach($event->entries as $entry)
                    <div class="bg-gray-700 p-4 rounded-xl">
                        <p class="font-semibold">{{ $entry->heure_evenement }} — {{ $entry->user->name }}</p>
                        <p class="text-gray-300">{{ $entry->description }}</p>
                        <p class="text-gray-500 text-sm mt-1">
                            {{ $entry->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>
@endsection
