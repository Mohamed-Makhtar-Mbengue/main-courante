@extends('layouts.app')

@section('title', 'Ma main courante')

@section('content')
    <h1>Ma main courante</h1>

    <a href="{{ url()->previous() }}">Retour</a>

    <hr>

    <h2>Mes entrées</h2>

    <ul>
        @forelse($entries as $entry)
            <li>
                <strong>{{ $entry->heure_evenement }}</strong> :
                {{ $entry->description }}
            </li>
        @empty
            <p>Aucune entrée pour le moment.</p>
        @endforelse
    </ul>
@endsection
