<?php
//error_reporting(0);
include('navbar.php');

// Get ID
if (isset($_SESSION['dietitianuserID'])) {
    $dietitian_id = $_SESSION['dietitianuserID'];
    $user = $_SESSION['dietitianuserID'];
    $sql = "SELECT * FROM addclient WHERE dietitianuserID='$user'";
    $q = "SELECT * FROM create_event WHERE dietitianuserID='$user'";
    $result = $conn->query($sql);
    $req = $conn->query($q);
    if (mysqli_num_rows($result) < 1 && mysqli_num_rows($req) < 1) {
        header('Location: index_default.php');
    }

    # database connection file
    include 'assets/app/db.conn.php';

    include 'assets/app/helpers/user.php';
    include 'assets/app/helpers/conversations.php';
    include 'assets/app/helpers/timeAgo.php';
    include 'assets/app/helpers/last_chat.php';
    include 'assets/app/helpers/timeHM.php';


    # Getting User data data
    $user = getUser($_SESSION['dietitianuserID'], $conn);

    # Getting User conversations
    $conversations = getConversation($user['dietitian_id'], $conn);
} else {
    header('Location:  login.php');
}
// Configure Dates
date_default_timezone_set("Asia/Calcutta");
$date = new DateTime();

function fetchData1($query)
{
    // echo $query;
    include('constant/config.php');
    $result = $conn->query($query) or die("Query Failed");

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $conn->close();
    return ($data);
}
function fetchInformation1($client_id)
{
    date_default_timezone_set("Asia/Calcutta");
    $date = new DateTime();
    $data = array(
        'steps' => array(
            'goal' => 0,
            'progress' => 0,
        ),
        'heart' => array(
            // 'goal' => 0,
            'progress' => 0,
        ),
        'water' => array(
            'goal' => 0,
            'progress' => 0,
        ),
        'sleep' => array(
            'goal' => 0,
            'progress' => 0,
        ),
        'weight' => array(
            'goal' => 0,
            'progress' => 0,
        ),
        'calorie' => array(
            'goal' => 0,
            'progress' => 0,
        ),
    );
    $query = "SELECT steps FROM goals WHERE client_id = '$client_id'";
    $value = fetchData1($query);
    if (!empty($value)) {
        $data['steps']['goal'] = $value[0]['steps'];
    } else {
        $data['steps']['goal'] = 0;
    }
    $query = "SELECT water FROM goals WHERE client_id = '$client_id'";
    $value = fetchData1($query);
    if (!empty($value)) {
        $data['water']['goal'] = $value[0]['water'];
    } else {
        $data['water']['goal'] = 0;
    }
    $query = "SELECT sleep FROM goals WHERE client_id = '$client_id'";
    $value = fetchData1($query);
    if (!empty($value)) {
        $data['sleep']['goal'] = $value[0]['sleep'];
    } else {
        $data['sleep']['goal'] = 0;
    }
    $query = "SELECT weight FROM goals WHERE client_id = '$client_id'";
    $value = fetchData1($query);
    if (!empty($value)) {
        $data['weight']['goal'] = $value[0]['weight'];
    } else {
        $data['weight']['goal'] = 0;
    }
    $query = "SELECT calorie FROM goals WHERE client_id = '$client_id'";
    $value = fetchData1($query);
    if (!empty($value)) {
        $data['calorie']['goal'] = $value[0]['calorie'];
    } else {
        $data['calorie']['goal'] = 0;
    }

    $query = "SELECT SUM(steps) FROM steptracker WHERE client_id= '$client_id' AND `dateandtime` >= '{$date->format('y-m-d')} 00:00:00' AND `dateandtime` <= '{$date->format('y-m-d')} 23:59:59'";
    $value = fetchData1($query);
    if ($value[0]['SUM(steps)'] != '') {
        $data['steps']['progress'] = $value[0]['SUM(steps)'];
    } else {
        $data['steps']['progress'] = 0;
    }

    $query = "SELECT avg(average) FROM heartrate WHERE client_id= '$client_id' AND `dateandtime` >= '{$date->format('y-m-d')} 00:00:00' AND `dateandtime` <= '{$date->format('y-m-d')} 23:59:59'";
    $value = fetchData1($query);
    if ($value[0]['avg(average)'] != '') {
        $data['heart']['progress'] = $value[0]['avg(average)'];
    } else {
        $data['heart']['progress'] = 0;
    }

    $query = "SELECT SUM(drinkConsumed) FROM watertracker WHERE client_id= '$client_id' AND  `dateandtime` = '{$date->format('y-m-d')}'";
    $value = fetchData1($query);
    if ($value[0]['SUM(drinkConsumed)'] != '') {
        $data['water']['progress'] = $value[0]['SUM(drinkConsumed)'];
    } else {
        $data['water']['progress'] = 0;
    }

    $query = "SELECT SUM(hrsSlept) FROM sleeptracker WHERE client_id= '$client_id' AND `sleeptime` >= '{$date->format('y-m-d')} 00:00:00' AND `waketime` <= '{$date->format('y-m-d')} 23:59:59'";
    $hours = fetchData1($query)[0]['SUM(hrsSlept)'];
    $query = "SELECT SUM(minsSlept) FROM sleeptracker WHERE client_id= '$client_id' AND `sleeptime` >= '{$date->format('y-m-d')} 00:00:00' AND `waketime` <= '{$date->format('y-m-d')} 23:59:59'";
    $mins = fetchData1($query)[0]['SUM(minsSlept)'];
    $data['sleep']['progress'] = (float) $hours + $mins / 60;

    $query = "SELECT avg(weight) FROM weighttracker WHERE client_id= '$client_id' AND `dateandtime` >= '{$date->format('y-m-d')} 00:00:00' AND `dateandtime` <= '{$date->format('y-m-d')} 23:59:59'";
    $value = fetchData1($query);
    if ($value[0]['avg(weight)'] != '') {
        $data['weight']['progress'] = $value[0]['avg(weight)'];
    } else {
        $data['weight']['progress'] = 0;
    }

    $query = "SELECT SUM(caloriesconsumed) FROM calorietracker WHERE client_id= '$client_id' AND `dateandtime` >= '{$date->format('y-m-d')} 00:00:00' AND `dateandtime` <= '{$date->format('y-m-d')} 23:59:59'";
    $value = fetchData1($query);
    if ($value[0]['SUM(caloriesconsumed)'] != '') {
        $data['calorie']['progress'] = $value[0]['SUM(caloriesconsumed)'];
    } else {
        $data['calorie']['progress'] = 0;
    }

    return $data;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
        @font-face {
            font-family: 'NATS';
            src: url('<?= $DEFAULT_PATH ?>assets/fonts/NATS.ttf.woff') format('woff'),
                url('<?= $DEFAULT_PATH ?>assets/fonts/NATS.ttf.svg#NATS') format('svg'),
                url('<?= $DEFAULT_PATH ?>assets/fonts/NATS.ttf.eot'),
                url('<?= $DEFAULT_PATH ?>assets/fonts/NATS.ttf.eot?#iefix') format('embedded-opentype');
            font-weight: normal;
            font-style: normal;
        }


        body {
            font-family: 'NATS', sans-serif !important;
            margin: 0;
        }

        .dashboard {
            margin-top: 2rem;
            margin-left: 17rem;

            display: flex;
            flex-direction: column;
            gap: 1rem;

        }

        .dashboard_comtainer1 {
            display: flex;

            justify-content: space-between;
        }

        .container2_rightside {
            display: flex;
            gap: 1rem;
            margin-right: 4rem;
            margin-top: 10px;
        }

        .btn-add {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .addbutton {
            margin-top: 0.5rem;
            display: flex;
            justify-content: space-between;
        }

        #addbutton {
            display: none;
        }

        #btn1 {
            border: none;
            background-color: #0177FD;
            color: white;
            padding: 0.4rem;
            border-radius: 100%;
            font-size: 1.8rem;
            padding-left: 1.1rem;
            padding-right: 1.1rem;
            position: relative;
        }

        #addbtn {
            border-radius: 0.7rem;
            background-color: white;
            box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, 0.25);
            border: none;
            padding: 0.5rem;
            padding-left: 2.5rem;
            padding-right: 2.5rem;
            margin-left: 5px;
            margin-right: 5px;
        }

        .dashboard_container2 {
            display: flex;
            gap: 2rem;
            /* max-width: 100%;
            overflow-x: scroll;
            overflow-y: hidden; */
            padding-bottom: 20px;
        }

        /* .dashboard_container2::-webkit-scrollbar {
            width: 0.2em;
            background-color: transparent;
        }

        .dashboard_container2::-webkit-scrollbar-thumb {
            width: 0.1em;
            background-color: #f1f1f1;
        } */

        .container2_wrapper {
            width: 226px;
            height: 188px;
            background-color: #7282FB;
            border-radius: 0.8rem;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            font-size: 19px;
        }

        .events-container {
            display: flex;
            gap:40px;
            overflow-x: auto; /* Add this to enable horizontal scrolling */
            min-width: 100%; /* Set a maximum width to prevent cards from expanding beyond the screen width */
            white-space: nowrap; /* Prevent cards from wrapping to the next line */
            overflow-x: auto;
            scrollbar-width: thin;
            scrollbar-color: #7282FB;
            flex-direction: column;
        }
        .events-container::-webkit-scrollbar {
            Width: 8px;
            height: 8px;
        }
        .events-container::-webkit-scrollbar-track{
            background-color: #e8ecf5;
        }
        .events-container::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color: #7272fb;
        }

        .box1 {
            background-color: #def9df !important;
            color: black !important;
        }

        .box2 {
            background-color: #f9cdca !important;
            color: black !important;
        }

        .box3 {
            background-color: #c5ccff !important;
            color: black !important;
        }

        .container2_upper {
            padding: 1rem;
            font-size: 18px;
            display: flex;
            gap: 4.3rem;
            /* justify-content: space-between; */
            font-weight: 400;
        }

        .container2_middle {
            margin-top: 0.5rem;
            text-align: center;
            margin-bottom: 25px;
            font-weight: 400;
            width: 226px;
            font-size: 25px;
        }

        .btn2 {
            border: none;
            color: #7282FB;
            background-color: white;
            border-radius: 1.5rem;
            font-size: smaller;
            padding: 0.3rem;
            padding-left: 1.2rem;
            padding-right: 1.2rem;
            /* margin-left: 2.7rem; */
            box-shadow: 1px 1px 2px 1px #3a4ae0;

        }

        .btn-bg-1 {
            border: #88C989 !important;
            color: #88C989 !important;
            box-shadow: 1px 1px 2px 1px #88C989 !important;

        }

        .btn-bg-2 {
            border: #fba39d !important;
            color: #fba39d !important;
            box-shadow: 1px 1px 2px 1px #fba39d !important;

        }

        .btn-bg-3 {
            border: #7282FB !important;
            color: #7282FB !important;
            box-shadow: 1px 1px 2px 1px #7282FB !important;

        }

        #details {
            color: #717171;
            border: none;
            background: none;

        }

        .details {
            /* margin-left: 45rem; */
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            border: none;
            margin-right: 3.9rem;
            font-size: 20px;
        }

        .dashboard_container3 {
            display: flex;
            margin-top: 0.5rem;
            margin-right: 0.5rem;
            justify-content: space-between;
            align-items: center;
        }

        .dashboard_container4 {
            margin-left: 0.4rem;
        }

        .container4_wrapper1 {
            display: flex;
            justify-content: flex-end;
            width: 95%;
            padding-right: 1.5rem;

        }

        .symbols-container,
        .values-container {
            display: flex;
            font-weight: 400;
            justify-content: flex-end;
            width: 77%;
            align-items: center;
            font-size: 20px;
            padding-right: 0px;
        }
        .values-container {
            width: 79%;
        }

        .material-symbols-outlined {
            margin-top: 0.1rem;
            margin-right: 0.3rem;
        }

        .symbols {
            display: flex;
            gap: 0.1rem;
            margin-right: 5px;
            justify-content: center;
        }

        .symbols.col-2 img {
            scale: 0.7;
        }

        .symbols span {
            min-width: 79px;
        }

        .container4_wrapper2 {
        display: flex;
        background-color: #FDFDFD;
        border: 1px solid #e4e1e1;
        width: fit-content;
        padding: 0.7rem;
        padding-left: 1rem;
        padding-right: 1.5rem;
        border-radius: 0.5rem;
        margin-top: 1rem;
        justify-content: space-between;
        width: 95%;
        margin-left: -4px;

    }

        .values {
            margin-top: 2rem;
            background-color: #FDFDFD;
            color: #454545;
            font-weight: 300;
            border: none;
        }

        .dashboard_container5 {
            display: flex;
            gap: 2rem;
            justify-content: space-between;
            margin-top: 1rem;
            margin-bottom: 5rem;
            margin-right: 3rem;
        }

        .tasklist {
            display: flex;
            justify-content: space-between;

        }

        .list_tasklist {
            width: 100%;
            background-color: #FDFDFD;
            margin-left: 0rem;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            border-radius: 11.155px;
            border: 0.93px solid #F4F4F4;
            box-shadow: 0px 59.49519348144531px 59.49519348144531px -59.49519348144531px rgba(50, 50, 50, 0.11);
        }

        .down2 a {
            width: 5vw;
        }

        #btn6 {
            border: none;
            background-color: white;
            padding: 0.5rem;
            width: 213px;
            font-weight: 500;
            border-radius: 0.6rem;
        }

        #btn6:hover {
            background-color: #7282FB;
            color: white;
            border-radius: 0.5rem;

        }

        #btn7 {
            border: none;
            background-color: white;
            padding: 0.5rem;
            width: 213px;
            font-weight: 500;
            border-radius: 0.6rem;
        }

        #btn7:hover {
            background-color: #7282FB;
            color: white;
            border-radius: 0.5rem;

        }

        .active-btn {
            color: #fff;
            background-color: #7282FB !important;
        }

        .list_tasklist_container {
            display: flex;
            gap: 1rem;
            margin: 1.5rem;
            padding: 0.5rem;
            background-color: white;
            border-radius: 0.6rem;


        }

        .small-text-message {
            font-size: 1rem;
            color: rgba(0, 0, 0, 0.45);
        }

        #today_tasks,
        #upcoming_tasks {
            display: none;
        }



        .tasklist_wrapper2 {
            display: flex;
            flex-direction: column;
            font-size: 1rem;
        }

        .tasklist_wrapper3 {
            margin-left: 6rem;
        }

        .messages {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            min-height: 271px;
            padding: 0.5rem;
            background-color: #FDFDFD;
            padding: 1rem;
            border-radius: 11.155px;
            border: 0.93px solid #F4F4F4;
            box-shadow: 0px 59.49519348144531px 59.49519348144531px -59.49519348144531px rgba(50, 50, 50, 0.11);
        }

        .mobile-card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-right: 3rem;
        }

        .mobileview_clientprogress {
            display: none;
        }

        .steps {
            margin-top: 1rem;
        }

        #two {
            background-color: #0177FD;
            border-radius: 100%;
            padding: 0.09rem;
            color: white;
            padding-left: 0.3rem;
            padding-right: 0.3rem;
            font-size: 0.6rem;

        }

        .list1 {
            display: flex;
            gap: 13rem;
        }

        .list2 {
            display: flex;
            gap: 14rem;
        }

        #btn6:focus {
            background-color: #7282FB;
            color: white;
        }

        #btn7:focus {
            background-color: #7282FB;
            color: white;
        }

        h3 {
            font-size: 1.5rem;
        }

        @media screen and (max-width: 1050px) {
            .dashboard_container4 {
                display: none;
            }

            .mobileview_clientprogress {
                display: flex;
                flex-direction: column;
                gap: 1rem;
                box-shadow: 0 4px 7px rgba(0, 0, 0, 0.12);
                border-radius: 0.7rem;
                padding: 1rem;
                width: 280px;
                height: auto;

            }

            .dashboard_container3 {
                display: flex;
                flex-direction: column;
            }

            .details {
                margin-left: 1px;
            }

            .dashboard_container5 {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .tasklist {
                display: flex;
                justify-content: space-between;
                gap: 0 !important;
            }

            #btn6 {
                padding-left: 2rem;
                padding-right: 2rem
            }

            #btn7 {
                padding-left: 2rem;
                padding-right: 2rem;

            }

            .tasklist_wrapper3 {
                margin-left: 0.5rem;
            }


            .list1 {
                display: flex;
                gap: 8rem;
            }

            .list2 {
                display: flex;
                gap: 9rem;
            }

            #addbtn {
                border-radius: 0.7rem;
                background-color: white;
                box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, 0.25);
                border: none;
                padding: 0rem;
                padding-left: 1rem;
                padding-right: 1rem;
                position: relative;
                margin-left: 0.3rem;
                margin-top: 1rem;


            }

            .add {
                margin-top: 0.2rem;
                margin-left: 0% !important;
            }
        }

        @media screen and (max-width: 870px) {
            .container5_wrapper1, 
            .container5_wrapper2 {
                width: 100% !important;
            }
        }

        @media screen and (max-width: 720px) {
            .list_tasklist_container {
                padding: 0;
                margin: 0;

            }

            .symbols1 {
                margin-left: 1.5rem;
            }

            .down {
                padding-left: 3rem;
            }

            .up {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .details {
                margin: 0 !important;
            }

            .me {
                overflow: scroll;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 1rem;


            }

            .dashboard {

                display: flex;
                flex-direction: column;
                justify-content: center;
                margin-left: 2rem;
            }

            .dashboard_container2 {
                display: flex;
                gap: 1rem;
                margin-left: 3rem;
            }

            .symbols3 {
                margin-left: 1.5rem;

            }

            .symbols4 {
                margin-left: 2rem;

            }

            .symbols5 {
                margin-left: 1.5rem;

            }

            .symbols6 {
                margin-left: 2rem;

            }
        }

        .top-icon {
            width: 50px;
            height: 50px;
            background-color: #0177FD;
            border-radius: 50%;
            line-height: 50px;
            text-align: center;
            cursor: pointer;
        }

        .plus-icon {
            width: 25px;
            height: 25px;
            position: relative;
            transition: transform 0.3s ease;
            transition-timing-function: ease-in-out;
            cursor: pointer;
            line-height: 1.5;
            display: inline-block;
            vertical-align: middle;
        }

        .plus-icon::before,
        .plus-icon::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            background-color: white;
        }

        .plus-icon::before {
            width: 70%;
            height: 2px;
            margin-left: -35%;
            margin-top: -1px;
        }

        .plus-icon::after {
            width: 2px;
            height: 70%;
            margin-left: -1px;
            margin-top: -35%;
        }

        .rotate {
            transform: rotate(45deg);
            transition: transform 0.3s ease;
            transition-timing-function: ease-in-out;
        }

        .hyphen p {
            color: #454545;
            font-weight: 400;
            font-size: 18px;
            margin: 0;
        }

        #btn-onempty {
            background: #7282FB;
            border-radius: 10px;
            color: white;
            border: none;
            width: auto;
            padding: 0 37px 0 37px;
        }

        .btn-onempty {
            margin-left: 2rem;
            border: none;
            font-size: 24px;
        }

        .dashboard_container8 {
            background: #FDFDFD;
            border: 0.929612px solid #F4F4F4;
            box-shadow: 0px 59.4952px 59.4952px -59.4952px rgba(50, 50, 50, 0.11);
            border-radius: 11.1553px;
            width: 100%;
            margin-right: 4rem;
            height: 300px;
            margin-bottom: 20px;
        }
        
        .dashboard_container5 {}

        .dashboard_container9 {
            display: flex;
            flex-direction: column;
            align-items: center; 
            justify-content: center;
        }

        .container5_wrapper1 {
            width: 500px;
        }

        .container5_wrapper2 {
            width: 500px;
        }
        
    .create-cancel,
    .edit-cancel {
        height: 58px;
        background: #FFFFFF;
        border: 2px solid #6883FB;
        border-radius: 15px;
        font-size: 25px;
        text-transform: capitalize;
        width: 45%;
        color: #6883FB;
    }
    #create-pop,
        #edit-pop {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 30px 50px;
            width: 845px;
            height: 486px;
            background: #FFFFFF;
            border-radius: 15px;
            display: none;
        }
        #background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
    }
        .dialogpop {
            display: none;
            width:405px;
            margin:0px;
            position: absolute;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            animation: fadeInAnimation ease 0.3s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
            background-color: white;
/*            flex-direction: column ;*/
        }
        .list_tasklist_container{
            display: flex;
/*            max-width: 300px;*/
            max-height: 150px;
            gap: 1rem;
            margin: 1.5rem;
            padding: 0.5rem;
            background-color: white;
            border-radius: 0.6rem;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        }
        button.ep-top {
            width: 75%;
            border: none;
            height: 47px;
            background: #9C74F5;
            border-radius: 8px;
            font-size: 17.4667px;
            line-height: 150%;
            text-align: center;
            color: #FFFFFF;
        }

        .ep-bottom {
            width: 75%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        span.ep-delete {
            width: 45%;
            height: 35px;
            background: #FF2929;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 17.4667px;
            line-height: 150%;
            color: #FFFFFF;
            cursor: pointer;
        }

        span.ep-edit {
            width: 45%;
            height: 35px;
            background: #FFFFFF;
            border: 1px solid #9C74F5;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 17.4667px;
            line-height: 150%;
            color: #9C74F5;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="client-progress-container">
        
    </div>
    <div class="dashboard">


        <div class="dashboard_comtainer1">
            <div class="container1_leftside">
                <p style="font-size: 40px;font-weight: 400;margin-bottom: 0;">Dashboard</p>
                <p style="font-weight: 400;font-size:1.5rem">Upcoming Events</p>
            </div>
            <div class="container2_rightside">
                <div class="addbutton" id="addbutton">
                    <button id="addbtn" onclick="window.location.href='appointments.php'">Add Event</button>
                    <button id="addbtn" onclick="window.location.href='task_list.php'">Add Task</button>
                    <button id="addbtn" onclick="window.location.href='add_client.php'" class="add">Add Client</button>
                </div>
                <div id="icon-top" class="top-icon">
                    <div id="icon" class="plus-icon"></div>
                </div>
                <script>
                    var x = document.getElementById("addbutton");
                    var icon = document.getElementById("icon-top");
                    icon.onclick = function() {
                        if (x.style.display === "block") {
                            x.style.display = "none";
                        } else {
                            x.style.display = "block";
                        }
                        icon.classList.toggle("rotate");
                    }
                </script>
            </div>
        </div>
        
        <div class="events-container"> 
        <?php
            $today = new DateTime();
            $query = "SELECT * FROM `create_event` WHERE dietitianuserID = '{$dietitian_id}' AND start_date > '{$today->format('Y-m-d')} 00:00:00' ORDER BY start_date;";
            $up_event = fetchData1($query);
            ?>

             
                
            <div class="dashboard_container2">
                <?php
            if (!empty($up_event)) {
                $EC = count($up_event);
                $color = 0;
                for ($i = 0; $i < $EC; $i++) {
                    $time = new DateTime($up_event[$i]['start_date']);
                    
            ?> 
                <div class="container2_wrapper box<?php echo ($color) ?>">
                    <div class="container2_upper">
                        <span>      
                            <?php echo ($time->format('M d')) ?>
                        </span>
                        <span>
                            <?php echo ($time->format('h:i a')) ?>
                        </span>
                    </div>
                    <p class="container2_middle">
                        <?php echo (ucwords($up_event[$i]['eventname'])) ?>
                    </p>
                    <button class="btn2 btn-bg-<?php echo ($color) ?>">Join the call</button>
                </div>
            </div>

            <?php
                $color++;
                if ($color > 3) {
                    $color = 0;
                }
            }
            } else {
            ?> 
            <div class="dashboard_container2" style="text-align:center;margin:auto;gap:0;">
                <div style="font-size:24px;font-weight:400;color:#434343;">No Upcoming events currently!</div>
                <div class="btn-onempty">
                    <a href="appointments.php"><button id="btn-onempty">Check schedule</button></a>
                </div>
            </div>
            <?php
                }
            ?>
        </div>            

        <div class="dashboard_container3">
            <div style="font-size:1.8rem; font-weight: 400;margin-left: 2.5px;"> Client Progress</div>
            <div class="details">
                <a href="client_progress.php" ><button id="details">View All</button></a>
                <a href="client_detailed_progress.php"><button id="details">View Detailed Progress</button></a>
            </div>
        </div>
        <?php
        $query = "SELECT `client_id`,`name` FROM `addclient` WHERE dietitianuserID = '$dietitian_id' AND status = 1;";
        $data = fetchData1($query);
        ?>
        <div class="dashboard_container4">
            <div class="container4_wrapper1">
                <div style="width: 25%;"></div>
                <div class="symbols-container col-12">
                    <div class="symbols col-2"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame.svg" style="width:1.8rem"><span>Steps</span></div>
                    <div class="symbols col-2"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame-1.svg" style="width:2rem; margin-left:-18px;"><span>Heart Rate</span></div>
                    <div class="symbols col-2"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame-2.svg" style="width:1.8rem; margin-left:18px;"><span>Water</span></div>
                    <div class="symbols col-2"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame-3.svg" style="width:1.8rem; margin-left:18px;"><span>Sleep</span></div>
                    <div class="symbols col-2"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame-4.svg" style="width:1.8rem"><span>Weight</span></div>
                    <div class="symbols col-2"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame-5.svg" style="width:1.8rem"><span>Calories</span></div>
                </div>
            </div>
              
            <div id="placeholder" style="padding-left:20px;"></div> 
            </div>
            <?php
            //     }
            // }
            ?>
        <!-- </div> -->
        <!-- </div> -->




        <!----------------------------MOBILE VIEW OF CLIENT PROGRESSS-------------------->
        <div class="mobile-card-container">


            <?php
            if (!empty($data)) {
                $lim = 5;
                if ($lim > count($data)) {
                    $lim = count($data);
                }
                for ($i = 0; $i < $lim; $i++) {
                    $infom = fetchInformation1($data[$i]['client_id']);
            ?>
                    <div class="mobileview_clientprogress">



                        <div class="mob_wrapper1">
                            <span class="up"><a href="" style=" color:black;font-weight:500; border:none; margin-top:1rem;background-color:white; margin-left:1rem"><span><img src="<?= $DEFAULT_PATH ?>assets/images/ronald.svg" style="width:2rem;border-radius:1rem">
                                        <?php echo ($data[$i]['name']) ?></span></a></span>
                            <div class="row1" style="display:flex ; gap:2rem;justify-content:center ">
                                <div class="steps">
                                    <div class="symbols">
                                        <div style="color:#F6A682"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame.svg" style="width:1.8rem"></div>
                                        <div style="margin-top:0.2rem; font-weight:500"><span>Steps</span></div>
                                    </div>
                                    <a style="text-decoration:none;color:black;display:flex;justify-content:center" href="track_stats_steps.php?client_id=<?php echo ($data[$i]['client_id']) ?>"><span class="symbols1" style="font-size:0.9rem;color:#454545 left:3rem;"><?php echo ($infom['steps']['progress'] . '/' . $infom['steps']['goal']) ?></span></a>
                                </div>
                                <div class="steps">
                                    <div class="symbols">
                                        <div style="color:#EF80B2"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame-1.svg" style="width:1.8rem"></div>
                                        <div style="margin-top:0.2rem; font-weight:500"><span>Heart Rate</span></div>
                                    </div>
                                    <a style="text-decoration:none;color:black;display:flex;justify-content:center" href="track_stats_heart.php?client_id=<?php echo ($data[$i]['client_id']) ?>"><span class="symbols2" style="font-size:0.9rem;color:#454545"><?php echo ($infom['heart']['progress']) ?>
                                            bpm</span></a>
                                </div>
                            </div>

                            <div class="row2" style="display:flex ; gap:2rem;justify-content:center">
                                <div class="steps">
                                    <div class="symbols">
                                        <div style="color:#8FAFF3"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame-2.svg" style="width:1.8rem"></div>
                                        <div style="margin-top:0.2rem; font-weight:500"><span>Water</span></div>
                                    </div>
                                    <a style="text-decoration:none;color:black;display:flex;justify-content:center" href="track_stats_water.php?client_id=<?php echo ($data[$i]['client_id']) ?>"><span class="symbols3" style="font-size:0.9rem;color:#454545"><?php echo ($infom['water']['progress'] . '/' . $infom['water']['goal']) ?>
                                            ltrs</span></a>
                                </div>
                                <div class="steps">
                                    <div class="symbols">
                                        <div style="color:#7550E2"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame-3.svg" style="width:1.8rem"></div>
                                        <div style="margin-top:0.2rem; font-weight:500"><span>Sleep</span></div>
                                    </div>
                                    <a style="text-decoration:none;color:black;display:flex;justify-content:center" href="track_stats_sleep.php?client_id=<?php echo ($data[$i]['client_id']) ?>"><span class="symbols4" style="font-size:0.9rem;color:#454545"><?php echo ($infom['sleep']['progress'] . '/' . $infom['sleep']['goal']) ?>
                                            .hrs</span></a>
                                </div>
                            </div>

                            <div class="row3" style="display:flex ; gap:2rem;justify-content:center">
                                <div class="steps">
                                    <div class="symbols">
                                        <div style="color:#788F96"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame-4.svg" style="width:1.8rem"></div>
                                        <div style="margin-top:0.2rem; font-weight:500"><span>Weight</span></div>
                                    </div>
                                    <a style="text-decoration:none;color:black;display:flex;justify-content:center" href="track_stats_weight.php?client_id=<?php echo ($data[$i]['client_id']) ?>"><span class="symbols5" style="font-size:0.9rem;color:#454545"><?php echo ($infom['weight']['progress'] . '/' . $infom['weight']['goal']) ?>
                                            kg</span></a>
                                </div>
                                <div class="steps">
                                    <div class="symbols">
                                        <div style="color:#E388A0"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame-5.svg" style="width:1.8rem"></div>
                                        <div style="margin-top:0.2rem; font-weight:500"><span>Calories</span></div>
                                    </div>
                                    <a style="text-decoration:none;color:black;display:flex;justify-content:center" href="track_stats_calorie.php?client_id=<?php echo ($data[$i]['client_id']) ?>"><span class="symbols6" style="font-size:0.9rem;color:#454545"><?php echo ($infom['calorie']['progress'] . '/' . $infom['calorie']['goal']) ?>
                                            kcal</span></a>
                                </div>
                            </div>
                        </div>


                    </div>
            <?php
                }
            }
            ?>
        </div>


        <!----------------------------------------------------------------------------------------------------------------------------------->
        <div class="dashboard_container5">
            <div class="container5_wrapper1">
                <div class="tasklist">
                    <p style="font-size:1.5rem ; font-weight: 400; margin-top: -5px;margin-left: 2.5px;">My Task List
                    </p>
                    <span class="down"><a href="task_list.php" style="background:none; color:#717171; border:none">View All</a></span>
                </div>
                <div class="list_tasklist">
                    <div style="display: flex; justify-content: space-around; align-items:center;">
                        <button id="btn6" style="font-size: 20px; width:12vw; min-width:114px;" class="task-btn" onclick="openTask('btn6','today_tasks')">Today</button>
                        <button id="btn7" style="font-size: 20px; width:12vw; min-width:114px;" class="btn6 task-btn" onclick="openTask('btn7','upcoming_tasks')">Upcoming</button>
                    </div>
                    <div>
                        <div id="today_tasks" style="margin-bottom:30px;">
                            <?php
                            include('constant/config.php');
                            $query = "SELECT * FROM `dietitian_tasks` WHERE dietitianuserID = '{$dietitian_id}' AND date = '{$today->format('Y-m-d')}' ORDER BY date,start_time LIMIT 3";
                            $result = $conn->query($query);
                            $rowcount = mysqli_num_rows($result);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $start = "";
                                    $end = "";
                                    if ($row['start_time'] != '') {
                                        $start = date("g:i a", strtotime($row['start_time']));
                                    }
                                    if ($row['end_time'] != '') {
                                        $end = date("g:i a", strtotime($row['end_time']));
                                    }
                            ?>
                                    <!-- task -->
                                    <div class="list_tasklist_container">
                                        <div class="tasklist_wrapper1">
                                            <div><img src="<?= $DEFAULT_PATH ?>assets/images/foodrecipe.svg" style="width:2rem; background-color:#FDFDFD;border-radius:0.5rem"></div>
                                        </div>
                                        <div class="tasklist_wrapper2">
                                            <span style="font-weight:600">
                                                <?php echo ($row['title']) ?>
                                            </span>
                                            <span style="margin-botton:4rem; color:#717171"><?php echo ($start . ' to ' . $end) ?></span>
                                        </div>
                                        <div class="tasklist_wrapper3"><span class="material-symbols-outlined" style="font-weight:800">more_vert</span>
                                    </div>
                                    
                                    <div class="dialogpop">
                                        <button class="ep-top"
                                            onclick="add_to_calender(this,<?php echo ($row['task_id']) ?>)">Add to
                                            calender</button>
                                        <div class="ep-bottom">
                                            <span
                                                onclick="delete_task('tcard<?php echo ($row['task_id']) ?>',<?php echo ($row['task_id']) ?>)"
                                                class=" ep-delete">Delete</span>
                                            <span onclick="edit_task(<?php echo ($row['task_id']) ?>)" class=" ep-edit"
                                                id="edit-popup">Edit</span>
                                        </div>
                                    </div>
                                    </div>

                                    <!-- task -->
                                <?php
                                }
                            } else {
                                ?><div class="dashboard_container9">
                                    <div class="text" style="font-size:24px;font-weight:500;color:#434343;margin-top:40px; text-decoration:none !important;">No task created for today!</div>
                                    <a href="task_list.php"><button id="btn-onempty" style="margin-top: 18px;font-size:23px;">Create task</button></a>
                                </div> <?php
                                    }
                                        ?>
                        </div>
                        <div id="upcoming_tasks" style="margin-bottom:30px;">
                            <?php
                            include('constant/config.php');
                            $query = "SELECT * FROM `dietitian_tasks` WHERE dietitianuserID = '{$dietitian_id}' AND date > '{$today->format('Y-m-d')}' ORDER BY date,start_time LIMIT 3";
                            $result = $conn->query($query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $start = "";
                                    $end = "";
                                    if ($row['start_time'] != '') {
                                        $start = date("g:i a", strtotime($row['start_time']));
                                    }
                                    if ($row['end_time'] != '') {
                                        $end = date("g:i a", strtotime($row['end_time']));
                                    }

                            ?>
                                    <!-- task -->
                                    <div class="list_tasklist_container">
                                        <div class="tasklist_wrapper1">
                                            <div><img src="<?= $DEFAULT_PATH ?>assets/images/foodrecipe.svg" style="width:2rem; background-color:#FDFDFD;border-radius:0.5rem"></div>
                                        </div>
                                        <div class="tasklist_wrapper2">
                                            <span style="font-weight:600">
                                                <?php echo ($row['title']) ?>
                                            </span>
                                            <span style="margin-botton:4rem; color:#717171"><?php echo ($start . ' to ' . $end) ?></span>
                                        </div>
                                        <div class="tasklist_wrapper3"><span class="material-symbols-outlined" style="font-weight:800">more_vert</span></div>
                                        <div class="dialogpop">
                                        <button class="ep-top"
                                            onclick="add_to_calender(this,<?php echo ($row['task_id']) ?>)">Add to
                                            calender</button>
                                        <div class="ep-bottom">
                                            <span
                                                onclick="delete_task('tcard<?php echo ($row['task_id']) ?>',<?php echo ($row['task_id']) ?>)"
                                                class=" ep-delete">Delete</span>
                                            <span onclick="edit_task(<?php echo ($row['task_id']) ?>)" class=" ep-edit"
                                                id="edit-popup">Edit</span>
                                        </div>
                                    </div>
                                    </div>
                                <?php
                                }
                            } else {
                                ?><div class="dashboard_container9">
                                    <div class="text" style="font-size:24px;font-weight:500;color:#434343;margin-top:40px; text-decoration:none !important;">No Upcoming Task Created!</div>
                                    <a href="task_list.php"><button id="btn-onempty" style="margin-top: 18px; font-size:23px;">Create task</button></a>
                                </div> <?php
                                    }
                                        ?>
                        </div>
                    </div>
                </div>

            </div>


            <!-- chat -->

            <div class="container5_wrapper2">
                <div class="tasklist">
                    <p style="font-size:1.5rem ; font-weight: 400;margin-top: -5px">Messages</p>

                    <span class="down2"><a href="chat_home.php" style=" color:#717171 ; border:none">View All</a></span>
                </div>
                <!-- chat just added here -->
                <div class="d-flex flex-coloumn chat messages" style="padding:20px;">
                    <div class="">
                        <?php
                        $counter = 0;
                        if (!empty($conversations)) {
                            foreach ($conversations as $conversation) { ?>
                                <li class="list-group-item">
                                    <a href="chat_messages.php?user=<?= $conversation['dietitianuserID'] ?>" style="display: flex !important;align-items: center !important;justify-content: space-between ;">
                                        <div class="d-flex
                                        align-items-center">
                                        <?php if(!empty($conversation['p_p'])){ $imgSrc =$DEFAULT_PATH."assets/images/".$conversation['p_p'];}else{$imgSrc= $DEFAULT_PATH."assets/images/client1.svg";}?>
                                            <img src="<?= $imgSrc ?>" class="rounded-circle" style="width:40px">
                                            <h3 class="fs-xs m-2 text-dark">
                                                <?= $conversation['name'] ?><br>
                                                <small class="small-text-message">
                                                    <?php
                                                    echo lastChat($_SESSION['dietitian_id'], $conversation['dietitianuserID'], $conn);
                                                    ?>
                                                </small>

                                            </h3>
                                        </div>
                                        <div class="d-flex
                                        align-items-center " style="margin-left: auto;">
                                            <h3 class="fs-xs p-2 text-dark">

                                                <small class="small-text-message">
                                                    <?php
                                                    echo last_time($conversation['last_seen']);
                                                    ?>
                                                </small><br />
                                                <img class="" src="<?= $DEFAULT_PATH ?>assets/icons/DoubleTick.svg" style="width:16px">
                                            </h3>


                                        </div>
                                        <?php if (last_seen($conversation['last_seen']) == "1") { ?>
                                            <div title="online">

                                            </div>
                                        <?php } else { ?>
                                            <div title="offline">
                                            </div>
                                        <?php } ?>
                                    </a>
                                </li>
                            <?php
                                $counter++;
                                if ($counter == 4) {
                                    break;
                                }
                            }
                        } else { ?>
                            <div class="dashboard_container9" style="height:229px;">
                                <div style="font-size:24px;font-weight:500;color:#434343;">No message yet!</div>
                                <a href="chat_home.php" id="btn-onempty" style="margin-top: 18px;display:flex;align-items:center;justify-content:center;text-decoration:none; font-size:23px;">Start a chat</a>
                            </div>
                        <?php } ?>
                    </div>


                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                    <script>
                        $(document).ready(function() {

                            let lastSeenUpdate = function() {
                                $.get("assets/app/ajax/update_last_seen.php");
                            }
                            lastSeenUpdate();

                            setInterval(lastSeenUpdate, 10000);

                        });
                    </script>
                </div>
            </div>
        </div>

        <div id="background"></div>
	<div id="edit-pop">
	    <h2 id="pop-title">Edit a task</h2>
	    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
	        <input name="edit-task-id" hidden id="edit-task-id">
	        <div class="row">
	            <div class="col-6">
	                <div class="input-group">
	                    <div class="input">
	                        <label for="task-title">Title</labtiel>
	                            <input type="text" name="edit-task-title" id="edit-task-title"
	                                placeholder="Type the title here..." required>
	                    </div>
	                    <div class="input">
	                        <label for="task-description">Description</label>
	                        <textarea name="edit-task-description" id="edit-task-description" cols="30" rows="5"
	                            placeholder="Type the description here..." required></textarea>
	                    </div>
	                </div>
	            </div>
	            <div class="offset-1 col-5">
	                <div class="input-group">
	                    <div class="input">
	                        <label for="task-date">Date</label>
	                        <input type="date" name="edit-task-date" id="edit-task-date" required>
	                    </div>
	                    <div class="sub-input">
	                        <div class="input">
	                            <label for="task-from-time">From</label>
	                            <input type="time" name="edit-task-from-time" id="edit-task-from-time">
	                        </div>
	                        <div class="input">
	                            <label for="task-to-time">To</label>
	                            <input type="time" name="edit-task-to-time" id="edit-task-to-time">
	                        </div>
	                    </div>
	                    <div class="btns">
	                        <button id="edit-cancel" type="button" class="edit-cancel">Cancel</button>
	                        <button name="edit-submit" class="edit-submit" type="submit">Save</button>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </form>
	</div>
        <script>
            function openTask(b, id) {
                const taskbtn = document.getElementsByClassName('task-btn');
                taskbtn[0].classList.remove('active-btn');
                taskbtn[1].classList.remove('active-btn');
                document.getElementById('today_tasks').style.display = 'none';
                document.getElementById('upcoming_tasks').style.display = 'none';
                document.getElementById(id).style.display = 'block';
                const btn = document.getElementById(b);
                btn.classList.add('active-btn');
            }
            document.getElementById('btn6').click();

            const background = document.getElementById('background');
		
		const edit_pop = document.getElementById('edit-pop');

		const editcancel = document.getElementById('edit-cancel');

		    const showdialog = document.getElementsByClassName('material-symbols-outlined');
		    console.log(showdialog);
		    const dialogpop = document.getElementsByClassName('dialogpop');
		    console.log(dialogpop);
		    const tcard = document.getElementsByClassName('list_tasklist_container');
		    console.log(tcard);
		    for (let i = 0; i < showdialog.length; i++) {
		        showdialog[i].addEventListener('click', () => {

		            dialogpop[i].style.display = "flex";
		        });
		        document.addEventListener('click', function (event) {
		            if (tcard[i].offsetParent !== null) {
		                const isClickInside = tcard[i].contains(event.target);
		                if (!isClickInside) {
		                    dialogpop[i].style.display = 'none';
		                }
		            }
		        });
		    }

		    
		    editcancel.addEventListener('click', () => {
		        background.style.display = 'none';
		        edit_pop.style.display = 'none';
		    });

		    function delete_task(t, t_id) {
		                    const tcard = document.getElementById(t);
		                    tcard.remove();
		                    $.ajax({
		                        type: "POST",
		                        url: "index.php",
		                        data: {
		                            delete_task: true,
		                            t_id: t_id,
		                            dietitianuserID: '<?php echo ($_SESSION['dietitianuserID']) ?>'
		                        },
		                        success: function (data) {
		                            // Handle the response here
		                            // window.location.reload();
		                        }
		                    });
		                }
		    
		    function edit_task(t_id) {
		        const edit_task_id = document.getElementById('edit-task-id');
		        const edit_task_title = document.getElementById('edit-task-title');
		        const edit_task_desc = document.getElementById('edit-task-description');
		        const edit_task_date = document.getElementById('edit-task-date');
		        const edit_task_from_time = document.getElementById('edit-task-from-time');
		        const edit_task_to_time = document.getElementById('edit-task-to-time');
		        $.ajax({
		            type: "POST",
		            url: "index.php",
		            data: {
		                edit_task: true,
		                t_id: t_id,
		                dietitianuserID: "<?php echo $_SESSION['dietitianuserID']; ?>"
		            },
		            success: function (data) {
		                // Handle the response here
		                try {
		                    task = JSON.parse(data);
		                } catch (error) {
		                    console.log('Error parsing JSON:', error, data);
		                }
		                console.log(task);
		                console.log(task.task_id);
		                edit_task_id.value = task.task_id;
		                edit_task_title.value = task.title;
		                edit_task_desc.value = task.description;
		                edit_task_date.value = task.date;
		                edit_task_from_time.value = task.start_time;
		                edit_task_to_time.value = task.end_time;
		                background.style.display = 'block';
		                edit_pop.style.display = 'block';
		            }
		        });
		    }

		    function add_to_calender(dialog, task_id) {
		        $.ajax({
		            type: "POST",
		            url: "index.php",
		            data: {
		                add_calender: true,
		                task_id: task_id
		            },
		            success: function (data) {
		                // Handle the response here
		                console.log(data);
		                console.log(task_id);
		                dialog.parentElement.style.display = 'none';
		            }
		        });
		    }
        </script>

        <script>
        const update_stat=()=>{
            const container=document.getElementById("placeholder");
            $.ajax({
                type: 'POST',
                url: 'updating_stats.php',
                data:{
                    updating:0,
                    dietitian_id:<?=$_SESSION['dietitian_id']?>,
                },
                success: function(response) {
                    container.innerHTML=""
                    if (response!==''){
                        let a = JSON.parse(response);
                        if(Object.keys(a).length<=4){
                            Array.from(Object.keys(a)).map((ele)=>{
                                console.log("This is ele : ",a[ele]);
                                ele = JSON.parse(a[ele]);
                                let div = document.createElement('div');
                                div.classList='container4_wrapper2';
                                div.innerHTML = `
                                <div class="show">
                                    <span style="width: 25%;">
                                        <a href="" style="background-color:#FDFDFD; color:black;font-weight:600; font-size:20px; border:none; margin-top:1rem">
                                            <img src="<?= $DEFAULT_PATH ?>assets/images/ronald.svg" style="width:2rem; background-color:#FDFDFD;border-radius:1rem">
                                            ${ele['name']}</a>
                                    </span>
                                </div>
                                <div class="values-container col-12">
                                    <span class="col-2"><a href="track_stats_steps.php?client_id=`+ele['client_id']+` class="values"> ${ele['steps']['progress']} / ${ele['steps']['goal']}</a></span>
                                    <span class="col-2"><a href="track_stats_heart.php?client_id=${ele['client_id']}" class="values">${ele['heart']['progress'] } Bpm</a></span>
                                    <span class="col-2"><a href="track_stats_water.php?client_id=${ele['client_id'] }" class="values">${ele['water']['progress']} /  ${ele['water']['goal']} ltrs</a></span>
                                    <span class="col-2"><a href="track_stats_sleep.php?client_id=${ele['client_id']}" class="values">${Math.round(ele['sleep']['progress'], 2)} / ${ele['sleep']['goal']}hrs.</a></span>
                                    <span class="col-2"><a href="track_stats_weight.php?client_id=${ele['client_id']}" class="values">${ele['weight']['progress']} / ${ele['weight']['goal']}kg</a></span>
                                    <span class="col-2"><a href="track_stats_calorie.php?client_id=${ele['client_id'] }" class="values">${ele['calorie']['progress']} / ${ele['calorie']['goal'] }kcal</a></span>
                                </div>`;
                                container.appendChild(div);
                            })
                        }else{
                            for(let i=0;i<4;i++){
                                let keys = Object.keys(a);
                                console.log("This is a : ",a);
                                console.log("This is keys : ",keys);
                                console.log(keys[i]);
                                console.log(a[keys[i]]);
                                let ele = JSON.parse(a[keys[i]]);
                                console.log("This is ele : ",ele);
                                let div = document.createElement('div');
                                div.classList='container4_wrapper2';
                                div.innerHTML = `
                                <div class="show">
                                    <span style="width: 25%;">
                                        <a href="" style="background-color:#FDFDFD; color:black;font-weight:600; font-size:20px; border:none; margin-top:1rem">
                                            <img src="<?= $DEFAULT_PATH ?>assets/images/ronald.svg" style="width:2rem; background-color:#FDFDFD;border-radius:1rem">
                                            ${ele['name']}</a>
                                    </span>
                                </div>
                                <div class="values-container col-12">
                                    <span class="col-2"><a href="track_stats_steps.php?client_id=${ele['client_id']}" class="values"> ${ele['steps']['progress']} / ${ele['steps']['goal']}</a></span>
                                    <span class="col-2"><a href="track_stats_heart.php?client_id=${ele['client_id']}" class="values">${ele['heart']['progress'] } Bpm</a></span>
                                    <span class="col-2"><a href="track_stats_water.php?client_id=${ele['client_id'] }" class="values">${ele['water']['progress']} /  ${ele['water']['goal']} ltrs</a></span>
                                    <span class="col-2"><a href="track_stats_sleep.php?client_id=${ele['client_id']}" class="values">${Math.round(ele['sleep']['progress'], 2)} / ${ele['sleep']['goal']}hrs.</a></span>
                                    <span class="col-2"><a href="track_stats_weight.php?client_id=${ele['client_id']}" class="values">${ele['weight']['progress']} / ${ele['weight']['goal']}kg</a></span>
                                    <span class="col-2"><a href="track_stats_calorie.php?client_id=${ele['client_id'] }" class="values">${ele['calorie']['progress']} / ${ele['calorie']['goal'] }kcal</a></span>
                                </div>`;
                                container.appendChild(div);

                            }
                        }
                    }else{
                        container.innerHTML=`
                        <div class="container4_wrapper2">
                            <div class="hyphen" style="width:20%;text-align:center;">
                                <p>-</p>
                            </div>
                            <div class="values-container" style="width:80%">
                                <span class="col-2 hyphen" style="text-align:center;">
                                    <p>-</p>
                                </span>
                                <span class="col-2 hyphen" style="text-align:center;">
                                    <p>-</p>
                                </span>
                                <span class="col-2 hyphen" style="text-align:center;">
                                    <p>-</p>
                                </span>
                                <span class="col-2 hyphen" style="text-align:center;">
                                    <p>-</p>
                                </span>
                                <span class="col-2 hyphen" style="text-align:center;">
                                    <p>-</p>
                                </span>
                                <span class="col-2 hyphen" style="text-align:center;">
                                    <p>-</p>
                                </span>

                            </div>
                        </div>
                        `
                    }
                },
                complete: function() {
                    setTimeout(update_stat, 10000); // 5000 milliseconds = 5 seconds
                }
            });
        }
        update_stat();
        </script>
    </div></body>

</body>

</html>