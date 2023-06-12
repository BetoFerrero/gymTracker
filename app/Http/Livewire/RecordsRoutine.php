<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Record;
use App\Models\routine_exercise;
use Illuminate\Support\Facades\Auth;

class RecordsRoutine extends Component
{
    public $routine;
    public $sets = [];

    public function mount($routine)
    {
        $this->routine = $routine;

        foreach ($routine->exercises as $exercise) {
            $this->sets[$exercise->id] = 1;
        }
    }

    public function guardarRegistro()
    {
        $user = Auth::user();

        $record = Record::create([
            'routine_id' => $this->routine->id,
            'date' => Carbon::now(), // Fecha actual
            'user_id' => $user->id,
            'comment' => 'Comentario de ejemplo'
    ]);

        foreach ($this->sets as $exerciseId => $setCount) {
            for ($i = 0; $i < $setCount; $i++) {
                $record->exercises()->attach($exerciseId, ['set' => $i + 1]);
            }
        }

        // Redirigimos
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.records-routine');
    }
}