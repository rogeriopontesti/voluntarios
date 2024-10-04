<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EventoRequest;

class EventoController extends Controller {

    public function index() {
        return view('eventos.index', ['eventos' => Evento::all()]);
    }

    public function create() {
        return view('eventos.create');
    }

    public function store(EventoRequest $request): RedirectResponse {

        $request->validated();

        Evento::create($request->safe()->only([
                    "titulo",
                    "slug",
                    "evento",
                    "data",
                    "hora",
                    "local"
        ]));

        return redirect("/eventos");
    }

    public function show(Evento $evento) {
        return view("eventos.show", compact("evento"));
    }

    public function edit(Evento $evento) {
        return view("eventos.edit", ["evento" => (object) $evento->attributesToArray()]);
    }

    public function update(EventoRequest $request, Evento $evento): RedirectResponse {

        $request->validated();

        $evento->fill($request->all());
        $evento->save();

        return redirect("/eventos")->with("success", __("* O evento {$request->titulo} foi atualizado com sucesso!"));
    }

    public function destroy(Evento $evento): RedirectResponse {
        
        Evento::where('id', $evento->id)->delete();
        return redirect("/eventos")->with("success", __("* O evento {$evento->titulo} foi excluído com sucesso! Esta ação não pode ser desfeita!"));
    }
}
