<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments</title>
    <?php require('constant/head.php');?>
</head>
<style>
     body {
    font-family: "NATS", sans-serif !important;
    
    font-weight: 400;   
    position: relative;
}
    .text-start{
        font-weight:500;
        color:#000000;
        margin-left:17rem !important;
        margin-top:3.5rem !important;
        line-height:20px;
        display:flex;
        align-items:center;
        font-size:48px;
    }
    .container{
        margin-top:5vh;
    }
    
    @media screen and (min-width:0px) and (max-width: 720px){
        .text-start{
            margin-left:2rem !important;
        }
    }
    @media screen and (max-width:400px){
        .text-start{
            font-size:40px;
        }
        .rounded{
            margin:auto;
            width:300px;
        }
    }
    
</style>
<body>
<?php
include 'navbar.php';
?>

    <h3 class="text-start" style="font-size:40px">Client Payments</h3>

<div class="container">
<img src="<?=$DEFAULT_PATH?>assets/images/payments.svg" class="rounded mx-auto d-block" alt="...">
<h4 class="text-center" style="font-size:30px;font-weight:400;">No client payments active/due currently!</h4>
</div>

<?php require('constant/scripts.php');?>
</body>
</html>