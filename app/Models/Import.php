<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'level1',
        'level2',
        'level3',
        'price',
        'priceSP',
        'quantity',
        'property_fields',
        'joint_purchases',
        'unit_of_measurement',
        'picture',
        'show_on_main',
        'description',
    ];
}
