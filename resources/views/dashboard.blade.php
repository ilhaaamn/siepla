@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col" style="font-size: 20pt">
                            <h5 class="card-title text-muted mb-0">Total Transaction this Month</h5>
                            <span class="h2 font-weight-bold mb-0">{{$totalTransaction}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col" style="font-size: 20pt">
                            <h5 class="card-title text-muted mb-0">Total Shipping this Month</h5>
                            <span class="h2 font-weight-bold mb-0">{{$totalShipping}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-success text-white rounded-circle shadow pl-2 pr-2" style="font-size: 20pt;">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-secondary mr-2"><i class="fas fa-minus"></i> 0%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col" style="font-size: 20pt">
                            <h5 class="card-title text-muted mb-0">Total Returned this Month</h5>
                            <span class="h2 font-weight-bold mb-0">{{$totalReturned}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow pl-2 pr-2" style="font-size: 20pt;">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6>Overview</h6>
                                <h5 class="card-title text-muted mb-0" style="font-weight: bold">Transactions per Month</h5>
                            </div>
                            <div class="col-md-2">
                                <a href="{{url('retail')}}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="transactionChart" height="500" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6>Overview</h6>
                            <h5 class="card-title text-muted mb-0" style="font-weight: bold">Shipping per Month</h5>
                        </div>
                        <div class="col-md-2">
                            <a href="#!" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="shippingChart" height="500" width="600"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6>Overview</h6>
                                <h5 class="card-title text-muted mb-0" style="font-weight: bold">Returned Items compare to Sales</h5>
                            </div>
                            <div class="col-md-2">
                                <a href="{{url('shipping')}}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="returnedChart" height="500" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row align-items-center">
                        <div class="col-md-10">
                            <h5 class="card-title text-muted mb-0" style="font-weight: bold">Top Items</h5>
                        </div>
                        <div class="col">
                            <a href="{{url('retail')}}" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="items" class="table table-striped table-bordered table-light hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Color</th>
                                <th>Spec</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($bikes as $bike)
                            <tr>
                                <td>
                                    {{$i++}}
                                </td>
                                <td>
                                    {{$bike->name}}
                                </td>
                                <td>
                                    {{$bike->color}}
                                </td>
                                <td>
                                    {{$bike->spec}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <h5 class="card-title text-muted mb-0" style="font-weight: bold">Dealer with the most sales</h5>
                        </div>
                        <div class="col">
                            <a href="{{url('dealer')}}" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dealers" class="table table-striped table-bordered table-light hover" style="width: 100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Total Items</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($topDealer as $dealer => $dataDealer)
                            <tr>
                                <td>
                                    {{$i++}}
                                </td>
                                <td>
                                    {{$dataDealer[0]->dealer->dlname}}
                                </td>
                                <td>
                                    {{count($dataDealer)}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
    <script>
        $(document).ready( function () {
            $('#items,#dealers').DataTable({
                "searching": false,
                "paging": false
            });
        } );
    </script>
    {{--Chart Script--}}
    <script>
        var urlRetail = "{{url('transaction/chart')}}";
        var Month = new Array();
        var TotalRetail = new Array();
        $(document).ready(function(){
            $.get(urlRetail, function(response){
                response.forEach(function(data){
                    Month.push(data.month);
                    TotalRetail.push(data.total);
                });
                var ctx = document.getElementById("transactionChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:['Jan','Feb','March','April','May','Jun','Jul','Aug','Sept', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: 'Total Transaction per Month',
                            data: TotalRetail,
                            backgroundColor: "#f98d00",
                            pointBorderWidth: 0,
                            borderWidth: 5
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            });
        });
    </script>
    <script>
        var urlShipment = "{{url('shipment/chart')}}";
        var Name = new Array();
        var Code = new Array();
        var TotalShipment = new Array();
        $(document).ready(function(){
            $.get(urlShipment, function(response){
                response.forEach(function(data){
                    Month.push(data.month);
                    TotalShipment.push(data.total);
                });
                var ctx = document.getElementById("shippingChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: 'Total Transaction per Month',
                            data: TotalShipment,
                            backgroundColor: "#3e95cd",
                            pointBorderWidth: 0,
                            borderWidth: 5
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            });
        });
    </script>
    <script>
        var urlCompare = "{{url('compare/chart')}}";
        var totalReturned = new Array();
        var totalRetail = new Array();
        $(document).ready(function(){
            $.get(urlCompare, function(response){
                response.forEach(function(data){
                    totalRetail.push(data.totalRetail);
                    totalReturned.push(data.totalReturned);
                });
                var ctx = document.getElementById("returnedChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: 'Total Transaction per Month',
                            data: totalRetail,
                            borderColor: "#3e95cd",
                            pointBorderWidth: 0,
                            borderWidth: 5
                        },{
                            label: 'Total Returned Items per Month',
                            data: totalReturned,
                            borderColor: "red",
                            pointBorderWidth: 0,
                            borderWidth: 5
                        }]
                    },
                    options: {
                        legend: {
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            });
        });
    </script>
@endsection
