<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainCouranteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin,mi-admin,user']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'event_id' => 'required|exists:events,id',
            'heure_evenement' => 'required',
            'description' => 'required',
        ]);

        $data['user_id'] = auth()->id();

        MainCouranteEntry::create($data);

        return back()->with('success', 'Entrée ajoutée à la main courante.');
    }

    public function destroy(MainCouranteEntry $maincourante)
    {
        // Option : limiter la suppression aux admins/mi-admin
        if (!in_array(auth()->user()->role->name, ['admin', 'mi-admin'])) {
            abort(403);
        }

        $maincourante->delete();

        return back()->with('success', 'Entrée supprimée.');
    }
}
