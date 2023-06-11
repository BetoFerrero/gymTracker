<?php

namespace App\Http\Livewire;

use Livewire\Component;
use app\Models\routine;
use app\Models\routine_exercise;
use Illuminate\Support\Facades\Auth;

class RoutineEdit extends Component
{
    public $routine;
    public $isOwner;
    public $isAdmin;
    public $exercises = [];

    public function mount(Routine $routine)
    {
        $this->routine = $routine;
        $this->isAdmin = Auth::user()->is_Admin;
        $this->isOwner = Auth::user()->id === $routine->id;


    }



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
        return view('livewire.routine-edit');
    }
}
