<?php
namespace App\Http\Livewire;

use App\Models\Record;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RecordChart extends Component
{
    public $chartData;

    public function mount()
    {
        $this->loadChartData();
    }

    public function loadChartData()
    {
        $user = Auth::user();
        $records = Record::where('user_id', $user->id)
            ->where('Date', '>=', now()->subDays(7)->format('Y-m-d'))
            ->get();
        $chartData = [];

        foreach ($records as $record) {
            $totalVolume = $record->totalVolume();

            if ($totalVolume > 0) {
                $chartData[] = [
                    'date' => $record->getFormattedDate(),
                    'totalVolume' => $totalVolume,
                ];
            }
        }

        $this->chartData = $chartData;
    }

    public function render()
    {
        return view('livewire.record-chart');
    }
}