<?php

namespace App\Http\Controllers;

use App\Models\ComentarioContribuicao;
use Illuminate\Http\Request;

class ComentarioContribuicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return "<h1>index</h1>";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return "<h1>create</h1>";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ComentarioContribuicao $comentarioContribuicao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ComentarioContribuicao $comentarioContribuicao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ComentarioContribuicao $comentarioContribuicao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComentarioContribuicao $comentarioContribuicao)
    {
        //
    }
}
