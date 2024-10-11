<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

    public function auth(LoginRequest $request): RedirectResponse {
        
        $request->validated();
        
        
//        return dd($request);
        
//        $credenciais = $request->only(['email', 'password']);
        $credenciais = Request::only(['email', 'password']);

        if (Auth::attempt($credenciais)) {
            $request->authenticate();
            $request->session()->regenerate();
            return redirect()->intended(route('login.dashboard'));
        } else {
            redirect(route("login.form"))->with("error", __("* Usuário ou senha inválidos!"));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function logout(Request $request): RedirectResponse {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route("home"));
    }
}
