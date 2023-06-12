<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class candidates extends Model
{
    protected $table = 'candidates';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'name',
        'email',
        'age',
        'cv_file',
        'JobId',
        'status',
    ];

    public function jobs()
    {
        return $this->belongsTo(jobs::class, 'JobId');
    }
    public function interviews()
    {
        return $this->hasMany(interviews::class, 'candidat_id');
    }

}
