

<!-- <p>Hello</p> -->

<?php

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['messageData']) {}
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'assets/app/helpers/timeHM.php';
    include 'constant/constant.php';
    require_once('constant/config.php');
    $clientUserId = $_POST['clientUserId'];
    $messageText = $_POST['messageData'];

    $find_user = "SELECT * FROM client WHERE clientuserID = '$clientUserId'";
    $find_user_result = mysqli_query($conn, $find_user);
    if ($find_user_result) {

        $find_user_rows = mysqli_num_rows($find_user_result);
        
        if ($find_user_rows > 0) {
            
            $find_user_fetch = mysqli_fetch_assoc($find_user_result);
            $clientId = $find_user_fetch['client_id'];
            // $get_chats = getChats($_SESSION['dietitian_id'], $chatWith['client_id'], $conn);
            // echo 'user found';
            // echo $clientId;

            $chats = " SELECT * FROM chats WHERE from_id = '$clientId' OR to_id = '$clientId' ";
            $chats_result = mysqli_query($conn, $chats);
            
            if ($chats_result) {
                
                $chats_rows = mysqli_num_rows($chats_result);

                if ($chats_rows > 0) {

                    $send_data = '';

                    while ($chats_fetch = mysqli_fetch_assoc($chats_result)) {
                        $replaceWith = '<span class="match">'.$messageText.'</span>';
                        $send_data = str_replace($messageText, $replaceWith, $chats_fetch['message']);
                        // $send_data.= '<p>'.$chats_fetch['message'].'</p>';
                        if ($chats_fetch['from_id'] == $_SESSION['dietitian_id']) { ?>
                            <?php if (substr($chats_fetch['message'], 0, 4) == "IMG-") { ?>

                                <p class="rtext align-self-end">

                                    <img src="<?= $DEFAULT_PATH ?>assets/images/<?= $chats_fetch['message'] ?>"
                                        style="max-width: 250px">
                                    <small class="d-block mt-2">
                                        <?= last_time($chats_fetch['created_at']) ?>
                                    </small>
                                </p>
                            <?php } else { ?>
                                <p class="rtext align-self-end">
                                    <?= $send_data ?>
                                    <small class="d-block">
                                        <?= last_time($chats_fetch['created_at']) ?>
                                    </small>
                                </p>
                            <?php }
                            ?>
                        <?php } else { ?>
                                        <?php if (substr($chats_fetch['message'], 0, 4) == "IMG-") { ?>

                                            <p class="ltext align-self-start">

                                                <img src="<?= $DEFAULT_PATH ?>assets/images/<?= $chats_fetch['message'] ?>"
                                                    style="max-width: 250px">
                                                <small class="d-block mt-2">
                                                    <?= last_time($chats_fetch['created_at']) ?>
                                                </small>
                                            </p>
                                        <?php } else { ?>
                                            <p class="ltext align-self-start">
                                                <?= $send_data ?>
                                                <small class="d-block">
                                                    <?= last_time($chats_fetch['created_at']) ?>
                                                </small>
                                            </p>
                                        <?php }
                                        ?>

                                    <?php }
                    }
                    // echo $send_data;
                    /* $modified_send_data = '';
                    
                    if (strpos($send_data, $messageText) !== false) {
                        
                        $replaceWith = '<span class="match">'.$messageText.'</span>';
                        // Perform the replacement if $find is present
                        $modified_send_data = str_replace($messageText, $replaceWith, $send_data);
                        // echo "Replacement performed: " . $modifiedString;
                        echo $modified_send_data;
                    } */
                } /* else { 
                    echo 'no chats found';
                } */

                
            }
        } /* else {
            echo 'user not found';
        } */
            
    }
}

?>