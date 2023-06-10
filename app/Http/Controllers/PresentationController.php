<?php

namespace App\Http\Controllers;
use App\Models\Exercise;

use Illuminate\Http\Request;

class PresentationController extends Controller
{
    

public function showProductPresentation()
{
    $exercises = Exercise::inRandomOrder()->take(10)->get();

    return view('welcome', compact('exercises'));
}
}
