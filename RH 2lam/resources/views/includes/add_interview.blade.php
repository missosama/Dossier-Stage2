<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Add New Interview</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('interviews.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" placeholder="Enter location" />
                        <div id="addMapContainer" style="height: 400px;"></div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>

  <script>
  document.addEventListener('DOMContentLoaded', function () {
  var addMap = L.map('addMapContainer').setView([0, 0], 13);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
  }).addTo(addMap);

  var addMarker;

  addMap.on('click', function (e) {
    if (addMarker) {
      addMap.removeLayer(addMarker);
    }

    addMarker = L.marker(e.latlng).addTo(addMap);
    var locationInput = document.getElementById('location');
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


  var locationInput = document.getElementById('location');
  var locationValue = locationInput.value;
  if (locationValue) {

    var latLng = locationValue.split(', ');
    if (latLng.length === 2) {
      var lat = parseFloat(latLng[0]);
      var lng = parseFloat(latLng[1]);
      if (!isNaN(lat) && !isNaN(lng)) {
        var geocodeUrl = 'https://nominatim.openstreetmap.org/reverse?format=json&lat=' + lat + '&lon=' + lng;
        fetch(geocodeUrl)
          .then(response => response.json())
          .then(data => {
            var address = data.display_name;
            if (address) {
              locationInput.value = address;
              addMarker = L.marker([lat, lng]).addTo(addMap);
              addMap.setView([lat, lng], 13);
            }
          })
          .catch(error => {
            console.log('Error:', error);
          });
      }
    }
  }
});

</script>









