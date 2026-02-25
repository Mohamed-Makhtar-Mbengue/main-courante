<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\MainCourante;
use Illuminate\Http\Request;


class MainCouranteController extends Controller
{
    public function index()
    {
        $entries = MainCourante::with(['event', 'user'])
                    ->latest()
                    ->paginate(10);

        $events = Event::orderBy('title')->get();

        return view('maincourante.index', compact('entries', 'events'));
    }


    public function create()
    {
        return view('main-courante.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        MainCourante::create([
            'titre' => $data['titre'],
            'contenu' => $data['contenu'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('main-courante.index')
            ->with('success', 'Entrée ajoutée.');
    }

    // 🟦 ENTRÉE RAPIDE
    public function quickAdd(Request $request)
    {
        $data = $request->validate([
            'contenu' => 'required|string',
        ]);

        MainCourante::create([
            'titre' => 'Entrée rapide',
            'contenu' => $data['contenu'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('main-courante.index')
            ->with('success', 'Entrée rapide ajoutée.');
    }
}
