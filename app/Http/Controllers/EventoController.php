<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EventoRequest;
use Illuminate\Support\Facades\DB;
use App\Enums\UserPerfisEnum;
use App\Enums\UserTipoUsuarioEnum;

class EventoController extends Controller {

    public function index() {
        $eventos = Evento::orderBy('created_at', 'desc')->paginate(3);
        return view('eventos.index', compact("eventos"));
    }

    public function create() {
        $users = User::where("tipo_de_usuario", "ADMINISTRADOR")->orderBy("nome", "ASC")->get();
        return view('eventos.create', compact("users"));
    }

    public function store(EventoRequest $request): RedirectResponse {

        $request->validated();

        if ($request->hasFile('foto')) {
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $newFilename = str_replace("___", "_", str_replace("__", "_", str_replace(" ", "_", $filename)));
            $extension = $request->file('foto')->getClientOriginalExtension();
            $serialFolder = time();
            $fileNameToStore = $newFilename . '_' . $serialFolder . '.' . $extension;
            $path = "default/assets/img/eventos/" . $request->file('foto')->storeAs($serialFolder, $fileNameToStore, options: 'eventos');
        } else {
            $path = 'default/assets/img/icons/usuario.png';
        }

        Evento::create([
            "user_id" => $request->user_id,
            "titulo" => $request->titulo,
            "slug" => $request->slug,
            "evento" => $request->evento,
            "data" => $request->data,
            "hora" => $request->hora,
            "local" => $request->local,
            "foto" => $path,
        ]);
//        Evento::create($request->safe()->only([
//                    "user_id",
//                    "titulo",
//                    "slug",
//                    "evento",
//                    "data",
//                    "hora",
//                    "local",
//                    "foto" => $source,
//        ]));

        return redirect("/eventos");
    }

    public function show(Evento $evento) {
        return response()->json($evento, 200);
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

    public function proprietario($id) {
        $response = DB::table('users')->where("id", $id)->get()[0];

        $perfil = "";
        foreach (UserPerfisEnum::cases() as $p) {
            if ($p->name == $response->perfil) {
                $perfil = $p;
            }
        }

        $tipo_de_usuario = "";
        foreach (UserTipoUsuarioEnum::cases() as $tdu) {
            if ($tdu->name == $response->tipo_de_usuario) {
                $tipo_de_usuario = $tdu;
            }
        }

        unset($response->perfil);
        unset($response->tipo_de_usuario);
        unset($response->password);

        $response->perfil_name = $perfil->name;
        $response->perfil_value = $perfil->value;
        $response->tipo_de_usuario_name = $tipo_de_usuario->name;
        $response->tipo_de_usuario_value = $tipo_de_usuario->value;

        return response()->json($response, 200);
    }
}
