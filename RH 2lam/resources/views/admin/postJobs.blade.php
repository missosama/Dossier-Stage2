@extends('layouts.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Post Jobs</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Post Jobs</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Post Jobs</a></li>
    </ol>
</div>
@endsection
@section('button')
<a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Add New Post</a>
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
                                                        <th data-priority="2">Title</th>
                                                        <th data-priority="3">description</th>
                                                        <th data-priority="4">salary</th>
                                                        <th data-priority="5">number of candidates</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($jobs as $job)
                                                        <tr>
                                                            <td>{{ $job->id }}</td>
                                                            <td>{{ $job->name }}</td>
                                                            <td>{{ $job->description }}</td>
                                                            <td>{{ $job->salary }}</td>
                                                            <td>
                                                                    @php
                                                                        $count=0;
                                                                    @endphp
                                                                @foreach ($candidates as $candidate)
                                                                    @if ($job->id===$candidate->JobId)
                                                                            @php
                                                                                $count++
                                                                            @endphp
                                                                    @endif
                                                                @endforeach
                                                                {{ $count }}
                                                            </td>

                                                            <td>
                                                                <a href="#edit{{$job->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i></a>
                                                                <a href="#delete{{$job->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></a>
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


@foreach( $jobs as $job)
@include('includes.edit_delete_job')
@endforeach
@include('includes.add_job')
@endsection
@section('script')
@endsection


