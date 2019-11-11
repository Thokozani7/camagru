<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/login.css">
        <style type="text/css">
            .cam_canvas {
                margin: 0px auto;
                width: 500px;
                height: 375px;
                border: 10px #333 solid;
            }
            
            #canvas {
                width: 500px;
                height: 375px;
                background-color: #666;
            }
        </style>
    </head>
    <body bgcolor="skyblue">
        <div class="cam_canvas">
                 <video autoplay="true" id="canvas">
                 </video>
        </div>

        <script type="text/javascript">
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

        </script>
    </body>
</html>