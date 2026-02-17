<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin,mi-admin']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'event_id' => 'required|exists:events,id',
            'user_id' => 'required|exists:users,id',
            'type' => 'required|in:jour,nuit',
            'carte_pro' => 'nullable',
            'h_arrivee' => 'required',
            'h_depart' => 'required',
        ]);

        Shift::create($data);

        return back()->with('success', 'Service ajouté.');
    }
}
