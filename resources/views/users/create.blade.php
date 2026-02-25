@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-gray-800 p-8 rounded-2xl shadow-xl text-white">

    <h1 class="text-3xl font-bold mb-6">Créer un utilisateur</h1>

    <form action="{{ route('users.store') }}" method="POST" class="space-y-5">
        @csrf

        {{-- Nom --}}
        <div>
            <label class="block mb-1 text-gray-300">Nom</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                   class="w-full px-4 py-2 bg-gray-700 rounded-lg">
        </div>

        {{-- Email --}}
        <div>
            <label class="block mb-1 text-gray-300">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="w-full px-4 py-2 bg-gray-700 rounded-lg">
        </div>

        {{-- Mot de passe --}}
        <div>
            <label class="block mb-1 text-gray-300">Mot de passe</label>
            <input type="password" name="password" required
                   class="w-full px-4 py-2 bg-gray-700 rounded-lg">
        </div>

        {{-- Rôle --}}
        <div>
            <label class="block mb-1 text-gray-300">Rôle</label>
            <select name="role_id" class="w-full px-4 py-2 bg-gray-700 rounded-lg">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                @endforeach
            </select>
        </div>

        <button class="w-full py-3 bg-green-600 hover:bg-green-700 rounded-lg font-semibold">
            Créer l’utilisateur
        </button>
    </form>

</div>
@endsection
