@extends('layouts.app')

@section('title', 'Créer un événement')

@section('content')
    <h1>Créer un événement</h1>

    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <label>Nom</label>
        <input type="text" name="name" value="{{ old('name') }}">

        <label>Responsable</label>
        <input type="text" name="responsable" value="{{ old('responsable') }}">

        <label>Date début</label>
        <input type="date" name="start_date" value="{{ old('start_date') }}">

        <label>Date fin</label>
        <input type="date" name="end_date" value="{{ old('end_date') }}">

        <label>Description</label>
        <textarea name="description">{{ old('description') }}</textarea>

        <button type="submit">Créer</button>
    </form>
@endsection
