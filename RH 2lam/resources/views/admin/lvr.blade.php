@extends('layouts.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Request</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Requests</a></li>
    </ol>
</div>
@endsection
@section('button')

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
                                                        <th data-priority="2">employee</th>
                                                        <th data-priority="3">position</th>
                                                        <th data-priority="4">request type</th>
                                                        <th data-priority="5">start date</th>
                                                        <th data-priority="6">end date</th>
                                                        <th data-priority="8">reason</th>
                                                        <th data-priority="10">Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($lvrs as $lvr )
                                                            <tr>
                                                                <td>{{$lvr->id}}</td>
                                                                @foreach ($employes as $employe )
                                                                   @if($employe->id===$lvr->employee_id)
                                                                    <td>{{$employe->name}}</td>
                                                                    <td>{{$employe->position}}</td>
                                                                    @endif
                                                                @endforeach
                                                            <td>{{$lvr->request_type}}</td>
                                                            <td>{{$lvr->start_date}}</td>
                                                            <td>{{$lvr->end_date}}</td>
                                                            <td>{{$lvr->reason}}</td>
                                                            <td>
                                                                @if ($lvr->status === 'pending')
                                                                    <form action="{{ route('lvr.accept', ['id' => $lvr->id]) }}" method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit" class="btn btn-success">Accept</button>
                                                                    </form>
                                                                    <form action="{{ route('lvr.decline', ['id' => $lvr->id]) }}" method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit" class="btn btn-danger">Decline</button>
                                                                    </form>
                                                                @elseif ($lvr->status === 'accepted')
                                                                    <span class="text-success">Accepted</span>
                                                                @elseif ($lvr->status === 'declined')
                                                                    <span class="text-danger">Declined</span>
                                                                @endif
                                                            </td>
                                                            </tr>
                                                        @endforeach

@foreach( $lvrs as $lvr)
@include('includes.edit_delete_lvr')
@endforeach
@include('includes.add_lvr')

@endsection
@section('script')
@endsection
