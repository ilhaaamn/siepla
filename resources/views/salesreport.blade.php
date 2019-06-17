@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <h5 class="card-title text-muted mb-0" style="font-weight: bold">All Report</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dealers" class="table table-striped table-bordered table-light hover" style="width: 100%">
                        <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Record Date</th>
                            <th>Dealer ID</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($reports as $data)
                            <tr>
                                <td>
                                    {{$i++}}
                                </td>
                                <td>
                                    {{$data->record_date}}
                                </td>
                                <td>
                                    {{$data->id_branch}}
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
