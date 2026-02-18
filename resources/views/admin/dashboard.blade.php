@extends('layouts.app')

@section('content')
<div class="dashboard-container">

    <h1 class="dashboard-title">Tableau de bord administrateur</h1>
    <p>Bienvenue, {{ auth()->user()->name }}</p>

    <!-- Statistiques -->
    <div class="stats-grid">
        <div class="stat-card">
            <h3>Utilisateurs</h3>
            <div class="number">{{ $usersCount }}</div>
        </div>

        <div class="stat-card">
            <h3>Événements</h3>
            <div class="number">{{ $eventsCount }}</div>
        </div>

        <div class="stat-card">
            <h3>Services (Shifts)</h3>
            <div class="number">{{ $shiftsCount }}</div>
        </div>

        <div class="stat-card">
            <h3>Main courante</h3>
            <div class="number">{{ $mainCouranteCount }}</div>
        </div>
    </div>

    <!-- Gestion rapide -->
    <div class="quick-actions">
        <h2>Gestion rapide</h2>

        <div class="quick-buttons">
            <a href="{{ route('events.index') }}">Gérer les événements</a>
            <a href="{{ route('users.index') }}">Gérer les utilisateurs</a>
            <a href="{{ route('shifts.index') }}">Ajouter un service</a>
            <a href="{{ route('maincourante.index') }}">Ajouter une entrée main courante</a>
        </div>
    </div>

</div>
@endsection
