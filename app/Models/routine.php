<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\models\routine_exercise;
use Illuminate\Support\Str;
class routine extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'routine_exercise');
    }
    protected $keytype='string';
    protected $primaryKey = 'id';
}
