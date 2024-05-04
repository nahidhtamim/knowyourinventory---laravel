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
        Schema::create('cycle_counts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('user_id');
            $table->string('inv_adjustment');
            $table->string('sku_count');
            $table->string('category_1_title')->nullable();
            $table->text('category_1_items')->nullable();
            $table->text('category_1_amount')->nullable();
            $table->string('category_2_title')->nullable();
            $table->text('category_2_items')->nullable();
            $table->text('category_2_amount')->nullable();
            $table->string('category_3_title')->nullable();
            $table->text('category_3_items')->nullable();
            $table->text('category_3_amount')->nullable();
            $table->string('category_4_title')->nullable();
            $table->text('category_4_items')->nullable();
            $table->text('category_4_amount')->nullable();
            $table->string('category_5_title')->nullable();
            $table->text('category_5_items')->nullable();
            $table->text('category_5_amount')->nullable();
            $table->string('category_6_title')->nullable();
            $table->text('category_6_items')->nullable();
            $table->text('category_6_amount')->nullable();
            $table->string('category_7_title')->nullable();
            $table->text('category_7_items')->nullable();
            $table->text('category_7_amount')->nullable();
            $table->string('category_8_title')->nullable();
            $table->text('category_8_items')->nullable();
            $table->text('category_8_amount')->nullable();
            $table->string('category_9_title')->nullable();
            $table->text('category_9_items')->nullable();
            $table->text('category_9_amount')->nullable();
            $table->string('category_10_title')->nullable();
            $table->text('category_10_items')->nullable();
            $table->text('category_10_amount')->nullable();
            $table->string('category_11_title')->nullable();
            $table->text('category_11_items')->nullable();
            $table->text('category_11_amount')->nullable();
            $table->string('category_12_title')->nullable();
            $table->text('category_12_items')->nullable();
            $table->text('category_12_amount')->nullable();
            $table->string('category_13_title')->nullable();
            $table->text('category_13_items')->nullable();
            $table->text('category_13_amount')->nullable();
            $table->string('category_14_title')->nullable();
            $table->text('category_14_items')->nullable();
            $table->text('category_14_amount')->nullable();
            $table->string('category_15_title')->nullable();
            $table->text('category_15_items')->nullable();
            $table->text('category_15_amount')->nullable();
            $table->string('category_16_title')->nullable();
            $table->text('category_16_items')->nullable();
            $table->text('category_16_amount')->nullable();
            $table->string('category_17_title')->nullable();
            $table->text('category_17_items')->nullable();
            $table->text('category_17_amount')->nullable();
            $table->string('category_18_title')->nullable();
            $table->text('category_18_items')->nullable();
            $table->text('category_18_amount')->nullable();
            $table->string('category_19_title')->nullable();
            $table->text('category_19_items')->nullable();
            $table->text('category_19_amount')->nullable();
            $table->string('category_20_title')->nullable();
            $table->text('category_20_items')->nullable();
            $table->text('category_20_amount')->nullable();
            $table->string('category_21_title')->nullable();
            $table->text('category_21_items')->nullable();
            $table->text('category_21_amount')->nullable();
            $table->string('category_22_title')->nullable();
            $table->text('category_22_items')->nullable();
            $table->text('category_22_amount')->nullable();
            $table->string('category_23_title')->nullable();
            $table->text('category_23_items')->nullable();
            $table->text('category_23_amount')->nullable();
            $table->string('category_24_title')->nullable();
            $table->text('category_24_items')->nullable();
            $table->text('category_24_amount')->nullable();
            $table->string('category_25_title')->nullable();
            $table->text('category_25_items')->nullable();
            $table->text('category_25_amount')->nullable();
            $table->string('category_26_title')->nullable();
            $table->text('category_26_items')->nullable();
            $table->text('category_26_amount')->nullable();
            $table->string('category_27_title')->nullable();
            $table->text('category_27_items')->nullable();
            $table->text('category_27_amount')->nullable();
            $table->string('category_28_title')->nullable();
            $table->text('category_28_items')->nullable();
            $table->text('category_28_amount')->nullable();
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
        Schema::dropIfExists('cycle_counts');
    }
};
