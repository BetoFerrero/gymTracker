<?php

namespace App\Http\Livewire;

use Livewire\Component;
use app\Models\routine;
use app\Models\routine_exercise;
use app\http\Livewire\ExerciseSelector;
use Illuminate\Support\Facades\Auth;

class RoutineEdit extends Component
{
    public $routine;
    public $isOwner;
    public $isAdmin;
    public $exercises = [];
    public $selectedExercise = null;

    //public $exercises; // Lista completa de ejercicios
    public $visibleExercises; // Ejercicios mostrados
    public $perPage = 10; // Cantidad de ejercicios por página

    public function mount(Routine $routine)
    {
        $this->routine = $routine;
        $this->isAdmin = Auth::user()->is_Admin;
        $this->isOwner = Auth::user()->id === $routine->user_id;


    }

    public function addSelected($exerciseID)
    {

        $routineExercise = Routine_Exercise::create([
            
            'routine_id' => $this->routine->id,
            'exercise_id' =>$exerciseID,
            'Order' => $this->routine->exercises->count() + 1,
            'sets' => 0,
            'reps' => 0,
            'rir' => 0,
        ]);
    
        // no hace falta recargar nada, livewire se encarga ya
        $this->exercises = $this->routine->exercises()->get()->toArray();
    
    }
    
    //resetea el selector de ejercicios
    public function resetSelection()
{
    $this->selectedExercise = null;
}

    //TODO: Eliminar
    public function addExercise()
    {
        $this->exercises[] = [
            'exercise' => '',
            'sets' => '',
            'reps' => '',
            'rir' => ''
        ];
    }

    public function removeExercise($index)
    {
        unset($this->exercises[$index]);
        $this->exercises = array_values($this->exercises);
    }
    public function render()
    {
        return view('livewire.routine-edit', [
            'routine' => $this->routine,
            'isOwner' => $this->isOwner,
            'isAdmin' => $this->isAdmin,
            'exercises' => $this->exercises,
        ]);
    }
}
