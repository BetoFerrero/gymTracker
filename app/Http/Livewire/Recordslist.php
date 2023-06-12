<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\Record;
use Livewire\WithPagination;
use external\libraries\image;
use App\models\record_exercise;
use app\Models\User;
use Illuminate\Http\Request;

class Recordslist extends Component
{
    public $totalVolumeColumn = 'totalVolume';
    public $selectedRoutine ="";
    public $selectedRoutineName = "";
    
    public $sortBy = ""; //Columna actualmente ordenada
    public $sortDirection = "asc"; //Dirección de ordenamiento (ascendente o descendente)
    public $relation = null;//Si la columna se trata de una relación 
    public $search = "";
    
    public function render()
    {
        
        $user = User::find(auth()->user()->id);
        
        $trainedRoutines = $user->trainedRoutines();
        $userRoutines = $user->routines;
        
        $query = Record::where('records.user_id', auth()->user()->id);
        
        //Filtros de búsqueda
        if ($this->search) {
            $query->where(function ($subQuery) {
                $subQuery->whereHas('routine', function ($subSubQuery) {
                    $subSubQuery->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereDate('Date', 'like', '%' . $this->search . '%')
                ->orWhere('Comment', 'like', '%' . $this->search . '%');
            });
        }
        
        if ($this->selectedRoutine && $this->selectedRoutine !== '') {
            $query->whereHas('routine', function ($subQuery) {
                $subQuery->where('id', $this->selectedRoutine);
            });
        }
        
        if ($this->sortBy && $this->sortDirection) {
            if ($this->relation) {
                $query->join('routines', 'routines.id', '=', 'records.routine_id')
                    ->orderBy($this->relation . '.' . $this->sortBy, $this->sortDirection);
            } else {
                if ($this->sortBy === 'totalVolume') {
                    $query->orderByRaw('(SELECT SUM(weight) FROM record_exercise WHERE record_exercise.record_id = records.id) ' . $this->sortDirection);
                } else {
                    $query->orderBy($this->sortBy, $this->sortDirection);
                }
            }
        }
        
        $records = $query->paginate(10);
        
        return view('livewire.recordslist', [
            'records' => $records,
            'trainedRoutines' => $trainedRoutines,
            'userRoutines' => $userRoutines,
        ]);
    }
    
    public function searchByRoutine($routineId,$routineName)
    {
        $this->selectedRoutine = $routineId;
        if ($this->selectedRoutineName != ""){$this->selectedRoutineName = $routineName;} 
        // Realiza la lógica de búsqueda o filtrado según la rutina seleccionada
        
        
        $this->reset();
    }
    
    /**Setea las variables $sortDirection y $sortBy para columnas con propiedades
    * 
    * @param $column: nombre de la columna
    * 
    * @param $relation: si la columna es basada en una relación,
    * damos el nombre del modelo en este parámetro
    */
    public function sortByColumn($column,$relation = null)
    {
        if ($this->sortBy === $column) {
            // Si se hace clic en la misma columna, invertir la dirección de ordenamiento
            $this->sortDirection = ($this->sortDirection === 'asc') ? 'desc' : 'asc';
        } else {
            // Si se hace clic en una nueva columna, establecer la columna y dirección de ordenamiento predeterminadas
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
        $this->relation = $relation;
    }
    
}
