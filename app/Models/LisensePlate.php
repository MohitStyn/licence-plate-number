<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LisensePlate extends Model
{
    use HasFactory;

    protected $fillable = [
        'plate_number',
        'in_time',
        'out_time',
        'created_by',
        'updated_by'
    ];
}
