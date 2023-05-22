<?php
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diest Plan</title>
    <?php require('constant/head.php');?>
</head>
<style>
body {
    font-family: "NATS", sans-serif !important;
    font-weight: 400;
    position: relative;
}

.btn {
    background: #FFFFFF;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);
    border-radius: 50px !important;
    border: 1px solid white;
    width: 284px;
    height: 97px;
    display: flex !important;
    flex-direction: row !important;
    justify-content: space-around !important;
    position: absolute;
    right: 10vh !important;
    bottom: -25vh !important;
    z-index: 2 !important;
}

.btn p,
img {
    color: #4B9AFB !important;
    font-size: 35px;
    font-weight: 400;
    margin: auto 10px;
}

@media screen and (min-width:720px) and (max-width:1500px) {
    .btns {
        bottom: -119px !important;
        padding-bottom: 0px !important;
    }
}

@media (min-width: 576px) {

    .container,
    .container-sm {
        max-width: none !important;
    }
}

@media screen and (min-width:0px) and (max-width:720px) {

    .title {
        margin-left: 1rem !important;
        margin-top: -2rem !important;
    }

    .container {
        margin: 0px !important;
    }

    .btns {
        bottom: -147px !important;
    }

}

@media screen and (min-width:0px) and (max-width:550px) {
    .image {
        width: 300px !important;
    }

    .topnav-icons {
        gap: 10px !important;
        padding-right: 0px !important;
    }
}

@media (max-width: 720px) {
    .title {
        margin-top: 1rem !important;
    }
}
</style>

<body>
    <div class="container" style="align-items:center;margin:10px;margin-left:13rem;width:auto;">
        <div class="title" style="font-size:40px;font-weight:400;margin-top:1.7rem;margin-left:3rem;">Diet Plan
        </div>
        <div class="" style="margin:auto;">
            <img src="<?=$DEFAULT_PATH?>assets/images/diet_default.svg" class="image" alt="..." style="margin:auto;display:flex;">
            <p
                style="margin:auto;font-size:33px;display:flex;text-align:center;align-items:center;justify-content:center;">
                You haven't created any plan yet!</p>
        </div>

    </div>
    <div style="display:flex !important;flex-direction:row !important;position:absolute !important;bottom:-196px;right:30px;width:284px;height:97px;background: #FFFFFF;box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);border-radius: 50px !important;align-items:center;justify-content:center;"
        class="btns">
        <p style="color:#4B9AFB;font-size:35px;padding-top:20px">Create Plan</p>
        <img src="<?=$DEFAULT_PATH?>assets/images/Task_Plus.svg">
    </div>
</body>
</html>