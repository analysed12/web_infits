<?php include('navbar.php');
require('constant/config.php');
if (isset($_GET['client_id']) && is_numeric($_GET['client_id'])) {
    $clientId = $_GET['client_id'];
}
$client_id = $_GET['client_id'];
$dietitian_id = $_SESSION['dietitian_id'];
$dietitianuserid = $_SESSION['dietitianuserID'];
$name = "ronal richard";
$q = "SELECT name FROM addclient WHERE dietitianuserID = '$dietitianuserid' AND client_id = '$clientId';";
$result1 = $conn->query($q);
if (mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_assoc($result1)) {
        $name = $row['name'];
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
    <title>Infits</title>
    <?php require('constant/head.php'); ?>

</head>
<style>
    body {
        font-family: "NATS" !important;
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

    .newDietChart_heading_div {
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
        background: #FFFFFF;
        border: 1px solid #9C74F5;
        border-radius: 10px;
        color: #9C74F5;
        padding: 7px 20px;
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

    .options__btn:focus {
        background-color: #9c74f5;
        color: #fff;
    }

    .options__btn:active {
        background-color: #9c74f5;
        color: #fff;
    }

    .options__btn:hover {
        background-color: #9c74f5;
        color: #fff;
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
        quotes;
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

    /* addANote__wrapper */

    .addANote__wrapper {
        width: 80%;
        margin: 15px auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /*
.leftDiv__wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    background: #ffffff;
    padding: 8px 15px;
    box-shadow: 0px 7.04415px 21.1324px rgba(176, 190, 197, 0.32),
        0px 2.64156px 4.40259px rgba(176, 190, 197, 0.32);
    border-radius: 8.80519px;
    cursor: pointer;
}
*/

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

        .heathyDiet__btn:hover {
            color: black;
            /* Font color on hover */
            border-color: none;
            /* Remove the border on hover */
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

    .input-with-icon {
        margin-left: 10px;
        padding-left: 1000px;
        /* Adjust the padding to make space for the icon */
        background: url('data:image/svg+xml;utf8,<svg width="19" height="20" xmlns="http://www.w3.org/2000/svg"><path d="M9.5 0.5V20M19 10H0" stroke="black" stroke-width="2" /></svg>') no-repeat left center;
        background-size: 20px 20px;
        /* Adjust the size as needed */
        background-position: 25px
    }

    .week__name.active {
        background-color: #9c74f5;
        /* Set the background color for the active button */
        color: white;
        /* Set the text color for the active button */
    }

    ::placeholder {
        color: black;
    }

    .subject {
        border: none;
        /* Remove the input border */
        background: transparent;
        /* Remove the input background */
        font-size: 33px;
        /* Set the desired font size */
        font-style: Regular;
        outline: none;
        /* Remove the focus outline */
    }

    /* Style the placeholder text in bold */
    .subject::placeholder {
        font-weight: normal;
    }
</style>

<body>
    <?php
    /* 
    function fetchData($client_id)
    {
        $sql = "SELECT dietitian_id, monday, tuesday, wednesday, thursday, friday, saturday, sunday , dietchart_name FROM diet_chart WHERE client_id = $client_id;";
        global $conn;
        $result = $conn->query($sql);
        return ($result);
    }


    function fetchInformation($result, $day)
    {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Decode the JSON data for each day
                // print_r($row);
                $daydata = json_decode($row[$day], true);
                return $daydata;
            }
        }
    }

    print_r($_POST['selectedRecipeIds']);

    function compute($selectedRecipeIds, $time, $subtime)
    {
        global $conn;
        if (!empty($selectedRecipeIds)) {
            foreach ($selectedRecipeIds as $selectedRecipe) {
                $recipeId = $selectedRecipe['recipeId'];
                $isDefault = $selectedRecipe['isDefault'];

                if ($isDefault == 'true') {
                    $sqld = "SELECT dr.* FROM `default_recipes` dr LEFT JOIN `updated_by_users` ubu ON dr.`drecipe_id` = ubu.`updated_drecipe_id` AND ubu.`dietitian_id`='{$_SESSION['dietitian_id']}' WHERE ubu.`updated_drecipe_id` IS NULL AND ubu.`dietitian_id` IS NULL AND drecipe_id = '{$recipeId}'";
                } else {
                    $sqld = "SELECT * FROM dietitian_recipes WHERE recipe_id = {$recipeId}";
                }
                $resultd = mysqli_query($conn, $sqld);
                if (mysqli_num_rows($resultd) > 0) {
                    while ($row = mysqli_fetch_assoc($resultd)) {
                        $recipe_name = "";
                        if ($isDefault == 'true') {
                            $recipe_name = $row['drecipe_name'];
                        } else {
                            $recipe_name = $row['recipe_name'];
                        } */
    ?>
    <!--   <div class="d-flex justify-content-center flex-column justify-content-center text-center me-4">
                            <img src="assets/images/Alooparantha1.svg">

                            <div class="fw-bold mt-3">
                                <?= $recipe_name ?>
                            </div>
                        </div> -->
    <?php
    /*                     }
                }
            }
        }
    }
    function update($client_id, $day)
    {
        $result = fetchData($client_id);
        $info = fetchInformation($result, $day);
        return $info;
    }
 */
    ?>

    <div class="main__container">
        <div class="default-content">
            <div class="heading__div">
                <div class="heading__leftDiv">
                    <div class="newDietChart_heading_div">
                        <input class="subject" type="text" id="newDietChartName" placeholder="New Diet Chart" required>
                        <img src="<?= $DEFAULT_PATH ?>assets/images/Edit.svg" style="margin-left: -140px;">
                    </div>
                    <div style="font-size: 33px;">
                        <?php echo $name; ?>
                    </div>
                </div>
                <div class="heading__rightDiv">
                    <button id="saveDietChartButton" class="right__btn" style="text-decoration: none;" onclick="connectPlan()">
                        <h3><span id="selectedPlanName">Connect a Plan</span>
                            <input type="hidden" id="selectedPlanId" />
                        </h3>
                    </button>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/error.svg" style="margin-left: 10px;">
                    <h3><span id="selectedPlanName"></span></h3>
                </div>
            </div>
            <script>
                /*  function connectPlan() {
                    // Get the client_id
                    var client_id = '<?php echo $client_id; ?>';
                    window.location.href = 'dietchart4.php?client_id=' + client_id;
                } */
            </script>

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
            <div id="monday" class="tab-content" data-day="monday" style="display: block;">
                <?php //$info = $selectedRecipeIds = isset($_POST['selectedRecipeIds']) ? $_POST['selectedRecipeIds'] : [];
                ?>

                <!-- Breakfast -->
                <div class="container BrC tabm-content" id="brm">
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Breakfast</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="breakfast">

                            <!-- add more div -->
                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                            </div>
                        </div>
                    </div>

                    <!-- Lunch -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Lunch</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="lunch">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                            </div>
                        </div>
                    </div>

                    <!-- Snack -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Snack</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="snacks">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                            </div>
                        </div>
                    </div>

                    <!-- Dinner -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Dinner</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="dinner">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add a Note and Save Plan -->
                <div class="addANote__wrapper">
                    <div class='leftDiv__wrapper'>
                        <input type="text" placeholder="Add a note" class="input-with-icon" style="font-family: 'NATS; color: black; 
                    font-style: normal; font-weight: 400; font-size: 25px; padding: 10px 60px; 
                    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25); border-radius: 10px; border: none;">
                    </div>
                    <button id="saveDietChartButton" class="right__btn" style="text-decoration: none;" onclick="saveDietChartName()">Save Plan</button>
                </div>
            </div>

            <!-- Tuesday content -->
            <div id="tuesday" class="tab-content" data-day="tuesday" data-day="tuesday" style="display: none;">
                <!-- Breakfast -->
                <div class="container BrC tabm-content" id="brt">
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Breakfast</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="breakfast">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                            </div>
                        </div>
                    </div>

                    <!-- Lunch -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Lunch</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="lunch">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                            </div>
                        </div>
                    </div>

                    <!-- Snack -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Snack</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="snacks">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                            </div>
                        </div>
                    </div>

                    <!-- Dinner -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Dinner</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="dinner">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add a Note and Save Plan -->
                <div class="addANote__wrapper">
                    <div class='leftDiv__wrapper'>
                        <input type="text" placeholder="Add a note" class="input-with-icon" style="font-family: 'NATS; color: black; 
                    font-style: normal; font-weight: 400; font-size: 25px; padding: 10px 60px; 
                    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25); border-radius: 10px; border: none;">
                    </div>
                    <button id="saveDietChartButton" class="right__btn" style="text-decoration: none;" onclick="saveDietChartName()">Save Plan</button>
                </div>
            </div>

            <!-- Wednesday content -->
            <div id="wednesday" class="tab-content" data-day="wednesday" style="display: none;">
                <!-- Breakfast -->
                <div class="container BrC tabm-content" id="brw">
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Breakfast</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="breakfast">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                            </div>
                        </div>
                    </div>

                    <!-- Lunch -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Lunch</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="lunch">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                            </div>
                        </div>
                    </div>

                    <!-- Snack -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Snack</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="snacks">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                            </div>
                        </div>
                    </div>

                    <!-- Dinner -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Dinner</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="dinner">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add a Note and Save Plan -->
                <div class="addANote__wrapper">
                    <div class='leftDiv__wrapper'>
                        <input type="text" placeholder="Add a note" class="input-with-icon" style="font-family: 'NATS; color: black; 
                    font-style: normal; font-weight: 400; font-size: 25px; padding: 10px 60px; 
                    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25); border-radius: 10px; border: none;">
                    </div>
                    <button id="saveDietChartButton" class="right__btn" style="text-decoration: none;" onclick="saveDietChartName()">Save Plan</button>
                </div>
            </div>

            <!-- Thursday content -->
            <div id="thursday" class="tab-content" data-day="thursday" style="display: none;">
                <!-- Breakfast -->
                <div class="container BrC tabm-content" id="brth">
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Breakfast</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="breakfast">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                            </div>
                        </div>
                    </div>

                    <!-- Lunch -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Lunch</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="lunch">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                            </div>
                        </div>
                    </div>

                    <!-- Snack -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Snack</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="snacks">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                            </div>
                        </div>
                    </div>

                    <!-- Dinner -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Dinner</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="dinner">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add a Note and Save Plan -->
                <div class="addANote__wrapper">
                    <div class='leftDiv__wrapper'>
                        <input type="text" placeholder="Add a note" class="input-with-icon" style="font-family: 'NATS; color: black; 
                    font-style: normal; font-weight: 400; font-size: 25px; padding: 10px 60px; 
                    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25); border-radius: 10px; border: none;">
                    </div>
                    <button id="saveDietChartButton" class="right__btn" style="text-decoration: none;" onclick="saveDietChartName()">Save Plan</button>
                </div>
            </div>

            <!-- Friday content -->
            <div id="friday" class="tab-content" data-day="friday" style="display: none;">
                <!-- Breakfast -->
                <div class="container BrC tabm-content" id="brf">
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Breakfast</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="breakfast">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                            </div>
                        </div>
                    </div>

                    <!-- Lunch -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Lunch</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="lunch">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                            </div>
                        </div>
                    </div>

                    <!-- Snack -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Snack</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="snacks">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                            </div>
                        </div>
                    </div>

                    <!-- Dinner -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Dinner</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="dinner">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add a Note and Save Plan -->
                <div class="addANote__wrapper">
                    <div class='leftDiv__wrapper'>
                        <input type="text" placeholder="Add a note" class="input-with-icon" style="font-family: 'NATS; color: black; 
                    font-style: normal; font-weight: 400; font-size: 25px; padding: 10px 60px; 
                    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25); border-radius: 10px; border: none;">
                    </div>
                    <button id="saveDietChartButton" class="right__btn" style="text-decoration: none;" onclick="saveDietChartName()">Save Plan</button>
                </div>
            </div>

            <!-- Saturday content -->
            <div id="saturday" class="tab-content" data-day="saturday" style="display: none;">
                <!-- Breakfast -->
                <div class="container BrC tabm-content" id="brs">
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Breakfast</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="breakfast">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                            </div>
                        </div>
                    </div>

                    <!-- Lunch -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Lunch</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="lunch">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                            </div>
                        </div>
                    </div>

                    <!-- Snack -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Snack</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="snacks">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                            </div>
                        </div>
                    </div>

                    <!-- Dinner -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Dinner</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="dinner">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add a Note and Save Plan -->
                <div class="addANote__wrapper">
                    <div class='leftDiv__wrapper'>
                        <input type="text" placeholder="Add a note" class="input-with-icon" style="font-family: 'NATS; color: black; 
                    font-style: normal; font-weight: 400; font-size: 25px; padding: 10px 60px; 
                    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25); border-radius: 10px; border: none;">
                    </div>
                    <button id="saveDietChartButton" class="right__btn" style="text-decoration: none;" onclick="saveDietChartName()">Save Plan</button>
                </div>
            </div>
            <!-- Sunday content -->
            <div id="sunday" class="tab-content" data-day="sunday" style="display: none;">
                <!-- Breakfast -->
                <div class="container BrC tabm-content" id="brsu">
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Breakfast</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="breakfast">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                            </div>
                        </div>
                    </div>

                    <!-- Lunch -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Lunch</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="lunch">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                            </div>
                        </div>
                    </div>

                    <!-- Snack -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Snack</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="snacks">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                            </div>
                        </div>
                    </div>

                    <!-- Dinner -->
                    <div class="foodCard__div">
                        <div class="foodCart__topDiv">
                            <h1 class='topDiv__heading'>Dinner</h1>
                            <div class="calDiv">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="foodImg">
                                <h3 class='cal__h3'>200 Kcal</h3>
                            </div>
                        </div>
                        <div class='foodCards__wrapper tab-pane fabe' data-meal="dinner">

                            <div class="clickable-div">
                                <img src="<?= $DEFAULT_PATH ?>assets/images/dietchart3Add.svg
                      " alt="foodImg">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add a Note and Save Plan -->
                <div class="addANote__wrapper">
                    <div class='leftDiv__wrapper'>
                        <input type="text" placeholder="Add a note" class="input-with-icon" style="font-family: 'NATS; color: black; 
                    font-style: normal; font-weight: 400; font-size: 25px; padding: 10px 60px; 
                    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25); border-radius:10px; border: none;">
                    </div>
                    <button id="saveDietChartButton" class="right__btn" style="text-decoration: none;" onclick="saveDietChartName()">Save Plan</button>
                </div>
            </div>
        </div>
        <!-- Fetched content will be loaded here -->
        <div class="fetched-content" style="display: none;"></div>
    </div>
    <script>
        function connectPlan() {
            // Use jQuery AJAX to load the content from your PHP page
            $.ajax({
                url: 'dietchart4.php',
                type: 'GET',
                success: function(response) {
                    // Hide default content
                    $(".default-content").hide();

                    // Show fetched content
                    $(".fetched-content").html(response).show();
                },
                error: function(xhr, status, error) {
                    console.error('Error connecting the plan:', error);
                    // Handle error if needed
                }
            });
        }
    </script>

    <script>
        var tabs = document.querySelectorAll('.tab');
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                var tabName = tab.getAttribute('tab');
                var tabContents = document.querySelectorAll('.tab-content');
                tabContents.forEach(tc => {
                    if (tc.id === tabName) {
                        tc.style.display = 'block';
                    } else {
                        tc.style.display = 'none';
                    }
                });
            });
        });
    </script>
    <script>
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
                const url = `dietchart3.php?client_id=<?= $client_id ?>&${queryString}`;
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
        /* 
                function redirectTo(client_id, day, course, subcourse) {
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

                    form.appendChild(idInput);
                    form.appendChild(courseInput);
                    form.appendChild(subcourseInput);
                    form.appendChild(dayInput);

                    document.body.appendChild(form);
                    form.submit();

                } */
        function getRecipesHtml(day, course) {
            $.ajax({
                url: 'choose_recipe.php',
                type: 'POST',
                data: {
                    day: day,
                    course: course,
                },
                success: function(response) {
                    // Assuming you have a container with the class 'fetched-content'
                    var fetchedContent = $('.fetched-content');

                    // Remove previous content
                    fetchedContent.empty();

                    // Append the new content
                    $(".default-content").hide();
                    fetchedContent.html(response).show();

                },
                error: function(xhr, status, error) {
                    console.error('Error redirecting:', error);
                    // Handle error if needed
                }
            });
        }
        $(document).ready(function() {
            $('.clickable-div').on('click', function() {
                alert();
                var day = $(this).closest('.tab-content').data('day');
                var meal = $(this).closest('.foodCards__wrapper').data('meal');
                getRecipesHtml(day, meal);
            });
        });

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
                    return "brs";
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
    <!--save dietchart name-->
    <script>
        function saveDietChartName() {
            var newDietChartName = $("#newDietChartName").val();
            var planId = $('#selectedPlanId').val();
            var dietData = getDietData(); // Assuming you have a function to get the diet data

            // Create an object to hold the data
            var requestData = {
                client_id: "<?php echo $clientId; ?>",
                plan_id:planId,
                subject: newDietChartName,
                diet_data: dietData
            };

            // Use jQuery AJAX to send the data
            $.ajax({
                type: "POST",
                url: "save_dietchart_name.php",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: JSON.stringify(requestData),
                success: function(response) {
                    // Handle the success response here
                    alert("Diet chart name and data saved successfully!");
                },
                error: function(xhr, status, error) {
                    // Handle the error response here
                    alert("Error saving diet chart name and data!");
                    console.error(xhr.responseText);
                }
            });
        }

        // Example function to get the diet data (modify this based on your actual implementation)
        function getDietData() {
            const dietData = [];

            // Iterate over each day
            $('.tab-content').each(function() {
                const day = $(this).data('day');
                const dayData = {
                    day: day,
                    meals: []
                };

                // Flag to check if any meals are present for the day
                let isDayEmpty = true;

                // Iterate over each meal within the day
                $(this).find('.foodCards__wrapper').each(function() {
                    const course = $(this).data('meal');
                    const mealData = {
                        course: course,
                        recipes: []
                    };

                    // Flag to check if any recipes are present for the meal
                    let isMealEmpty = true;

                    // Iterate over each recipe in the meal
                    $(this).find('.d-flex[data-recipe-id]').each(function() {
                        const recipeId = $(this).data('recipe-id');
                        const isDefault = $(this).data('is-default');

                        const recipeObj = {
                            recipeId: recipeId,
                            isDefault: isDefault
                        };

                        mealData.recipes.push(recipeObj);

                        // If at least one recipe is found, set isMealEmpty to false
                        isMealEmpty = false;
                    });

                    // If recipes are present for the meal, push the meal data
                    if (!isMealEmpty) {
                        dayData.meals.push(mealData);
                        // Set isDayEmpty to false as there's at least one meal with recipes
                        isDayEmpty = false;
                    }
                });

                // If meals are present for the day, push the day data
                if (!isDayEmpty) {
                    dietData.push(dayData);
                }
            });

            // Now, dietData only includes days that have at least one meal with recipes
            // and each day only includes meals that have at least one recipe
            console.log(dietData);
            return dietData;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>

    <?php require('constant/scripts.php'); ?>
    <script>
        /*  $(document).ready(function() {
            // Get the query parameter for the selected plan name
            const params = new URLSearchParams(window.location.search);
            const selectedPlanName = params.get("plan_name");
            const selectedPlanId = params.get("plan_id");

            // Check if a plan name was passed
            if (selectedPlanId && selectedPlanName) {
                // Update the HTML element with the selected plan name
                const planIdElement = $("#selectedPlanId");
                const planNameElement = $("#selectedPlanName");

                if (planNameElement.length && planIdElement.length) {
                    planIdElement.val(selectedPlanId);
                    planNameElement.text(selectedPlanName);
                }
            }
        }); */
    </script>

</body>

</html>
