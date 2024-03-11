<?php
require("constant/config.php");
if (isset($_POST['title'])) {
  $title = $_POST['title'];
  if ($title == "all") {
    $sql = "SELECT body, dttmstmp FROM notification ORDER BY dttmstmp DESC";
  }
  $sql = "SELECT body, dttmstmp FROM notification WHERE ttl = '$title' ORDER BY dttmstmp DESC";


  $result = $conn->query($sql);
  $updateData = array();
  if ($result->num_rows > 0) {
    $i = 0;
    while ($row = $result->fetch_assoc()) {

      // $timestamp = strtotime($row['dttmstmp']);
      date_default_timezone_set('Asia/Kolkata');
      $currentTimestamp = new DateTime();
      $timestamp = new DateTime($row['dttmstmp']);



      //calculate year difference
      $year = $currentTimestamp->format('Y') - $timestamp->format('Y');
      $month = $currentTimestamp->format('m') - $timestamp->format('m');
      $day = $currentTimestamp->format('d') - $timestamp->format('d');
      $hour = $currentTimestamp->format('H') - $timestamp->format('H');
      $minute = $currentTimestamp->format('i') - $timestamp->format('i');
      $second = $currentTimestamp->format('s') - $timestamp->format('s');
      if ($year >= 1) {
        $timeAgo = "more than years ago";
      } else if ($month > 0 && $month < 12) {
        $timeAgo = "$month months ago";
      } else if ($day > 0 && $day < 30) {
        $timeAgo = "$day days ago";
      } else if ($hour > 0 && $hour < 24) {
        $timeAgo = "$hour hours ago";
      } else if ($minute > 0 && $minute < 60) {
        $timeAgo = "$minute minutes ago";
      } else if ($second > 0 && $second < 60) {
        $timeAgo = "$second seconds ago";
      }


      $row['timeAgo'] = $timeAgo;

      // array_push($updateData, $row);
      $updateData["key$i"] = $row;
      $i++;
    }
    // header('Content-type: application/json');
    echo (json_encode($updateData));
    exit;
  }
  else{ echo "0";exit;}
}
include('navbar.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifications</title>
  <?php require('constant/head.php'); ?>

  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <style>
    body {
      font-family: 'NATS', sans-serif;

    }

    element.style {
      font-weight: 400 !important;
    }

    .maincontainer {
      margin-top: 2rem;
      display: flex;
      flex-direction: column;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .notification_comtainer1 {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .dltbtn {
      align-items: center;

      background: #FF5555;
      border-radius: 7px;
      color: white;
      border: none;
      padding: 4px;
      margin-right: 20px;
      padding-right: 9px;
      padding-left: 9px;
    }

    .dltbtn1 {
      font-size: 16px;
    }

    .dltbtn2 {
      font-size: 16px;
      margin-right: 44px;
    }

    .rightside {
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      flex-direction: column;
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      align-items: flex-start;

      flex-wrap: wrap;
      gap: 4rem;
    }

    .items {


      display: flex;
      width: 330px;
      height: 55px;
      margin-bottom: 7px;

      border-radius: 15px;
      color: black;
      align-items: center;
      justify-content: space-between;
      font-size: 24px;
      padding-right: 20px;
      padding-left: 20px;

    }

    .check1 {
      display: inline;

    }

    .check {

      display: flex;
      align-items: center;
      margin-left: 4rem;
    }

    .send {
      font-size: 1.3rem;
      width: 50% important;
    }

    .time {
      margin-left: 5rem;
      color: #6C6C6C;
      font-size: 13px;
    }

    .label {
      margin-right: 15px;
      width: 4rem;
      margin-left: 1rem
    }

    .msg {
      font-size: 16px;
      margin-right: 15px
    }

    .checkbox {
      width: 18px;
      height: 18px;
      background-color: white;
      border-radius: 7%;
      vertical-align: middle;
    }

    .check input[type=checkbox] {}

    .items.active .image path {
      fill: red;
    }

    .items.active .msg {
      width: 44px;
      height: 25px;
      margin-right: 1px;
      color: white;
      background: #7282FB;
      border-radius: 8px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .items.active {
      background: rgba(114, 130, 251, 0.1);
      color: #7282FB;
    }

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      body {
        font-size: 16px;
      }
    }

    @media only screen and (max-width: 768px) {

      .time {
        margin-left: 0.2rem;
        font-size: 10px;
      }

      .send {
        font-size: 1.1rem;
      }

      .check {
        display: flex;
        align-items: center;
        margin-left: 0.5rem;
      }

      .label {
        margin-right: 7px;
        width: 4rem;
        margin-left: 0.5rem;
      }
    }

    @media only screen and (max-width: 600px) {
      .container1_leftside {
        margin-bottom: 1rem;
      }

      .container1_rightside {
        margin-left: 33px;
      }

      .dltbtn1 {
        margin-bottom: 5PX
      }

    }
  </style>
</head>

<body>
  <div class="maincontainer">
    <div class="notification_comtainer1">
      <div class="container1_leftside">
        <p style="font-size:40px; font-weight:400 !important;margin-left: 2.5rem;">Notifications</p>
      </div>
      <div class="container1_rightside">
        <button class="dltbtn dltbtn1"> <img src="<?= $DEFAULT_PATH ?>assets/images/trash.svg" style="margin-right:5px;width: 10px;" alt="SVG">Delete Selected</button>

        <button class="dltbtn dltbtn2"><img src="<?= $DEFAULT_PATH ?>assets/images/trash.svg" style="margin-right:5px; width: 10px;" alt="SVG">Delete All</button>
      </div>
    </div>
    <div class="container">
      <div class="leftside">
        <div class="items active" id="all">
          <div><img src="<?= $DEFAULT_PATH ?>assets/images/msg.svg" class="image" style="margin-right: 15px"> Messages</div>
          <?php
          $que = "SELECT COUNT(s_no) AS count FROM notification";
          $exe = $conn->query($que);
          if ($exe->num_rows > 0) {
            $res = $exe->fetch_assoc();
            $no=$res['count'];
          }
          ?>
          <div class="msg"><?php if($res){echo $no;} else {echo"0";}  ?></div>
        </div>

        <div class="items" id="goal">
          <div><img src="<?= $DEFAULT_PATH ?>assets/images/goal.jpg" class="image" style="margin-right: 15px"> Goals</div>
          <?php
          $que = "SELECT COUNT(s_no) AS count FROM notification WHERE ttl = 'goal'";
          $exe = $conn->query($que);
          if ($exe->num_rows > 0) {
            $res = $exe->fetch_assoc();
            $no=$res['count'];
          }
          ?>
          <div class="msg"><?php if($res){echo $no;} else {echo"0";}  ?></div>
        </div>

        <div class="items" id="profile">
          <div><img src="<?= $DEFAULT_PATH ?>assets/images/Group.svg" class="image" style="margin-right: 15px"> Profile Updates</div>
          <?php
          $que = "SELECT COUNT(s_no) AS count FROM notification WHERE ttl = 'profile'";
          $exe = $conn->query($que);
          if ($exe->num_rows > 0) {
            $res = $exe->fetch_assoc();
            $no=$res['count'];
          }
          ?>
          <div class="msg"><?php if($res){echo $no;} else {echo"0";}  ?></div>
        </div>

        <div class="items" id="appointment">
          <div><img src="<?= $DEFAULT_PATH ?>assets/images/Appointment.svg" style="margin-right: 15px"> Appointments</div>
          <?php
          $que = "SELECT COUNT(s_no) AS count FROM notification WHERE ttl = 'appointment'";
          $exe = $conn->query($que);
          if ($exe->num_rows > 0) {
            $res = $exe->fetch_assoc();
            $no=$res['count'];
          }
          ?>
          <div class="msg"><?php if($res){echo $no;} else {echo"0";}  ?></div>
        </div>

        <div class="items" id="meal">
          <div><img src="<?= $DEFAULT_PATH ?>assets/images/icon _restaurant_.svg" style="margin-right: 15px"> Meal Tracker</div>
          <?php
          $que = "SELECT COUNT(s_no) AS count FROM notification WHERE ttl = 'meal'";
          $exe = $conn->query($que);
          if ($exe->num_rows > 0) {
            $res = $exe->fetch_assoc();
            $no=$res['count'];
          }
          ?>
          <div class="msg"><?php if($res){echo $no;} else {echo"0";}  ?></div>
        </div>

        <div class="items" id="health">
          <div><img src="<?= $DEFAULT_PATH ?>assets/images/Health.svg" style="margin-right: 15px"> Health Form</div>
          <?php
          $que = "SELECT COUNT(s_no) AS count FROM notification WHERE ttl = 'health'";
          $exe = $conn->query($que);
          if ($exe->num_rows > 0) {
            $res = $exe->fetch_assoc();
            $no=$res['count'];
          }
          ?>
          <div class="msg"><?php if($res){echo $no;} else {echo"0";}  ?></div>
        </div>
        <div class="items" id="document">
          <div><img src="<?= $DEFAULT_PATH ?>assets/images/documents.svg" style="margin-right: 15px"> Documents</div>
          <?php
          $que = "SELECT COUNT(s_no) AS count FROM notification WHERE ttl = 'document'";
          $exe = $conn->query($que);
          if ($exe->num_rows > 0) {
            $res = $exe->fetch_assoc();
            $no=$res['count'];
          }
          ?>
          <div class="msg"><?php if($res){echo $no;} else {echo"0";}  ?></div>
        </div>
        <div class="items" id="recipe">
          <div><img src="<?= $DEFAULT_PATH ?>assets/images/recipe-icon-png-25 1.svg" style="margin-right: 15px"> Recipe/Diet Plan</div>
          <?php
          $que = "SELECT COUNT(s_no) AS count FROM notification WHERE ttl = 'recipe'";
          $exe = $conn->query($que);
          if ($exe->num_rows > 0) {
            $res = $exe->fetch_assoc();
            $no=$res['count'];
          }
          ?>
          <div class="msg"><?php if($res){echo $no;} else {echo"0";}  ?></div>
        </div>
        <div class="items" id="task">
          <div><img src="<?= $DEFAULT_PATH ?>assets/images/material-symbols_list-alt-outline-rounded.svg" style="margin-right: 15px">Task List</div>
          <?php
          $que = "SELECT COUNT(s_no) AS count FROM notification WHERE ttl = 'task'";
          $exe = $conn->query($que);
          if ($exe->num_rows > 0) {
            $res = $exe->fetch_assoc();
            $no=$res['count'];
          }
          ?>
          <div class="msg"><?php if($res){echo $no;} else {echo"0";}  ?></div>
        </div>
      </div>



      <div class="rightside" id="side">
        <div class="right" id="result">




        </div>

      </div>
    </div>

  </div>
  <script>
    const items = document.querySelectorAll('.items');


    items.forEach((item) => {
      item.addEventListener('click', () => {
        items.forEach((item) => {
          item.classList.remove('active');
        });
        item.classList.add('active');

      });

    });
  </script>


  <script>
    // document.addEventListener('DOMContentLoaded', function() {
    // Get all container elements

    var containers = document.querySelectorAll('.items');

    // Attach click event listener to each container
    containers.forEach(function(container) {
      console.log("we are here in the foreach function call");
      container.addEventListener('click', function() {
        console.log("we are here in the containerID function call");

        // Get the container ID
        var containerId = container.id;
        console.log("containerId  = " + containerId);

        // Make an Ajax request
        $.ajax({
          url: 'notification.php',
          type: 'POST',
          data: {
            title: containerId,
          },
          success: function(responseData) {
            let rd = JSON.parse(responseData);

            console.log(rd);
            console.log("type = " + typeof(rd));
            // let result = document.getElementById('result');
            let result = document.getElementById('result');
            result.innerHTML = '';

            Object.values(rd).forEach((ele) => {
              let newElement = document.createElement("div");
              newElement.classList.add("check");
              newElement.innerHTML = `
            <input type="checkbox" class="checkbox">
            <div><img src="<?= $DEFAULT_PATH ?>assets/images/Group 1410112822.svg" class="label"></div>
            <div class="send" style="width:50%">${ele['body']}</div>
            <div class="time">${ele['timeAgo']}</div>
        `;
              result.appendChild(newElement);
            });
          },

          error: function(xhr, status, error) {
            console.error('This is error:', error);
          }
        });
      });
    });
    // });
  </script>

  <?php require('constant/scripts.php'); ?>
</body>
