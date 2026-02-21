@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">

    <h1 class="text-4xl font-bold mb-10">Créer un événement</h1>

    <div class="bg-gray-800 rounded-2xl shadow-xl p-8">

        <form action="{{ route('events.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Nom de l'événement --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Nom de l'événement
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       required
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white
                              placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Responsable --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Responsable
                </label>

                <input type="text"
                       name="responsable"
                       value="{{ old('responsable') }}"
                       required
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white
                              placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Description
                </label>

                <textarea name="description"
                          rows="4"
                          class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white
                                 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
            </div>

            {{-- Date de début --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Date de début
                </label>

                <input type="date"
                       name="start_date"
                       value="{{ old('start_date') }}"
                       required
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white
                              focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Date de fin --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Date de fin
                </label>

                <input type="date"
                       name="end_date"
                       value="{{ old('end_date') }}"
                       required
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white
                              focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Bouton --}}
            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 transition duration-200 text-white font-semibold py-3 rounded-lg shadow-md">
                Créer l’événement
            </button>

        </form>

    </div>

</div>
@endsection
