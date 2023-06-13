<?php

use Livewire\Component;
use App\Models\Exercise;
use App\Models\routine_exercise;

class ExerciseSearchDropdown extends Component
{
    public $query = '';
    public $exercises = [];
    public $routineId = '';
    public function mount($routineId){
$this->routineId = $routineId;
    }
    public function updatedQuery()
    {
        $this->exercises = Exercise::where('Name', 'like', '%' . $this->query . '%')
        ->take(10) // Limita la carga a 10 ejercicios
            ->get()
            ->toArray();
    }

    public function selectExercise($exerciseId)
    {
        

        $routineExercise = routine_exercise::where('routine_id', $this->routineId)->latest('Order')->first();

        $order = 1;
        if ($routineExercise) {
            $order = $routineExercise->Order + 1;
        }
    
        routine_exercise::create([
            'routine_id' => $this->routineId,
            'exercise_id' => $exerciseId,
            'Order' => $order,
            'Sets' => 3, // Cambia esto según tus necesidades
            'Reps' => 10, // Cambia esto según tus necesidades
            'rir' => 2, // Cambia esto según tus necesidades
        ]);
    }

    public function render()
    {
        return view('livewire.exercise-search-dropdown');
    }
}