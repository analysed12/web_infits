<?php
include('navbar.php');
require('constant/config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('constant/head.php'); ?>
    <title>Infits | All Recipes</title>
    <style>
        body {
            font-family: "NATS", sans-serif !important;
            letter-spacing: 1px;
            font-weight: 400;
            /* background-color: #2b0e0e; */
            color: black;
            position: relative;
        }

        .tabcontent {
            padding: 6px 30px;
            border: none;
            border-top: none;
        }

        .searchbox {
            width: auto;
            width: 360px;
            height: 50px;
            background: #ffffff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            padding: 10px;
            margin-top: 22px;
            position: relative;
        }

        .header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            letter-spacing: 0em;
        }

        #myDIV {
            margin-right: 0px;
        }

        #myDIV1 {
            margin: 0px;
        }

        #topnav-content-1 {
            font-size: 20px;
            font-weight: bold;
            margin-top: 6px;
            letter-spacing: 0.05em;
            margin-bottom: 5px;
        }

        #topnav-content-2 {
            letter-spacing: 1px;
            font-weight: 500;
            font-size: 15px;
            margin-top: 12px;
            margin-bottom: 6px;
        }

        .card {
            background: #FFFFFF;
            border-radius: 17.8334px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
            bottom: 20px;
            padding: 15px;
            width: 350px;
            height: 250px;
            border-radius: 16px;
            margin-left: 10px;
            margin-right: -5px;
        }

        .card-upper-text {
            font-size: 15px;
            padding: 5px 10px;
            background-color: #FEA945;
            box-shadow: 0px 0px 25px rgba(255, 255, 255, 0.75);
            border-radius: 8px;
            color: white;
            line-height: 18px;
        }

        .card-food {
            font-size: 23px;
            font-weight: 400;
            line-height: 22px;
            letter-spacing: -0.11428570002317429px;
            text-align: left;
            width: 400px;
            margin-bottom: 5px;
            cursor: pointer;
            font-family: "NATS";
            margin-top: 10px;
        }

        .ellipsis {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            max-height: 1em;
            white-space: normal;
            text-overflow: ellipsis;
            font-size: 25px;
            cursor: pointer;
        }

        .card-calorie {
            font-size: 18px;
            font-weight: normal;
            line-height: 12px;
            letter-spacing: 0em;
            text-align: left;
            align-items: center;
            margin-top: 5px;
            display: flex;
            color: #A3A1A1;
        }

        .card-num-circle {
            background: #9C74F5;
            border-radius: 50%;
            color: white;
            padding: 5px;
            height: 25px;
            width: 25px;
            margin-top: -7px;
        }

        .card-num {
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 18px;
            color: #9C74F5;
            text-align: center;
            margin-bottom: -2px;
        }

        .scroll-container {
            overflow-x: auto;
            scrollbar-width: thin;
            scrollbar-color: #7282FB;
        }

        .scroll-container::-webkit-scrollbar {
            width: 8px;
            /* it is for width and height of the scrollbar */
            height: 8px;
        }

        .scroll-container::-webkit-scrollbar-track {
            background-color: #e8ecf5;
            /* it added the background-color */
        }

        .scroll-container::-webkit-scrollbar-thumb {
            background-color: #7272fb;
            /* it added the color of scrollbar  */
            border-radius: 10px;
        }

        .container1 {
            display: flex;
            gap: 30px;
            margin-top: 32px;
            margin-left: 10px;
            margin-bottom: 20px;
            padding: 4px;
            width: max-content;
            height: max-content;
            overflow-x: auto;
        }

        .card-food .card-food-name:hover {
            width: 200px;
            height: 200px;
            background-color: black;
        }

        .dropdown {
            position: absolute !important;
            display: inline-block;
            right: 0.4em;
            margin-top: 0px !important;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            margin-top: 0px;
            background-color: #f9f9f9;
            min-width: 160px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 14px;
            font-weight: 500;
            text-decoration: none;
            display: block;
        }

        .dropdown-content .edit-button {
            background: #A85CF1;
            text-align: center;
            border-radius: 7px;
            margin-bottom: 10px;
        }

        .dropdown-content .delete-button {
            background: #FF3D3D;
            border-radius: 7px;
            text-align: center;
        }

        .show {
            display: block !important;
        }

        .dropdown-card {
            background: #FFFFFF;
            border: 0.723941px solid #E4E4E4;
            box-shadow: 0px 2.17182px 2.89576px rgba(0, 0, 0, 0.09);
            border-radius: 13.0309px;
            padding: 20px;
        }

        .filter-outline {
            box-sizing: border-box;
            border: 1.5px solid #B85AEC;
            border-radius: 15px;
        }

        .filter-line {
            border: none;
            border-left: 1.5px solid #B85AEC;
        }

        .white {
            color: #FFFFFF;
        }

        .lwhite {
            color: rgba(255, 255, 255, 0.9);
        }

        .container1::-webkit-scrollbar {
            display: none;
        }

        .container1 .top-card {
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
            width: 313.47px;
            height: 213px;
            justify-content: center;
            align-items: center;
            margin-left: 35px;
            border-radius: 16px;
        }

        .container1 .top-card .imag {
            position: absolute;
        }

        .container1 .top-card .im1 {
            width: 150px;
            height: 200px;
            top: -8px;
            right: 0px;
            z-index: 1;
        }

        .container1 .top-card .im2 {
            width: 170.01px;
            height: 52px;
            transform: rotate(45deg);
            bottom: -5px;
            left: -30px;
            transform: scale(1.4);
        }

        .top-card h3::before {
            content: '';
            width: 260px;
            height: 220px;
            border: 1px solid rgba(234, 139, 139, 0.907);
            border-radius: 50%;
            position: absolute;
            top: -60px;
            left: -60px;
        }

        #myDIV1 h3::before {
            content: '';
            width: 260px;
            height: 220px;
            border: 1px solid rgba(234, 139, 139, 0.907);
            border-radius: 50%;
            position: absolute;
            top: -60px;
            left: -60px;
        }

        .breakfast .top-card h3::before {
            border: 3px solid #A6EFC0;
        }

        .snacks .top-card h3::before {
            border: 3px solid rgb(255, 255, 255);
        }

        .lunch .top-card h3::before {
            border: 3px solid #dbaaab;
        }

        .dinner .top-card h3::before {
            border: 1px solid #dc898a;
        }

        #myDIV1 .breakfast .top-card h3::before {
            border: 1px solid #92ceb6;
            ;
        }

        #myDIV1 .snacks .top-card h3::before {
            border: 1px solid #5191af;
            ;
        }

        #myDIV1 .lunch .top-card h3::before {
            border: 1px solid #dbaaab;
        }

        #myDIV1 .lunches .top-card h3::before {
            border: 1px solid #917dda;
            ;
        }

        #myDIV a,
        #myDIV1 a {
            cursor: pointer;
            text-decoration: none;
        }

        #myDIV1 a:hover,
        #myDIV a:hover {
            text-decoration: none;
        }

        .container1 .top-card .im2-2 {
            transform: scale(1.6) scaleX(-1) rotate(-10deg);
        }

        .container1 .top-card .ci {
            width: 110px;
            position: absolute;
            height: 100px;
            border-radius: 50%;
        }

        .container1 .top-card .ci1 {
            top: -60px;
            right: 110px;
        }

        .container1 .top-card .ci2 {
            bottom: -70px;
            right: 2px;
        }

        .container-1 .top-card h5,
        p,
        br {
            /* margin-right: 70px; */
            font-weight: 400;
            line-height: 88%;
        }

        .recipe-add-btn {
            position: inherit;
            justify-content: flex-end;
            display: flex;
            margin: 0px 21px 0px -60px;
        }

        .btn {
            margin-top: 10px;
            position: relative;
            margin-left: 1500px;
        }

        .btn .butt {
            background: #9C74F5;
            border: 0px;
            color: white;
            border-radius: 50%;
            position: absolute;
            bottom: 35px;
            right: 25px;
            width: 85px;
            height: 85px;
            font-size: 40px;
        }

        .main {
            display: flex;
            flex-wrap: wrap;
            margin-top: 30px;
            margin-left: 200px;

        }


        #popup {
            position: absolute;
            background-color: white;
            color: black;
            z-index: 1;
            padding: 10px;
            border-radius: 5px;
            display: none;
            background: transparent;
        }

        .hidden {
            display: none;
        }

        @media screen and (min-width: 720px) and (max-width:1920px) {
            .searchbox {
                width: 250px;
                margin-left: 20px;
            }

            .card {
                padding-left: 40px !important;
            }

            .card-food {
                font-size: 23px;
                font-weight: 400;
                line-height: 20px;
                min-width: 180px;
                margin-bottom: -3px;
            }

            .card-calorie {
                margin-top: 15px;
            }

            .card-upper {
                margin-left: -25px;
            }

            .dropdown-content {
                left: -125px;
                bottom: -70px;
            }

            .main {
                left: 30px !important;
                margin-left: 200px;
            }

            .recipe-add-btn {
                bottom: 0px !important;
                right: 0px !important;
            }

            .dropbtn {
                margin-top: 8px;
            }

        }


        @media screen and (min-width:0px) and (max-width:720px) {
            .recipe-add-btn {
                bottom: 0px !important;
                right: 0px !important;
            }

            .header {
                margin-top: 8px;
                flex-direction: column;
                align-items: flex-start;
            }

            input {
                width: 80% !important;
            }

            .header h1 {
                font-size: 50px;
                margin-left: 35px !important;
            }

            .container1 {
                grid-template-columns: auto auto auto auto;
                left: -1px;
                margin-right: 420px;
                gap: 0.5rem;
            }

            .recipe {
                margin-left: -200px;
            }

            .middle_wrapper a {
                margin-right: -22px;
                margin-top: -5px;
            }

            .card {
                margin: 25px auto !important;
            }

            .main {
                margin: 20px auto;
            }

            .card-food {
                font-size: 21.5px;
                font-weight: 500;
                line-height: 20px;
                min-width: 180px;
            }

            .recipe-add-btn {
                position: inherit;
                justify-content: flex-end;
                display: flex;
                margin: 0px 21px 0px -60px;
            }

            .card-calorie {
                margin-top: 15px;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                margin-top: 0px;
                background-color: #f9f9f9;
                min-width: 150px;
                left: -120px;
            }

            .butt {
                position: absolute !important;
                bottom: 0 !important;
                right: 0 !important;

            }

            .searchbox {
                margin-bottom: 60px !important;
                margin-left: 35px;
            }
        }

        @media screen and (min-width:0px) and (max-width:400px) {
            .searchbox {
                width: 270px;
            }

            .card {
                width: 320px !important;
                margin: 10px auto !important
            }
        }

        @media screen and (min-width:300px) and (max-width:340px) {
            .card {
                width: 300px !important;
                margin-left: 10px !important;
                margin-right: 10px !important;
            }

            .card-upper-text {
                width: 110px !important;
                margin-left: -0px;
            }

        }

        @media screen and (min-width:930px) and (max-width:1000px) {
            .main {
                display: flex;
                margin: auto;
                margin-left: 200px;
            }
        }

        @media screen and (min-width:721px) and (max-width:986px) {
            .main {
                justify-content: center;
                align-items: center;
            }

        }

        .popupholder {
            display: none;
            top: 0;
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.569);
            transition: opacity 500ms;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }
    </style>
</head>

<body>
    <?php unset($_SESSION['all_recipe_search']);
    if (isset($_POST['search_btn'])) {
        if (!empty($_POST['search_query'])) {
            $_SESSION['all_recipe_search'] = $_POST['search_query'];
            $allRecipeSearch = $_POST['search_query'];
        }
    } ?>
    <div class="header">
        <div class="heading">
            <h1
                style="margin-left:2.8rem;margin-top:1.8rem ;font-family: 'NATS';font-style: normal;font-weight: 400;font-size:40px;">
                Recipes</h1>
        </div>
        <div class="search" style="margin-right:2.2rem;display:flex;gap:1.5rem">
            <div class="searchbox">
                <form method="post">
                    <button style="background-color:white;border:none;" id="search-button" name="search_btn"><img
                            src="<?= $DEFAULT_PATH ?>assets/images/search1.svg" alt=""></button>
                    <input type="search" name="search_query" placeholder="Search"
                        style=" outline: none;border:none;font-size:20px;margin-left:1rem;width:60%;font-weight:400;"
                        value="<?php if (!empty($allRecipeSearch)) {
                            echo $allRecipeSearch;
                        } ?>">
                </form>
            </div>
        </div>
    </div>

    <div class="scroll-container">
        <div class="container1" id="myDIV" onscroll="myFunction()">
            <a href="recipe_breakfast.php" style="color: inherit; margin-left: -5px;" class="breakfast" id="btn1">
                <div class="top-card" style=" background-color: #61de99;margin-left: 35px;">
                    <span class="ci ci1" style="background-color:#CCF5CD;"></span><span class="ci ci2"
                        style="background-color: #CCF5CD"></span>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/breakfast-waffles.svg" class="imag im1"
                        style="width:200px;height:179px;left:130px;top:-20px;">
                    <h3
                        style="margin-bottom:10px;margin-right:135px;color: #000000;font-weight: 400;font-size:35px;margin-top:35px;">
                        Breakfast</h3>
                    <p style="margin-bottom:100px;margin-right:102px;color: #6A6A6A;font-size:19px;">Free menu
                        planning<br />to suit your needs</p>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/tree_branch-1.svg" class="imag im2 im2-2"
                        style="rotate:35deg;left:-110px;bottom:70px;height:75px;">
                    <img src="<?= $DEFAULT_PATH ?>assets/images/tree_branch-2.svg" class="imag im2 "
                        style="left:20px;bottom:10px;height:84px;">
                </div>
            </a>

            <a href="recipe_lunch.php" style="color: inherit;" class="lunch" id="btn2">
                <div class="top-card" style=" background-color:#F7C8C9!important;">
                    <span class="ci ci1" style="background-color: #E0B6B6;"></span><span class="ci ci2"
                        style="background-color: #E0B6B6;"></span>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/lunchbox.svg" class="imag im1"
                        style="left:130px;top:-20px;width:198px;height:234px;">
                    <h3
                        style="margin-bottom:10px;margin-right:180px;color: #000000;font-weight:400;font-size:35px; margin-top:35px;">
                        Lunch</h3>
                    <p style="margin-bottom:100px;margin-right:102px;color: #6A6A6A;font-size:19px;">Free menu
                        planning<br />to suit your needs</p>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/recipes_book.svg" class="imag im2"
                        style="width:50%;height:47%;left:-35px;bottom:-7px;transform:rotate(1deg);">
                </div>
            </a>

            <a href="recipe_snacks.php" style="color: inherit;" class="snacks" id="btn3">
                <div class="top-card" style=" background-color: #a6d5ee;">
                    <span class="ci ci1" style="background-color: #B8DDF1;z-index:1;"></span><span class="ci ci2"
                        style="background-color: #B8DDF1;z-index:1;"></span>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/waffers.svg" class="imag im1"
                        style="left:120px;top:-20px;width:205px;height:218px;">
                    <h3
                        style="margin-bottom:10px;margin-right:168px;color: #000000;font-weight: 400;font-size:35px;margin-top:35px;">
                        Snacks</h3>
                    <p style="margin-bottom:100px;margin-right:102px;color: #6A6A6A;font-size:19px;">Free menu
                        planning<br />to suit your needs</p>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/recipe_snacks.svg" class="imag im2"
                        style="width:45%;height:40%;left:-20px;bottom:1px;transform:rotate(1deg);">
                </div>
            </a>

            <a href="recipe_dinner.php" style="color: inherit;margin-right:10px;" class="dinner" id="btn4">
                <div class="top-card" style=" background-color: #e39494;">
                    <span class="ci ci1" style="background-color: 
                #EDB2B2"></span><span class="ci ci2" style="background-color: #EDB2B2"></span>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/dinner_noodles.svg" class="imag im1"
                        style="left:145px;top:-25px;width:174px;height:182px;">
                    <h3
                        style="margin-bottom:10px;margin-right:170px;color: #000000;font-weight: 400;font-size:35px;margin-top:35px;">
                        Dinner</h3>
                    <p style="margin-bottom:100px;margin-right:102px;color:#6A6A6A;font-size:19px;">Free menu
                        planning<br />to suit your needs</p>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/dinner_bowl.svg" class="imag im2"
                        style="bottom:10px;left:20px;width:65px;height:50px;">
                </div>
            </a>
        </div>
    </div>
    <!-- all recipes -->
    <div class="middle_wrapper" style="display:flex;justify-content:space-between;margin-top:30px;margin-right:2.5rem">
        <h3 class="recipe" style="margin-left:50px; color:black;font-family:'NATS';">All Recipes</h3>
        <a href="all_recipe_list.php" style="background-color:none;border:nome;color: #818181; text-decoration: none;">
            <h6 style="font-family:'NATS'; font-size:17px;margin-top:10px; margin-right:40px;">View all</h6>
        </a>
    </div>

    <div class="popupholder">
        <?php include("namehover.php"); ?>
    </div>

    <div class="main">
        <?php
        $sql = "SELECT * FROM `dietitian_recipes` WHERE dietitian_id = '{$_SESSION['dietitian_id']}'";
        if (!empty($allRecipeSearch)) {
            $sql .= " AND recipe_name LIKE '%$allRecipeSearch%'";
        }

        $res = mysqli_query($conn, $sql);
        $counter = 0;
        while ($d = mysqli_fetch_assoc($res)) {
            $recipeDirections = trim($d['recipe_recipe'], '{}');
            $recipe_recipe = explode('},{', $recipeDirections);
            $steps = !empty($recipeDirections) && $recipeDirections !== '{}' ? count($recipe_recipe) : 0;
            $nutritional = json_decode($d['recipe_nutritional_information'], true);
            if ($counter == 5) {
                break;
            }
            $temp_data = array("recipe_name" => $d['recipe_name'], "recipe_nutritional_information" => $d['recipe_nutritional_information'], "recipe_img" => $d['recipe_img']);
            $counter++;
            ?>
            <div class="card d-flex"
                style="padding:15px; width:310px; height:238px;border-radius:16px;margin:35px 1.5vmax;">
                <div class="card-upper d-flex justify-content-between" style="justify-content:space-between;">
                    <p id="bu" class="card-upper-text" style="white-space: nowrap;"> Added Recipe </p>
                    <p id="bu" class="card-upper-text d-flex" style="margin-left:0px; white-space: nowrap;"><img
                            src="<?= $DEFAULT_PATH ?>assets/images/Clock.svg" style="margin-right:10px">
                        <?php echo $d['recipe_time']; ?>
                    </p>
                </div>
                <div class="img-dis" style="width:100%;margin-top:-35px;text-align:center;">
                    <?php if ($d['recipe_img'] != "") {
                        $imgSrc = $DEFAULT_PATH . "uploads/recipe/" . $d['recipe_img'];
                    } else {
                        $imgSrc = $DEFAULT_PATH . "assets/images/alooparantha.svg";
                    } ?>
                    <img src="<?= $imgSrc ?>" style="height:115px; width:160px; margin-left:-20px;margin-top:20px" />
                </div>
                <div class="d-flex justify-content-between">
                    <p class="card-food ellipsis card-food-name" style="max-width:40px;"
                        onmouseover='toggleShowHide(stuff=<?= json_encode($temp_data) ?>)'
                        onmouseout='toggleShowHide(stuff=<?= json_encode($temp_data) ?>)'>
                        <?php echo $d['recipe_name'] ?>
                    </p>
                    <div class="header">
                        <div class="dropdown">
                            <div id="myDropdownIcon" class="dropbtn" onclick="showDropdown(event)">
                                <img class="" src="<?= $DEFAULT_PATH ?>assets/images/vertical-three-dots.svg" alt=""
                                    style="margin-right:25px;">
                            </div>

                            <div id="myDropdownContent" class="dropdown-content dropdown-card ">
                                <a style="color: white;" class="edit-button"
                                    href="create_recipe.php?recipe_id=<?= $d['recipe_id'] ?>&action=editRecipe&isDefault=false">Edit</a>
                                <a onclick="return confirm('Are you sure to delete this?')" style="color: white;"
                                    class="delete-button"
                                    href="deleteRecipe.php?recipeId=<?= $d['recipe_id'] ?>&isDefault=false">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between" style="align-items:center;">
                    <p class="card-calorie"> <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="">
                        <?php echo $nutritional['Calories'] ?> kcal
                    </p>
                    <div class="d-flex align-items-center card-num" style="margin-bottom:0px">
                        <div class="card-num-circle">
                            <?= $steps ?>
                        </div> &nbsp;
                        <div class="step" style="font-size:18px; margin-top: -5px;">Steps</div>
                    </div>
                </div>
            </div>
        <?php }
        // $sql = "SELECT dr.* FROM `default_recipes` dr LEFT JOIN `updated_by_users` ubu ON dr.`drecipe_id` = ubu.`updated_drecipe_id`AND ubu.`dietitian_id`='{$_SESSION['dietitian_id']}' WHERE ubu.`updated_drecipe_id` IS NULL AND ubu.`dietitian_id` IS NULL";
        // if (!empty($allRecipeSearch)) {
        //     $sql .= " AND drecipe_name LIKE '%$allRecipeSearch%'";
        // }
        // $res = mysqli_query($conn, $sql);
        // while ($d = mysqli_fetch_assoc($res)) {
        //     $drecipeDirections = trim($d['drecipe_recipe'], '{}');
        //     $drecipe_recipe = explode('}, {', $drecipeDirections);
        //     $steps = count($drecipe_recipe);
        //     $nutritional = json_decode($d['drecipe_nutritional_information'], true);
        //     if ($counter == 5) {
        //         break;
        //     }
        //     $temp_data = array("drecipe_name" => $d['drecipe_name'], "recipe_nutritional_information" => $d['drecipe_nutritional_information']);
        //     $counter++;
            ?>
            <!-- <div class="card d-flex"
                style="padding:15px; width:310px; height:238px;border-radius:16px;margin:35px 1.5vmax ; ">
                <div class="card-upper d-flex justify-content-between">
                    <p id="bu" class="card-upper-text" style="white-space: nowrap;"> Default Recipe </p>
                    <p id="bu" class="card-upper-text d-flex" style="margin-left:10px;"><img
                            src="<//?= $DEFAULT_PATH; ?>assets/images/Clock.svg" style="margin-right:10px">
                        <//?php echo $d['drecipe_time']; ?>
                    </p>
                </div>
                <div class="img-dis" style="width:100%;margin-top:-35px;text-align:center;">
                    <img src="<//?= $DEFAULT_PATH ?>assets/images/alooparantha.svg"
                        style="height:115px; width:160px; margin-left:-20px;margin-top:20px;" />
                </div>
                <div class="d-flex justify-content-between">
                    <p class="card-food ellipsis" style="width:40px;"
                        onmouseover='toggleShowHide(stuff="",dstuff=<//?=json_encode($d) ?>)'
                        onmouseout='toggleShowHide(stuff="",dstuff=<//?= json_encode($d) ?>)'>
                        <//?php echo $d['drecipe_name'] ?>
                    </p>
                    <div class="header">
                        <div class="dropdown ">
                            <div id="myDropdownIcon" class="dropbtn" onclick="showDropdown(event)">
                                <img class="" src="<//?= $DEFAULT_PATH ?>assets/images/vertical-three-dots.svg" alt=""
                                    style="margin-right:25px;">
                            </div>

                            <div id="myDropdownContent" class="dropdown-content dropdown-card ">
                                <a style="color: white;" class="edit-button"
                                    href="create_recipe.php?recipe_id=<//?= $d['drecipe_id'] ?>&action=editRecipe&isDefault=true">Edit</a>
                                <a onclick="return confirm('Are you sure to delete this?')" style="color: white;"
                                    class="delete-button"
                                    href="deleteRecipe.php?recipeId=<//?= $d['drecipe_id'] ?>&isDefault=true">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between" style="align-items:center;">
                    <p class="card-calorie"> <img src="<//?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt="">
                        <//?php echo $nutritional['Calories'] ?> kcal
                    </p>
                    <div class="d-flex align-items-center card-num" style="margin-bottom:0px">
                        <div class="card-num-circle">
                            <//?= $steps ?>
                        </div> &nbsp;
                        <div class="step" style="font-size:18px; margin-top: -5px;">Steps</div>
                    </div>
                </div>
            </div> -->
        <?php //} ?>
    </div>
    <a class="butt" href="create_recipe.php"
        style="text-decoration:none;border-radius:50%;background-color:#9C74F5;width:85px;height:85px;filter: drop-shadow(0px 0px 68px rgba(0, 0, 0, 0.3));color:white;font-size:60px;border:none;position:absolute;right:50px;bottom:60px;display:flex;justify-content:center;align-items:center;">+</a>
    <?php require('constant/scripts.php'); ?>

</body>

<script>
    function myFunction() {
        const element = document.getElementById("myDIV");
        let x = element.scrollLeft;
        let y = element.scrollTop;
        document.getElementById("demo").innerHTML = "Horizontally: " + x.toFixed() + "<br>Vertically: " + y.toFixed();
    }

    function showDropdown(event) {
        var dropdown = event.currentTarget.parentNode.querySelector(".dropdown-content");
        dropdown.classList.toggle("show");
        setTimeout(removeDropDown, 5000);
    }

    function removeDropDown() {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            dropdowns[i].classList.remove('show');
        }
    }

    function removeDropdown(event) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show") && !openDropdown.contains(event.target)) {
                openDropdown.classList.remove("show");
            }
        }
    }
    const toggleShowHide = (stuff = "", dstuff = "") => {
        let hover_img = document.getElementsByClassName('hover-img')[0];
        let aloo_paratha = document.getElementsByClassName("aloo-paratha")[0];
        let maindiv = document.getElementsByClassName("main-div2")[0];
        const popholder = document.getElementsByClassName("popupholder")[0];
        if (popholder.style.display != "block") {
            popholder.style.display = "block";
            if (typeof stuff === 'object' && typeof dstuff === 'string') {
                const arr = Array("Calories", "Protein (g)", "Carbohydrates (g)", "Fibre (g)")
                let i = 0;
                const details = JSON.parse(stuff["recipe_nutritional_information"]);
                Array.from(maindiv.children).forEach(element => {
                    if (details[arr[i]] == "") {
                        element.firstElementChild.innerHTML = 0;
                    } else {
                        element.firstElementChild.innerHTML = details[arr[i]];
                    }
                    i++;
                });
                aloo_paratha.innerHTML = stuff["recipe_name"];
                if (stuff['recipe_img'] !== "" && stuff['recipe_img'] !== null) {
                    hover_img.src = "<?= $DEFAULT_PATH ?>uploads/" + stuff['recipe_img'];
                } else {
                    hover_img.src = "<?= $DEFAULT_PATH ?>assets/images/alooparantha.svg"
                }

            }
            if (typeof dstuff === 'object' && typeof stuff === 'string') {
                const arr = Array("Calories", "Protein (g)", "Carbohydrates (g)", "Fibre (g)")
                let i = 0;
                const details = JSON.parse(dstuff["drecipe_nutritional_information"]);
                Array.from(maindiv.children).forEach(element => {
                    if (details[arr[i]] == "") {
                        element.firstElementChild.innerHTML = 0;
                    } else {
                        element.firstElementChild.innerHTML = details[arr[i]];
                    }
                    i++;
                });
                aloo_paratha.innerHTML = dstuff["drecipe_name"];
                hover_img.src = "<?= $DEFAULT_PATH ?>assets/images/alooparantha.svg"
            }
            // document.body.style = " background: rgba(0, 0, 0, 0.03579);transition: opacity 500ms;";
        } else {
            popholder.style.display = "none";
            // document.body.style = " background: none;transition: none";
        }
    }
</script>

</html>