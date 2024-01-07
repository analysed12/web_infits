<?php
include('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <title>JOIN LIVE</title>
    <style>
    @font-face {
        font-family: 'NATS';
        src: url('font/NATS.ttf.woff') format('woff'),
            url('font/NATS.ttf.svg#NATS') format('svg'),
            url('font/NATS.ttf.eot'),
            url('font/NATS.ttf.eot?#iefix') format('embedded-opentype');
        font-weight: normal;
        font-style: normal;
    }

    .header{
        color: #000;
        font-family: NATS;
        font-size: 48px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px; /* 50% */
    }  

    .head{
        color: #000;
        font-family: NATS;
        font-size: 48px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px; /* 50% */
    }

    .vid .video-player{ 
        width: 545px;
        /*height: 375px;*/
        border-radius: 50px;
        border-style: solid;
        
    }
        
    .my-3 .CAM-But{
        background-color: white;
        border-style: hidden;
    }
    .my-3 .Mic-But{
        background-color: white;
        border-style: hidden;

    }

    </style>

    
</head>
<body>
    <div class="container py-3">
        <div class="row p-4">
            <span class="header">Video call with Ronald Richards </span>
        </div>
    </div>

    <div class="container">
        <div class="row px-5 d-flex justify-content-center">
            <div class="col-md-6 ">
                <div class="row pt-4">
                    <div class="vid">
                        <video class="video-player" id="user-1" autoplay playsinline></video>
                        <!-- <img src="./assets/images/Rectangle.png" alt=""> -->
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <span class="mx-2 my-3">
                            <button type="button" class="CAM-But" id="Btnn-1"><img id="cameraIcon" src="assets/icons/cam-onn.png" alt="Camera On"></button>
                        </span>
                        <span class="mx-2 my-3">
                            <button type="button" class="Mic-But" id="Btnn-2"><img id="microphoneIcon" src="assets/icons/mic-onn.png" alt="Microphone On"></button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="container mb-5 ms-5 ps-5">
                    <div class="row">
                        <span class="head text-center">Ready to join?</span>
                    </div>
                    <div class="row">
                        <span class="text-center mt-4">
                            <a href="join_call.php"><button type="button" class="btn btn-lg btn-primary mx-2" style="background-color:#4B9AFB">Join Call </button>
                            <button type="button" class="btn btn-lg" style="border:1px solid #4B9AFB">Cancel</button>
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
<script>
    let isCameraOn = false;
    let isMicrophoneOn = false;
    let videoElement = document.getElementById('user-1');
    let toggleCameraButton = document.getElementById('Btnn-1');
    let toggleMicrophoneButton = document.getElementById('Btnn-2');
    let cameraIcon = document.getElementById('cameraIcon');
    let microphoneIcon = document.getElementById('microphoneIcon');

    
    async function toggleCamera() {
      try {
        if (isCameraOn) {
          
          let tracks = videoElement.srcObject.getTracks();
          tracks.forEach(track => track.stop());
          videoElement.srcObject = null;
          
          cameraIcon.src = "assets/icons/cam-off.png";
        } else {
          
          let stream = await navigator.mediaDevices.getUserMedia({ video: true });
          videoElement.srcObject = stream;
          
          cameraIcon.src = "assets/icons/cam-onn.png";
        }

        
        isCameraOn = !isCameraOn;
      } catch (error) {
        console.error('Error accessing the camera:', error);
      }
    }

    
    async function toggleMicrophone() {
      try {
        if (isMicrophoneOn) {
          
          let tracks = videoElement.srcObject.getAudioTracks();
          tracks.forEach(track => track.stop());
          
          microphoneIcon.src = "assets/icons/mic-off.png";
        } else {
          
          let stream = videoElement.srcObject;
          let audioStream = await navigator.mediaDevices.getUserMedia({ audio: true });
          audioStream.getAudioTracks().forEach(track => stream.addTrack(track));
          
          microphoneIcon.src = "assets/icons/mic-onn.png";
        }

        
        isMicrophoneOn = !isMicrophoneOn;
      } catch (error) {
        console.error('Error accessing the microphone:', error);
      }
    }

    
    toggleCameraButton.addEventListener('click', toggleCamera);

    
    toggleMicrophoneButton.addEventListener('click', toggleMicrophone);

</script>

</html>