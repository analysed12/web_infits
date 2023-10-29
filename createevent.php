<?php  
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
include("navbar.php");
require('constant/config.php');
    $errors = array('date' => '') ;
    if ( isset ($_POST['submit'])){
        // value from session
    $dietitianuserID = $_SESSION['name'];
    $eventname = $_POST['subject'];
    $clientname = $_POST['clientname'];
    //$sql2 = "Select * from addclient WHERE name='$clientname'" ;
    //$result2 = mysqli_query($conn,$sql2);
    //$row2 = mysqli_fetch_assoc($result2);

    //$clientuserID = $row2['client_id'];


$sql2 = "SELECT * FROM addclient WHERE name='$clientname'";
$result2 = mysqli_query($conn, $sql2);

if ($result2) {
    $row2 = mysqli_fetch_assoc($result2);

    if ($row2) {
        $clientuserID = $row2['client_id'];
    } else {
        // Handle the case where no client data was found
        echo "Client not found.";
    }
} else {
    // Handle query error
    echo "Error executing client query: " . mysqli_error($conn);
}



    $meeting_type = $_POST['meetingtype'];
    $place_of_meeting = $_POST['placeofmeeting'];
    $description = $_POST['description'];
   // $attachment = "hello";
   $attachment_name = '';
if(isset($_FILES['attachment'])) {
    $errors= array();
    $attachment_name = $_FILES['attachment']['name'];
    $attachment_tmp_name = $_FILES['attachment']['tmp_name'];
    $attachment_size = $_FILES['attachment']['size'];
    $attachment_type = $_FILES['attachment']['type'];
   // $attachment_ext = end(explode('.',$attachment_name ));
    $attachment_ext_array = explode('.', $attachment_name);
$attachment_ext = end($attachment_ext_array);

    $extention =array("jpeg","jpg","png");

    if(in_array($attachment_ext,$extention)=== false)
    {
        $errors [] ="please choose jpg or png";
    }

    if ($attachment_size > 2097152) {
        $errors[] ="file size must be 2mb or less ";

    }
    if(empty($errors)==true){
        move_uploaded_file($attachment_tmp_name, "upload/". $attachment_name);
  
    }
    else {
        print_r($errors);
        die();
    }
    //echo "Attachment Name: " . $attachment_name;   
}
    



    $start_date = date('Y-m-d H:i:s', strtotime($_POST['startdate']));
    $end_date = date('Y-m-d H:i:s', strtotime($_POST['enddate']));
    $start_date_time = substr($start_date,-8);
    $start_date_date = substr($start_date,0,10);

    $count = 0;
    $sql = "Select * from create_event" ;
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){ 
        $date_start = $row['start_date'] ;
        $date_time_start = substr($date_start,-8);
        $date_date_start = substr($date_start,0,10);
        $date_end = $row['end_date'] ;
        $date_time_end = substr($date_end,-8);
        $date_date_end = substr($date_end,0,10);
        if ( $date_date_start == $start_date_date){
            if (($start_date_time > $date_time_start) && ($start_date_time < $date_time_end))
            {
                $date_time_start_onlytime = substr($date_time_start,0,5) ; 
            $count ++;
            }
        }   
    }

    if ($count== 0)
    {
        $sql1 = "INSERT INTO create_event (dietitianuserID,eventname, clientuserID, meeting_type, start_date, end_date, place_of_meeting,
         description, attachment) VALUES ('$dietitianuserID','$eventname','$clientuserID','$meeting_type','$start_date',
         '$end_date','$place_of_meeting','$description',' $attachment_name')";
        $result1=mysqli_query($conn,$sql1);
        printf("<script>location.href='calendar_of_events.php'</script>");
    }
    else{
        echo '<div style="text-align:center;background: #FFFFFF;
        border: 1px solid #F1F1F1;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        border-radius: 8px;margin-top:20px;width:30%;margin-left:45%">
        <p style="text-align:center; color:red;font-weight:bold;">Alert !!</p>
        <p>Appointment already booked !!</p>
        </div>' ;
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('constant/head.php');?>
    <title>Create Event</title>

</head>
<style>
::placeholder {
    font-size: 19px !important;
}

body {
    font-family: 'NATS', sans-serif !important;
}

.modal {
    display: none !important;
    position: fixed !important;
    z-index: 1 !important;
    padding-top: 200px !important;
    left: 0 !important;
    top: 0 !important;
    width: 100% !important;
    height: 100% !important;
    overflow: auto !important;
    background-color: rgb(0, 0, 0) !important;
    background-color: rgba(0, 0, 0, 0.4) !important;
}

.modal-content {
    background-color: #fefefe !important;
    margin: auto !important;
    padding: 20px !important;
    border: 1px solid #888 !important;
    width: 30% !important;
    border-radius: 7px !important;
}

.close {
    color: #aaaaaa !important;
    float: right !important;
    font-size: 28px !important;
    font-weight: bold !important;
}

.close:hover,
.close:focus {
    background-color: red !important;
    padding: 5px 10px !important;
    color: white !important;
    text-decoration: none !important;
    cursor: pointer !important;
}

.alert-header {
    text-align: center;
    color: red;
    font-weight: bold;
}

.modal-content p {
    text-align: center;
    padding-top: 5px;
}

.rem-item {
    color: #4B9AFB;
    font-size: 17px;

}

.event_title {
    font-weight: 400;
    font-size: 28px;
    line-height: 59px;
    text-transform: capitalize;
    color: #000000;

}

 {
    overflow-x: hidden;
}

#content {
    display: flex;
    flex-direction: column;
    height: 90%;
    font-style: normal;
    font-weight: 500;
    padding: 20px;
}

.event-form {
    padding: 2%;
    margin-left: 15%;
    margin-right: 15%;
}

.ev-img {
    display: flex;
    justify-content: center;
    align-items: center;
}

.event-image {
    width: 150px;
    height: 120px;
}

.event_title {
    font-size: 15px;
    font-weight: 800;
    margin-bottom: 15px;
}

.eve_form {
    padding: 10px;
}

.subject {
    display: block;
    width: 100%;
}
/*
.rem-item {
    background: #FFFFFF;
    border: 1px solid #4B9AFB;
    border-radius: 45px;
    padding: 10px;
    margin: 10px;
    font-size: 18px;
}

.rem_icon {
    color: #4B9AFB;
    margin-right: 15px;
}
*/
.content-name {
    position: absolute;
    bottom: 5px;
    left: 0px;
    transition: all 0.3s ease;
}

.form_btn {
    width: 40%;
    border-color: #4B9AFB;
    border-radius: 10px;
    color: white;
    text-align: center;
    padding: 15px;
    margin-top: 30px;
}

.txt {
    width: 100%;
    margin-bottom: 10px;
    margin-top: 15px;
    cursor: pointer;
}

.txt p {
    padding-left: 15px;
}

.txt a {
    padding-left: 15px;
}

.txticon {
    padding: 10px;
}

.input-icons i {
    position: absolute;
}

.input-icons {
    width: 100%;
    margin-bottom: 10px;
    border: none;
}

.icon {
    padding: 10px;
    color: black;
    min-width: 50px;
}

.input-field {
    width: 100%;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 50px;
}

/* POPUP */

.pop-box .button {
    font-size: 18px;
    text-decoration: none;
    color: black;
    border: 1px solid black;
    border-radius: 20px;
    margin-top: 20px;
    padding: 10px 20px;
}

.bg-popContainer {
    display: none;
}

.pop-box {
    width: 100%;
    height: auto;
    background: #FFFFFF;
    border: 1px solid rgba(225, 225, 225, 0.66);
    box-shadow: 0px 11px 25px rgba(0, 0, 0, 0.1);
    padding: 20px;
    position: relative;
}

.cont {
    border-radius: 20px;
}

input {
    width: 50%;
    display: block;
    margin: 15px auto;
    padding: 5px;
}

.closer {
    position: absolute;
    top: 0;
    right: 14px;
    font-size: 30px;
    transform: rotate(45deg);
    cursor: pointer;
}

::placeholder {
    color: black;
    opacity: 1;
}

:-ms-input-placeholder {
    color: black;
}

::-ms-input-placeholder {
    color: black;
}
@media screen and (min-width: 720px) {
    .mobile-menu {
        display: none;
    }
}

@media (min-width: 0px) and (max-width: 720px) {
    .event-form {
        margin-left: 0 !important;
        width: 100%;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-direction: column;
    }

}

.reminder {
        font-family: Arial, sans-serif;
    }

    .event_title {
        font-size: 28px;
        font-weight: 400;
    }

    .rem {
        display: flex;
        flex-wrap: wrap;
    }

    .rem-item {
        position: relative;
        display: inline-block;
        font-size: 18px;
        background: #FFFFFF;
        border: 1px solid #4B9AFB;
        border-radius: 45px;
        padding: 10px;
        margin: 10px;
        cursor: pointer;
    }

    .rem-item input[type="radio"] {
        display: none;
    }

    .rem_icon {
        color: #4B9AFB;
        margin-right: 15px;
        display: inline-block;
        vertical-align: middle;
        width: 20px;
        height: 20px;
        border: 1px solid #4B9AFB;
        border-radius: 50%;
        text-align: center;
        line-height: 18px;
    }

    .rem-item label {
        display: inline-block;
        vertical-align: middle;
    }

    .rem-item input[type="radio"]:checked + .rem_icon {
        background-color: #4B9AFB;
    }

    .otherInput {
        position: relative;
        margin-top: 10px;
    }

    .otherInput input[type="text"] {
        width: 100%;
        padding: 10px;
        background-color: #FFFFFF;
        border: 1px solid #4B9AFB;
        border-radius: 45px;
        font-size: 18px;
        text-align: center;
        
        
    }
</style>

<body>
    <!-- Contents Start -->
    <div id="content">
        <p style="margin-left:1.5rem;margin-top:0.7rem;font-weight:400;font-size:40px">Add Event</p>
        <div class="event-form">
            <div class="ev-img">
                <img class="event-image" src="<?=$DEFAULT_PATH?>assets/images/event_image.svg" alt="">
            </div>

            <form action="#" method="post" enctype="multipart/form-data">
                <div class="eve_form" style="">
                    <!-- Event name field -->
                    
                    <label for="subject" class="event_title" style="font-size:28px;font-weight:400">Event Name</label>
                    <input class="subject" type="text" name="subject" placeholder="Category" style="padding:10px 20px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);border-radius: 10px; border: 1px solid #F1F1F1;" required>

                    <br>

                   <!-- <div class="reminder">
                        <div class="event_title" style="font-size:28px;font-weight:400"> Meeting Type</div>
                        <div class="rem">
                            <div style="display: inline-block;font-size:19px" class="rem-item">
                            <img src="<?=$DEFAULT_PATH?>assets/images/Toolbox.svg"> Consultation</div>
                            <div style="display: inline-block;font-size:19px" class="rem-item">
                            <img src="<?=$DEFAULT_PATH?>assets/images/Healthy Eating.svg"> Diet Plan</div>
                            <div style="display: inline-block;font-size:19px" class="rem-item">
                            <img src="<?=$DEFAULT_PATH?>assets/images/Ringer Volume.svg">Call</div>
                            <div style="display: inline-block;font-size:19px" class="rem-item">
                            <img src="<?=$DEFAULT_PATH?>assets/images/Plus Math.svg">Others </div>
                        </div>     
                    </div> -->


<div class="reminder">
    <div class="event_title">Meeting Type</div>
    <div class="rem">
        <label class="rem-item">
            <input type="radio" name="meeting_type" value="consultation" id="consultation">
            <span class="rem_icon"></span>
            <img src="<?=$DEFAULT_PATH?>assets/images/Toolbox.svg" alt=""> Consultation
        </label>
        <label class="rem-item">
            <input type="radio" name="meeting_type" value="diet_plan" id="diet_plan">
            <span class="rem_icon"></span>
            <img src="<?=$DEFAULT_PATH?>assets/images/Healthy Eating.svg" alt=""> Diet Plan
        </label>
        <label class="rem-item">
            <input type="radio" name="meeting_type" value="call" id="call">
            <span class="rem_icon"></span>
            <img src="<?=$DEFAULT_PATH?>assets/images/Ringer Volume.svg" alt=""> Call
        </label>
        <label class="rem-item">
            <input type="radio" name="meeting_type" value="others" id="others" onclick="showTextField()">
            <span class="rem_icon"></span>
            <img src="<?=$DEFAULT_PATH?>assets/images/Plus Math.svg" alt=""> Others
        </label>
        <div class="otherInput" style="display: none;">
            <input type="text" name="other_meeting_type" placeholder="Enter other type">
        </div>
    </div>
</div>

                    <!-- Main event details form -->
                    <div class=" event_title" style="font-size:28px;font-weight:400"> Event Details</div>

                    <div style="max-width:100%;margin:auto">
                                <div class="input-icons" style="font-size:19px;display:flex;align-items:center">
                                <img class="icon" style="position:absolute;min-width: 0px;" src="<?=$DEFAULT_PATH?>assets/images/Group 3.svg"
                                style="display:flex;align-items:center">
                                 <input type="text" placeholder="Add Client"
                                 style="border-top:none;border-left:none;border-right:none;border-bottom: 1px solid #EFEFEF;"
                                 name="clientname" class="input-field" required>
                                </div>
   
                        <!-- Meeting type fields -->
                    <div class="input-icons" style="font-size:19px;display:flex;align-items:center">
                            <img class="icon" style="position:absolute;min-width: 0px;"
                                src="<?=$DEFAULT_PATH?>assets/images/Briefcase.svg">

                            <select
                                style="border-top:none;border-left:none;border-right:none;border-bottom: 1px solid #EFEFEF;"
                                name="meetingtype" class="input-field" required>
                                <option value="" disabled selected style="font-size:19px">Meeting Type</option>
                                <option value="Videocall">Video Call</option>
                                <option value="Call">Call</option>
                                <option value="In person">In person</option>
                            </select>
                        </div>


                        <!-- Date and Time fields -->
                        <div class="txt button" id="button" style="border-bottom: 1px solid #EFEFEF;">
                            <img src="<?=$DEFAULT_PATH?>assets/images/Schedule.svg"
                                class="fa-solid fa-calendar-days txticon"
                                style="display:inline-block; padding:0px; color:black  !important">
                            <p style="display:inline-block;padding-left: 10px;font-size:19px">Date and Time</p>
                        </div>
                        <div id="bg_container" class="bg-popContainer" style="color:black">
                            <div class="pop-box">
                                <div id="close" class="closer">+</div>
                                <div>
                                    <p style="display:inline-block; margin-right:10px">Start Date</p>
                                    <input style="display:inline-block;" type="datetime-local" name="startdate"
                                        placeholder="StartDate" id="startdate" required>
                                </div>
                                <div>
                                    <p style="display:inline-block;margin-right:18px;">End Date</p>
                                    <input style="display:inline-block;" type="datetime-local" id="enddate"
                                        placeholder="EndDate" name="enddate" required>
                                </div>

                            </div>
                        </div> 

                        <!-- Place of meeting field -->
                       <!--<div class="input-icons">
                            <img class="icon" style="position:absolute;min-width: 0px;"
                                src="<?=$DEFAULT_PATH?>assets/images/Briefcase.svg">

                            <input
                                style="border-top:none;border-left:none;border-right:none;border-bottom: 1px solid #EFEFEF;"
                                class="input-field" type="text" placeholder="Place of meeting" name="placeofmeeting">
                        </div> -->
                        
<!--<div class="input-icons">
    <img class="icon" style="position: absolute; min-width: 0px;" src="<?=$DEFAULT_PATH?>assets/images/Briefcase.svg">

    <a id="placeOfMeetingLink" href="#" style="border-top: none; border-left: none; border-right: none; border-bottom: 1px solid #EFEFEF;"
       class="input-field" target="_blank" rel="noopener noreferrer">
        Place of meeting
    </a>
</div>-->

<!-- Place of meeting field -->
<div class="input-icons">
    <img class="icon" style="position: absolute; min-width: 0px;" src="<?=$DEFAULT_PATH?>assets/images/Briefcase.svg">

    <input id="placeOfMeeting" style="border-top: none; border-left: none; border-right: none; border-bottom: 1px solid #EFEFEF;"
           class="input-field" type="text" placeholder="Place of meeting" name="placeofmeeting">
    <a id="placeOfMeetingLink" href="#" style="display: none;padding: 100px 0px 0px 50px" target="_blank" rel="noopener noreferrer" >
        Click to join the meeting
    </a>
</div>

<script>
    const meetingTypeSelect = document.querySelector("select[name='meetingtype']");
    const placeOfMeeting = document.getElementById("placeOfMeeting");
    const placeOfMeetingLink = document.getElementById("placeOfMeetingLink");

    meetingTypeSelect.addEventListener("change", function () {
        const selectedValue = this.value;

        if (selectedValue === "Videocall" || selectedValue === "Call") {
            placeOfMeeting.style.display = "none";
            placeOfMeetingLink.style.display = "inline";
            placeOfMeetingLink.setAttribute("href", "http://localhost/infits/dietitian/live_streaming.php?room=jMgcQ4&displayName=InfitsWebTeam");
        } else if (selectedValue === "In person") {
            placeOfMeeting.style.display = "inline";
            placeOfMeetingLink.style.display = "none";
        } else {
            placeOfMeeting.style.display = "inline";
            placeOfMeetingLink.style.display = "none";
        }
    });
</script>

                        <!-- Add Description Field -->
                        <div class="input-icons">

                            <img class="icon" style="position:absolute;min-width: 0px;"
                                src="<?=$DEFAULT_PATH?>assets/images/align-left.svg">

                            <input
                                style="border-top:none;border-left:none;border-right:none;border-bottom: 1px solid #EFEFEF;"
                                class="input-field" type="text" placeholder="Add Description" name="description"
                                required>
                        </div>

                        <!-- Add attachment field -->
                    <div class="input-icons" style="font-size:19px;display:flex;align-items:center">
    <img class="icon" style="position: absolute; min-width: 0px;" src="<?=$DEFAULT_PATH?>assets/images/Attach.svg">

    <label for="attachment" style="border-top: none; border-left: none; border-right: none; border-bottom: none; 
        padding: 0px 0px 0px 50px; cursor: pointer;">
        Attachment
    </label>
    <input type="file" id="attachment" name="attachment" required >
</div>



                   <!--cancel and book appointment button -->
                    <div style="width:100%; margin-left:10%; margin-right:10%;font-size:19px">
                        <a href="createevent.php"><input style="display:inline-block; color:black; background:white;"
                                class="form_btn form_btn1" id='mobile_btn' placeholder="Cancel"></input></a>
                        <button style="display:inline-block; background: #4B9AFB;" id='new_btn' class="form_btn"
                            name="submit" type="submit">Book Appointment</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
    <!-- Contents End -->
    <!-- Appointment booked popup -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="alert-header">ALERT</div>
            <!-- <span class="close">&times;</span> -->
            <?php
            // $date_time_start_onlytime = substr($date_time_start,-6) ;
            ?>
            <p>You already have <> with <> at <>
            </p>
        </div>
    </div>
    <script>
    const popOutButton = document.getElementById("button");
    const exitcontainer = document.getElementById("bg_container");
    const bg_container = document.querySelector(".bg-popContainer");
    popOutButton.addEventListener("click", popOutNow);
    function popOutNow(e) {
        e.preventDefault();
        document.querySelector(".bg-popContainer").style.display = "flex";
    }
    const cancelPop = document.getElementById("close");
    cancelPop.addEventListener("click", CancelPopOut);

    function CancelPopOut(e) {
        e.preventDefault();
        bg_container.style.display = "none";
    }
    //other firld 
    function showTextField() {
        const otherInput = document.querySelector('.otherInput');
        const radioOthers = document.querySelector('input[name="meeting_type"][value="others"]');
        if (radioOthers.checked) {
            otherInput.style.display = 'block';
        } else {
            otherInput.style.display = 'none';
        }
    }
  
    //   link based on the selected meeting type
  
    </script>
    <?php require('constant/scripts.php');?>
</body>
</html>
