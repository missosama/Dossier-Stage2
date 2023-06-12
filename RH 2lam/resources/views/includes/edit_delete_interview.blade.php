<div class="modal fade" id="edit{{ $interview->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Edit Interview</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('interviews.update', $interview->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="edit-date" name="date" value="{{ $interview->date }}" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="edit-time" name="time" value="{{ $interview->time }}" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="edit-location" name="location" value="{{ $interview->location }}" />
                        <div id="editMap" style="height: 400px;"></div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete{{ $interview->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="align-items: center">
                <h4 class="modal-title"><span class="candidate_id">Delete Interview</span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('interviews.destroy', $interview->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <h6>Are you sure you want to delete:</h6>
                        <h2 class="bold del_candidate_id">{{ $interview->id }}</h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">
                    <i class="fa fa-close"></i> Close
                </button>
                <button type="submit" class="btn btn-danger btn-flat">
                    <i class="fa fa-trash"></i> Delete
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.delete-modal').on('click', function () {
            var candidateId = $(this).data('candidate-id');
            $('.del_candidate_id').text(candidateId);
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editMap = L.map('editMap').setView([0, 0], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
        }).addTo(editMap);

        var editMarker;

        editMap.on('click', function (e) {
            if (editMarker) {
                editMap.removeLayer(editMarker);
            }

            editMarker = L.marker(e.latlng).addTo(editMap);
            var locationInput = document.getElementById('edit-location');
            locationInput.value = e.latlng.lat + ', ' + e.latlng.lng;

            // Reverse geocoding request
            var geocodeUrl = 'https://nominatim.openstreetmap.org/reverse?format=json&lat=' + e.latlng.lat + '&lon=' + e.latlng.lng;
            fetch(geocodeUrl)
                .then(response => response.json())
                .then(data => {
                    var address = data.display_name;
                    if (address) {
                        locationInput.value = address;
                    }
                })
                .catch(error => {
                    console.log('Error:', error);
                });
        });
    });
</script>
