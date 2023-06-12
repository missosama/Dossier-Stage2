<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ressources extends Model
{
    protected $table = 'ressources';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'file',
        'schT_id',
    ];

    public function schT()
    {
        return $this->belongsTo(schT::class, 'schT_id');
    }
}
