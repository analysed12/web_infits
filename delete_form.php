<?php
include "constant/config.php";

if (isset($_GET['form_id'])) {
    $id = $_GET['form_id'];
    $query = "DELETE FROM `dietitian_forms` WHERE `form_id`='$id'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        echo "Deleted Successfully";
        header("Location:  forms_and_documents.php");
    } else {
        die(mysqli_error($conn));
    }
}
?>