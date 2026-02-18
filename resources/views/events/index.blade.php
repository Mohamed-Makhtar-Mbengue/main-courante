@extends('layouts.app')

@section('title', 'Liste des événements')

@section('content')
    <h1>Liste des événements</h1>

    @if(auth()->user()->roles->pluck('name')->intersect(['admin', 'mi-admin'])->isNotEmpty())
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
                    <td>{{ $event->name ?? 'Sans nom' }}</td>
                    <td>{{ $event->responsable ?? '—' }}</td>
                    <td>{{ $event->start_date }} - {{ $event->end_date }}</td>
                    <td><a href="{{ route('events.show', $event) }}">Voir</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $events->links() }}
@endsection
