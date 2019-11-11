<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/login.css">
        
    </head>
    <body bgcolor="skyblue">
        <div class="cam_canvas">
                 <video autoplay="true" id="vid">
                 </video>
                 <a href="#" id="capture" class="booth-capture" >Take photo</a>
                 <canvas id="canvas" width="500" height="375"></canvas>
        </div>

        <!-- <script type="text/javascript">
            var canvas = document.getElementById('canvas');
            var context = canvas.getContext('2d');
            var video = document.querySelector('video');
            const constraints = {
               video: {
                 width: 500, height: 375
               }
             };

             //connect to the webcam
            if (navigator.mediaDevices)
            {
               navigator.mediaDevices.getUserMedia(constraints)
               .then(function(stream) {
                   video.srcObject = stream;
                //    document.getElementById('snap').addEventListener("click", captureImage);
               })
               .catch(function(err) {
                   alert("could not access camera " + error.name);
               });
            }

            //capture the image
            function captureImage() {
               canvas.height = video.offsetHeight;
               canvas.width = video.offsetWidth;
               context.drawImage(video, 0, 0, canvas.width,canvas.height);
               document.getElementById('image').value = canvas.toDataURL('image/png');
            }

        </script> -->
        <script type="text/javascript">
        (function(){
            var video = document.getElementById('vid');
            var canvas = document.getElementById('canvas');
            var context = canvas.getContext('2d');
            var vendorUrl = window.URL || window.webkitURL;

            navigator.getMedia =    navigator.getUserMedia ||
                                    navigator.webkitGetUserMedia ||
                                    navigator.mozGetUserMedia ||
                                    navigator.msGetUserMedia;
            
            navigator.getMedia({
                video: true,
                audio: false
            }, function(stream){
                // video.srcObject = mediaSource;
                video.srcObject = stream;
                video.play();
            }, function(error){

            });
        document.getElementById('capture').addEventListener('click', function(){
            context.drawImage(video, 0, 0, 500, 375);
        });
        })();



        </script>
    </body>
</html>