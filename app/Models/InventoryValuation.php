<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryValuation extends Model
{
    use HasFactory;

    protected $table = 'inventory_valuations';

    protected $fillable = [
        'title',
        'user_id',
        'categoy_data',
        'inventory_data',
        'total_inventory',
    ];
}
