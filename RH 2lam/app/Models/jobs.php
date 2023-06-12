<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
    protected $table = 'jobs';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'name',
        'description',
        'salary',
    ];

    public function interviews()
    {
        return $this->hasMany(interviews::class, 'post_id');
    }
    public function candidates()
    {
        return $this->hasMany(candidates::class, 'JobId');
    }
}
