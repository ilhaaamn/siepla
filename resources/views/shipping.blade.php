@extends('layouts.app')

@section('content')
    <div class="row pt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6>Overview</h6>
                                <h5 class="card-title text-muted mb-0" style="font-weight: bold">Returned Items per Month</h5>
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6>Overview</h6>
                            <h5 class="card-title text-muted mb-0" style="font-weight: bold">Shipping per Month</h5>
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
                <div class="card-header bg-white">
                    <div class="row align-items-center">
                        <div class="col-md-10">
                            <h5 class="card-title text-muted mb-0" style="font-weight: bold">Most Busiest Warehouse </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="items" class="table table-striped table-bordered table-light hover" style="width: 100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Warehouse</th>
                            <th>Shipment</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($warehouse as $data)
                            <tr>
                                <td>
                                    {{$i++}}
                                </td>
                                <td>
                                    {{$data->name}}
                                </td>
                                <td>
                                    {{mt_rand(130, 456)}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
                            <h5 class="card-title text-muted mb-0" style="font-weight: bold">All Shipments</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="items" class="table table-striped table-bordered table-light hover" style="width: 100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Warehouse</th>
                            <th>Status</th>
                            <th>Received Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($shipments as $data)
                            <tr>
                                <td>
                                    {{$i++}}
                                </td>
                                <td>
                                    {{$data->warehouse->name}}
                                </td>
                                <td>
                                    {{$data->status}}
                                </td>
                                <td>
                                    {{$data->received_time}}
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
                "paging": true
            });
        } );
    </script>
            <script>
                var urlShipment = "{{url('shipment/chart')}}";
                var Month = new Array();
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
                            label: 'Total Return per Month',
                            data: [3,5,6,0,2,0,2,2,1,3],
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
