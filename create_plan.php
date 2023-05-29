<?php
ob_start();
include "navbar.php"

?>
<?php
require('constant/config.php');
if (isset($_POST['final_save_btn'])){
    // For tags
    global $conn;
    $name_arr = $_POST['languages'];
    $tags = implode(" , ",$name_arr);
    // $tags = "hello" ;
        $planname = $_POST['plan_name'];
        // dieticianid....This is a session variable
        $dietitianuserID = $_SESSION['dietitianuserID'];
     
        $duration="hello";
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        if(isset($_POST['text_arr'])){
            $myarray = $_POST['text_arr'];
        }
        $features = '';
        if(!empty($myarray)){
            $features = implode(" , ",$myarray);
        }
  
            $sql1 = "INSERT INTO `create_plan` (`dietitianuserID`,`name`,`tags`, `start_date`, `end_date`,`features`, `description`, `price`) VALUES ('$dietitianuserID','$planname','$tags','$start_date','$end_date','$features','$description','$price')";
            echo $sql1;
            $result1=mysqli_query($conn,$sql1);
            header('Location: myplan.php');
   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infits | Create Plan</title>
    
    
    <?php require('constant/head.php');?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
   
</head>
<style>
body {
font-family: 'NATS', sans-serif !important;
}
*{
margin: 0;
padding: 0;
box-sizing: border-box;
}
html {
overflow-x: hidden;
font-size: 13px !important;
}

#content {
display: flex;
flex-direction: column;
height: 90%;

font-style: normal;
font-weight: 500;
font-size: 13px !important;

}

.plan_form {
width: 100%;

}

.event-image {
display: flex;
justify-content: center;
align-items: center;

}

.ev-img {
display: flex;
justify-content: center;
align-items: center;

color: white;
height: 50px;
width: 50px;
margin-bottom:15px;
}

.event-image i {
font-size: 85px;
padding: 10px;
width: 10%;
height: 10%;
}

.event_form {
display: flex;
justify-content: center !important;
align-items: center !important;
margin-left: 20%;
width: 60%;
margin-right: 10%;
margin-bottom: 5%;
}

.evt-form {
width: 60%;
}

input{
padding: 1.5rem !important;
}
.subject tag_title{
color:black;
}
.tag_title {
font-size: 20px;
letter-spacing: 1.5px;
text-transform: capitalize;
font-weight: 600 !important;
color: #1d1e20;
}

.tag-item {
background: #7282fb;
border-radius: 10px;
color: white;
/* padding: 10px; */
width: auto;
}

.subject {
display: block;
width: 100%;
}

.subject-text {
font-size: 13px;

}
.btns{
display: flex;

}
.btns button {
width:40%;
margin-left:20px;
margin-right:20px;
height: 40px;
background: #ffffff;
border: 2px solid #7282fb;
border-radius: 10px;
font-size: 20px;
}

.loginPopup {
position: relative;
text-align: center;
width: 100%;
}

.formPopup {
position: fixed;
left: 45%;
top: 5%;
transform: translate(-50%, 5%);
border: 3px solid #999999;
z-index: 9;
}

.formContainer {
max-width: 300px;
padding: 20px;
background-color: #fff;
}

.formContainer input[type="text"],
.formContainer input[type="password"] {
width: 100%;
padding: 15px;
margin: 5px 0 20px 0;
border: none;
background: #eee;
}

.formContainer input[type="text"]:focus,
.formContainer input[type="password"]:focus {
background-color: #ddd;
outline: none;

}

.formContainer .btn {
padding: 12px 20px;
border: none;
background-color: #8ebf42;
color: #fff;
cursor: pointer;
width: 100%;
margin-bottom: 15px;
opacity: 0.8;
}

.formContainer .cancel {
background-color: #cc0000;
}

.formContainer .btn:hover,
.openButton:hover {
opacity: 1;
}

.plan_name {
text-align: center !important;
border-top: none !important;
border-left: none !important;
border-right: none !important;
outline: none;
font-size: 30px !important;
width: 144px
}
.plan_name:focus{
width: auto !important;
}
.plan_name_box {
text-align: center !important;
}

@media (min-width: 0px) and (max-width: 720px) {
.plan_name_box {
text-align: center;
}

.plan_form {
margin-left: 0% !important;
width: 100% !important;
}

.event_form {
margin-left: 0% !important;
width: 100%;
}
.evt-form {
width: 90%;
}
.tag_title {
font-size:20px !important;
}

.tag-item {
font-size: 12px !important;
}
}

.caret {
display: none !important;
}

.btn-default {
text-shadow: none !important;
}
.btn-group{
width: 100%;
}
.dropdown-toggle::after {
color: #7282FB;

}
.multiselect {
background: none !important;
border:none !important;
color: black !important;
padding: 10px !important;
font-size: 20px !important;
width:100% !important;
height: 40px;
position:relative !important;

}
.multiselect-container{
position: relative;
width: 100% !important;
}
.multiselect.dropdown-toggle.btn.btn-default{
position: relative;
width: 100% !important;
display: flex;
justify-content: space-between;
align-items: center;
padding-left: 1.5rem !important;

}
.checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {
    position: absolute;
    margin-top: 4px\9;
    margin-left: -35px;
}
.multiselect-selected-text{
font-size:18px;
}
.dropdown-menu>.active>a{
background-color: white !important;
}
.dropdown-menu {
border: none;
}
.multiselect-container>li>a>label.checkbox {
margin: 0;
background-color: white;
color: black;
border: none !important;
padding: 1rem;
padding-left: 3rem;
}

.popup {
display: none;

}

.popup.open {
display: block;
}

.blocker {
position: fixed;
top: 0;
left: 0;
bottom: 0;
right: 0;
content: ' ';
background: rgba(0, 0, 0, .5);
}

.popup .contents {
border-radius: 5px;
width: auto;
height: auto;
display: flex-box;
align-items: center;
justify-content: center;
background: #FFF;
position: fixed;
top: 50vh;
left: 50vw;
transform: translate(-50%, -50%);
padding: 20px;
z-index: 999;
}

.popup .contents p {
    text-align: center;
    margin-top: 5px;
    font-size: 36px;
    font-weight: 500;
}

.popup .contents input {
    border: 1px solid #ccc !important;
    text-align: center;
    margin-top: 5px;
    height: 40px;
    padding: 1px !important;
    border-radius: 7px;
    font-size: 20px;

}

.popup .contents button {
    text-align: center;
    margin-top: 15px;
    margin-left: 30%;
    text-decoration: none;
    border: none;
    background: #7D96F8;
    color: white;
    padding: 5px;
    width: 40%;
    border-radius: 5px;
    font-size: 20px;


}




.features_main {
display: flex;
flex-direction: row;
width: 100%;
}

.features_left {
display: flex;
flex-wrap: wrap;
flex-direction: row;
width: 100%;
}

.features_right {
display: flex;
flex-direction: column;
align-items: center;


}

.features_box {
display: flex;
flex-direction: row;
align-items: center;
justify-content: space-between;
padding: 15px;
height: 40px;
width: 70%;
background: #FFFFFF;
box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
border-radius: 7px;
margin: 5px;
}

.ip_box {
background: #FFFFFF;
box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
border-radius: 10px;
border: none;
width: 400px;
padding: 10px;
}


.plan_btn_add {
width: 40px;
display: flex;
align-items: center;
justify-content: center;
margin-top: 5%;
}

.plan_btn {
color: #FFFFFF;
background: #7282FB;
border-radius: 10px;
height: 40px;
padding-top: 15px;
padding-bottom: 15px;
padding-left: 5px;
padding-right: 5px;
font-family: 'NATS';
font-style: normal;
font-weight: 400;
font-size: 12px;
line-height: 24px;
border: none;


display: flex;
align-items: center;
text-align: right;
letter-spacing: 0.44px;
}
.plan_name::-webkit-input-placeholder {
color: #000;
}
.input-group input {
border: none;
width:78%;
}

.input-group input:focus {
outline: none !important;
}

.remove-textbox {
color: black;
background: white;
border: none;
}

label{
margin-bottom:0px !important;
}

::placeholder {
font-family: 'NATS';
color: #bbbb;
opacity: 1;
}

/* placeholder text style */
input[type="date"]::-webkit-datetime-edit-text,
input[type="date"]::-webkit-datetime-edit-month-field,
input[type="date"]::-webkit-datetime-edit-day-field,
input[type="date"]::-webkit-datetime-edit-year-field {
color: #bbbbbb;
}
/***********************FEATURE POPUP STYLES *******************************/

/* Style for pop-up form */
.modal {
display: none; /* Hide the modal by default */
position: fixed; /* Stay in place */
z-index: 1; /* Sit on top */
left: 0;
top: 0;
width: 100%;
height: 100%;
overflow: auto; /* Enable scroll if needed */
background-color: rgba(0,0,0,0.4); /* Black with opacity */
}

.modal-content {
    border-radius: 5px;
    width: auto;
    height: auto;
    display: flex-box;
    align-items: center;
    justify-content: center;
    background: #FFF;
    position: fixed;
    top: 50vh;
    left: 50vw;
    transform: translate(-50%, -50%);
    padding: 20px;
    z-index: 999;
}

.close {
color: #aaa;
float: right;
font-size: 28px;
font-weight: bold;
}

.close:hover,
.close:focus {
color: black;
text-decoration: none;
cursor: pointer;
}
.skill-box{
box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
height: 40px;
/* text-align: center; */
width: 50%;
display: flex;
justify-content: space-between;
align-items: center;
padding: 1rem;
border-radius: 7px;
}
.remove-skill-btn{
border: none;
background-color: white;
}
#skill-input{
    border: 1px solid #ccc !important;
    text-align: center;
    margin-top: 5px;
    height: 40px;
    padding: 1px !important;
    border-radius: 7px;
    font-size: 20px;
}
#add-feature-submit-btn{
    text-align: center;
    margin-top: 15px;
    text-decoration: none;
    border: none;
    background: #7D96F8;
    color: white;
    padding: 5px;
    width: 40%;
    border-radius: 5px;
    font-size: 20px;
}
/*************************MEDIA QUERY FOR SMALL DEVICES ******************************/
@media screen and (max-width: 720px) {
.edit-plan-img{
margin-top: 4rem !important;
width: 11rem !important;
}
.header{
margin-left: 2rem !important;
margin-top:0px !important;
font-size: 32px !important;
}
.event_form{
width: 100%;
}
}
/****************************media query for mediun devices**************************************/
@media screen and (min-width: 720px) and (max-width: 1200px) {
.plus-icon{
font-size: 12px !important;
font-weight: 100 !important;
/* margin-left: 2px !important; */
}
.evt-form{
width: 100%;
}
}

</style>

<body>
    <!-- Navbar Start -->

    <!-- Navbar End -->

    <!-- Contents Start -->
    <div id="content">

        <h4 style="font-size:40px;margin-left:3.5rem;margin-top:3.3rem;font-weight:400 !important" class="header">Create Plan</h4>

        <!-- Other content -->
        <div class="plan_form">
            <!-- Person image -->
            <div class="event-image">
                <div class="ev-img" style="position:relative">
                <div style="background: #7282FB;border-radius:100px;padding:0.5rem;margin-top:3rem;cursor:pointer;"> <img src="<?=$DEFAULT_PATH?>assets/images/whitepencil.svg" alt=""></div>
                    <img src="<?=$DEFAULT_PATH?>assets/images/create_edit_plan.svg" class="edit-plan-img"  style="position:absolute;width:15rem;margin-top:2rem; z-index:-2; width: 144px;
                    height: 110px;" >
                </div>
                </div>
            </div>
            <br>
            <form action="create_plan.php" method="post">
                <!-- Plan name -->
                <div style="margin-top:2rem; display: flex; justify-content: center; align-items: center;" class="plan_name_box">
                    <input type="text" placeholder="Plan Name" class="plan_name p-0" name="plan_name" style="border:none;" required><img src="<?=$DEFAULT_PATH?>assets/images/pencil.svg" alt="">
                </div>
                <!-- Main form starts -->
                <div class="event_form">
                    <div class="evt-form">

                        <!-- Different Tags -->
                        <div class="tags" style="margin-top:1rem">
                            <div class="tag_title">Tags</div>
                            <div class="tag mt-3" style="width:100%;">
                                <div
                                    style=" height: 40px; display: inline-block; border:none;font-size: 12px; width: 80%; background: white !important;
                                        border-radius: 7px !important;
                                        /* border: 1px solid black !important; */
                                        box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25) !important;">
                                    <select id="fields_u" style="position: relative;" name="languages[]" multiple >
                                        <option value="Keto Diet">Keto Diet</option>
                                        <option value="Vegan Diet">Vegan Diet</option>
                                        <option value="Diet Chart">Diet Chart</option>
                                    </select>

                                </div>

                                <script type="text/javascript">
                                $(document).ready(function() {
                                    $('#fields_u').multiselect();
                                    $('#fields_u').multiselect('select', ['Keto Diet']);
                                    $('#fields_u').multiselect('select', ['Vegan Diet']);


                                    $('#fields_u_add').on('click', function() {
                                        $textValue = document.getElementById("txt").value;
                                        $('#fields_u').append('<option value="' + $textValue + '">' +
                                            $textValue + '</option>');
                                        $('#fields_u').multiselect('select', ['$textValue']);

                                        event.preventDefault();
                                        $('#fields_u').multiselect('rebuild');
                                        popup.classList.remove('open');
                                    });


                                });
                                </script>


                                <button onclick="showPopup()" style="float:right;display: inline-block;width:40px; height: 40px; border:none; text-align: center;"
                                    class="tag-item openButton openBtn"><i class="fas fa-plus"style="font-size:25px;" class="plus-icon"></i></button>
                                <div class="popup">
                                    <div class="blocker" onclick="hidePopup()"></div>
                                    <div class="contents">
                                        <p>Add Tags</p>
                                        <input type="text" id="txt" name="tag_name"
                                            placeholder="Type Tag Name here....">
                                        <br>
                                        <button id="fields_u_add">Add</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Tags end here -->

<!-------------------------------------PLAN DURATION TAG--------------------------------------------->
                        <br>
                        <label for="" class="subject tag_title">Plan Duration</label>
                        <div style="width:100%;">
                            <div style="display:inline-block;width:46%; margin-right:6%;">
                                <p style="font-size:18px;color: #6C6F71;">From</p>
                                <input class="subject subject-text" type="text" placeholder="MM / DD / YYYY" onfocus="this.type='date'" onblur="this.type='text'" name="start_date" style="height: 40px; background: #FFFFFF;
    box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
    border-radius: 7px;
    border:none;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 17px;
    "
     />
                            </div>
                            <div style="display:inline-block;width:46%;">
                                <p style="font-size:18px; margin-top:10px;color: #6C6F71;">To</p>
                                <input class="subject subject-text" type="text" placeholder="MM / DD / YYYY" onfocus="this.type='date'" onblur="this.type='text'"  name="end_date" style="height: 40px; background: #FFFFFF;
    box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
    border-radius: 7px;
    border:none;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 17px;
    " />
                            </div>
                        </div>
                        <br>
<!-------------------------------------FEATURES TAG--------------------------------------------->
                        <label for="" class="subject tag_title">Features</label>

                        <div class="features_main mt-2">
                            <div class="features_left textbox-wrapper">
                                <div class="input-group">
                                    <div class="skills-list">
                                        <!-- Skills added dynamically using JavaScript -->
                                      </div>
                                </div>

                            </div>
                    
                           <!---------------------------FEATURES POP-UP CODE ---------------------------------->
                           <div class="features-container">
                            
                            <div class="features_right add-feature">
                                <button style="font-size:25px" type="button" class="plan_btn_add plan_btn add-textbox add-feature-btn">
                                <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            
                          </div>
                          
                          <!-- Pop-up form to add skills -->
                          <div id="add-feature-modal" class="modal">
                            <div class="modal-content">
                              <span class="close d-none">&times;</span>
                              <h2 style="text-align: center;margin-top: 5px;font-size: 36px;font-weight: 500;">
                                Add a Feature</h2>
                              <input type="text" id="skill-input" placeholder="Type a Feature here...">
                              <button type="button" id="add-feature-submit-btn">Add</button>
                            </div>
                          </div>
                          <!----------------------FEATURES POP-UP CODE END------------------>                         

                            
                        </div>

                        <br>
                        <!-------------------------------------DESSCRIPTION TAG--------------------------------------------->
                        <label for="" class="subject tag_title">Description</label>
                        <input class="subject mt-3" placeholder="Description" type="text" name="description" style="height: 40px;  background: #FFFFFF;
    box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
    border-radius: 7px;
    border:none;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 17px;
    padding:1.5rem; " />
                        <br />
                      <!-------------------------------------PRICE TAG--------------------------------------------->
                        <label for="" class="subject tag_title">Price</label>
                        <input class="subject subject-text mt-3" type="number" name="price" placeholder="Rs. /month" style="height: 40px; background: #FFFFFF;
    box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
    border-radius: 7px;
    border:none;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 17px;
    padding:1.5rem;" />

                        <br>
                        <!-------------------------------------BOTTON BUTTONS--------------------------------------------->
                        <div class="btns">
                            <button style="color:#7282FB" >Cancel</button>
                            <button style="background-color:#6883FB;color:white;" name="final_save_btn" type="submit">Save</button>
                        </div>
                      
                    </div>

                </div>

            </form>

        </div>

    </div>


    <!-- Contents End -->


    <!-- Pop up ends -->
  
  <?php require('constant/scripts.php');?> 
  
</body>
<?php
$output = ob_get_clean();

// Modify the headers
// header('Content-Type: text/html');
// header('Cache-Control: no-cache');

// Flush the headers to the browser
ob_end_flush();
echo $output;
?>
<script>
$(document).ready(function() {
    $('#languages').multiselect({
        nonSelectedText: 'Select Tags'
    });
});

const popup = document.querySelector('.popup');

function showPopup() {
    popup.classList.add('open');
    event.preventDefault();

}

function hidePopup() {
    popup.classList.remove('open');
}
</script>



<!--------------------------------JS FOR FEATURE POP-UP-------------------------- -->
<script>
    // Get the modal
var modal = document.getElementById("add-feature-modal");

// Get the button that opens the modal
var btn = document.querySelector(".add-feature-btn");

// Get the <span> element that closes the modal
var span = document.querySelector(".close");

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Get the add skill submit button and skill input field
var addSkillSubmitBtn = document.getElementById("add-feature-submit-btn");
var skillInput = document.getElementById("skill-input");

// Get the skills list container
var skillsList = document.querySelector(".skills-list");

// Initialize skills array
var skills = [];

// Function to add skill to the skills array and display it on the page
function addSkill(skill) {
  // Add skill to skills array
  skills.push(skill);
  
  // Clear skills list container
  skillsList.innerHTML = "";
  
  // Loop through skills array and display each skill in a box/tag
  skills.forEach(function(skill) {
    var skillBox = document.createElement("div");
    skillBox.classList.add("skill-box");
var skillName = document.createTextNode(skill);
skillBox.appendChild(skillName);

// Add remove button to skill box/tag
var removeBtn = document.createElement("button");
removeBtn.classList.add("remove-skill-btn");
var removeIcon = document.createElement("i");
removeIcon.classList.add("fas", "fa-times");
removeBtn.appendChild(removeIcon);
skillBox.appendChild(removeBtn);

// Add event listener to remove button to remove skill from skills array and skills list
removeBtn.addEventListener("click", function() {
  var index = skills.indexOf(skill);
  skills.splice(index, 1);
  skillsList.removeChild(skillBox);
});

skillsList.appendChild(skillBox);
});

// Clear skill input field and close modal
skillInput.value = "";
modal.style.display = "none";
}

// Add event listener to add skill submit button to add skill to skills array and display it on the page
addSkillSubmitBtn.addEventListener("click", function() {
if (skillInput.value.trim() !== "") {
addSkill(skillInput.value.trim());
}
});


</script>

</html>