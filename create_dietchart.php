<?php include('navbar.php');
require('constant/config.php');
$client_id = $_GET['client_id'];
if (isset($_GET['dietchart_id'])){$dc_id = $_GET['dietchart_id'];}

?>
<?php
    if (isset($_GET['client_id'])){
        if (isset($_POST['dietchart']) && $dc_id!=='-1'){
            $dietchart=$_POST["dietchart"];
            $sql = "UPDATE diet_chart SET dietchart_name = '$dietchart' WHERE client_id = {$_GET['client_id']} AND dietitian_id = {$_SESSION['dietitian_id']} AND dietchart_id=$dc_id";
            if (!($conn->query($sql))) {
                echo $conn->error;
            }else{
                echo "<script>window.location = 'dietchart.php?client_id=$client_id'</script>";
            }
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="dietchart3_style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Infits</title>
    <?php require('constant/head.php'); ?>



</head>
<style>
    body {
        font-family: "NATS", sans-serif !important;
    }

    .main__container {
        overflow: hidden;
    }

    .heading__div {

        margin-top: 2rem;
        margin-left: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0px 20.3px;
    }

    .newDietChart__heading__div {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .New_Diet_Chart {
        font-size: 44px;
        font-style: Regular;
    }

    .edit__icon {
        margin-left: 25px;
        cursor: pointer;
    }

    .Ronald_Richards {
        margin-top: -10px;
        font-size: 33px;
        font-style: Regular;
        color: #cbcbcb;
    }

    .heading__rightDiv {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .heathyDiet__btn {
        background: #9c74f5;
        border-radius: 10px;
        color: #ffffff;
        padding: 7px 20px;
        border: none;
        font-family: "NATS";
        font-style: normal;
        font-weight: 400;
        font-size: 30px;
    }

    .heading__rightDiv_icon {
        margin-left: 14px;
        cursor: pointer;
    }

    /* weeks_div */

    .weeks_div {
        display: flex;
        justify-content: space-evenly;
        width: 70%;
        margin: 0 auto;
        overflow-y: hidden;
    }

    .week__name {
        margin-top: 5px;
        font-style: Regular;
        font-size: 26.42px;
        padding: 0 9px;
        border-radius: 12px;
        transition: 0.2s ease-in-out;
        cursor: pointer;
    }

    .week__name:active {
        color: #fff;
        background: linear-gradient(180deg,
                #9c74f5 0%,
                rgba(104, 125, 238, 0.52) 100%);
    }

    .week__name:hover {
        color: #fff;
        background: linear-gradient(180deg,
                #9c74f5 0%,
                rgba(104, 125, 238, 0.52) 100%);
    }

    /* options__div */
    .options__div {
        width: 80%;
        margin: 20px auto;
        overflow-y: hidden;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }

    .options__btn {
        font-family: "Poppins";
        font-style: normal;
        font-weight: 500;
        font-size: 19.3714px;
        background: #fff;
        border: 0.880519px solid #9c74f5;
        border-radius: 10px;
        padding: 10px 35px;
        color: #9c74f5;
    }

    .options__btn:active {
        background-color: #9c74f5;
        color: #fff;
    }

    .options__btn:hover {
        background-color: #9c74f5;
        color: #fff;
    }

    .active-option {
        background-color: #9c74f5;
        color: #fff;
    }

    .active-day {
        color: #fff;
        background: linear-gradient(180deg,#9c74f5 0%,rgba(104, 125, 238, 0.52) 100%);
    }

    .foodCard__div {
        padding: 30px 25px;
        width: 80%;
        margin: 20px auto;
        overflow-y: hidden;
        background: #ffffff;
        box-shadow: 0px 7.04415px 21.1324px rgba(176, 190, 197, 0.32),
            0px 2.64156px 4.40259px rgba(176, 190, 197, 0.32);
        border-radius: 15px;
    }

    .foodCart__topDiv {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .topDiv__heading {
        font-family: "Poppins";
        font-style: normal;
        font-weight: 500;
        font-size: 26.4156px;
    }

    .calDiv {
        display: flex;
        justify-content: start;
        align-items: start;
    }

    .cal__icon {
        padding-right: 7px;
    }

    .cal__h3 {
        font-family: "Poppins";
        font-style: normal;
        font-size: 20px;
        font-weight: 400;
        color: #a6a1a1;
    }

    .foodCards__wrapper {
        display: flex;
        overflow-x: auto;
        overflow-y: hidden;
    }

    .foodCard {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0px 7px;
    }

    .foodCard img {
        border-radius: 10px;
        border: 1px solid rgba(156, 116, 245, 1);
    }

    .foodName {
        font-family: "NATS";
        font-style: normal;
        font-weight: 400;
        font-size: 25px;
        margin-top: 5px;
    }

    .noteInput__wrapper {
        display: none;
        padding: 8px 15px;
        box-shadow: 0px 7.04415px 21.1324px rgba(176, 190, 197, 0.32),
            0px 2.64156px 4.40259px rgba(176, 190, 197, 0.32);
        border-radius: 8.80519px;
        font-family: "NATS";
        font-style: normal;
        font-weight: 400;
        font-size: 25px;
    }

    .noteInput__wrapper input {
        border: none;
    }

    .addANote__wrapper {
        width: 80%;
        margin: 15px auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .leftDiv__wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #ffffff;
        padding: 8px 15px;
        box-shadow: 0px 7.04415px 21.1324px rgba(176, 190, 197, 0.32),0px 2.64156px 4.40259px rgba(176, 190, 197, 0.32);
        border-radius: 8.80519px;
        cursor: pointer;
    }

    .leftDiv__wrapper button {
        border: none;
        background: transparent;
        font-family: "NATS";
        font-style: normal;
        font-weight: 400;
        font-size: 25px;
    }

    .right__btn {
        background: #9c74f5;
        border-radius: 10px;
        font-family: "NATS";
        font-style: normal;
        font-weight: 400;
        font-size: 30px;
        color: #f8f8f8;
        padding: 5px 25px;
        border: none;
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (max-width: 600px) {
        .heading__div {
            padding: 0px 10.3px;
        }

        .New_Diet_Chart {
            font-size: 35px;
            font-style: Regular;
        }

        .edit__icon {
            margin-left: 10px;
            cursor: pointer;
        }

        .Ronald_Richards {
            margin-top: -10px;
            font-size: 23px;
            font-style: Regular;
            color: #cbcbcb;
        }

        .heathyDiet__btn {
            font-size: 22px;
            padding: 7px 7px;
        }

        .heading__rightDiv_icon {
            margin-left: 7px;
            cursor: pointer;
        }

        .weeks_div {
            width: 95%;
        }

        .options__div {
            width: 96%;
        }

        .options__btn {
            padding: 5px 10px;
        }

        .foodCard__div {
            padding: 25px 20px;
            width: 97%;
        }

        .addANote__wrapper {
            width: 97%;
        }
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (max-width: 720px) {
        .weeks_div {
            width: 95%;
        }

        .options__div {
            width: 96%;
        }

        .options__btn {
            padding: 5px 10px;
        }

        .foodCard__div {
            padding: 25px 20px;
            width: 97%;
        }

        .addANote__wrapper {
            width: 97%;
        }
    }
</style>

<body>
    <?php
    function fetchData($client_id,$dc_id)
    {
        $sql = "SELECT monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM diet_chart where client_id=$client_id AND dietchart_id=$dc_id";
        global $conn;
        $result = $conn->query($sql);
        return ($result);
    }

    function fetchInformation($result, $day)
    {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $daydata = json_decode($row[$day], true);
                return $daydata;
            }
        }
    }
    function compute($info, $time, $subtime)
    {
        global $conn;
        if (isset($info[$time][$subtime])) {
            foreach ($info[$time][$subtime] as $value) {
                
                if ($value['isDefault'] == 'true') {
                    $sqld = "SELECT * FROM default_recipes WHERE drecipe_id = {$value['recipeId']}";
                } else {
                    $sqld = "SELECT * FROM dietitian_recipes WHERE recipe_id = {$value['recipeId']}";
                }
                $resultd = mysqli_query($conn, $sqld);
                if (mysqli_num_rows($resultd) > 0) {
                    while ($row = mysqli_fetch_assoc($resultd)) {
                        $recipe_name = "";
                        if ($value['isDefault'] == 'true') {
                            $recipe_name = $row['drecipe_name'];
                        } else {
                            $recipe_name = $row['recipe_name'];
                        }
    ?>
                        <div class="d-flex justify-content-center flex-column justify-content-center text-center me-4">
                            <img src="assets/images/Alooparantha1.svg">

                            <div class="fw-bold mt-3">
                                <?= $recipe_name ?>
                            </div>
                        </div>
    <?php
                    }
                }
            }
        }
    }
    function update($client_id,$dc_id,$day)
    {
        $result = fetchData($client_id,$dc_id);
        $info = fetchInformation($result, $day);
        return $info;
    }
    ?>

    <?php 
        $sqld = "SELECT name FROM addclient where client_id = $client_id AND dietitianuserID = '{$_SESSION['dietitianuserID']}'";
        $resultd = mysqli_query($conn, $sqld);
        $row = mysqli_fetch_assoc($resultd);

        $sql_ = "SELECT dietchart_name FROM diet_chart where client_id = $client_id AND dietchart_id = $dc_id";
        $resultd = mysqli_query($conn, $sql_);
        $row1 = mysqli_fetch_assoc($resultd);
    ?>
    <div class="main__container">
        <div class="heading__div">
            <div class="heading__leftDiv">
                <div class="newDietChart__heading__div">

                    <h1 class='New_Diet_Chart' contenteditable="true" name="dietchart_0" id="dietcharttitle" style="font-size:40px"><?php if (isset($row1['dietchart_name'])){echo $row1['dietchart_name'];}else{echo "New Diet chart";}?></h1>
                    <input style="display:none;" id="dietcharttitlevalue" name="dietchart_0" type="hidden"/>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/Edit.svg" style="margin-left:10px">
                </div>
                <h2 class='Ronald_Richards' style="font-size:33px"><?=$row['name']; ?></h2>
            </div>
            <div class="heading__rightDiv">
                <button class="heathyDiet__btn">Heathy Diet</button>
                <img src="<?= $DEFAULT_PATH ?>assets/images/error.svg" style="margin-left:10px">
            </div>
        </div>
        <!-- weeks div start.... -->
        <div class="weeks_div" id="nav-tab" role="tablist">
            <button class="week__name btn btn-my tab" tab="monday">Mon</button>
            <button class="week__name btn btn-my tab" tab="tuesday">Tue</button>
            <button class="week__name btn btn-my tab" tab="wednesday">Wed</button>
            <button class="week__name btn btn-my tab" tab="thursday">Thu</button>
            <button class="week__name btn btn-my tab" tab="friday">Fri</button>
            <button class="week__name btn btn-my tab" tab="saturday">Sat</button>
            <button class="week__name btn btn-my tab" tab="sunday">Sun</button>
        </div>
        <!-- ....weeks div end -->
        <div id="monday" class="tab-content">
            <?php $info = update($client_id, $dc_id,"monday"); ?>
            <div class="options__div " id='nav-tab' role='tablist'>
                <button class="options__btn Br tabm " tab="brm">Breakfast</button>
                <button class="options__btn Lu tabm" tab="lum">Lunch</button>
                <button class="options__btn Sn tabm" tab="snm">Snacks</button>
                <button class="options__btn Di tabm" tab="dim">Dinner</button>
            </div>
            <!-- breakfast -->
            <div class="container BrC tabm-content" id="brm">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>In Morning</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <div class='foodCards__wrapper tab-pane fabe'>
                        <?php compute($info, "breakfast", "breakfast_morning") ?>
                        <!-- add more div or u can say button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'monday','breakfast','breakfast_morning') ">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>After break</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "breaka" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "breakfast", "breakfast_after") ?>
                        <!-- add more div or u can say button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'monday','breakfast','breakfast_after')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- lunch -->
            <div class="container LuC tabm-content" style="display:none" id="lum">
                <!-- loop this div to get another food box wrapper -->
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Afternoon</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "lunch" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "lunch", "afternoon") ?>

                        <!-- add more button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'monday','lunch','afternoon')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- snack -->
            <div class="container SnC tabm-content" style="display:none" id="snm">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>High Tea and snack</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "snacks" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "snacks", "High Tea and Snacks") ?>

                        <!-- add more button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'monday','snacks','High Tea and Snacks')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- dinner -->
            <div class="container DiC tabm-content" style="display:none" id="dim">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Night</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "dinner" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "dinner", "night") ?>
                        <!-- add more -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'monday','dinner','night')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>

                <!--  -->

                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Light Night Food</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "breaka" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "dinner", "late_night") ?>
                        <!-- add more -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'monday','dinner','late_night')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="addANote__wrapper">
                <div class='leftDiv__wrapper' id="addNoteWrapper">
                    <span>
                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 0.5V20M19 10H0" stroke="black" stroke-width="2" />
                        </svg>
                    </span>
                    <button onclick="showNoteInput()">Add a note</button>

                </div>
                <div class="noteInput__wrapper" id="noteInputWrapper">
                    <label for="noteInput">Note:</label>
                    <input type="text" id="noteInput">
                </div>
                <button class='right__btn' name="savebutton">Save Plan</button>
            </div>
        </div>


        <div id="tuesday" class="tab-content" style="display:none">
            <?php $info = update($client_id, $dc_id, "tuesday"); ?>
            <div class="options__div " id='nav-tab' role='tablist'>
                <button class="options__btn Br tabt" tab="brt">Breakfast</button>
                <button class="options__btn Lu tabt" tab="lut">Lunch</button>
                <button class="options__btn Sn tabt" tab="snt">Snacks</button>
                <button class="options__btn Di tabt" tab="dit">Dinner</button>
            </div>
            <!-- breakfast -->
            <div class=" container BrC tabt-content" id="brt">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>In Morning</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <div class='foodCards__wrapper tab-pane fabe'>
                        <?php compute($info, "breakfast", "breakfast_morning") ?>
                        <!-- add more div or u can say button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'tuesday','breakfast','breakfast_morning') ">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>After break</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "breaka" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "breakfast", "breakfast_after") ?>
                        <!-- add more div or u can say button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'tuesday','breakfast','breakfast_after')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- lunch -->

            <div class=" container LuC tabt-content" id="lut">
                <!-- loop this div to get another food box wrapper -->
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Afternoon</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "lunch" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "lunch", "afternoon") ?>

                        <!-- add more button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'tuesday','lunch','afternoon')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- snack -->
            <div class="container SnC tabt-content" id="snt">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>High Tea and snack</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "snacks" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "snacks", "High Tea and Snacks") ?>

                        <!-- add more button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'tuesday','snacks','High Tea and Snacks')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- dinner -->

            <div class=" container DiC tabt-content" id="dit">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Night</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "dinner" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "dinner", "night") ?>
                        <!-- add more -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'tuesday','dinner','night')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>

                <!--  -->

                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Light Night Food</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "breaka" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "dinner", "late_night") ?>
                        <!-- add more -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'tuesday','dinner','late_night')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="addANote__wrapper">
                <div class='leftDiv__wrapper' id="addNoteWrapper2">
                    <span>
                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 0.5V20M19 10H0" stroke="black" stroke-width="2" />
                        </svg>
                    </span>
                    <button onclick="showNoteInput()">Add a note</button>

                </div>
                <div class="noteInput__wrapper" id="noteInputWrapper2">
                    <label for="noteInput">Note:</label>
                    <input type="text" id="noteInput">
                </div>
                <button class='right__btn' name="savebutton">Save Plan</button>
            </div>
        </div>

        <div id="wednesday" class="tab-content" style="display:none">
            <?php $info = update($client_id, $dc_id, "wednesday"); ?>
            <div class="options__div " id='nav-tab' role='tablist'>
                <button class="options__btn Br tabw" tab="brw">Breakfast</button>
                <button class="options__btn Lu tabw" tab="luw">Lunch</button>
                <button class="options__btn Sn tabw" tab="snw">Snacks</button>
                <button class="options__btn Di tabw" tab="diw">Dinner</button>
            </div>
            <!-- breakfast -->
            <div class=" container BrC tabw-content" id="brw">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>In Morning</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <div class='foodCards__wrapper tab-pane fabe'>
                        <?php compute($info, "breakfast", "breakfast_morning") ?>
                        <!-- add more div or u can say button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'wednesday','breakfast','breakfast_morning') ">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>After break</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "breaka" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "breakfast", "breakfast_after") ?>
                        <!-- add more div or u can say button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'wednesday','breakfast','breakfast_after')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- lunch -->

            <div class=" container LuC tabw-content" id="luw">
                <!-- loop this div to get another food box wrapper -->
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Afternoon</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "lunch" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "lunch", "afternoon") ?>

                        <!-- add more button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'wednesday','lunch','afternoon')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- snack -->
            <div class="container SnC tabw-content" id="snw">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>High Tea and snack</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "snacks" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "snacks", "High Tea and Snacks") ?>

                        <!-- add more button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'wednesday','snacks','High Tea and Snacks')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- dinner -->

            <div class=" container DiC tabw-content" id="diw">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Night</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "dinner" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "dinner", "night") ?>
                        <!-- add more -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'wednesday','dinner','night')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>

                <!--  -->

                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Light Night Food</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "breaka" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "dinner", "late_night") ?>
                        <!-- add more -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'wednesday','dinner','late_night')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="addANote__wrapper">
                <div class='leftDiv__wrapper' id="addNoteWrapper3">
                    <span>
                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 0.5V20M19 10H0" stroke="black" stroke-width="2" />
                        </svg>
                    </span>
                    <button onclick="showNoteInput()">Add a note</button>

                </div>
                <div class="noteInput__wrapper" id="noteInputWrapper3">
                    <label for="noteInput">Note:</label>
                    <input type="text" id="noteInput">
                </div>
                <button class='right__btn' name="savebutton">Save Plan</button>
            </div>
        </div>

        <div id="thursday" class="tab-content" style="display:none">
            <?php $info = update($client_id, $dc_id, "thursday"); ?>
            <div class="options__div " id='nav-tab' role='tablist'>
                <button class="options__btn Br tabth" tab="brth">Breakfast</button>
                <button class="options__btn Lu tabth" tab="luth">Lunch</button>
                <button class="options__btn Sn tabth" tab="snth">Snacks</button>
                <button class="options__btn Di tabth" tab="dith">Dinner</button>
            </div>
            <!-- breakfast -->
            <div class=" container BrC tabth-content" id="brth">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>In Morning</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <div class='foodCards__wrapper tab-pane fabe'>
                        <?php compute($info, "breakfast", "breakfast_morning") ?>
                        <!-- add more div or u can say button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'tuesday','breakfast','breakfast_morning') ">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>After break</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "breaka" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "breakfast", "breakfast_after") ?>
                        <!-- add more div or u can say button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'thursday','breakfast','breakfast_after')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- lunch -->

            <div class=" container LuC tabth-content" id="luth">
                <!-- loop this div to get another food box wrapper -->
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Afternoon</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "lunch" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "lunch", "afternoon") ?>

                        <!-- add more button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'thursday','lunch','afternoon')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- snack -->
            <div class="container SnC tabth-content" id="snth">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>High Tea and snack</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "snacks" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "snacks", "High Tea and Snacks") ?>

                        <!-- add more button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'tursday','snacks','High Tea and Snacks')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- dinner -->

            <div class=" container DiC tabth-content" id="dith">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Night</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "dinner" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "dinner", "night") ?>
                        <!-- add more -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'thursday','dinner','night')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>

                <!--  -->

                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Light Night Food</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "breaka" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "dinner", "late_night") ?>
                        <!-- add more -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'tuesday','dinner','late_night')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="addANote__wrapper">
                <div class='leftDiv__wrapper' id="addNoteWrapper4">
                    <span>
                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 0.5V20M19 10H0" stroke="black" stroke-width="2" />
                        </svg>
                    </span>
                    <button onclick="showNoteInput()">Add a note</button>

                </div>
                <div class="noteInput__wrapper" id="noteInputWrapper4">
                    <label for="noteInput">Note:</label>
                    <input type="text" id="noteInput">
                </div>
                <button class='right__btn' name="savebutton">Save Plan</button>
            </div>
        </div>

        <div id="friday" class="tab-content" style="display:none">
            <?php $info = update($client_id,  $dc_id, "friday"); ?>
            <div class="options__div " id='nav-tab' role='tablist'>
                <button class="options__btn Br tabf" tab="brf">Breakfast</button>
                <button class="options__btn Lu tabf" tab="luf">Lunch</button>
                <button class="options__btn Sn tabf" tab="snf">Snacks</button>
                <button class="options__btn Di tabf" tab="dif">Dinner</button>
            </div>
            <!-- breakfast -->
            <div class=" container BrC tabf-content" id="brf">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>In Morning</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <div class='foodCards__wrapper tab-pane fabe'>
                        <?php compute($info, "breakfast", "breakfast_morning") ?>
                        <!-- add more div or u can say button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'friday','breakfast','breakfast_morning') ">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>After break</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "breaka" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "breakfast", "breakfast_after") ?>
                        <!-- add more div or u can say button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'friday','breakfast','breakfast_after')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- lunch -->

            <div class=" container LuC tabf-content" id="luf">
                <!-- loop this div to get another food box wrapper -->
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Afternoon</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "lunch" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "lunch", "afternoon") ?>

                        <!-- add more button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'friday','lunch','afternoon')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- snack -->
            <div class="container SnC tabf-content" id="snf">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>High Tea and snack</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "snacks" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "snacks", "High Tea and Snacks") ?>

                        <!-- add more button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'friday','snacks','High Tea and Snacks')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- dinner -->

            <div class=" container DiC tabf-content" id="dif">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Night</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "dinner" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "dinner", "night") ?>
                        <!-- add more -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'friday','dinner','night')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>

                <!--  -->

                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Light Night Food</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "breaka" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "dinner", "late_night") ?>
                        <!-- add more -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'friday','dinner','late_night')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="addANote__wrapper">
                <div class='leftDiv__wrapper' id="addNoteWrapper5">
                    <span>
                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 0.5V20M19 10H0" stroke="black" stroke-width="2" />
                        </svg>
                    </span>
                    <button onclick="showNoteInput()">Add a note</button>

                </div>
                <div class="noteInput__wrapper" id="noteInputWrapper5">
                    <label for="noteInput">Note:</label>
                    <input type="text" id="noteInput">
                </div>
                <button class='right__btn' name="savebutton">Save Plan</button>
            </div>
        </div>

        <div id="saturday" class="tab-content" style="display:none">
            <?php $info = update($client_id, $dc_id,"tuesday"); ?>
            <div class="options__div " id='nav-tab' role='tablist'>
                <button class="options__btn Br tabsa" tab="brsa">Breakfast</button>
                <button class="options__btn Lu tabsa" tab="lusa">Lunch</button>
                <button class="options__btn Sn tabsa" tab="snsa">Snacks</button>
                <button class="options__btn Di tabsa" tab="disa">Dinner</button>
            </div>
            <!-- breakfast -->
            <div class=" container BrC tabsa-content" id="brsa">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>In Morning</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <div class='foodCards__wrapper tab-pane fabe'>
                        <?php compute($info, "breakfast", "breakfast_morning") ?>
                        <!-- add more div or u can say button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'saturday','breakfast','breakfast_morning') ">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>After break</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "breaka" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "breakfast", "breakfast_after") ?>
                        <!-- add more div or u can say button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'saturday','breakfast','breakfast_after')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- lunch -->

            <div class=" container LuC tabsa-content" id="lusa">
                <!-- loop this div to get another food box wrapper -->
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Afternoon</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "lunch" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "lunch", "afternoon") ?>

                        <!-- add more button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'saturday','lunch','afternoon')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- snack -->
            <div class="container SnC tabsa-content" id="snsa">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>High Tea and snack</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "snacks" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "snacks", "High Tea and Snacks") ?>

                        <!-- add more button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'saturday','snacks','High Tea and Snacks')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- dinner -->

            <div class=" container DiC tabsa-content" id="disa">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Night</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "dinner" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "dinner", "night") ?>
                        <!-- add more -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'saturday','dinner','night')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>

                <!--  -->

                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Light Night Food</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "breaka" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "dinner", "late_night") ?>
                        <!-- add more -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'saturday','dinner','late_night')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="addANote__wrapper">
                <div class='leftDiv__wrapper' id="addNoteWrapper6">
                    <span>
                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 0.5V20M19 10H0" stroke="black" stroke-width="2" />
                        </svg>
                    </span>
                    <button onclick="showNoteInput()">Add a note</button>

                </div>
                <div class="noteInput__wrapper" id="noteInputWrapper6">
                    <label for="noteInput">Note:</label>
                    <input type="text" id="noteInput">
                </div>
                <button class='right__btn' name="savebutton">Save Plan</button>
            </div>
        </div>

        <div id="sunday" class="tab-content" style="display:none">
            <?php $info = update($client_id, $dc_id,"sunday"); ?>
            <div class="options__div " id='nav-tab' role='tablist'>
                <button class="options__btn Br tabsu" tab="brsu">Breakfast</button>
                <button class="options__btn Lu tabsu" tab="lusu">Lunch</button>
                <button class="options__btn Sn tabsu" tab="snsu">Snacks</button>
                <button class="options__btn Di tabsu" tab="disu">Dinner</button>
            </div>
            <!-- breakfast -->
            <div class=" container BrC tabsu-content" id="brsu">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>In Morning</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <div class='foodCards__wrapper tab-pane fabe'>
                        <?php compute($info, "breakfast", "breakfast_morning") ?>
                        <!-- add more div or u can say button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'sunday','breakfast','breakfast_morning') ">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>After break</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "breaka" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "breakfast", "breakfast_after") ?>
                        <!-- add more div or u can say button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'sunday','breakfast','breakfast_after')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- lunch -->

            <div class=" container LuC tabsu-content" id="lusu">
                <!-- loop this div to get another food box wrapper -->
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Afternoon</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "lunch" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "lunch", "afternoon") ?>

                        <!-- add more button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'sunday','lunch','afternoon')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- snack -->
            <div class="container SnC tabsu-content" id="snsu">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>High Tea and snack</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "snacks" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "snacks", "High Tea and Snacks") ?>

                        <!-- add more button -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'sunday','snacks','High Tea and Snacks')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- dinner -->

            <div class=" container DiC tabsu-content" id="disu">
                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Night</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "dinner" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "dinner", "night") ?>
                        <!-- add more -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'sunday','dinner','night')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>

                <!--  -->

                <div class="foodCard__div">
                    <div class="foodCart__topDiv">
                        <h1 class='topDiv__heading'>Light Night Food</h1>
                        <div class="calDiv">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg
                      " alt="foodImg">
                            <h3 class='cal__h3'>200 Kcal </h3>
                        </div>
                    </div>
                    <?php $type = "breaka" ?>
                    <div class='foodCards__wrapper'>
                        <?php compute($info, "dinner", "late_night") ?>
                        <!-- add more -->
                        <div onclick="redirectTo('<?php echo $client_id ?>',<?=$dc_id?>,'sunday','dinner','late_night')">
                            <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="addANote__wrapper">
                <div class='leftDiv__wrapper' id="addNoteWrapper7">
                    <span>
                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 0.5V20M19 10H0" stroke="black" stroke-width="2" />
                        </svg>
                    </span>
                    <button onclick="showNoteInput()">Add a note</button>

                </div>
                <div class="noteInput__wrapper" id="noteInputWrapper7">
                    <label for="noteInput">Note:</label>
                    <input type="text" id="noteInput">
                </div>
                <button class='right__btn' name="savebutton">Save Plan</button>
            </div>
        </div>
    </div>


    <!-- scripts here... -->
    <script>
        function showNoteInput() {
            // Hide the "Add a note" button and show the note input
            document.getElementById('addNoteWrapper').style.display = 'none';
            document.getElementById('noteInputWrapper').style.display = 'block';

            document.getElementById('addNoteWrapper2').style.display = 'none';
            document.getElementById('noteInputWrapper2').style.display = 'block';

            document.getElementById('addNoteWrapper3').style.display = 'none';
            document.getElementById('noteInputWrapper3').style.display = 'block';

            document.getElementById('addNoteWrapper4').style.display = 'none';
            document.getElementById('noteInputWrapper4').style.display = 'block';

            document.getElementById('addNoteWrapper5').style.display = 'none';
            document.getElementById('noteInputWrapper5').style.display = 'block';

            document.getElementById('addNoteWrapper6').style.display = 'none';
            document.getElementById('noteInputWrapper6').style.display = 'block';

            document.getElementById('addNoteWrapper7').style.display = 'none';
            document.getElementById('noteInputWrapper7').style.display = 'block';
        }

        $(document).ready(function() {

            var lastClickedDayButton = null;

            // Handle day button clicks
            $(".week__name").click(function() {
                $(".week__name").removeClass("active-day");
                $(this).addClass("active-day");

                lastClickedDayButton = $(this);

                $(".options__btn").removeClass("active-option");
            });

            // Handle options button clicks
            $(".options__btn").click(function() {

                $(".options__btn").removeClass("active-option");
                $(this).addClass("active-option");

                if (lastClickedDayButton) {
                    // Add focus to the last clicked day button
                    lastClickedDayButton.addClass("active-day");
                }
            });
        });


        function getQueryParams() {
            const urlSearchParams = new URLSearchParams(window.location.search);
            const params = Object.fromEntries(urlSearchParams.entries());
            return {
                day: params.day,
                course: params.course,
            };
        }

        function updateTo(day, course) {
            const queryParams = getQueryParams();
            if (queryParams.day !== day || queryParams.course !== course) {
                queryParams.day = day;
                queryParams.course = course;
                const queryString = new URLSearchParams(queryParams).toString();
                const url = `create_dietchart.php?&client_id=<?= $client_id ?>&dietchart_id=<?=$dc_id?>&${queryString}`;

                fetch('choose_recipe.php')
                    .then(response => response.text())
                    .then(html => {
                        window.history.pushState({
                            day,
                            course
                        }, null, url);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }

        function redirectTo(client_id, dietchart_id, day, course, subcourse) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'choose_recipe.php';

            const idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = 'id';
            idInput.value = client_id;

            const dayInput = document.createElement('input');
            dayInput.type = 'hidden';
            dayInput.name = 'day';
            dayInput.value = day;

            const courseInput = document.createElement('input');
            courseInput.type = 'hidden';
            courseInput.name = 'course';
            courseInput.value = course;

            const subcourseInput = document.createElement('input');
            subcourseInput.type = 'hidden';
            subcourseInput.name = 'subcourse';
            subcourseInput.value = subcourse;

            const id_dietchart = document.createElement('input');
            id_dietchart.type = 'hidden';
            id_dietchart.name = 'dietchart_id';
            id_dietchart.value = dietchart_id;

            form.appendChild(idInput);
            form.appendChild(courseInput);
            form.appendChild(subcourseInput);
            form.appendChild(dayInput);
            form.appendChild(id_dietchart);

            document.body.appendChild(form);
            form.submit();

        }

        function getDayNumber(day) {
            switch (day) {
                case 'monday':
                    return "brm";
                case 'tuesday':
                    return "brt";
                case 'wednesday':
                    return "brw";
                case 'thursday':
                    return "brth";
                case 'friday':
                    return "brf";
                case 'saturday':
                    return "brsa";
                case 'sunday':
                    return "brsu";
                default:
                    return -1;
            }
        }

        function getDayNumber1(day) {
            switch (day) {
                case 'monday':
                    return "tabm";
                case 'tuesday':
                    return "tabt";
                case 'wednesday':
                    return "tabw";
                case 'thursday':
                    return "tabth";
                case 'friday':
                    return "tabf";
                case 'saturday':
                    return "tabsa";
                case 'sunday':
                    return "tabsu";
                default:
                    return -1; // return -1 for invalid input
            }
        }

        function getDayNumber2(day) {
            switch (day) {
                case 'monday':
                    return 0;
                case 'tuesday':
                    return 1;
                case 'wednesday':
                    return 2;
                case 'thursday':
                    return 3;
                case 'friday':
                    return 4;
                case 'saturday':
                    return 5;
                case 'sunday':
                    return 6;
                default:
                    return -1;
            }
        }

        function getDayNumber3(course) {
            switch (course.charAt(0)) {
                case 'b':
                    return 0;
                case 'l':
                    return 1;
                case 'd':
                    return 2;
                case 's':
                    return 3;
                default:
                    return -1;
            }
        }
        const tab = document.querySelectorAll('.tab');
        tab.forEach(el => {
            el.addEventListener('click', function() {
                const id = el.getAttribute('tab');
                updateTo(id, getDayNumber(id));
                document.querySelectorAll('.tab-content').forEach(element => {
                    element.style.display = 'none';
                });
                document.querySelectorAll('.BrC').forEach(element => {
                    element.style.display = 'none';
                });
                document.querySelectorAll('.SnC').forEach(element => {
                    element.style.display = 'none';
                });
                document.querySelectorAll('.LuC').forEach(element => {
                    element.style.display = 'none';
                });
                document.querySelectorAll('.DiC').forEach(element => {
                    element.style.display = 'none';
                });
                document.getElementById(id).style.display = 'flex';
                document.getElementById(id).style.flexDirection = "column";
                document.getElementById(getDayNumber(id)).style.display = 'block';
            });
        });
        const queryParams = getQueryParams();
        console.log(getDayNumber2(queryParams.day));
        tab[getDayNumber2(queryParams.day)].click();

        const tabm = document.querySelectorAll('.tabm');
        tabm.forEach(el => {
            el.addEventListener('click', function() {
                const id = el.getAttribute('tab');
                console.log(id);
                updateTo('monday', id);
                document.querySelectorAll('.tabm-content').forEach(element => {
                    element.style.display = 'none';
                });
                document.getElementById(id).style.display = 'flex';
                document.getElementById(id).style.flexDirection = "column";
            });
        });

        const tabt = document.querySelectorAll('.tabt');
        tabt.forEach(el => {
            el.addEventListener('click', function() {
                const id = el.getAttribute('tab');
                updateTo('tuesday', id);
                document.querySelectorAll('.tabt-content').forEach(element => {
                    element.style.display = 'none';
                });
                document.getElementById(id).style.display = 'flex';
                document.getElementById(id).style.flexDirection = "column";
            });
        });

        const tabw = document.querySelectorAll('.tabw');
        tabw.forEach(el => {
            el.addEventListener('click', function() {
                const id = el.getAttribute('tab');
                updateTo('wednesday', id);
                document.querySelectorAll('.tabw-content').forEach(element => {
                    element.style.display = 'none';
                });
                document.getElementById(id).style.display = 'flex';
                document.getElementById(id).style.flexDirection = "column";
            });
        });

        const tabth = document.querySelectorAll('.tabth');
        tabth.forEach(el => {
            el.addEventListener('click', function() {
                const id = el.getAttribute('tab');
                updateTo('thursday', id);
                document.querySelectorAll('.tabth-content').forEach(element => {
                    element.style.display = 'none';
                });
                document.getElementById(id).style.display = 'flex';
                document.getElementById(id).style.flexDirection = "column";
            });
        });

        const tabf = document.querySelectorAll('.tabf');
        tabf.forEach(el => {
            el.addEventListener('click', function() {
                const id = el.getAttribute('tab');
                updateTo('friday', id);
                document.querySelectorAll('.tabf-content').forEach(element => {
                    element.style.display = 'none';
                });
                document.getElementById(id).style.display = 'flex';
                document.getElementById(id).style.flexDirection = "column";
            });
        });

        const tabsa = document.querySelectorAll('.tabsa');
        tabsa.forEach(el => {
            el.addEventListener('click', function() {
                const id = el.getAttribute('tab');
                updateTo('saturday', id);
                document.querySelectorAll('.tabsa-content').forEach(element => {
                    element.style.display = 'none';
                });
                document.getElementById(id).style.display = 'flex';
                document.getElementById(id).style.flexDirection = "column";
            });
        });

        const tabsu = document.querySelectorAll('.tabsu');
        tabsu.forEach(el => {
            el.addEventListener('click', function() {
                const id = el.getAttribute('tab');
                updateTo('sunday', id);
                document.querySelectorAll('.tabsu-content').forEach(element => {
                    element.style.display = 'none';
                });
                document.getElementById(id).style.display = 'flex';
                document.getElementById(id).style.flexDirection = "column";
            });
        });
        console.log(getDayNumber3(queryParams.course));
        document.querySelectorAll(getDayNumber1(queryParams.day))[getDayNumber3(queryParams.course)].click();
    </script>
    <script>
        let titleinput = document.getElementById("dietcharttitlevalue");
        const update_title=(event)=>{
            console.log(event)
            let title = event.innerHTML;
            if (title !== titleinput.value){
                titleinput.value = title;
            }
        }
        const submit_dietchart=()=>{
            update_title(document.getElementById('dietcharttitle'));
            let titleinput = document.getElementById("dietcharttitlevalue");
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'create_dietchart.php?client_id=<?=$client_id ?>&dietchart_id=<?=$dc_id?>';

            const idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = 'dietchart';
            idInput.value = titleinput.value;

            form.appendChild(idInput);

            document.body.appendChild(form);
            form.submit();

        }
        
        let button = document.getElementsByClassName("right__btn");
        Array.from(button).forEach(element => {
            element.addEventListener("click",submit_dietchart);
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <?php require('constant/scripts.php'); ?>
</body>


</html>