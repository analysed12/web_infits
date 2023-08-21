<?php 
require('constant/config.php');
session_start();
if(isset($_GET['recipeId'])){
    global $conn;
    $recipeId = $_GET['recipeId'];
    if($_GET['isDefault'] == true){
        // $query = "SELECT * FROM default_recipes WHERE drecipe_id = '$recipeId'";
        // $result = $conn->query($query);
        // $isDeleted = $result->fetch_assoc()['isDeleted'];
        // $toAdd = array();
        // if($isDeleted == ''){
        //     $toAdd = array(
        //         "{$_SESSION['dietitian_id']}"
        //     );
        //     $toAdd = json_encode($toAdd);
        // }else{
        //     $isDeleted = json_decode($isDeleted,true);
        //     array_push($isDeleted,$_SESSION['dietitian_id']);
        //     $toAdd = json_encode($isDeleted);
        // }
        // $query = "UPDATE default_recipes SET isDeleted = '$toAdd' WHERE drecipe_id = '{$_GET['recipeId']}'";
        // $conn->query($query);
        $query = "INSERT INTO `updated_by_users`(`dietitian_id`, `updated_drecipe_id`) VALUES ('{$_SESSION['dietitian_id']}','$recipeId')";
        $conn->query($query);
    }else{
        $query = "DELETE FROM dietitian_recipes WHERE recipe_id = '$recipeId'";
        $conn->query($query);
    }
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
?>
