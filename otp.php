
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP verification</title>
    <?php require('constant/scripts.php') ?>
</head>
<body>
<?php require('constant/head.php');?>
<?php
     require('constant/config.php');   
    session_start();
    echo $mail =  $_SESSION["emailID"];
    echo "<script>alert('OTP has been delivered successfully to:'.$mail;)</script>"; 
   if(isset($_POST['submit_otp'])){
    //echo "this is otp";
    // echo var_dump($_POST['get_otp']);
    $query="select `OTP` from dietitian where `email` = '{$mail}'";
    $result =  mysqli_query($conn,$query) OR die();
        if(mysqli_num_rows($result)==1){
          
          echo "OTP found!";
             $row = mysqli_fetch_assoc($result);
             echo $row['OTP'];
             if($row['OTP'] == $_POST['get_otp']){
               echo"<script> alert('OTP Successfully matched') </script>" ;
                 $_SESSION['otp'] = $_POST['get_otp'];

               header("Location: changepassword.php");


             }
             else{
               echo " wrong otp !";
               echo"<script> alert('Wrong OTP:Please enter Right One ') </script>" ;
                 

             }


        }
        else{
           
           echo "otp not found";  

        }      


   }





?>

<div class="container">

  <div class="row justify-content-center">

  <div class="col-md-5 shadow-lg p-3 mb-5 bg-body rounded text-center" >

     <form action="" method="post">

      <input type="text" class="form-control shadow-lg p-3 mb-5 bg-body rounded" id="inputOtp" placeholder="Enter the OTP" name="get_otp">  
      <input type="submit" class="form-control btn btn-lg btn-success" id="submitotp" name="submit_otp">  
       



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
.col-md-5{

margin-top: 150px !important;

}
input[type=text]{
margin: 10px !important;
border: none;
outline: none;
border-radius: 7px !important;
font-size: 20px !important;
font-weight: bold !important;


}
input[type=submit]{
margin: 10px !important;
width: 40% !important;

}



</style>