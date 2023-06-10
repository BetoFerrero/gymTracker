<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use Illuminate\Http\Request;
use App\Http\Requests\StoreroutineRequest;
use App\Http\Requests\UpdateroutineRequest;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreroutineRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,routine $routine)
    {
        // Verificar si la rutina pertenece al usuario autenticado
    if ($routine->user_id !== $request->user()->id || !$routine->public) {
        abort(403, 'No tienes permiso para acceder a esta rutina.');
    }
    return view('routine.show', ['routine' => $routine]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(routine $routine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateroutineRequest $request, routine $routine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(routine $routine)
    {
        //
    }
}
