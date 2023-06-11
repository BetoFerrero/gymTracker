<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Exercise;

class ExerciseSelector extends Component
{
    public $searchTerm = '';
    public $selectedExercise = null;
    public $search = '';
    public $exercises = [];
    public $scrollOffset = 0;

    public function render()
    {
        $filteredExercises = Exercise::query()
            ->where('Name', 'LIKE', '%' . $this->search . '%')
            ->skip($this->scrollOffset)
            ->take(10)
            ->get();

        return view('livewire.exercise-selector', [
            'filteredExercises' => $filteredExercises,
        ]);
    }

    public function selectExercise($exerciseId)
    {
        $this->selectedExercise = Exercise::find($exerciseId);
    }

    public function resetSelection()
    {
        $this->selectedExercise = null;
        $this->searchTerm = '';
    }
}