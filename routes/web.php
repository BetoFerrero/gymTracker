<?php


use Illuminate\Support\Facades\Route;
use App\Models\Exercise;
use App\Models\Routine;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}); 


//Rutas de aplicación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/exercises', 'exercise.index')->name('exercises');
    Route::view('/routines', 'routine.index')->name('routines');


    //SHOW
    
    Route::middleware('auth')->get('/exercises/{exercise}', function (Exercise $exercise) {
        return view('exercise.show', compact('exercise'));
    })->name('exercise.show');
    
});



