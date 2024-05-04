<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_buys', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('user_id');
            $table->text('inv_tar')->nullable();
            $table->text('inv_val')->nullable();
            $table->text('ret_sale')->nullable();
            $table->text('cogs')->nullable();
            $table->text('margin')->nullable();
            $table->text('ly_sales')->nullable();
            $table->text('sales_change')->nullable();
            $table->text('planned_sales')->nullable();
            $table->text('inventory_on_order')->nullable();
            $table->text('inventory_purchased')->nullable();
            $table->text('inventory_on_hand')->nullable();
            $table->text('inventory_sold')->nullable();
            $table->text('inventory_turnover')->nullable();
            $table->text('days_supply')->nullable();
            $table->text('sell_through')->nullable();
            $table->text('stock_sales')->nullable();

            $table->text('sales_output')->nullable();
            $table->text('ending_inv_output')->nullable();
            $table->text('begin_inv_output')->nullable();
            $table->text('otb')->nullable();
            $table->text('on_order_output')->nullable();
            $table->text('net_mtb_output')->nullable();
            $table->text('turns_output')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('open_buys');
    }
};
