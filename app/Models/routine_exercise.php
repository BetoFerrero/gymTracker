<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class routine_exercise extends Pivot
{
    use HasUuids;
    protected $fillable = [
        'routine_id',
        'exercise_id',
        'Order',
        'Sets',
        'Reps',
        'rir'
    ];
    //protected $primaryKey='id';
    protected $keytype='string';
    public $incrementing = false;
}
