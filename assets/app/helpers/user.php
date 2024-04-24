<?php

// function getUser($dietitianuserID, $conn){
//    $sql = "SELECT * FROM addclient 
//            WHERE clientuserID=?";
//    $stmt = $conn->prepare($sql);
//    $stmt->execute([$dietitianuserID]);

//    if ($stmt->rowCount() === 1) {
//    	 $user = $stmt->fetch();
//    	 return $user;
//    }else {
//    	$user = [];
//    	return $user;
//    }
// }



function getUser($dietitianuserID, $conn)
{
        $sql = "SELECT * FROM dietitian 
           WHERE dietitianuserID=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$dietitianuserID]);

        if ($stmt->rowCount() === 1) {
                $user = $stmt->fetch();
                return $user;
        } else {
                $user = [];
                return $user;
        }
}

function getClient($clientuserID, $conn)
{
        $sql = "SELECT * FROM addclient 
            WHERE clientuserID=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$clientuserID]);

        if ($stmt->rowCount() === 1) {
                $user = $stmt->fetch();
                return $user;
        } else {
                $user = [];
                return $user;
        }
}
