<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;  

class Plan extends Model
{

    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'stripe_plan',
        'name',
        'description',
        'billing_period',
        'interval_count',
        'price',
        'currency',
        'slug',
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function getRouteKeyName()
    {
        return 'slug';
    }

}