<?php

namespace App\Http\Controllers;

use App\Models\CaboEleitoral;
use Illuminate\Http\Request;

class CaboEleitoralController extends Controller
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
    }

    /**
     * Display the specified resource.
     */
    public function show(CaboEleitoral $caboEleitoral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CaboEleitoral $caboEleitoral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CaboEleitoral $caboEleitoral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CaboEleitoral $caboEleitoral)
    {
        //
    }
}
