@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-gray-800 p-8 rounded-2xl shadow-xl text-white">

    <h1 class="text-3xl font-bold mb-6">Modifier l’utilisateur</h1>

    <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        {{-- Nom --}}
        <div>
            <label class="block mb-1 text-gray-300">Nom</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                   class="w-full px-4 py-2 bg-gray-700 rounded-lg">
        </div>

        {{-- Email --}}
        <div>
            <label class="block mb-1 text-gray-300">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" readonly
                   class="w-full px-4 py-2 bg-gray-700 rounded-lg opacity-60 cursor-not-allowed">
        </div>

        {{-- Rôle --}}
        <div>
            <label class="block mb-1 text-gray-300">Rôle</label>
            <select name="role_id" class="w-full px-4 py-2 bg-gray-700 rounded-lg">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}"
                        {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                        {{ ucfirst($role->name) }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Mot de passe --}}
        <div>
            <label class="block mb-1 text-gray-300">Nouveau mot de passe (optionnel)</label>
            <input type="password" name="password"
                   class="w-full px-4 py-2 bg-gray-700 rounded-lg">
        </div>

        <button class="w-full py-3 bg-yellow-600 hover:bg-yellow-700 rounded-lg font-semibold">
            Mettre à jour
        </button>
    </form>

</div>
@endsection
