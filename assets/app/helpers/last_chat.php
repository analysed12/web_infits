<?php 

function lastChat($id_1, $id_2, $conn){
   
    $sql = "SELECT * FROM chats
           WHERE `from_id`='$id_1' AND `to_id`='$id_2'
           OR    `to_id`='$id_1' AND `from_id`='$id_2'
           ORDER BY chat_id DESC LIMIT 1";
    
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    // $stmt = $conn->prepare($sql);
    // $stmt->execute([$id_1, $id_2, $id_1, $id_2]);

    if ($result->num_rows) {
    	$chat = mysqli_fetch_assoc($result);
        echo "<script>console.log('{";
        print_r($chat);
        echo "')</script>";
        $string = $chat['message'];
        if (strlen($string) > 16) {
            $string = substr($string, 0, 16) . "...";
        }
    	return $string;
    }else {
    	$chat = '';
    	return $chat;
    }

}
function lastChatPDO($id_1, $id_2, $conn){
   
    $sql = "SELECT * FROM chats
           WHERE `from_id`=? AND `to_id`=?
           OR    `to_id`=? AND `from_id`=?
           ORDER BY chat_id DESC LIMIT 1";
    
    // $result = $conn->query($sql);
    // $row = mysqli_fetch_assoc($result);
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_1, $id_2, $id_1, $id_2]);

    if ($stmt->rowCount()) {
    	$chat = $stmt->fetch();
        $string = $chat['message'];
        if (strlen($string) > 16) {
            $string = substr($string, 0, 16) . "...";
        }
    	return $string;
    }else {
    	$chat = '';
    	return $chat;
    }

}