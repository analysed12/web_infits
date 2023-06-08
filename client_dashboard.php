<?php
ob_start();
include "navbar.php";
?>
<?php require('constant/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Infit</title>
    <?php require('constant/head.php'); ?>


</head>
<style>
    body {

        overflow: auto;
        font-family: 'NATS', sans-serif !important;
    }

    .client_heading {
        font-weight: 400;
        font-size: 40px;
        margin-left: 2rem;
        margin-top: 2rem;
    }

    #content {
        display: flex;
        flex-direction: column;
        height: 90%;
        font-weight: 500;
        font-size: 15px;
        padding: 20px;

    }

    .col {
        width: 276px;
        border-radius: 15px;
        padding: 15px;
        height: 272.26px;
        font-size: 20px;
    }

    i {
        font-size: 100px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    a {
        text-decoration: none;
    }

    .box {
        position: relative;
        width: 85%;
        background: #FFF0D3;
        box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.15);
        border-radius: 5px;

    }

    .box p {
        font-style: normal;
        font-weight: 400;
        font-size: 35px;
        line-height: 153.5%;
        padding-left: 40px;
        padding-right: 20px;
        display: flex;
        align-items: center;
        text-align: center;
        justify-content: center;

        color: #000000;
    }

    .image {
        float: left;
        width: 100%;
        height: auto;
    }

    .image img:nth-of-type(2) {
        float: right;
    }

    .row1 {
        display: flex;
        flex-wrap: wrap;
        gap: 55px 80px;
        justify-content: center;
    }

    @media screen and (min-width: 300px) and (max-width: 600px) {
        #content {
            margin: auto;
            width: 100%;
            flex-direction: column;
        }

        .box {
            margin-left: 0;
        }
    }

    @media screen and (min-width: 300px) and (max-width: 600px) {
        .box {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: auto;
            top: auto;
        }

        .box img {
            width: 10%;
            margin: 1rem;
            height: 40%;
            margin-right: auto;
        }

        .box p {
            font-size: 2rem;
            width: 100%;
            margin: auto;
        }
    }

    @media screen and (min-width: 300px) and (max-width: 673px) {
        .box {
            margin-left: 0;
        }

    }
</style>

<body>
    <div id="content">
        <?php
        if (isset($_GET['client_id'])) {
            $client_id = $_GET['client_id'];
        } else {
            header('Location:client_list.php');
        }
        $sql = "SELECT name FROM addclient where client_id = '$client_id' AND dietitianuserID = '{$_SESSION['dietitianuserID']}'";
        global $conn;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
        } else {
            header('Location:client_list.php');
        }
        ?>
        <h4 class="client_heading">Client Dashboard</h4>
        <br>
        <div class="row1 row-cols-2 row-cols-lg-3" ;>

            <div class="col "
                style="border: 1px solid #FFA381;color: #FFA381;text-align:center; justify-content: center">
                <?php echo '<a style="color:#FFA381" href="client_profile.php?client_id=' . $client_id . '">' ?>
                <div class="topbar"
                    style="display: flex;flex-direction: column;justify-content: space-between;margin-top: -37px;height: 100%;">
                    <div>
                        Personal Info
                    </div>
                    <div>
                        <img src="<?= $DEFAULT_PATH ?>assets/images/User.svg" style="width:60%;" alt="">
                    </div>
                    <div>
                        Name,Plan,etc
                    </div>
                </div>
                </a>
            </div>

            <div class="col " style="border: 1px solid #9C74F5;
        color: #9C74F5;text-align:center;">
                <?php echo '<a style="color: #9C74F5;" href="dietchart.php?client_id=' . $client_id . '">' ?>
                <div class="topbar"
                    style="display: flex;flex-direction: column;justify-content: space-between;margin-top: -37px;height: 100%;">
                    <div>
                        Diet Chart
                    </div>
                    <div>
                        <img src="<?= $DEFAULT_PATH ?>assets/images/Clipboard.svg" style="width:60%;" alt="">
                    </div>
                    <div>
                        Plan your diet
                    </div>
                </div>
                </a>
            </div>

            <div class="col " style="border: 1px solid #E375B3;
        color: #E375B3;text-align:center;">
                <?php echo '<a style="color: #E375B3;" href="client_matrics.php?client_id=' . $client_id . '">' ?>
                <div class="topbar"
                    style="display: flex;flex-direction: column;justify-content: space-between;margin-top: -37px;height: 100%;">
                    <div>
                        Metrics
                    </div>
                    <div>
                        <img src="<?= $DEFAULT_PATH ?>assets/images/Combo Chart.svg" style="width:60%;" alt="">
                    </div>
                    <div>
                        Check progress
                    </div>
                </div>
                </a>
            </div>



            <div class="col " style="border: 1px solid #76A5FF;
        color: #76A5FF;text-align:center;">
                <?php echo '<a style="color:#76A5FF;" href="mealTracker.php?client_id=' . $client_id . '">' ?>
                <div class="topbar"
                    style="display: flex;flex-direction: column;justify-content: space-between;margin-top: -37px;height: 100%;">
                    <div>
                        Tracker
                    </div>
                    <div style="display:flex;justify-content:center;margin-left:2.5rem">
                        <img src="<?= $DEFAULT_PATH ?>assets/images/Cutlery.svg" style="width:67%;" alt="">
                    </div>
                    <div>
                        Track Meal
                    </div>
                </div>
                </a>
            </div>

            <div class="col " style="border: 1px solid #1FB688;
        color: #1FB688;text-align:center;">
                <?php echo '<a style="color: #1FB688;" href="nameofpage.php?client_id=' . $client_id . '">' ?>
                <div class="topbar"
                    style="display: flex;flex-direction: column;justify-content: space-between;margin-top: -37px;height: 100%;">
                    <div>
                        Health Details
                    </div>
                    <div>
                        <img src="<?= $DEFAULT_PATH ?>assets/images/Health Report.svg" style="width:60%;" alt="">
                    </div>
                    <div>
                        Form,Document
                    </div>
                </div>

                </a>
            </div>
            <div class="col " style="border: 1px solid #FFA381;
        color: #FFA381;text-align:center;">
                <?php echo '<a style="color: #FFA381;" href="chat_home.php?client_id=' . $client_id . '">' ?>
                <div class="topbar"
                    style="display: flex;flex-direction: column;justify-content: space-between;margin-top: -37px;height: 100%;">
                    <div>
                        Chats
                    </div>
                    <div>
                        <img src="<?= $DEFAULT_PATH ?>assets/images/Chat Bubble.svg" style="width:60%;" alt="">
                    </div>
                    <div>
                        Chat with ...
                    </div>
                </div>
                </a>
            </div>




            <div class="box">
                <div class="image">
                    <img src="<?= $DEFAULT_PATH ?>assets/images/invertedcoma.svg" style=" padding: 10 90px; ">
                    <img src="<?= $DEFAULT_PATH ?>assets/images/invertedcoma1.svg" style=" padding: 90 0px; ">
                </div>

                <p style="font-size:48px;font-weight:400">NEVER GIVE UP ! GREAT THINGS TAKE TIME. </p>
            </div>
        </div>


        <?php require('constant/scripts.php'); ?>
</body>

</html>