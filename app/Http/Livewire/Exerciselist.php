<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Exercise;
use Livewire\WithPagination;
use external\libraries\image;

class Exerciselist extends Component
{
    use WithPagination;
    public $orderColumn = "Name";
    public $sortOrder = "";
    
    public function render()
    {
        $exercises = Exercise::paginate(5);

        //$exercises->paginate(5);

        return view('livewire.exerciselist',['exercises'=>$exercises]);
    }


    public function checkImg($imgUrl,$failImgUrl){
        return image::checkimage($imgUrl,$failImgUrl);
    }
    
    
}
