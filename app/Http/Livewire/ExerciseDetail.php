<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Exercise;
use Illuminate\Support\Facades\Auth;

class ExerciseDetail extends Component
{
    public $exercise;
    public $isAdmin;
    public $editing = false;

    public function mount(Exercise $exercise)
    {
        $this->exercise = $exercise;
        $this->isAdmin = Auth::user()->is_Admin;
    }

    public function render()
    {
        return view('livewire.exercise-detail', [
            'exercise' => $this->exercise
        ]);
    }

    public function edit()
    {
        if ($this->isAdmin) {
            $this->editing = true;
        }
    }

    public function save()
    {
        if (!$this->isAdmin) {
            return; // Si no es administrador, no se permite guardar
        }

        $validated = $this->validate([
            'exercise.Name' => 'required',
            'exercise.bodyPart' => 'required',
            'exercise.Description' => 'required',
            'exercise.equipment' => 'required',
            'exercise.target' => 'required',
            'exercise.Tracking' => 'required'
        ]);

        $this->exercise->update($validated['exercise']);

        

        $this->editing = false;
    }

    public function rules()
{
    return [
        'exercise.Name' => 'required',
        'exercise.bodyPart' => 'required',
        'exercise.Description' => 'required',
        'exercise.equipment' => 'required',
        'exercise.target' => 'required',
        'exercise.tracking' => 'required',
    ];
}
}