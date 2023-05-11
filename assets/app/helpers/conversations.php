<?php 

function getConversation($dietitian_id, $conn){
    /**
      Getting all the conversations 
      for current (logged in) user
    **/
    // $sql = "SELECT * FROM conversations
    //         WHERE user_1=? OR user_2=?
    //         ORDER BY conversation_id DESC";

$sql = "SELECT * FROM conversations
WHERE user_1=? OR user_2=?
ORDER BY conversation_id DESC";

    // $sql = "SELECT  * FROM chats WHERE from_id=? OR to_id=? ORDER BY created_at DESC";
  // $sql =  "SELECT  DISTINCT(`to_id`),`from_id`,MAX(created_at) FROM `chats` WHERE from_id ='1' GROUP BY to_id";


    $stmt = $conn->prepare($sql);
    $stmt->execute([$dietitian_id, $dietitian_id]);

    if($stmt->rowCount() > 0){
        $conversations = $stmt->fetchAll();

        /**
          creating empty array to 
          store the user conversation
        **/
        $user_data = [];
        
        # looping through the conversations
        foreach($conversations as $conversation){
            # if conversations user_1 row equal to dietitian_id
            if ($conversation['user_1'] == $dietitian_id) {
            	$sql2  = "SELECT *
            	          FROM addclient WHERE client_id=?";
            	$stmt2 = $conn->prepare($sql2);
            	$stmt2->execute([$conversation['user_2']]);
            }else {
            	$sql2  = "SELECT *
            	          FROM addclient WHERE client_id=?";
            	$stmt2 = $conn->prepare($sql2);
            	$stmt2->execute([$conversation['user_1']]);
            }

            $allConversations = $stmt2->fetchAll();

            # pushing the data into the array 
            array_push($user_data, $allConversations[0]);
        }

        return $user_data;

    }else {
    	$conversations = [];
    	return $conversations;
    }  

}