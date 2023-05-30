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


    public function sortOrder($columnName=""){
        $caretOrder = "up";
        if($this->sortOrder == 'asc'){
             $this->sortOrder = 'desc';
             $caretOrder = "down";
        }else{
             $this->sortOrder = 'asc';
             $caretOrder = "up";
        } 
        $this->sortLink = '<i class="sorticon fa-solid fa-caret-'.$caretOrder.'"></i>';

        $this->orderColumn = $columnName;

   }


    public function checkImg($imgUrl,$failImgUrl){
        return image::checkimage($imgUrl,$failImgUrl);
    }
    
    
}
