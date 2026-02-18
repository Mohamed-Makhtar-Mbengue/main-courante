<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
{
    $user = auth()->user();
    $roles = $user->roles->pluck('name');

    if ($roles->contains('admin') || $roles->contains('mi-admin')) {
        return redirect()->route('admin.dashboard');
    }

    if ($roles->contains('user')) {
        return redirect()->route('maincourante.index');
    }

    abort(403);
}

}
