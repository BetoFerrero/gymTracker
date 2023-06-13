<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Exercise;
use App\Models\user;
use Livewire\WithPagination;
use external\libraries\image;
use Illuminate\Support\Facades\Auth;

class Exerciselist extends Component
{
    use WithPagination;
    public $orderColumn = "Name";

    public $sortOrder = "";
    // BÚSQUEDA DE EJERCICIO   
    public $search = "";
    public $selectedBodyPart = '';

    public function render()
    {
        $query = Exercise::query();
        //seleccionables de ejercicio

        if ($this->selectedBodyPart) {
            $query->where('bodyPart', $this->selectedBodyPart);
        }




        $exercises = $query->when($this->search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('bodyPart', 'like', '%' . $search . '%');
            });
        })
        ->paginate(15);
    
        return view('livewire.exerciselist', compact('exercises'));
    }

        public function searchByBodyPart($bodyPart)
    {
        $this->search = '';
        $this->selectedBodyPart = $bodyPart;
        $this->resetPage(); // Restablece la página a 1 para mostrar los resultados desde el principio
    }



    /*
    '
    'Retorna una lista de bodypart únicos
    '
    */
    public function getUniqueBodyParts()
    {
        return Exercise::distinct('bodyPart')->pluck('bodyPart');
    }

    public function checkImg($imgUrl,$failImgUrl){
        return image::checkimage($imgUrl,$failImgUrl);
    }

    /**
     * Elimina ejercicios
     */
    public function deleteExercise($exerciseId)
{
    if (auth()->user()->isAdmin()) {
        // Lógica para eliminar el ejercicio según su ID ($exerciseId)
        $exercise = Exercise::find($exerciseId);

        if ($exercise) {
            $exercise->delete();
        }

        // Vuelve a cargar la lista de ejercicios
        return redirect()->route('exercise.index');
    }
}
}
