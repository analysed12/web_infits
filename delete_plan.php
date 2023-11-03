<?php
include "constant/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
   // $query1 = "DELETE FROM `subscribedclient` WHERE `subscribedclient`.`plan`='$id'";
   // $query2 = "DELETE FROM `addclient` WHERE `addclient`.`plan_id`='$id'";
   
    // "DELETE FROM create_plan WHERE  = 1"?
    //$res1 = mysqli_query($conn, $query1);
    //$res2 = mysqli_query($conn, $query2);

    $sql = "DELETE FROM `create_plan`WHERE `plan_id`='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Deleted Successfully";
        header("Location: myplan.php");
    } else {
        die(mysqli_error($conn));
    }
}
?>
?>
