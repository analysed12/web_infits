<?php
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
        overflow-x: hidden;
    }

    .left {
        position: relative;
        display: inline-block;
        margin-top: 20px;
        margin-left: 30px;
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
        cursor: pointer;
        background: linear-gradient(180deg, rgba(156, 116, 245, 0.61) 33.65%, #9C74F5 70.62%);
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
        cursor: pointer;
        background: linear-gradient(180deg, rgba(156, 116, 245, 0.61) 33.65%, #9C74F5 70.62%);
    }

    .date {
        font-style: normal;
        font-weight: 700;
        font-size: 19px;
        line-height: 24px;
        margin-top: -10px;
        margin-bottom: 10px;
    }

    .main-content {
        margin-left: 17rem;
    }

    .sliding-cal {
        margin-left: -2.6rem;
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
            margin-left: -3.4rem;
        }

        .btns {
            right: 0px !important;
            bottom: 10px !important;
            margin: auto !important;
            position: relative !important;
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
            margin-top: 60px !important;
            margin-right: -18px;
            width: auto;
            margin-left: -55px;
            margin-top: 60px;
        }

        .para {
            width: 292px !important;
        }

        .image {
            width: 300px !important;
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
        .left h1 {
            margin-left: -69px !important;
        }

        .main-content {
            margin-top: -40px;
            bottom: 20px;
            margin-left: 60px;
            overflow: none;
        }

        .left {
            font-size: 33px !important;
            margin-left: 40px;
        }

        .left h1 {
            font-size: 33px !important;
        }

        .btns {
            right: 0px !important;
            bottom: 10px !important;
            margin: auto !important;
            position: relative !important;
        }

    }
    </style>
</head>

<body>

    <div class="main-content">
        <div>
            <div class="left">
                <h1 style="margin-left:-30px;margin-top:10px;margin-bottom:-0.7rem !important;font-size:40px">Diet Chart
                </h1>
                <h1 style="margin-left:-30px;color: #CBCBCB;margin-bottom:-0.9rem !important;font-size:33px;">Ronald
                    Richards</h1>
            </div>

        </div>
        <div class="sliding-cal col-sm-12">
            <div id="slider-content"> </div>
        </div>
        <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;margin-top:30px;">
            <img src="<?=$DEFAULT_PATH?>assets/images/dietchart_default.svg" class="image">
            <p style="font-size:33px;width:344px;text-align:center;" class="para">You haven't created any chart yet!</p>

        </div>
        <a href="dietchart1.php" style="backgrounf:none">
            <div style="display:flex !important;flex-direction:row !important;width:284px;height:97px;background: #FFFFFF;box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);border-radius: 50px !important;align-items:center;justify-content:center;position:absolute;bottom:30px;right:30px;margin:20px;"
                class="btns">
                <p style="color:#4B9AFB;font-size:35px;padding-top:10px;margin-right:15px;">Create Chart</p>
                <img src="<?=$DEFAULT_PATH?>assets/images/Task_Plus.svg">
            </div>
        </a>
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