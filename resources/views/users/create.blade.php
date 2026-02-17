@extends('layouts.app')

@section('content')
<h1>Créer un utilisateur</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <label>Nom</label>
    <input type="text" name="name">

    <label>Email</label>
    <input type="email" name="email">

    <label>Mot de passe</label>
    <input type="password" name="password">

    <label>Rôle</label>
    <select name="role_id">
        @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>

    <button type="submit">Créer</button>
</form>
@endsection
