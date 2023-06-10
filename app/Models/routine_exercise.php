<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class routine_exercise extends Pivot
{
    protected $fillable = [
        'routine_id',
        'exercise_id',
        'Order',
        'Sets',
        'Reps',
        'rir'
    ];
    protected $primaryKey='id';
    protected $keytype='string';
}
