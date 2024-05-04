<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeInfo extends Model
{
    use HasFactory;

    protected $table = 'theme_infos';

    protected $fillable = [
        'item',
        'data',
    ];
}
