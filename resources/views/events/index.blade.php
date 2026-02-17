@extends('layouts.app')

@section('title', 'Liste des événements')

@section('content')
    <h1>Liste des événements</h1>

    @if(in_array(auth()->user()->role->name, ['admin', 'mi-admin']))
        <a href="{{ route('events.create') }}">Créer un événement</a>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Responsable</th>
                <th>Dates</th>
                <th>Fiche</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->responsable }}</td>
                    <td>{{ $event->start_date }} - {{ $event->end_date }}</td>
                    <td><a href="{{ route('events.show', $event) }}">Voir</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $events->links() }}
@endsection
