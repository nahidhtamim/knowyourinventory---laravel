<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthForecast extends Model
{
    use HasFactory;

    protected $table = 'month_forecasts';

    protected $fillable = [
        'title',
        'user_id',
        'walk_in',
        'web_purchase',
        'total_one',
        'estimated_purchase',
        'total_two',
        'per_invoice',
        'monthly_total',
        'business_days',
        'per_day',
        'walk_in_per_day',
    ];
}
