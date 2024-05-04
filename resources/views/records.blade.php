@extends('layouts.avatar')
@section('title')
Saved | Know Your Inventory
@endsection
@section('avatar_content')

<div class="container pb-5">
    <div class="row pb-5">

        <div class="col-12 text-center">
            <div class="py-5">
                <h1 class="display-3">Saved</h1>
            </div>
        </div>
        
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <ul class="nav nav-pills nav-fill" id="myTab" role="tablist" style="border: none !important">
            <li class="nav-item " role="presentation">
                <button class="nav-link active" id="daily-tab" data-bs-toggle="tab" data-bs-target="#daily-tab-pane"
                    type="button" role="tab" aria-controls="daily-tab-pane" aria-selected="false">Daily Sales</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="inventory-tab" data-bs-toggle="tab" data-bs-target="#inventory-tab-pane"
                    type="button" role="tab" aria-controls="inventory-tab-pane" aria-selected="false">Inventory Valuation</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="open-tab" data-bs-toggle="tab" data-bs-target="#open-tab-pane"
                    type="button" role="tab" aria-controls="open-tab-pane" aria-selected="false">Open To Buy</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="month-tab" data-bs-toggle="tab" data-bs-target="#month-tab-pane"
                    type="button" role="tab" aria-controls="month-tab-pane" aria-selected="true">12 Monthly
                    Forecast</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="cycle-tab" data-bs-toggle="tab" data-bs-target="#cycle-tab-pane"
                    type="button" role="tab" aria-controls="cycle-tab-pane" aria-selected="false">Cycle Count</button>
            </li>
            
        </ul>
        <hr>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="daily-tab-pane" role="tabpanel" aria-labelledby="daily-tab" tabindex="0">
                <div class="table-responsive card p-2 shadow">
                    {{-- <h4>Open To Buy</h4>
                <hr> --}}
                    <table class="table table-bordered dataTable" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daily_updates as $daily)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$daily->title}}</td>
                                <td>{{$daily->created_at->format('m-d-Y');}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('edit.daily.update', ['id' => $daily->id] )}}"
                                            class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('daily.update.details', ['id' => $daily->id] )}}"
                                            class="btn btn-primary">View</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="inventory-tab-pane" role="tabpanel" aria-labelledby="inventory-tab" tabindex="0">
                <div class="table-responsive card p-2 shadow">
                    {{-- <h4>Open To Buy</h4>
                <hr> --}}
                    <table class="table table-bordered dataTable" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inventory_valuations as $inv)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$inv->title}}</td>
                                <td>
                                    {{$inv->created_at->format('m-d-Y');}}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('edit.inventory.valuation', ['id' => $inv->id] )}}"
                                            class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('inventory.valuation.details', ['id' => $inv->id] )}}"
                                            class="btn btn-primary">View</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="open-tab-pane" role="tabpanel" aria-labelledby="open-tab" tabindex="0">
                <div class="table-responsive card p-2 shadow">
                    {{-- <h4>Open To Buy</h4>
                <hr> --}}
                    <table class="table table-bordered dataTable" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($open_buys as $open)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$open->title}}</td>
                                <td>{{$open->created_at->format('m-d-Y');}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('edit.open.buy', ['id' => $open->id] )}}"
                                            class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('open.buy.details', ['id' => $open->id] )}}"
                                            class="btn btn-primary">View</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="month-tab-pane" role="tabpanel" aria-labelledby="month-tab"
                tabindex="0">
                <div class="table-responsive card p-2 shadow">
                    {{-- <h4>12 Monthly Forecast</h4>
                <hr> --}}
                    <table class="table table-bordered dataTable" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($monthly_forecasts as $forecast)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$forecast->title}}</td>
                                <td>{{$forecast->created_at->format('m-d-Y');}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('edit.tracking.twelve', ['id' => $forecast->id] )}}"
                                            class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('tracking.twelve.details', ['id' => $forecast->id] )}}"
                                            class="btn btn-primary">View</a>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="cycle-tab-pane" role="tabpanel" aria-labelledby="cycle-tab" tabindex="0">
                <div class="table-responsive card p-2 shadow">
                    {{-- <h4>Cycle Count</h4>
                <hr> --}}
                    <table class="table table-bordered dataTable" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Inventory Adjustment</th>
                                <th>SKU Count</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cycle_counts as $cycle)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$cycle->title}}</td>
                                <td>{{$cycle->inv_adjustment}}</td>
                                <td>{{$cycle->sku_count}}</td>
                                <td>{{$cycle->created_at->format('m-d-Y');}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('edit.cycle.count', ['id' => $cycle->id] )}}"
                                            class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('cycle.count.details', ['id' => $cycle->id] )}}"
                                            class="btn btn-primary">View</a>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            
        </div>
    </div>
</div>


@endsection
