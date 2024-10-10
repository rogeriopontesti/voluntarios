<?php

namespace App\Http\Controllers;

use App\Models\Evento;

class SiteController extends Controller {

    public function index() {
        $eventos = Evento::orderBy('created_at', 'desc')->paginate(4);
        return view('home', compact("eventos"));
    }
    
    public function evento($id) {
        $evento = Evento::where("id", $id)->first();
        return view('eventos.details', compact("evento"));
    }
}
