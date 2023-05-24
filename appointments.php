<?php
    include("navbar.php");
    require('constant/config.php');
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS for full calender -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
    <!-- <JS for full calender > -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <title>Event Calendar</title>
    <?php require('constant/head.php');?>
</head>
<style>
body {
    font-family: 'NATS', sans-serif;
    overflow: hidden !important;
}

html {
    overflow-x: hidden;
}

#content {
    display: flex;
    flex-direction: column;
    font-style: normal;
    font-weight: 500;
    padding-left: 20px;
    padding-top: 10px
}

.container-main {
    display: flex;
    font-size: 16px !important;
}

.fixed {
    width: 80%;
}

.flex-item {
    flex-grow: 1;
}

.row {
    width: 100% !important;

}

.fc table {
    border-collapse: collapse !important;
}

.fc-event {
    background-color: #EFF8FF !important;
    color: #7A78FD !important;
    border: 1px solid #7A78FD !important;
    border-radius: 6px;
    padding-top: 20px !important;
}
.fc-title {
    font-weight: bold !important;
    font-size: 10px;
}

.fc-today {
    background-color: inherit !important;
}

.fc-today-button {
    width: auto !important;
    height: auto !important;
    background: #EFEFEF !important;
    border-radius: 5px !important;
    padding: 5px !important;
}

.fc-next-button {
    color: #4B9AFB !important;
}

.fc-prev-button {
    color: #4B9AFB !important;
}

.fc-time-grid .fc-slats td {
    height: 1.5em;
    border-bottom: hidden !important;
}

table {
    border: 2px solid white !important;
}

.fc-state-default {
    border: 0px solid;
    background-color: #EFEFEF;
    background-image: none;
    background-repeat: repeat-x;
    color: #333;
    text-shadow: none;
    box-shadow: none;

}

.fc-left h2 {
    font-size: 17px !important;
}


.wrapper header {
    display: flex;
    padding-left: 40px;
    justify-content: space-between;
}

header .icons {
    display: flex;
}

header .icons span {
    margin: -2px 9px;
    cursor: pointer;
    line-height: 28px;
    font-size: 15px;
    user-select: none;
    border-radius: 5px;
}

header .current-date {
    padding-left: 14px;
}

.days,
.wrapper header,
.calendar-side ul {
    padding-left: 0;
}

.icon2 {
    background-color: #EFEFEF;
    height: 24px;
    padding-left: 6px;
    color: #4B9AFB;
    width: 24px;
}

header .icons span:hover {
    background: #f2f2f2;
}

header .current-date {
    font-size: 17px;
    font-weight: 500;
}

.calendar-side {
    width: 280px;
    margin-right: 20px;

}

.calendar-side li {
    padding: 0;
}

.calendar-side ul {
    display: flex;
    flex-wrap: wrap;
    list-style: none;
    text-align: center;
}

.calendar-side .days li {
    margin-top: 10px !important;

}

.calendar-side .days {
    margin-bottom: 20px;
}

.calendar-side li {
    color: #333;
    width: calc(100% /7);
    font-size: 12px;
}

.calendar-side .weeks li {
    font-weight: 500;

    cursor: default;
}

.calendar-side .days li {
    z-index: 1;
    cursor: pointer;
    position: relative;
    margin-top: 30px;
}

.days li.inactive {
    color: #aaa;
}

.days li.active {
    color: #fff;
}

.days li::before {
    position: absolute;
    content: "";
    left: 50%;
    top: 50%;
    height: 30px;
    width: 30px;
    z-index: -1;
    border-radius: 50%;
    transform: translate(-50%, -50%);
}

.days li.active::before {
    color: white !important;
    width: 18px;
    height: 18px;
    background: #4B9AFB;
    border-radius: 5px;
}

.days li:not(.active):hover::before {
    background: #6a9cb5e0;
    width: 28px;
    height: 28px;
}

.prev .next {
    cursor: pointer;
}


.schedule {
    margin-left: 15px;
}

a:hover {
    text-decoration: none;
    color: #CBC3E3 !important;
}

.fc-axis {
    color: #AAAAAA !important;
}

.view {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin-right: 45px;
    align-items: cente align-items: center;
}

.container {
    width: 102%;
    padding-right: 0px;
}
.light {
    
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

#calendar2 {
    margin-top: 10px;
}

table {
    width: 290px;
    border-collapse: unset;
}

#calendar2 td.todays {
    border: 1px solid #7282FB;
    border-radius: 50px;
}

th,

td {
    padding: 5px;
    text-align: center;
    transition: all 0.2s ease-in-out;

}

.d:hover {
    transform: scale(1.2);
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    color: black;
    cursor: pointer;
    border-radius: 50%;
}

th {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 500;
    font-size: 21px;
    font-weight: 400;
    line-height: 150%;
    color: #737373;
}

td.today {
    border: 2px solid #3e90ff;
}

.leftside {
    background-color: rgba(114, 130, 251, 1) !important;
    border-bottom-left-radius: 28%;
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

.fc table {
    height: 100% !important;
}
.main {
                    padding-left: 7%;
                    padding-right: 5%;
                }

                .card-top {
                    display: flex;
                    align-items: center;
                    padding-top: 2%;
                    justify-content: space-between;
                }

                .schedule-card {
                    background: #EFF8FF;
                    border-radius: 21px;
                    width: 90%;
                    padding: 15px;
                    margin-bottom: 20px;
                }

                .schedule-card-title {
                    font-weight: 600;
                    font-size: 18px;
                    color: #3C82D7;
                }

                .fc-prev-button {
                    color:  !important;
                    background-color: #EFEFEF !important;
                    padding: 1.8px !important;
                }

                .fc-prev-button:active {
                    background-color: blue;
                }

                .fc-next-button {
                    color: #4B9AFB !important;
                    background-color: #EFEFEF !important;
                    padding: 1.8px !important;
                }

                .fc button {
                    height: 1.8em !important;
                    text-transform: capitalize !important;
                }

                .fc-today-button {
                    color: black !important;
                    font-weight: bold !important;
                    background-color: #EFEFEF !important;
                }

                .fc-agendaWeek-button {
                    background: #EFEFEF !important;
                    border-radius: 5px !important;
                }

                .fc-state-active {
                    background: #4B9AFB !important;
                    color: #FFFFFF;
                }

                .fc-left h2 {
                    font-size: 18px !important;
                    margin-top: 7px;
                }


@media screen and (max-width:720px) {
    .container-main {
        display: flex !important;
        flex-direction: column !important;
        gap: 26rem;
    }

    .light {
        margin-left: 10% !important;
    }

    .schedule {
        margin-left: 10% !important;
    }

    #content {
        padding-left: 0 !important;
    }


}

@media screen and (max-width:459px) {
    .calender h3 {
        padding: 0.5rem !important;
        box-sizing: border-box;
        margin-top: 15px;
    }

    .calender .event_btn {
        height: 40px;
        font-size: 12px;
        width: fit-content;
    }

    .schedule {
        margin-left: 20%;
    }


}

@media screen and (max-width:480px) {
    .fc-toolbar.fc-header-toolbar {
        margin: 1rem auto 2rem auto;
        display: flex;
        width: fit-content;
        flex-direction: column;
    }

    .schedule {
        margin-left: 20%;
    }

    .fc-toolbar .fc-right {
        margin-bottom: 10px;
        float: center;
    }

    .fc-toolbar .fc-left {
        margin-bottom: 20px;
        float: none;
    }

    .fc-title {
        word-wrap: break-word;
        font-size: 10px;
        width: 400px;
    }

    .flex-item {
        margin-top: 50px;
    }
}

@media screen and (max-width: 920px) {

    .container-main {
        margin-bottom: 20px;
        z-index: -1;
    }

    .schedule {
        margin-left: 20%;
    }

    .calendar-side li {
        font-size: 15px;
    }

    .calender {
        display: flex;
    }

    .calender h3 {
        font-size: 30px;
    }

    .calender .event_btn {
        height: 40px;
    }

    .calender h3 {
        padding: 0rem;
    }

    .wrapper {
        margin-top: 50px;
    }

    .calendar-side {
        width: 80%;
        margin: auto;
    }

    .fixed {
        width: 100%;
    }

    .container-main {
        font-size: 16px !important;
    }

}
</style>

<body>
    <!-- Contents Start -->
    <div id="content">
        <div class="container-main">
            <div class="fixed">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="calender">
                                <h3 style="display:inline-block;margin-left:0.4rem;margin-top:1.8rem;font-size:40px">
                                    Calendar</h3>
                                <a href="createevent.php" class="event_btn" style="display:inline-block; float:right;background: #7A78FD;
            border-radius: 7px;border: none; color: white; padding:10px;margin-top:2rem;text-decoration:none">+ Create Schedule</a>
                            </div>
                            <br>
                            <div id="calendar" style="height:15px !important"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-item">
                <div class="light">
                    <div id="month-year-dropdown">
                        <span id="selected-month-year">Select a month and year</span>
                        <i class='fas fa-angle-down ms-1' style="color: #CCCCCC; font-size: x-small;"></i>
                        <div class="dropdown-menu">
                            <div class="row">
                                <div class="prev-year">&laquo;</div>
                                <div class="year"></div>
                                <div class="next-year">&raquo;</div>
                            </div>
                        </div>
                    </div>
                    <div id="calendar2"></div>
                </div>
                <!-- Todays Schedule -->
                <div class="schedule">
                    <div class="view">
                        <p style="font-weight:bold;font-size: 25px;">Today's Schedule</p>
                        <p
                            style="font-family: 'NATS'; font-style: normal;font-size: 12px;color: #4B9AFB;margin-top: 11px;">
                            View all</p>
                    </div>
                    <?php
                    date_default_timezone_set("Asia/Kolkata");
                    $now = date("m/d/Y") ;
                    echo date("F j", strtotime($now));?>
                    <br><br>
                    <div>
                <?php
                $id = $_SESSION['name'] ;
                $sql = "SELECT * FROM create_event WHERE `dietitianuserID`='$id'";  
                $result=mysqli_query($conn,$sql); 
                $row = mysqli_fetch_assoc($result) ;     

                while($row = mysqli_fetch_assoc($result)){ 
                    $s = $row['start_date'];
                    $dt = new DateTime($s);
                    $date = $dt->format('m/d/Y');
                    $clientid = $row['clientuserid'];
                $sql1 = "SELECT client_id,name FROM addclient WHERE client_id=$clientid";
                $result1=mysqli_query($conn,$sql1); 
                $row1 = mysqli_fetch_assoc($result1) ;
                $name = $row1['name'] ;

                $startdate = $row['start_date'];
                $newstartdate = date('h:i A', strtotime($startdate));
                $enddate = $row['end_date'];
                $newenddate = date('h:i A', strtotime($enddate));
                    if ($date == $now){
                    ?>
                        <div class="schedule-card">
                            <div class="schedule-card-title"><?php echo $row['eventname'] ?></div>
                            <div></div>
                            <div class="schedule-card-name" style="margin-top:15px">
                                <div
                                    style="display:inline-block;background-color:#528aae;margin-right:10px;border-radius:50%;width:20px;height:20px;color:white;text-align:center;">
                                    <i class="fa-solid fa-user-tie"></i>
                                </div>
                                <div style="display:inline-block"><?php 
                            echo $name ; 
                            ?></div>
                            </div>
                            <div class="schedule-card-place" style="margin-top:15px">
                                <div
                                    style="display:inline-block;background-color:#528aae;margin-right:10px;border-radius:50%;width:20px;height:20px;color:white;text-align:center;">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div style="display:inline-block"><?php echo $row['place_of_meeting'] ?></div>
                            </div>
                            <div style="margin-top:15px;color:#4B9AFB">
                                <?php echo $newstartdate ?> -
                                <?php echo $newenddate ?>

                            </div>
                        </div>
                        <?php
                }}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contents end -->
</body>
<script>
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
const years = [currentYear - 1, currentYear, currentYear + 1];

// Set the initial selected month and year to the current month and year
const currentDate = new Date();
let selectedMonth = months[currentDate.getMonth()];
let selectedYear = currentDate.getFullYear();

$("#selected-month-year").text(selectedMonth + " " + selectedYear);
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
let todays = new Date();

for (let i = 0; i < 6; i++) {
    row = $("<tr>");
    for (let j = 0; j < 7; j++) {
        if ((i === 0 && j < firstDay.getDay()) || date > lastDay.getDate()) {
            let td = $(`<td>`);
            row.append(td);
        } else {
            let td = $(`<td class="d" id="${date}" data-day="${date}">`).text(date);
            if (selectedMonth === months[todays.getMonth()] && selectedYear === todays.getFullYear() && date === todays
                .getDate()) {
                td.addClass("todays");
            }
            row.append(td);
            date++;
        }
    }
    tbody.append(row);
}
table.append(tbody);
$("#calendar2").html(table);

function updateSelectedMonthYear(month, year) {
    selectedMonth = month;
    selectedYear = year;
    $("#selected-month-year").text(selectedMonth + " " + selectedYear);

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


$(document).ready(function() {
    display_events();
});
function display_events() {
    let events = [];
    $.ajax({
        url: 'display_event.php',
        dataType: 'json',
        success: function(response) {
            var result = response.data;
            $.each(result, function(i, item) {
                let newEvent = {
                    event_id: result[i].eventID,
                    title: result[i].eventname,
                    start: moment(result[i].start_date).format("YYYY-MM-DDTHH:mm:ss"),
                    end: moment(result[i].end_date).format("YYYY-MM-DDTHH:mm:ss"),
                };
                events.push(newEvent);
            })


            var calendar = $('#calendar').fullCalendar({
                defaultView: 'agendaWeek',
                timeZone: 'local',
                allDaySlot: false,
                header: {
                    left: 'title, prev , today, next ',
                    right: 'agendaDay, agendaWeek, month'
                },
                titleFormat: 'MMMM YYYY', // set format to show month and year
                events: result,
                editable: false,
                selectable: true,
                selectHelper: true,
                events: events,
                eventRender: function(event, element, view) {
                    element.bind('click', function() {
                    });
                }
            }); //end fullCalendar block    
        }, //end success block
        error: function(xhr, status) {
            alert(response.msg);
        }
    }); //end ajax block    
}

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
}
const machine = {
    initial: 'idle',
    states: {
        idle: {
            on: {
                pointerdown: (data, event) => {
                    data.firDate = +event.currentTarget.dataset.day;
                    data.secondDate = null;
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


let currentState = machine.initial;

function send(event) {
    const transition = machine
        .states[currentState]
        .on[event.type];

    if (typeof transition === 'function') {
        currentState = transition(data, event);
        updateDOM();
    } else if (transition) {
        currentState = transition;
        updateDOM();
    }
}

function newfun() {
    currentState = machine.initial;
    allDayEls = document.querySelectorAll('[data-day]');

    allDayEls.forEach(dayEl => {
        dayEl.addEventListener('pointerdown', send);
        dayEl.addEventListener('pointerover', send);
    });
}
allDayEls = document.querySelectorAll('[data-day]');
allDayEls.forEach(dayEl => {
dayEl.addEventListener('pointerdown', send);
dayEl.addEventListener('pointerover', send);
});

document.body.addEventListener('pointerup', send);

function updateDOM() {
    document.querySelectorAll('[data-selected]')
        .forEach(el => {
            delete el.dataset.selected
        });

    const startDate = Math.min(data.firDate, data.secondDate);
    const endDate = Math.max(data.firDate, data.secondDate);

    if (startDate) {
        const startDateEl = document.querySelector(`[data-day="${startDate}"]`);
        startDateEl.dataset.selected = "start";
    }

    if (endDate) {
        const endDateEl = document.querySelector(`[data-day="${endDate}"]`);
        endDateEl.dataset.selected = "end";
    }
}
</script>