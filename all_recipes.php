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
    <link rel="stylesheet" href="<?= $DEFAULT_PATH ?>assets/css/all_recipes.css">
    <style>
        .scroll-container {
            overflow-x: auto;
        }

        .container1 {
            display: flex;
            gap: 30px;
            margin-top: 32px;
            margin-left: 10px;
            padding: 4px;
            width: max-content;
            height: max-content;
            overflow-x: auto;
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
            <h1 style="margin-left:2.8rem;margin-top:1.8rem ;font-family: 'NATS';font-style: normal;font-weight: 400;font-size:40px;">Recipes</h1>
        </div>
        <div class="search" style="margin-right:2.2rem;display:flex;gap:1.5rem">
            <div class="searchbox">
                <form method="post">
                    <button style="background-color:white;border:none;" id="search-button" name="search_btn"><img src="<?= $DEFAULT_PATH ?>assets/images/search1.svg" alt=""></button>
                    <input type="search" name="search_query" placeholder="Search" style=" outline: none;border:none;font-size:20px;margin-left:1rem;width:60%;font-weight:400;" value="<?php if (!empty($allRecipeSearch)) {
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
                    <span class="ci ci1" style="background-color:#CCF5CD;"></span><span class="ci ci2" style="background-color: #CCF5CD"></span>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/breakfast-waffles.svg" class="imag im1" style="width:200px;height:179px;left:130px;top:-20px;">
                    <h3 style="margin-bottom:10px;margin-right:135px;color: #000000;font-weight: 400;font-size:35px;margin-top:35px;">Breakfast</h3>
                    <p style="margin-bottom:100px;margin-right:102px;color: #6A6A6A;font-size:19px;">Free menu planning<br />to suit your needs</p>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/tree_branch-1.svg" class="imag im2 im2-2" style="rotate:35deg;left:-110px;bottom:70px;height:75px;">
                    <img src="<?= $DEFAULT_PATH ?>assets/images/tree_branch-2.svg" class="imag im2 " style="left:20px;bottom:10px;height:84px;">
                </div>
            </a>

            <a href="recipe_lunch.php" style="color: inherit;" class="lunch" id="btn2">
                <div class="top-card" style=" background-color:#F7C8C9!important;">
                    <span class="ci ci1" style="background-color: #E0B6B6;"></span><span class="ci ci2" style="background-color: #E0B6B6;"></span>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/lunchbox.svg" class="imag im1" style="left:130px;top:-20px;width:198px;height:234px;">
                    <h3 style="margin-bottom:10px;margin-right:180px;color: #000000;font-weight:400;font-size:35px; margin-top:35px;">Lunch</h3>
                    <p style="margin-bottom:100px;margin-right:102px;color: #6A6A6A;font-size:19px;">Free menu planning<br />to suit your needs</p>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/recipes_book.svg" class="imag im2" style="width:50%;height:47%;left:-35px;bottom:-7px;transform:rotate(1deg);">
                </div>
            </a>

            <a href="recipe_snacks.php" style="color: inherit;" class="snacks" id="btn3">
                <div class="top-card" style=" background-color: #a6d5ee;">
                    <span class="ci ci1" style="background-color: #B8DDF1;z-index:1;"></span><span class="ci ci2" style="background-color: #B8DDF1;z-index:1;"></span>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/waffers.svg" class="imag im1" style="left:120px;top:-20px;width:205px;height:218px;">
                    <h3 style="margin-bottom:10px;margin-right:168px;color: #000000;font-weight: 400;font-size:35px;margin-top:35px;">Snacks</h3>
                    <p style="margin-bottom:100px;margin-right:102px;color: #6A6A6A;font-size:19px;">Free menu planning<br />to suit your needs</p>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/recipe_snacks.svg" class="imag im2" style="width:45%;height:40%;left:-20px;bottom:1px;transform:rotate(1deg);">
                </div>
            </a>

            <a href="recipe_dinner.php" style="color: inherit;margin-right:10px;" class="dinner" id="btn4">
                <div class="top-card" style=" background-color: #e39494;">
                    <span class="ci ci1" style="background-color: 
                #EDB2B2"></span><span class="ci ci2" style="background-color: #EDB2B2"></span>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/dinner_noodles.svg" class="imag im1" style="left:145px;top:-25px;width:174px;height:182px;">
                    <h3 style="margin-bottom:10px;margin-right:170px;color: #000000;font-weight: 400;font-size:35px;margin-top:35px;">Dinner</h3>
                    <p style="margin-bottom:100px;margin-right:102px;color:#6A6A6A;font-size:19px;">Free menu planning<br />to suit your needs</p>
                    <img src="<?= $DEFAULT_PATH ?>assets/images/dinner_bowl.svg" class="imag im2" style="bottom:10px;left:20px;width:65px;height:50px;">
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
            $counter++;
        ?>
            <div class="card d-flex" style="padding:15px; width:310px; height:238px;border-radius:16px;margin:35px 35px; ">
                <div class="card-upper d-flex justify-content-between">
                    <p id="bu" class="card-upper-text" style="white-space: nowrap;"> Added Recipe </p>
                    <p id="bu" class="card-upper-text d-flex" style="margin-left:10px;"><img src="<?= $DEFAULT_PATH ?>assets/images/Clock.svg" style="margin-right:10px"> <?php echo $d['recipe_time']; ?> </p>
                </div>
                <div class="img-dis" style="width:100%;margin-top:-35px;text-align:center;">
                    <?php if ($d['recipe_img'] != "") {
                        $imgSrc = $DEFAULT_PATH . "uploads/recipe/" . $d['recipe_img'];
                    } else {
                        $imgSrc = $DEFAULT_PATH . "assets/images/alooparantha.svg";
                    } ?>
                    <img src="<?= $imgSrc ?>" style="height:115px; width:160px; margin-left:-20px;margin-top:-15px;" />
                </div>
                <div class="d-flex justify-content-between">
                    <p class="card-food "><?php echo $d['recipe_name'] ?></p>
                    <div class="header">
                        <div class="dropdown ">
                            <div id="myDropdownIcon" class="dropbtn" onclick="showDropdown(event)">
                                <img class="" src="<?= $DEFAULT_PATH ?>assets/images/vertical-three-dots.svg" alt="" style="margin-top:20px;">
                            </div>

                            <div id="myDropdownContent" class="dropdown-content dropdown-card ">
                                <a style="color: white;" class="edit-button" href="create_recipe.php?recipe_id=<?= $d['recipe_id'] ?>&action=editRecipe&isDefault=false">Edit</a>
                                <a onclick="return confirm('Are you sure to delete this?')" style="color: white;" class="delete-button" href="deleteRecipe.php?recipeId=<?= $d['recipe_id'] ?>&isDefault=false">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between" style="align-items:center;">
                    <p class="card-calorie"> <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt=""> <?php echo $nutritional['Calories'] ?> kcal</p>
                    <div class="d-flex align-items-center card-num" style="margin-bottom:20px">
                        <div class="card-num-circle"><?= $steps ?> </div> &nbsp;
                        <div class="step" style="font-size:18px; margin-top: -5px;">Steps</div>
                    </div>
                </div>
            </div>
        <?php }
        $sql = "SELECT dr.* FROM `default_recipes` dr LEFT JOIN `updated_by_users` ubu ON dr.`drecipe_id` = ubu.`updated_drecipe_id`AND ubu.`dietitian_id`='{$_SESSION['dietitian_id']}' WHERE ubu.`updated_drecipe_id` IS NULL AND ubu.`dietitian_id` IS NULL";
        if (!empty($allRecipeSearch)) {
            $sql .= " AND drecipe_name LIKE '%$allRecipeSearch%'";
        }
        $res = mysqli_query($conn, $sql);
        while ($d = mysqli_fetch_assoc($res)) {
            $drecipeDirections = trim($d['drecipe_recipe'], '{}');
            $drecipe_recipe = explode('}, {', $drecipeDirections);
            $steps = count($drecipe_recipe);
            $nutritional = json_decode($d['drecipe_nutritional_information'], true);
            if ($counter == 5) {
                break;
            }
            $counter++;
        ?>
            <div class="card d-flex" style="padding:15px; width:310px; height:238px;border-radius:16px;margin:35px 35px; ">
                <div class="card-upper d-flex justify-content-between">
                    <p id="bu" class="card-upper-text" style="white-space: nowrap;"> Default Recipe </p>
                    <p id="bu" class="card-upper-text d-flex" style="margin-left:10px;"><img src="<?= $DEFAULT_PATH ?>assets/images/Clock.svg" style="margin-right:10px"> <?php echo $d['drecipe_time']; ?> </p>
                </div>
                <div class="img-dis" style="width:100%;margin-top:-35px;text-align:center;">
                    <img src="<?= $DEFAULT_PATH ?>assets/images/alooparantha.svg" style="height:115px; width:160px; margin-left:-20px;margin-top:0px;" />
                </div>
                <div class="d-flex justify-content-between">
                    <p class="card-food "><?php echo $d['drecipe_name'] ?></p>
                    <div class="header">
                        <div class="dropdown ">
                            <div id="myDropdownIcon" class="dropbtn" onclick="showDropdown(event)">
                                <img class="" src="<?= $DEFAULT_PATH ?>assets/images/vertical-three-dots.svg" alt="" style="margin-top:20px;">
                            </div>

                            <div id="myDropdownContent" class="dropdown-content dropdown-card ">
                                <a style="color: white;" class="edit-button" href="create_recipe.php?recipe_id=<?= $d['drecipe_id'] ?>&action=editRecipe&isDefault=true">Edit</a>
                                <a onclick="return confirm('Are you sure to delete this?')" style="color: white;" class="delete-button" href="deleteRecipe.php?recipeId=<?= $d['drecipe_id'] ?>&isDefault=true">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between" style="align-items:center;">
                    <p class="card-calorie"> <img src="<?= $DEFAULT_PATH ?>assets/images/calorie.svg" alt=""> <?php echo $nutritional['Calories'] ?> kcal</p>
                    <div class="d-flex align-items-center card-num" style="margin-bottom:20px">
                        <div class="card-num-circle"><?= $steps ?> </div> &nbsp;
                        <div class="step" style="font-size:18px; margin-top: -5px;">Steps</div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <a class="butt" href="create_recipe.php" style="text-decoration:none;border-radius:50%;background-color:#9C74F5;width:85px;height:85px;filter: drop-shadow(0px 0px 68px rgba(0, 0, 0, 0.3));color:white;font-size:60px;border:none;position:absolute;right:50px;bottom:60px;display:flex;justify-content:center;align-items:center;">+</a>

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
</script>

</html>
