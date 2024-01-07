
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>changePassword</title>
   
    
</head>

<body>

   <?php require('constant/head.php'); ?>

    <div class="container-fluid justify-content-center" id="wrapper" >
       <div class="row justify-content-center">
 
         <div class="col-md-4 text-center shadow p-3 mb-5 bg-white rounded"">  

         <form action="" method="post">

          <input type="password" class="form-control shadow p-3 mb-5 bg-body rounded" placeholder="Enter new password" id="pass" name="password">
          <input type="password" class="form-control shadow p-3 mb-5 bg-body rounded" placeholder="Confirm password" id="confirmpass" name="confirmpassword">
          <input type="submit" class="form-control btn btn-lg btn-primary" value="submit" name="submit_password" id="submit">
           

         </form>


       </div>




    </div>    
    </div>


</body>
</html>
<style>
    body{
        margin: 0;
        padding: 0;
        background-color: lightcyan;
    }
#wrapper{
    margin-top: 150px !important;
    padding: 10px !important;
}
input[type=password]{
  margin-top: 10px !important;
  margin-bottom: 10px !important;
  padding: 10px !important;
  border: none ;
  outline: none;
  font-size: 20px;
  font-weight: bold;
text-indent: 20px;

}
input[type=submit]{
 width: 40%;
}

</style>
<?php  
    require('constant/config.php');
    session_start();
if (isset($_POST['submit_password'])) {
      
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];
    echo var_dump($newPassword) . "<br>";
    echo var_dump($confirmPassword);
    if($newPassword == $confirmPassword){
       $newOTP =  $_SESSION['otp']; 
       echo "<script>alert('Password matched!') </script> ";


     $query = " UPDATE `dietitian` set password = '{$confirmPassword}' WHERE OTP = '{$newOTP}'";             
     $result =  mysqli_query($conn,$query) OR die("Query not Executed");
     header("Location: login.php");
     

    }
    else{
          
     echo "<script>alert('Password does not match!') </script> ";

    }

}

?>