<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class face_id_data extends Model
{
    protected $table = 'face_id_data';

    protected $fillable = [
        'user_id',
        'face_data',
    ];
}
