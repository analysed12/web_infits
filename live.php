<?php
include('navbar.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Get the current date in the format 'Y-m-d'
$currentDate = date('Y-m-d');

// Modify the SQL query to include a WHERE clause for the current date
$sql = "SELECT * FROM create_meeting WHERE date = '$currentDate'";

$result = $conn->query($sql);

//$sql = "SELECT * FROM create_meeting";

//$result = $conn->query($sql);
if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $date = $_POST['mydate'];
    $time = $_POST['mytime'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO create_meeting (dietitian_id,title, description, date, time) VALUES ('{$_SESSION['dietitian_id']}','$title', '$desc', '$date','$time')";

    if ($conn->query($sql) === TRUE) {
        unset($_POST['save']);
        echo '<script>window.location.href="live.php";</script>';
        // echo "<script>console.log('New record created successfully');</scrit>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();


    // echo "<h1>".$title.$desc.$date.$time."</h1>";

    // header("location: ".$DEFAULT_PATH."live.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Infits | Live</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> -->

    <style>
        @font-face {
            font-family: 'NATS';
            src: url('font/NATS.ttf.woff') format('woff'),
                url('font/NATS.ttf.svg#NATS') format('svg'),
                url('font/NATS.ttf.eot'),
                url('font/NATS.ttf.eot?#iefix') format('embedded-opentype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'NATS', serif !important;
            font-weight: 400;
            overflow-x: hidden;

        }

        ::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #BBBBBB;
            opacity: 1;
            /* Firefox */
            padding: 1rem;
            font-size: 18px;
        }

        .live {
            display: flex;
            gap: 3rem;
        }

        .live_leftside {
            margin: 2rem;
            margin-left: 3rem;

        }

        .streaming_live {
            width: 652px;
            height: 203px;
            background: #FBFBFB;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
            border-radius: 15px;
            margin-top: 1rem;
            padding: 15px;
        }

        .schedule {
            font-size: 30px;
            font-weight: 400;
        }

        .calanderdatesize {
            font-size: 25px;
            font-weight: 400;
            margin-bottom: 15px;
            margin-top: -8px;
        }

        .go_live {
            width: 114px;
            height: 35px;
            border: none;
            color: white;
            background: #2667FF;
            box-shadow: 0px 8px 24px rgba(176, 190, 197, 0.32), 0px 3px 5px rgba(176, 190, 197, 0.32);
            border-radius: 8px;
            font-size: 21px;
        }

        .leftside_footer {
            display: grid;
            justify-content: space-evenly;
            grid-template-columns: repeat(3, minmax(auto, 1fr));
            margin-top: 1.5rem;

        }

        .left_wrapper1 {
            width: 163px;
            height: 238px;
            background: #FFFFFF;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
            border-radius: 14px;
            text-align: center;
            padding: 10px;
        }

        .btn_setreminder {
            width: 132px;
            height: 26px;
            background: #2667FF;
            border-radius: 8px;
            color: white;
            border: none;
            font-size: 15px;
            margin-top: 0.5rem;
        }

        .btn_joincall {
            width: 132px;
            height: 26px;
            background: #FFFFFF;
            border: 1px solid #2667FF;
            border-radius: 8px;
            color: #2667FF;
            margin-top: 0.5rem;
        }

        .live_rightside {
            margin: 2rem;

        }

        .live_rightside h4 {
            font-size: 28px;
            font-weight: 400;
            padding-left: 12px;
            margin-bottom: 17px;
        }

        .rightside_middle {
            margin-top: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .right_wrapper1 {
            margin-bottom: 15px;
            width: 324px;
            height: 90px;
            background: #FFFFFF;
            border: 1px solid #CCCCCC;
            border-radius: 15px;
        }

        .livebutton {
            width: 55px;
            height: 55px;
            border: none;
            border-radius: 50%;
            margin-left: 1rem;
            margin-top: 5px;
        }

        .live_footer {
            width: 333px;
            height: 97px;
            background: #FFFFFF;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);
            border-radius: 50px;
            color: #4B9AFB;
            font-size: 30px;
            padding: 18px 28px;
            display: flex;
            justify-content: center;
            padding-top: 19px;
        }

        .calendar {
            background: #FFFFFF;
            border: 1px solid #CCCCCC;
            border-radius: 15px;
        }

        .frm {
            width: 40vw
        }

        .modal {
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            transition: opacity 500ms;
            align-items: center;
        }

        .modal-content {
            width: 495px;
            left: 500px;
            top: 20px;
            background: #FFFFFF;
            border: 1px solid #DDD9D9;
            border-radius: 17px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        }

        .day:first-child {
            grid-column-start: 4;
        }

        .day {
            padding: 0.5em;
            text-align: center;
        }

        .day::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
        }

        .day[data-selected]::before {
            border-radius: 0.5em;
        }

        .day[data-selected="start"]::before {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .day[data-selected],
        .day[data-selected]~.day {
            color: white;
        }

        .day[data-selected]::before,
        .day[data-selected]~.day::before {
            background-color: var(--color-primary);
        }

        .day[data-selected="start"]~.day:not([data-selected="end"])::before {
            opacity: 0.5;
        }

        .day[data-selected="end"][data-selected="end"]::before {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .day[data-selected="end"]~.day {
            color: inherit;
        }

        .day[data-selected="end"]~.day::before {
            background-color: transparent;
        }

        .title {
            width: 443px;
            height: 48px;
            background: #FFFFFF;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
            border-radius: 7px;
            border: none;
        }

        .description {
            width: 442px;
            height: 113px;
            background: #FFFFFF;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
            border-radius: 7px;
            border: none;

        }

        .text_box {
            width: 152px;
            height: 40px;
            background: #FFFFFF;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
            border-radius: 7px;
            border: none;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 55px;
            height: 30px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .model-center {
            margin-top: 1.5rem;
            display: flex;

        }

        .cancel_btn {
            width: 176px;
            height: 48px;
            background: #FFFFFF;
            border: 2px solid #4B9AFB;
            border-radius: 10px;
            color: #4B9AFB;
            font-size: 24px;
        }

        .save_btn {
            width: 186px;
            height: 48px;
            background: #4B9AFB;
            border-radius: 10px;
            color: white;
            font-size: 24px;
            border: none;
        }

        .bottom_buttons {
            display: flex;
            gap: 2rem;
            justify-content: center;
            margin-top: 1.5rem;
            margin-bottom: 2rem;
        }

        .sliding-cal {

            position: relative;
            font-size: 24px;
            font-weight: 400;
            width: 495px;
            height: 86px;
            overflow: scroll;
            background: #FFFFFF;
            border: 1px solid rgba(225, 225, 225, 0.66);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);

        }

        #slider-content {

            position: absolute;
            display: flex;
            justify-content: space-around;
            height: 100%;
            display: flex;

        }

        .item {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            width: 80px;
            background-color: white;
            font-size: 22px;

        }

        .day {
            line-height: 0;
        }

        .date {
            line-height: 0;
        }

        .item:hover {

            border-radius: 50px;
            color: white;
            width: 59px;
            height: 84px;

            background: linear-gradient(180deg, #3861FB 0%, #3363FD 100%);
            cursor: pointer;
        }

        .sliding-cal::-webkit-scrollbar {
            display: none;
        }


        .sliding-cal {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }


        /*************************styles for calendar table*************************************/
        .light {
            border: 1px solid #CCCCCC;
            border-radius: 15px;
            background: #FFFFFF;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
            padding: 0.5rem;
        }

        #month-year-dropdown {
            display: inline-block;
            position: relative;
            font-size: 16px;
            color: #333;
            cursor: pointer;
            font-family: NATS;
            font-size: 23px;
            font-weight: 400;
        }

        #month-year-dropdown:hover {
            border-color: #aaa;
        }

        #month-year-dropdown:focus {
            border-color: #3e90ff;
            box-shadow: 0 0 0 2px #3e90ff;
            outline: none;
        }

        #month-year-dropdown .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: -70%;
            min-width: 150px;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            overflow-x: hidden;
            --bs-dropdown-padding-x: 1rem;
        }

        #month-year-dropdown .dropdown-menu::-webkit-scrollbar {
            width: 10px;
        }

        #month-year-dropdown .dropdown-menu::-webkit-scrollbar-track {
            background: #F3F3F3;
        }

        #month-year-dropdown .dropdown-menu::-webkit-scrollbar-thumb {
            background: #D6D6D6;
            border-radius: 10px;
        }

        #month-year-dropdown.show .dropdown-menu {
            display: block;
            padding: 0rem 2rem;
        }

        #month-year-dropdown .dropdown-menu .row {
            display: flex;
            flex-wrap: nowrap;
            align-items: center;
            justify-content: space-between;
            padding: 5px;
        }

        #month-year-dropdown .dropdown-menu .row .month {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 40px;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
            width: fit-content;
        }

        #month-year-dropdown .dropdown-menu .row .month:hover {
            background-color: #f4f4f4;
        }

        #month-year-dropdown .dropdown-menu .row .month.active {
            background-color: #3e90ff;
            color: #fff;
        }

        #month-year-dropdown .dropdown-menu .row .year {
            font-weight: bold;
            text-align: center;
            padding: 5px;
            width: fit-content;
        }

        #month-year-dropdown .dropdown-menu .row .prev-year,
        #month-year-dropdown .dropdown-menu .row .next-year {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
            width: fit-content;
        }

        #month-year-dropdown .dropdown-menu .row .prev-year:hover,
        #month-year-dropdown .dropdown-menu .row .next-year:hover {
            color: #333;
        }

        #calendar {
            margin-top: 10px;
        }

        table {
            width: 290px;
            border-collapse: unset;

        }

        #calendar td.todays {
            border: 1px solid #7282FB;
            border-radius: 50px !important;
        }

        th,

        td {
            padding: 5px;
            text-align: center;
            transition: all 0.2s ease-in-out;
            user-select: none;

        }

        td:hover {
            /* transform: scale(1.2); */
            /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); */
            user-select: none;
            /* color:black; */
            /* border-radius: 50%; */
        }

        td:hover {
            cursor: pointer;
            user-select: none;
            color: white;
            background-color: #3363FD;
            border-radius: 5px;
        }

        th {

            user-select: none;
            font-family: 'NATS';
            font-style: normal;
            font-weight: 400;
            font-size: 21px;
            line-height: 150%;
            color: #737373;
        }

        td.today {
            border: 2px solid #3e90ff;
            border-radius: 50px !important;

        }

        .leftside {

            background-color: rgba(114, 130, 251, 1) !important;/ border-bottom-left-radius: 28%;
            border-top-left-radius: 28%;
        }

        .rightside {
            background-color: rgba(114, 130, 251, 1) !important;
            border-top-right-radius: 28%;
            border-bottom-right-radius: 28%;
        }

        .color1 {
            background-color: rgba(179, 188, 251, 1) !important;
            border-radius: 0 !important;
        }

        /***************************calendar style end*********************************/



        @media screen and (max-width: 600px) {
            .streaming_live {
                /* width: 80vw !important; */
                font-size: 1rem !important;
                /* margin-right: 1vw; */
            }
        }

        @media screen and (max-width: 1200px) {
            .live {
                display: flex;
                flex-direction: column;
                gap: 0;
            }

            .btn-title {
                width: auto;
            }

            select option {
                text-align: center;
                background-color: #FBFBFB;
                font-size: 14px;
            }

        }

        @media screen and (max-width: 300px) {
            .bottom_buttons {
                display: flex;
                gap: 2rem;
                flex-direction: column;
                margin-top: 1.5rem;
                align-items: center;

            }

            .live_footer {
                justify-content: space-around !important;
            }

        }


        @media screen and (max-width: 720px) {
            .item {
                width: 80px !important;
            }

            .sliding-cal {
                width: 100% !important;
            }

            .modal-content {
                margin: 20px;
                left: 0;
                top: 0;
                width: auto;
                height: auto;

            }

            .title {
                width: 100%;
            }

            .description {
                width: 100%;
            }

            .model-center {
                margin-top: 1.5rem;
                display: flex;
                flex-direction: column;
                text-align: center;

            }

            .live {
                display: flex;
                flex-direction: column;
                gap: 0;
            }

            .live_leftside {
                margin-left: 2rem;
            }

            .streaming_live {
                width: auto;
                height: 220px;

            }

            .go_live {
                width: auto;
            }

            .leftside_footer {
                grid-template-columns: repeat(2, minmax(auto, 1fr));
            }

            .bottom_buttons {
                padding: 20px;
            }

            .live_footer {
                justify-content: end !important;
            }

            select option {
                text-align: center;
                background-color: #FBFBFB;
                font-size: 12px;
            }

            .live_rightside {
                margin-top: 3rem;
                margin: 0px 1rem;
            }

            .create-meet-btn {
                display: flex;
                justify-content: center !important;
            }
        }

        @media screen and (min-width:0px) and (max-width:720px) {
            .frm {
                width: 300px;
            }
        }

        @media screen and (min-width:0px) and (max-width:767px) {
            .form-check-label {
                float: right;
            }
        }

        td:not(.d) {
            visibility: hidden;

        }

        @media screen and (min-width:999px) {
            .live_footer {
                font-size: 2rem !important;
            }
        }
        @media screen and (min-width:900px) and (max-width: 1100px) {
            .streaming_live {
                width: 400px !important;
            }
        }

        @media screen and (min-width:721px) and (max-width: 899px) {
            .streaming_live {
                width: 50vw !important;
            }
        }

        @media screen and (max-width: 720px) {
            .streaming_live {
                width: 80vw !important;
                height: calc(170px + 4vw);
            }
            .go_live{
                width: 100px !important;
                /* padding: 1rem !important; */
            }
            

            .f1 {
                font-size: calc(20px + 1.05vw) !important;
            }
            .f2 {
                font-size: calc(17px + 0.8vw) !important;
            }
            .f3 {
                font-size: calc(10px + 1.05vw) !important;
            }
            .f4 {
                font-size: calc(8px + 0.8vw) !important;
            }
            
        }

        
    </style>
</head>

<body>
    <div class="live">
        <!------------------------------LEFTSIDE------------------------------------->
        <div class="live_leftside">
            <h1>Live</h1>
            <div class="streaming_live" style="width:40vw;max-width: 652px;">
                <div style="display:flex;justify-content:space-between"><span style="font-size:26px" class="f1">Now Streaming
                        Live</span>
                    <a style="background-color:none">

                        <form id="lobby__form">

                            <div class="form__field__wrapper">
                                <input style="display: none;" type="text" name="name" class="f2" value="<?php echo $_SESSION["name"]; ?>" />
                            </div>

                            <div class="form__field__wrapper">
                                <input style="display: none;" type="hidden" name="uniqueId" id="uniqueId" value="<?php echo uniqid($_SESSION["name"]); ?>" />
                                <button type="submit" class="go_live f2">Go Live</button>
                            </div>
                        </form>
                    </a>
                </div>
                <div style="margin-top:1rem;display:flex;gap:1rem;">
                    <img src="<?= $DEFAULT_PATH ?>assets/images/live-user-default.svg" style="border-radius:50%;width: 75.67px;height:75.67px;margin-top:0.5rem">
                    <div>
                        <p style="font-size:24px" class="f2">
                            <?php echo $_SESSION["name"]; ?>
                        </p>
                        <span style="font-size:14px;color: #A4A4A4;" class="f4">Lorem ipsum dolor sit amet,consectetur </span> <br>
                        <span style="font-size:14px;color: #A4A4A4;">adipiscing elit. Felis.</span>
                    </div>
                </div>
                <div style="float:right;font-size: 16px;" class="f3">+256 viewers</div>
            </div>
            <h4 style="margin-top:1.5rem" class="f2">Upcoming live calls</h4>



            <div class="leftside_footer">

                <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $min = new DateTime($row['time']);
                        echo


                        "<div class='left_wrapper1'>
                        <img src='" . $DEFAULT_PATH . "assets/images/live-user-default.svg' style='border-radius:50%;width: 54.67px;height:54.67px'>
                        <p style='font-size: 24px;line-height: 25px;' class='f2'> " . $row['title'] . "</p>
                        <div>
                            <div style='display:flex;justify-content:center;gap:0.3rem'><img src='" . $DEFAULT_PATH . "assets/images/Calendar.svg' style='width:17%' class='f3'> <span>" . $row['date'] . "</span></div>
                            <div class='f3' style='display:flex;gap:0.3rem;margin-top:0.3rem;padding: 0px 19px;'> <img src='" . $DEFAULT_PATH . "assets/images/Clock_live.svg' style='width:27%;'> <span>" . $min->format('h:i') . (substr($min->format('h:i a'), -2) === "pm" ? " p.m." : " a.m.") . "</span></div>
                        </div>
                        <a href='live_joincall.php' style='background-color:none'> <button class='btn_joincall'>Join Call</button></a>
                        <button class='btn_setreminder'>Set Reminder</button>
    
                    </div> ";
                    }
                }
                ?>


                <div class="left_wrapper1">
                    <img src="<?= $DEFAULT_PATH ?>assets/images/live-user-default.svg" style="border-radius: 50%; width: 54.67px; height: 54.67px; filter: invert(0);">
                    <p class='f2' style="font-size: 24px;line-height: 25px;">john</p>
                    <div>
                        <div class='f3' style="display:flex;justify-content:center;gap:0.3rem"><img src="<?= $DEFAULT_PATH ?>assets/images/Calendar.svg" style="width: 17%; filter: invert(0);"> <span>09/05/2022</span></div>
                        <div class='f3' style="display:flex;gap:0.3rem;margin-top:0.3rem;padding: 0px 19px;"> <img src="<?= $DEFAULT_PATH ?>assets/images/Clock_live.svg" style="width: 27%; filter: invert(0);"> <span>2:00 p.m.</span></div>
                    </div>
                    <a href="live_joincall.php" style="background-color:none"> <button class="btn_joincall f3">Join
                            Call</button></a>
                    <button class="btn_setreminder f3">Set Reminder</button>

                </div>


            </div>



        </div>

        <!------------------------------LEFTSIDE------------------------------------->

        <!------------------------------RIGHTSIDE------------------------------------->

        <div class="live_rightside">
            <h4 class="f1">Schedule meetings</h4>
            <!--------------------------------new calendar---------------------------------->
            <div class="d-flex justify-content-center">
                <div class="light">
                    <div id="month-year-dropdown">
                        <span id="selected-month-year" class="f2">Select a month and year</span>
                        <i class='fas fa-angle-down ms-1' style="color: #CCCCCC; font-size: x-small;"></i>
                        <div class="dropdown-menu">
                            <div class="row">
                                <div class="prev-year">&laquo;</div>
                                <div class="year"></div>
                                <div class="next-year">&raquo;</div>
                            </div>
                        </div>
                    </div>

                    <div id="calendar">
                        <!-- <input id="daterange" type="date-range"> -->
                    </div>
                </div>
            </div>



            <!-------CALENDER------------------------------------------------------------------------------------------->

            <div class="rightside_middle">
                <!-- <h1 id="meeting-title"></h1>
                <p id="meeting-description"></p>
                <p id="meeting-time"></p>
                <p id="meeting-date"></p> -->

                <!-- <div class="right_wrapper1">
                    <div style="padding:13px;display:flex;gap:1.5rem">
                        <img src="<?= $DEFAULT_PATH ?>assets/images/live-user-default.svg" style="border-radius:50%;width: 60.67px;height:60.67px">
                        <div>
                            <p style="font-size: 20px;margin-bottom:5px"><?php echo $_SESSION["name"]; ?></p>
                            <div style="display:flex;gap:1.2rem">
                                <div style="display:flex;justify-content:center;gap:0.4rem"><img src="<?= $DEFAULT_PATH ?>assets/images/Calendar.svg" style="width:27%"><span>09/05/2022</span></div>
                                <div style="display:flex;justify-content:center;gap:0.4rem"><img src="<?= $DEFAULT_PATH ?>assets/images/Clock_live.svg" style="width:22%"><span>2:00 p.m.</span></div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="d-flex justify-content-center">
                <!-- <div class="light"> -->
                <!-- Add a form to select a date -->
                <!-- <form method="POST" action="live.php">
                        <label for="selectedDate">Select a Date:</label>
                        <input type="date" id="selectedDate" name="selectedDate">
                        <input type="submit" value="Show Meetings">
                    </form> -->
                <?php
                // $servername = "localhost:3306";
                // $username = "root";
                // $password = "";
                // $dbname = "infits";

                //$title = $_POST['title'];
                //$desc = $_POST['desc'];
                //$date = $_POST['mydate'];
                //$time = $_POST['mytime'];

                // $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }



                function displayMeetings($conn, $selectedDate)
                {
                    $sql = "SELECT * FROM create_meeting WHERE date = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $selectedDate);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo "<h3>Meetings scheduled for $selectedDate:</h3>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<p>Title: " . htmlspecialchars($row['title']) . "<br>";
                            echo "Description: " . htmlspecialchars($row['description']) . "<br>";
                            echo "Time: " . htmlspecialchars($row['time']) . "</p>";
                            echo "<hr>";
                        }
                    } else {
                        echo "<p>No meetings scheduled for $selectedDate.</p>";
                    }

                    $stmt->close();
                }

                // Check if a date is selected and call the displayMeetings function
                if (isset($_POST['selectedDate'])) {
                    $selectedDate = $_POST['selectedDate'];
                    displayMeetings($conn, $selectedDate);
                }

                // $conn->close();
                ?>
                <div class="create-meet-btn d-flex justify-content-end" style="margin-bottom: 1rem;">
                    <div class="live_footer" style="margin-top:1rem">
                        <p class="btn-title pt-2 m" style="font-size: calc(1.2rem+0.5vw); margin-bottom:0.5rem">Create Meeting</p>
                        <a href="">
                            <button class="livebutton" id="livebutton">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/create-meeting.svg" style="width:99.5%; display: flex; align-items: center;">
                            </button>
                        </a>
                    </div>
                </div>
                <!-- </div> -->
                <!------------------------------RIGHTSIDE------------------------------------->

            </div>

            <!-----------------------------SCHEDULING LIVE-------------------------------->

            <div id="myModal" class="modal">

                <!--Modal content-->
                <div class="content d-flex justify-content-center align-items-center">
                    <form class="frm shadow p-3 mb-5 bg-body-tertiary rounded" method="post">
                        <div class="mb-3 text-center">
                            <h4>Scheduling Live</h4>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="desc" id="" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="col-md-6 ">
                                <div class="mb-3 d-flex align-items-center">
                                    <label class="form-label me-3">
                                        <h4><i class="bi bi-calendar-date"></i></h4>
                                    </label>
                                    <input type="date" name="mydate" class="form-control">
                                </div>
                                <div class="mb-3 d-flex align-items-center">
                                    <label class="form-label me-3">
                                        <h4><i class="bi bi-clock-fill"></i></h4>
                                    </label>
                                    <input type="time" name="mytime" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <div class="row d-flex justify-content-center">
                                        <div class="row">
                                            <label class="form-check-label" for="flexSwitchCheckChecked" style="padding-right:40px ;">Set Reminder</label>
                                        </div>
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <button class="btn btn-lg btn-outline-primary">Cancel</button>
                            <button type="submit" name="save" class="btn btn-lg btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>


        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("livebutton");

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                event.preventDefault(); //keeps page from refreshing
                modal.style.display = "block";
            }
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>



        <!-----------------------------SCHEDULING LIVE-------------------------------->
        <script>
            const Date_function = () => {
                var now = new Date();
                var value;
                const str = obtain_Date(now, 0);
                const startdate = new Date(str);

                const currentDate = new Date();
                const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();

                var i = 0;
                while (i < daysInMonth) {
                    value = obtain_Date(startdate, i);
                    days = ['Sun', 'Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat'];
                    console.log(value.getDate())
                    html = `<div class="item">
                            <div class="day">` + days[parseInt(value.getDay())] + `</div><br>
                            <div class="date">` + value.getDate() + `</div>
                            
                            </div>`
                    document.getElementById('slider-content').innerHTML += html;
                    i++;
                }
            }

            // Obtain specific dates -->
            const obtain_Date = (date, x) => {
                var newdate = new Date();
                newdate.setDate(date.getDate() + x)

                return newdate;
            }


            Date_function();


            const slider = document.querySelector('#slider-content');

            let sliderGrabbed = false;


            slider.addEventListener('mousedown', (e) => {
                sliderGrabbed = true;
                slider.style.cursor = 'grabbing';
            })

            slider.addEventListener('mouseup', (e) => {
                sliderGrabbed = false;
                slider.style.cursor = 'grab';
            })

            slider.addEventListener('mouseleave', (e) => {
                sliderGrabbed = false;
            })

            slider.addEventListener('mousemove', (e) => {
                if (sliderGrabbed) {
                    slider.parentElement.scrollLeft -= e.movementX;
                }
            })

            slider.addEventListener('wheel', (e) => {
                e.preventDefault()
                slider.parentElement.scrollLeft += e.deltaY;
            })

            function getScrollPercentage() {
                return ((slider.parentElement.scrollLeft / (slider.parentElement.scrollWidth - slider.parentElement.clientWidth)) * 100);
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> -->
        <script>
            // Define the months and years to be displayed in the dropdown
            const months = [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ];
            const currentYear = new Date().getFullYear();
            // const years = [currentYear - 1, currentYear, currentYear + 1];

            // Set the initial selected month and year to the current month and year
            const currentDate = new Date();
            let selectedMonth = months[currentDate.getMonth()];
            let selectedYear = currentDate.getFullYear();

            $("#selected-month-year").text(selectedMonth + " " + selectedYear);

            // Generate the calendar table
            let firstDay = new Date(selectedYear, months.indexOf(selectedMonth), 1);
            let lastDay = new Date(selectedYear, months.indexOf(selectedMonth) + 1, 0);
            let table = $("<table id='calendarTable' >");
            let tbody = $("<tbody>");
            let row = $("<tr>");
            let dayNames = ["S", "M", "T", "W", "T", "F", "S"];
            for (let i = 0; i < dayNames.length; i++) {
                let th = $("<th>").text(dayNames[i]);
                row.append(th);
            }
            tbody.append(row);
            let date = 1;
            // let month1 = 1;
            let todays = new Date();

            for (let i = 0; i < 6; i++) {
                row = $("<tr>");
                for (let j = 0; j < 7; j++) {
                    if ((i === 0 && j < firstDay.getDay()) || date > lastDay.getDate()) {
                        let td = $(`<td>`);
                        row.append(td);
                    } else {
                        // console.log(month1);
                        let td = $(`<td class="d" id="${date}" data-day="${date}">`).text(date);
                        //  console.log(text.data);
                        if (selectedMonth === months[todays.getMonth()] && selectedYear === todays.getFullYear() && date === todays.getDate()) {
                            td.addClass("todays");
                        }
                        row.append(td);
                        /*if (date == lastDay.getDate()) {
                            month1++;
                        }*/
                        date++;
                    }
                }
                tbody.append(row);
            }
            table.append(tbody);
            $("#calendar").html(table);

            function updateSelectedMonthYear(month, year) {
                // Remove the "active" class from the previously selected month
                $(".dropdown-menu .row .month.active").removeClass("active");

                selectedMonth = month;
                selectedYear = year;
                $("#selected-month-year").text(selectedMonth + " " + selectedYear);

                // Add the "active" class to the newly selected month
                $(".dropdown-menu .row .month:contains('" + month + "')").addClass("active");

                // Generate the calendar table
                let firstDay = new Date(selectedYear, months.indexOf(selectedMonth), 1);
                let lastDay = new Date(selectedYear, months.indexOf(selectedMonth) + 1, 0);
                let table = $("<table>");
                let tbody = $("<tbody>");
                let row = $("<tr>");
                let dayNames = ["S", "M", "T", "W", "T", "F", "S"];
                for (let i = 0; i < dayNames.length; i++) {
                    let th = $("<th>").text(dayNames[i]);
                    row.append(th);
                }
                tbody.append(row);
                let date = 1;
                let today = new Date();
                for (let i = 0; i < 6; i++) {
                    row = $("<tr>");
                    for (let j = 0; j < 7; j++) {
                        if ((i === 0 && j < firstDay.getDay()) || date > lastDay.getDate()) {
                            let td = $(`<td>`);
                            row.append(td);
                        } else {
                            let td = $(`<td class="d" id="${date}" data-day="${date}">`).text(date);
                            if (selectedMonth === months[today.getMonth()] && selectedYear === today.getFullYear() && date === today
                                .getDate()) {
                                td.addClass("today");
                            }
                            row.append(td);
                            date++;
                        }
                    }
                    tbody.append(row);
                }
                table.append(tbody);
                $("#calendar2").html(table);
                newfun();
            }

            // Update the displayed year and months in the dropdown
            function updateDropdownYear(year) {


                $(".dropdown-menu .year").text(year);
                $(".dropdown-menu .row:not(:first-child)").remove();
                for (let i = 0; i < months.length; i += 3) {
                    let month1 = months[i];
                    let month2 = months[i + 1] || "";
                    let month3 = months[i + 2] || "";
                    let row = $("<div>").addClass("row");
                    let monthEl1 = $("<div>").addClass("month").text(month1);
                    let monthEl2 = $("<div>").addClass("month").text(month2);
                    let monthEl3 = $("<div>").addClass("month").text(month3);
                    if (selectedMonth === month1 && selectedYear === year) {
                        monthEl1.addClass("active");
                    }
                    if (selectedMonth === month2 && selectedYear === year) {
                        monthEl2.addClass("active");
                    }
                    if (selectedMonth === month3 && selectedYear === year) {
                        monthEl3.addClass("active");
                    }
                    monthEl1.click(function() {
                        updateSelectedMonthYear(month1, year);
                    });
                    monthEl2.click(function() {
                        updateSelectedMonthYear(month2, year);
                    });
                    monthEl3.click(function() {
                        updateSelectedMonthYear(month3, year);
                    });
                    row.append(monthEl1);
                    row.append(monthEl2);
                    row.append(monthEl3);
                    $(".dropdown-menu").append(row);
                }

            }

            // Initialize the dropdown with the current year and months
            updateDropdownYear(currentYear);
            // Add event listeners for the previous and next year buttons
            $(".dropdown-menu .prev-year").click(function() {
                let currentYear = parseInt($(".dropdown-menu .year").text());
                updateDropdownYear(currentYear - 1);
                $("#month-year-dropdown").toggleClass("show");
            });
            $(".dropdown-menu .next-year").click(function() {
                let currentYear = parseInt($(".dropdown-menu .year").text());
                updateDropdownYear(currentYear + 1);
                $("#month-year-dropdown").toggleClass("show");
            });

            // Show or hide the dropdown menu when the dropdown is clicked
            $("#month-year-dropdown").click(function(event) {
                event.stopPropagation();
                $("#month-year-dropdown").toggleClass("show");
            });

            // Hide the dropdown menu when the user clicks outside of the dropdown area
            $(document).click(function(event) {
                if (!$(event.target).closest("#month-year-dropdown").length) {
                    $("#month-year-dropdown").removeClass("show");
                }
            });



            // idle
            // -> onPointerDown
            // dragging
            // -> onPointerMove / onPointerOver
            // <- onPointerUp

            // NOTE: We retooled the data to be based on first selection and second selection. We'll calculate which is the start & end date later in the `updateDOM` function. 
            let allDayEls;
            const data = {
                firDate: null,
                secondDate: null
            };
            let prev = 0;

            function erase(d) {
                for (let i = 1; i <= d; i++) {
                    document.getElementById(i).classList.remove('leftside');
                    document.getElementById(i).classList.remove('color1');
                    document.getElementById(i).classList.remove('rightside');
                }
                // console.log(d);
            }
            const machine = {
                initial: 'idle',
                states: {
                    idle: {
                        on: {
                            pointerdown: (data, event) => {
                                data.firDate = +event.currentTarget.dataset.day;
                                data.secondDate = null;
                                //   console.log("machine");
                                return 'dragging';
                            }
                        }
                    },
                    dragging: {
                        on: {
                            pointerover: (data, event) => {
                                data.secondDate = +event.currentTarget.dataset.day;

                                if (data.firDate < data.secondDate) {
                                    console.log(data.firDate + " " + data.secondDate);
                                    erase(prev);
                                    prev = data.secondDate;
                                    document.getElementById(data.firDate).classList.add('leftside');
                                    for (let i = data.firDate + 1; i < data.secondDate; i++) {
                                        const element = document.getElementById(`${i}`);
                                        // console.log(element);
                                        element.classList.add('color1');
                                    }
                                    document.getElementById(data.secondDate).classList.add('rightside');
                                }


                                return 'dragging';
                            },
                            pointerup: 'idle',
                            pointercancel: 'idle'
                        }
                    }
                }
            };

            // idle
            let currentState = machine.initial;

            function send(event) {
                // console.log(event);
                // console.log(event.type);
                const transition = machine
                    .states[currentState]
                    .on[event.type];

                if (typeof transition === 'function') {
                    currentState = transition(data, event);
                    // updateDOM();
                } else if (transition) {
                    currentState = transition;
                    updateDOM();
                }
            }


            // ---------------------------------- 
            function newfun() {
                //   machine.states='idle';
                currentState = machine.initial;
                allDayEls = document.querySelectorAll('[data-day]');

                allDayEls.forEach(dayEl => {
                    dayEl.addEventListener('pointerdown', send);
                    dayEl.addEventListener('pointerover', send);
                });
            }
            allDayEls = document.querySelectorAll('[data-day]');
            // console.log(machine.states);
            allDayEls.forEach(dayEl => {
                dayEl.addEventListener('pointerdown', send);
                dayEl.addEventListener('pointerover', send);
            });

            document.body.addEventListener('pointerup', send);

            // Function to fetch meeting information
            function fetchMeetingInfo(startDate, endDate) {
                const url = 'display_meet.php'; // Update with the correct PHP script path

                const formData = new FormData();
                formData.append('selectedDate', startDate);
                formData.append('endDate', endDate);

                return fetch(url, {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        // const format = response.json();
                        // console.log(JSON.stringify(response));
                        return response.json();
                    })
                    .then(meetingInfoArray => {
                        // return meetingInfoArray.length > 0 ? meetingInfoArray : null;
                        return meetingInfoArray;
                    })
                    .catch(error => {
                        console.error('Error fetching meeting information:', error);
                        return null;
                    });
            }

            // UpdateDOM function (modify as needed)
            function updateDOM() {
                const rightside_middle = document.getElementsByClassName('rightside_middle')[0];
                // console.log(rightside_middle);
                // ... (existing code)
                // Log the values of data.firDate and data.secondDate
                console.log('data.firDate:', data.firDate);
                console.log('data.secondDate:', data.secondDate);
                // Add the following to check and set the start date
                let startDate, endDate;

                if (data.firDate !== null && data.secondDate !== null) {
                    startDate = Math.min(data.firDate, data.secondDate);
                    endDate = Math.max(data.firDate, data.secondDate);
                } else {
                    // Handle the case when dates are not selected
                    console.log('No dates selected.');
                    return;
                }
                // startDate = new Date(startDate);
                const formattedStartDate = formatDate(startDate);
                console.log('dom formattedStartDate', formattedStartDate);
                const formattedEndDate = formatDate(endDate);
                console.log('dom formattedEndDate', formattedEndDate);

                console.log('Selected start date:', formattedStartDate); // Log the formatted start date

                if (formattedStartDate && endDate) {
                    fetchMeetingInfo(formattedStartDate, formattedEndDate)
                        .then(meetingInfo => {
                            console.log(meetingInfo);
                            rightside_middle.innerHTML = "";
                            if (meetingInfo.length > 0) {
                                meetingInfo.forEach(function(meeting) {

                                    // Create main wrapper div
                                    const rightWrapper = document.createElement('div');
                                    rightWrapper.classList.add('right_wrapper1');

                                    // Create inner div for user information
                                    const userInfoDiv = document.createElement('div');
                                    userInfoDiv.style.padding = '13px';
                                    userInfoDiv.style.display = 'flex';
                                    userInfoDiv.style.gap = '1.5rem';

                                    // Create user profile image
                                    const profileImage = document.createElement('img');
                                    profileImage.src = '<?= $DEFAULT_PATH ?>assets/images/live-user-default.svg';
                                    profileImage.style.borderRadius = '50%';
                                    profileImage.style.width = '60.67px';
                                    profileImage.style.height = '60.67px';

                                    // Create div for user details
                                    const userDetailsDiv = document.createElement('div');

                                    // Create paragraph for user name
                                    const userNameParagraph = document.createElement('p');
                                    userNameParagraph.style.fontSize = '20px';
                                    userNameParagraph.style.marginBottom = '5px';
                                    userNameParagraph.textContent = meeting.title;

                                    // Create div for date and time
                                    const dateTimeDiv = document.createElement('div');
                                    dateTimeDiv.style.display = 'flex';
                                    dateTimeDiv.style.gap = '1.2rem';

                                    // Create div for date
                                    const dateDiv = document.createElement('div');
                                    dateDiv.style.display = 'flex';
                                    dateDiv.style.justifyContent = 'center';
                                    dateDiv.style.gap = '0.4rem';

                                    // Create image for calendar
                                    const calendarImage = document.createElement('img');
                                    calendarImage.src = '<?= $DEFAULT_PATH ?>assets/images/Calendar.svg';
                                    calendarImage.style.width = '27%';

                                    // Create span for date value
                                    const dateSpan = document.createElement('span');
                                    dateSpan.textContent = meeting.date;

                                    // Append date image and span to date div
                                    dateDiv.appendChild(calendarImage);
                                    dateDiv.appendChild(dateSpan);

                                    // Create div for time
                                    const timeDiv = document.createElement('div');
                                    timeDiv.style.display = 'flex';
                                    timeDiv.style.justifyContent = 'center';
                                    timeDiv.style.gap = '0.4rem';

                                    // Create image for clock
                                    const clockImage = document.createElement('img');
                                    clockImage.src = '<?= $DEFAULT_PATH ?>assets/images/Clock_live.svg';
                                    clockImage.style.width = '22%';

                                    // Create span for time value
                                    const timeSpan = document.createElement('span');
                                    timeSpan.textContent = meeting.time;

                                    // Append clock image and span to time div
                                    timeDiv.appendChild(clockImage);
                                    timeDiv.appendChild(timeSpan);

                                    // Append date and time divs to main date-time div
                                    dateTimeDiv.appendChild(dateDiv);
                                    dateTimeDiv.appendChild(timeDiv);

                                    // Append user name paragraph and date-time div to user details div
                                    userDetailsDiv.appendChild(userNameParagraph);
                                    userDetailsDiv.appendChild(dateTimeDiv);

                                    // Append profile image and user details div to inner user info div
                                    userInfoDiv.appendChild(profileImage);
                                    userInfoDiv.appendChild(userDetailsDiv);

                                    // Append inner user info div to main wrapper div
                                    rightWrapper.appendChild(userInfoDiv);

                                    
                                    rightside_middle.appendChild(rightWrapper);
                                });
                            } else {

                                const userNameParagraph = document.createElement('h1');
                                userNameParagraph.style.fontSize = '28px';
                                userNameParagraph.style.marginBottom = '5px';
                                userNameParagraph.textContent = 'No Meetings Found.';

                                rightside_middle.appendChild(userNameParagraph);

                                console.log('No Meetings Found.');
                            }
                            
                        })
                        .catch(error => {
                            console.error('Error fetching meeting information:', error);
                        });
                }
            }

           


            function formatDate(date) {
                const currentYear = selectedYear;
                const month = String(months.indexOf(selectedMonth) + 1).padStart(2, '0');
                const day = String(date).padStart(2, '0');
                const formattedDate = `${currentYear}-${month}-${day}`;
                return formattedDate;
            }


        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?= $DEFAULT_PATH ?>live/js/lobby_help.js"></script>
        <!-- <script type="text/javascript" src="<?= $DEFAULT_PATH ?>live/js/lobby.js"></script> -->
        <?php require_once('live/js/lobby.php'); ?>


</body>

</html>
