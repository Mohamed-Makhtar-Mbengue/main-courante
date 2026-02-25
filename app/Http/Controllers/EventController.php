<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin,mi-admin']);
    }

    public function index(Request $request)
    {
        $query = Event::query();

        // Recherche texte
        if ($request->search) {
            $query->where('title', 'like', "%{$request->search}%");
        }

        // Filtre responsable
        if ($request->responsable) {
            $query->where('responsable', $request->responsable);
        }

        // Filtre date (événements couvrant une date)
        if ($request->date) {
            $query->whereDate('start_date', '<=', $request->date)
                ->whereDate('end_date', '>=', $request->date);
        }

        $events = $query->latest()->paginate(10);

        // Pour le filtre responsable
        $responsables = Event::pluck('responsable')->unique();

        return view('events.index', compact('events', 'responsables'));
    }


    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
    'title' => 'required|string|max:255',
    'responsable' => 'required|string|max:25',
    'start_date' => 'required|date',
    'end_date' => 'required|date|after_or_equal:start_date',
    'description' => 'nullable|string',
        ]);

        Event::create($data);


        return redirect()->route('events.index')->with('success', 'Événement créé.');
    }

    
    public function show(Event $event)
    {
        $entries = $event->mainCouranteEntries()
                        ->with('user')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('events.show', compact('event', 'entries'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title' => 'required',
            'responsable' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'nullable',
        ]);

        $event->update($data);

        return redirect()->route('events.index')->with('success', 'Événement mis à jour.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Événement supprimé.');
    }
}
