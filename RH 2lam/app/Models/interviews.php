<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class interviews extends Model
{
    protected $table = 'interviews';
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    protected $fillable = [
        'candidat_id',
        'post_id',
        'date',
        'time',
        'location',
    ];

    public function candidates()
    {
        return $this->belongsTo(candidates::class, 'candidat_id');
    }

    public function jobs()
    {
        return $this->belongsTo(jobs::class, 'post_id');
    }

    // ...
}
