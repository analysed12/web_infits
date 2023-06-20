<?php
ob_start();

include 'navbar.php';


if (isset($_SESSION['dietitianuserID'])) {
    # database connection file
    include 'assets/app/db.conn.php';

    include 'assets/app/helpers/user.php';
    include 'assets/app/helpers/chat.php';
    include 'assets/app/helpers/opened.php';

    include 'assets/app/helpers/timeAgo.php';
    include 'assets/app/helpers/timeHM.php';

    include 'assets/app/helpers/conversations.php';

    include 'assets/app/helpers/last_chat.php';

    # Getting User data data
    $user = getUser($_SESSION['dietitianuserID'], $conn);

    # Getting User conversations
    $conversations = getConversation($user['dietitian_id'], $conn);

    if (!isset($_GET['user'])) {
        header("Location: chat_home.php");
        exit;
    }

    # Getting User data data
    $chatWith = getClient($_GET['user'], $conn);

    if (empty($chatWith)) {
        header("Location: chat_home.php");
        exit;
    }

    $chats = getChats($_SESSION['dietitian_id'], $chatWith['client_id'], $conn);

    opened($chatWith['client_id'], $conn, $chats);

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chat App</title>
        <?php require('constant/head.php'); ?>
        <link rel="stylesheet" href="<?= $DEFAULT_PATH ?>assets/css/chat_style.css">
        <link rel="icon" href="images/logo.png">

        <style>
            .back_btn {
                display: none;
            }

            .hide-input {
                position: absolute;
                top: 0;
                left: 0;
                opacity: 0;
                width: 0;
                height: 0;
                visibility: hidden;
            }

            .w-300 {
                width: 300px !important;
            }

            .search__div {
                border-radius: 0.6rem;
                padding: 3px;
                background: white;
                box-shadow: 0.6px 0.6px 2px 1px #ccc;
                color: #BBBBBB;

            }

            ::placeholder {
                /* Chrome, Firefox, Opera, Safari 10.1+ */
                color: #BBBBBB;
                opacity: 1;
                /* Firefox */
            }

            @media (min-width: 76px) and (max-width: 767.99px) {
                div.d-flex.flex-coloumn.vh-100.chat {
                    outline: none !important;
                }
            }

            @media (min-width: 75px) {
                body {
                    overflow-x: hidden !important;
                }

                .vh-100 {
                    height: 25% !important;
                }
            }


            @media (min-width: 215px) and (max-width: 387.98px) {


                .vh-100 {
                    min-height: 50px !important;
                }

                .d-flex.flex-row {
                    margin: 0;
                    height: 100%;
                    display: flex !important;
                    flex-direction: column !important;
                    overflow: hidden !important;
                    /* width:665px !important; */
                }

                d-flex.flex-column.flex-fill.chat {
                    /* margin-top: -250px !important;  */
                    width: 95% !important;
                    align-self: center !important;
                }

                div.d-flex.flex-coloumn.vh-100.chat {
                    /* margin-top: -230px !important;  */
                    width: 95% !important;
                    align-self: center !important;
                    outline: none !important;
                }

                div.w-300 {
                    width: 95% !important;
                    align-self: center !important;
                    /* margin-top: 80px; */
                }

                .scroll {
                    overflow-y: auto !important;
                    max-height: 120px;
                    display: none;
                }

                .chat-box {
                    overflow-y: auto;
                    overflow-x: hidden;
                    max-height: 310px;
                }

                .chat {
                    /* margin-top: -110px !important; */
                    padding: 11px !important;
                }

                .d-flex.flex-row.justify-content-between {
                    display: flex !important;
                    flex-direction: row !important;
                }
            }

            @media (max-width: 575.98px) and (min-width: 375px) {
                .back_btn {
                    display: block;
                    border: none;
                    background-color: #6883FB;
                    border-radius: 10px;
                    color: #FFFFFF;
                    padding: 7px;
                    margin-left: 5px;
                    font-size: 14px;
                }

                /* CSS rules for extra small screens */

                .d-flex.flex-row {
                    height: 100%;
                    display: flex !important;
                    flex-direction: column !important;
                    overflow: hidden !important;
                }

                .vh-100 {
                    min-height: 100px !important;
                }

                d-flex.flex-column.flex-fill.chat {
                    width: 95% !important;
                    align-self: center !important;
                }

                div.d-flex.flex-coloumn.vh-100.chat {
                    width: 95% !important;
                    align-self: center !important;
                    outline: none !important;
                }

                div.w-300 {
                    width: 95% !important;
                    align-self: center !important;
                }

                .d-flex .search__div {
                    display: none;
                }

                .scroll {
                    overflow-y: auto !important;
                    max-height: 150px;
                    display: none;
                }

                .chat {
                    padding: 11px !important;
                }

                .chat-box {
                    overflow-y: auto;
                    overflow-x: hidden;
                    max-height: 396px;
                }

                .d-flex.flex-row.justify-content-between {
                    display: flex !important;
                    flex-direction: row !important;
                }
            }

            @media (min-width: 576px) and (max-width: 871px) {
                .back_btn {
                    display: block;
                    border: none;
                    background-color: #6883FB;
                    border-radius: 10px;
                    color: #FFFFFF;
                    padding: 7px;
                    margin-left: 5px
                }

                .d-flex.flex-row {
                    height: 100%;
                    display: flex !important;
                    flex-direction: column !important;
                }

                d-flex.flex-column.flex-fill.chat {

                    width: 95% !important;
                    align-self: center !important;
                }

                .chat-box {
                    overflow-y: auto;
                    overflow-x: hidden;
                    max-height: 450px;
                }

                .chat {
                    padding: 11px !important;
                }

                .scroll {
                    overflow-y: auto !important;
                    max-height: 150px;
                    display: none;
                }

                .d-flex.mb-2.p-2.justify-content-between {
                    align-items: center !important;
                }

                div.w-300 {
                    width: 145% !important;
                    align-self: center !important;
                }

                .vh-100 {
                    min-height: 100px !important;
                }

                .d-flex.flex-row.justify-content-between {
                    display: flex !important;
                    flex-direction: row !important;
                }
            }
        </style>

        </style>
    </head>

    <body style="overflow: hidden">
        <div class="d-flex flex-row" style="margin: 0; height: 100%; overflow: hidden">

            <div class="d-flex
                flex-coloumn
                vh-100 chat" style="outline: 2px solid #EEEEEE; padding:10px!important;">
                <div class="w-300">
                    <div class="w-1st" style="margin-left:1rem;">
                        <div class="d-flex
                        mb-2 p-2 
                        justify-content-between
                        ">
                            <div class="mt-1">
                                <h5 class="chat-message-header" style="">Messages</h5>
                            </div>
                        </div>
                        <div class="input-group mb-3  d-flex align-items-center search__div">
                            <button class="btn  grey-color text-secondary"
                                style="background: white !important; border:none;" id="serachBtn">
                                <i class="fa fa-search"></i>
                            </button>
                            <input type="text" placeholder="Search" id="searchText"
                                style="background: white !important; border:none;" class="form-control bg-light ">
                        </div>
                        <div class="scroll">

                            <ul id="chatList" class="list-group mvh-50">
                                <?php //if (!empty($conversations)) { ?>
                                <?php

                                foreach ($conversations as $conversation) { ?>
                                    <li class="list-group-item">
                                        <a href="chat_messages.php?user=<?= $conversation['dietitianuserID'] ?>" class="d-flex
                                  justify-content-between
                                  align-items-center">
                                            <div class="d-flex
                                        align-items-center">
                                                <img src="https://dietitian.infits.in/assets/images/client_profile.svg"
                                                    class="rounded-circle" style="width:40px">
                                                <h3 class="fs-xs m-2 text-dark">
                                                    <?= $conversation['name'] ?><br>
                                                    <small>
                                                        <?php
                                                        echo lastChat($_SESSION['dietitian_id'], $conversation['client_id'], $conn);
                                                        ?>
                                                    </small>

                                                </h3>
                                            </div>
                                            <div class="d-flex
                                        align-items-center " style="margin-left: auto;">
                                                <h3 class="fs-xs p-2 text-dark">

                                                    <small>
                                                        <?php
                                                        echo last_time($conversation['last_seen']);
                                                        ?>
                                                    </small><br />
                                                    <img class="" src="<?= $DEFAULT_PATH ?>assets/icons/DoubleTick.svg"
                                                        style="width:16px">
                                                </h3>


                                            </div>
                                            <?php if (last_seen($conversation['last_seen']) == "1") { ?>
                                                <div title="online">

                                                </div>
                                            <?php } else { ?>
                                                <div title="offline">
                                                </div>
                                            <?php } ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <script>
                    $(document).ready(function () {

                        // Search
                        $("#searchText").on("input", function () {
                            var searchText = $(this).val();
                            if (searchText == "") return;
                            $.post('assets/app/ajax/search.php', {
                                key: searchText
                            },
                                function (data, status) {
                                    $("#chatList").html(data);
                                });
                        });

                        // Search using the button
                        $("#serachBtn").on("click", function () {
                            var searchText = $("#searchText").val();
                            if (searchText == "") return;
                            $.post('assets/app/ajax/search.php', {
                                key: searchText
                            },
                                function (data, status) {
                                    $("#chatList").html(data);
                                });
                        });


                        /** 
                        auto update last seen 
                        for logged in user
                        **/
                        let lastSeenUpdate = function () {
                            $.get("assets/app/ajax/update_last_seen.php");
                        }
                        lastSeenUpdate();
                        /** 
                        auto update last seen 
                        every 10 sec
                        **/
                        setInterval(lastSeenUpdate, 10000);

                    });
                </script>
            </div>
            <div class="d-flex flex-column
                flex-fill
              chat">
                <div class="  d-inline-block p-2 flex-fill justify-content-between chat">
                    <div class="d-flex flex-row justify-content-between  mx-4">
                        <div class="d-flex  align-items-center  ">
                            <img src="https://dietitian.infits.in/assets/images/client_profile.svg" class="rounded-circle"
                                style="width:50px">

                            <h6 class="display-4 fs-sm m-2">
                                <?= $chatWith['name'] ?> <br>
                                <div class="d-flex
                                 align-items-center" title="online">
                                    <?php
                                    if (last_seen($chatWith['last_seen']) == "1") {
                                        ?>

                                        <div class="fs-xs p-1 online-text" style="color: #0177FD">Online</div>
                                    <?php } else { ?>
                                        <small
                                            style="font-size:14px !important; font-weight:400 !important; font-family: 'NATS';font-style: normal;"
                                            class="d-block ">
                                            Last seen:
                                            <?= last_seen($chatWith['last_seen']) ?>
                                        </small>
                                    <?php } ?>
                                </div>

                            </h6>

                        </div>

                        <div class="d-flex  align-items-center ">
                            <div onclick="videocall('<?= $chatWith['clientuserID'] ?>', '<?= $_SESSION['name'] ?>')">
                                <img class="" src="<?= $DEFAULT_PATH ?>assets/icons/videocall.svg"
                                    style="width:20px;margin-right:24px; cursor: pointer;" />
                            </div>
                            <img class=" " src="<?= $DEFAULT_PATH ?>assets/icons/vector-i.svg"
                                style="width:20px;margin-right:5px; cursor: pointer;">
                            <button class="back_btn" onclick="history.back()">Go Back</button>
                        </div>
                    </div>
                    <div d-flex>
                        <div class=" p-4  rounded
                       d-flex flex-column
                       mt-2  chat-box" id="chatBox">
                            <?php
                            if (!empty($chats)) {
                                foreach ($chats as $chat) {
                                    if ($chat['from_id'] == $_SESSION['dietitian_id']) { ?>
                                        <?php if (substr($chat['message'], 0, 4) == "IMG-") { ?>

                                            <p class="rtext align-self-end">

                                                <img src="<?= $DEFAULT_PATH ?>assets/images/<?= $chat['message'] ?>"
                                                    style="max-width: 250px">
                                                <small class="d-block mt-2">
                                                    <?= last_time($chat['created_at']) ?>
                                                </small>
                                            </p>
                                        <?php } else { ?>
                                            <p class="rtext align-self-end">
                                                <?= $chat['message'] ?>
                                                <small class="d-block">
                                                    <?= last_time($chat['created_at']) ?>
                                                </small>
                                            </p>
                                        <?php }
                                        ?>


                                    <?php } else { ?>
                                        <?php if (substr($chat['message'], 0, 4) == "IMG-") { ?>

                                            <p class="ltext align-self-start">

                                                <img src="<?= $DEFAULT_PATH ?>assets/images/<?= $chat['message'] ?>"
                                                    style="max-width: 250px">
                                                <small class="d-block mt-2">
                                                    <?= last_time($chat['created_at']) ?>
                                                </small>
                                            </p>
                                        <?php } else { ?>
                                            <p class="ltext align-self-end">
                                                <?= $chat['message'] ?>
                                                <small class="d-block">
                                                    <?= last_time($chat['created_at']) ?>
                                                </small>
                                            </p>
                                        <?php }
                                        ?>

                                    <?php }
                                }
                            } else { ?>
                                <div class="alert alert-info 
                                text-center">
                                    <i class="fa fa-comments d-block fs-big"></i>
                                    No messages yet, Start the conversation
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="input-group align-items-center chat-end-align ">

                        <form id="form_input" action="assets/app/ajax/upload.php" method="post"
                            enctype="multipart/form-data">

                            <label for="file-input" class="file-input-label" style="margin-left: 20px; cursor: pointer;">

                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.28803 7.61053C1.16352 7.48601 1.09357 7.31713 1.09357 7.14103C1.09357 6.96494 1.16352 6.79606 1.28803 6.67153L5.98203 1.98053C6.41129 1.54024 6.92371 1.18956 7.48955 0.948841C8.05539 0.708119 8.6634 0.582142 9.2783 0.57822C9.89321 0.574297 10.5028 0.692506 11.0716 0.925989C11.6405 1.15947 12.1573 1.50358 12.5922 1.93836C13.027 2.37314 13.3712 2.88994 13.6048 3.45877C13.8384 4.0276 13.9567 4.63714 13.9528 5.25205C13.949 5.86696 13.8231 6.47498 13.5825 7.04086C13.3419 7.60674 12.9913 8.1192 12.551 8.54853L6.45103 14.6485C5.82609 15.2579 4.9862 15.5965 4.11335 15.5909C3.2405 15.5853 2.40502 15.236 1.78794 14.6186C1.17086 14.0013 0.821903 13.1657 0.816679 12.2928C0.811456 11.42 1.15039 10.5802 1.76003 9.95553L6.92103 4.79453C7.29596 4.42855 7.80004 4.2251 8.32398 4.22831C8.84791 4.23152 9.34947 4.44112 9.71988 4.81168C10.0903 5.18223 10.2997 5.68385 10.3028 6.20779C10.3058 6.73172 10.1021 7.23573 9.73603 7.61053L5.98203 11.3635C5.85765 11.4879 5.68894 11.5578 5.51303 11.5578C5.33712 11.5578 5.16842 11.4879 5.04403 11.3635C4.91965 11.2391 4.84977 11.0704 4.84977 10.8945C4.84977 10.7186 4.91965 10.5499 5.04403 10.4255L8.79703 6.67153C8.85862 6.60994 8.90748 6.53683 8.94081 6.45635C8.97414 6.37588 8.9913 6.28963 8.9913 6.20253C8.9913 6.11543 8.97414 6.02918 8.94081 5.94871C8.90748 5.86824 8.85862 5.79512 8.79703 5.73353C8.73544 5.67194 8.66232 5.62309 8.58185 5.58976C8.50138 5.55642 8.41513 5.53927 8.32803 5.53927C8.24093 5.53927 8.15468 5.55642 8.07421 5.58976C7.99374 5.62309 7.92062 5.67194 7.85903 5.73353L2.69803 10.8945C2.32474 11.2678 2.11503 11.7741 2.11503 12.302C2.11503 12.5634 2.16651 12.8223 2.26654 13.0638C2.36658 13.3053 2.5132 13.5247 2.69803 13.7095C2.88287 13.8944 3.1023 14.041 3.3438 14.141C3.5853 14.2411 3.84414 14.2925 4.10553 14.2925C4.63345 14.2925 5.13974 14.0828 5.51303 13.7095L11.613 7.60953C11.9333 7.30423 12.1892 6.93796 12.3658 6.53228C12.5424 6.12659 12.636 5.68969 12.6413 5.24727C12.6465 4.80485 12.5632 4.36585 12.3963 3.95611C12.2293 3.54636 11.9821 3.17414 11.6692 2.86135C11.3563 2.54855 10.9839 2.30151 10.5741 2.13474C10.1643 1.96797 9.72527 1.88486 9.28286 1.89028C8.84044 1.8957 8.40357 1.98955 7.99797 2.16631C7.59236 2.34307 7.2262 2.59917 6.92103 2.91953L2.22903 7.61053C2.10455 7.73474 1.93588 7.8045 1.76003 7.8045C1.58418 7.8045 1.41551 7.73474 1.29103 7.61053"
                                        fill="black" fill-opacity="0.45" />
                                </svg>

                            </label>
                            <input type="file" id="file-input" name="my_image" class="hide_input" style="position: absolute;top: 0;
                                left: 0;
                                opacity: 0;
                                width: 0;
                                height: 0;
                                visibility: hidden;">

                            <input type="hidden" name="to_id" value="<?= $chatWith['client_id'] ?>">

                        </form>

                        <input type="text" id="message" class="form-control rounded-pill m-3 align-items-center "
                            style="height: 50px;"></input>
                        <button class="btn text-primary " styles="color: #0177FD!importtant;" id="sendBtn">
                            Send Message

                        </button>
                    </div>
                </div>
                <?php require('constant/scripts.php'); ?>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <script>
                    function videocall(user, display_name) {
                        console.log("helloooooooo")
                        console.log(user);
                        sessionStorage.setItem('display_name', display_name);


                        window.location = `./live_streaming.php?room=${user}`;
                        console.log(user);

                    }


                    var scrollDown = function () {
                        let chatBox = document.getElementById('chatBox');
                        chatBox.scrollTop = chatBox.scrollHeight;
                    }

                    scrollDown();

                    // Get the file input field
                    var fileInput = document.getElementById("file-input");

                    // When the file input field changes, submit the form
                    fileInput.addEventListener("change", function () {
                        document.getElementById("form_input").submit();
                    });

                    $(document).ready(function () {

                        $("#sendBtn").on('click', function () {
                            console.log("sendBtn works");
                            message = $("#message").val();
                            if (message == "") return;

                            $.post("assets/app/ajax/insert.php", {
                                message: message,
                                to_id: <?= $chatWith['client_id'] ?>,
                            },
                                function (data, status) {
                                    $("#message").val("");
                                    $("#chatBox").append(data);
                                    scrollDown();
                                });
                        });

                        $("#photoBtn").on('click', function () {
                            console.log("photoBtn works")
                            var imageInput = $('input[type="file"]#image');
                            console.log(imageInput);
                            var formData = new FormData();

                            formData.append('my_image', imageInput);
                            formData.append('to_id', <?= $chatWith['client_id'] ?>);
                            console.log(imageInput);

                            $.post("assets/app/ajax/upload.php", {
                                my_image: imageInput,
                                to_id: <?= $chatWith['client_id'] ?>
                            },
                                function (data, status) {
                                    console.log("no error");
                                    $("#image").val("");
                                });
                        });

                        /** 
                        auto update last seen 
                        for logged in user
                        **/
                        let lastSeenUpdate = function () {
                            $.get("assets/app/ajax/update_last_seen.php");
                        }
                        lastSeenUpdate();
                        /** 
                        auto update last seen 
                        every 10 sec
                        **/
                        setInterval(lastSeenUpdate, 10000);

                        // auto refresh / reload
                        let fechData = function () {
                            $.post("assets/app/ajax/getMessage.php", {
                                id_2: <?= $chatWith['client_id'] ?>
                            },
                                function (data, status) {
                                    $("#chatBox").append(data);
                                    if (data != "") scrollDown();
                                });
                        }

                        fechData();
                        /** 
                        auto update last seen 
                        every 0.5 sec
                        **/
                        setInterval(fechData, 500);

                    });
                </script>
            </div>

        </div>

    </body>

    </html>
    <?php
} else {

    header("Location: index.php");
    exit;
}
$output = ob_get_clean();

// Modify the headers
header('Content-Type: text/html');
header('Cache-Control: no-cache');

// Flush the headers to the browser
ob_end_flush();
echo $output;
?>