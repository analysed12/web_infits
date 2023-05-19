<?php
error_reporting(0);
include("navbar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('constant/head.php');?>
    <title>MealTracker</title>
    <style>

    body {
        font-family: 'NATS' !important;
        overflow-y: auto;
    }

    .left {
        position: relative;
        display: inline-block;
        margin-top: 20px;
        margin-left: 30px;
    }

    .right {
        position: relative;
        display: block;
        font-size: 24px;
        font-weight: 400px;
        color: #5c5c5c;
        margin-left: 15.5rem !important;
    }

    .button-container {
        display: inline-block;
        margin-top: 50px;
        margin-left: 4rem !important;
    }

    .btn1 {
        margin-left: 70px;
        padding: 10px;
        width: 203.19px;
        height: 47.55px;
        font-family: 'NATS';
        font-size: normal;
        font-weight: 500;
        font-size: 24px;
        line-height: 100%;
        text-align: center;
        border: 1px solid #9C74F5;
        border-radius: 10px;
        background-color: #fff;
        color: #9C74F5;
    }

    .btn1.active {
        background-color: #9C74F5;
        color: #fff;
    }

    .btn1:hover {
        background-color: #9C74F5;
        color: #fff;
    }

    .date2 {
        text-align: center;
        color: #C1C1C1;
        line-height: 237.5%;
        font-family: 'NATS';
        font-style: normal;
        font-weight: 400;
        font-size: 16.6px;
        margin-left: 158px;
        margin-top: -77px;
    }

    .time {
        text-align: center;
        color: #C1C1C1;
        line-height: 237.5%;
        font-style: normal;
        font-weight: 200;
        font-size: 16px;
        margin-left: 170px;
        margin-top: -19px;
    }

    /*-----------------------------Calendar css--------------------------------*/

    .sliding-cal {
        position: relative;
        width: 80.5rem;
        height: 115px;
        overflow: scroll;
        background: #FFFFFF;
        margin-top: 20px;
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

    .current-day {
        border-radius: 100%;
        color: white;
        width: 55px;
        height: 100px;
        text-align: center;
        background: linear-gradient(180deg, rgba(118, 165, 255, 0.61) 44.58%, #76A5FF 70.62%);
        cursor: pointer;
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
        padding: 20px;
    }

    .day {
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 50px;
        margin-top: 10px;
    }

    .day:hover {
        border-radius: 100%;
        color: white;
        width: 55px;
        text-align: center;
        height: 100px;
        background: linear-gradient(180deg, rgba(118, 165, 255, 0.61) 44.58%, #76A5FF 70.62%);
        cursor: pointer;
    }

    .date {
        font-style: normal;
        font-weight: 700;
        font-size: 19px;
        line-height: 24px;
        margin-top: -10px;
        margin-bottom: 10px;
    }


    .sliding-cal::-webkit-scrollbar {
        display: none;
    }

    .sliding-cal {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    @media screen and (min-width: 720px) and (max-width:1500px) {
        .sliding-cal {
            position: relative;
            width: auto;
        }

        .button-container {
            display: flex;
            flex-direction: row;
            overflow-x: auto;
            margin-right: 40px;
            margin-left: -20px !important;

        }

        .btn1 {
            margin-left: 30px;
        }

        .sidenav::-webkit-scrollbar {
            overflow: none !important;
        }

        .text-center {
            margin-left: 15rem !important;
        }
    }

    @media screen and (min-width:500px) and (max-width:720px) {

        .sliding-cal {
            width: auto;
            margin-left: -55px;
            margin-top: 60px;
        }
    }

    @media screen and (min-width:0px) and (max-width:500px) {
        .main-content {
            overflow: none;
            margin-right: 20px;
        }

        .sliding-cal {
            width: auto;
            margin-top: 60px;

            margin-right: -15px;
            width: auto;
            margin-left: -55px;
            margin-top: 60px;
        }

        .rounded {
            width: 300px !important;
            margin-left: -20px !important;
        }

    }

    @media screen and (min-width:600px) and (max-width:720px) {

        .main-content {
            overflow: none;
            margin-right: 20px;
        }

        .sliding-cal {
            margin-right: -16px;
            width: auto;
            margin-left: -55px;
            margin-top: 60px;
        }

    }

    @media screen and (min-width:0px) and (max-width:720px) {
        .main-content {
            margin-top: -40px;
            bottom: 20px;
            margin-left: 60px;
            overflow: none;
        }

        .left h1 {
            font-size: 40px;
            margin-left: -4rem;
            margin-top: 20px;
        }

        .right {
            margin-left: -2.8rem !important;
        }

        .button-container {
            display: flex;
            flex-direction: row;
            overflow-x: auto;
            margin-right: 30px;
            margin-left: -65px !important;
        }

        .btn1 {
            margin-left: 20px;
        }

    }

    @media screen and (min-width:0px) and (max-width:400px) {
        .image {
            width: 300px;
        }
    }
    </style>
</head>

<body>

    <div class="main-content">
        <div>
            <div class="left">
                <h1 style="margin-top:1rem;margin-left:0.7rem">Meal Tracker</h1>
            </div>
            <div class="right" style="margin-left:1.5rem">
                <img src="<?=$DEFAULT_PATH?>assets//images/Tea.svg" style="margin-top:-10px;">
                <p style="display: inline-block;">
                    <?php
            date_default_timezone_set('Asia/Kolkata'); 
            print "". date("d M Y"); ?></p>
            </div>
        </div>
        <div class="sliding-cal col-sm-12" style="margin-top:-10px;">
            <div id="slider-content"> </div>
        </div>

        <div class="button-container">
            <button class="btn1 active" style="margin-left:70px;">Breakfast</button>
            <button class="btn1">Lunch</button>
            <button class="btn1">Snacks</button>
            <button class="btn1">Dinner</button>
        </div>

        <script>
        const btns = document.querySelectorAll('.btn1');
        btns.forEach((btn) => {
            btn.addEventListener('click', () => {
                // Remove active class from all buttons
                btns.forEach((btn) => {
                    btn.classList.remove('active');
                });
                // Add active class to clicked button
                btn.classList.add('active');
            });
        });
        const initialActiveButton = document.querySelector('.my-button.active');
        initialActiveButton.click();
        </script>
        <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;">
            <img src="<?=$DEFAULT_PATH?>assets/images/Thanksgiving Day.svg" class="image">
            <p style="font-size:40px;text-align:center;">No image shared by the client yet!</p>
        </div>
    </div>
    <?php require('constant/scripts.php');?>
    <!-----------------------------Calender-------------------------------->
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
            const isCurrentDate = value.toDateString() === currentDate.toDateString();
            days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            const dayClass = isCurrentDate ? 'day current-day' : 'day';
            const dateClass = isCurrentDate ? 'date current-date' : 'date';
            html = `<div class="item">
            <div class="${dayClass}">${days[parseInt(value.getDay())]}</div><br>
        <div class="${dateClass}">${value.getDate()}</div>
    </div>`;
            document.getElementById('slider-content').innerHTML += html;
            i++;
        }
    };


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
        return ((slider.parentElement.scrollLeft / (slider.parentElement.scrollWidth - slider.parentElement
            .clientWidth)) * 100);
    }
    </script>
</body>

</html>