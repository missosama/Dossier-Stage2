@extends('layouts.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Candidatees</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Post Jobs</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Candidates</a></li>
    </ol>
</div>
@endsection
@section('button')
<a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Add New Candidat</a>
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
                                                        <th data-priority="3">Email</th>
                                                        <th data-priority="4">age</th>
                                                        <th data-priority="5">Cv</th>
                                                        <th data-priority="6">Status</th>
                                                        <th data-priority="8">Job</th>
                                                        <th data-priority="9">Set interview</th>
                                                        <th data-priority="10">Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach( $candidates as $candidate)
                                                        <tr>
                                                            <td>{{$candidate->id}}</td>
                                                            <td>{{$candidate->name}}</td>
                                                            <td>{{$candidate->email}}</td>
                                                            <td>{{$candidate->age}}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fileModal{{ $candidate->id }}">
                                                                Show File
                                                            </button>
                                                        </td>
                                                        <td>
                                                                <form action="{{ route('candidates.updateStatus', ['id' => $candidate->id]) }}" method="POST" class="mb-3">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    @if ($candidate->status === 'pending')
                                                                        <div class="input-group mb-3">
                                                                            <select name="status" class="form-select">
                                                                                <option value="pending" @if ($candidate->status === 'pending') selected @endif>Pending</option>
                                                                                <option value="validated" @if ($candidate->status === 'validated') selected @endif>Validated</option>
                                                                                <option value="declined" @if ($candidate->status === 'declined') selected @endif>Declined</option>
                                                                            </select>
                                                                            <button type="submit" class="btn btn-primary input-group-text">Submit</button>
                                                                        </div>
                                                                    @endif
                                                                    @if ($candidate->status === 'validated')
                                                                        <li class="list-group-item list-group-item-success">Validated</li>
                                                                    @endif

                                                                    @if ($candidate->status === 'declined')
                                                                        <li class="list-group-item list-group-item-danger">Declined</li>
                                                                    @endif
                                                                </form>
                                                            </td>

                                                    @foreach ($jobs as $job )
                                                        @if($job->id===$candidate->JobId)
                                                            <td>{{$job->name}}</td>
                                                        @endif
                                                    @endforeach

                                                        <td>

                                                            <div class="form-group">

                                                                <form action="{{ route('candidat.interviews') }}" method="POST">

                                                                    @csrf
                                                                    <select class="form-control interview-select" id="interviewSelect" name="id">
                                                                        <option value="">Select an interview</option>
                                                                        @foreach ($interviews as $interview)
                                                                            <option value="{{ $interview->id }}" data-date="{{ $interview->date }}" data-time="{{ $interview->time }}">
                                                                                {{ $interview->date }} - {{ $interview->time }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                                                    <input type="hidden" name="job_id" value="{{ $candidate->JobId }}">
                                                                    <button type="submit" class="btn btn-primary">Set Interview</button>
                                                                </form>
                                                                </div>
                                                        </td>
                                                            <td>

                                                                <a href="#edit{{$candidate->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i></a>
                                                                <a href="#delete{{$candidate->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></a>
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


@foreach( $candidates as $candidate)
@include('includes.edit_delete_candidat')
@include('includes.pdfModal')
@endforeach

@include('includes.add_candidat')

@endsection


@section('script')


@endsection
<script>
    $(document).ready(function() {
        $('#status-select').select2({
            // Add any Select2 options you need
        });

        $('#status-select').on('select2:open', function() {
            $('.select2-results').append($('#status-submit'));
        });
    });
</script>
