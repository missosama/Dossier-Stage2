<!DOCTYPE html>
<html>
<head>
    <title>Register FaceID</title>
</head>
<body>
    <h2>Register FaceID</h2>
    <div id="video-container"></div>

    <button id="capture-btn">Capture Face</button>
    <input type="hidden" id="image-input" name="image">
    <script>
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function (stream) {
                var video = document.createElement('video');
                video.srcObject = stream;
                video.play();
                document.getElementById('video-container').appendChild(video);
            })
            .catch(function (error) {
                console.error('Error accessing the camera: ', error);
            });
        document.getElementById('capture-btn').addEventListener('click', function () {
            var video = document.querySelector('video');
            var canvas = document.createElement('canvas');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            var context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            var image = canvas.toDataURL('image/png');
            document.getElementById('image-input').value = image;


            document.getElementById('registration-form').submit();
        });
    </script>


    <form id="registration-form" action="{{ route('FaceId.submit') }}" method="POST">
        @csrf

    </form>
</body>
</html>
