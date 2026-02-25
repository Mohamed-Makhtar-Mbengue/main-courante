<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Event;
use App\Models\Shift;
use App\Models\MainCourante;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Recherche nom
        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        // Filtre rôle
        if ($request->role) {
            $query->whereHas('roles', function ($q) use ($request) {
                $q->where('name', $request->role);
            });
        }

        $users = $query->paginate(10);

        $roles = Role::all();

        return view('users.index', compact('users', 'roles'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        // Assignation du rôle dans la table pivot
        $user->roles()->attach($data['role_id']);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => "required|email|unique:users,email,{$user->id}",
            'role_id' => 'required|exists:roles,id',
            'password' => 'nullable|min:6'
        ]);

        // Mise à jour du mot de passe si fourni
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        // Mise à jour des infos utilisateur
        $user->update($data);

        // Mise à jour du rôle dans la table pivot
        $user->roles()->sync([$data['role_id']]);

        return redirect()->route('users.index')
            ->with('success', 'Utilisateur mis à jour.');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé.');
    }

    public function adminDashboard()
    {
        $usersCount = User::count();
        $eventsCount = Event::count();
        $shiftsCount = Shift::count();
        $mainCouranteCount = MainCourante::count();

        return view('admin.dashboard', compact(
            'usersCount',
            'eventsCount',
            'shiftsCount',
            'mainCouranteCount'
        ));
    }
}
