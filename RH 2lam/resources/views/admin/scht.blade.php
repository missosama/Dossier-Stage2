@extends('layouts.master')

@section('css')

    <link href="{{ URL::asset('plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet"
        type="text/css" media="screen">
@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title text-left">Training Schedules</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Training</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">schedules</a></li>


        </ol>
    </div>
@endsection
@section('button')
    <a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Add New Schedule</a>


@endsection

@section('content')
@include('includes.flash')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="datatable-buttons" class="table table-hover table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead class="thead-dark">
                                    <tr>
                                        <th data-priority="1">#</th>
                                        <th data-priority="1">name</th>
                                        <th data-priority="2">start Date</th>
                                        <th data-priority="3">end Date</th>
                                        <th data-priority="4">Time In</th>
                                        <th data-priority="5">Time Out</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedules as $schedule)
                                        <tr>
                                            <td> {{ $schedule->id }} </td>
                                            <td>{{ $schedule->name}}</td>
                                            <td> {{ $schedule->start_date }} </td>
                                            <td> {{ $schedule->end_date }} </td>
                                            <td> {{ $schedule->time_in }} </td>
                                            <td> {{ $schedule->time_out }} </td>
                                            <td>

                                                <a href="#edit{{ $schedule->id }}" data-toggle="modal"
                                                    class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i>
                                                    </a>
                                                <a href="#delete{{ $schedule->id }}" data-toggle="modal"
                                                    class="btn btn-danger btn-sm delete btn-flat"><i
                                                        class='fa fa-trash'></i></a>

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
    </div>

    @foreach ($schedules as $schedule)
        @include('includes.edit_delete_schT')
    @endforeach

    @include('includes.add_schT')

@endsection


@section('script')

    <script src="{{ URL::asset('plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js') }}"></script>
@endsection

@section('script')
    <script>
        $(function() {
            $('.table-responsive').responsiveTable({
                addDisplayAllBtn: 'btn btn-secondary'
            });
        });
    </script>
@endsection
