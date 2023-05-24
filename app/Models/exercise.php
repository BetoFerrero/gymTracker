<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class exercise extends Model
{
    use HasFactory, HasUuids;

    /**
 * The attributes that are mass assignable.
 *
 * @var array<int, string>
 */
protected $fillable = [
    'Name',
    'Description',
    'equipment',
    'target',
    'bodyPart',
    'Tracking',
    'ImageSrc'
];
protected $primaryKey='id';
protected $keytype='string';

/**
 * Conseguir ROUTINES en los que se muestra el ejercicio
 */
public function record_exercise(): HasManyThrough
{
 return $this->hasManyThrough(routine::class,record_exercise::class);
}


}
