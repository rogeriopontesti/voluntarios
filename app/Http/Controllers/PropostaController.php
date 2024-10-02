<?php

namespace App\Http\Controllers;

use App\Models\Proposta;
use Illuminate\Http\Request;

class PropostaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return "<h1>Index</h1>";
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
        return "<h1>store</h1>";
    }

    /**
     * Display the specified resource.
     */
    public function show(Proposta $proposta)
    {
        //
        return "<h1>show</h1>";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proposta $proposta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proposta $proposta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proposta $proposta)
    {
        //
    }
}
