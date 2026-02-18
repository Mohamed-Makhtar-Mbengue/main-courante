<?php

namespace App\Http\Controllers;

use App\Models\MainCourante;
use Illuminate\Http\Request;

class MainCouranteController extends Controller
{
    public function index()
    {
        // L'utilisateur simple voit uniquement ses propres entrées
        $entries = MainCourante::where('user_id', auth()->id())->get();

        return view('maincourante.index', compact('entries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'heure_evenement' => 'required',
            'description' => 'required',
            'event_id' => 'required|integer',
        ]);

        MainCourante::create([
            'user_id' => auth()->id(),
            'event_id' => $request->event_id,
            'heure_evenement' => $request->heure_evenement,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Entrée ajoutée.');
    }

    public function destroy($id)
    {
        $entry = MainCourante::findOrFail($id);

        // Un user ne peut supprimer que ses propres entrées
        if ($entry->user_id !== auth()->id()) {
            abort(403);
        }

        $entry->delete();

        return back()->with('success', 'Entrée supprimée.');
    }
}
