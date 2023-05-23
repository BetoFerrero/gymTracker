<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class routine extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'name',
        'description'
    ];
    protected $keytype='string';
    protected $primaryKey = 'uuid';
}
