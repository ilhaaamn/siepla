@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col" style="font-size: 20pt">
                            <h5 class="card-title text-muted mb-0">Total Transaction</h5>
                            <span class="h2 font-weight-bold mb-0">6,645</span>
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
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col" style="font-size: 20pt">
                            <h5 class="card-title text-muted mb-0">Total Item Sold</h5>
                            <span class="h2 font-weight-bold mb-0">23,563</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i> 1.25%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col" style="font-size: 20pt">
                            <h5 class="card-title text-muted mb-0">Total Shipping</h5>
                            <span class="h2 font-weight-bold mb-0">1,223</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-success text-white rounded-circle shadow pl-2 pr-2" style="font-size: 20pt;">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-secondary mr-2"><i class="fas fa-minus"></i> 0%</span>
                        <span class="text-nowrap">Since last week</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col" style="font-size: 20pt">
                            <h5 class="card-title text-muted mb-0">Total Returned Products</h5>
                            <span class="h2 font-weight-bold mb-0">45</span>
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
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="testChart1" height="500" width="600"></canvas>
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
                    <canvas id="testChart2" height="500" width="600"></canvas>
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
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="testChart3" height="500" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row align-items-center">
                        <div class="col-md-11">
                            <h5 class="card-title text-muted mb-0" style="font-weight: bold">Top Items</h5>
                        </div>
                        <div class="col">
                            <a href="#!" class="btn btn-sm btn-primary">See all</a>
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
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <h5 class="card-title text-muted mb-0" style="font-weight: bold">Dealer with the most sales</h5>
                        </div>
                        <div class="col">
                            <a href="#!" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dealers" class="table table-striped table-bordered table-light hover" style="width: 100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($dealer as $dealer)
                            <tr>
                                <td>
                                    {{$i++}}
                                </td>
                                <td>
                                    {{$dealer->dlname}}
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
        var url = "{{url('bikemodel/chart')}}";
        var Name = new Array();
        var Code = new Array();
        var Color = new Array();
        $(document).ready(function(){
            $.get(url, function(response){
                response.forEach(function(data){
                    Name.push(data.id);
                    Code.push(data.code);
                    Color.push(data.color);
                });
                var ctx = document.getElementById("testChart1").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:['January','February','March','April','May'],
                        datasets: [{
                            label: 'Total Transaction per Month',
                            data: ['22','10','35','5','17'],
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
        var url = "{{url('bikemodel/chart')}}";
        var Name = new Array();
        var Code = new Array();
        var Color = new Array();
        $(document).ready(function(){
            $.get(url, function(response){
                response.forEach(function(data){
                    Name.push(data.id);
                    Code.push(data.code);
                    Color.push(data.color);
                });
                var ctx = document.getElementById("testChart2").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:['January','February','March','April','May'],
                        datasets: [{
                            label: 'Total Transaction per Month',
                            data: ['10','10','20','5','25'],
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
        var url = "{{url('bikemodel/chart')}}";
        var Name = new Array();
        var Code = new Array();
        var Color = new Array();
        $(document).ready(function(){
            $.get(url, function(response){
                response.forEach(function(data){
                    Name.push(data.id);
                    Code.push(data.code);
                    Color.push(data.color);
                });
                var ctx = document.getElementById("testChart3").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels:['January','February','March','April','May'],
                        datasets: [{
                            label: 'Total Transaction per Month',
                            data: ['10','10','20','5','25'],
                            borderColor: "#3e95cd",
                            pointBorderWidth: 0,
                            borderWidth: 5
                        },{
                            label: 'Total Returned Items per Month',
                            data: ['1','3','2','2','0'],
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
