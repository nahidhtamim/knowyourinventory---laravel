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
        Schema::create('daily_updates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('user_id');
            $table->text('name_one')->nullable();
            $table->text('amount_one')->nullable();
            $table->text('name_two')->nullable();
            $table->text('amount_two')->nullable();
            $table->text('name_three')->nullable();
            $table->text('amount_three')->nullable();
            $table->text('name_four')->nullable();
            $table->text('amount_four')->nullable();
            $table->text('total_amount')->nullable();

            $table->text('goals')->nullable();
            $table->text('day')->nullable();
            $table->text('name_one_sales')->nullable();
            $table->text('name_one_inv')->nullable();
            $table->text('name_one_lines')->nullable();
            $table->text('name_two_sales')->nullable();
            $table->text('name_two_inv')->nullable();
            $table->text('name_two_lines')->nullable();
            $table->text('name_three_sales')->nullable();
            $table->text('name_three_inv')->nullable();
            $table->text('name_three_lines')->nullable();
            $table->text('name_four_sales')->nullable();
            $table->text('name_four_inv')->nullable();
            $table->text('name_four_lines')->nullable();

            $table->text('goals_sum')->nullable();
            $table->text('name_one_sales_sum')->nullable();
            $table->text('name_one_inv_sum')->nullable();
            $table->text('name_one_lines_sum')->nullable();
            $table->text('name_two_sales_sum')->nullable();
            $table->text('name_two_inv_sum')->nullable();
            $table->text('name_two_lines_sum')->nullable();
            $table->text('name_three_sales_sum')->nullable();
            $table->text('name_three_inv_sum')->nullable();
            $table->text('name_three_lines_sum')->nullable();
            $table->text('name_four_sales_sum')->nullable();
            $table->text('name_four_inv_sum')->nullable();
            $table->text('name_four_lines_sum')->nullable();

            $table->text('mo_total_goal')->nullable();
            $table->text('mo_total_sales')->nullable();
            $table->text('mo_total_inv')->nullable();
            $table->text('mo_total_lines')->nullable();
            $table->text('mo_total_LPI')->nullable();
            $table->text('mo_total_dlr_inv')->nullable();
            $table->text('mo_name_one_sales')->nullable();
            $table->text('mo_name_one_inv')->nullable();
            $table->text('mo_name_one_lines')->nullable();
            $table->text('mo_name_one_LPI')->nullable();
            $table->text('mo_name_one_dlr_inv')->nullable();
            $table->text('mo_name_two_sales')->nullable();
            $table->text('mo_name_two_inv')->nullable();
            $table->text('mo_name_two_lines')->nullable();
            $table->text('mo_name_two_LPI')->nullable();
            $table->text('mo_name_two_dlr_inv')->nullable();
            $table->text('mo_name_three_sales')->nullable();
            $table->text('mo_name_three_inv')->nullable();
            $table->text('mo_name_three_lines')->nullable();
            $table->text('mo_name_three_LPI')->nullable();
            $table->text('mo_name_three_dlr_inv')->nullable();
            $table->text('mo_name_four_sales')->nullable();
            $table->text('mo_name_four_inv')->nullable();
            $table->text('mo_name_four_lines')->nullable();
            $table->text('mo_name_four_LPI')->nullable();
            $table->text('mo_name_four_dlr_inv')->nullable();

            $table->text('mo_total_goal_sum')->nullable();
            $table->text('mo_total_sales_sum')->nullable();
            $table->text('mo_total_inv_sum')->nullable();
            $table->text('mo_total_lines_sum')->nullable();
            $table->text('mo_total_LPI_sum')->nullable();
            $table->text('mo_total_dlr_inv_sum')->nullable();
            $table->text('mo_name_one_sales_sum')->nullable();
            $table->text('mo_name_one_inv_sum')->nullable();
            $table->text('mo_name_one_lines_sum')->nullable();
            $table->text('mo_name_one_LPI_sum')->nullable();
            $table->text('mo_name_one_dlr_inv_sum')->nullable();
            $table->text('mo_name_two_sales_sum')->nullable();
            $table->text('mo_name_two_inv_sum')->nullable();
            $table->text('mo_name_two_lines_sum')->nullable();
            $table->text('mo_name_two_LPI_sum')->nullable();
            $table->text('mo_name_two_dlr_inv_sum')->nullable();
            $table->text('mo_name_three_sales_sum')->nullable();
            $table->text('mo_name_three_inv_sum')->nullable();
            $table->text('mo_name_three_lines_sum')->nullable();
            $table->text('mo_name_three_LPI_sum')->nullable();
            $table->text('mo_name_three_dlr_inv_sum')->nullable();
            $table->text('mo_name_four_sales_sum')->nullable();
            $table->text('mo_name_four_inv_sum')->nullable();
            $table->text('mo_name_four_lines_sum')->nullable();
            $table->text('mo_name_four_LPI_sum')->nullable();
            $table->text('mo_name_four_dlr_inv_sum')->nullable();

            $table->text('total_dept_goal')->nullable();
            $table->text('total_dept_sale')->nullable();
            $table->text('total_dept_pace')->nullable();
            $table->text('name_one_dept_goal')->nullable();
            $table->text('name_one_dept_sale')->nullable();
            $table->text('name_one_dept_pace')->nullable();
            $table->text('name_two_dept_goal')->nullable();
            $table->text('name_two_dept_sale')->nullable();
            $table->text('name_two_dept_pace')->nullable();
            $table->text('name_three_dept_goal')->nullable();
            $table->text('name_three_dept_sale')->nullable();
            $table->text('name_three_dept_pace')->nullable();
            $table->text('name_four_dept_goal')->nullable();
            $table->text('name_four_dept_sale')->nullable();
            $table->text('name_four_dept_pace')->nullable();

            $table->text('sales_standing_one_value')->nullable();
            $table->text('sales_standing_two_value')->nullable();
            $table->text('sales_standing_three_value')->nullable();
            $table->text('sales_standing_four_value')->nullable();
            $table->text('dlr_per_inv_one_value')->nullable();
            $table->text('dlr_per_inv_two_value')->nullable();
            $table->text('dlr_per_inv_three_value')->nullable();
            $table->text('dlr_per_inv_four_value')->nullable();
            $table->text('total_LPI_one_value')->nullable();
            $table->text('total_LPI_two_value')->nullable();
            $table->text('total_LPI_three_value')->nullable();
            $table->text('total_LPI_four_value')->nullable();


            $table->text('daily_retail')->nullable();
            $table->text('daily_ly1')->nullable();
            $table->text('daily_cost')->nullable();
            $table->text('daily_margin')->nullable();
            $table->text('daily_sales_goal')->nullable();
            $table->text('daily_ou1')->nullable();
            $table->text('daily_current')->nullable();
            $table->text('daily_ly2')->nullable();
            $table->text('daily_goal')->nullable();
            $table->text('daily_ou2')->nullable();
            
            $table->text('daily_date_sum')->nullable();
            $table->text('daily_retail_sum')->nullable();
            $table->text('daily_ly1_sum')->nullable();
            $table->text('daily_cost_sum')->nullable();
            $table->text('daily_margin_sum')->nullable();
            $table->text('daily_sales_goal_sum')->nullable();
            $table->text('daily_ou1_sum')->nullable();
            $table->text('daily_current_sum')->nullable();
            $table->text('daily_ly2_sum')->nullable();
            $table->text('daily_goal_sum')->nullable();
            $table->text('daily_ou2_sum')->nullable();

            $table->text('daily_tracking')->nullable();
            $table->text('daily_actual')->nullable();
            $table->text('daily_actual_goal')->nullable();
            $table->text('daily_on_track')->nullable();
            $table->text('daily_no_business_days')->nullable();
            $table->text('daily_on_above_below')->nullable();


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
        Schema::dropIfExists('daily_updates');
    }
};
