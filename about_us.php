<?php
include('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('constant/head.php');?>
    <title>About US</title>

 <style>
     
body {
        font-family: 'NATS', sans-serif;
        
    }
    .help1{
        margin-left: 17rem;
        margin-top:2rem;
    }
    .content1{
        width: 700px;
    }
    @media only screen and (max-width: 1000px) {
        .content1{
        width: auto;
    }
    .help1{
        margin-left: 2rem;
       
    }  
    }

 </style>
</head>
<body>
    <p class="help1" style="font-size:40px;font-weight:400">About Us</p>
  
   <center>
   <div class="content1"style="display:flex;flex-direction:column;gap:3rem">
   <center> <img src="<?=$DEFAULT_PATH?>assets/images/aboutus.svg" style="width:35%"></center>
    <span style="font-size: 30px;display: flex;align-items: center;text-align: justify;margin: 0 5%;">LoremuxuvackjaB CKjb ipsum dolor sit amet, consectetur adipiscing elit. Tristique sem integer eros, velit vitae aliquam libero commodo. Id posuere elementum consectetur purus massa consequat. Morbi risus purus libero.</span>
    
        
    </div>
   </center>
   
    



<?php require('constant/scripts.php');?>

    
</body>
</html>


