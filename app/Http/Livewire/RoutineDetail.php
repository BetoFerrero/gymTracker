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
    public $routine;

    public function mount(Routine $routine)
    {
        $this->routine = $routine;
    }

    public function render()
    {
        $exercises = $this->routine->exercises()->orderBy('routine_exercise.uuid')->get();

        return view('livewire.routine-detail', [
            'exercises' => $exercises,
        ]);
    }
}