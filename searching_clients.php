<?php
    require("constant/config.php");
    if (isset($_POST['name'])){
        $str="";
        $sql = "SELECT name FROM addclient where dietitian_id = '{$_POST['dietitian_id']}' AND name LIKE '{$_POST['name']}%'";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $str.=$row['name'].",";
            }
            // print_r($row); 
            echo $str;
        }
    }
    exit;

?>