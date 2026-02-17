@extends('layouts.app')

@section('content')
<h1>Modifier un utilisateur</h1>

<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nom</label>
    <input type="text" name="name" value="{{ $user->name }}">

    <label>Email</label>
    <input type="email" name="email" value="{{ $user->email }}">

    <label>Nouveau mot de passe (optionnel)</label>
    <input type="password" name="password">

    <label>Rôle</label>
    <select name="role_id">
        @foreach($roles as $role)
            <option value="{{ $role->id }}" @selected($user->role_id == $role->id)>
                {{ $role->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Mettre à jour</button>
</form>
@endsection
