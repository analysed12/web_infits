<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <?php require('constant/head.php');?>
   
</head>
<style>
     body {
    font-family: "NATS", sans-serif !important;
    
    font-weight: 400;   
    
}
    .text-start{
       
        color:#000000;
        position:absolute;
        left:270px;
        top:105px;
        display:flex;
        align-items:center;
    }
    .container{
        margin-top:15vh;
    }
    .startchat{
        display: flex;
        gap: 1rem;
        width: 284px;
        height: 97px;
        background: #FFFFFF;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);
        border-radius: 50px;
        justify-content: center;
        align-items: center;

    }

    @media screen and (max-width: 720px){
        .text-start{
            margin-top:40px;
        }
    }
    .button{
        color:white;
        background-color:#8C68F8;
        border-radius:10px;
        margin:auto;
        width:200px;
        height:50px;
        font-size:20px;
        font-weight:400;
        border:1px solid white;
    }
    @media screen and (min-width:0px) and (max-width: 720px){
        .text-start{
            margin-left:-15rem !important;
            margin-top:3rem !important;
        }
    }
    @media screen and (min-width:0px) and (max-width: 380px){
        .text-start{
            margin-top:8rem !important;
        }
        .button{
            margin-left:-30px !important;
        }
        .rounded{
            width:250px;
        }
    }
    

</style>
<body>
<?php
include 'navbar.php';
?>

    <h3 class="text-start" style="font-size:40px">Messages</h3>

<div class="container">
    <img src="<?=$DEFAULT_PATH?>assets/images/message.svg" class="rounded mx-auto d-block" alt="...">
    <h4 class="text-center" style="font-size:35px !important;">You haven't started any</h4>
    <h4 class="text-center" style="font-size:35px !important;">chat yet!</h4>
    
</div>
<div style="display:flex;justify-content:right">
<div onclick="redirect();" class="startchat">
    <span style="font-size: 35px;color: #4B9AFB;">Start a chat</span>
    <img src="<?=$DEFAULT_PATH?>assets/images/message_plus.svg">
</div>
</div>
<?php require('constant/scripts.php');?>
<script>
    function redirect(){
        location.replace('chat_home.php')
    }
</script>
</body>
</html>