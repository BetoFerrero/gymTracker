<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'Comment',
        'Duration',
        'Date'
    ];
    protected $primaryKey='uuid';
}
