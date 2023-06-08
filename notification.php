<?php
include('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <?php require('constant/head.php');?>
    
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
       
body {
        font-family: 'NATS', sans-serif;
        
    }
element.style{
    font-weight:400 !important;
}
    .maincontainer{
    margin-top: 2rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-bottom: 1rem; 
}
.notification_comtainer1{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.dltbtn{
    align-items: center;

    background: #FF5555;
border-radius: 7px;
color:white;
border:none;
padding:4px;
margin-right:20px;
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
.rightside{
    display: flex;
            align-items: flex-end;
            justify-content: space-between;
            flex-direction: column;
}
.container{
    display: flex;
    align-items: center;
    justify-content: center;
    align-items: flex-start;
    
    flex-wrap: wrap;
    gap: 4rem;
}
.items{
    

    display: flex;
    width: 330px;
height: 55px;
margin-bottom:7px;

border-radius: 15px;
color:black;
align-items: center;
justify-content: space-between;
font-size: 24px; 
padding-right: 20px;
    padding-left: 20px;

}
.check1{
    display: inline;
    
}
.check{
  
  display: flex;
    align-items: center;
    margin-left: 4rem;
}
.send{
  font-size: 1.3rem;

}
.time{
    margin-left: 5rem;
    color: #6C6C6C;
    font-size: 13px;
}
.label{
  margin-right: 15px;
  width: 4rem;
  margin-left: 1rem
}
.msg{
  font-size: 16px;
  margin-right: 15px
}
.checkbox{
        width: 18px;
        height: 18px;
        background-color: white;
        border-radius: 7%;
        vertical-align: middle;
}
.check input[type=checkbox] {

}

.items.active .image path {
  fill: red;
}

.items.active .msg {
width: 44px;
height: 25px;
margin-right: 1px;
color:white;
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

.time{
    margin-left:0.2rem;
    font-size: 10px;
}
.send{
  font-size: 1.1rem;
}

.check{
  display: flex;
    align-items: center;
    margin-left:0.5rem;
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
  .dltbtn1{
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
                <button class="dltbtn dltbtn1"> <img src="<?=$DEFAULT_PATH?>assets/images/trash.svg" style="margin-right:5px;width: 10px;" alt="SVG">Delete Selected</button>

                <button class="dltbtn dltbtn2"><img src="<?=$DEFAULT_PATH?>assets/images/trash.svg" style="margin-right:5px; width: 10px;" alt="SVG">Delete All</button>
             </div>
            </div>
<div class="container">
<div class="leftside">
<div class="items active">
<div ><img src="<?=$DEFAULT_PATH?>assets/images/msg.svg" class="image" style="margin-right: 15px"> Messages</div><div class="msg">100</div></div>

<div class="items">
<div><img src="<?=$DEFAULT_PATH?>assets/images/goal.jpg" class="image" style="margin-right: 15px"> Goals</div><div class="msg">10</div></div>

<div class="items">
<div><img src="<?=$DEFAULT_PATH?>assets/images/Group.svg" class="image" style="margin-right: 15px"> Profile Updates</div><div class="msg">17</div ></div>

<div class="items">
<div><img src="<?=$DEFAULT_PATH?>assets/images/Appointment.svg" style="margin-right: 15px"> Appointments</div><div class="msg">7</div></div>

<div class="items">
<div><img src="<?=$DEFAULT_PATH?>assets/images/icon _restaurant_.svg" style="margin-right: 15px"> Meal Tracker</div><div class="msg">4</div></div>

<div class="items">
<div><img src="<?=$DEFAULT_PATH?>assets/images/Health.svg" style="margin-right: 15px"> Health Form</div><div class="msg">9</div></div>
<div class="items">
<div><img src="<?=$DEFAULT_PATH?>assets/images/documents.svg" style="margin-right: 15px"> Documents</div><div class="msg">100</div></div>
<div class="items">
<div><img src="<?=$DEFAULT_PATH?>assets/images/recipe-icon-png-25 1.svg" style="margin-right: 15px">  Recipe/Diet Plan</div><div class="msg">10</div></div>
<div class="items">
<div><img src="<?=$DEFAULT_PATH?>assets/images/material-symbols_list-alt-outline-rounded.svg" style="margin-right: 15px">Task List</div><div class="msg">20</div></div>

</div>
<div class="rightside">


<div class="check1 ">

<div class="check"><input type="checkbox"  class="checkbox">
     <div><img  src="<?=$DEFAULT_PATH?>assets/images/Group 1410112822.svg" class="label" ></div><div class="send">Ronald Richard sent you a message </div><div class="time">1min ago</div>
     </div>

     <div class="check"><input type="checkbox"  class="checkbox">
     <div><img  src="<?=$DEFAULT_PATH?>assets/images/Group 1410112822.svg" class="label" ></div><div class="send">Ronald Richard sent you a message </div><div class="time">1min ago</div>
     </div>

     <div class="check"><input type="checkbox"  class="checkbox">
     <div><img  src="<?=$DEFAULT_PATH?>assets/images/Group 1410112822.svg" class="label" ></div><div class="send">Ronald Richard sent you a message </div><div class="time">1min ago</div>
     </div>

     <div class="check"><input type="checkbox"  class="checkbox">
     <div><img  src="<?=$DEFAULT_PATH?>assets/images/Group 1410112822.svg" class="label" ></div><div class="send">Ronald Richard sent you a message </div><div class="time">1min ago</div>
     </div>

     <div class="check"><input type="checkbox"  class="checkbox">
     <div><label><img  src="<?=$DEFAULT_PATH?>assets/images/Group 1410112822.svg" class="label" ></div><div class="send">Ronald Richard sent you a message </div><div class="time">1min ago</div>
     </div>

     <div class="check"><input type="checkbox"  class="checkbox">
     <div><img  src="<?=$DEFAULT_PATH?>assets/images/Group 1410112822.svg" class="label" ></div><div class="send">Ronald Richard sent you a message </div><div class="time">1min ago</div>
     </div>

     <div class="check"><input type="checkbox"  class="checkbox">
     <div><img  src="<?=$DEFAULT_PATH?>assets/images/Group 1410112822.svg" class="label" ></div><div class="send">Ronald Richard sent you a message </div><div class="time">1min ago</div>
     </div>

     <div class="check"><input type="checkbox"  class="checkbox">
     <div><img  src="<?=$DEFAULT_PATH?>assets/images/Group 1410112822.svg" class="label" ></div><div class="send">Ronald Richard sent you a message </div><div class="time">1min ago</div>
     </div>

     <div class="check"><input type="checkbox"  class="checkbox">
     <div><img  src="<?=$DEFAULT_PATH?>assets/images/Group 1410112822.svg" class="label" ></div><div class="send">Ronald Richard sent you a message </div><div class="time">1min ago</div>
     </div>

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
    <?php require('constant/scripts.php');?>
   </body>