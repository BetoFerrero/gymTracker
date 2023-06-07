namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Exercise;

class ExerciseCardComponent extends Component
{
    public $exerciseId;

    public function mount($exerciseId)
    {
        $this->exerciseId = $exerciseId;
    }

    public function render()
    {
        $exercise = Exercise::find($this->exerciseId);
        return view('livewire.exercise-card-component', compact('exercise'));
    }
}