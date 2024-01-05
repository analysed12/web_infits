<?php   
    // session_start();
    ob_start(); 
    require("constant/config.php");
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['referral'])){
        $referral = $_POST['referral'];
        $sql = "SELECT referral_code FROM dietitian WHERE referral_code = '".$referral."'";
        $result = $conn->query($sql);
        if ($result->num_rows>0){
            echo 1;
        }
        else{
            echo 0;
        }
    }
        
    $conn->close();
?>