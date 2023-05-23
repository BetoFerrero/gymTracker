<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class record_exercise extends Pivot
{
    protected $fillable = [
        'records_uuid',
        'exercise_uuid',
        'weight',
        'reps',
        'time',
        'rpe'
    ];
    protected $primaryKey='uuid';
}
