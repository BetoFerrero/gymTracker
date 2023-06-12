<?php

namespace App\Http\Controllers;

use App\Models\exercise;
use App\Http\Requests\StoreexerciseRequest;
use App\Http\Requests\UpdateexerciseRequest;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return compact(exercise::all());
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
    public function store(StoreexerciseRequest $request)
    {
        if (Auth::user()->isAdmin) {
            Exercise::create($request->validated());
        }
        
        return redirect()->route('exercise.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(exercise $exercise)
    {
        return view('exercise.show', compact('exercise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(exercise $exercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateexerciseRequest $request, exercise $exercise)
    {
        if (Auth::user()->isAdmin) {
            $exercise->update($request->validated());
        }
        
        return redirect()->route('exercise.show', $exercise);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(exercise $exercise)
    {
        if (Auth::user()->isAdmin) {
            $exercise->delete();
        }
        
        return redirect()->route('exercise.index');
    }
}
