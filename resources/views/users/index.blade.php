@extends('layouts.app')

@section('content')
<h1>Gestion des utilisateurs</h1>

<a href="{{ route('users.create') }}">Créer un utilisateur</a>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name }}</td>
            <td>
                <a href="{{ route('users.edit', $user) }}">Modifier</a>
                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}
@endsection
