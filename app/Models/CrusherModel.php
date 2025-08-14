<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrusherModel extends Model
{
    protected $table = 'crushers';
    protected $fillable = [
        'uuid',
        'name',
        'status',
        'location',
        'latitude',
        'longitude',
        'capacity',
        'gst_number',
        'has_weight',
    ];
     protected $casts = [
        'has_weight' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

}
