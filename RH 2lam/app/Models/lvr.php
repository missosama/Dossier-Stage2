<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lvr extends Model
{
    use HasFactory;
    protected $table = 'lvr';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Define the fillable columns
    protected $fillable = [
        'employee_id',
        'request_type',
        'start_date',
        'end_date',
        'reason',
        'status'
    ];

    // Define the relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
