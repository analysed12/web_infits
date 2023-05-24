<?php
session_start();
include 'navbar.php';

if (isset($_SESSION['dietitianuserID'])) {
    # database connection file
    include 'assets/app/db.conn.php';

    include 'assets/app/helpers/user.php';
    include 'assets/app/helpers/conversations.php';
    include 'assets/app/helpers/timeAgo.php';
    include 'assets/app/helpers/timeHM.php';
    include 'assets/app/helpers/last_chat.php';


    # Getting User data data
    $user = getUser($_SESSION['dietitianuserID'], $conn);

    # Getting User conversations
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
    </head>

    <body>
        <div class=" d-flex flex-column ">
            <h3 class="m-4">Messages</h3>
            <div class="container-fluid mt-3">
                <img src="<?= $DEFAULT_PATH ?>assets/images/No Messages.svg" class="no-message d-block">

                <h4 class="d-flex justify-content-center mt-3 pt-2" style="color: #000000; text-align: center;">You haven't
                    started any <br /> chat yet! </h4>


                <div class="d-flex justify-content-center">
                    <a href="chat_home.php" class="btn btn-primary mt-3 px-5" style="background :#8C68F8">Start a chat</a>
                </div>

            </div>

        </div>
    </body>
    </body>

    </html>
    <?php
} else {
    echo "<script>window.location.href='index.php'</script>";
    exit;
}
?>