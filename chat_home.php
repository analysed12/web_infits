<?php
ob_start();

include 'navbar.php';

if (isset($_SESSION['dietitianuserID'])) {
    $user = $_SESSION['dietitianuserID'];
    $sql = "SELECT * FROM messages where dietitianID='$user'";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) < 1) {
        
    }
    else{
        header('Location:message.php');
    }
    # database connection file
    include 'assets/app/db.conn.php';

    include 'assets/app/helpers/user.php';
    include 'assets/app/helpers/conversations.php';
    include 'assets/app/helpers/timeAgo.php';
    include 'assets/app/helpers/last_chat.php';
    include 'assets/app/helpers/timeHM.php';

    # Getting User data data
    $user = getUser($_SESSION['dietitianuserID'], $conn);

    # Getting User conversations //working for getting the clients user in left side
    $conversations = getConversation($user['dietitian_id'], $conn);

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chat App - Home</title>
        <?php require('constant/head.php'); ?>
        <link rel="stylesheet" href="<?= $DEFAULT_PATH ?>assets/css/chat_style.css">
        <link rel="icon" href="images/logo.png">
        <style>
            .card-body {
                padding: 0% !important;
            }

            .w-300 {
                width: 99% !important;
            }

            .search__div {
                border-radius: 0.6rem;
                padding: 3px;
                background: white;
                box-shadow: 0.6px 0.6px 2px 1px #ccc;
            }

            ::placeholder {
                /* Chrome, Firefox, Opera, Safari 10.1+ */
                color: #BBBBBB;
                opacity: 1;
                /* Firefox */
            }

            @media (min-width: 75px) {
                body {
                    overflow-x: hidden !important;
                }
            }

            /* For screens smaller than 576px (extra small screens) */
            @media (min-width: 215px) and (max-width: 387.98px) {
                /* CSS rules for extra small screens */

                .d-flex.flex-row {
                    margin: 0;
                    height: 100%;
                    display: flex !important;
                    flex-direction: column !important;
                    overflow: hidden !important;
                    /* width:665px !important; */
                }

            }

            @media (max-width: 575.98px) and (min-width: 388px) {
                /* CSS rules for extra small screens */

                .d-flex.flex-row {
                    margin-top: -10px;
                    height: 100%;
                    display: flex !important;
                    flex-direction: column !important;
                    overflow: hidden !important;
                    /* width:665px !important; */
                }

            }

            /* For screens larger than or equal to 576px (small screens) */
            @media (min-width: 576px) and (max-width: 767.99px) {

                /* CSS rules for small screens */
                .d-flex.flex-row {
                    margin-top: -100px;
                    height: 100%;
                    display: flex !important;
                    flex-direction: column !important;
                }

                .w-300 {
                    margin-top: 86px;
                }
            }

            .bt-outline {
                border: none;
            }

            .user-name-section {
                width: 70%; /* Adjust the width as needed */
            }

            .user-name-section h3 {
                    font-size: 1.5rem; /* Increase font size as needed */
                }

                .d-flex.justify-content-between.align-items-center h3 {
                        font-size: 1.3rem; /* Increase font size as needed */
                }

                .chat {
        width: 24.8vw; /* Adjust the width as needed */
    }

    /* For screens smaller than 768px (tablets and smaller) */
    @media (max-width: 767.98px) {
        .chat {
            width: 90vw; /* Adjust the width as needed for smaller screens */
        }
    }

    /* For screens smaller than 576px (phones and smaller) */
    @media (max-width: 575.98px) {
        .chat {
            width: 100vw; /* Adjust the width as needed for even smaller screens */
        }
    }

    .scroll {
    overflow: auto; /* Enable scrolling */
}

/* Hide scrollbar for Firefox */
.scroll::-webkit-scrollbar {
    display: none;
}

/* Show scrollbar when scrolling occurs */
.scroll:hover::-webkit-scrollbar {
    display: block;
}


.scroll {
    overflow-y: auto; /* Enable vertical scrolling */
    max-height: 300px; /* Set a maximum height for the scrollable container */
}

/* Thin scrollbar */


/* Track */


/* Thumb */
.scroll::-webkit-scrollbar-thumb {
    border-radius: 10px; /* Make the scrollbar thumb curvy */
}

/* On hover */


.scroll::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar */
.scroll {
    scrollbar-width: none; /* For Firefox */
    -ms-overflow-style: none; /* For Internet Explorer and Edge */
}

/* Hide scrollbar for WebKit/Blink browsers */
.scroll::-webkit-scrollbar {
    display: none;
}



                
        </style>
    </head>

    <body style="z-index:-10;">
        <div class="d-flex flex-row">
        <div class="d-flex flex-coloumn vh-100 chat" style="outline: 2px solid #EEEEEE; padding: 8px!important; padding-left: 21px!important; z-index: 0;width: 25vw;">

                <div class="w-300">
                    <div style="margin-left:1rem;margin-right:1rem;">
                        <div class="d-flex
                        mb-2 p-2 
                        justify-content-between
                        ">

                        <div class="mt-1 user-name-section"> <!-- Added class for styling -->
    <h3 class="chat-message-header" style="margin-top:0.7rem; font-size: 2.2rem;">Messages</h3>
</div>
                        </div>

                        <div class="input-group bt-outline ">
                            <div class="input-group mb-3 bt-outline d-flex align-items-center search__div">
                                <button class="btn  grey-color text-secondary"
                                    style="background: white !important; border:none;" id="serachBtn">
                                    <i class="fa fa-search"></i>
                                </button>
                                <input type="text" placeholder="Search" id="searchText1"
                                    style="background: white !important; border:none;"
                                    class="form-control bg-light text-secondary">
                            </div>
                        </div>
                        <div class="scroll">
    <ul id="chatList" class="list-group mvh-50">
                                <?php //if (!empty($conversations)) { ?>
                                <?php

                                foreach ($conversations as $conversation) { ?>
                                    <li class="list-group-item">
                                        <a href="chat_messages.php?user=<?= $conversation['clientuserID'] ?>" class="d-flex
                                justify-content-between
                                align-items-center">
                                            <div class="d-flex
                                        align-items-center">
                                                <img src="<?= $conversation['p_p']===""? $DEFAULT_PATH."assets/images/user-default.png":$DEFAULT_PATH.'uploads/profile/images/'.$conversation['p_p'] ?>"
                                                    class="rounded-circle" style="width:40px">
                                                <h3 class="fs-xs m-2 text-dark">
                                                    <?= $conversation['name'] ?><br>
                                                    <small>
                                                        <?php
                                                        echo lastChatPDO($_SESSION['dietitian_id'], $conversation['client_id'], $conn);
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


                <script>
                    $(document).ready(function () {

                        // Search
                        $("#searchText1").on("input", function () {
                            var searchText1 = $(this).val();
                            //if (searchText1 == "") return;
                            $.post('assets/app/ajax/search.php', {
                                key: searchText1
                            },
                                function (data, status) {
                                    $("#chatList").html(data);
                                });
                        });

                        // Search using the button
                        // $("#serachBtn").on("click", function () {
                        //     var searchText1 = $("#searchText1").val();
                        //     if (searchText1 == "") return;
                        //     $.post('assets/app/ajax/search.php', {
                        //         key: searchText
                        //     },
                        //         function (data, status) {
                        //             $("#chatList").html(data);
                        //         });
                        // });

                        $("#serachBtn").on("click", function () {
                                // console.log("searchBtn pressed");
                                var searchText1 = $("#searchText1").val();
                                // console.log(searchText1);
                                //if (searchText1 == "") return;

                                $.post('http://localhost/analysed/assets/app/ajax/search.php', { key: searchText })
                                    .done(function (data, textStatus, jqXHR) {
                                        // This function is called when the request is successful
                                        console.log('Success:', data);

                                        // Check HTTP status code
                                        if (jqXHR.status === 200) {
                                            // The request was successful
                                            $("#chatList").html(data);
                                        } else {
                                            // Handle other status codes if needed
                                            console.error('Unexpected HTTP status code:', jqXHR.status);
                                        }
                                    })
                                    .fail(function (jqXHR, textStatus, errorThrown) {
                                        // This function is called if the request fails
                                        console.error('Error:', errorThrown);
                                    });
                            });

                        // let lastSeenUpdate = function () {
                        //     $.get("app/ajax/update_last_seen.php");
                        // }
                        // lastSeenUpdate();
                        // /** 
                        // auto update last seen 
                        // every 10 sec
                        // **/
                        // setInterval(lastSeenUpdate, 10000);

                    });
                </script>
            </div>
            <div class="d-flex flex-column
                flex-fill
            vh-100 justify-content-center align-items-center md-3">
                <img src="<?= $DEFAULT_PATH ?>assets/images/infitsWeb.svg" class="d-block fs-big"
                    style="height:250px; width:250px; padding-bottom:20px;">
                <h1 class="mt-5 pt-2" style="color: #8D8D8D;"> Infits for Web </h1>
            </div>
        </div>

        <?php require('constant/scripts.php'); ?>

        <script>
            // var scrollDown = function () {
            //     let chatBox = document.getElementById('chatBox');
            //     chatBox.scrollTop = chatBox.scrollHeight;
            // }

            // scrollDown();

            // $(document).ready(function () {

            //     $("#sendBtn").on('click', function () {
            //         message = $("#message").val();
            //         if (message == "") return;

            //         $.post("app/ajax/insert.php", {
            //             message: message,
            //             to_id: <?= $chatWith['client_id'] ?>
            //         },
            //             function (data, status) {
            //                 $("#message").val("");
            //                 $("#chatBox").append(data);
            //                 scrollDown();
            //             });
            //     });

                /** 
                auto update last seen 
                for logged in user
                **/
            //     let lastSeenUpdate = function () {
            //         $.get("app/ajax/update_last_seen.php");
            //     }
            //     lastSeenUpdate();
            //     /** 
            //     auto update last seen 
            //     every 10 sec
            //     **/
            //     setInterval(lastSeenUpdate, 10000);
            //     // auto refresh / reload
            //     let fechData = function () {
            //         $.post("app/ajax/getMessage.php", {
            //             id_2: <?= $chatWith['client_id'] ?>
            //         },
            //             function (data, status) {
            //                 $("#chatBox").append(data);
            //                 if (data != "") scrollDown();
            //             });
            //     }

            //     fechData();
            //     /** 
            //     auto update last seen 
            //     every 0.5 sec
            //     **/
            //     setInterval(fechData, 500);

            // });
        </script>
        </div>
        </div>

    </body>
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
// echo 'hi';
?>
