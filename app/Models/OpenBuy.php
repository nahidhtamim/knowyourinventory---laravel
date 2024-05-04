<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenBuy extends Model
{
    use HasFactory;

    protected $table = 'open_buys';

    protected $fillable = [
        'title',
        'user_id',
        'inv_tar',
        'inv_val',
        'ret_sale',
        'cogs',
        'margin',
        'ly_sales',
        'sales_change',
        'planned_sales',
        'inventory_on_order',
        'inventory_purchased',
        'inventory_on_hand',
        'inventory_sold',
        'inventory_turnover',
        'days_supply',
        'sell_through',
        'stock_sales',

        'sales_output',
        'ending_inv_output',
        'begin_inv_output',
        'otb',
        'on_order_output',
        'net_mtb_output',
        'turns_output',
    ];
}
