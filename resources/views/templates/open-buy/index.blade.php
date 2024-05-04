@extends('layouts.avatar')
@section('title')
Open To Buy | Know Your Inventory
@endsection
@section('avatar_content')

<style>
    td{
        min-width: 40px;
    }

    .table.table-bordered.table-condensed input.form-control{
        min-width: 120px;
        font-size: 14px !important
    }
</style>


@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="container-fluid">
    <div class="row">
        <form action="{{route('save.open.buy')}}" method="POST" id="">
        @csrf
        <div class="col-12 text-center">
            <div class="">
                <h1 class="display-3">Open To Buy</h1>
            </div>
        </div>
        <div class="col-12 text-center">
            <div class="py-5">
                <label for="title">Department/Category</label>
                <input type="text" class="form-control" name="title" placeholder="Department/Category" required>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-striped open-to-buy">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Jan</th>
                            <th>Feb</th>
                            <th>Mar</th>
                            <th>Apr</th>
                            <th>May</th>
                            <th>Jun</th>
                            <th>Jul</th>
                            <th>Aug</th>
                            <th>Sep</th>
                            <th>Oct</th>
                            <th>Nov</th>
                            <th>Dec</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Inventory Target</td>
                            <td><input type="text" class="form-control jan_inv_tar" name="jan_inv_tar" readonly></td>
                            <td><input type="text" class="form-control feb_inv_tar" name="feb_inv_tar" readonly></td>
                            <td><input type="text" class="form-control mar_inv_tar" name="mar_inv_tar" readonly></td>
                            <td><input type="text" class="form-control apr_inv_tar" name="apr_inv_tar" readonly></td>
                            <td><input type="text" class="form-control may_inv_tar" name="may_inv_tar" readonly></td>
                            <td><input type="text" class="form-control jun_inv_tar" name="jun_inv_tar" readonly></td>
                            <td><input type="text" class="form-control jul_inv_tar" name="jul_inv_tar" readonly></td>
                            <td><input type="text" class="form-control aug_inv_tar" name="aug_inv_tar" readonly></td>
                            <td><input type="text" class="form-control sep_inv_tar" name="sep_inv_tar" readonly></td>
                            <td><input type="text" class="form-control oct_inv_tar" name="oct_inv_tar" readonly></td>
                            <td><input type="text" class="form-control nov_inv_tar" name="nov_inv_tar" readonly></td>
                            <td><input type="text" class="form-control dec_inv_tar" name="dec_inv_tar" readonly></td>
                        </tr>
                        <tr>
                            <td>Inventory Valuation</td>
                            <td><input type="text" class="form-control jan_inv_val" name="jan_inv_val"></td>
                            <td><input type="text" class="form-control feb_inv_val" name="feb_inv_val"></td>
                            <td><input type="text" class="form-control mar_inv_val" name="mar_inv_val"></td>
                            <td><input type="text" class="form-control apr_inv_val" name="apr_inv_val"></td>
                            <td><input type="text" class="form-control may_inv_val" name="may_inv_val"></td>
                            <td><input type="text" class="form-control jun_inv_val" name="jun_inv_val"></td>
                            <td><input type="text" class="form-control jul_inv_val" name="jul_inv_val"></td>
                            <td><input type="text" class="form-control aug_inv_val" name="aug_inv_val"></td>
                            <td><input type="text" class="form-control sep_inv_val" name="sep_inv_val"></td>
                            <td><input type="text" class="form-control oct_inv_val" name="oct_inv_val"></td>
                            <td><input type="text" class="form-control nov_inv_val" name="nov_inv_val"></td>
                            <td><input type="text" class="form-control dec_inv_val" name="dec_inv_val"></td>
                        </tr>
                        <tr>
                            <td>Retail Sales</td>
                            <td><input type="text" class="form-control jan_ret_sale" name="jan_ret_sale"></td>
                            <td><input type="text" class="form-control feb_ret_sale" name="feb_ret_sale"></td>
                            <td><input type="text" class="form-control mar_ret_sale" name="mar_ret_sale"></td>
                            <td><input type="text" class="form-control apr_ret_sale" name="apr_ret_sale"></td>
                            <td><input type="text" class="form-control may_ret_sale" name="may_ret_sale"></td>
                            <td><input type="text" class="form-control jun_ret_sale" name="jun_ret_sale"></td>
                            <td><input type="text" class="form-control jul_ret_sale" name="jul_ret_sale"></td>
                            <td><input type="text" class="form-control aug_ret_sale" name="aug_ret_sale"></td>
                            <td><input type="text" class="form-control sep_ret_sale" name="sep_ret_sale"></td>
                            <td><input type="text" class="form-control oct_ret_sale" name="oct_ret_sale"></td>
                            <td><input type="text" class="form-control nov_ret_sale" name="nov_ret_sale"></td>
                            <td><input type="text" class="form-control dec_ret_sale" name="dec_ret_sale"></td>
                        </tr>
                        <tr>
                            <td>COGS</td>
                            <td><input type="text" class="form-control jan_cogs" name="jan_cogs"></td>
                            <td><input type="text" class="form-control feb_cogs" name="feb_cogs"></td>
                            <td><input type="text" class="form-control mar_cogs" name="mar_cogs"></td>
                            <td><input type="text" class="form-control apr_cogs" name="apr_cogs"></td>
                            <td><input type="text" class="form-control may_cogs" name="may_cogs"></td>
                            <td><input type="text" class="form-control jun_cogs" name="jun_cogs"></td>
                            <td><input type="text" class="form-control jul_cogs" name="jul_cogs"></td>
                            <td><input type="text" class="form-control aug_cogs" name="aug_cogs"></td>
                            <td><input type="text" class="form-control sep_cogs" name="sep_cogs"></td>
                            <td><input type="text" class="form-control oct_cogs" name="oct_cogs"></td>
                            <td><input type="text" class="form-control nov_cogs" name="nov_cogs"></td>
                            <td><input type="text" class="form-control dec_cogs" name="dec_cogs"></td>
                        </tr>
                        <tr>
                            <td>Margin</td>
                            <td><input type="text" class="form-control jan_margin" name="jan_margin" readonly></td>
                            <td><input type="text" class="form-control feb_margin" name="feb_margin" readonly></td>
                            <td><input type="text" class="form-control mar_margin" name="mar_margin" readonly></td>
                            <td><input type="text" class="form-control apr_margin" name="apr_margin" readonly></td>
                            <td><input type="text" class="form-control may_margin" name="may_margin" readonly></td>
                            <td><input type="text" class="form-control jun_margin" name="jun_margin" readonly></td>
                            <td><input type="text" class="form-control jul_margin" name="jul_margin" readonly></td>
                            <td><input type="text" class="form-control aug_margin" name="aug_margin" readonly></td>
                            <td><input type="text" class="form-control sep_margin" name="sep_margin" readonly></td>
                            <td><input type="text" class="form-control oct_margin" name="oct_margin" readonly></td>
                            <td><input type="text" class="form-control nov_margin" name="nov_margin" readonly></td>
                            <td><input type="text" class="form-control dec_margin" name="dec_margin" readonly></td>
                        </tr>
                        <tr>
                            <td>LY Sales</td>
                            <td><input type="text" class="form-control jan_ly_sales" name="jan_ly_sales"></td>
                            <td><input type="text" class="form-control feb_ly_sales" name="feb_ly_sales"></td>
                            <td><input type="text" class="form-control mar_ly_sales" name="mar_ly_sales"></td>
                            <td><input type="text" class="form-control apr_ly_sales" name="apr_ly_sales"></td>
                            <td><input type="text" class="form-control may_ly_sales" name="may_ly_sales"></td>
                            <td><input type="text" class="form-control jun_ly_sales" name="jun_ly_sales"></td>
                            <td><input type="text" class="form-control jul_ly_sales" name="jul_ly_sales"></td>
                            <td><input type="text" class="form-control aug_ly_sales" name="aug_ly_sales"></td>
                            <td><input type="text" class="form-control sep_ly_sales" name="sep_ly_sales"></td>
                            <td><input type="text" class="form-control oct_ly_sales" name="oct_ly_sales"></td>
                            <td><input type="text" class="form-control nov_ly_sales" name="nov_ly_sales"></td>
                            <td><input type="text" class="form-control dec_ly_sales" name="dec_ly_sales"></td>
                        </tr>
                        <tr>
                            <td>% Sales Change</td>
                            <td><input type="text" class="form-control jan_sales_change" name="jan_sales_change" readonly></td>
                            <td><input type="text" class="form-control feb_sales_change" name="feb_sales_change" readonly></td>
                            <td><input type="text" class="form-control mar_sales_change" name="mar_sales_change" readonly></td>
                            <td><input type="text" class="form-control apr_sales_change" name="apr_sales_change" readonly></td>
                            <td><input type="text" class="form-control may_sales_change" name="may_sales_change" readonly></td>
                            <td><input type="text" class="form-control jun_sales_change" name="jun_sales_change" readonly></td>
                            <td><input type="text" class="form-control jul_sales_change" name="jul_sales_change" readonly></td>
                            <td><input type="text" class="form-control aug_sales_change" name="aug_sales_change" readonly></td>
                            <td><input type="text" class="form-control sep_sales_change" name="sep_sales_change" readonly></td>
                            <td><input type="text" class="form-control oct_sales_change" name="oct_sales_change" readonly></td>
                            <td><input type="text" class="form-control nov_sales_change" name="nov_sales_change" readonly></td>
                            <td><input type="text" class="form-control dec_sales_change" name="dec_sales_change" readonly></td>
                        </tr>
                        <tr>
                            <td>Planned Sales</td>
                            <td><input type="text" class="form-control jan_planned_sales" name="jan_planned_sales"></td>
                            <td><input type="text" class="form-control feb_planned_sales" name="feb_planned_sales"></td>
                            <td><input type="text" class="form-control mar_planned_sales" name="mar_planned_sales"></td>
                            <td><input type="text" class="form-control apr_planned_sales" name="apr_planned_sales"></td>
                            <td><input type="text" class="form-control may_planned_sales" name="may_planned_sales"></td>
                            <td><input type="text" class="form-control jun_planned_sales" name="jun_planned_sales"></td>
                            <td><input type="text" class="form-control jul_planned_sales" name="jul_planned_sales"></td>
                            <td><input type="text" class="form-control aug_planned_sales" name="aug_planned_sales"></td>
                            <td><input type="text" class="form-control sep_planned_sales" name="sep_planned_sales"></td>
                            <td><input type="text" class="form-control oct_planned_sales" name="oct_planned_sales"></td>
                            <td><input type="text" class="form-control nov_planned_sales" name="nov_planned_sales"></td>
                            <td><input type="text" class="form-control dec_planned_sales" name="dec_planned_sales"></td>
                        </tr>
                        <tr>
                            <td>Inventory on Order</td>
                            <td><input type="text" class="form-control jan_inventory_on_order" name="jan_inventory_on_order"></td>
                            <td><input type="text" class="form-control feb_inventory_on_order" name="feb_inventory_on_order"></td>
                            <td><input type="text" class="form-control mar_inventory_on_order" name="mar_inventory_on_order"></td>
                            <td><input type="text" class="form-control apr_inventory_on_order" name="apr_inventory_on_order"></td>
                            <td><input type="text" class="form-control may_inventory_on_order" name="may_inventory_on_order"></td>
                            <td><input type="text" class="form-control jun_inventory_on_order" name="jun_inventory_on_order"></td>
                            <td><input type="text" class="form-control jul_inventory_on_order" name="jul_inventory_on_order"></td>
                            <td><input type="text" class="form-control aug_inventory_on_order" name="aug_inventory_on_order"></td>
                            <td><input type="text" class="form-control sep_inventory_on_order" name="sep_inventory_on_order"></td>
                            <td><input type="text" class="form-control oct_inventory_on_order" name="oct_inventory_on_order"></td>
                            <td><input type="text" class="form-control nov_inventory_on_order" name="nov_inventory_on_order"></td>
                            <td><input type="text" class="form-control dec_inventory_on_order" name="dec_inventory_on_order"></td>
                        </tr>
                        <tr>
                            <td>Inventory Purchased</td>
                            <td><input type="text" class="form-control jan_inventory_purchased" name="jan_inventory_purchased"></td>
                            <td><input type="text" class="form-control feb_inventory_purchased" name="feb_inventory_purchased"></td>
                            <td><input type="text" class="form-control mar_inventory_purchased" name="mar_inventory_purchased"></td>
                            <td><input type="text" class="form-control apr_inventory_purchased" name="apr_inventory_purchased"></td>
                            <td><input type="text" class="form-control may_inventory_purchased" name="may_inventory_purchased"></td>
                            <td><input type="text" class="form-control jun_inventory_purchased" name="jun_inventory_purchased"></td>
                            <td><input type="text" class="form-control jul_inventory_purchased" name="jul_inventory_purchased"></td>
                            <td><input type="text" class="form-control aug_inventory_purchased" name="aug_inventory_purchased"></td>
                            <td><input type="text" class="form-control sep_inventory_purchased" name="sep_inventory_purchased"></td>
                            <td><input type="text" class="form-control oct_inventory_purchased" name="oct_inventory_purchased"></td>
                            <td><input type="text" class="form-control nov_inventory_purchased" name="nov_inventory_purchased"></td>
                            <td><input type="text" class="form-control dec_inventory_purchased" name="dec_inventory_purchased"></td>
                        </tr>
                        <tr>
                            <td>Inventory Quantity on Hand</td>
                            <td><input type="text" class="form-control jan_inventory_on_hand" name="jan_inventory_on_hand"></td>
                            <td><input type="text" class="form-control feb_inventory_on_hand" name="feb_inventory_on_hand"></td>
                            <td><input type="text" class="form-control mar_inventory_on_hand" name="mar_inventory_on_hand"></td>
                            <td><input type="text" class="form-control apr_inventory_on_hand" name="apr_inventory_on_hand"></td>
                            <td><input type="text" class="form-control may_inventory_on_hand" name="may_inventory_on_hand"></td>
                            <td><input type="text" class="form-control jun_inventory_on_hand" name="jun_inventory_on_hand"></td>
                            <td><input type="text" class="form-control jul_inventory_on_hand" name="jul_inventory_on_hand"></td>
                            <td><input type="text" class="form-control aug_inventory_on_hand" name="aug_inventory_on_hand"></td>
                            <td><input type="text" class="form-control sep_inventory_on_hand" name="sep_inventory_on_hand"></td>
                            <td><input type="text" class="form-control oct_inventory_on_hand" name="oct_inventory_on_hand"></td>
                            <td><input type="text" class="form-control nov_inventory_on_hand" name="nov_inventory_on_hand"></td>
                            <td><input type="text" class="form-control dec_inventory_on_hand" name="dec_inventory_on_hand"></td>
                        </tr>
                        <tr>
                            <td>Inventory Quantity Sold</td>
                            <td><input type="text" class="form-control jan_inventory_sold" name="jan_inventory_sold"></td>
                            <td><input type="text" class="form-control feb_inventory_sold" name="feb_inventory_sold"></td>
                            <td><input type="text" class="form-control mar_inventory_sold" name="mar_inventory_sold"></td>
                            <td><input type="text" class="form-control apr_inventory_sold" name="apr_inventory_sold"></td>
                            <td><input type="text" class="form-control may_inventory_sold" name="may_inventory_sold"></td>
                            <td><input type="text" class="form-control jun_inventory_sold" name="jun_inventory_sold"></td>
                            <td><input type="text" class="form-control jul_inventory_sold" name="jul_inventory_sold"></td>
                            <td><input type="text" class="form-control aug_inventory_sold" name="aug_inventory_sold"></td>
                            <td><input type="text" class="form-control sep_inventory_sold" name="sep_inventory_sold"></td>
                            <td><input type="text" class="form-control oct_inventory_sold" name="oct_inventory_sold"></td>
                            <td><input type="text" class="form-control nov_inventory_sold" name="nov_inventory_sold"></td>
                            <td><input type="text" class="form-control dec_inventory_sold" name="dec_inventory_sold"></td>
                        </tr>
                        <tr>
                            <td>Inventory Turnover</td>
                            <td><input type="text" class="form-control jan_inventory_turnover" name="jan_inventory_turnover" readonly></td>
                            <td><input type="text" class="form-control feb_inventory_turnover" name="feb_inventory_turnover" readonly></td>
                            <td><input type="text" class="form-control mar_inventory_turnover" name="mar_inventory_turnover" readonly></td>
                            <td><input type="text" class="form-control apr_inventory_turnover" name="apr_inventory_turnover" readonly></td>
                            <td><input type="text" class="form-control may_inventory_turnover" name="may_inventory_turnover" readonly></td>
                            <td><input type="text" class="form-control jun_inventory_turnover" name="jun_inventory_turnover" readonly></td>
                            <td><input type="text" class="form-control jul_inventory_turnover" name="jul_inventory_turnover" readonly></td>
                            <td><input type="text" class="form-control aug_inventory_turnover" name="aug_inventory_turnover" readonly></td>
                            <td><input type="text" class="form-control sep_inventory_turnover" name="sep_inventory_turnover" readonly></td>
                            <td><input type="text" class="form-control oct_inventory_turnover" name="oct_inventory_turnover" readonly></td>
                            <td><input type="text" class="form-control nov_inventory_turnover" name="nov_inventory_turnover" readonly></td>
                            <td><input type="text" class="form-control dec_inventory_turnover" name="dec_inventory_turnover" readonly></td>
                        </tr>
                        <tr>
                            <td>Days Supply</td>
                            <td><input type="text" class="form-control jan_days_supply" name="jan_days_supply" readonly></td>
                            <td><input type="text" class="form-control feb_days_supply" name="feb_days_supply" readonly></td>
                            <td><input type="text" class="form-control mar_days_supply" name="mar_days_supply" readonly></td>
                            <td><input type="text" class="form-control apr_days_supply" name="apr_days_supply" readonly></td>
                            <td><input type="text" class="form-control may_days_supply" name="may_days_supply" readonly></td>
                            <td><input type="text" class="form-control jun_days_supply" name="jun_days_supply" readonly></td>
                            <td><input type="text" class="form-control jul_days_supply" name="jul_days_supply" readonly></td>
                            <td><input type="text" class="form-control aug_days_supply" name="aug_days_supply" readonly></td>
                            <td><input type="text" class="form-control sep_days_supply" name="sep_days_supply" readonly></td>
                            <td><input type="text" class="form-control oct_days_supply" name="oct_days_supply" readonly></td>
                            <td><input type="text" class="form-control nov_days_supply" name="nov_days_supply" readonly></td>
                            <td><input type="text" class="form-control dec_days_supply" name="dec_days_supply" readonly></td>
                        </tr>
                        <tr>
                            <td>Sell Through</td>
                            <td><input type="text" class="form-control jan_sell_through" name="jan_sell_through" readonly></td>
                            <td><input type="text" class="form-control feb_sell_through" name="feb_sell_through" readonly></td>
                            <td><input type="text" class="form-control mar_sell_through" name="mar_sell_through" readonly></td>
                            <td><input type="text" class="form-control apr_sell_through" name="apr_sell_through" readonly></td>
                            <td><input type="text" class="form-control may_sell_through" name="may_sell_through" readonly></td>
                            <td><input type="text" class="form-control jun_sell_through" name="jun_sell_through" readonly></td>
                            <td><input type="text" class="form-control jul_sell_through" name="jul_sell_through" readonly></td>
                            <td><input type="text" class="form-control aug_sell_through" name="aug_sell_through" readonly></td>
                            <td><input type="text" class="form-control sep_sell_through" name="sep_sell_through" readonly></td>
                            <td><input type="text" class="form-control oct_sell_through" name="oct_sell_through" readonly></td>
                            <td><input type="text" class="form-control nov_sell_through" name="nov_sell_through" readonly></td>
                            <td><input type="text" class="form-control dec_sell_through" name="dec_sell_through" readonly></td>
                        </tr>
                        <tr>
                            <td>Stock to Sales</td>
                            <td><input type="text" class="form-control jan_stock_sales" name="jan_stock_sales" readonly></td>
                            <td><input type="text" class="form-control feb_stock_sales" name="feb_stock_sales" readonly></td>
                            <td><input type="text" class="form-control mar_stock_sales" name="mar_stock_sales" readonly></td>
                            <td><input type="text" class="form-control apr_stock_sales" name="apr_stock_sales" readonly></td>
                            <td><input type="text" class="form-control may_stock_sales" name="may_stock_sales" readonly></td>
                            <td><input type="text" class="form-control jun_stock_sales" name="jun_stock_sales" readonly></td>
                            <td><input type="text" class="form-control jul_stock_sales" name="jul_stock_sales" readonly></td>
                            <td><input type="text" class="form-control aug_stock_sales" name="aug_stock_sales" readonly></td>
                            <td><input type="text" class="form-control sep_stock_sales" name="sep_stock_sales" readonly></td>
                            <td><input type="text" class="form-control oct_stock_sales" name="oct_stock_sales" readonly></td>
                            <td><input type="text" class="form-control nov_stock_sales" name="nov_stock_sales" readonly></td>
                            <td><input type="text" class="form-control dec_stock_sales" name="dec_stock_sales" readonly></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="col-lg-12 my-3">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr  class="text-center">
                            <th>Month</th>
                            <th>Sales Output</th>
                            <th>Ending Inventory Output</th>
                            <th>Begin Inventory Output</th>
                            <th>OTB</th>
                            <th>On Order Output</th>
                            <th>Net MTB Output</th>
                            <th>Turns Output</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="text-center">December</td>
                            <td><input type="text" class="form-control dec_sales_output" name="dec_sales_output" readonly></td>
                            <td><input type="text" class="form-control dec_ending_inv_output" name="dec_ending_inv_output" readonly></td>
                            <td><input type="text" class="form-control dec_begin_inv_output" name="dec_begin_inv_output" readonly></td>
                            <td><input type="text" class="form-control dec_otb" name="dec_otb" readonly></td>
                            <td><input type="text" class="form-control dec_on_order_output" name="dec_on_order_output" readonly></td>
                            <td><input type="text" class="form-control dec_net_mtb_output" name="dec_net_mtb_output" readonly></td>
                            <td><input type="text" class="form-control dec_turns_output" name="dec_turns_output" readonly></td>
                        </tr>

                        <tr>
                            <td class="text-center">January</td>
                            <td><input type="text" class="form-control jan_sales_output" name="jan_sales_output" readonly></td>
                            <td><input type="text" class="form-control jan_ending_inv_output" name="jan_ending_inv_output" readonly></td>
                            <td><input type="text" class="form-control jan_begin_inv_output" name="jan_begin_inv_output" readonly></td>
                            <td><input type="text" class="form-control jan_otb" name="jan_otb" readonly></td>
                            <td><input type="text" class="form-control jan_on_order_output" name="jan_on_order_output" readonly></td>
                            <td><input type="text" class="form-control jan_net_mtb_output" name="jan_net_mtb_output" readonly></td>
                            <td><input type="text" class="form-control jan_turns_output" name="jan_turns_output" readonly></td>
                        </tr>

                        <tr>
                            <td class="text-center">February</td>
                            <td><input type="text" class="form-control feb_sales_output" name="feb_sales_output" readonly></td>
                            <td><input type="text" class="form-control feb_ending_inv_output" name="feb_ending_inv_output" readonly></td>
                            <td><input type="text" class="form-control feb_begin_inv_output" name="feb_begin_inv_output" readonly></td>
                            <td><input type="text" class="form-control feb_otb" name="feb_otb" readonly></td>
                            <td><input type="text" class="form-control feb_on_order_output" name="feb_on_order_output" readonly></td>
                            <td><input type="text" class="form-control feb_net_mtb_output" name="feb_net_mtb_output" readonly></td>
                            <td><input type="text" class="form-control feb_turns_output" name="feb_turns_output" readonly></td>
                        </tr>

                        <tr>
                            <td class="text-center">March</td>
                            <td><input type="text" class="form-control mar_sales_output" name="mar_sales_output" readonly></td>
                            <td><input type="text" class="form-control mar_ending_inv_output" name="mar_ending_inv_output" readonly></td>
                            <td><input type="text" class="form-control mar_begin_inv_output" name="mar_begin_inv_output" readonly></td>
                            <td><input type="text" class="form-control mar_otb" name="mar_otb" readonly></td>
                            <td><input type="text" class="form-control mar_on_order_output" name="mar_on_order_output" readonly></td>
                            <td><input type="text" class="form-control mar_net_mtb_output" name="mar_net_mtb_output" readonly></td>
                            <td><input type="text" class="form-control mar_turns_output" name="mar_turns_output" readonly></td>
                        </tr>

                        <tr>
                            <td class="text-center">April</td>
                            <td><input type="text" class="form-control apr_sales_output" name="apr_sales_output" readonly></td>
                            <td><input type="text" class="form-control apr_ending_inv_output" name="apr_ending_inv_output" readonly></td>
                            <td><input type="text" class="form-control apr_begin_inv_output" name="apr_begin_inv_output" readonly></td>
                            <td><input type="text" class="form-control apr_otb" name="apr_otb" readonly></td>
                            <td><input type="text" class="form-control apr_on_order_output" name="apr_on_order_output" readonly></td>
                            <td><input type="text" class="form-control apr_net_mtb_output" name="apr_net_mtb_output" readonly></td>
                            <td><input type="text" class="form-control apr_turns_output" name="apr_turns_output" readonly></td>
                        </tr>
                        <tr>
                            <td class="text-center">May</td>
                            <td><input type="text" class="form-control may_sales_output" name="may_sales_output" readonly></td>
                            <td><input type="text" class="form-control may_ending_inv_output" name="may_ending_inv_output" readonly></td>
                            <td><input type="text" class="form-control may_begin_inv_output" name="may_begin_inv_output" readonly></td>
                            <td><input type="text" class="form-control may_otb" name="may_otb" readonly></td>
                            <td><input type="text" class="form-control may_on_order_output" name="may_on_order_output" readonly></td>
                            <td><input type="text" class="form-control may_net_mtb_output" name="may_net_mtb_output" readonly></td>
                            <td><input type="text" class="form-control may_turns_output" name="may_turns_output" readonly></td>
                        </tr>

                        <tr>
                            <td class="text-center">June</td>
                            <td><input type="text" class="form-control jun_sales_output" name="jun_sales_output" readonly></td>
                            <td><input type="text" class="form-control jun_ending_inv_output" name="jun_ending_inv_output" readonly></td>
                            <td><input type="text" class="form-control jun_begin_inv_output" name="jun_begin_inv_output" readonly></td>
                            <td><input type="text" class="form-control jun_otb" name="jun_otb" readonly></td>
                            <td><input type="text" class="form-control jun_on_order_output" name="jun_on_order_output" readonly></td>
                            <td><input type="text" class="form-control jun_net_mtb_output" name="jun_net_mtb_output" readonly></td>
                            <td><input type="text" class="form-control jun_turns_output" name="jun_turns_output" readonly></td>
                        </tr>

                        <tr>
                            <td class="text-center">July</td>
                            <td><input type="text" class="form-control jul_sales_output" name="jul_sales_output" readonly></td>
                            <td><input type="text" class="form-control jul_ending_inv_output" name="jul_ending_inv_output" readonly></td>
                            <td><input type="text" class="form-control jul_begin_inv_output" name="jul_begin_inv_output" readonly></td>
                            <td><input type="text" class="form-control jul_otb" name="jul_otb" readonly></td>
                            <td><input type="text" class="form-control jul_on_order_output" name="jul_on_order_output" readonly></td>
                            <td><input type="text" class="form-control jul_net_mtb_output" name="jul_net_mtb_output" readonly></td>
                            <td><input type="text" class="form-control jul_turns_output" name="jul_turns_output" readonly></td>
                        </tr>

                        <tr>
                            <td class="text-center">August</td>
                            <td><input type="text" class="form-control aug_sales_output" name="aug_sales_output" readonly></td>
                            <td><input type="text" class="form-control aug_ending_inv_output" name="aug_ending_inv_output" readonly></td>
                            <td><input type="text" class="form-control aug_begin_inv_output" name="aug_begin_inv_output" readonly></td>
                            <td><input type="text" class="form-control aug_otb" name="aug_otb" readonly></td>
                            <td><input type="text" class="form-control aug_on_order_output" name="aug_on_order_output" readonly></td>
                            <td><input type="text" class="form-control aug_net_mtb_output" name="aug_net_mtb_output" readonly></td>
                            <td><input type="text" class="form-control aug_turns_output" name="aug_turns_output" readonly></td>
                        </tr>

                        <tr>
                            <td class="text-center">September</td>
                            <td><input type="text" class="form-control sep_sales_output" name="sep_sales_output" readonly></td>
                            <td><input type="text" class="form-control sep_ending_inv_output" name="sep_ending_inv_output" readonly></td>
                            <td><input type="text" class="form-control sep_begin_inv_output" name="sep_begin_inv_output" readonly></td>
                            <td><input type="text" class="form-control sep_otb" name="sep_otb" readonly></td>
                            <td><input type="text" class="form-control sep_on_order_output" name="sep_on_order_output" readonly></td>
                            <td><input type="text" class="form-control sep_net_mtb_output" name="sep_net_mtb_output" readonly></td>
                            <td><input type="text" class="form-control sep_turns_output" name="sep_turns_output" readonly></td>
                        </tr>

                        <tr>
                            <td class="text-center">October</td>
                            <td><input type="text" class="form-control oct_sales_output" name="oct_sales_output" readonly></td>
                            <td><input type="text" class="form-control oct_ending_inv_output" name="oct_ending_inv_output" readonly></td>
                            <td><input type="text" class="form-control oct_begin_inv_output" name="oct_begin_inv_output" readonly></td>
                            <td><input type="text" class="form-control oct_otb" name="oct_otb" readonly></td>
                            <td><input type="text" class="form-control oct_on_order_output" name="oct_on_order_output" readonly></td>
                            <td><input type="text" class="form-control oct_net_mtb_output" name="oct_net_mtb_output" readonly></td>
                            <td><input type="text" class="form-control oct_turns_output" name="oct_turns_output" readonly></td>
                        </tr>

                        <tr>
                            <td class="text-center">November</td>
                            <td><input type="text" class="form-control nov_sales_output" name="nov_sales_output" readonly></td>
                            <td><input type="text" class="form-control nov_ending_inv_output" name="nov_ending_inv_output" readonly></td>
                            <td><input type="text" class="form-control nov_begin_inv_output" name="nov_begin_inv_output" readonly></td>
                            <td><input type="text" class="form-control nov_otb" name="nov_otb" readonly></td>
                            <td><input type="text" class="form-control nov_on_order_output" name="nov_on_order_output" readonly></td>
                            <td><input type="text" class="form-control nov_net_mtb_output" name="nov_net_mtb_output" readonly></td>
                            <td><input type="text" class="form-control nov_turns_output" name="nov_turns_output" readonly></td>
                        </tr>
                        
                        <tr>
                            <td class="text-center">December</td>
                            <td><input type="text" class="form-control dec_sales_output" name="dec_two_sales_output" readonly></td>
                            <td><input type="text" class="form-control dec_ending_inv_output" name="dec_two_ending_inv_output" readonly></td>
                            <td><input type="text" class="form-control dec_begin_inv_output" name="dec_two_begin_inv_output" readonly></td>
                            <td><input type="text" class="form-control dec_otb" name="dec_two_otb" readonly></td>
                            <td><input type="text" class="form-control dec_on_order_output" name="dec_two_on_order_output" readonly></td>
                            <td><input type="text" class="form-control dec_net_mtb_output" name="dec_two_net_mtb_output" readonly></td>
                            <td><input type="text" class="form-control dec_turns_output" name="dec_two_turns_output" readonly></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> --}}

        <div class="text-center my-5">
            <button class="btn btn-primary px-5" type="submit">Save</button>
        </div>
        </form>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        // Array of month abbreviations
        const months = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"];

        // Function to calculate and update Inventory Target
        function updateInventoryTarget(month) {
            let retailSales = parseFloat($(`.${month}_ret_sale`).val()) || 0;
            let inventoryTarget = (retailSales * 1.1) * 3;
            let nextMonthIndex = (months.indexOf(month) + 1) % 12;
            let nextMonth = months[nextMonthIndex];
            $(`.${nextMonth}_inv_tar`).val(inventoryTarget.toFixed(2));
        }

        // Function to calculate and update Margin
        function updateMargin(month) {
            let retailSales = parseFloat($(`.${month}_ret_sale`).val()) || 0;
            let cogs = parseFloat($(`.${month}_cogs`).val()) || 0;
            let margin = (retailSales - cogs) / retailSales;
            $(`.${month}_margin`).val((margin * 100).toFixed(2) + '%');
        }

        // Function to calculate and update % Sales Change
        function updateSalesChange(month) {
            let retailSales = parseFloat($(`.${month}_ret_sale`).val()) || 0;
            let lySales = parseFloat($(`.${month}_ly_sales`).val()) || 0;
            let salesChange = (retailSales - lySales) / retailSales;
            $(`.${month}_sales_change`).val((salesChange * 100).toFixed(2) + '%');
        }

        // Function to calculate and update Inventory Turnover
        function updateInventoryTurnover(month) {
            let cogs = parseFloat($(`.${month}_cogs`).val()) || 0;
            let invVal = parseFloat($(`.${month}_inv_val`).val()) || 0;
            let inventoryTurnover = cogs / invVal;
            $(`.${month}_inventory_turnover`).val((inventoryTurnover * 100).toFixed(2) + '%');
        }

        // Function to calculate and update Days Supply
        function updateDaysSupply(month) {
            let invVal = parseFloat($(`.${month}_inv_val`).val()) || 0;
            let cogs = parseFloat($(`.${month}_cogs`).val()) || 0;

            let daysInMonth;
            switch (month) {
                case "jan":
                case "feb":
                case "mar":
                case "jun":
                case "jul":
                case "aug":
                case "sep":
                case "oct":
                case "dec":
                    daysInMonth = 31;
                    break;
                case "may":
                case "nov":
                    daysInMonth = 30;
                    break;
                case "apr":
                    daysInMonth = 28;
                    break;
                default:
                    daysInMonth = 0;
            }
            let daysSupply = (invVal / (cogs / daysInMonth));
            $(`.${month}_days_supply`).val(daysSupply.toFixed(2));
        }

        // Function to calculate and update Sell Through
        function updateSellThrough(month) {
            let invOnHand = parseFloat($(`.${month}_inventory_on_hand`).val()) || 0;
            let invSold = parseFloat($(`.${month}_inventory_sold`).val()) || 0;
            let sellThrough = (invSold / invOnHand) * 1;
            $(`.${month}_sell_through`).val((sellThrough * 100).toFixed(2) + '%');
        }

        // Function to calculate and update Stock to Sales
        function updateStockToSales(month) {
            let retSales = parseFloat($(`.${month}_ret_sale`).val()) || 0;
            let invVal = parseFloat($(`.${month}_inv_val`).val()) || 0;
            let stockToSales = invVal / retSales;
            $(`.${month}_stock_sales`).val(stockToSales.toFixed(2));
        }

        // Add event listener for Retail Sales input fields
        $(".form-control").on("input", function () {
            // Get the month abbreviation from the input field's class
            let month = $(this).attr("class").split(" ")[1].split("_")[0];

            // Update Inventory Target for the current month
            updateInventoryTarget(month);
            // Update Margin for the current month
            updateMargin(month);
            // Update % Sales Change for the current month
            updateSalesChange(month);
            // Update Inventory Turnover for the current month
            updateInventoryTurnover(month);
            // Update Days Supply for the current month
            updateDaysSupply(month);
            // Update Stock to Sales for the current month
            updateStockToSales(month);
            // Update Sell Through for the current month
            updateSellThrough(month);
        });
    });
</script>

<script>
    
        
    // Your JavaScript code
    $(".form-control").on("input", function () {
        // Set values for all months
        setSalesOutput('dec');
        setSalesOutput('jan');
        setSalesOutput('feb');
        setSalesOutput('mar');
        setSalesOutput('apr');
        setSalesOutput('may');
        setSalesOutput('jun');
        setSalesOutput('jul');
        setSalesOutput('aug');
        setSalesOutput('sep');
        setSalesOutput('oct');
        setSalesOutput('nov');

        // Set values for all months
        setInvOutput('dec');
        setInvOutput('jan');
        setInvOutput('feb');
        setInvOutput('mar');
        setInvOutput('apr');
        setInvOutput('may');
        setInvOutput('jun');
        setInvOutput('jul');
        setInvOutput('aug');
        setInvOutput('sep');
        setInvOutput('oct');
        setInvOutput('nov');

        
        function setSalesOutput(month) {
            var ret_sale_value = $('.form-control.' + month + '_ret_sale').val();
            var salesOutput = parseFloat(ret_sale_value) || 0;
            $('.form-control.' + month + '_sales_output').val(formatCurrency(salesOutput));
            calculateEndingInv(month);
            calculateOTB(month);
        }

        function setInvOutput(month) {
            var inv_val_value = $('.form-control.' + month + '_inv_val').val();
            var invOutput = parseFloat(inv_val_value) || 0;
            $('.form-control.' + month + '_begin_inv_output').val(formatCurrency(invOutput));
            calculateEndingInv(month);
            calculateOTB(month);
        }

        function calculateEndingInv(currentMonth) {
            var months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];
            var currentIndex = months.indexOf(currentMonth);
            // Calculate the sum of sales_output for the next 3 months
            var sumSalesOutput = 0;
            for (var i = 1; i <= 3; i++) {
                var nextMonthIndex = (currentIndex + i) % 12;
                var nextMonth = months[nextMonthIndex];
                var nextMonthSalesOutput = parseFloat($('.form-control.' + nextMonth + '_sales_output').val().replace(/\$|,/g, '')) || 0;
                sumSalesOutput += nextMonthSalesOutput;
            }
            $('.form-control.' + currentMonth + '_ending_inv_output').val(formatCurrency(sumSalesOutput));
        }

        function calculateOTB(currentMonth) {
            var salesOutput = parseFloat($('.form-control.' + currentMonth + '_sales_output').val().replace(/\$|,/g, '')) || 0;
            var endingInvOutput = parseFloat($('.form-control.' + currentMonth + '_ending_inv_output').val().replace(/\$|,/g, '')) || 0;
            var beginInvOutput = parseFloat($('.form-control.' + currentMonth + '_begin_inv_output').val().replace(/\$|,/g, '')) || 0;

            var oTB = (salesOutput + endingInvOutput) - beginInvOutput;

            $('.form-control.' + currentMonth + '_otb').val(formatCurrency(oTB));
        }

        var monthSeven = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep'];

        for (var i = 0; i < monthSeven.length; i++) {
            calculateTurnsOutput(monthSeven[i]);
        }

        // Function to calculate turns_output for a given month
        function calculateTurnsOutput(currentMonth) {
            var endingInvOutput = parseFloat($('.form-control.' + currentMonth + '_ending_inv_output').val().replace(/\$|,/g, '')) || 0;
            var salesOutput = parseFloat($('.form-control.' + currentMonth + '_sales_output').val().replace(/\$|,/g, '')) || 0;
            var turnsOutput = salesOutput !== 0 ? endingInvOutput / salesOutput : 0;
            $('.form-control.' + currentMonth + '_turns_output').val(turnsOutput.toFixed(2));
        }

        // Function to format a number as currency (with a dollar sign)
        function formatCurrency(number) {
            return '$' + number.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }
    });
</script>

<script>
    // Get all input elements
    const inputs = document.querySelectorAll('input');

    // Add event listener to each input
    inputs.forEach((input, index) => {
        // Add event listener for key press
        input.addEventListener('keypress', function(event) {
            // Check if Enter key is pressed
            if (event.key === 'Enter') {
                // Prevent default form submission behavior
                event.preventDefault();

                // Get the index of the current input
                const currentIndex = Array.from(inputs).indexOf(input);
                
                // Get the total number of inputs in the current row
                const currentRow = this.closest('tr');
                const inputsInCurrentRow = currentRow.querySelectorAll('input').length;

                // Calculate the index of the next input in the next row
                const nextIndex = currentIndex + inputsInCurrentRow;

                // Check if the next input index is within the range of existing inputs
                if (nextIndex < inputs.length) {
                    // Move focus to the next input in the next row
                    inputs[nextIndex].focus();
                } else {
                    // If no input below, move to the next column
                    const currentColumnIndex = Array.from(currentRow.children).indexOf(this.parentElement);
                    const nextColumnIndex = currentColumnIndex + 1;
                    const nextColumn = currentRow.parentElement.querySelectorAll('tr td')[nextColumnIndex];
                    if (nextColumn) {
                        const nextColumnInputs = nextColumn.querySelectorAll('input');
                        if (nextColumnInputs.length > 0) {
                            nextColumnInputs[0].focus(); // Focus on the first input in the next column
                        }
                    }
                }
            }
        });
    });
</script>

@endsection
