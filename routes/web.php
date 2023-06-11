<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\RoutineController;
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
    //PÁGINAS ACCESIBLES DE LA APLICACIÓN
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/exercises', 'exercise.index')->name('exercises');
    Route::view('/routines', 'routine.index')->name('routines');


    //Resources (No utilizo route::resource porque no necesito todas las rutas)
    //Route::middleware('auth')->...
    Route::get('/exercise/{exercise}', [ExerciseController::class, 'show'])->name('exercise.show');
    Route::get('/routine/{routine}', [RoutineController::class, 'show'])->name('routine.show');

});



