<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\routine;

class Record extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'Comment',
        'Duration',
        'Date',
        'Routine_id'
    ];
    protected $primaryKey='id';
    protected $keytype='string';
    public $incrementing = false;

    public function routine()
    {
        return $this->belongsTo(Routine::class);
    }

    // Relación con el modelo RecordExercise
    public function recordExercises()
    {
        return $this->hasMany(record_exercise::class);
    }


    //===== FUNCIONES ======//
    public function totalVolume()
    {
        $sum = 0;

        //guardián si no tiene valores
        if ($this->recordExercises() === null || $this->recordExercises()->count() == 0) {
            return 0;
        }

        foreach ($this->record_exercises as $recordExercise) {
            $sum += $recordExercise->weight;
        }
        
        return $sum;
    }
    //TODO: Introducir nuevo 
    public function getConcurrentBodyParts()
{
    $bodyParts = $this->exercises()->pluck('body_part')->toArray();
    $bodyPartsCount = array_count_values($bodyParts);
    $concurrentBodyParts = array_keys($bodyPartsCount, max($bodyPartsCount));

    if (count($concurrentBodyParts) === 0) {
        return '';
    } elseif (count($concurrentBodyParts) === 1) {
        return $concurrentBodyParts[0];
    } else {
        return $concurrentBodyParts[0] . ' y ' . $concurrentBodyParts[1];
    }
}
//Para mostrar la fecha en la tabla
public function getFormattedDate()
{
    return date('Y-m-d', strtotime($this->Date));
}
}
