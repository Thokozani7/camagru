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

                 <form action="includes/save.php" method="POST">
                    <input type="hidden" id="image" name="save_image" >
                    <input type="submit" id = "save_btn" name="save_pic" value="SAVE">
                 </form>

        </div>

        <div id='stickers' class="StickersHolder">
            <button id="frame" class="stickerContainer">
                <img id="frame1" class="sticker" src="img/stickers/frame.png" />
            </button>
            <button id="poop" class="stickerContainer">
                <img id="poop1" class="sticker" src="img/stickers/poop.jpg" />
            </button>
            <button id="sponge" class="stickerContainer">
                <img id="sponge1" class="sticker" src="img/stickers/sponge.jpeg" />
            </button>
            <button id="sumFull" class="stickerContainer">
                <img id="sumFull1" class="sticker" src="img/stickers/sumFull.jpeg" />
            </button>
            <button id="sumsung" class="stickerContainer">
                <img id="sumsung1" class="sticker" src="img/stickers/sumsung.jpeg" />
            </button>
            <button id="art" class="stickerContainer">
                <img id="art1" class="sticker" src="img/stickers/art.png" />
            </button>
            <button id="glitter" class="stickerContainer">
                <img id="glitter1" class="sticker" src="img/stickers/glitter.jpg" />
            </button>
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
               document.getElementById('image').value = canvas.toDataURL('image/jpeg');
            }

        </script> -->
        <script type="text/javascript">
        (function(){
            var vid = document.getElementById('vid');
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
                vid.srcObject = stream;
                vid.play();
            }, function(error){

            });

        document.getElementById('capture').addEventListener('click', captureImage);

        document.getElementById('frame').addEventListener('click', function() {
             context.drawImage(document.getElementById('frame1'), 0, 0, 70,80);
             document.getElementById('image').value = canvas.toDataURL('image/jpeg');
             });
        document.getElementById('poop').addEventListener('click', function() {
            context.drawImage(document.getElementById('poop1'), 0, 0, 70,80);
            document.getElementById('image').value = canvas.toDataURL('image/jpeg');
            });
        document.getElementById('sponge').addEventListener('click',function() {
            context.drawImage(document.getElementById('sponge1'), 0, 0, 70,80);
            document.getElementById('image').value = canvas.toDataURL('image/jpeg');
            });
        document.getElementById('sumFull').addEventListener('click', function() {
            context.drawImage(document.getElementById('sumFull1'), 0, 0, 70,80);
            document.getElementById('image').value = canvas.toDataURL('image/jpeg');
            });
        document.getElementById('sumsung').addEventListener('click', function() {
            context.drawImage(document.getElementById('sumsung1'), 0, 0, 70,80);
            document.getElementById('image').value = canvas.toDataURL('image/jpeg');
            });
        document.getElementById('art').addEventListener('click', function() {
            context.drawImage(document.getElementById('art1'), 0, 0, 70,80);
            document.getElementById('image').value = canvas.toDataURL('image/jpeg');
            });
        document.getElementById('glitter').addEventListener('click', function() {
            context.drawImage(document.getElementById('glitter1'), 0, 0, 70,80);
            document.getElementById('image').value = canvas.toDataURL('image/jpeg');
            });
        

        var canvas = document.getElementById('canvas');

        function captureImage() {
//    canvas.height = video.offsetHeight;
//    canvas.width = video.offsetWidth;
   context.drawImage(vid, 0, 0, 500,375);
   document.getElementById('image').value = canvas.toDataURL('image/jpeg');
}

        
// NEED TO FIX MY AJAX >>> <<<
        // alert("hey");
        // $.ajax({
        // type: "POST",
        // url:  Drupal.settings.basePath + "includes/save.php",
        // data: { 
        //    imgBase64: dataURL
        // }
        // })

        })();



        </script>
    </body>
</html>