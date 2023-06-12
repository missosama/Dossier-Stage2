@extends('layouts.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Post Jobs</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Training</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Ressources</a></li>
    </ol>
</div>
@endsection
@section('button')
<a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Add New Ressource</a>
@endsection
@section('content')
@include('includes.flash')
                      <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                                <table id="datatable-buttons" class="table table-striped table-hover table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th data-priority="1">ID</th>
                                                        <th data-priority="2">Name</th>
                                                        <th data-priority="3">Training Name</th>
                                                        <th data-priority="4">Link</th>

                                                        <th data-priority="4">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($ressources as $res)
                                                        <tr>
                                                            <td>{{ $res->id }}</td>
                                                            <td>{{ $res->name }}</td>
                                                            @foreach($schedules as $schedule)
                                                            @if ($schedule->id===$res->schT_id)
                                                                <td>{{$schedule->name}}</td>
                                                            @endif
                                                            @endforeach

                                                            <td> <a href="{{ $res->file }}">source file of {{ $res->name }} </a></td>



                                                            <td>
                                                                <a href="#edit{{$res->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i></a>
                                                                <a href="#delete{{$res->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></a>
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
@foreach( $ressources as $res)
@include('includes.edit_delete_ressources')
@endforeach
@include('includes.add_ressources')
@endsection
@section('script')
@endsection


