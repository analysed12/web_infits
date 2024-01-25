<?php
include 'navbar.php';
require('constant/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('constant/head.php');?>
    <style>

body {
font-family: 'NATS', sans-serif !important;


}
.detailed_progress_container1 {
display: flex;
justify-content: space-between;
}
.container1_leftside {
width: 40%;
margin-left: 3rem;
margin-top: 2rem;
}

.search_client {
display: flex;
align-items: center;
margin: 1.5rem;
margin-top: 2.5rem;

height: 45px;
color: #ACACAC;
background-color: white;
box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
border-radius: 0.6rem;
font-size: medium;
border: none;
display: flex;
gap: 1rem;


}

#btn1 {
height: 1.5rem;
width: auto;
background-color: white;
border: none;
color: #ACACAC;
}

.search_clients_text {
width: 98%;
font-family: 'NATS';
font-style: normal;
font-weight: 400;
font-size: 20px;
color: #ACACAC;
border: none;
}

.track_buttons {
margin-left: 1rem;
margin-top: 4rem;
display: flex;
gap: 1rem;
}

.track-btn2 {
display: none;
}

#btn2 {
background: none;
color: black;
border: none;
font-size: larger;
font-weight: 500;
padding: 0.5rem;
padding-left: 2rem;
padding-right: 2rem;
font-size: 1.6rem;

}

#btn2:hover {
border-bottom: 0.25rem solid #4B9AFB;
}

#btn2:focus {
border-bottom: 0.25rem solid #4B9AFB;

}

.container1_rightside {

margin-top: 33px;

}

.container2_wrapper1 {
width: 100%;
display: flex;
gap: 3rem;
padding:1rem;
border-radius: 0.7rem;
background: #FDFDFD;

border: 2px solid #F4F4F4;
margin-top: 1.3rem;
font-weight: 500;
font-size: 1.3rem;
margin-bottom: 2rem;
}

#container3 {
padding-bottom: 1.5rem !important;

}

.info {
display: flex;
flex-direction: column;

}

.symbols {
display: flex;
}

.webview_progressdetails {
display: flex !important;
justify-content: center !important;
flex-direction: column;
align-items: center;
display: none;
}

.detailed_progress_container2 {
width: 88%;
}

.stats-col {
display: flex;
gap: 2rem;
flex-wrap: wrap;
justify-content: center;

}

.search_client:hover+.table {
visibility: visible;
}

.light {
margin-right:1rem;
border: 1px solid #CCCCCC;
border-radius: 15px;
background: #FFFFFF;
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
padding: 0.5rem;
}



#month-year-dropdown {
display: inline-block;
position:relative;
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
position:absolute;
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
overflow-x:hidden;
--bs-dropdown-padding-x: 1rem;
}
#month-year-dropdown .dropdown-menu::-webkit-scrollbar{
width: 10px;
}
#month-year-dropdown .dropdown-menu::-webkit-scrollbar-track{
background:#F3F3F3;
}
#month-year-dropdown .dropdown-menu::-webkit-scrollbar-thumb{
background: #D6D6D6;
border-radius: 10px;
}
#month-year-dropdown.show .dropdown-menu {
display:block;
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
user-select: none;
padding: 5px;
text-align: center;
transition: all 0.2s ease-in-out;


}

td:hover {
transform: scale(1.2);
box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
color:black;
border-radius: 50%;
user-select: none;
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
}
.leftside{

background-color:rgba(114, 130, 251, 1) !important;

border-bottom-left-radius: 28% ;
border-top-left-radius: 28% ;
}
.rightside{

background-color:rgba(114, 130, 251, 1)!important;
border-top-right-radius: 28%;
border-bottom-right-radius: 28%;
}
.color1{
background-color:rgba(179, 188, 251, 1)  !important;
border-radius:0 !important;
}
/***************************calendar style end*********************************/
.wrapper {
width: 300px;
background: #fff;
border-radius: 10px;
border: 2px solid #CCCCCC;
margin-top: 0.5rem;
}

.wrapper header {
display: flex;
align-items: center;
padding: 0.5rem;
justify-content: space-between;

}

header .icons {
display: flex;
}

header .icons span {
height: 38px;
width: 38px;
margin: 0 1px;
cursor: pointer;
color: #878787;
text-align: center;
line-height: 38px;
font-size: 1.9rem;
user-select: none;
border-radius: 50%;
}

.icons span:last-child {
margin-right: -10px;
}

header .icons span:hover {
background: #f2f2f2;
}

header .current-date {
font-size: 1.45rem;
font-weight: 500;
}

.calendar {
padding: 1px;
}

.calendar ul {
display: flex;
flex-wrap: wrap;
list-style: none;
text-align: center;

}

.weeks {
margin-bottom: 0%;
}

.calendar .days {
margin-bottom: 20px;

}

.calendar li {
color: #333;
width: calc(90% / 7);
font-size: 1.3rem;
font-weight: 600;
}

.calendar .weeks li {
font-weight: 500;
cursor: default;

}

.calendar .days li {
z-index: 1;
cursor: pointer;
position: relative;
margin-top: 10px;
font-size: 0.9rem;
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
height: 40px;
width: 40px;
z-index: -1;
border-radius: 50%;
transform: translate(-50%, -50%);
color: black;
}

.days li.active::before {
background: #a6b0fc;
}

.days li:not(.active):hover::before {
border: 2px solid #7282FB;
}

.mobview_progressdetails {
display: none;
}

.steps {
margin-top: 1rem;
}

/*************************MEDIA QUERY FOR SMALL DEVICES ******************************/
@media screen and (max-width: 720px) {
#btn2{
padding-left: 0px !important;
}
.title{
font-size: 32px !important;
}
.stat-bar{
width: 7rem;
}
.symbols{
flex-direction: column;
}
#container2 {
width: 95%;
}

#container3 {
width: 95%;
}

.webview_progressdetails {
width: 100%;
}

.detailed_progress_container1 {
flex-direction: column;
}

.container1_leftside {
margin-left: 0rem;
}

.search_client {
width: 90%;
}

.container2_wrapper1 {

flex-direction: column;
gap: 1rem !important;
}

p {
margin-left: 1.5rem;
}

.container1_leftside {
width: 100%;
}

.light {
margin: 0% 5%;
}

.track_buttons {
display: none;
}

.calendar {
flex-direction: column !important;
}

.track-btn2 {
display: block;
}
}

/****************************media query for mediun devices**************************************/
@media screen and (min-width: 720px) and (max-width: 1200px) {
.detailed_progress_container2 {
width: 80%;
}

.track_buttons {
display: none;
}

.calendar {
display: flex;
flex-direction: column !important;
}

.track-btn2 {
display: block;
}

.detailed_progress_container1 {
flex-direction: column;
}

.search_client {
width: 90%;
}

.light {
margin: 0% 10%;
}

.container2_wrapper1 {
flex-direction: column;
gap: 1rem !important;
}

.container1_leftside {
width: 92%;
}
}
    </style>
</head>

<body>
    <div class="client_detailed_progress">
        <div class="detailed_progress_container1">
            <div class="container1_leftside">
                <p class="title" style="font-size:40px;font-weight:400">Client Progress Details</p>
                <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="search_client">
                        <div style="margin-left: 5px;"><button id="btn1" type="submit" name="searching_btn"><span
                                    class="material-symbols-outlined mt-2">search</span></button> </div>
                        <div> <input type="text" name="search_client_name" oninput="" id="search_bar"
                                placeholder="Search Clients" class="search_clients_text" autocomplete="off"></div>
                    </div>
                </form>
                <table class="table" id="recommendBox" style="display:block;">
                    <tbody id="table_data">
                    </tbody>
                </table>

                <div class="track_buttons" id="track">
                    <button id="btn2" onclick="myFunction()">On-Track</button>
                    <button id="btn2" onclick="myFunction2()">Off-Track</button>
                </div>
            </div>


            <!---------------callender code--------------->

            <div class="container1_rightside">
                <!--------------------------------new calendar---------------------------------->
                <div class="d-flex justify-content-center calendar">
                    <div class="light">
                        <div id="month-year-dropdown">
                            <span id="selected-month-year">Select a month and year</span>
                            <i class='fa-solid fa-angle-down ms-1' style="color: #CCCCCC; font-size: x-small;"></i>
                            <div class="dropdown-menu">
                                <div class="row">
                                    <div class="prev-year">&laquo;</div>
                                    <div class="year"></div>
                                    <div class="next-year">&raquo;</div>


                                </div>
                            </div>
                        </div>
                        <div id="calendar"></div>
                    </div>
                    <div class="track_buttons track-btn2 " id="track">
                        <button id="btn2" onclick="myFunction()">On-Track</button>
                        <button id="btn2" onclick="myFunction2()">Off-Track</button>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                } 
                else {
                    let td = $(`<td class="d" id="${date}" data-day="${date}">`).text(date);
                    
                    if (selectedMonth === months[todays.getMonth()] && selectedYear === todays.getFullYear() && date === todays.getDate()) {
                        td.addClass("todays");
                    }
                    row.append(td);
                    date++;
                }
            }
            tbody.append(row);
        }
        table.append(tbody);
        $("#calendar").html(table);

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
                        if (selectedMonth === months[today.getMonth()] && selectedYear === today.getFullYear() && date === today.getDate()) {
                            td.addClass("today");
                        }
                        row.append(td);
                        date++;
                    }
                    
                }
                tbody.append(row);
        
            }
            table.append(tbody);
            $("#calendar").html(table);
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
                monthEl1.click(function () {
                    updateSelectedMonthYear(month1, year);
                });
                monthEl2.click(function () {
                    updateSelectedMonthYear(month2, year);
                });
                monthEl3.click(function () {
                    updateSelectedMonthYear(month3, year);
                });
                row.append(monthEl1);
                row.append(monthEl2);
                row.append(monthEl3);
                $(".dropdown-menu").append(row);
            }

        }

        
        updateDropdownYear(currentYear);
        $(".dropdown-menu .prev-year").click(function () {
            let currentYear = parseInt($(".dropdown-menu .year").text());
            updateDropdownYear(currentYear - 1);
            $("#month-year-dropdown").toggleClass("show");
        });
        $(".dropdown-menu .next-year").click(function () {
            let currentYear = parseInt($(".dropdown-menu .year").text());
            updateDropdownYear(currentYear + 1);
            $("#month-year-dropdown").toggleClass("show");
        });

        $("#month-year-dropdown").click(function (event) {
            event.stopPropagation();
            $("#month-year-dropdown").toggleClass("show");
        });

        
        $(document).click(function (event) {
            if (!$(event.target).closest("#month-year-dropdown").length) {
                $("#month-year-dropdown").removeClass("show");
            }
        });
        
   
let allDayEls;
const data = {
  firDate: null,
  secondDate: null
};
let prev=0;
function erase(d){
    for (let i = 1; i <=d; i++) {
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
          
          if(data.firDate<data.secondDate){
console.log( data.firDate+" "+data.secondDate);
erase(prev);
prev=data.secondDate;
document.getElementById(data.firDate).classList.add('leftside');
for (let i=data.firDate+1;i<data.secondDate; i++) {
    const element =document.getElementById(`${i}`);

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



function newfun(){

currentState=machine.initial;
    allDayEls=document.querySelectorAll('[data-day]');

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

/* ---------------------------------- */

function updateDOM(){
  document.querySelectorAll('[data-selected]')
    .forEach(el => {
      delete el.dataset.selected
    });
  
  const startDate = Math.min(data.firDate, data.secondDate);
  const endDate = Math.max(data.firDate, data.secondDate);
  
  if ( startDate ) {
    const startDateEl = document.querySelector(`[data-day="${startDate}"]`);
    startDateEl.dataset.selected = "start";
  }
  
  if ( endDate ) {
    const endDateEl = document.querySelector(`[data-day="${endDate}"]`);
    endDateEl.dataset.selected = "end";
  }
}

    </script>


        </div>

    </div>

    <!--------------------------------------- webview of progress details--------------------------------------------------->



    <script>
        function myFunction() {
            var x = document.getElementById("container2");
            var y = document.getElementById("container3");

            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
                y.style.display = "none";
            }
        }

        function myFunction2() {
            var x = document.getElementById("container3");
            var y = document.getElementById("container2");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
                y.style.display = "none";
            }
        }
    </script>

    <?php



$on = array();

$off = array();
    $sql = "SELECT client_id FROM `addclient`";
    $result = $conn->query($sql);
    $i=0;
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $c_id = $row['client_id'];
        $sq = "SELECT * FROM `goals` WHERE `client_id` = $c_id ORDER BY 'time' LIMIT 1";
        $result1 = $conn->query($sq);
        if ($result1->num_rows > 0){
        while ($row = $result1->fetch_assoc()) {
        $c_id1 = $row['client_id'];
        $q = "SELECT clientuserID FROM `addclient` WHERE  `client_id` = $c_id1";
        $res = $conn->query($q);
        if ($res->num_rows > 0){
        while ($c_name = $res->fetch_assoc()) {
        $cname = $c_name['clientuserID'];
        
        $on[$i]['name'] = $cname;
        $off[$i]['name'] = $cname;
        $dat = date('Y-m-d');

        //some changes is needed while linking.
        //for steps
        $step = "SELECT steps FROM `steptracker` WHERE clientuserID= '$cname' AND `dateandtime` >= '2023-03-10 00:00:00' AND `dateandtime` < '{$dat} 23:59:59'";
        $stepgoal = $conn->query($step);
        $stepgoal1 = mysqli_fetch_assoc($stepgoal);
        if ($stepgoal1 != null) {
            if ($stepgoal1['steps'] >= $row['steps']) {
                $on[$i]['steps'] = $stepgoal1['steps'];
                $off[$i]['steps'] = '-1';
            } else {
                $on[$i]['steps'] = '-1';
                $off[$i]['steps'] = $stepgoal1['steps'];
            }
        } else {
            $on[$i]['steps'] = '-1';
            $off[$i]['steps'] = '-1';
        }

        //for heart rate
        $heart = "SELECT average FROM `heartrate` WHERE clientuserID = '$cname' AND `dateandtime` >= '2023-03-12 00:00:00' AND `dateandtime` < '{$dat} 23:59:59'";
        $heartgoal = $conn->query($heart);
        $heartgoal1 = mysqli_fetch_assoc($heartgoal);
        if ($heartgoal1 != null) {
            if ($heartgoal1['average'] >= $row['heart']) {
                $on[$i]['heart'] = $heartgoal1['average'];
                $off[$i]['heart'] = '-1';
            } else {
                $on[$i]['heart'] = '-1';
                $off[$i]['heart'] = $heartgoal1['average'];
            }
        } else {
            $on[$i]['heart'] = '-1';
            $off[$i]['heart'] = '-1';
        }
        //for weight
        $weight = "SELECT goal FROM `weighttracker` WHERE clientuserID = '$cname' AND `dateandtime` >= '2022-03-09 00:00:00' AND `dateandtime` < '{$dat} 23:59:59'";
        $weightgoal = $conn->query($weight);
        $weightgoal1 = mysqli_fetch_assoc($weightgoal);
        if ($weightgoal1 != null) {
            if ($weightgoal1['goal'] >= $row['weight']) {
                $on[$i]['weight'] = $weightgoal1['goal'];
                $off[$i]['weight'] = '-1';
            }
            
            else {

                $on[$i]['weight'] = '-1';
                $off[$i]['weight'] = $weightgoal1['goal'];
            }
        } else {
            $on[$i]['weight'] = '-1';
            $off[$i]['weight'] = '-1';
        }

        //for sleep
        $sleep = "SELECT hrsSlept FROM `sleeptracker` WHERE clientuserID = '$cname' AND `sleeptime` >= '2022-03-09 00:00:00' AND `sleeptime` < '{$dat} 23:59:59'";
        $sleepgoal = $conn->query($sleep);
        $sleepgoal1 = mysqli_fetch_assoc($sleepgoal);
        if ($sleepgoal1 != null) {
            if ($sleepgoal1['hrsSlept'] >= $row['sleep']) {
               
                $on[$i]['sleep'] = $sleepgoal1['hrsSlept'];
                
                $off[$i]['sleep'] = '-1';
            } else {
                $on[$i]['sleep'] = '-1';
                
                $off[$i]['sleep'] = $sleepgoal1['hrsSlept'];
            }
        } else {
            $on[$i]['sleep'] = '-1';
            $off[$i]['sleep'] = '-1';
        }


        $i++;
    }
}
    }
    }

}
    }
    
?>
 
    <div class="webview_progressdetails">
        <div class="detailed_progress_container2" id="container2">
            <?php
            if(count($on) == 0){
                echo("<h5>Set Goal To Fetch Data Here</h5>");
            }
    foreach ($on as $r) {
    echo ('<div class="container2_wrapper1">');
    if ($r['steps'] != '-1' || $r['heart'] != '-1' || $r['weight'] != '-1' || $r['sleep'] != '-1') {
        echo ('<div style="display: flex; justify-content: center; align-items: center;"><span><img src="'.$DEFAULT_PATH.'assets/images/ronald.svg"  style="width:2rem; background-color:#f8f6f6;border-radius:1rem;margin-right:0.5rem"> <b style="font-weight: 600;">' . $r["name"] . '</b></span></a></span></div>');
    }
    echo('<div class="stats-col">');
    if ($r['steps'] != '-1') {
        echo ('<div class="info"><span>Steps</span><div class="symbols"><div><img class="stat-bar" src="'.$DEFAULT_PATH.'assets/images/orange.svg" alt=""></div><div style="margin-top:0.1rem"><span style="margin-left:0.5rem">' . $r["steps"] . ' steps</span></div></div></div>');
    }
   
    if ($r['heart'] != '-1') {
        echo (' <div class="info"><span>Heart Rate</span> <div class="symbols"><div><img class="stat-bar" src="'.$DEFAULT_PATH.'assets/images/pink.svg" alt=""></div><div style="margin-top:0.1rem"><span style="margin-left:0.5rem">' . $r["heart"] . ' bpm</span></div></div></div>');
    }
    if ($r['weight'] != '-1') {
        echo ('<div class="info"><span>Weight</span> <div class="symbols"><div><img class="stat-bar" src="'.$DEFAULT_PATH.'assets/images/blue.svg" alt=""></div><div style="margin-top:0.1rem"><span style="margin-left:0.5rem">' . $r["weight"] . ' Kgs</span></div></div></div>');
    }
    
    if ($r['sleep'] != '-1') {
        echo ('<div class="info"><span>Sleep</span> <div class="symbols"><div><img class="stat-bar" src="'.$DEFAULT_PATH.'assets/images/purple.svg" alt=""></div><div style="margin-top:0.1rem"><span style="margin-left:0.5rem">' . $r["sleep"] . ' hours</span></div></div></div>');
    }
    echo ('</div>');
    echo('</div> ');
}
?>
        </div>
       
        <div class="detailed_progress_container2" id="container3">
            <?php
             if(count($off) == 0){
                echo("<h5>Set Goal To Fetch Data Here</h5>");
            }
foreach ($off as $r) {
    echo ('<div class="container2_wrapper1">');
    if ($r['steps'] != '-1' || $r['heart'] != '-1' || $r['weight'] != '-1' || $r['sleep'] != '-1') {
        echo ('<div style="display: flex; justify-content: center; align-items: center;"><span><img src="'.$DEFAULT_PATH.'assets/images/ronald.svg" style="width:2rem; background-color:#f8f6f6;border-radius:1rem;margin-right:0.5rem"> <b style="font-weight: 600;">' . $r["name"] . '</b></span></a></span></div>');
    }
    echo('<div class="stats-col">');
    if ($r['steps'] != '-1') {
        echo ('<div class="info"><span>Steps</span> 
        <div class="symbols" style="display: flex;
            flex-wrap: wrap;" >
            <div>
                <img class="stat-bar" src="'.$DEFAULT_PATH.'assets/images/orange.svg" alt="">
            </div>
            <div style="margin-top:0.1rem">
                <span style="margin-left:0.5rem">' . $r["steps"] . ' steps
                </span>
            </div>
        </div>
    </div>');
    }
    if ($r['heart'] != '-1') {
        echo ('<div class="info"><span>Heart Rate</span> <div class="symbols"><div><img class="stat-bar" src="'.$DEFAULT_PATH.'assets/images/pink.svg" alt=""></div><div style="margin-top:0.1rem"><span style="margin-left:0.5rem">' . $r["heart"] . ' bpm</span></div></div></div>');
    }
    if ($r['weight'] != '-1') {
        echo ('<div class="info"><span>Weight</span> <div class="symbols"><div><img class="stat-bar" src="'.$DEFAULT_PATH.'assets/images/blue.svg" alt=""></div><div style="margin-top:0.1rem"><span style="margin-left:0.5rem">' . $r["weight"] . ' kgs</span></div></div></div>');
    }
    if ($r['sleep'] != '-1') {
        echo ('<div class="info"><span>Sleep </span> <div class="symbols"><div><img class="stat-bar" src="'.$DEFAULT_PATH.'assets/images/purple.svg" alt=""></div><div style="margin-top:0.1rem"><span style="margin-left:0.5rem">' . $r["sleep"] . ' hours</span></div></div></div>');
    }
    
    echo ('</div> ');
   echo('</div> ');
}
?>
        </div>
       
    </div>



    <!--------------------------------------- mobview of progress details--------------------------------------------------->

    <div class="mobview_progressdetails">
        <div class="track_buttons">
            <button id="btn2" onclick="myFunction3()">On-Track</button>
            <button id="btn2" onclick="myFunction4()">Off-Track</button>
        </div>

        <script>
            function myFunction3() {
                var x = document.getElementById("container4");
                var y = document.getElementById("container5");

                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                    y.style.display = "none";
                }
            }

            function myFunction4() {
                var x = document.getElementById("container5");
                var y = document.getElementById("container4");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                    y.style.display = "none";
                }
            }
        </script>


        <div class="mobview_container1" id="container4">
            <?php
                    foreach ($on as $r) {
                ?>
            <div class="mob_container1_wrapper1">
                <?php
                    if ($r['steps'] != '-1' || $r['heart'] != '-1' || $r['weight'] != '-1' || $r['sleep'] != '-1') {
                    echo ('<span><a href="" style=" color:black;font-weight:500; border:none; margin-top:1rem;background-color:white; margin-left:1rem"><span><img src="'.$DEFAULT_PATH.'assets/images/ronald.svg" style="width:2rem;border-radius:1rem">'. $r["name"].'</span></a></span>');}
                    ?>
                <div class="row1" style="display:flex; gap:2rem ">
                    <div class="steps">
                        <div class="symbols">
                            <?php
                        if ($r['steps'] != '-1') {
                        echo ('<div style="color:#F6A682"><span class="material-symbols-outlined">footprint</span></div><div style="margin-top:0.2rem; font-weight:500"><span>Steps</span></div></div>
                                            <span style="font-size:0.9rem;color:#454545">'.$r["steps"].' steps</span>');
                        }
                        ?>
                        </div>
                        <div class="steps">
                            <div class="symbols">
                                <?php
                        if ($r['heart'] != '-1') {
                        echo ('<div style="color:#F6A682"><span class="material-symbols-outlined">monitor</span></div><div style="margin-top:0.2rem; font-weight:500"><span>Heart Rate</span></div></div>
                                            <span style="font-size:0.9rem;color:#454545">'.$r["heart"].' bpm</span>');
                        }
                        ?>
                            </div>
                        </div>

                        <div class="row2" style="display:flex ; gap:2rem">
                            <div class="steps">
                                <div class="symbols">
                                    <?php
                        if ($r['weight'] != '-1') {
                        echo ('<div style="color:#F6A682"><span class="material-symbols-outlined">footprint</span></div><div style="margin-top:0.2rem; font-weight:500"><span>Weight</span></div></div>
                                                <span style="font-size:0.9rem;color:#454545">'.$r["weight"].' Kgs</span>');
                        }
                        ?>
                                </div>
                                <div class="steps">
                                    <div class="symbols">
                                        <?php
                        if ($r['sleep'] != '-1') {
                        echo ('<div style="color:#F6A682"><span class="material-symbols-outlined">monitor</span></div><div style="margin-top:0.2rem; font-weight:500"><span>Sleep</span></div></div>
                                                <span style="font-size:0.9rem;color:#454545">'.$r["sleep"].' hours</span>');
                        }
                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                }
                ?>
                        </div>
                        <div class="mobview_container1" id="container5">
                            <?php
                foreach ($off as $rb) {
                ?>
                            <div class="mob_container1_wrapper1">
                                <?php
                    if ($r['steps'] != '-1' || $r['heart'] != '-1' || $r['weight'] != '-1' || $r['sleep'] != '-1') {
                    echo ('<span><a href="" style=" color:black;font-weight:500; border:none; margin-top:1rem;background-color:white; margin-left:1rem"><span><img src="'.$DEFAULT_PATH.'assets/images/ronald.svg" style="width:2rem;border-radius:1rem"> Client ' . $r["name"] . '</span></a></span>');
                    }
                    ?>
                                <div class="row1" style="display:flex ; gap:2rem ">
                                    <div class="steps">
                                        <div class="symbols">
                                            <?php
                        if ($r['steps'] != '-1') {
                        echo ('<div style="color:#F6A682"><span class="material-symbols-outlined">footprint</span></div><div style="margin-top:0.2rem; font-weight:500"><span>Steps</span></div></div>
                                                    <span style="font-size:0.9rem;color:#454545">' .$r["steps"]. ' steps</span>');
                        }
                        ?>
                                        </div>
                                        <div class="steps">
                                            <div class="symbols">
                                                <?php
                            if ($r['heart'] != '-1') {
                            echo ('<div style="color:#F6A682"><span class="material-symbols-outlined">monitor</span></div><div style="margin-top:0.2rem; font-weight:500"><span>Heart Rate</span></div></div>
                                                        <span style="font-size:0.9rem;color:#454545">'.$r["heart"].' bpm</span>');
                            }
                            ?>
                                            </div>
                                        </div>

                                        <div class="row2" style="display:flex ; gap:2rem">
                                            <div class="steps">
                                                <div class="symbols">
                                                    <?php
                            if ($r['weight'] != '-1') {
                            echo ('<div style="color:#F6A682"><span class="material-symbols-outlined">footprint</span></div><div style="margin-top:0.2rem; font-weight:500"><span>Weight</span></div></div>
                                                        <span style="font-size:0.9rem;color:#454545">'.$r["weight"].' Kgs</span>');
                            }
                            ?>
                                                </div>
                                                <div class="steps">
                                                    <div class="symbols">
                                                        <?php
                            if ($r['sleep'] != '-1') {
                            echo ('<div style="color:#F6A682"><span class="material-symbols-outlined">monitor</span></div><div style="margin-top:0.2rem; font-weight:500"><span>Sleep</span></div></div>
                                                            <span style="font-size:0.9rem;color:#454545">' . $r["sleep"] .' hours</span>');
                            }
                            ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                        }
                        ?>
                                        </div>
                                    </div>
                                </div>
                                

<?php require('constant/scripts.php');?>
</body>

</html>