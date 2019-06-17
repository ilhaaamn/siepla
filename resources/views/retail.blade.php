@extends('layouts.app')

@section('content')
    <div class="row pt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6>Overview</h6>
                            <h5 class="card-title text-muted mb-0" style="font-weight: bold">Transactions per Month</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="transactionChart" height="610" width="600"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6>Overview</h6>
                            <h5 class="card-title text-muted mb-0" style="font-weight: bold">All Transaction</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="items" class="table table-striped table-bordered table-light hover" style="width: 100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Bike Model</th>
                            <th>Dealer</th>
                            <th>Remarks</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($retails as $retail)
                            <tr>
                                <td>
                                    {{$i++}}
                                </td>
                                <td>
                                    {{$retail->bikemodel_code}}
                                </td>
                                <td>
                                    {{$retail->dealer->dlname}}
                                </td>
                                <td>
                                    {{$retail->remarks}}
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
@endsection
