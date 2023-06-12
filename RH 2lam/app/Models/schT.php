<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class schT extends Model
{
    protected $table = 'schT';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'start_date',
        'end_date',
        'time_in',
        'time_out',
        'name',
    ];
    public function ressources()
    {
        return $this->hasMany(Ressource::class, 'schT_id');
    }
}
