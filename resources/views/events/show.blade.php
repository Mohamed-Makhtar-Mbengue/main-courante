@extends('layouts.app')

@section('title', 'Fiche événement')

@section('content')
    <h1>{{ $event->name }}</h1>
    <p>Responsable : {{ $event->responsable }}</p>
    <p>Du {{ $event->start_date }} au {{ $event->end_date }}</p>
    <p>{{ $event->description }}</p>

    <hr>

    <h2>Services (Jour / Nuit)</h2>

    @if(in_array(auth()->user()->role->name, ['admin', 'mi-admin']))
        <form action="{{ route('shifts.store') }}" method="POST">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">

            <label>Agent (user_id)</label>
            <input type="number" name="user_id">

            <label>Type</label>
            <select name="type">
                <option value="jour">Journée</option>
                <option value="nuit">Nuit</option>
            </select>

            <label>Carte Pro</label>
            <input type="text" name="carte_pro">

            <label>Heure arrivée</label>
            <input type="time" name="h_arrivee">

            <label>Heure départ</label>
            <input type="time" name="h_depart">

            <button type="submit">Ajouter service</button>
        </form>
    @endif

    <ul>
        @foreach($event->shifts as $shift)
            <li>
                {{ $shift->type }} - {{ $shift->user->name ?? 'N/A' }} :
                {{ $shift->h_arrivee }} - {{ $shift->h_depart }}
            </li>
        @endforeach
    </ul>

    <hr>

    <h2>Main courante</h2>

    <form action="{{ route('maincourante.store') }}" method="POST">
        @csrf
        <input type="hidden" name="event_id" value="{{ $event->id }}">

        <label>Heure de l'évènement</label>
        <input type="time" name="heure_evenement">

        <label>Description</label>
        <textarea name="description"></textarea>

        <button type="submit">Ajouter</button>
    </form>

    <ul>
        @foreach($event->entries as $entry)
            <li>
                {{ $entry->heure_evenement }} - {{ $entry->user->name }} :
                {{ $entry->description }}
            </li>
        @endforeach
    </ul>

    <a href="{{ route('events.index') }}">Retour</a>
@endsection
