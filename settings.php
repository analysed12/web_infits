<?php
include "navbar.php";
$id = $_SESSION["dietitianuserID"];
$sql = "SELECT * FROM dietitian Where dietitianuserID ='$id' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = explode(" ", $row['dietitianuserID']);
?>
<!DOCTYPE HTML>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings | Infits</title>
    <?php require('constant/head.php');?>

<style>
    body {
        font-family: 'NATS', sans-serif !important;
    }

    .nav {
        height: 0px;
        background-color: black;
    }


    /* new */
    .container {
        /* display: flex; */
        justify-content: center;
        align-items: center;
        /* height: 300px; */
    }

    .section {
        max-width: 1100px;
        margin-top: 30px;

        display: flex;
        justify-content: center;


    }

    .grid {
        margin: 0 0 0 0;
        padding: 0;
        list-style: none;
        display: flex;
        text-align: center;
        width: 100%;
        flex-wrap: wrap;
        justify-content: center;

    }

    .grid:after {
        clear: both;
    }

    .grid:after,
    .xop-box:before {
        content: '';
        display: table;
    }

    .grid li {

        height: 221px;
        display: inline-block;
        margin: 35px;
        padding: 26px;
        flex: 0 0 200px;
        background: #FFFFFF;
        box-shadow: 0px 4px 8px 0px #00000040;
        /* border: none; */
        border-radius: 20px;
    }

    .box {

        position: relative;
        cursor: pointer;
        border-radius: 10px;




    }

    .box a {
        text-decoration: none;
    }

    .box:hover {
        transform: scale(1.10);
        background-color: none;
    }

    .logout-button-box {
        height: 80px;
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
    }

    .text-center {
        display: flex;
        justify-content: center;
    }

    .logout {
    background-color: #ff0000;
    color: #fff;
    padding: 13px 45px;
    font-size: 1.2rem;
    border: none;
    border-radius: 10px;
    float: right;
    position: absolute;
    bottom: 20px;
    right: 20px;
}

    .img-1 {


        /* border: 1px solid #000000; */
        color: #f3e7e3 !important;
        background-repeat: no-repeat;
        border-radius: 20px;
        box-shadow: 2px 2px rgb(0, 0, 0)888;
        text-align: center;
        width: 171px;
        height: 171px !important;

    }

    .img-2 {


        /* border: 1px solid #000000; */
        color: #f3e7e3 !important;
        background-repeat: no-repeat;
        box-shadow: 2px 2px rgb(0, 0, 0)888;
        width: 171px;
        height: 171px;

    }

    .img-3 {


        /* border: 1px solid #000000; */
        color: #f3e7e3 !important;
        background-repeat: no-repeat;
        box-shadow: 2px 2px rgb(0, 0, 0)888;
        width: 171px;
        height: 171px;
    }

    .img-4 {


        /* border: 1px solid #000000; */
        color: #f3e7e3 !important;
        background-repeat: no-repeat;
        box-shadow: 2px 2px rgb(0, 0, 0)888;
        width: 171px;
        height: 171px;
    }

    .img-5 {


        /* border: 1px solid #000000; */
        color: #f3e7e3 !important;
        background-repeat: no-repeat;
        box-shadow: 2px 2px rgb(0, 0, 0)888;
        width: 171px;
        height: 171px;
    }

    .img-6 {


        /* border: 1px solid #000000; */
        color: #f3e7e3 !important;
        background-repeat: no-repeat;
        box-shadow: 2px 2px rgb(0, 0, 0)888;
        width: 171px;
        height: 171px;
    }

    /* .info {
     position: absolute;
     bottom: 0px;
    display: flex;
    justify-content: center;
    width: inherit;
    height: inherit;
    text-align: center;
} */

    .info {
        position: absolute;
        bottom: 0px;
        text-align: center;
    }

    /* .info h3 {
    font-family: 'Pacifico', cursive; 
    font-weight: 400;
    color: black;
    font-size: 42px;
    margin: 0 30px;
    padding: 100px 0 0 0;
    line-height:1.5; 
} */

    .info p {
        color: rgb(9, 9, 9);
        font-family: 'Pacifico', cursive;
        font-weight: 500;
        color: black;
        margin: 0px;
        padding: 20px;
        font-size: 20px;
        text-align: center;

    }

    .rounded {


        border-radius: 1.2rem;

    }

    /* .logout{
width: 178px;
height: 52px;
position:absolute;
margin-right:3%;
margin-top:1rem;
margin-bottom:1rem !important;
background: #FF0000;
border-radius: 10px;
} */
    .mobview {
        display: none;
    }

    .mob_wrapper1 {
        margin: 10px;
        
        display: flex;

        width: 370px;
        height: 52px;


        background: #F3F5F8;
        border-radius: 18px;
    }

    @media screen and (max-width: 988px) {
        ul {
            margin-left: 0rem;
        }

    }

    @media screen and (max-width: 720px) {
        .webview {
            display: none;
        }

        .mob_wrapper1 {

           
            display: flex;
            align-items: center;


            width: auto !important;
            height: auto !important;



        }

        .mobview {
            display: flex;
            flex-direction: column;
        }
    }
    body{
        position: relative;
    }
</style>
>



<body>

    <br />
    <br />
    <div class="webview">
        <div class="container">
            <div style="height:175px;" class="d-flex justify-content-center align-items-center gap-5">
                <img src="<?=$DEFAULT_PATH?>assets/images/dietitian_profile.svg" class="h-100 rounded" alt="...">
                <h3><?=$_SESSION['name']?></h3>
            </div>
        </div>

        <div class="section">
            <ul class="grid" style="margin-left:1rem">
                <a href="profile_settings_show.php" style="text-decoration: none; padding: 0px;">
                    <li>
                        <div class="box img-1">
                            <img src="<?=$DEFAULT_PATH?>assets/icons/profile.svg" alt="">
                            <p
                                style="text-align:center !important;font-weight: 400;color:black;font-size: 25px;margin-top:3rem">
                                My Profile</p>
                        </div>
                    </li>
                </a>
                <a href="about_us.php">
                    <li>
                        <div class="box img-3">
                            <img src="<?=$DEFAULT_PATH?>assets/icons/info.svg" alt="">
                            <p
                                style="text-align:center !important;font-weight: 400;color:black;font-size: 25px;margin-top:3rem">
                                About Us</p>
                        </div>
                    </li>
                </a>
                <a href="refer_friend.php">
                    <li>
                        <div class="box img-5">
                            <img src="<?=$DEFAULT_PATH?>assets/icons/people.svg" alt="">
                            <p
                                style="text-align:center !important;font-weight: 400;color:black;font-size: 25px;margin-top:3rem">
                                Refer To Friends</p>
                        </div>
                    </li>
                </a>
                <!-- // -->
                <a href="notification.php">
                    <li>
                        <div class="box img-6">
                            <img src="<?=$DEFAULT_PATH?>assets/icons/bell.svg" alt="">
                            <p
                                style="text-align:center!important ;font-weight: 400;color:black;font-size: 25px;margin-top:3rem;">
                                Notifications</p>
                        </div>
                    </li>
                </a>
            </ul>
            
        </div>
        
        <a href="logout.php" class="logout">Logout</a>
    </div>
    


    <!--------------------------------------------------MOBVIEW------------------------------>

    <div class="mobview">
        <div class="profileimg">
            <img src="<?=$DEFAULT_PATH?>assets/images/dietitian_profile.svg" id="pfp"
                style=" display: block;margin-left: auto;margin-right: auto;width:30%">
            <p style="font-weight:400;font-size:30px;text-align:center">John Wayne</p>
        </div>


       <a href="profile_settings_show.php" style="color:black">
            <div class="mob_wrapper1">
                    <img src="<?=$DEFAULT_PATH?>assets/icons/profile.svg" alt="">
                    <p style="margin-top:2px;font-size:28px;margin-left:15px;font-weight:500">My Profile</p>
                </div> 
       </a>
       <a href="abaout_us.php" style="color:black">
       <div class="mob_wrapper1">
            <img src="<?=$DEFAULT_PATH?>assets/icons/info.svg" alt="">
            <p style="margin-top:2px;font-size:28px;margin-left:15px;font-weight:500">About Us</p>
        </div> 
       </a>
       <a href="refer_friend.php" style="color:black">
       <div class="mob_wrapper1">
            <img src="<?=$DEFAULT_PATH?>assets/icons/people.svg" alt="">
            <p style="margin-top:2px;font-size:28px;margin-left:15px;font-weight:500">Refer to friends</p>
        </div>
       </a>
       <a href="notification.php" style="color:black">
       <div class="mob_wrapper1">
            <img src="<?=$DEFAULT_PATH?>assets/icons/bell.svg" alt="">
            <p style="margin-top:2px;font-size:28px;margin-left:15px;font-weight:500">Notifications</p>
        </div>
       </a>
        
        
        
        <a style="bottom:-70px" href="logout.php" class="logout">Logout</a>
    </div>



</body>

</html