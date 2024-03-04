<?php
require('constant/config.php');
// Client Id
if (isset($_GET['client_id'])) {
    $clientId = $_GET['client_id'];
} else {
    header('Location: index.php');
}
// Configure Dates
date_default_timezone_set("Asia/Calcutta");
$today = new DateTime();
// Goal Insertion
if (isset($_POST['savegoal'])) {
    $client = $_POST['clientid'];
    $dietition = $_POST['dietitian'];
    $goal = $_POST['setgoal'];
    $isSame = false;
    $query = "SELECT steps FROM `goals` WHERE `client_id` = '{$client}'";
    $result = $conn->query($query) or die('Query Failed');
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['steps'] == $goal) {
                $isSame = true;
                break;
            }
        }
    }
    if (!$isSame) {
        $query = "UPDATE `goals` SET `steps` = $goal WHERE `client_id` = '$client'";
        $result = $conn->query($query) or die("Query Failed");
        if ($conn->affected_rows == 0) {
            $query = "INSERT INTO `goals`(`dietitian_id`, `client_id`, `steps`) VALUES ('{$dietition}','{$client}','{$goal}')";
            $result = $conn->query($query) or die("Query Failed");
        }

        if ($result) {
            unset($_POST["savegoal"]);
            unset($_POST["setgoal"]);
            header("Location: track_stats_steps.php?client_id=$client");
        }
    }
}
// funtion to fetch
// This can be more Simple by String Concatination
function fetchDataSql($clientId, $from_date, $to_date, $isCustom = 0)
{
    require('constant/config.php');
    // For Sum of All Data Till Today
    if ($isCustom == 1) {
        $query = "SELECT SUM(steps) FROM steptracker WHERE client_id= '$clientId' AND 
                `dateandtime` <= '{$to_date} 23:59:59';";
        // for sum of Data between two dates
    } else if ($isCustom == 2) {
        $query = "SELECT SUM(steps) FROM steptracker WHERE client_id= '$clientId' AND 
                `dateandtime` >= '{$from_date} 00:00:00'
                AND `dateandtime` <= '{$to_date} 23:59:59';";
        ;
        // for average of data end to end (monthly)
    } else if ($isCustom == 3) {
        $query = "SELECT avg(steps) FROM steptracker WHERE client_id= '$clientId' AND 
            `dateandtime` >= '{$from_date} 00:00:00'
            AND `dateandtime` < '{$to_date} 00:00:00';";
        // for get latest goal from goals table
    } else if ($isCustom == 4) {
        $query = "SELECT steps FROM goals WHERE client_id = '$clientId'";
        // for getting past actvities 
    } else if ($isCustom == 5) {
        $query = "SELECT * FROM `steptracker` WHERE client_id = '$clientId' AND `dateandtime` >= '{$from_date} 00:00:00'
        AND `dateandtime` < '{$to_date} 23:59:59' ORDER BY dateandtime DESC;";
        // for average of data of one full day
    } else if ($isCustom == 6) {
        $query = "SELECT SUM(distance) FROM steptracker WHERE client_id= '$clientId' AND 
                `dateandtime` >= '{$from_date} 00:00:00'
                AND `dateandtime` <= '{$to_date} 23:59:59';";
        ;
        // for average of data end to end (monthly)
    } else if ($isCustom == 7) {
        $query = "SELECT SUM(calories) FROM steptracker WHERE client_id= '$clientId' AND 
                `dateandtime` >= '{$from_date} 00:00:00'
                AND `dateandtime` <= '{$to_date} 23:59:59';";
        ;
        // for average of data end to end (monthly)
    } else {
        $query = "SELECT avg(steps) FROM steptracker WHERE client_id= '$clientId' AND 
            `dateandtime` >= '{$from_date} 00:00:00'
            AND `dateandtime` <= '{$to_date} 23:59:59';";
    }
    $result = $conn->query($query) or die("Query Failed");
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $conn->close();
    return ($data);
}
if (isset($_POST['from_date']) and isset($_POST['to_date'])) {
    $CustomData = array(
        'value' => array(),
        'date' => array(),
        'range' => "",
    );
    $CustomDay_1 = new DateTime(substr($_POST['from_date'], 4, 11));
    $CustomDay_2 = new DateTime(substr($_POST['to_date'], 4, 11));
    $CustomData['range'] = $CustomDay_1->format('d M Y') . " - " . $CustomDay_2->format('d M Y');

    while ($CustomDay_2 >= $CustomDay_1) {
        $CustomDataValue = (int) fetchDataSql($clientId, $CustomDay_1->format('Y-m-d'), $CustomDay_1->format('Y-m-d'), 2)[0]['SUM(steps)'];

        array_push($CustomData['value'], $CustomDataValue);
        array_push($CustomData['date'], $CustomDay_1->format('d'));
        $CustomDay_1->modify("+1 day");
    }
    $CustomData = json_encode($CustomData);
    header('Content-Type: application/json');
    echo ($CustomData);
    exit();
}
?>
<?php include('navbar.php');
$dietition = $_SESSION['name']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Document</title>
</head>
<style>
.content {
    padding: 10px 20px;
    display: flex;
    flex-direction: column;
}

tst-left-t {
    padding-left: 3%;
}

.title {
    width: 96%;
    margin-left: 2rem;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 40px;
}

.heading p {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 32px;
    line-height: 68px;
    color: #000000;
    margin: 0;
}

.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 4%;
    padding-left: 1%;
}

.client-card {
    width: 100px;
    height: 120px;
    background: rgba(255, 255, 255, 0.8);
    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.15);
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    gap: 15px;
    margin-bottom: 15px;
}

.client-card a {
    display: flex;
    flex-direction: column;
    gap: 23px;
    height: 65%;
    margin-top: 15px;
}

.client-card-calorie {
    background: linear-gradient(37.35deg, #E2809B 0%, #EBD3C8 100%);
}

.client-card i {
    scale: 2;
}

.client-card a img {
    height: 30px;
    width: auto;
    margin-bottom: -15px;
}

.client-card p {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    font-size: 22px;
    margin: 0;
}

/* tst-left b */
.tst-left-b {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-direction: column;
    padding: 20px;
    gap: 30px;
}

/* Style the buttons that are used to open the tab content */
.tab {
    background-color: #f1f1f1;
    border: 1px solid #F8F5F5;
    max-width: 365px;
    width: 100%;
    height: 31px;
    border-top-left-radius: 1em;
    border-bottom-left-radius: 1em;
    border-top-right-radius: 1em;
    border-bottom-right-radius: 1em;
    position: relative;
}

.tablinks {
    background: #FFFFFF;
    border: 1px solid #FCFBFB;
    border-radius: 0px;
    width: 24%;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    transition: 0.3s;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 13px;
    line-height: 27px;
    color: #4D4D4D;
}

/* border for side buttons */
.graph_button_left {
    border-top-left-radius: 1em;
    border-bottom-left-radius: 1em;
    width: 28%;
}

.drop {
    position: absolute;
    color: #4D4D4D;
    top: 5px;
    left: 80px;
    margin-left: 8px;
    cursor: pointer;

}

#daterange {
    border: none;
    background: transparent;
    height: 0px;
    width: 0px;
    z-index: -1;
    position: absolute;
    left: 71px;
    top: 20px;
}

.graph_button_right {
    border-top-right-radius: 1em;
    border-bottom-right-radius: 1em;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #FF8B8B;
}

.tab button.active {
    background-color: #FF8B8B;
    color: white !important;
}

.graph {
    max-width: 487px;
    max-height: 240px;
    width: 100%;
    height: 100%;
    background: #FFFFFF;
    border: 1px solid #F1F1F1;
    box-shadow: 0px 5px 4px rgba(0, 0, 0, 0.16);
    border-radius: 11px;
    padding: 10px;
}

.tab_content {
    position: relative;
    display: none;
    width: 100%;
    height: 100%;
}

.tab_content canvas {
    width: 100%;
    height: 100%;
}

.i-button-box {
    position: absolute;
    top: 1%;
    right: -17%;
    cursor: pointer;
    display: flex;
    flex-direction: column;
}

.i-button-box span {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 19px;
    color: #9C74F5;
}

.i-pop {
    background: #ffffff;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 25px;
    line-height: 27px;
    position: absolute;
    right: -12%;
    top: 12%;
    box-shadow: 0px 1.74334px 13.0751px rgb(0 0 0 / 25%);
    border: 1px solid #EFEFEF;
    padding: 10px 15px;
    width: 500px;
    text-align: center;
    border-radius: 15px;
    display: none;
    transition: 2s ease-in-out;
}

/* Goal Dialog */
.tst-right {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    margin: 25px 0;
}

.set-goal {
    width: 100%;
    height: 100%;
    max-width: 380px;
    max-height: 450px;
    border: 1px solid #EFEFEF;
    background: url('./images/goal-bg.svg');
    background-repeat: no-repeat;
    background-position: inherit;
    box-shadow: 0px 1.74334px 13.0751px rgba(0, 0, 0, 0.25);
    border-radius: 13.0751px;
    position: relative;
    padding: 10px;
    display: flex;
    gap: 20px;
    flex-direction: column;
    align-items: center;
}

.set-goal .heading {
    position: relative;
    padding-left: 10px;
    width: 100%;
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
}

#g-set-success {
    position: absolute;
    top: 40px;
    right: 15px;
    font-size: 20px;
    letter-spacing: 2px;
}

.set-goal img {
    width: 211px;
    height: 166px;
}

.set-goal span {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 23px;
    line-height: 40px;
    color: #FF8B8B;
    margin-top: -10px;
}

.set-goal form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.set-goal input {
    width: 163px;
    height: 45px;
    border: 1px solid #DFDFDF;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.08);
    border-radius: 10px;
    padding: 8px 25px;
}

.set-goal input::placeholder {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 25px;
    color: #ABA3A3;
    text-align: center;
}

#save-goal {
    margin-top: 20px;
    border: none;
    width: 124px;
    height: 45px;
    background: linear-gradient(262.45deg, #FA8686 9.26%, #F1A680 93.19%);
    box-shadow: 0px 3.48718px 3.48718px rgba(0, 0, 0, 0.28);
    border-radius: 10px;
    color: #ffffff;
    font-size: 19px;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 500;
}

/* page down */
.tsd-left-t {
    padding: 25px 0 25px 10px;
}

.stats-btn-container {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 0 10px;
}

.stat-btn {
    height: 57.45px;
    width: 150px;
    background: #FFFFFF;
    border: 1px solid #F1F1F1;
    box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.08);
    border-radius: 16px;
    padding: 5px;
    display: flex;
    align-items: center;
    margin: 10px;

}

.stat-data {
    width: 100%;
    height: 100%;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
}

.stat-data .title {
    font-size: 18px;
    line-height: 0;
    color: #5D5D5D;
    margin-left: 15px;
}

.stat-data .value {
    font-size: 25px;
    line-height: 0;
    text-align: center;
    color: #000000;
    margin-left: 20px;
}

.stat-data .unit {
    font-size: 17px;
    line-height: 0;
    color: #6B6B6B;
    margin-left: 5px;
}

/* Table Activity */
.tsd-left-b {
    padding-left: 30px;
}

.tsd-left-b .heading {
    width: 100%;
    max-width: 549px;
    padding: 5px 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.tsd-left-b .heading p {
    font-size: 25px;
    line-height: 53px;
}

.tsd-left-b .heading span {
    font-size: 13px;
    font-weight: bold;
    color: #A4A4A4;
}

.heading-border {
    margin-top: -10px;
    width: 100%;
    max-width: 549px;
    height: 2px;
    background-color: #F5F5F5;
}

.activity-container {
    width: 100%;
    max-width: 549px;
    margin-top: 15px;
}

.activity-box {
    margin: 5px;
    width: 100%;
    display: flex;
    align-items: center;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    line-height: 0;
}

.activity-date {
    display: flex;
    flex-direction: column;
    width: 17%;
    justify-content: flex-end;
    align-items: center;
}

.activity-box .up {
    font-size: 20px;
    line-height: 10px;
    letter-spacing: 0.03em;
    color: #FF8B8B;
}

.activity-box .down {
    font-size: 23px;
    line-height: 49px;
    /* identical to box height */
    letter-spacing: 0.03em;
    color: #000000;
}

.activity-border {
    height: 50px;
    width: 5px;
    background-color: #FF8B8B;
    margin: 0 20px;
}

.activity-data {
    display: flex;
    flex-direction: column;
    width: 55%;
    align-items: center;
}

.activity-time {
    font-size: 19px;
    line-height: 40px;
    letter-spacing: 0.03em;
    color: #000000;
    opacity: 0.44;
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    height: 70px;
}

/* progress bar */
.tsd-right {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-end;
}

.tsd-right .heading {
    width: 100%;
    display: flex;
    justify-content: space-evenly;
}

.tsd-right .heading p {
    font-size: 22px;
    line-height: 28px;
    color: #000000;
}

.tsd-right .heading span {
    font-size: 16px;
    line-height: 28px;
    color: #FF8B8B;
}

.progress-bar-container {
    padding: 1rem 0rem;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    color: #000000;
    position: relative;
}

.pbc {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.left {
    margin-right: 20px;
}

.right {

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.right_div {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: #FF8B8B;
    border-radius: 10px;
    width: 120px;
    height: 56px;
    margin-top: 20px;
    color: #000000;
    padding: 5px;
}

.right_div span {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 18px;
    /* identical to box height */
    color: #FFFFFF;
}

.right_div p {

    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 19px;
    margin-block: -5px 0;
    color: #FFFFFF;
}

.total-consumed {
    background: #FF8B8B;
    border-radius: 10px;
    position: absolute;
    top: 20px;
    right: -110px;
}

.total-consumed span,
.total-remaining span {
    font-size: 20px;
    line-height: 0;
    letter-spacing: 0.03em;
    color: #000000;
}

.total-consumed p,
.total-remaining p {
    font-size: 20px;
    line-height: 50px;
    letter-spacing: 0.03em;
}

.total-consumed1 {
    background: #FF8B8B;
    border-radius: 10px;
    margin-top: 20px;
    position: absolute;
    top: 100px;
    right: -110px;
}

.total-consumed1 span,
.total-remaining span {
    font-size: 20px;
    line-height: 0;
    letter-spacing: 0.03em;
    color: #000000;
}

.total-consumed1 p,
.total-remaining p {
    font-size: 22px;
    line-height: 50px;
    letter-spacing: 0.03em;
}

.total-remaining {
    background: #FF8B8B;
    border-radius: 10px;
    position: absolute;
    bottom: -40px;
    right: -110px;
}

.progress-circle {
    width: 214px;
    height: 214px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.progress-circle-fill {
    width: 175px;
    height: 175px;
    border-radius: 50%;
    background: #FF8B8B;
}

.progress-circle-value {
    width: 175px;
    height: 175px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

}

.progress-circle-value span {

    font-size: 20px;
    line-height: 35px;
}

#progress-percent {

    font-size: 48px;
    line-height: 50px;
}

.progress-bottom {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    padding: 0 20px;
}

.progress-bottom-div {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

}

.progress-bottom-div span {

    color: #0A0A0A;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 20px;
}

.progress-bottom-div p {
    color: #FF8B8B;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 25px;
}

.colorid {
    color: #FFFFFF;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 26px;
    line-height: 55px;
}

/* -------------------- */

/* media */
@media (max-width:367px) {
    .tst-left-b {
        padding: 20px;
    }

    .tsd-left-t {
        padding-left: 0;
    }

    .tsd-left-b {
        padding-left: 0;
    }

    .tsd-right {
        scale: 0.8;
    }

    .progress-bar-container {
        scale: 0.8;
    }

    .graph_button_left {
        line-height: 14px;
    }

    .i-button-box {
        right: -21% !important;
    }

    .drop {
        top: 7px;
        left: 55px
    }

    .title {
        margin-left: 0rem !important;
    }
}

.client-card-steps {
    background: linear-gradient(208.27deg, rgba(255, 108, 108, 0.792) 43.71%, rgba(255, 92, 0, 0.416) 95.3%);
}

/*************************MEDIA QUERY FOR SMALL DEVICES ******************************/
@media screen and (min-width:367px) and (max-width: 720px) {
    .progress-bar-container {
        scale: 0.8;
    }

    .tsd-right {
        scale: 0.8;
    }

    .title {
        margin-left: 0rem !important;
    }

    .drop {
        top: 15px;
        margin-left: -43px;
    }

    .i-button-box {
        right: -14% !important;
    }
}

/****************************media query for mediun devices**************************************/
@media screen and (min-width: 720px) and (max-width: 1200px) {
    .tsd-right {
        scale: 0.8;
    }

    .i-button-box {
        right: -10%;
    }

    .left {
        margin-right: 5%;
    }
}
</style>

<body>
    <div class="content">
        <div class="row ts-top">
            
            <div class="col-lg-8 tst-left">
                <div class="tst-left-t">
                <div class="title">
                        <p style="margin:1rem 0rem;">Clients Stats</p>
                    </div>
                    <div class="card-container">
                        <div class="client-card client-card-steps"
                            style="color:#FF6C6CCA ;border: 1px solid #FF6C6CCA;">
                            <a href="track_stats_steps.php?client_id=<?php echo ($clientId) ?>">
                                <i class="fa-solid fa-shoe-prints" style="color:#FFFFFF; rotate: -90deg;"></i>
                                <p style="color: #FFFFFF;">Steps</p>
                            </a>
                        </div>
                        <div class="client-card" style="color:#E266A9; border: 1px solid #E266A9;">
                            <a href="track_stats_heart.php?client_id=<?php echo ($clientId) ?>">
                                <i style="color:#E266A9;" class="fa-solid fa-heart-pulse"></i>
                                <p style="color:#E266A9;">Heart<br>Rate</p>
                            </a>
                        </div>
                        <div class="client-card" style="color:#52A4FF; border: 1px solid #52A4FF;">
                            <a href="track_stats_water.php?client_id=<?php echo ($clientId) ?>">
                                <i style="color:#52A4FF;" class="fa-solid fa-droplet"></i>
                                <p style="color:#52A4FF;">Water</p>
                            </a>
                        </div>
                        <div class="client-card" style="color:#54AFAC; border: 1px solid #54AFAC ;">
                            <a href="track_stats_weight.php?client_id=<?php echo ($clientId) ?>">
                                <i style="color:#54AFAC;" class="fa-solid fa-weight-hanging"></i>
                                <p style="color:#54AFAC;">Weight<br>Track</p>
                            </a>
                        </div>
                        <div class="client-card" style="color:#7D5DE6; border: 1px solid #7D5DE6;">
                            <a href="track_stats_sleep.php?client_id=<?php echo ($clientId) ?>">
                                <i style="color:#7D5DE6;" class="fa-solid fa-moon"></i>
                                <p style="color:#7D5DE6;">Sleep</p>
                            </a>
                        </div>
                        <div class="client-card" style="color:#E3738D; border: 1px solid #E3738D;">
                            <a href="track_stats_calorie.php?client_id=<?php echo ($clientId) ?>">
                                <i class="fa-solid fa-stopwatch-20" style="color:#E3738D"></i>
                                <p style="color:#E3738D;">Calorie<br>Track</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="tst-left-b">
                    <div class="tab">

                        <button class="tablinks graph_button_left" onclick="openCity(event, 'London')">Custom
                            Dates</button>
                        <input id="daterange" type="date-range">
                        <i id="daterange-btn" class="drop fa-solid fa-caret-down"></i>

                        <button class="tablinks" onclick="openCity(event, 'Year')">Year</button>
                        <button class="tablinks" onclick="openCity(event, 'Month')">Month</button>
                        <button class="tablinks graph_button_right" onclick="openCity(event, 'Week')">Week</button>
                    </div>
                    <div class="graph">
                        <!-- Tab content -->
                        <div id="London" class="tab_content">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                            <canvas id="myChart"></canvas>
                            <div class="i-button-box">
                                <img class="i-button" src="<?= $DEFAULT_PATH ?>assets/images/i-button.svg" alt="">
                                <span>info</span>
                            </div>
                            <div id="london_pop" class="i-pop"></div>
                        </div>

                        <div id="Year" class="tab_content">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                            <canvas id="myChartYearly"></canvas>
                            <div class="i-button-box">
                                <img class="i-button" src="<?= $DEFAULT_PATH ?>assets/images/i-button.svg" alt="">
                                <span>info</span>
                            </div>
                            <div id="year_pop" class="i-pop"></div>
                        </div>

                        <div id="Month" class="tab_content">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                            <canvas id="myChartMonthly"></canvas>
                            <div class="i-button-box">
                                <img class="i-button" src="<?= $DEFAULT_PATH ?>assets/images/i-button.svg" alt="">
                                <span>info</span>
                            </div>
                            <div id="month_pop" class="i-pop"></div>
                        </div>

                        <div id="Week" class="tab_content">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                            <canvas id="myChartWeekly"></canvas>
                            <div class="i-button-box">
                                <img class="i-button" src="<?= $DEFAULT_PATH ?>assets/images/i-button.svg" alt="">
                                <span>info</span>
                            </div>
                            <div id="week_pop" class="i-pop"></div>
                        </div>

                        <script>
                        function openCity(evt, cityName) {
                            /* Declare all variables */
                            var i, tab_content, tablinks;

                            /* // Get all elements with class="tab_content" and hide them */
                            tab_content = document.getElementsByClassName("tab_content");
                            for (i = 0; i < tab_content.length; i++) {
                                tab_content[i].style.display = "none";
                            }

                            /* // Get all elements with class="tablinks" and remove the class "active" */
                            tablinks = document.getElementsByClassName("tablinks");
                            for (i = 0; i < tablinks.length; i++) {
                                tablinks[i].className = tablinks[i].className.replace(" active", "");
                            }

                            /* // Show the current tab, and add an "active" class to the button that opened the tab */
                            document.getElementById(cityName).style.display = "block";
                            evt.currentTarget.className += " active";
                        }

                        /* // Get the element with id="defaultOpen" and click on it */
                        document.getElementsByClassName('graph_button_right')[0].click();
                        </script>
                    </div>
                </div>
            </div>
            <?php $progressBarData = fetchDataSql($clientId, '', '', 4); ?>
            <div class="col-lg-4 tst-right">
                <div class="set-goal">
                    <div class="heading Water Intake Goal">
                        <p>Steps Goal </p>
                        <span>Daily Steps</span>
                        <span id="g-set-success"></span>
                    </div>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/steps_goal_run.svg" alt="">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <input hidden name="dietition" value="<?php echo ($dietition) ?>">
                        <input name="setgoal" value="<?= $progressBarData[0]['steps'] ?>" required min="1" type="number"
                            id="set-goal" placeholder="00000 Steps">
                        <input name="clientid" type="hidden" value="<?php echo ($clientId) ?>">
                        <button type="submit" name="savegoal" id="save-goal">Set</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row ts-down">
            <div class="col-lg-7 tsd-left">
                <div class="tsd-left-t">
                    <div class="stats-btn-container">
                        <div class="stat-btn">
                            <div class="stat-data">
                                <span class="title">Daily Count</span>
                                <span id="daily-count" class="value">
                                </span><span class="unit">Steps</span>
                            </div>
                        </div>
                        <div class="stat-btn">
                            <div class="stat-data">
                                <span class="title">Weekly Avg</span>
                                <span id="weekly-avg" class="value">
                                </span><span class="unit">Steps</span>
                            </div>
                        </div>
                        <div class="stat-btn">
                            <div class="stat-data">
                                <span class="title">Monthly Avg</span>
                                <span id="monthly-avg" class="value">
                                </span><span class="unit">Steps</span>
                            </div>
                        </div>
                        <div class="stat-btn">
                            <div class="stat-data">
                                <span class="title">Total</span>
                                <span id="total" class="value">
                                </span><span class="unit">Steps</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $pastActivityData = fetchDataSql($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 5);
                $k = 0;
                $j = count($pastActivityData);
                ?>
                <div class="tsd-left-b table-activity">
                    <div class="heading">
                        <p>Past Activity</p>
                        <a href="past_activities_steps.php?client_id=<?php echo ($clientId) ?>"><span>View
                                All</span></a>
                    </div>
                    <div class="heading-border"></div>
                    <div class="activity-container">
                        <?php while ($k < $j) {
                            $date = new DateTime($pastActivityData[$k]['dateandtime']);
                            ?>
                        <div class="activity-box">
                            <div class="activity-date">
                                <span class="up">
                                    <?php echo ($date->format('D')) ?>
                                </span>
                                <span class="down">
                                    <?php echo ($date->format('d')) ?>
                                </span>
                            </div>
                            <div class="activity-border"></div>
                            <div class="activity-data">
                                <span class="up">Walking</span>
                                <span class="down">
                                    <?php echo ($pastActivityData[$k]['steps']) ?> Steps
                                </span>
                            </div>
                            <div class="activity-time">
                                <span>
                                    <?php echo ($date->format('h:i A')) ?>
                                </span>
                            </div>
                        </div>
                        <?php $k++;
                        } ?>

                    </div>
                </div>
            </div>
            <?php 
            $progressBarData = fetchDataSql($clientId, '', '', 4);
            $calorieConsumed = fetchDataSql($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 2);
            if (empty($calorieConsumed)) {
                $calorieConsumed = 0;
            } else {
                $calorieConsumed = $calorieConsumed[0]['SUM(steps)'];
            }
            if (empty($progressBarData) or $progressBarData[0]['steps'] == 0) {
                $currentGoal = 0;
                $progressPercent = 0;
            } else {
                $currentGoal = $progressBarData[0]['steps'];
                $progressPercent = round(($calorieConsumed / $currentGoal) * 100, 2);
            }?>
            <div class="col-lg-5 tsd-right">
                <div class="heading">
                    <p>Daily Progress</p>
                    <a href="past_activities_steps.php?client_id=<?php echo ($clientId) ?>"><span>View
                            Activity</span></a>
                </div>
                <div class="pbc">
                    <div class="progress-bar-container">
                        <div class="left">
                            <div id="progress-percent" class="progress-circle">
                                <div class="progress-circle-fill">
                                    <div class="progress-circle-value"><span class="colorid pp"
                                            id="progress-percent">%</span><span>Of
                                            daily
                                            step goal</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="right_div">
                                <span>Daily goal</span>
                                <p id="dailyg">
                                </p>
                            </div>
                            <div class="right_div">
                                <span>Weekly goal</span>
                                <p id="weekg">
                                </p>
                            </div>
                            <div class="right_div">
                                <span>Monthly goal</span>
                                <p id="monthg">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bottom">
                        <div class="progress-bottom-div">
                            <span>
                                <img src="<?= $DEFAULT_PATH ?>assets/images/footsteps.svg" alt=""> Steps</span>
                            <p id="st">
                            </p>
                        </div>
                        <div class="progress-bottom-div">
                            <span>
                                <img src="<?= $DEFAULT_PATH ?>assets/images/distance.svg" alt=""> Distance</span>
                            <p  id="di">
                            </p>
                        </div>
                        <div class="progress-bottom-div">
                            <span>
                                <img src="<?= $DEFAULT_PATH ?>assets/images/fire.svg" alt=""> Burned</span>
                            <p  id="bu">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            const progressPercent = document.getElementById('progress-percent');
            progressPercent.style.setProperty("background",
                "conic-gradient(#FFE0D1 <?php echo (100 - $progressPercent) ?>% , #FF8B8B 0)");
            </script>
        </div>
    </div>
    <?php
    // To Get - Yearly data
    $year_pop = 0;
    $wholeYearData = array(
        'value' => array(),
        'month' => array()
    );
    $yearly_month = new DateTime();
    $yearly_last_month = new DateTime();
    $yearly_month->setDate($yearly_month->format('Y'), 01, 01);
    if ($today->format('m') == '01') {
        $yearly_month->setDate($yearly_month->format('Y') - 1, 01, 01);
        $yearly_last_month->setDate($yearly_last_month->format('Y') - 1, 12, 31);
        $year_pop = 1;
    }
    while ($yearly_last_month >= $yearly_month) {

        $yearly_Month_1 = $yearly_month->format('Y-m') . "-" . "01";
        $yearly_Month_2 = $yearly_month->format('Y-m') . "-" . $yearly_month->format('t');
        $yearly_Data = (int) fetchDataSql($clientId, $yearly_Month_1, $yearly_Month_2, 3)[0]['avg(steps)'];

        array_push($wholeYearData['value'], $yearly_Data);
        array_push($wholeYearData['month'], $yearly_month->format('M'));
        $yearly_month->modify('+1 month');
    }
    $month_pop = 0;
    $wholeMonthData = array(
        'value' => array(),
        'date' => array(),
    );
    $monthly_Month = new DateTime();
    $monthly_LastDay = new DateTime();
    $monthly_Month->modify("first day of this month");

    if ($today->format('d') == '01') {
        $monthly_Month->modify("first day of previous month");
        $monthly_LastDay->modify("last day of previous month");
        $month_pop = 1;
    }
    while ($monthly_LastDay >= $monthly_Month) {
        $monthly_Data = (int) fetchDataSql($clientId, $monthly_Month->format('Y-m-d'), $monthly_Month->format('Y-m-d'), 2)[0]['SUM(steps)'];

        array_push($wholeMonthData['value'], $monthly_Data);
        array_push($wholeMonthData['date'], $monthly_Month->format('d'));
        $monthly_Month->modify("+1 day");

    }
    // To Get - Weekly Data
    $week_pop = 0;
    $wholeWeekData = array(
        'value' => array(),
        'day' => array(),
    );
    $weekly_Day = new DateTime();
    $weekly_Day->modify('previous monday');
    $weekly_lastDay = new DateTime();

    if ($today->format('l') == "Monday") {
        $weekly_lastDay->modify('previous sunday');
        $week_pop = 1;
    }

    while ($weekly_Day <= $weekly_lastDay) {
        $weekly_Data = fetchDataSql($clientId, $weekly_Day->format('Y-m-d'), $weekly_Day->format('Y-m-d'), 2);

        array_push($wholeWeekData['value'], (int) $weekly_Data[0]['SUM(steps)']);
        array_push($wholeWeekData['day'], $weekly_Day->format('D'));
        $weekly_Day->modify("+1 day");
    }
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
    const london_pop = document.getElementById('london_pop');
    const year_pop = document.getElementById('year_pop');
    const month_pop = document.getElementById('month_pop');
    const week_pop = document.getElementById('week_pop');
    const i_buttons = document.getElementsByClassName('i-button');
    const i_pop = document.getElementsByClassName('i-pop');

    if (<?php echo ($year_pop) ?>) {
        year_pop.innerText =
            "As it is fresh year, we are showing you the previous year's data until the latest data is synced for this month!";
        london_pop.innerText =
            "As it is fresh year, we are showing you the previous year's data until the latest data is synced for this month!";
    } else {
        year_pop.innerText = "We are showing you the ongoing year's data and it keeps updating realtime!";
        london_pop.innerText = "We are showing you the ongoing year's data and it keeps updating realtime!";
    }

    if (<?php echo ($month_pop) ?>) {
        month_pop.innerText =
            "As it is fresh month, we are showing you the previous month's data until the latest data is synced for this month!";
    } else {
        month_pop.innerText = "We are showing you the ongoing month's data and it keeps updating realtime!";
    }

    if (<?php echo ($week_pop) ?>) {
        week_pop.innerText =
            "As it is fresh week, we are showing you the previous week's data until the latest data is synced for the week!";
    } else {
        week_pop.innerText = "We are showing you the ongoing week's data and it keeps updating realtime!";
    }


    for (let i = 0; i < i_buttons.length; i++) {
        i_buttons[i].addEventListener('mouseover', () => {
            i_pop[i].style.display = "Block";
        });
        i_buttons[i].addEventListener('mouseout', () => {
            i_pop[i].style.display = "none";
        });
    }
    // --------------Charts--------------
    // Default Chart (Function)
    const defaultChart = document.getElementById('myChart');

    function CustomChart_Data(from_date, to_date) {

        $.ajax({
            type: "POST",
            url: "track_stats_steps.php?client_id=<?php echo ($clientId) ?>",
            data: {
                from_date: from_date,
                to_date: to_date
            },
            success: function(result) {
                london_pop.innerHTML = "We are showing you the data in range <br>" + result['range'] + " !";
                window.customChart.destroy();
                window.customChart = new Chart(defaultChart, {
                    type: 'line',
                    data: {
                        labels: result['date'],
                        datasets: [{
                            fill: false,
                            lineTension: 0,
                            backgroundColor: "#FF8B8B",
                            borderColor: "#FF8B8B",
                            data: result['value'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    display: false,
                                },
                                ticks: {
                                    fontFamily: 'NATS',
                                    fontStyle: 'bold',
                                    fontSize: 11,
                                    fontColor: '#9D9D9D',
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    fontFamily: 'NATS',
                                    fontStyle: 'bold',
                                    fontSize: 13,
                                    fontColor: '#9D9D9D',
                                },
                            }],
                        },
                        legend: {
                            display: false,
                        },
                        tooltips: {
                            enabled: true,
                        },
                        layout: {
                            padding: {
                                left: 5,
                                right: 5,
                                top: 0,
                                bottom: 5,
                            },
                        },
                    }
                });
            }
        });
        document.getElementsByClassName('graph_button_left')[0].click();
    }
    const date_btn = document.getElementById('daterange-btn');
    date_btn.addEventListener('click', () => {
        fp.toggle();
    });
    const fp = flatpickr("input[type = date-range]", {
        maxDate: "today",
        dateFormat: "Y-m-d",
        mode: "range",
        onClose: [
            function(selectedDates) {
                CustomChart_Data(selectedDates[0], selectedDates[1]);
            }
        ]
    });

    window.customChart = new Chart(defaultChart, {
        type: 'line',
        data: {
            labels: [<?php echo ("'" . implode("','", $wholeYearData['month']) . "'") ?>],
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "#FF8B8B",
                borderColor: "#FF8B8B",
                data: [<?php echo (implode(', ', $wholeYearData['value'])) ?>],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    },
                    ticks: {
                        fontFamily: 'NATS',
                        fontStyle: 'bold',
                        fontSize: 11,
                        fontColor: '#9D9D9D',
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontFamily: 'NATS',
                        fontStyle: 'bold',
                        fontSize: 13,
                        fontColor: '#9D9D9D',
                    },
                }],
            },
            legend: {
                display: false,
            },
            tooltips: {
                enabled: true,
            },
            layout: {
                padding: {
                    left: 5,
                    right: 5,
                    top: 5,
                    bottom: 5,
                },
            },
        }
    });
    // Yearly Chart
    const yearlyChart = document.getElementById('myChartYearly');
    new Chart(yearlyChart, {
        type: 'line',
        data: {
            labels: [<?php echo ("'" . implode("','", $wholeYearData['month']) . "'") ?>],
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "#FF8B8B",
                borderColor: "#FF8B8B",
                data: [<?php echo (implode(', ', $wholeYearData['value'])) ?>],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    },
                    ticks: {
                        fontFamily: 'NATS',
                        fontStyle: 'bold',
                        fontSize: 11,
                        fontColor: '#9D9D9D',
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontFamily: 'NATS',
                        fontStyle: 'bold',
                        fontSize: 13,
                        fontColor: '#9D9D9D',
                    },
                }],
            },
            legend: {
                display: false,
            },
            tooltips: {
                enabled: true,
            },
            layout: {
                padding: {
                    left: 5,
                    right: 5,
                    top: 5,
                    bottom: 5,
                },
            },
        }
    });
    // Monthly Chart
    const monthlyChart = document.getElementById('myChartMonthly');
    new Chart(monthlyChart, {
        type: 'line',
        data: {
            labels: [<?php echo ("'" . implode("','", $wholeMonthData['date']) . "'") ?>],
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "#FF8B8B",
                borderColor: "#FF8B8B",
                data: [<?php echo (implode(', ', $wholeMonthData['value'])) ?>],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    },
                    ticks: {
                        fontFamily: 'NATS',
                        fontStyle: 'bold',
                        fontSize: 11,
                        fontColor: '#9D9D9D',
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontFamily: 'NATS',
                        fontStyle: 'bold',
                        fontSize: 12,
                        fontColor: '#9D9D9D',
                    },
                }],
            },
            legend: {
                display: false,
            },
            responsive: true,
            tooltips: {
                enabled: true,
            },
            layout: {
                padding: {
                    left: 5,
                    right: 5,
                    top: 5,
                    bottom: 5,
                },
            },
        }
    });
    // Weekly Chart
    const weeklyChart = document.getElementById('myChartWeekly');
    new Chart(weeklyChart, {
        type: 'line',
        data: {
            labels: [
                <?php
                echo ("'" . implode("','", $wholeWeekData['day']) . "'")
                    ?>
            ],
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "#FF8B8B",
                borderColor: "#FF8B8B",
                data: [<?php echo (implode(', ', $wholeWeekData['value'])) ?>],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    },
                    ticks: {
                        fontFamily: 'NATS',
                        fontStyle: 'bold',
                        fontSize: 13,
                        fontColor: '#9D9D9D',
                    },
                }],
                yAxes: [{
                    ticks: {
                        fontFamily: 'NATS',
                        fontStyle: 'bold',
                        fontSize: 12,
                        fontColor: '#9D9D9D',
                    },
                }],
            },
            legend: {
                display: false,
            },
            responsive: true,
            tooltips: {
                enabled: true,
            },
            layout: {
                padding: {
                    left: 5,
                    right: 5,
                    top: 5,
                    bottom: 5,
                },
            },
        }
    });
    </script>
    <script>
        const update_stat = ()=>{
            $.ajax({
                type: 'POST',
                url:"updating_stats.php",
                data:{
                    updating:2,
                    client_id:<?=$clientId?>
                },
                success:function(response){
                    document.getElementById("daily-count").innerHTML=(response['d']===null?0:response['d']);
                    document.getElementById("weekly-avg").innerHTML=(response['w']===null?0:response['w']);
                    document.getElementById("monthly-avg").innerHTML=(response['m']===null?0:response['m']);
                    document.getElementById("total").innerHTML=(response['t']===null?0:response['t']);
                    document.getElementsByClassName("pp")[0].innerHTML=(response['pp']===null?0:response['pp'])+"%";
                    document.getElementById("monthg").innerHTML=(response['mg']===null?0:response['mg']);
                    document.getElementById("weekg").innerHTML=(response['wg']===null?0:response['wg']);
                    document.getElementById("dailyg").innerHTML=(response['dg']===null?0:response['dg']);
                    document.getElementById("st").innerHTML=(response['st']===null?0:response['st']);
                    document.getElementById("di").innerHTML=(response['di']===null?0:response['di']);
                    document.getElementById("bu").innerHTML=(response['bu']===null?0:response['bu']);
                    const progressPercent = document.getElementById('progress-percent');
                    progressPercent.style.setProperty("background",
                    `conic-gradient(#63AEFF ${100-response['pp']}% , #B1D4Fa 0)`);
                },
                complete: function() {
                    setTimeout(update_stat, 5000); 
                },
                error: function(xhr, status, error) {
                    console.error('This is error:', error);
                }
            });
        }
        update_stat();
    </script>
</body>

</html>