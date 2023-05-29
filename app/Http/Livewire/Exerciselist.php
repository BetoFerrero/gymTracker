<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Exercise;
use Livewire\WithPagination;

class Exerciselist extends Component
{
    use WithPagination;
    
    public function render()
    {
        $exercises = Exercise::paginate(5);

        return view('livewire.exerciselist',['exercises'=>$exercises,]);
    }

    
}
