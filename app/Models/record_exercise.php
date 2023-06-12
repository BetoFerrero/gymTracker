<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class record_exercise extends Pivot
{
    protected $fillable = [
        'records_id',
        'exercise_id',
        'weight',
        'reps',
        'time',
        'rpe'
    ];
    protected $primaryKey='id';
    protected $keytype='string';
}
