@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-gray-900 p-8 rounded-2xl shadow-xl text-white">

    <h1 class="text-3xl font-bold mb-6">Gestion des utilisateurs</h1>

    {{-- Filtres --}}
    <form method="GET" class="flex items-center gap-4 mb-6">

        {{-- Recherche --}}
        <input type="text" name="search" placeholder="Rechercher un nom..."
               value="{{ request('search') }}"
               class="px-4 py-2 bg-gray-700 rounded-lg w-1/3">

        {{-- Filtre rôle --}}
        <select name="role" class="px-4 py-2 bg-gray-700 rounded-lg">
            <option value="">Tous les rôles</option>
            @foreach($roles as $role)
                <option value="{{ $role->name }}" 
                    {{ request('role') == $role->name ? 'selected' : '' }}>
                    {{ ucfirst($role->name) }}
                </option>
            @endforeach
        </select>

        <button class="px-4 py-2 bg-yellow-600 hover:bg-yellow-700 rounded-lg">
            Filtrer
        </button>

        <a href="{{ route('users.create') }}" 
           class="ml-auto px-4 py-2 bg-green-600 hover:bg-green-700 rounded-lg">
            + Ajouter
        </a>
    </form>

    {{-- Tableau --}}
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-700 text-gray-300">
                    <th class="p-3">Nom</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Rôle</th>
                    <th class="p-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr class="border-b border-gray-700">
                        <td class="p-3">{{ $user->name }}</td>
                        <td class="p-3">{{ $user->email }}</td>

                        {{-- Badge rôle --}}
                        <td class="p-3">
                            @foreach($user->roles as $role)
                                <span class="px-2 py-1 text-sm rounded bg-gray-600">
                                    {{ ucfirst($role->name) }}
                                </span>
                            @endforeach
                        </td>

                        <td class="p-3 text-right flex justify-end gap-2">

                            {{-- Edit --}}
                            <a href="{{ route('users.edit', $user) }}"
                               class="px-3 py-1 bg-blue-600 hover:bg-blue-700 rounded">
                                Modifier
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                  onsubmit="return confirm('Supprimer cet utilisateur ?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-600 hover:bg-red-700 rounded">
                                    Supprimer
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $users->links() }}
    </div>

</div>
@endsection
