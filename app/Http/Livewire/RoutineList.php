<?php

namespace App\Http\Livewire;
use App\Models\Routine;
use LiveWire\pagination\paginator;

use Livewire\Component;

class RoutineList extends Component
{
    public function render()
    {
        $routines = Routine::where('user_id', auth()->user()->id)
        ->paginate(10);
        return view('livewire.routine-list', compact('routines'));
    }
}
