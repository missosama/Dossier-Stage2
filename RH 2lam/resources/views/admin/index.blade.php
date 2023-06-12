@extends('layouts.master')

@section('css')

<link rel="stylesheet" href="{{ URL::asset('plugins/chartist/css/chartist.min.css') }}">
<style>
    #pieChart {
        width: 400px; /* Adjust the width as per your preference */
        height: 300px; /* Adjust the height as per your preference */
        margin: 0 auto;
    }
    #attendanceChart {
        width: 400px;
        height: 300px;
        margin: 0 auto;
    }
    #lineChart{
        width: 700px;
        margin: 0 auto;
    }
</style>
@endsection

@section('breadcrumb')
<div class="col-sm-6 text-left" >
     <h4 class="page-title">Dashboard</h4>
     <ol class="breadcrumb">
         <li class="breadcrumb-item active">Human ressources</li>
     </ol>
</div>
@endsection

@section('content')
                   <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white" style="background-color: orangered">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                                <span class="ti-id-badge" style="font-size: 30px"></span>
                                            </div>
                                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Total <br> Employees</h5>
                                        </div>

                                        <h1 class="font-500 float-right">{{$data[0]}} </h1>
                                        <span class="ti-user float-left" style="font-size: 71px"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white" style="background-color: rgb(0, 17, 255)">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                                <span class="fas fa-user-friends" style="font-size: 30px"></span>
                                            </div>
                                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Total <br> Candidat</h5>
                                        </div>

                                        <h1 class="font-500 float-right">{{$data[1]}} </h1>
                                        <span class="fas fa-users float-left" style="font-size: 71px"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white" style="background-color: rgb(51, 255, 0)">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                                <span class="fas fa-sign-out-alt" style="font-size: 30px"></span>
                                            </div>
                                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Total <br> Leave Request</h5>
                                        </div>

                                        <h1 class="font-500 float-right">{{$data[2]}} </h1>
                                        <span class="fas fa-file-signature float-left" style="font-size: 71px"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white" style="background-color: rgb(255, 0, 179)">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                                <span class="fas fa-graduation-cap" style="font-size: 30px"></span>
                                            </div>
                                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Total <br>Training </h5>
                                        </div>

                                        <h1 class="font-500 float-right">{{$data[3]}} </h1>
                                        <span class="fas fa-chalkboard-teacher float-left" style="font-size: 71px"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <canvas id="pieChart"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                        <canvas id="attendanceChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <canvas id="lineChart"></canvas>
                            </div>
                            <script>
                                var data5 = {!! json_encode($data[5]) !!};
                                var data6 = {!! json_encode($data[6]) !!};
                                var data7 = {!! json_encode($data[7]) !!};

                                var pieChartData = {
                                    labels: ["Validated Request", "Pending Request", "Declined Request"],
                                    datasets: [{
                                        label: "Leave Request",
                                        data: [data5, data6, data7],
                                        backgroundColor: [
                                            'rgba(0, 128, 2, 0.5)',
                                            'rgba(255, 165, 0, 0.5)',
                                            'rgba(255, 0, 0, 0.5)'
                                        ],
                                        borderColor: [
                                            'rgba(0, 128, 2, 1)',
                                            'rgba(255, 165, 0, 1)',
                                            'rgba(255, 0, 0, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                };

                                var pieCtx = document.getElementById('pieChart').getContext('2d');
                                var pieChart = new Chart(pieCtx, {
                                    type: 'pie',
                                    data: pieChartData,
                                    options: {
                                        responsive: true,
                                        maintainAspectRatio: false,
                                        plugins: {
                                            legend: {
                                                position: 'right'
                                            }
                                        }
                                    }
                                });

                                var allAttendance = {!! json_encode($data[8]) !!};
                                var ontimeEmp = {!! json_encode($data[9]) !!};
                                var latetimeEmp = {!! json_encode($data[10]) !!};

                                var attendanceChartData = {
                                    labels: ['All Attendance', 'On-time Employees', 'Late Employees'],
                                    datasets: [{
                                        label: 'Attendance Data',
                                        data: [allAttendance, ontimeEmp, latetimeEmp],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.5)',
                                            'rgba(54, 162, 235, 0.5)',
                                            'rgba(255, 206, 86, 0.5)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                };

                                var attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
                                var attendanceChart = new Chart(attendanceCtx, {
                                    type: 'bar',
                                    data: attendanceChartData,
                                    options: {
                                        responsive: true,
                                        maintainAspectRatio: false,
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                ticks: {
                                                    stepSize: 1
                                                }
                                            }
                                        },
                                        plugins: {
                                            legend: {
                                                display: false
                                            }
                                        }
                                    }
                                });
    var lineChartLabels = {!! json_encode($data[11]) !!};
    var lineChartData = {
        labels: lineChartLabels,
        datasets: [{
            label: 'Number of Present Employees',
            data: {!! json_encode($data[12]) !!},
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            fill: false
        }]
    };

    var lineCtx = document.getElementById('lineChart').getContext('2d');
    var lineChart = new Chart(lineCtx, {
        type: 'line',
        data: lineChartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
                            </script>
@endsection

@section('script')
<!--Chartist Chart-->
<script src="{{ URL::asset('plugins/chartist/js/chartist.min.js') }}"></script>
<script src="{{ URL::asset('plugins/chartist/js/chartist-plugin-tooltip.min.js') }}"></script>
<!-- peity JS -->
<script src="{{ URL::asset('plugins/peity-chart/jquery.peity.min.js') }}"></script>
<script src="{{ URL::asset('assets/pages/dashboard.js') }}"></script>
@endsection
