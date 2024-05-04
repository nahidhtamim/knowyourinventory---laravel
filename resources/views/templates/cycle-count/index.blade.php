@extends('layouts.avatar')
@section('title')
Cycle Count | Know Your Inventory
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

<div class="container">
    <div class="row">
        <form action="{{route('save.cycle.count')}}" method="POST" id="dataEntryForm">
            @csrf
            
            <div class="col-12 text-center">
                <div class=" sticky-container">
                    <h1 class="display-3">Cycle Count</h1>
                    <div class="col-12 text-center">
                        <div class="py-5">
                            <label for="title">Department/Category</label>
                            <input type="text" class="form-control" name="title" placeholder="Department/Category" required>
                        </div>
                    </div>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>INV $ Adjustment</th>
                                <th>SKU's Counted</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" class="form-control inv_adjustment" name="inv_adjustment" readonly></td>
                                <td><input type="text" class="form-control sku_count" name="sku_count" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed table-striped cycle-count" id="categoryTable">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th></th>
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
                                <th>Totals</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Category 1 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_1" name="category_1">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_1_jan_item" name="cat_1_jan_item"></td>
                                <td><input type="text" class="form-control cat_1_feb_item" name="cat_1_feb_item"></td>
                                <td><input type="text" class="form-control cat_1_mar_item" name="cat_1_mar_item"></td>
                                <td><input type="text" class="form-control cat_1_apr_item" name="cat_1_apr_item"></td>
                                <td><input type="text" class="form-control cat_1_may_item" name="cat_1_may_item"></td>
                                <td><input type="text" class="form-control cat_1_jun_item" name="cat_1_jun_item"></td>
                                <td><input type="text" class="form-control cat_1_jul_item" name="cat_1_jul_item"></td>
                                <td><input type="text" class="form-control cat_1_aug_item" name="cat_1_aug_item"></td>
                                <td><input type="text" class="form-control cat_1_sep_item" name="cat_1_sep_item"></td>
                                <td><input type="text" class="form-control cat_1_oct_item" name="cat_1_oct_item"></td>
                                <td><input type="text" class="form-control cat_1_nov_item" name="cat_1_nov_item"></td>
                                <td><input type="text" class="form-control cat_1_dec_item" name="cat_1_dec_item"></td>
                                <td><input type="text" class="form-control cat_1_total_item total_items" name="cat_1_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_1_jan_amnt" name="cat_1_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_1_feb_amnt" name="cat_1_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_1_mar_amnt" name="cat_1_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_1_apr_amnt" name="cat_1_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_1_may_amnt" name="cat_1_may_amnt"></td>
                                <td><input type="text" class="form-control cat_1_jun_amnt" name="cat_1_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_1_jul_amnt" name="cat_1_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_1_aug_amnt" name="cat_1_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_1_sep_amnt" name="cat_1_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_1_oct_amnt" name="cat_1_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_1_nov_amnt" name="cat_1_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_1_dec_amnt" name="cat_1_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_1_total_amnt total_amount" name="cat_1_total_amnt"></td>
                            </tr>
                            {{-- Category 2 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_2" name="category_2">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_2_jan_item" name="cat_2_jan_item"></td>
                                <td><input type="text" class="form-control cat_2_feb_item" name="cat_2_feb_item"></td>
                                <td><input type="text" class="form-control cat_2_mar_item" name="cat_2_mar_item"></td>
                                <td><input type="text" class="form-control cat_2_apr_item" name="cat_2_apr_item"></td>
                                <td><input type="text" class="form-control cat_2_may_item" name="cat_2_may_item"></td>
                                <td><input type="text" class="form-control cat_2_jun_item" name="cat_2_jun_item"></td>
                                <td><input type="text" class="form-control cat_2_jul_item" name="cat_2_jul_item"></td>
                                <td><input type="text" class="form-control cat_2_aug_item" name="cat_2_aug_item"></td>
                                <td><input type="text" class="form-control cat_2_sep_item" name="cat_2_sep_item"></td>
                                <td><input type="text" class="form-control cat_2_oct_item" name="cat_2_oct_item"></td>
                                <td><input type="text" class="form-control cat_2_nov_item" name="cat_2_nov_item"></td>
                                <td><input type="text" class="form-control cat_2_dec_item" name="cat_2_dec_item"></td>
                                <td><input type="text" class="form-control cat_2_total_item total_items" name="cat_2_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_2_jan_amnt" name="cat_2_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_2_feb_amnt" name="cat_2_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_2_mar_amnt" name="cat_2_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_2_apr_amnt" name="cat_2_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_2_may_amnt" name="cat_2_may_amnt"></td>
                                <td><input type="text" class="form-control cat_2_jun_amnt" name="cat_2_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_2_jul_amnt" name="cat_2_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_2_aug_amnt" name="cat_2_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_2_sep_amnt" name="cat_2_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_2_oct_amnt" name="cat_2_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_2_nov_amnt" name="cat_2_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_2_dec_amnt" name="cat_2_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_2_total_amnt total_amount" name="cat_2_total_amnt"></td>
                            </tr>
                            {{-- Category 3 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_3" name="category_3">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_3_jan_item" name="cat_3_jan_item"></td>
                                <td><input type="text" class="form-control cat_3_feb_item" name="cat_3_feb_item"></td>
                                <td><input type="text" class="form-control cat_3_mar_item" name="cat_3_mar_item"></td>
                                <td><input type="text" class="form-control cat_3_apr_item" name="cat_3_apr_item"></td>
                                <td><input type="text" class="form-control cat_3_may_item" name="cat_3_may_item"></td>
                                <td><input type="text" class="form-control cat_3_jun_item" name="cat_3_jun_item"></td>
                                <td><input type="text" class="form-control cat_3_jul_item" name="cat_3_jul_item"></td>
                                <td><input type="text" class="form-control cat_3_aug_item" name="cat_3_aug_item"></td>
                                <td><input type="text" class="form-control cat_3_sep_item" name="cat_3_sep_item"></td>
                                <td><input type="text" class="form-control cat_3_oct_item" name="cat_3_oct_item"></td>
                                <td><input type="text" class="form-control cat_3_nov_item" name="cat_3_nov_item"></td>
                                <td><input type="text" class="form-control cat_3_dec_item" name="cat_3_dec_item"></td>
                                <td><input type="text" class="form-control cat_3_total_item total_items" name="cat_3_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_3_jan_amnt" name="cat_3_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_3_feb_amnt" name="cat_3_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_3_mar_amnt" name="cat_3_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_3_apr_amnt" name="cat_3_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_3_may_amnt" name="cat_3_may_amnt"></td>
                                <td><input type="text" class="form-control cat_3_jun_amnt" name="cat_3_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_3_jul_amnt" name="cat_3_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_3_aug_amnt" name="cat_3_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_3_sep_amnt" name="cat_3_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_3_oct_amnt" name="cat_3_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_3_nov_amnt" name="cat_3_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_3_dec_amnt" name="cat_3_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_3_total_amnt total_amount" name="cat_3_total_amnt"></td>
                            </tr>
                            {{-- Category 4 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_4" name="category_4">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_4_jan_item" name="cat_4_jan_item"></td>
                                <td><input type="text" class="form-control cat_4_feb_item" name="cat_4_feb_item"></td>
                                <td><input type="text" class="form-control cat_4_mar_item" name="cat_4_mar_item"></td>
                                <td><input type="text" class="form-control cat_4_apr_item" name="cat_4_apr_item"></td>
                                <td><input type="text" class="form-control cat_4_may_item" name="cat_4_may_item"></td>
                                <td><input type="text" class="form-control cat_4_jun_item" name="cat_4_jun_item"></td>
                                <td><input type="text" class="form-control cat_4_jul_item" name="cat_4_jul_item"></td>
                                <td><input type="text" class="form-control cat_4_aug_item" name="cat_4_aug_item"></td>
                                <td><input type="text" class="form-control cat_4_sep_item" name="cat_4_sep_item"></td>
                                <td><input type="text" class="form-control cat_4_oct_item" name="cat_4_oct_item"></td>
                                <td><input type="text" class="form-control cat_4_nov_item" name="cat_4_nov_item"></td>
                                <td><input type="text" class="form-control cat_4_dec_item" name="cat_4_dec_item"></td>
                                <td><input type="text" class="form-control cat_4_total_item total_items" name="cat_4_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_4_jan_amnt" name="cat_4_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_4_feb_amnt" name="cat_4_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_4_mar_amnt" name="cat_4_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_4_apr_amnt" name="cat_4_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_4_may_amnt" name="cat_4_may_amnt"></td>
                                <td><input type="text" class="form-control cat_4_jun_amnt" name="cat_4_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_4_jul_amnt" name="cat_4_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_4_aug_amnt" name="cat_4_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_4_sep_amnt" name="cat_4_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_4_oct_amnt" name="cat_4_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_4_nov_amnt" name="cat_4_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_4_dec_amnt" name="cat_4_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_4_total_amnt total_amount" name="cat_4_total_amnt"></td>
                            </tr>
                            {{-- Category 5 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_5" name="category_5">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_5_jan_item" name="cat_5_jan_item"></td>
                                <td><input type="text" class="form-control cat_5_feb_item" name="cat_5_feb_item"></td>
                                <td><input type="text" class="form-control cat_5_mar_item" name="cat_5_mar_item"></td>
                                <td><input type="text" class="form-control cat_5_apr_item" name="cat_5_apr_item"></td>
                                <td><input type="text" class="form-control cat_5_may_item" name="cat_5_may_item"></td>
                                <td><input type="text" class="form-control cat_5_jun_item" name="cat_5_jun_item"></td>
                                <td><input type="text" class="form-control cat_5_jul_item" name="cat_5_jul_item"></td>
                                <td><input type="text" class="form-control cat_5_aug_item" name="cat_5_aug_item"></td>
                                <td><input type="text" class="form-control cat_5_sep_item" name="cat_5_sep_item"></td>
                                <td><input type="text" class="form-control cat_5_oct_item" name="cat_5_oct_item"></td>
                                <td><input type="text" class="form-control cat_5_nov_item" name="cat_5_nov_item"></td>
                                <td><input type="text" class="form-control cat_5_dec_item" name="cat_5_dec_item"></td>
                                <td><input type="text" class="form-control cat_5_total_item total_items" name="cat_5_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_5_jan_amnt" name="cat_5_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_5_feb_amnt" name="cat_5_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_5_mar_amnt" name="cat_5_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_5_apr_amnt" name="cat_5_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_5_may_amnt" name="cat_5_may_amnt"></td>
                                <td><input type="text" class="form-control cat_5_jun_amnt" name="cat_5_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_5_jul_amnt" name="cat_5_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_5_aug_amnt" name="cat_5_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_5_sep_amnt" name="cat_5_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_5_oct_amnt" name="cat_5_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_5_nov_amnt" name="cat_5_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_5_dec_amnt" name="cat_5_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_5_total_amnt total_amount" name="cat_5_total_amnt"></td>
                            </tr>
                            {{-- Category 6 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_6" name="category_6">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_6_jan_item" name="cat_6_jan_item"></td>
                                <td><input type="text" class="form-control cat_6_feb_item" name="cat_6_feb_item"></td>
                                <td><input type="text" class="form-control cat_6_mar_item" name="cat_6_mar_item"></td>
                                <td><input type="text" class="form-control cat_6_apr_item" name="cat_6_apr_item"></td>
                                <td><input type="text" class="form-control cat_6_may_item" name="cat_6_may_item"></td>
                                <td><input type="text" class="form-control cat_6_jun_item" name="cat_6_jun_item"></td>
                                <td><input type="text" class="form-control cat_6_jul_item" name="cat_6_jul_item"></td>
                                <td><input type="text" class="form-control cat_6_aug_item" name="cat_6_aug_item"></td>
                                <td><input type="text" class="form-control cat_6_sep_item" name="cat_6_sep_item"></td>
                                <td><input type="text" class="form-control cat_6_oct_item" name="cat_6_oct_item"></td>
                                <td><input type="text" class="form-control cat_6_nov_item" name="cat_6_nov_item"></td>
                                <td><input type="text" class="form-control cat_6_dec_item" name="cat_6_dec_item"></td>
                                <td><input type="text" class="form-control cat_6_total_item total_items" name="cat_6_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_6_jan_amnt" name="cat_6_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_6_feb_amnt" name="cat_6_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_6_mar_amnt" name="cat_6_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_6_apr_amnt" name="cat_6_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_6_may_amnt" name="cat_6_may_amnt"></td>
                                <td><input type="text" class="form-control cat_6_jun_amnt" name="cat_6_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_6_jul_amnt" name="cat_6_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_6_aug_amnt" name="cat_6_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_6_sep_amnt" name="cat_6_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_6_oct_amnt" name="cat_6_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_6_nov_amnt" name="cat_6_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_6_dec_amnt" name="cat_6_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_6_total_amnt total_amount" name="cat_6_total_amnt"></td>
                            </tr>
                            {{-- Category 7 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_7" name="category_7">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_7_jan_item" name="cat_7_jan_item"></td>
                                <td><input type="text" class="form-control cat_7_feb_item" name="cat_7_feb_item"></td>
                                <td><input type="text" class="form-control cat_7_mar_item" name="cat_7_mar_item"></td>
                                <td><input type="text" class="form-control cat_7_apr_item" name="cat_7_apr_item"></td>
                                <td><input type="text" class="form-control cat_7_may_item" name="cat_7_may_item"></td>
                                <td><input type="text" class="form-control cat_7_jun_item" name="cat_7_jun_item"></td>
                                <td><input type="text" class="form-control cat_7_jul_item" name="cat_7_jul_item"></td>
                                <td><input type="text" class="form-control cat_7_aug_item" name="cat_7_aug_item"></td>
                                <td><input type="text" class="form-control cat_7_sep_item" name="cat_7_sep_item"></td>
                                <td><input type="text" class="form-control cat_7_oct_item" name="cat_7_oct_item"></td>
                                <td><input type="text" class="form-control cat_7_nov_item" name="cat_7_nov_item"></td>
                                <td><input type="text" class="form-control cat_7_dec_item" name="cat_7_dec_item"></td>
                                <td><input type="text" class="form-control cat_7_total_item total_items" name="cat_7_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_7_jan_amnt" name="cat_7_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_7_feb_amnt" name="cat_7_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_7_mar_amnt" name="cat_7_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_7_apr_amnt" name="cat_7_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_7_may_amnt" name="cat_7_may_amnt"></td>
                                <td><input type="text" class="form-control cat_7_jun_amnt" name="cat_7_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_7_jul_amnt" name="cat_7_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_7_aug_amnt" name="cat_7_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_7_sep_amnt" name="cat_7_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_7_oct_amnt" name="cat_7_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_7_nov_amnt" name="cat_7_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_7_dec_amnt" name="cat_7_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_7_total_amnt total_amount" name="cat_7_total_amnt"></td>
                            </tr>
                            {{-- Category 8 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_8" name="category_8">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_8_jan_item" name="cat_8_jan_item"></td>
                                <td><input type="text" class="form-control cat_8_feb_item" name="cat_8_feb_item"></td>
                                <td><input type="text" class="form-control cat_8_mar_item" name="cat_8_mar_item"></td>
                                <td><input type="text" class="form-control cat_8_apr_item" name="cat_8_apr_item"></td>
                                <td><input type="text" class="form-control cat_8_may_item" name="cat_8_may_item"></td>
                                <td><input type="text" class="form-control cat_8_jun_item" name="cat_8_jun_item"></td>
                                <td><input type="text" class="form-control cat_8_jul_item" name="cat_8_jul_item"></td>
                                <td><input type="text" class="form-control cat_8_aug_item" name="cat_8_aug_item"></td>
                                <td><input type="text" class="form-control cat_8_sep_item" name="cat_8_sep_item"></td>
                                <td><input type="text" class="form-control cat_8_oct_item" name="cat_8_oct_item"></td>
                                <td><input type="text" class="form-control cat_8_nov_item" name="cat_8_nov_item"></td>
                                <td><input type="text" class="form-control cat_8_dec_item" name="cat_8_dec_item"></td>
                                <td><input type="text" class="form-control cat_8_total_item total_items" name="cat_8_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_8_jan_amnt" name="cat_8_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_8_feb_amnt" name="cat_8_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_8_mar_amnt" name="cat_8_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_8_apr_amnt" name="cat_8_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_8_may_amnt" name="cat_8_may_amnt"></td>
                                <td><input type="text" class="form-control cat_8_jun_amnt" name="cat_8_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_8_jul_amnt" name="cat_8_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_8_aug_amnt" name="cat_8_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_8_sep_amnt" name="cat_8_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_8_oct_amnt" name="cat_8_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_8_nov_amnt" name="cat_8_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_8_dec_amnt" name="cat_8_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_8_total_amnt total_amount" name="cat_8_total_amnt"></td>
                            </tr>
                            {{-- Category 9 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_9" name="category_9">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_9_jan_item" name="cat_9_jan_item"></td>
                                <td><input type="text" class="form-control cat_9_feb_item" name="cat_9_feb_item"></td>
                                <td><input type="text" class="form-control cat_9_mar_item" name="cat_9_mar_item"></td>
                                <td><input type="text" class="form-control cat_9_apr_item" name="cat_9_apr_item"></td>
                                <td><input type="text" class="form-control cat_9_may_item" name="cat_9_may_item"></td>
                                <td><input type="text" class="form-control cat_9_jun_item" name="cat_9_jun_item"></td>
                                <td><input type="text" class="form-control cat_9_jul_item" name="cat_9_jul_item"></td>
                                <td><input type="text" class="form-control cat_9_aug_item" name="cat_9_aug_item"></td>
                                <td><input type="text" class="form-control cat_9_sep_item" name="cat_9_sep_item"></td>
                                <td><input type="text" class="form-control cat_9_oct_item" name="cat_9_oct_item"></td>
                                <td><input type="text" class="form-control cat_9_nov_item" name="cat_9_nov_item"></td>
                                <td><input type="text" class="form-control cat_9_dec_item" name="cat_9_dec_item"></td>
                                <td><input type="text" class="form-control cat_9_total_item total_items" name="cat_9_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_9_jan_amnt" name="cat_9_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_9_feb_amnt" name="cat_9_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_9_mar_amnt" name="cat_9_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_9_apr_amnt" name="cat_9_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_9_may_amnt" name="cat_9_may_amnt"></td>
                                <td><input type="text" class="form-control cat_9_jun_amnt" name="cat_9_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_9_jul_amnt" name="cat_9_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_9_aug_amnt" name="cat_9_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_9_sep_amnt" name="cat_9_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_9_oct_amnt" name="cat_9_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_9_nov_amnt" name="cat_9_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_9_dec_amnt" name="cat_9_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_9_total_amnt total_amount" name="cat_9_total_amnt"></td>
                            </tr>
                            {{-- Category 10 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_10" name="category_10">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_10_jan_item" name="cat_10_jan_item"></td>
                                <td><input type="text" class="form-control cat_10_feb_item" name="cat_10_feb_item"></td>
                                <td><input type="text" class="form-control cat_10_mar_item" name="cat_10_mar_item"></td>
                                <td><input type="text" class="form-control cat_10_apr_item" name="cat_10_apr_item"></td>
                                <td><input type="text" class="form-control cat_10_may_item" name="cat_10_may_item"></td>
                                <td><input type="text" class="form-control cat_10_jun_item" name="cat_10_jun_item"></td>
                                <td><input type="text" class="form-control cat_10_jul_item" name="cat_10_jul_item"></td>
                                <td><input type="text" class="form-control cat_10_aug_item" name="cat_10_aug_item"></td>
                                <td><input type="text" class="form-control cat_10_sep_item" name="cat_10_sep_item"></td>
                                <td><input type="text" class="form-control cat_10_oct_item" name="cat_10_oct_item"></td>
                                <td><input type="text" class="form-control cat_10_nov_item" name="cat_10_nov_item"></td>
                                <td><input type="text" class="form-control cat_10_dec_item" name="cat_10_dec_item"></td>
                                <td><input type="text" class="form-control cat_10_total_item total_items" name="cat_10_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_10_jan_amnt" name="cat_10_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_10_feb_amnt" name="cat_10_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_10_mar_amnt" name="cat_10_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_10_apr_amnt" name="cat_10_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_10_may_amnt" name="cat_10_may_amnt"></td>
                                <td><input type="text" class="form-control cat_10_jun_amnt" name="cat_10_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_10_jul_amnt" name="cat_10_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_10_aug_amnt" name="cat_10_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_10_sep_amnt" name="cat_10_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_10_oct_amnt" name="cat_10_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_10_nov_amnt" name="cat_10_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_10_dec_amnt" name="cat_10_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_10_total_amnt total_amount" name="cat_10_total_amnt"></td>
                            </tr>
                            {{-- Category 11 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_11" name="category_11">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_11_jan_item" name="cat_11_jan_item"></td>
                                <td><input type="text" class="form-control cat_11_feb_item" name="cat_11_feb_item"></td>
                                <td><input type="text" class="form-control cat_11_mar_item" name="cat_11_mar_item"></td>
                                <td><input type="text" class="form-control cat_11_apr_item" name="cat_11_apr_item"></td>
                                <td><input type="text" class="form-control cat_11_may_item" name="cat_11_may_item"></td>
                                <td><input type="text" class="form-control cat_11_jun_item" name="cat_11_jun_item"></td>
                                <td><input type="text" class="form-control cat_11_jul_item" name="cat_11_jul_item"></td>
                                <td><input type="text" class="form-control cat_11_aug_item" name="cat_11_aug_item"></td>
                                <td><input type="text" class="form-control cat_11_sep_item" name="cat_11_sep_item"></td>
                                <td><input type="text" class="form-control cat_11_oct_item" name="cat_11_oct_item"></td>
                                <td><input type="text" class="form-control cat_11_nov_item" name="cat_11_nov_item"></td>
                                <td><input type="text" class="form-control cat_11_dec_item" name="cat_11_dec_item"></td>
                                <td><input type="text" class="form-control cat_11_total_item total_items" name="cat_11_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_11_jan_amnt" name="cat_11_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_11_feb_amnt" name="cat_11_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_11_mar_amnt" name="cat_11_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_11_apr_amnt" name="cat_11_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_11_may_amnt" name="cat_11_may_amnt"></td>
                                <td><input type="text" class="form-control cat_11_jun_amnt" name="cat_11_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_11_jul_amnt" name="cat_11_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_11_aug_amnt" name="cat_11_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_11_sep_amnt" name="cat_11_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_11_oct_amnt" name="cat_11_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_11_nov_amnt" name="cat_11_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_11_dec_amnt" name="cat_11_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_11_total_amnt total_amount" name="cat_11_total_amnt"></td>
                            </tr>
                            {{-- Category 12 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_12" name="category_12">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_12_jan_item" name="cat_12_jan_item"></td>
                                <td><input type="text" class="form-control cat_12_feb_item" name="cat_12_feb_item"></td>
                                <td><input type="text" class="form-control cat_12_mar_item" name="cat_12_mar_item"></td>
                                <td><input type="text" class="form-control cat_12_apr_item" name="cat_12_apr_item"></td>
                                <td><input type="text" class="form-control cat_12_may_item" name="cat_12_may_item"></td>
                                <td><input type="text" class="form-control cat_12_jun_item" name="cat_12_jun_item"></td>
                                <td><input type="text" class="form-control cat_12_jul_item" name="cat_12_jul_item"></td>
                                <td><input type="text" class="form-control cat_12_aug_item" name="cat_12_aug_item"></td>
                                <td><input type="text" class="form-control cat_12_sep_item" name="cat_12_sep_item"></td>
                                <td><input type="text" class="form-control cat_12_oct_item" name="cat_12_oct_item"></td>
                                <td><input type="text" class="form-control cat_12_nov_item" name="cat_12_nov_item"></td>
                                <td><input type="text" class="form-control cat_12_dec_item" name="cat_12_dec_item"></td>
                                <td><input type="text" class="form-control cat_12_total_item total_items" name="cat_12_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_12_jan_amnt" name="cat_12_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_12_feb_amnt" name="cat_12_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_12_mar_amnt" name="cat_12_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_12_apr_amnt" name="cat_12_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_12_may_amnt" name="cat_12_may_amnt"></td>
                                <td><input type="text" class="form-control cat_12_jun_amnt" name="cat_12_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_12_jul_amnt" name="cat_12_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_12_aug_amnt" name="cat_12_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_12_sep_amnt" name="cat_12_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_12_oct_amnt" name="cat_12_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_12_nov_amnt" name="cat_12_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_12_dec_amnt" name="cat_12_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_12_total_amnt total_amount" name="cat_12_total_amnt"></td>
                            </tr>
                            {{-- Category 13 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_13" name="category_13">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_13_jan_item" name="cat_13_jan_item"></td>
                                <td><input type="text" class="form-control cat_13_feb_item" name="cat_13_feb_item"></td>
                                <td><input type="text" class="form-control cat_13_mar_item" name="cat_13_mar_item"></td>
                                <td><input type="text" class="form-control cat_13_apr_item" name="cat_13_apr_item"></td>
                                <td><input type="text" class="form-control cat_13_may_item" name="cat_13_may_item"></td>
                                <td><input type="text" class="form-control cat_13_jun_item" name="cat_13_jun_item"></td>
                                <td><input type="text" class="form-control cat_13_jul_item" name="cat_13_jul_item"></td>
                                <td><input type="text" class="form-control cat_13_aug_item" name="cat_13_aug_item"></td>
                                <td><input type="text" class="form-control cat_13_sep_item" name="cat_13_sep_item"></td>
                                <td><input type="text" class="form-control cat_13_oct_item" name="cat_13_oct_item"></td>
                                <td><input type="text" class="form-control cat_13_nov_item" name="cat_13_nov_item"></td>
                                <td><input type="text" class="form-control cat_13_dec_item" name="cat_13_dec_item"></td>
                                <td><input type="text" class="form-control cat_13_total_item total_items" name="cat_13_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_13_jan_amnt" name="cat_13_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_13_feb_amnt" name="cat_13_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_13_mar_amnt" name="cat_13_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_13_apr_amnt" name="cat_13_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_13_may_amnt" name="cat_13_may_amnt"></td>
                                <td><input type="text" class="form-control cat_13_jun_amnt" name="cat_13_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_13_jul_amnt" name="cat_13_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_13_aug_amnt" name="cat_13_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_13_sep_amnt" name="cat_13_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_13_oct_amnt" name="cat_13_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_13_nov_amnt" name="cat_13_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_13_dec_amnt" name="cat_13_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_13_total_amnt total_amount" name="cat_13_total_amnt"></td>
                            </tr>
                            {{-- Category 14 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_14" name="category_14">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_14_jan_item" name="cat_14_jan_item"></td>
                                <td><input type="text" class="form-control cat_14_feb_item" name="cat_14_feb_item"></td>
                                <td><input type="text" class="form-control cat_14_mar_item" name="cat_14_mar_item"></td>
                                <td><input type="text" class="form-control cat_14_apr_item" name="cat_14_apr_item"></td>
                                <td><input type="text" class="form-control cat_14_may_item" name="cat_14_may_item"></td>
                                <td><input type="text" class="form-control cat_14_jun_item" name="cat_14_jun_item"></td>
                                <td><input type="text" class="form-control cat_14_jul_item" name="cat_14_jul_item"></td>
                                <td><input type="text" class="form-control cat_14_aug_item" name="cat_14_aug_item"></td>
                                <td><input type="text" class="form-control cat_14_sep_item" name="cat_14_sep_item"></td>
                                <td><input type="text" class="form-control cat_14_oct_item" name="cat_14_oct_item"></td>
                                <td><input type="text" class="form-control cat_14_nov_item" name="cat_14_nov_item"></td>
                                <td><input type="text" class="form-control cat_14_dec_item" name="cat_14_dec_item"></td>
                                <td><input type="text" class="form-control cat_14_total_item total_items" name="cat_14_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_14_jan_amnt" name="cat_14_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_14_feb_amnt" name="cat_14_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_14_mar_amnt" name="cat_14_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_14_apr_amnt" name="cat_14_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_14_may_amnt" name="cat_14_may_amnt"></td>
                                <td><input type="text" class="form-control cat_14_jun_amnt" name="cat_14_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_14_jul_amnt" name="cat_14_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_14_aug_amnt" name="cat_14_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_14_sep_amnt" name="cat_14_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_14_oct_amnt" name="cat_14_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_14_nov_amnt" name="cat_14_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_14_dec_amnt" name="cat_14_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_14_total_amnt total_amount" name="cat_14_total_amnt"></td>
                            </tr>
                            {{-- Category 15 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_15" name="category_15">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_15_jan_item" name="cat_15_jan_item"></td>
                                <td><input type="text" class="form-control cat_15_feb_item" name="cat_15_feb_item"></td>
                                <td><input type="text" class="form-control cat_15_mar_item" name="cat_15_mar_item"></td>
                                <td><input type="text" class="form-control cat_15_apr_item" name="cat_15_apr_item"></td>
                                <td><input type="text" class="form-control cat_15_may_item" name="cat_15_may_item"></td>
                                <td><input type="text" class="form-control cat_15_jun_item" name="cat_15_jun_item"></td>
                                <td><input type="text" class="form-control cat_15_jul_item" name="cat_15_jul_item"></td>
                                <td><input type="text" class="form-control cat_15_aug_item" name="cat_15_aug_item"></td>
                                <td><input type="text" class="form-control cat_15_sep_item" name="cat_15_sep_item"></td>
                                <td><input type="text" class="form-control cat_15_oct_item" name="cat_15_oct_item"></td>
                                <td><input type="text" class="form-control cat_15_nov_item" name="cat_15_nov_item"></td>
                                <td><input type="text" class="form-control cat_15_dec_item" name="cat_15_dec_item"></td>
                                <td><input type="text" class="form-control cat_15_total_item total_items" name="cat_15_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_15_jan_amnt" name="cat_15_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_15_feb_amnt" name="cat_15_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_15_mar_amnt" name="cat_15_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_15_apr_amnt" name="cat_15_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_15_may_amnt" name="cat_15_may_amnt"></td>
                                <td><input type="text" class="form-control cat_15_jun_amnt" name="cat_15_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_15_jul_amnt" name="cat_15_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_15_aug_amnt" name="cat_15_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_15_sep_amnt" name="cat_15_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_15_oct_amnt" name="cat_15_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_15_nov_amnt" name="cat_15_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_15_dec_amnt" name="cat_15_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_15_total_amnt total_amount" name="cat_15_total_amnt"></td>
                            </tr>
                            {{-- Category 16 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_16" name="category_16">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_16_jan_item" name="cat_16_jan_item"></td>
                                <td><input type="text" class="form-control cat_16_feb_item" name="cat_16_feb_item"></td>
                                <td><input type="text" class="form-control cat_16_mar_item" name="cat_16_mar_item"></td>
                                <td><input type="text" class="form-control cat_16_apr_item" name="cat_16_apr_item"></td>
                                <td><input type="text" class="form-control cat_16_may_item" name="cat_16_may_item"></td>
                                <td><input type="text" class="form-control cat_16_jun_item" name="cat_16_jun_item"></td>
                                <td><input type="text" class="form-control cat_16_jul_item" name="cat_16_jul_item"></td>
                                <td><input type="text" class="form-control cat_16_aug_item" name="cat_16_aug_item"></td>
                                <td><input type="text" class="form-control cat_16_sep_item" name="cat_16_sep_item"></td>
                                <td><input type="text" class="form-control cat_16_oct_item" name="cat_16_oct_item"></td>
                                <td><input type="text" class="form-control cat_16_nov_item" name="cat_16_nov_item"></td>
                                <td><input type="text" class="form-control cat_16_dec_item" name="cat_16_dec_item"></td>
                                <td><input type="text" class="form-control cat_16_total_item total_items" name="cat_16_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_16_jan_amnt" name="cat_16_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_16_feb_amnt" name="cat_16_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_16_mar_amnt" name="cat_16_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_16_apr_amnt" name="cat_16_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_16_may_amnt" name="cat_16_may_amnt"></td>
                                <td><input type="text" class="form-control cat_16_jun_amnt" name="cat_16_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_16_jul_amnt" name="cat_16_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_16_aug_amnt" name="cat_16_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_16_sep_amnt" name="cat_16_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_16_oct_amnt" name="cat_16_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_16_nov_amnt" name="cat_16_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_16_dec_amnt" name="cat_16_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_16_total_amnt total_amount" name="cat_16_total_amnt"></td>
                            </tr>
                            {{-- Category 17 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_17" name="category_17">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_17_jan_item" name="cat_17_jan_item"></td>
                                <td><input type="text" class="form-control cat_17_feb_item" name="cat_17_feb_item"></td>
                                <td><input type="text" class="form-control cat_17_mar_item" name="cat_17_mar_item"></td>
                                <td><input type="text" class="form-control cat_17_apr_item" name="cat_17_apr_item"></td>
                                <td><input type="text" class="form-control cat_17_may_item" name="cat_17_may_item"></td>
                                <td><input type="text" class="form-control cat_17_jun_item" name="cat_17_jun_item"></td>
                                <td><input type="text" class="form-control cat_17_jul_item" name="cat_17_jul_item"></td>
                                <td><input type="text" class="form-control cat_17_aug_item" name="cat_17_aug_item"></td>
                                <td><input type="text" class="form-control cat_17_sep_item" name="cat_17_sep_item"></td>
                                <td><input type="text" class="form-control cat_17_oct_item" name="cat_17_oct_item"></td>
                                <td><input type="text" class="form-control cat_17_nov_item" name="cat_17_nov_item"></td>
                                <td><input type="text" class="form-control cat_17_dec_item" name="cat_17_dec_item"></td>
                                <td><input type="text" class="form-control cat_17_total_item total_items" name="cat_17_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_17_jan_amnt" name="cat_17_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_17_feb_amnt" name="cat_17_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_17_mar_amnt" name="cat_17_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_17_apr_amnt" name="cat_17_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_17_may_amnt" name="cat_17_may_amnt"></td>
                                <td><input type="text" class="form-control cat_17_jun_amnt" name="cat_17_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_17_jul_amnt" name="cat_17_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_17_aug_amnt" name="cat_17_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_17_sep_amnt" name="cat_17_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_17_oct_amnt" name="cat_17_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_17_nov_amnt" name="cat_17_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_17_dec_amnt" name="cat_17_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_17_total_amnt total_amount" name="cat_17_total_amnt"></td>
                            </tr>
                            {{-- Category 18 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_18" name="category_18">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_18_jan_item" name="cat_18_jan_item"></td>
                                <td><input type="text" class="form-control cat_18_feb_item" name="cat_18_feb_item"></td>
                                <td><input type="text" class="form-control cat_18_mar_item" name="cat_18_mar_item"></td>
                                <td><input type="text" class="form-control cat_18_apr_item" name="cat_18_apr_item"></td>
                                <td><input type="text" class="form-control cat_18_may_item" name="cat_18_may_item"></td>
                                <td><input type="text" class="form-control cat_18_jun_item" name="cat_18_jun_item"></td>
                                <td><input type="text" class="form-control cat_18_jul_item" name="cat_18_jul_item"></td>
                                <td><input type="text" class="form-control cat_18_aug_item" name="cat_18_aug_item"></td>
                                <td><input type="text" class="form-control cat_18_sep_item" name="cat_18_sep_item"></td>
                                <td><input type="text" class="form-control cat_18_oct_item" name="cat_18_oct_item"></td>
                                <td><input type="text" class="form-control cat_18_nov_item" name="cat_18_nov_item"></td>
                                <td><input type="text" class="form-control cat_18_dec_item" name="cat_18_dec_item"></td>
                                <td><input type="text" class="form-control cat_18_total_item total_items" name="cat_18_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_18_jan_amnt" name="cat_18_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_18_feb_amnt" name="cat_18_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_18_mar_amnt" name="cat_18_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_18_apr_amnt" name="cat_18_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_18_may_amnt" name="cat_18_may_amnt"></td>
                                <td><input type="text" class="form-control cat_18_jun_amnt" name="cat_18_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_18_jul_amnt" name="cat_18_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_18_aug_amnt" name="cat_18_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_18_sep_amnt" name="cat_18_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_18_oct_amnt" name="cat_18_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_18_nov_amnt" name="cat_18_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_18_dec_amnt" name="cat_18_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_18_total_amnt total_amount" name="cat_18_total_amnt"></td>
                            </tr>
    
                            {{-- Category 19 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_19" name="category_19">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_19_jan_item" name="cat_19_jan_item"></td>
                                <td><input type="text" class="form-control cat_19_feb_item" name="cat_19_feb_item"></td>
                                <td><input type="text" class="form-control cat_19_mar_item" name="cat_19_mar_item"></td>
                                <td><input type="text" class="form-control cat_19_apr_item" name="cat_19_apr_item"></td>
                                <td><input type="text" class="form-control cat_19_may_item" name="cat_19_may_item"></td>
                                <td><input type="text" class="form-control cat_19_jun_item" name="cat_19_jun_item"></td>
                                <td><input type="text" class="form-control cat_19_jul_item" name="cat_19_jul_item"></td>
                                <td><input type="text" class="form-control cat_19_aug_item" name="cat_19_aug_item"></td>
                                <td><input type="text" class="form-control cat_19_sep_item" name="cat_19_sep_item"></td>
                                <td><input type="text" class="form-control cat_19_oct_item" name="cat_19_oct_item"></td>
                                <td><input type="text" class="form-control cat_19_nov_item" name="cat_19_nov_item"></td>
                                <td><input type="text" class="form-control cat_19_dec_item" name="cat_19_dec_item"></td>
                                <td><input type="text" class="form-control cat_19_total_item total_items" name="cat_19_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_19_jan_amnt" name="cat_19_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_19_feb_amnt" name="cat_19_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_19_mar_amnt" name="cat_19_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_19_apr_amnt" name="cat_19_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_19_may_amnt" name="cat_19_may_amnt"></td>
                                <td><input type="text" class="form-control cat_19_jun_amnt" name="cat_19_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_19_jul_amnt" name="cat_19_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_19_aug_amnt" name="cat_19_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_19_sep_amnt" name="cat_19_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_19_oct_amnt" name="cat_19_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_19_nov_amnt" name="cat_19_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_19_dec_amnt" name="cat_19_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_19_total_amnt total_amount" name="cat_19_total_amnt"></td>
                            </tr>
    
                            {{-- Category 20 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_20" name="category_20">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_20_jan_item" name="cat_20_jan_item"></td>
                                <td><input type="text" class="form-control cat_20_feb_item" name="cat_20_feb_item"></td>
                                <td><input type="text" class="form-control cat_20_mar_item" name="cat_20_mar_item"></td>
                                <td><input type="text" class="form-control cat_20_apr_item" name="cat_20_apr_item"></td>
                                <td><input type="text" class="form-control cat_20_may_item" name="cat_20_may_item"></td>
                                <td><input type="text" class="form-control cat_20_jun_item" name="cat_20_jun_item"></td>
                                <td><input type="text" class="form-control cat_20_jul_item" name="cat_20_jul_item"></td>
                                <td><input type="text" class="form-control cat_20_aug_item" name="cat_20_aug_item"></td>
                                <td><input type="text" class="form-control cat_20_sep_item" name="cat_20_sep_item"></td>
                                <td><input type="text" class="form-control cat_20_oct_item" name="cat_20_oct_item"></td>
                                <td><input type="text" class="form-control cat_20_nov_item" name="cat_20_nov_item"></td>
                                <td><input type="text" class="form-control cat_20_dec_item" name="cat_20_dec_item"></td>
                                <td><input type="text" class="form-control cat_20_total_item total_items" name="cat_20_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_20_jan_amnt" name="cat_20_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_20_feb_amnt" name="cat_20_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_20_mar_amnt" name="cat_20_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_20_apr_amnt" name="cat_20_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_20_may_amnt" name="cat_20_may_amnt"></td>
                                <td><input type="text" class="form-control cat_20_jun_amnt" name="cat_20_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_20_jul_amnt" name="cat_20_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_20_aug_amnt" name="cat_20_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_20_sep_amnt" name="cat_20_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_20_oct_amnt" name="cat_20_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_20_nov_amnt" name="cat_20_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_20_dec_amnt" name="cat_20_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_20_total_amnt total_amount" name="cat_20_total_amnt"></td>
                            </tr>
                            
                            {{-- Category 21 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_21" name="category_21">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_21_jan_item" name="cat_21_jan_item"></td>
                                <td><input type="text" class="form-control cat_21_feb_item" name="cat_21_feb_item"></td>
                                <td><input type="text" class="form-control cat_21_mar_item" name="cat_21_mar_item"></td>
                                <td><input type="text" class="form-control cat_21_apr_item" name="cat_21_apr_item"></td>
                                <td><input type="text" class="form-control cat_21_may_item" name="cat_21_may_item"></td>
                                <td><input type="text" class="form-control cat_21_jun_item" name="cat_21_jun_item"></td>
                                <td><input type="text" class="form-control cat_21_jul_item" name="cat_21_jul_item"></td>
                                <td><input type="text" class="form-control cat_21_aug_item" name="cat_21_aug_item"></td>
                                <td><input type="text" class="form-control cat_21_sep_item" name="cat_21_sep_item"></td>
                                <td><input type="text" class="form-control cat_21_oct_item" name="cat_21_oct_item"></td>
                                <td><input type="text" class="form-control cat_21_nov_item" name="cat_21_nov_item"></td>
                                <td><input type="text" class="form-control cat_21_dec_item" name="cat_21_dec_item"></td>
                                <td><input type="text" class="form-control cat_21_total_item total_items" name="cat_21_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_21_jan_amnt" name="cat_21_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_21_feb_amnt" name="cat_21_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_21_mar_amnt" name="cat_21_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_21_apr_amnt" name="cat_21_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_21_may_amnt" name="cat_21_may_amnt"></td>
                                <td><input type="text" class="form-control cat_21_jun_amnt" name="cat_21_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_21_jul_amnt" name="cat_21_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_21_aug_amnt" name="cat_21_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_21_sep_amnt" name="cat_21_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_21_oct_amnt" name="cat_21_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_21_nov_amnt" name="cat_21_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_21_dec_amnt" name="cat_21_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_21_total_amnt total_amount" name="cat_21_total_amnt"></td>
                            </tr>
    
                            {{-- Category 22 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_22" name="category_22">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_22_jan_item" name="cat_22_jan_item"></td>
                                <td><input type="text" class="form-control cat_22_feb_item" name="cat_22_feb_item"></td>
                                <td><input type="text" class="form-control cat_22_mar_item" name="cat_22_mar_item"></td>
                                <td><input type="text" class="form-control cat_22_apr_item" name="cat_22_apr_item"></td>
                                <td><input type="text" class="form-control cat_22_may_item" name="cat_22_may_item"></td>
                                <td><input type="text" class="form-control cat_22_jun_item" name="cat_22_jun_item"></td>
                                <td><input type="text" class="form-control cat_22_jul_item" name="cat_22_jul_item"></td>
                                <td><input type="text" class="form-control cat_22_aug_item" name="cat_22_aug_item"></td>
                                <td><input type="text" class="form-control cat_22_sep_item" name="cat_22_sep_item"></td>
                                <td><input type="text" class="form-control cat_22_oct_item" name="cat_22_oct_item"></td>
                                <td><input type="text" class="form-control cat_22_nov_item" name="cat_22_nov_item"></td>
                                <td><input type="text" class="form-control cat_22_dec_item" name="cat_22_dec_item"></td>
                                <td><input type="text" class="form-control cat_22_total_item total_items" name="cat_22_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_22_jan_amnt" name="cat_22_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_22_feb_amnt" name="cat_22_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_22_mar_amnt" name="cat_22_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_22_apr_amnt" name="cat_22_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_22_may_amnt" name="cat_22_may_amnt"></td>
                                <td><input type="text" class="form-control cat_22_jun_amnt" name="cat_22_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_22_jul_amnt" name="cat_22_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_22_aug_amnt" name="cat_22_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_22_sep_amnt" name="cat_22_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_22_oct_amnt" name="cat_22_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_22_nov_amnt" name="cat_22_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_22_dec_amnt" name="cat_22_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_22_total_amnt total_amount" name="cat_22_total_amnt"></td>
                            </tr>
    
                            {{-- Category 23 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_23" name="category_23">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_23_jan_item" name="cat_23_jan_item"></td>
                                <td><input type="text" class="form-control cat_23_feb_item" name="cat_23_feb_item"></td>
                                <td><input type="text" class="form-control cat_23_mar_item" name="cat_23_mar_item"></td>
                                <td><input type="text" class="form-control cat_23_apr_item" name="cat_23_apr_item"></td>
                                <td><input type="text" class="form-control cat_23_may_item" name="cat_23_may_item"></td>
                                <td><input type="text" class="form-control cat_23_jun_item" name="cat_23_jun_item"></td>
                                <td><input type="text" class="form-control cat_23_jul_item" name="cat_23_jul_item"></td>
                                <td><input type="text" class="form-control cat_23_aug_item" name="cat_23_aug_item"></td>
                                <td><input type="text" class="form-control cat_23_sep_item" name="cat_23_sep_item"></td>
                                <td><input type="text" class="form-control cat_23_oct_item" name="cat_23_oct_item"></td>
                                <td><input type="text" class="form-control cat_23_nov_item" name="cat_23_nov_item"></td>
                                <td><input type="text" class="form-control cat_23_dec_item" name="cat_23_dec_item"></td>
                                <td><input type="text" class="form-control cat_23_total_item total_items" name="cat_23_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_23_jan_amnt" name="cat_23_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_23_feb_amnt" name="cat_23_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_23_mar_amnt" name="cat_23_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_23_apr_amnt" name="cat_23_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_23_may_amnt" name="cat_23_may_amnt"></td>
                                <td><input type="text" class="form-control cat_23_jun_amnt" name="cat_23_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_23_jul_amnt" name="cat_23_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_23_aug_amnt" name="cat_23_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_23_sep_amnt" name="cat_23_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_23_oct_amnt" name="cat_23_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_23_nov_amnt" name="cat_23_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_23_dec_amnt" name="cat_23_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_23_total_amnt total_amount" name="cat_23_total_amnt"></td>
                            </tr>
    
                            {{-- Category 24 --}}
                            <tr>
                                <td rowspan="2" class="cycle-count-first-row">
                                    <input type="text" class="form-control category_24" name="category_24">
                                </td>
                                <td><p>Items</p></td>
                                <td><input type="text" class="form-control cat_24_jan_item" name="cat_24_jan_item"></td>
                                <td><input type="text" class="form-control cat_24_feb_item" name="cat_24_feb_item"></td>
                                <td><input type="text" class="form-control cat_24_mar_item" name="cat_24_mar_item"></td>
                                <td><input type="text" class="form-control cat_24_apr_item" name="cat_24_apr_item"></td>
                                <td><input type="text" class="form-control cat_24_may_item" name="cat_24_may_item"></td>
                                <td><input type="text" class="form-control cat_24_jun_item" name="cat_24_jun_item"></td>
                                <td><input type="text" class="form-control cat_24_jul_item" name="cat_24_jul_item"></td>
                                <td><input type="text" class="form-control cat_24_aug_item" name="cat_24_aug_item"></td>
                                <td><input type="text" class="form-control cat_24_sep_item" name="cat_24_sep_item"></td>
                                <td><input type="text" class="form-control cat_24_oct_item" name="cat_24_oct_item"></td>
                                <td><input type="text" class="form-control cat_24_nov_item" name="cat_24_nov_item"></td>
                                <td><input type="text" class="form-control cat_24_dec_item" name="cat_24_dec_item"></td>
                                <td><input type="text" class="form-control cat_24_total_item total_items" name="cat_24_total_item"></td>
                            </tr>
                            <tr>
                                <td><p>$ +/-</p></td>
                                <td><input type="text" class="form-control cat_24_jan_amnt" name="cat_24_jan_amnt"></td>
                                <td><input type="text" class="form-control cat_24_feb_amnt" name="cat_24_feb_amnt"></td>
                                <td><input type="text" class="form-control cat_24_mar_amnt" name="cat_24_mar_amnt"></td>
                                <td><input type="text" class="form-control cat_24_apr_amnt" name="cat_24_apr_amnt"></td>
                                <td><input type="text" class="form-control cat_24_may_amnt" name="cat_24_may_amnt"></td>
                                <td><input type="text" class="form-control cat_24_jun_amnt" name="cat_24_jun_amnt"></td>
                                <td><input type="text" class="form-control cat_24_jul_amnt" name="cat_24_jul_amnt"></td>
                                <td><input type="text" class="form-control cat_24_aug_amnt" name="cat_24_aug_amnt"></td>
                                <td><input type="text" class="form-control cat_24_sep_amnt" name="cat_24_sep_amnt"></td>
                                <td><input type="text" class="form-control cat_24_oct_amnt" name="cat_24_oct_amnt"></td>
                                <td><input type="text" class="form-control cat_24_nov_amnt" name="cat_24_nov_amnt"></td>
                                <td><input type="text" class="form-control cat_24_dec_amnt" name="cat_24_dec_amnt"></td>
                                <td><input type="text" class="form-control cat_24_total_amnt total_amount" name="cat_24_total_amnt"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center my-5">
                    <button class="btn btn-primary px-5">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Add the following script to calculate totals -->
<script>
// Run the script when the document is ready
$(document).ready(function () {

    // Helper function to get the month abbreviation
    function getMonthAbbreviation(month) {
        const monthNames = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];
        return monthNames[month - 1];
    }

    // Iterate over each category
    for (let i = 1; i <= 24; i++) {
        // Calculate total when any monthly input changes
        $('.cat_' + i + '_jan_item, .cat_' + i + '_feb_item, .cat_' + i + '_mar_item, .cat_' + i + '_apr_item, .cat_' + i + '_may_item, .cat_' + i + '_jun_item, .cat_' + i + '_jul_item, .cat_' + i + '_aug_item, .cat_' + i + '_sep_item, .cat_' + i + '_oct_item, .cat_' + i + '_nov_item, .cat_' + i + '_dec_item').on('input', function () {
            let total = 0;
            // Sum up monthly values
            for (let month = 1; month <= 12; month++) {
                total += parseFloat($('.cat_' + i + '_' + getMonthAbbreviation(month) + '_item').val()) || 0;
            }
            // Set the total value
            $('.cat_' + i + '_total_item').val(total);
            updateSkuCount();
        });

        // Calculate total when any monthly input changes
        $('.cat_' + i + '_jan_amnt, .cat_' + i + '_feb_amnt, .cat_' + i + '_mar_amnt, .cat_' + i + '_apr_amnt, .cat_' + i + '_may_amnt, .cat_' + i + '_jun_amnt, .cat_' + i + '_jul_amnt, .cat_' + i + '_aug_amnt, .cat_' + i + '_sep_amnt, .cat_' + i + '_oct_amnt, .cat_' + i + '_nov_amnt, .cat_' + i + '_dec_amnt').on('input', function () {
            let total = 0;
            // Sum up monthly values
            for (let month = 1; month <= 12; month++) {
                total += parseFloat($('.cat_' + i + '_' + getMonthAbbreviation(month) + '_amnt').val()) || 0;
            }
            // Set the total value
            $('.cat_' + i + '_total_amnt').val(total.toFixed(2));
            updateInvAmount();
        });
    }

    // Function to calculate the total sum for a specific class
    function calculateTotal(className) {
        let total = 0;
        $('.' + className).each(function () {
            total += parseFloat($(this).val()) || 0;
        });
        return total;
    }
    
    function calculateTotal2(className) {
        let total = 0;
        $('.' + className).each(function () {
            total += parseFloat($(this).val()) || 0;
        });
        return total.toFixed(2);
    }

    // Function to update sku_count when total_item changes
    function updateSkuCount() {
        $('.sku_count').val(calculateTotal('total_items'));
    }

    // Function to update inv_adjustment when total_amount changes
    function updateInvAmount() {
        $('.inv_adjustment').val(calculateTotal2('total_amount'));
    }

    // Attach event listener to all total_item inputs
    $('.form-control').on('input', updateSkuCount);

    // Attach event listener to all total_amount inputs
    $('.form-control').on('input', updateInvAmount);


});

</script>

<script>
    document.getElementById('dataEntryForm').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            var currentInput = document.activeElement;
            var inputs = document.getElementById('dataEntryForm').querySelectorAll('input');
            var currentIndex = Array.prototype.indexOf.call(inputs, currentInput);
            if (currentIndex < inputs.length - 1) {
                inputs[currentIndex + 1].focus();
            }
        }
    });

</script>
@endsection
