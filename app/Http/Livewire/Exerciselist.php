<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Exercise;
use Livewire\WithPagination;
use external\libraries\image;
use Illuminate\Support\Facades\Auth;

class Exerciselist extends Component
{
    use WithPagination;
    public $orderColumn = "Name";
    public $sortOrder = "";
    public $search = "";
    
    public function render()
    {
        $exercises = Exercise::query()
        ->when($this->search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('bodyPart', 'like', '%' . $search . '%');
            });
        })
        ->paginate(15);
    
        return view('livewire.exerciselist', compact('exercises'));
    }


    public function checkImg($imgUrl,$failImgUrl){
        return image::checkimage($imgUrl,$failImgUrl);
    }
    
    
}
