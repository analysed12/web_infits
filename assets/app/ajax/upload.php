<?php
session_start();
if (isset($_POST['to_id']) && isset($_FILES['my_image'])) {
   
    include '../db.conn.php';

    include '../helpers/user.php';
    include '../helpers/chat.php';
    include '../helpers/opened.php';

    include '../helpers/timeAgo.php';
    include '../helpers/timeHM.php';

    include '../helpers/conversations.php';

    include '../helpers/last_chat.php';

    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";
    

    // echo "Hello";
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    //have to check by isset
    // $to_id = $_POST['to_id'];

    if ($error === 0) {
        if ($img_size > 1250000) {
            echo "Too largeHello";
            $em = "Sorry, your file is too large.";
            header("Location: index.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");
            echo "Inside else Hello";
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../../chat/uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                echo "Insert";
             
                $to_id = $_POST['to_id'];
                $from_id = $_SESSION['dietitian_id'];
                echo "to $to_id ";
                echo "from $from_id  ";
                echo "$new_img_name";
                echo "$img_upload_path";
                

                $sql = "INSERT INTO 
	       chats (from_id, to_id, message) 
	       VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $res  = $stmt->execute([$from_id, $to_id, $new_img_name]);


                // $sql = "INSERT INTO `images` (`id`, `image_url`) VALUES (NULL, '$new_img_name');";
    
                
                // $sql = "INSERT INTO images (image_url) 
				//         VALUES(?)";
                // $stmt = $conn->prepare($sql);
                // $res  = $stmt->execute([$new_img_name]);

                echo "Inserted1 done";
                header("Location: ../../chat_home.php");
                // header()


                // mysqli_query($conn1, $sql);
                // header("Location: view.php");
                // header("Location: view.php");

                

            } else {
                echo "cant uploaded";

                $em = "You can't upload files of this type";
                header("Location: index.php?error=$em");
            }
        }
    } else {
        echo "cant unknown error";

        $em = "unknown error occurred!";
        header("Location: index.php?error=$em");
    }


}else{
    echo "wrong post";

    // header("Location: index.php");
}