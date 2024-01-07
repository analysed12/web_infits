<?php
    require("constant/config.php");
    if(isset($_GET['client_id']) && isset($_GET['dietchart'])){
        $dietchart_id = $_GET["dietchart"];
        $client_id = $_GET["client_id"];
        $Sql="DELETE FROM diet_chart WHERE dietchart_id = {$_GET['dietchart']}";
        if ($result = $conn->query($Sql)){
            echo "Recode deleted successfully";
            header("Location: dietchart.php?client_id=$client_id");
        }
        else{
            echo $conn->error;
        }
    }
?>