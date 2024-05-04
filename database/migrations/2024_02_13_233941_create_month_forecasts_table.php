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
        Schema::create('month_forecasts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('user_id');
            $table->text('walk_in')->nullable();
            $table->text('web_purchase')->nullable();
            $table->text('total_one')->nullable();
            $table->text('estimated_purchase')->nullable();
            $table->text('total_two')->nullable();
            $table->text('per_invoice')->nullable();
            $table->text('monthly_total')->nullable();
            $table->text('business_days')->nullable();
            $table->text('per_day')->nullable();
            $table->text('walk_in_per_day')->nullable();
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
        Schema::dropIfExists('month_forecasts');
    }
};
