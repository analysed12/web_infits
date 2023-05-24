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
    font-weight:400;
    font-family: 'NATS', sans-serif !important;
}
    .text-start{
        font-weight:400;
        color:#000000;
        position:absolute;
        margin-top: 2.2rem;
        margin-left: 17rem;
        
        display:flex;
        align-items:center;
        font-size:40px;
    }
    .container{
        margin-top:15vh;
    }
    
    @media screen and (max-width: 720px){
        
        .text-start{
            margin-top:2.2rem;
            margin-left:2rem;
        }
    }
    @media screen and (max-width:400px){
        .text-start{
            margin-top:2.2rem;
            margin-left:2rem;
        }
        .text-center{
            margin-left:20px;
        }
    }
    
</style>
<body>
<?php
include 'navbar.php';
?>

    <h3 class="text-start">Billing and Invoices</h3>

<div class="container">
<img src="<?=$DEFAULT_PATH?>assets/images/bill.svg" class="rounded mx-auto d-block" alt="...">
<h4 class="text-center">No bills issued currently!</h4>
</div>
<?php require('constant/scripts.php');?>
</body>
</html>