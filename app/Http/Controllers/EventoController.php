<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EventoCreateRequest;
use App\Http\Requests\EventoUpdateRequest;
use App\Http\Controllers\Validator;

class EventoController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('eventos.index', ['eventos' => Evento::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventoCreateRequest $request): RedirectResponse {
        Evento::create($request->only([
                    "titulo",
                    "evento",
                    "data",
                    "hora",
                    "local",
        ]));
        return redirect("/eventos");
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento) {
        return view("eventos.edit", ["evento" => (object) $evento->attributesToArray()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventoUpdateRequest $request, Evento $evento): RedirectResponse {
        //
        return dd($request);
//        $evento = Evento::find($evento->id);
//        $evento->titulo = Input::get("titulo");
//        $evento->evento = Input::get("evento");
//        $evento->data = Input::get("data");
//        $evento->hora = Input::get("hora");
//        $evento->local = Input::get("local");
//        $evento->save();

//        $validator = Validator::make(Input::all(), $request->rules());
//        
//        if($validator->fails()){
//            return "Opa algo está erado!";
//        } else {
//            
//        }


        return redirect("/eventos");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento) {
        //
        return "Teste Destroy";
    }
}
