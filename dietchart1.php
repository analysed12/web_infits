<?php
error_reporting(0);
include('navbar.php') ?>

<?php require('constant/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infits | DietChart1</title>
    <?php require('constant/head.php');?>

  <style>
    body{
      font-family: 'NATS', sans-serif !important;
    }
    .content{
      height: 90%;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      font-style: normal;
      padding: 5px;
      position: relative;
    }
    .tabcontent{
      padding: 0px 20px !important; 
      margin:0px 0.6rem;
    }
    .day-band{
      display: flex;
      flex-direction: row;
      justify-content: space-evenly;
      margin-left: 1.5rem;
    }
    .day{
      color: black;
      padding: 10px;
      border: none;
      background: none;
      font-size:24pxs
    }
    .day:hover,
    .day.active{
      color: white;
      background: linear-gradient(180deg, #9C74F5 0%, rgba(104, 125, 238, 0.52) 100%);
      border-radius: 14px;
      padding:5px 15px;
      height: 45px;
    }
    .button-container{
      display: flex;
      width: 95%;
      height: 10%;
      padding: 0 20px;
      margin: 0px 0 0 6.5rem;
      font: 10px/1 'NATS', sans-serif;
      align-items: center;
      color: #9C74F5;
      overflow-x: auto;
    }
    .btn1{
      height: 40px;
      width: 190px;
      background-color: #fff; 
      border: none;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: #9C74F5;
      padding: 0 30px;
      margin: 37px;
      text-align: center;
      text-decoration: none;
      font: 20px/1 'NATS', sans-serif;
      border-radius: 10px;
      border: 0.880519px solid #9C74F5;
    }
    .box {
      width: 1000px;
      height: 180px;
      margin: 30px 0px 0 120px;
      padding: 10px;
      display: flex;
      flex-direction: column;
      align-items: left;
      background: #ffffff;
      border: 1px solid white;
      border-radius: 8.80519px;
      box-shadow: 0 7.04415px 21.1324px rgba(176, 190, 197, 0.32),
                  0 2.64156px 4.40259px rgba(176, 190, 197, 0.32);
      overflow-x: auto;
    }
    .box img {
      width: 190px;
      height: 61px;
      margin-left: 10px;
      border-radius: 10px;
      background: url(Screenshot__136_-removebg-preview.png);
    }
    .box h2 {
      font-size: 15px;
      margin-left: 40px;
      margin-bottom: 20px;
      font-weight: bolder;
    }
    .left{
      font-style: normal;
      font-weight: 500;
      font-size: 26.4156px;
      line-height: 40px;
      display: flex;
      align-items: center;
      color: #000000;
    }
    .box h3 {
      text-align: left;
      font-size: 26.4156px;
      margin: 1px 0 10px 10px;
      width: 170px;
      height: 40px;
      font-weight: 500;
      line-height: 40px;
    }
    .tabs {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .add-btn, .btn1, #daytime.active {
      box-sizing: border-box;
      position: relative;
      width: 190px;
      height: 50px;
      cursor: pointer;
      background: #ffffff;
      border: 0.880519px solid #9c74f5;
      box-shadow: 0 0.880519px 4.40259px rgba(0, 0, 0, 0.25);
      border-radius: 10px;
      margin-top: 2rem;
    }
    .add-btn:hover, .btn1:hover {
      background-color: #9c74f5;
      color: white;
    }
    .add-btn img {
      width: 40px;
      height: 30px;
    }
    .saveplan{
      width: 220px;
      height: 55px;
      background: #9C74F5;
      border-radius: 10px;
      border:none;
      color:white;
      font-weight: 400;
      font-size: 25px;
      margin:2rem 3rem;
    }
    .head1{
      display:flex;
      justify-content: space-between;
    }
    .head1 img{
      margin-top:2.6rem;
      cursor: pointer;
    }
    .btn{
      background: #FFFFFF;
      border: 1px solid #9C74F5;
      border-radius: 10px;
      font-size: 25px;
      color: #9C74F5;
    }
    .down{
      font-weight: 400;
      font-size: 33px;
      color: #CBCBCB;
    }
    .hover-text img{
      margin-top: 0.1rem;
    }
    .hover-text:hover .tooltip-text {
      visibility: visible;
    }
    .tooltip-text {
      visibility: hidden;
      position: absolute;
      z-index: 1;
      width: 22rem;
      color: black;
      font-size: 14px;
      border: 1px solid  #e4e1e1;
      box-shadow: 0 4px 4px rgba(0,0,0,0.12);
      border-radius: 10px;
      padding: 0.4rem;
    }
    #right {
      top: 35%;
      left: 80%;
    }
    /* Media queries for smaller screens */
    @media only screen and (max-width: 1300px){
      .box{
        width:auto !important;
        margin: 10px 0px 0 60px !important;
      }
      .button-container{
        margin:0px 0 0 1rem  !important;
      }
    }
    @media  screen and (min-width:720px) and (max-width: 790px){
      .head1{
        flex-direction: column;
        gap:1rem;
      }
      .right-content{
        margin-left: 40px;
      }
    } 
    @media only screen and (max-width: 570px){
      .head1{
        flex-direction: column;
        gap:1rem;
      }
      .right-content{
        margin-left: 40px;
      }
    }
    /* Media queries for even smaller screens */
    @media only screen and (max-width: 480px) {
      .day-band {
        margin-left: 0;
      }
      .button-container {
        font-size: 16px;
        margin: 0px 0px 0 0px !important;
      }
      .btn1 {
        height: 30px;
        width: 130px;
        font-size: 16px;
        margin: 20px;
      }
      .box {
        width: 90%;
        margin: 0px 0px 0 0px !important;
        height: auto;
        flex-wrap: wrap;
      }
      .box div {
        flex-basis: 50%;
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="content">
    <div class="head1">
      <div>
        <div style="display:flex;align-items:center">
          <h1 style="line-height:15px; margin-left:2.3rem; margin-top:3rem; font-weight:400;font-size:40px;width:250px;">New Diet Chart</h1>
          <img src="<?=$DEFAULT_PATH?>assets/images/black-pencil.svg">
        </div>
        <div class="down" style=" margin-left:2.3rem;">Ronald Richard</div>
      </div>
      <div class="right-content" style="display:flex;align-items:center;gap:1rem; margin-right:40px; margin-top:20px;">
        <button class="btn" text="submit"> <span>Connect to plan</span> </button>
          <div class="hover-text"><img  src="<?=$DEFAULT_PATH?>assets/images/error.svg">
            <span class="tooltip-text" id="right">Set default daily fitness for all the clients from here!</span></div> 
          </div>
      </div>
      <br/>
        <div class="day-band" style="font-size:23px !important">
          <button class="day" id="daybtn">Mon</button>
          <button class="day" id="daybtn">Tue</button>
          <button class="day" id="daybtn">Wed</button>
          <button class="day" id="daybtn">Thu</button>
          <button class="day" id="daybtn">Fri</button>
          <button class="day" id="daybtn">Sat</button>
          <button class="day" id="daybtn">Sun</button>
        </div>

        <?php require('constant/scripts.php');?>

        <script>
          function openTab(tabName) {    // Open the tab content on tab click
            var i, tabcontent, tablinks;   // Declare variables
            tabcontent = document.getElementsByClassName("tabcontent");   // Hide all tab content
            for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("btn1");   // Remove the active class from all tab links
            for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";   // Remove the active class from all tab links
            evt.currentTarget.className += " active";
          }
          const days = document.querySelectorAll('.day');
            days.forEach(day => {      // Remove the active class from all tab links
              day.addEventListener('click', () => {
                days.forEach(btn => btn.classList.remove('active'));   // Remove the active class from all buttons
                day.classList.add('active');  // Add the active class to the clicked button
              });
          });
          const time = document.querySelectorAll('#daytime');
      </script>
      
      <div class="button-container">
        <button id="daytime" class="btn1" onclick="openTab('breakfast')">Breakfast</button>
        <button id="daytime" class="btn1" onclick="openTab('lunch')">Lunch</button>
        <button id="daytime" class="btn1" onclick="openTab('snacks')">Snacks</button>
        <button id="daytime" class="btn1" onclick="openTab('dinner')">Dinner</button>
      </div>
      <div id="breakfast" class="tabcontent">
        <div class="box" id="box1">
          <div class="left">
            <h3> In Morning </h3>
          </div>
          <div class="tabs">
            <button class="add-btn" style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
            <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
            <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
            <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
          </div>   
        </div>
        <br/>
        <div class="box" id="box2">
          <div class="left">
            <h3> After Break </h3> 
          </div>
          <div class="tabs">
            <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
            <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
            <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
            <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
          </div>
        </div>  
      </div>	
      <div id="lunch" class="tabcontent">
        <div class="box" id="box3">
          <div class="left">
            <h3> In Afternoon </h3>
          </div>
          <div class="tabs">
            <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
            <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
            <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
            <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
          </div>
        </div>
      </div>
      <div id="dinner" class="tabcontent">
        <div class="box" id="box4">
          <div class="left">
            <h3> In Night </h3>
          </div>
          <div class="tabs">
            <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
            <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
            <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
            <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
          </div>   
        </div>
        <br/>
        <div class="box" id="box5">
          <div class="left">
            <h3> Light Night Food </h3> </div>
              <div class="tabs">
                <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
                <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
                <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
                <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
              </div>
            </div>
          </div>
          <div id="snacks" class="tabcontent">
            <div class="box" id="box6">
              <div class="left">
                <h3> In Hi-Tea </h3>
              </div>
            <div class="tabs">
              <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
              <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
              <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
              <button class="add-btn"style="font-size:45px; line-height:1px; font-weight:normal; color:#DF6293;">+</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <div style="display:flex;justify-content:right">
    <button class="saveplan">Save Plan</button>
  </div> 
</body>
</html>
