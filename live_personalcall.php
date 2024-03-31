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
    <title>LIVE</title>
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

    body {
        font-family: 'NATS', sans-serif;
        font-weight: 400;

    }

    ::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #6D6D6D;
    }

    .live_personalcall {
        margin: 2rem;
        margin-left: 17rem;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .ronald {
        height: 100px;
        width: 100px;
    }

    #micon {
        background: #FF0000;
        border: none;
        border-radius: 50%;
        padding: 0.4rem;
        padding-left: 0.7rem;
        padding-right: 0.7rem;
    }

    #micoff {
        background: #FFFFFF;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.25);
        border: none;
        border-radius: 50%;
        padding: 0.4rem;
        padding-left: 0.5rem;
        padding-right: 0.5rem;

        display: none;
    }

    #cameraon {
        background: #FF0000;
        border: none;
        border-radius: 50%;
        padding: 0.4rem;
        padding-left: 0.6rem;
        padding-right: 0.6rem;

    }

    #cameraof {
        background: #FFFFFF;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.25);
        border: none;
        border-radius: 50%;
        padding: 0.4rem;
        padding-left: 0.5rem;
        padding-right: 0.5rem;

        display: none;
    }

    .buttons1 {
        display: flex;
        gap: 1.5rem;
        justify-content: left;
    }

    .bottom_buttons {
        display: flex;
        justify-content: space-between;
        width: 88%;
    }

    .leave {
        padding: 6px;
    }

    .leave_btn {
        width: 176px;
        height: 45px;
        background: #FF0000;
        box-shadow: 0px 8px 24px rgba(176, 190, 197, 0.32), 0px 3px 5px rgba(176, 190, 197, 0.32);
        border-radius: 10px;
        border: none;
        color: white;

    }

    .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.6);
        transition: opacity 500ms;
        visibility: hidden;
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
        width: 22vw;
        height: 10vw;
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

    .upload {
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        text-align: center;
        padding-top: 0.3rem;

        background: #FFFFFF;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.25);
    }

    .modal {
        position: fixed;


    }

    .modal-content {
        width: 364px;
        height: 545px;
        background: #FFFFFF;
        border: 2px solid #F3F3FF;
        border-radius: 20px;
        margin: 100px;
        margin-left: 950px;
        position: relative;
        display: flex;
        flex-direction: column;
        animation-duration: 2s;
        animation-name: slidein;

    }

    @keyframes slidein {
        from {
            margin-top: 100%;

        }

        to {
            margin-top: 100px;

        }
    }

    .chatmsg {
        bottom: 0px;
        position: absolute;
        display: flex;
        gap: 1.5rem;
        padding: 10px;
    }

    .msg {
        width: 253px;
        height: 43px;
        background: #F3F3F3;
        border-radius: 49px;
        display: flex;
        align-items: center;
        color: #6D6D6D;
        border: none;
        padding: 10px;
        padding-left: 20px;
    }

    .left_arrow {
        width: 43px;
        height: 43px;
        background: #F3F3F3;
        border-radius: 50%;
        text-align: center;
        padding-top: 0.5rem;
    }

    .modal_header {
        display: flex;
        justify-content: space-between;
        padding: 20px;
    }

    .incomingmsg {
        display: flex;
        justify-content: space-between;
        width: 321px;
        height: 56px;
        background: #FFFFFF;
        border: 1px solid #E9E9E9;
        border-radius: 39px;
        padding: 10px;
        margin: 20px;
        margin-top: 0px;
    }

    .outgoingmsg {
        width: 321px;
        height: 91px;
        background: #FFFFFF;
        border: 1px solid #E9E9E9;
        border-radius: 20px;
        padding: 10px;
        margin: 20px;
        margin-top: 0px;
    }




    @media screen and (max-width: 720px) {
        .popup {
            margin: 10%;
            margin-top: 50%;
            width: auto;
        }

        .modal-content {
            margin: 10%;
            margin-top: 50%;
            width: auto;
        }

        .incomingmsg {
            width: auto
        }

        .outgoingmsg {
            width: auto
        }

        .msg {
            width: auto;
        }

        .live_personalcall {
            margin-left: 2rem;

        }

        .ronald {
            height: 100%;
            width: 100%;
        }

        .bottom_buttons {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;

            align-items: center;
        }

        .leave_btn {
            margin-left: 4rem;
        }

        .buttons1 {
            display: flex;
            gap: 0.2rem;
        }


    }
    </style>
    <style>
    .local {
        width: 10vw;
        height: 7vw;
        background-color: #223344;
        top: 15px;
        right: 15px;
        z-index: 1;
    }

    .remote {
        width: 60vw;
        height: 35vw;
        background-color: currentColor;
    }

    .fa,
    .fas {
        font-size: 32px;
        padding: 13px;
        background-color: #FF0000;
        color: white;
        border-radius: 50%;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
        margin: 5px;
        width: 47px;
        height: 47px;
        font-size: 20px;
    }
    /* ::before,::after{
        margin-top: 2px;
        margin-left: 2px;
    } */

    .full {
        font-size: 24px;
        background-color: white;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .roomMessage {
        display: flex;
        align-items: center;
        width: 100%;
        height: 100%;
        background: burlywood;
        justify-content: center;
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
       
    }

    .popup button {
        margin: 5px;
    }
    .icons{
        margin-top: 2px;
        margin-left: 2px;
    }
    </style>
</head>

<body>
    <div class="live_personalcall">
        <div style="display:flex;gap:1rem"><img src="<?=$DEFAULT_PATH?>assets/images/live-user-default.svg"
                style="width: 40.91px;height: 40.91px;border-radius:50%"> <span style="font-size:30px">John Wayne</span>
        </div>
        <div class="d-flex w-100 p-2" style="justify-content: center; ">

            <div class="p-2 rounded shadow-lg position-relative">
                <div id="local" class="d-flex p-1 justify-content-center rounded position-absolute local shadow-lg ">
                </div>
                <div id="remote" class="d-flex p-1 justify-content-center rounded remote shaow-lg "></div>
                <div class="d-flex justify-content-between">
                    <div class="icons">
                        <i class="fa fa-video-slash" id="btnCam" aria-hidden="true"></i>
                        <i class="fa fa-microphone-slash" id="btnMic" aria-hidden="true"></i>
                        <i class="fa fas fa-plug" id="btnPlug" aria-hidden="true"></i>
                    </div>
                    <div class="leave">

                        <button button id="btnEndLive" class="leave_btn btn_endlive">Leave</button>

                    </div>
                </div>

            </div>

        </div>

        <!------------------------------POPUP-------->
        <div id="popup1" style="display: none;">
            <div class="popup" style="">
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
                window.location.href = 'chat_home.php';
            });
        });
        </script>

        <!------------------------------POPUP-------->

        <!-----------    CHAT POPUP-------->
        <div id="myModal" class="modal">

            <!--Modal content-->
            <div class="modal-content">
                <div class="modal_header">
                    <h3>In-call messages</h3>
                    <span class="close" style="font-size:30px;cursor:pointer">&times;</span>
                </div>

                <div class="incomingmsg">
                    <div style="display:flex;gap:1rem"><img src="<?=$DEFAULT_PATH?>assets/images/live-user-default.svg"
                            style="width: 35.91px;height: 35.91px;border-radius:50%"> <span
                            style="font-size:20px;margin-top:0.2rem;">Hello !</span></div>
                    <div style="color: #6D6D6D;font-size: 10px;padding-right:10px;display:flex;align-items:center">16:36
                    </div>
                </div>

                <div class="outgoingmsg">
                    <span style="color: #6D6D6D;font-size: 10px">16:36</span>
                    <div style="display:flex;justify-content:space-between;">
                        <div> <span>Hello!</span><br> <span>Can you send me the docs!</span></div>
                        <div><img src="<?=$DEFAULT_PATH?>assets/images/live-user-default.svg"
                                style="width: 35.91px;height: 35.91px;border-radius:50%"></div>
                    </div>
                </div>
                <div class="chatmsg">
                    <input type="text" class="msg" placeholder="Send a message">
                    <div class="left_arrow"><img src="images/left_arrow.png" alt=""></div>
                </div>

            </div>

        </div>



        <!-----------    CHAT POPUP-------->

        <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("popup_btn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {

            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="<?=$DEFAULT_PATH?>live/js/AgoraRTC_N-4.11.0.js"></script>
        <script type="text/javascript" src="<?=$DEFAULT_PATH?>live/js/call.js"></script>
</body>

</html>
