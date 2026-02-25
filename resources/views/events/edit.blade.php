@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-800 p-8 rounded-2xl shadow-xl text-white">

    <h1 class="text-3xl font-bold mb-6">Modifier l’événement</h1>

    <form action="{{ route('events.update', $event->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Titre --}}
        <div>
            <label class="block mb-1 text-gray-300">Nom de l’événement</label>
            <input type="text" name="title" value="{{ $event->title }}" required
                   class="w-full px-4 py-2 bg-gray-700 rounded-lg">
        </div>

        {{-- Responsable --}}
        <div>
            <label class="block mb-1 text-gray-300">Responsable</label>
            <input type="text" name="responsable" value="{{ $event->responsable }}" required
                   class="w-full px-4 py-2 bg-gray-700 rounded-lg">
        </div>

        {{-- Dates --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 text-gray-300">Date de début</label>
                <input type="date" name="start_date" value="{{ $event->start_date->format('Y-m-d') }}" required
                       class="w-full px-4 py-2 bg-gray-700 rounded-lg">
            </div>

            <div>
                <label class="block mb-1 text-gray-300">Date de fin</label>
                <input type="date" name="end_date" value="{{ $event->end_date->format('Y-m-d') }}" required
                       class="w-full px-4 py-2 bg-gray-700 rounded-lg">
            </div>
        </div>

        {{-- Description --}}
        <div>
            <label class="block mb-1 text-gray-300">Description (optionnel)</label>
            <textarea name="description" rows="4"
                      class="w-full px-4 py-2 bg-gray-700 rounded-lg">{{ $event->description }}</textarea>
        </div>

        {{-- Boutons --}}
        <div class="flex justify-between items-center mt-6">

            <a href="{{ route('events.index') }}"
               class="px-6 py-3 bg-gray-600 hover:bg-gray-700 rounded-lg shadow text-white">
                Annuler
            </a>

            <button class="px-6 py-3 bg-yellow-600 hover:bg-yellow-700 rounded-lg shadow font-semibold">
                Mettre à jour
            </button>
        </div>

    </form>

</div>
@endsection
