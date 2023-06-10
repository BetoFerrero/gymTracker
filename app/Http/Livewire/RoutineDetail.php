<?php

namespace App\Http\Livewire;

use App\Models\Exercise;
use App\Models\Routine;
use App\Models\routine_exercise;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class RoutineDetail extends Component
{
    use WithPagination;

    public $routine;
    public $selectedExercise;
    public $search;

    protected $queryString = ['search'];

    public function mount($routineId)
    {
        $this->routine = Routine::findOrFail($routineId);
    }

    public function createRoutineTable()
    {
        $this->validate([
            'selectedExercise' => 'required',
        ]);

        Routine_exercise::create([
            'routine_id' => $this->routine->id,
            'exercise_id' => $this->selectedExercise,
        ]);

        // Restablecer la selección
        $this->selectedExercise = null;

        $this->emit('routineTableCreated');
    }

    public function render()
    {
        $exercises = Exercise::query()
            ->when($this->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        $routineTables = $this->routine->routineTables()
            ->with('exercise')
            ->get();

        return view('livewire.routine-show', [
            'exercises' => $exercises,
            'routineTables' => $routineTables,
        ]);
    }
}