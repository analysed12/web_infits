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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="<?=$DEFAULT_PATH?>assets/css/chat_style.css">
        <link rel="icon" href="images/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <div class=" d-flex flex-column ">
            <h3 class="m-4">Messages</h3>
            <div class="container-fluid mt-3">
                <img src="images/NoMessages.png" class="no-message d-block">

                <h4 class="d-flex justify-content-center mt-3 pt-2" style="color: #000000; text-align: center;">You haven't started any <br /> chat yet! </h4>


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