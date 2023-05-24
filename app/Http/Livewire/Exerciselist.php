<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\exercise;
use Livewire\WithPagination;

class Exerciselist extends Component
{
    public function render()
    {
        
        return view('livewire.exerciselist',[
            'exercises' => exercise::paginate(10),
        ]);
    }
}
