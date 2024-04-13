<?php
include('navbar.php');
include('save_invite_code.php');
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel='stylesheet' type='text/css' media='screen' href='styles/main.css'>

    <link rel='stylesheet' type='text/css' media='screen' href='styles/room.css'>
    <title>LIVE CALL</title>
    <style>
        /* Style for video timer */
        .container_videotimer {
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            align-items: center;
            z-index: 999;
            justify-content: flex-end;
            width: 95%;
        }

        .red-dot {
            width: 10px;
            height: 10px;
            background-color: red;
            border-radius: 50%;
            animation: blink 1s infinite;
            margin-right: 10px;
        }

        .timer {
            font-size: 24px;
            color: white;
        }

        @keyframes blink {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        /* End Style for video timer */
    </style>

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

        ::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: white;
        }

        body {
            font-family: 'NATS', sans-serif;
            font-weight: 400;


        }

        .livecall_leftside {
            margin: 2rem;
            width: 625px;
            height: 400px;

        }

        .livecall_rightside {
            margin: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }




        .rightside_header {
            display: flex;
            gap: 1rem;
            align-items: center;
            justify-content: flex-end;
        }

        .mic_icon {
            padding: 0.5rem;
            padding-left: 0.7rem;
            padding-right: 0.7rem;
            background: rgba(175, 175, 175, 0.4);
            border-radius: 50%;
        }

        .live {
            width: 70.8px;
            height: 30.29px;
            background: linear-gradient(90deg, #2667FF -0.43%, #D553E7 100%);
            box-shadow: 0px 8px 24px rgba(176, 190, 197, 0.32), 0px 3px 5px rgba(176, 190, 197, 0.32);
            border-radius: 46px;
            color: white;
            text-align: center;
            font-size: 16px;
            padding-top: 0.2rem;
        }

        .eye {
            width: 70px;
            height: 30.38px;
            background: #676767;
            box-shadow: 0px 8px 24px rgba(176, 190, 197, 0.32), 0px 3px 5px rgba(176, 190, 197, 0.32);
            border-radius: 46px;
            display: flex;
            color: white;
            font-size: 20px;
            padding-left: 0.5rem;


        }

        .cross {
            position: relative;
            width: 41px;
            height: 41px;
            background: linear-gradient(90deg, #2667FF 10.19%, #D553E7 100%);
            color: white;
            border-radius: 50%;
            font-size: 30px;
            text-align: center;
            line-height: 41px;
        }

        .cross::before,
        .cross::after {
            content: '';
            position: absolute;
            width: 2px;
            height: 25px;
            background-color: white;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .cross::before {
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .cross::after {
            transform: translate(-50%, -50%) rotate(-45deg);
        }

        .rightside_main {
            display: flex width: 364px;
            height: 545px;
            background: #FFFFFF;
            border: 2px solid #F3F3FF;
            border-radius: 15px;
            position: relative;
            overflow-y: auto;
        }

        .chatbottom {
            bottom: 0px;
            position: absolute;
            display: flex;
            gap: 0.7rem;
            padding: 10px;
        }

        .meassage_input {
            width: 80%;
            height: 36px;
            background: #C9C9C9;
            border-radius: 8px;
            color: white;
            font-size: 20px;
            border: none;
            padding: 15px;
        }

        .thumb {
            width: 42px;
            height: 36px;
            background: #C9C9C9;
            backdrop-filter: blur(2.4px);
            border-radius: 50%;
            text-align: center;
            padding-top: 0.2rem;
        }

        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.6);
            transition: opacity 500ms;
            /* visibility: hidden; */
            opacity: 0;
        }

        .overlay:target {
            visibility: visible;
            opacity: 1;
        }

        .popup {

            margin: 290px;
            margin-left: 550px;
            padding: 20px;
            position: relative;
            transition: all 5s ease-in-out;
            width: 400px;
            height: 250px;
            background: #FFFFFF;
            border: 1.74869px solid #E4E4E4;
            box-shadow: 0px 5.24607px 6.99476px rgba(0, 0, 0, 0.09);
            border-radius: 31.4764px;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            align-items: center;
        }

        .popup_msg {
            width: 257px;
            height: 100px;
            display: flex;
            align-items: center;
            text-align: center;
            font-size: 40px;
        }

        .end {
            width: 130px;
            height: 46px;
            font-size: 25px;
            border: none;
            text-decoration: none;
            color: white;
            background-color: #FF0000;
            border-radius: 10px;

        }

        .cancel {

            width: 130px;
            height: 46px;
            font-size: 25px;
            color: #B636DF;
            background: #FFFFFF;
            border: 1px solid #B636DF;
            border-radius: 10px;

        }

        /* @media screen and (max-width: 1366px) {
        .popup {
            margin: 10%;
            margin-top: 50%;
            width: auto;
        }

        .live_call {
            display: flex;
            flex-direction: column;

            justify-content: flex-start;
            align-items: flex-start;

        }

        .pic_live {
            width: 85%;
            height: 80%;

        }

        .btn_endlive {
            width: auto;
            height: auto;
        }

        .end {
            width: auto;
            height: auto;
        }

        .cancel {
            width: auto;
            height: auto;
        }


    } */






        #stream__container {
            justify-self: center;
            width: 80vw;
            /* default width */
            max-width: calc(100% - 40.7rem);
            /* maximum width */
            position: fixed;
            left: 15.7rem;
            top: calc(100vh - 72px);
            overflow-y: auto;
            height: 100%;

        }


        #stream__box {
            background-color: #3f434a;
            width: 53vw;
            height: 85vh;
            display: block;
            background-image: url("<?= $DEFAULT_PATH ?>live/icons/live-cover-image.svg");
            background-repeat: no-repeat;
            background-size: cover;
            object-fit: cover;
        }

        #stream__box .video__container {
            border: 2px solid #000;
            border-radius: 0;
            height: 100% !important;
            width: 100% !important;

            background-size: 300px;
            border-radius: 15px;
        }

        #stream__box video {
            border-radius: 0;
        }

        #streams__container {
            display: flex;
            flex-wrap: wrap;
            gap: 2em;
            justify-content: center;
            align-items: center;
            margin-top: 25px;
            margin-bottom: 20px;
            width: 625px;
            height: 432px;
        }

        .video__container {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #b366f9;
            border-radius: 5%;
            cursor: pointer;
            overflow: hidden;
            height: 440px;
            width: 700px;

            background-image: url("/images/logo.png");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 75px;
        }

        .video-player {
            height: 100%;
            width: 100%;
        }

        .video-player video {
            border-radius: 5%;
        }

        #stream__box {
            position: relative;
            border-radius: 15px;
        }

        .stream__focus {
            width: 100%;
            height: 100%;
        }

        .stream__focus iframe {
            width: 100%;
            height: 100%;
        }



        .flex-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;


        }




        #join-btn {
            background-color: #845695;
            font-size: 18px;
            border: none;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            width: 75px;


        }

        #_messages {
            padding: 4px;
        }




        .message__wrapper:last-child {
            margin-bottom: 6.5rem;
        }

        .message__wrapper {
            display: flex;
            gap: 10px;
            margin: 1em;
            background: linear-gradient(180deg, #5362F9 0%, #D553E7 100%);
            border-radius: 39px;
        }

        .message__body {
            display: flex;
            border-radius: 10px;
            padding: 10px 15px;
            width: fit-content;
            max-width: 900px;
        }

        .message__body strong {
            font-weight: 600;
            color: #ede0e0;
        }

        .message__body__bot {
            display: flex;
            padding: 0 20px;
            max-width: 900px;
            color: #bdbdbd;
        }

        .message__author {
            margin-right: 10px;
            color: #2aca3e !important;
        }

        .message__author__bot {
            margin-right: 10px;
            color: #a52aca !important;
        }

        .message__text {
            margin: 0;
        }

        .message__timestamp {
            color: #707575;
            font-size: 12px;
            margin-top: 4px;
        }
    </style>


    <style>
        .live_call {
            display: flex;
            flex-direction: column;

            justify-content: flex-start;
            align-items: flex-start;

        }

        .container {
            display: flex;
            justify-content: flex-start;
            width: auto;
        }

        .box {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
            padding: 10px;
            width: auto;
        }

        .action-box {
            max-width: 753px;
            width: 100%;
        }

        .stream__actions {
            border-radius: 20px;
            /* padding: 1rem; */
            gap: 1rem;
            display: flex;
        }

        .stream__actions a,
        .stream__actions button {
            cursor: pointer;
            background-color: #A8AEBC;
            color: #fff;
            border: black;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.2s ease-in-out;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.25);
            height: 50px;
            width: 50px;
        }

        .stream__actions a svg,
        .stream__actions button svg {
            width: 1.5rem;
            height: 1.5rem;
            fill: #ede0e0;
        }

        .stream__actions a.active,
        .stream__actions button.active,
        .stream__actions a:hover,
        .stream__actions button:hover {
            background-color: #FF0000;
        }

        .btn_endlive {
            width: 176px;
            height: 45px;
            background: #FF0000;
            box-shadow: 0px 8px 24px rgba(176, 190, 197, 0.32), 0px 3px 5px rgba(176, 190, 197, 0.32);
            border-radius: 10px;
            border: none;
            color: white;

        }

        .video {
            max-width: 741px;
            max-height: 545px;
            width: 100%;
            height: auto;
        }

        .rightside_header {
            display: flex;
            gap: 1rem;
            align-items: center;
            justify-content: flex-end;
            max-width: 364px;
        }

        .live {
            width: 70.8px;
            height: 30.29px;
            background: linear-gradient(90deg, #2667FF -0.43%, #D553E7 100%);
            box-shadow: 0px 8px 24px rgba(176, 190, 197, 0.32), 0px 3px 5px rgba(176, 190, 197, 0.32);
            border-radius: 46px;
            color: white;
            text-align: center;
            font-size: 16px;
            padding-top: 0.2rem;
        }

        .eye {
            width: 70px;
            height: 30.38px;
            background: #676767;
            box-shadow: 0px 8px 24px rgba(176, 190, 197, 0.32), 0px 3px 5px rgba(176, 190, 197, 0.32);
            border-radius: 46px;
            display: flex;
            color: white;
            font-size: 20px;
            padding-left: 0.5rem;
        }

        .cross {
            position: absolute;
            width: 41px;
            height: 41px;
            background: linear-gradient(90deg, #2667FF 10.19%, #D553E7 100%);
            color: white;
            border-radius: 50%;
            font-size: 10px;
            text-align: center;
            line-height: 41px;
            padding: 5px;
        }

        .cross::before,
        .cross::after {
            content: '';
            position: absolute;
            width: 2px;
            height: 25px;
            background-color: white;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .cross::before {
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .cross::after {
            transform: translate(-50%, -50%) rotate(-45deg);
        }

        .chat-box {
            width: 100%;
            height: 500px;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow-y: auto;
        }

        .chat-box::-webkit-scrollbar {
            display: none;
        }

        .chat-box-outer {
            height: auto;
            max-height: 545px;
        }

        .message {
            margin: 10px;
            padding: 5px;
            background-color: #f2f2f2;
            border-radius: 5px;
            font-size: 14px;
        }


        .input-row {
            display: flex;
            align-items: center;
            padding-top: 10px;
            width: auto;
        }

        .text-field {
            flex-grow: 1;
            height: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
            font-size: 14px;
            width: auto;
            height: 36px;
            background: #C9C9C9;
            border-radius: 8px;
            color: white;
            font-size: 20px;
            border: none;
        }

        .emoji {
            margin-left: 10px;
            font-size: 24px;
            cursor: pointer;
        }

        .profile-box {
            display: flex;
            max-width: 741px;
            width: 100%;
            justify-content: flex-start;
        }

        .profile-picture {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .profile-picture-in-message {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .name {
            font-size: 16px;
            font-weight: bold;
            margin-top: auto;
            margin-bottom: auto;
        }

        #popup1 {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .popup {
            background-color: #fff;
            padding: 20px;
            max-width: 400px;
            text-align: center;
        }

        .popup_msg {
            margin-bottom: 20px;
        }

        .popup button {
            margin: 5px;
        }

        .vid .video-player {
            width: 600px;
            height: 340px;
            border-radius: 50px;
            border-style: solid;

        }


        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .box {
                padding: 5px;
            }

            .action-box,
            .video,
            .rightside_header,
            .chat-box,
            .chat-box-outer,
            .profile-box {
                max-width: none;
            }
        }

        #camera-btn {
            display: block !important;
        }


        @media screen and (min-width:751px) and (max-width: 1250px) {

            #stream__box {
                width: 75vw !important;
                /* height: 35vw; */
            }

            .chat-box {
                width: 50vw;
                height: 30vh;
            }
            .c1{
                display: flex;
                flex-direction: column;
            }

        }
        @media screen and (max-width: 750px) {
            .chat-box {
                width: 70vw;
                height: 30vh !important;
            } 
            .cross{
                top: 20vh;
            }
            .video-player{
                width: 85vw !important;
                height: 30vh !important;
            }
        }
        @media screen and (max-width: 600px) {
            .chat-box {
                display: flex;
                justify-content: center;
                width: 70vw;
                height: 20vh !important;
            } 
            .cross{
                top: 20vh;
            }
            #stream__box {
                width: 75vw !important;
                height: 20vh !important;
            }

            /* .video-player{
                display: flex;
                justify-content: center;
                width: 75vw !important;
                height: 20vh !important;
            } */
        }
    </style>

</head>

<body>
    <?php /*include('navbar.php');
    include('save_invite_code.php');*/ ?>
    <div class="live_call">
        <div class="container" style="padding-top: 10px;">
            <div class="box">
                <div class="profile-box">
                    <img src="./assets/images/live-user-default.svg" alt="Profile Picture" class="profile-picture">
                    <h3 class="name"><?php echo $_SESSION["name"]; ?></h3>
                </div>
            </div>
            <div class="box">
                <div class="rightside_header">
                    <!-- <img src="images/mic.png" style="width:13%" class="mic_icon"> -->
                    <span class="live">LIVE</span>
                    <span class="eye"><img src="<?= $DEFAULT_PATH ?>live/icons/eye-icon.svg" style="margin-right:0.3rem;width:40%;height:50%;margin-top:0.5rem">2k</span>
                    <a href="live.php">
                        <span class="cross"></span></a>
                </div>
            </div>
        </div>

        <div class="container">

            <?php
            // Check if the 'room' parameter exists in the URL
            //if (isset($_GET['room']) && isset($_GET['displayName']) && isset($_GET['meetingLink'])) {
            //$roomID = $_GET['room'];

            if (isset($_GET['displayName']) && isset($_GET['meetingLink'])) {
                $displayName = $_GET['displayName'];
                $meetingLink = $_GET['meetingLink'];

                // Display the room ID and copy button with enhanced styling
                echo '<div style="font-weight: bold; display: flex; align-items: center; ">';
                /*echo '  <label style="color: #8C68F8; padding-left: 20px;" for="roomid">Room ID : </label><span id="roomID" style="font-weight: bold; font-size: 18px; background-color: #f2f2f2; padding: 0px 12px; border-radius: 5px; margin-right: 10px;">' . $roomID . '</span>';
    echo '  <button onclick="copyRoomID()" style="font-size: 16px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; padding: 0px 12px; cursor: pointer;">Copy</button>';*/

                echo '  <label style="color: #8C68F8; padding-left: 20px;" for="meetingLink">Meeting Link : </label><span id="meetingLink" style="font-weight: bold; font-size: 18px; background-color: #f2f2f2; padding: 0px 12px; border-radius: 5px; margin-right: 10px;">' . '<a href="' . $DEFAULT_PATH . '/live_streaming.php/?displayName=' . $displayName . '&meetingLink=' . $meetingLink . '">' . $meetingLink . '</a>' . '</span>';
                echo '  <button onclick="copyMeetingLink()" style="font-size: 16px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; padding: 0px 12px; cursor: pointer;">Copy</button>';
                /*echo '<a href="'.$DEFAULT_PATH.'/live_streaming.php/?room='.$roomID.'&displayName='.$displayName.'&meetingLink='.$meetingLink.'">'.$meetingLink.'</a>';*/
                echo '</div>';

                // JavaScript function to copy the room ID and displayName to the clipboard
                /*echo '
    <script>
    function copyRoomID() {
        var roomIDSpan = document.getElementById("roomID");
        var roomID = roomIDSpan.textContent || roomIDSpan.innerText;

        var displayName = "' . $displayName . '";

        var tempInput = document.createElement("input");
        tempInput.value = "'. $DEFAULT_PATH .'live_streaming.php?room=" + roomID + "&displayName=" + encodeURIComponent(displayName);
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);

        alert("Room ID copied to clipboard: " + roomID + ", displayName: " + displayName);
    }
    </script>';*/
                echo '
        <script>
        function copyMeetingLink() {
            var meetingLinkSpan = document.getElementById("meetingLink");
            var meetingLink = meetingLinkSpan.textContent || meetingLinkSpan.innerText;

            var displayName = "' . $displayName . '";

            var tempInput = document.createElement("input");
            tempInput.value = "' . $DEFAULT_PATH . 'live_streaming.php?displayName=" + encodeURIComponent(displayName) + "&meetingLink=" + meetingLink;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);

            alert("Meeting link copied to clipboard: displayName: " + displayName + ", meetingLink:" + meetingLink);
        }
        </script>';
            } else {
                // Room ID or displayName parameter is missing
                header("Location: live.php");
                exit();
            }
            ?>

        </div>

        <div class="container c1">

            <div class="box">

                <div class="vid" style=" background-color: currentColor; height: 340px; border-radius: 50px; ">
                    <video class="video-player" id="user-1" autoplay playsinline></video>
                </div>
            </div>

            <div class="box">
                <form id="message__form">
                    <div class="chat-box-outer" style="">
                        <div class="chat-box">
                            <div id="_messages"></div>
                        </div>

                        <div class="input-row">
                            <input type="text" class="text-field meassage_input" id="myInputMessage" name="message" placeholder="Send a message....">
                            <button type="submit" class="btn btn-primary ms-3" id="myInputMessage">Send</button>
                            <span onclick="submitThumb()" class="emoji">👍</span>
                            <span onclick="submitEmoji()" class="emoji">🙂</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="box">
                <div class="action-box" style="display: flex;">
                    <div class="box">
                        <div class="stream__actions">
                            <div>
                                <button id="join-btn">join</button>
                            </div>

                            <button id="camera-btn" class="active">
                                <img src="<?= $DEFAULT_PATH ?>live/icons/video-icon.svg" alt="">
                            </button>

                            <button id="mic-btn" class="active">
                                <img src="<?= $DEFAULT_PATH ?>live/icons/audio-icon.svg" alt="">
                            </button>

                            <button id="screen-btn" style="background-color:white">
                                <img src="<?= $DEFAULT_PATH ?>live/icons/screenshare-icon.svg" alt="">
                            </button>


                        </div>
                    </div>
                    <div class="box"> <button id="btnEndLive" class="btn_endlive">End Live Video</button></div>
                </div>
            </div>
            <div class="box"></div>
        </div>
    </div>

    <div id="popup1" style="display: none;">
        <div class="popup">
            <div class="popup_msg">Are you sure you want to end the live video?</div>
            <div>
                <button id="btnEnd" class="end">End</button>
                <button id="btnCancel" class="cancel">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnEndLive = document.getElementById('btnEndLive');
            const overlay = document.getElementById('popup1');
            const btnCancel = document.getElementById('btnCancel');
            const btnEnd = document.getElementById('btnEnd');
            const cameraButton = document.getElementById('camera-btn');
            const videoElement = document.getElementById('user-1');
            const micButton = document.getElementById('mic-btn');
            let isCameraOn = false;
            let isMicOn = false;


            async function toggleCamera() {
                try {
                    if (!isCameraOn) {
                        let stream = await navigator.mediaDevices.getUserMedia({
                            video: true
                        });
                        videoElement.srcObject = stream;
                        isCameraOn = true;
                    } else {
                        let tracks = videoElement.srcObject.getTracks();
                        tracks.forEach(track => track.stop());
                        videoElement.srcObject = null;
                        isCameraOn = false;
                    }

                    cameraButton.classList.toggle('active');
                } catch (error) {
                    console.error('Error accessing the camera:', error);
                }
            }

            // Event listener for camera button
            cameraButton.addEventListener('click', toggleCamera);

            async function toggleMic() {
                try {
                    let stream = await navigator.mediaDevices.getUserMedia({
                        audio: true
                    });
                    if (!isMicOn) {
                        // Add the audio stream to the video stream if camera is on
                        if (isCameraOn) {
                            let videoStream = videoElement.srcObject;
                            videoStream.addTrack(stream.getAudioTracks()[0]);
                            videoElement.srcObject = videoStream;
                        }
                        isMicOn = true;
                    } else {
                        let tracks = stream.getTracks();
                        tracks.forEach(track => track.stop());
                        if (isCameraOn) {
                            let videoStream = videoElement.srcObject;
                            videoStream.removeTrack(stream.getAudioTracks()[0]);
                        }
                        isMicOn = false;
                    }

                    micButton.classList.toggle('active');
                } catch (error) {
                    console.error('Error accessing the microphone:', error);
                }
            }

            // Event listener for mic button
            micButton.addEventListener('click', toggleMic);


            // Open the popup when the button is clicked
            btnEndLive.addEventListener('click', function() {
                overlay.style.display = 'block';
            });

            // Close the popup when the cancel button is clicked
            btnCancel.addEventListener('click', function() {
                overlay.style.display = 'none';
            });

            // Close the popup, and redirect to live.php when the end button is clicked
            btnEnd.addEventListener('click', function() {
                overlay.style.display = 'none';
                window.location.href = 'live.php';
            });
        });
    </script>
    <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnEndLive = document.getElementById('btnEndLive');
        const overlay = document.getElementById('popup1');
        const btnCancel = document.getElementById('btnCancel');
        const btnEnd = document.getElementById('btnEnd');

        // Open the popup when the button is clicked
        btnEndLive.addEventListener('click', function() {
            overlay.style.display = 'block';
        });

        // Close the popup when the cancel button is clicked
        btnCancel.addEventListener('click', function() {
            overlay.style.display = 'none';
        });

        // Close the popup, and redirect to live.php when the end button is clicked
        btnEnd.addEventListener('click', function() {
            overlay.style.display = 'none';
            window.location = 'live.php';
        });
    });
    </script> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="<?= $DEFAULT_PATH ?>live/js/AgoraRTC_N-4.11.0.js"></script>
    <script type="text/javascript" src="<?= $DEFAULT_PATH ?>live/js/agora-rtm-sdk-1.4.4.js"></script>
    <script type="text/javascript" src="<?= $DEFAULT_PATH ?>live/js/room.js"></script>
    <script type="text/javascript" src="<?= $DEFAULT_PATH ?>live/js/room_rtm.js"></script>
    <script type="text/javascript" src="<?= $DEFAULT_PATH ?>live/js/room_rtc.js"></script>
    <script type="text/javascript" src="<?= $DEFAULT_PATH ?>live/js/lobby.js"></script>
    <script src="<?= $DEFAULT_PATH ?>live/js/timer.js"></script>

</body>

</html>
