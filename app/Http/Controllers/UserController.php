<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserRequest;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
        return view('users.index', ['users' => User::paginate(3)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id): RedirectResponse {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse{
        //
    }
}
