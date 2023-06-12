<div class="modal fade" id="loginFace" tabindex="-1" role="dialog" aria-labelledby="loginFaceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login with FaceID</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="video-container"></div>

                <!-- Button to capture the face -->
                <button id="capture-btn" class="btn btn-primary">Capture Face</button>

                <!-- Hidden input field to store the captured face image data -->
                <input type="hidden" id="image-input" name="image">

                <!-- Login form (hidden) to submit the captured face -->


            </div>
        </div>
    </div>
</div>


<script>

// Access the camera stream
navigator.mediaDevices.getUserMedia({ video: true })
  .then(function(stream) {
    var video = document.createElement('video');
    video.srcObject = stream;
    video.play();
    video.style.width = '300px'; // Set the width of the video element
    document.getElementById('video-container').appendChild(video);
  })
  .catch(function(error) {
    console.error('Error accessing the camera: ', error);
  });

// Capture the face when the button is clicked
document.getElementById('capture-btn').addEventListener('click', function() {
  var video = document.querySelector('video');
  var canvas = document.createElement('canvas');
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  var context = canvas.getContext('2d');
  context.drawImage(video, 0, 0, canvas.width, canvas.height);
  var image = canvas.toDataURL('image/png');
  document.getElementById('image-input').value = image;

  // Submit the form to register the face
  document.getElementById('registration-form').submit();
});

</script>
     <form id="registration-form" action="{{ route('FaceId.login') }}" method="POST">
                    @csrf
                    <!-- Include any additional login form fields here -->
                </form>

