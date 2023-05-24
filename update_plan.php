<?php
ob_start();
include "navbar.php";
require('constant/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infits | Update Plan</title>
    <?php require('constant/head.php');?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<style>
* {
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
    font-family: "NATS";
    font-style: normal;
    font-weight: 500;
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
    margin-bottom: 15px;
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

input {
    font-size: 20px !important;
}

.subject tag_title {
    color: black;
}

.tag_title {
    font-size: 20px;
    letter-spacing: 1.5px;
    text-transform: capitalize;
    font-weight: 600;
    color: #1d1e20;
}

.tag-item {
    background: #7282fb;
    border-radius: 10px;
    color: white;
    padding: 10px;
    width: auto;
}

.subject {
    display: block;
    width: 100%;
}

.subject-text {
    font-size: 13px;
}

.btns {
    display: flex;
}

.btns button {
    width: 40%;
    margin-left: 20px;
    margin-right: 20px;
    height: 40px;
    background: #ffffff;
    border: 2px solid #7282fb;
    border-radius: 10px;
    font-size: 13px;
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
    width: auto !important;
    padding: 0px !important;
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
        font-size: 16px !important;
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

.btn-group {
    width: 100%;
}

.dropdown-toggle::after {
    color: #7282FB;
}

.multiselect {
    background: none !important;
    border: none !important;
    color: black !important;
    padding: 10px !important;
    font-size: 20px !important;
    width: 100% !important;
    height: 40px;
    position: relative !important;
}

.checkbox {
    font-size: 20px;
}

.multiselect-container {
    position: relative;
    width: 100% !important;
}

.multiselect.dropdown-toggle.btn.btn-default {
    position: relative;
    width: 100% !important;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-left: 1.5rem !important;
}

.dropdown-menu>.active>a {
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
    height: 49px;
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
    width: 78%;
}

.input-group input:focus {
    outline: none !important;
}

.remove-textbox {
    color: black;
    background: white;
    border: none;
}

label {
    margin-bottom: 0px !important;
}

::placeholder {
    color: #bbbbbb;
    opacity: 1;
}

/* placeholder text style */
input[type="date"]::-webkit-datetime-edit-text,
input[type="date"]::-webkit-datetime-edit-month-field,
input[type="date"]::-webkit-datetime-edit-day-field,
input[type="date"]::-webkit-datetime-edit-year-field {
    color: #bbbbbb;
}

.cancelbutton {
    color: #7282FB;
    width: 40%;
    height: 45px;
    background: #ffffff;
    border: 2px solid #7282fb;
    border-radius: 10px;
    font-size: 20px;
}

.savebutton {
    border: none;
    width: 40%;
    background-color: #6883FB;
    color: white;
    height: 47px;
    border-radius: 10px;
    font-size: 20px;
}



/*************************MEDIA QUERY FOR SMALL DEVICES ******************************/
@media screen and (max-width: 720px) {
    .edit-plan-img {
        margin-top: 4rem !important;
        width: 11rem !important;
    }

    .header {
        margin-left: 2rem !important;
        margin-top: 0px !important;
    }

    .event_form {
        width: 100%;
    }
}

/****************************media query for mediun devices**************************************/
@media screen and (min-width: 720px) and (max-width: 1200px) {
    .tag-item {
        margin-left: 2px !important;
    }

    .evt-form {
        width: 100%;
    }
}
</style>
<body>
    <div id="content">
        <p class="header" style="font-size:40px;margin-left:4rem;margin-top:2rem">Edit Plan</p>
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * from `create_plan` where plan_id='$id'";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_array($result)){
        ?>
        <div class="plan_form">
            <!-- Person image -->
            <div class="event-image">
                <div class="ev-img" style="position:relative">
                    <div style="background: #7282FB;border-radius:100px;padding:0.5rem;margin-top:3rem;cursor:pointer;">
                        <img src="<?=$DEFAULT_PATH?>assets/images/Pencil.svg" alt="">
                    </div>
                    <img src="<?=$DEFAULT_PATH?>assets/images/fruit_salad.svg" class="edit-plan-img" style="position:absolute;margin-top:2rem; z-index:-2; width: 126px;
                    height: 133px;">
                </div>
            </div>
            <br>
            <form action="#" method="post">
                <!-- Plan name -->
                <div style="text-align:center !important;;margin-top:2rem;" class="plan_name_box">
                    <input required type="text" placeholder="Plan Name" class="plan_name" name="plan_name"
                        style="border:none;" value="<?php echo $row['name']?>"><i class="fa-solid fa-pen"
                        style="color:#7282FB;cursor:pointer;"></i>
                </div>

                <!-- Main form starts -->
                <div class="event_form">
                    <div class="evt-form">

                        <!--------------------------------------Different Tags--------------------------------------------------------->
                        <div class="tags">
                            <div class="tag_title">Tags</div>
                            <div class="tag mt-3" style="width: 100%;">
                                <div class="tag_select" style="height: 40px; display: inline-block; border:none;font-size: 12px; width: 80%; background: white !important;
                                    border-radius: 7px !important;
                                    /* border: 1px solid black !important; */
                                    box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25) !important;">
                                    <select id="fields_u" style="position: relative;" name="languages[]" multiple>
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
                                        console.log('added');
                                        event.preventDefault();
                                        $('#fields_u').multiselect('rebuild');
                                        popup.classList.remove('open');
                                    });
                                });
                                </script>

                                <button id="plussbutton " onclick="showPopup()"
                                    style="float:right; display: flex;
                                justify-content: center; align-items: center;width:40px; height: 40px; border:none; text-align: center;"
                                    class="tag-item openButton openBtn  "><i class="fas fa-plus"
                                        style="font-size:15px;"></i></button>
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

                        <!----------------------------------PLAN DURATION------------------------------------------------------------------>
                        <br>
                        <label for="" class="subject tag_title">Plan Duration</label>
                        <div class="duration" style="width: 100%;">
                            <div style="display:inline-block;width:46%; margin-right:6%;">
                                <p style="font-size:17px;color: #6C6F71;">From</p>
                                <input required class="subject subject-text" type="date" name="start_date" style="height: 40px; background: #FFFFFF;
                        box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);border-radius: 7px;border:none;font-family: 'NATS';font-style: normal;font-weight: 400;font-size: 20px;
                        " id="width" value="<?php echo $row['start_date']?>"
                                    style="height: 45px;width: 226px; background: #FFFFFF;box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);border-radius: 10px;border:none;color: #BBBBBB;opacity: 0.5;padding:15px" />

                            </div>
                            <div style="display:inline-block;width:46%;">
                                <p style="font-size:17px;color: #6C6F71; margin-top:10px;">To</p>
                                <input required class="subject subject-text" type="date" name="end_date" id="width"
                                    value="<?php echo $row['end_date']?>"
                                    style="height: 40px; background: #FFFFFF;box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);border-radius: 7px;border:none;font-family: 'NATS';font-style: normal;font-weight: 400;font-size: 20px; " />
                            </div>
                        </div>
                        <br>
                        <!---------------------------------DESCRIPTION-------------------------------------------------------------->

                        <label for="" class="subject tag_title">Description</label>
                        <input required id="width" class="subject mt-3" type="text" name="description"
                            placeholder="Description" value="<?php echo $row['description']?>" style="height: 40px;  background: #FFFFFF;
                            box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
                            border-radius: 7px;
                            border:none;
                            font-family: 'NATS';
                            font-style: normal;
                            font-weight: 400;
                            font-size: 20px;
                            padding:1.5rem; " />
                        <br />
                        <label for="" class="subject tag_title">FEATURES</label>
                        <div class="features_main">
                            <div class="features_left textbox-wrapper">
                                <div class="input-group">
                                    <div class="features_box"><input type="text" name="text_arr[]"
                                            value="<?php echo $row['features']?>" /><button type="button"
                                            class="remove-textbox"><i class="fa-solid fa-xmark"></i></button></div>
                                </div>
                            </div>
                            <div class="features_right">
                                <button type="button"
                                    style="float:right; display: flex;
                                justify-content: center; align-items: center;width:40px; height: 40px; border:none; text-align: center;"
                                    class="plan_btn_add plan_btn add-textbox"><i class="fas fa-plus"
                                        style="font-size:15px;"></i></button>
                            </div>
                        </div>
                        <br>

                        <!--------------------------------------------PRICE------------------------------------------------>

                        <label for="" class="subject tag_title" id="width">Price</label>
                        <input required class="subject subject-text" type="number" value="<?php echo $row['price']?>"
                            name="price" placeholder="₹000 / month"
                            style="height: 40px; background: #FFFFFF;box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);border-radius: 7px;border:none;font-family: 'NATS';font-style: normal;font-weight: 400;font-size: 20px;padding:1.5rem;" />
                        <br>
                        <div style="display:flex; gap: 5%;">
                            <button name="final_cancel_btn" class="cancelbutton">Cancel</button>
                            <button name="final_update_btn" class="savebutton" type="submit">Save</button>
                            <button class="savebutton" name="final_save_btn" type="submit">Save as new</button>
                        </div>
                        <br><br><br>
                    </div>
                </div>
            </form>
        </div>
        <?php }
        ?>
    </div>
    <?php
if (isset($_POST['final_update_btn'])){
        $id = $_GET['id'];
        $name_arr = $_POST['languages'];
        $tags = implode(" , ",$name_arr);
        $planname = $_POST['plan_name'];
        $dietitianuserID = $_SESSION['dietitianuserID'];
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
        $sql1 = "UPDATE `create_plan` SET name='$planname',tags='$tags',start_date='$start_date',end_date='$end_date',features='$features',description='$description',price='$price' WHERE plan_id=$id AND dietitianuserID = '$dietitianuserID'";
        $result1=mysqli_query($conn,$sql1);
        if($result1){
            header('Location: myplan.php');
        }
        else{
            die(mysqli_error($conn));
        }
}
else if (isset($_POST['final_save_btn'])){ 
    $id = $_GET['id'];
    $name_arr = $_POST['languages'];
    $tags = implode(" , ",$name_arr);
    $planname = $_POST['plan_name'];
    $dietitianuserID = $_SESSION['dietitianuserID'];
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

    $sql2 = "INSERT INTO `create_plan` (`dietitianuserID`,`name`,`tags`, `start_date`, `end_date`,`features`, `description`, `price`) VALUES ('$dietitianuserID','$planname','$tags','$start_date','$end_date','$features','$description','$price')";
    $result2=mysqli_query($conn,$sql2);

    if($result2){
        header('Location: myplan.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
else if(isset($_POST['final_cancel_btn'])){
    header('Location: myplan.php');
    die('');
}
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

<script>
$(document).ready(function() {
    var max = 10;
    var cnt = 1;
    $(".add-textbox").on("click", function(e) {
        e.preventDefault();
        if (cnt < max) {
            cnt++;
            $(".textbox-wrapper").append(
                '<div class="input-group"><div class="features_box"><input type="text" name="text_arr[]" placeholder="Type feature here.." /><button type="button" class="remove-textbox"><i class="fa-solid fa-xmark"></i></button></div></div>'
            );
        }
    });

    $(".textbox-wrapper").on("click", ".remove-textbox", function(e) {
        e.preventDefault();
        $(this).parents(".input-group").remove();
        cnt--;
    });
});
</script>
<?php require('constant/scripts.php');?>
</body>
</html>