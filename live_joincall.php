<?php
include('navbar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOIN LIVE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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

        .header {
            color: #000;
            font-family: NATS;
            font-size: 4vw;
            font-style: normal;
            font-weight: 400;
            line-height: 1.2;
            text-align: center;
            margin-bottom: 10px; /* Decreased margin-bottom */
        }

        .head {
            color: #000;
            font-family: NATS;
            font-size: 48px;
            font-style: normal;
            font-weight: 400;
            line-height: 1.2;
            text-align: center;
            margin-bottom: 20px; /* Kept margin-bottom for consistency */
        }

        .vid .video-player {
            width: 100%;
            height: 350px; /* Increased height of the video player */
            max-width: 1000px;
            border-radius: 50px;
            border-style: solid;
            background-color: currentColor;
            margin: auto;
            display: block;
        }

        /* Updated styling for red circle */
        .red-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #dc3545; /* Bootstrap red color */
        }

        .red-circle i {
            font-size: 24px;
            color: white;
        }

        .ready-to-join-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn-join {
            margin-bottom: 1px; /* Add margin to the bottom of the Join Call button */
        }

        /* Media query for smaller screens */
        @media (max-width: 768px) {
            .header {
                font-size: 6vw; /* Adjusted font size for smaller screens */
            }
        }
    </style>
</head>

<body>
    <div class="container py-3">
        <div class="row">
            <span class="header">Video call with Ronald Richards</span>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="row pt-2"> <!-- Decreased padding top for the row containing the video player -->
                    <div class="vid">
                        <video class="video-player" id="user-1" autoplay playsinline></video>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6 col-sm-3 col-lg-2 my-3 text-center">
                        <button type="button" class="CAM-But btn btn-danger" id="Btnn-1"> <!-- Updated with Bootstrap button classes -->
                            <div class="red-circle">
                                <i id="cameraIcon" class="bi bi-camera-video-off-fill"></i>
                            </div>
                        </button>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-2 my-3 text-center">
                        <button type="button" class="Mic-But btn btn-danger" id="Btnn-2"> <!-- Updated with Bootstrap button classes -->
                            <div class="red-circle">
                                <i id="microphoneIcon" class="bi bi-mic-mute"></i>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 d-flex justify-content-center align-items-center">
                <div class="container mb-5">
                    <div class="row">
                        <div class="col-12">
                            <span class="head text-center">
                                <span class="ready-to-join-container">
                                    <span class="ready-to-join" style="white-space: nowrap;">Ready to join?</span>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <a href="live_personalcall.php" class="me-2">
                                <button type="button" class="btn btn-lg btn-primary btn-join w-100">Join Call</button>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="live.php">
                                <button type="button" class="btn btn-lg btn-outline-primary w-100">Cancel</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    cameraIcon.classList.remove('bi-camera-video-fill');
                    cameraIcon.classList.add('bi-camera-video-off-fill');
                } else {
                    let stream = await navigator.mediaDevices.getUserMedia({ video: true });
                    videoElement.srcObject = stream;
                    cameraIcon.classList.remove('bi-camera-video-off-fill');
                    cameraIcon.classList.add('bi-camera-video-fill');
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
                    microphoneIcon.classList.remove('bi-mic-fill');
                    microphoneIcon.classList.add('bi-mic-mute');
                } else {
                    let stream = videoElement.srcObject;
                    let audioStream = await navigator.mediaDevices.getUserMedia({ audio: true });
                    audioStream.getAudioTracks().forEach(track => stream.addTrack(track));
                    microphoneIcon.classList.remove('bi-mic-mute');
                    microphoneIcon.classList.add('bi-mic-fill');
                }
                isMicrophoneOn = !isMicrophoneOn;
            } catch (error) {
                console.error('Error accessing the microphone:', error);
            }
        }

        toggleCameraButton.addEventListener('click', toggleCamera);
        toggleMicrophoneButton.addEventListener('click', toggleMicrophone);
    </script>
</body>

</html>
