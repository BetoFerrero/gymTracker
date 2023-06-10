<?php

namespace App\Http\Livewire;
use App\Models\Routine;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class RoutineList extends Component
{
    public $user;
    public $creatingRoutine = false;
    public $newRoutineName = '';
    
    public function mount(){

    }


    public function startCreatingRoutine()
    {
        $this->creatingRoutine = true;
    }

    public function createRoutine()
    {
        
       
        $this->validate([
            'newRoutineName' => 'required'
        ]);

        $userId = Auth::id();
        
        Routine::create([
            'name' => $this->newRoutineName,
            'description' => 'Descripción de la nueva rutina',
            'user_id' => $userId
        ]);


        //Restablezco el componente
        $this->newRoutineName = '';
        $this->emit('refreshComponent');
        $this->render();
    }
    public function render()
    {
        $routines = Routine::where('user_id', auth()->user()->id)->get();
        //->paginate(10);

        return view('livewire.routine-list',[
            'routines' => $routines,
        ]);
    }
}
