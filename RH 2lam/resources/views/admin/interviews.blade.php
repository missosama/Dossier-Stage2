@extends('layouts.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Interviews</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Post Jobs</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Interviews</a></li>
    </ol>
</div>
@endsection
@section('button')
<a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Add New Interview</a>
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
                                <th data-priority="2">Date</th>
                                <th data-priority="3">Time</th>
                                <th data-priority="4">Candidat Name</th>
                                <th data-priority="5">Job</th>
                                <th data-priority="6">Location</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($interviews as $interview)
                                <tr>
                                    <td>{{ $interview->id }}</td>
                                    <td>{{ $interview->date }}</td>
                                    <td>{{ $interview->time }}</td>
                                    <td>
                                        @foreach ($candidates as $candidate )
                                            @if ($candidate->id===$interview->candidat_id)
                                                <td>{{$candidate->name}}</td>

                                            @endif
                                            disponible
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($jobs as $job )
                                        @if ($job->id===$interview->post_id)
                                            <td>{{$job->name}}</td>
                                        @endif

                                    @endforeach
                                    disponible
                                    </td>
                                    <td width=200px;>
                                        <div id="mapa-{{ $interview->id }}" style="height: 100px;"></div>>
                                        <script>
                                            var locationName{{ $interview->id }} = "{{ $interview->location }}";

                                            // Initialize the map for this interview
                                            var mapa{{ $interview->id }} = L.map('mapa-{{ $interview->id }}').setView([0, 0], 13);

                                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
                                            }).addTo(mapa{{ $interview->id }});

                                            // Geocoding request to retrieve coordinates for the location name
                                            var geocodeUrl = 'https://nominatim.openstreetmap.org/search?q=' + encodeURIComponent(locationName{{ $interview->id }}) + '&format=json';
                                            fetch(geocodeUrl)
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.length > 0) {
                                                        var lat = parseFloat(data[0].lat);
                                                        var lng = parseFloat(data[0].lon);
                                                        if (!isNaN(lat) && !isNaN(lng)) {
                                                            mapa{{ $interview->id }}.setView([lat, lng], 13);
                                                            var marker{{ $interview->id }} = L.marker([lat, lng]).addTo(mapa{{ $interview->id }});
                                                            marker{{ $interview->id }}.bindPopup(locationName{{ $interview->id }}).openPopup();
                                                        }
                                                    }
                                                })
                                                .catch(error => {
                                                    console.log('Error:', error);
                                                });
                                        </script>

                                    </td>
                                    <td>
                                        <a href="#edit{{$interview->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i></a>
                                        <a href="#delete{{$interview->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></a>
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

<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
@foreach( $interviews as $interview)
@include('includes.edit_delete_interview')
@endforeach
@include('includes.add_interview')
@endsection
@section('script')
@endsection

