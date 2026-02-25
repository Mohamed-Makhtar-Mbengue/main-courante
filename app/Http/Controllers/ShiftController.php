<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index(Request $request)
    {
        $query = Shift::with('user', 'event');

        // Recherche agent
        if ($request->agent) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->agent}%");
            });
        }

        // Filtre événement
        if ($request->event_id) {
            $query->where('event_id', $request->event_id);
        }

        // Filtre date
        if ($request->date) {
            $query->whereDate('start_time', $request->date);
        }

        $shifts = $query->paginate(10);
        $events = Event::all();

        return view('shifts.index', compact('shifts', 'events'));
    }


    public function create()
    {
        $users = User::all();
        $events = Event::all();

        return view('shifts.create', compact('users', 'events'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'event_id'   => 'required|exists:events,id',
            'user_id'    => 'required|exists:users,id',
            'type'       => 'required|in:jour,nuit',
            'carte_pro'  => 'nullable|string',
            'h_arrivee'  => 'required|date_format:H:i',
            'h_depart'   => 'required|date_format:H:i|after:h_arrivee',
            'signature'  => 'nullable|string',
        ]);

        Shift::create($data);

        return redirect()->route('events.show', $request->event_id)
            ->with('success', 'Shift créé avec succès.');
    }



    public function edit(Shift $shift)
    {
        $users = User::all();
        $events = Event::all();

        return view('shifts.edit', compact('shift', 'users', 'events'));
    }

    public function update(Request $request, Shift $shift)
    {
        $data = $request->validate([
            'event_id'   => 'required|exists:events,id',
            'user_id'    => 'required|exists:users,id',
            'type'       => 'required|in:jour,nuit',
            'carte_pro'  => 'nullable|string',
            'h_arrivee'  => 'required|date_format:H:i',
            'h_depart'   => 'required|date_format:H:i|after:h_arrivee',
            'signature'  => 'nullable|string',
        ]);

        $shift->update($data);

        return redirect()->route('shifts.index')
            ->with('success', 'Shift mis à jour.');
    }

    public function destroy(Shift $shift)
    {
        $shift->delete();

        return redirect()->route('shifts.index')
            ->with('success', 'Shift supprimé.');
    }
}
