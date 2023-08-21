<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require('constant/config.php');
if (isset($_POST['add'])) {
    global $conn;
    if (!empty($_FILES['recipeImage']['name'])) {
        $uploadsDir = 'uploads/recipe/';
        $uploadedFile = $_FILES['recipeImage']['tmp_name'];
        $originalName = $_FILES['recipeImage']['name'];

        // Generate a random number and append it to the image filename
        $randomNumber = rand(100000, 999999);
        $imageName = $randomNumber . '_' . $originalName;

        $imagePath = $uploadsDir . $imageName;

        // Move the uploaded image to the uploads folder
        move_uploaded_file($uploadedFile, $imagePath);
    }
    $query = "INSERT INTO `dietitian_recipes`( `dietitian_id`, `dietitianuserID`, `recipe_name`, `recipe_ingredients`, `recipe_recipe`, `recipe_nutritional_information`,`recipe_img`,`recipe_courses`,`recipe_category`,`recipe_time`) VALUES
         ('{$_SESSION['dietitian_id']}','{$_SESSION['dietitianuserID']}','{$_POST['recipeName']}','{$_POST['recipeingredients']}','{$_POST['recipeDirections']}','{$_POST['nutriDetails']}','{$imageName}','{$_POST['recipeCourse']}','{$_POST['recipeCategory']}','{$_POST['recipeTime']}')";
    $conn->query($query);
    header("Location:all_recipes.php");
    exit;
} elseif (isset($_POST['edit'])) {
    global $conn;
    if (!empty($_FILES['recipeImage']['name'])) {
        $uploadsDir = 'uploads/';
        $uploadedFile = $_FILES['recipeImage']['tmp_name'];
        $originalName = $_FILES['recipeImage']['name'];

        // Generate a random number and append it to the image filename
        $randomNumber = rand(100000, 999999);
        $imageName = $randomNumber . '_' . $originalName;

        $imagePath = $uploadsDir . $imageName;
    }

    if ($_GET['isDefault'] == 'true') {
        if (!empty($imagePath && $imageName)) {
            move_uploaded_file($uploadedFile, $imagePath);
        }
        $query1 = "INSERT INTO `dietitian_recipes`( `dietitian_id`, `dietitianuserID`, `recipe_name`, `recipe_ingredients`, `recipe_recipe`, `recipe_nutritional_information`,`recipe_img`,`recipe_courses`, `recipe_category`,`recipe_time`) VALUES ('{$_SESSION['dietitian_id']}','{$_SESSION['dietitianuserID']}','{$_POST['recipeName']}','{$_POST['recipeingredients']}','{$_POST['recipeDirections']}','{$_POST['nutriDetails']}','{$imageName}','{$_POST['recipeCourse']}','{$_POST['recipeCategory']}','{$_POST['recipeTime']}')";
        $reuslt = $conn->query($query1);
        $query = "INSERT INTO `updated_by_users`(`dietitian_id`, `updated_drecipe_id`) VALUES ('{$_SESSION['dietitian_id']}','{$_GET['recipe_id']}')";
        $conn->query($query);
    } else {
        if (!file_exists($imagePath)) {
            if (move_uploaded_file($uploadedFile, $imagePath)) {
                $query = "UPDATE `dietitian_recipes` SET `recipe_img`='{$imageName}' WHERE recipe_id = '{$_GET['recipe_id']}' AND dietitian_id='{$_SESSION['dietitian_id']}'";
                $conn->query($query);
            }
        }
        $query = "UPDATE `dietitian_recipes` SET `recipe_name`='{$_POST['recipeName']}',`recipe_ingredients`='{$_POST['recipeingredients']}',`recipe_recipe`='{$_POST['recipeDirections']}',`recipe_nutritional_information`='{$_POST['nutriDetails']}',`recipe_courses`='{$_POST['recipeCourse']}',`recipe_category`='{$_POST['recipeCategory']}',`recipe_time`='{$_POST['recipeTime']}' WHERE recipe_id = '{$_GET['recipe_id']}' AND dietitian_id='{$_SESSION['dietitian_id']}'";
        $conn->query($query);
    }
    header("Location:all_recipes.php");
    exit;
}
include('navbar.php');


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require('constant/head.php'); ?>
    <title>Infits | Create_Recipe</title>
    <style>
        body {
            font-family: 'NATS';
        }

        ::placeholder {
            color: #AEAEAE;
            padding: 10px;
        }

        .cheader {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cheader span {
            font-style: normal;
            font-weight: 400;
            font-size: 44px;
            color: #000000;
        }

        .btn-save {
            height: 46px;
            background: #D257E6;
            color: white;
            text-align: center;
            border: none;
            border-radius: 15px;
            box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
            font-size: 24px;
            padding: 0 25px;
        }

        .ctop {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            color: #292A2E;
        }

        .right {
            display: flex;
            flex-direction: column;
            justify-content: left;

        }

        .bottom {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .rtab-group {
            width: 640px;
            height: 60px;
            background: #FAFAFA;
            border-radius: 52.8px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 30px 0;
        }

        .rtab {
            width: 178px;
            height: 42px;
            border-radius: 26.4px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: rgb(0, 0, 0, 0.6);
            cursor: pointer;
        }

        .ractive {
            background: #D257E6;
            color: #fff;
        }

        .rtab-content-group {
            width: 80%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }

        .rtab-content {
            display: none;
            width: 80%;
            margin: 0 auto;
        }

        .add-ingredient,
        .add-direction {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            cursor: pointer;
        }

        .ingredient_select {
            background: #FFFFFF;
            border: 1.74869px solid #D4D4D4;
            border-radius: 10px;
            width: 300.43px;
            height: 57.71px;
            /* Center the display text and change text color */
            text-align: center;
            color: #D4D4D4;
            /* Style for dropdown options */
            appearance: none;
            -webkit-appearance: none;
            padding: 10px 20px;
            cursor: pointer;
            background: transparent;
            background-image: linear-gradient(45deg, transparent 50%, #D4D4D4 50%), linear-gradient(135deg, #D4D4D4 50%, transparent 50%);
            background-position: calc(100% - 20px) center, calc(100% - 10px) center;
            background-size: 10px 10px, 10px 10px;
            background-repeat: no-repeat;
            border-radius: 10px;
            font-size: 16px;
            transition: background 0.3s ease-in-out;
        }


        .plus {
            border: 2px solid;
            font-size: 50px;
            font-weight: 600;
            padding: 15px;
            line-height: 15px;
            border-radius: 10px;
            color: #BD59EB;
            text-decoration: none;
            background-color: white;
        }

        .ingre-icards {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            align-items: center;
            gap: 10%;
            margin: 20px 0px;
        }

        .icard {
            width: 45%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .icard img {
            max-width: 60px;
            max-height: 60px;
        }

        .add-actions {
            display: flex;
            justify-content: space-between;
            padding: 0 100px;
            align-items: center;
        }

        .upload-url {
            border: 2px solid;
            padding: 10px 15px;
            line-height: 15px;
            border-radius: 10px;
            color: #BD59EB;
        }

        .direction-list {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: 40px 0 0 100px;
        }

        ul.direcions {
            list-style-type: none;
        }

        ul li::before {
            content: "";
            display: inline-block;
            width: 10px;
            height: 10px;
            margin-right: 10px;
            border-radius: 50%;
            background-color: #AF5BEF;
        }

        li.direction {
            margin-bottom: 10px;
        }

        .input_bar {
            background: #FFFFFF;
            box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
        }

        /* Style for aligning inputs and dropdown */
        .input-group {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        /* Additional styling for the measurement unit dropdown */
        #measurementUnit {
            flex: 1;
            /* Allow the dropdown to expand and fill available space */
        }



        @media screen and (max-width: 1200px) {
            .popup {
                margin-left: 10% !important;
                margin-right: 10% !important;
                width: auto !important;
            }

        }

        @media screen and (max-width: 720px) {
            .rtab-content-group {
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;

            }

            .ingredient {

                width: auto;

            }

            .rtab-content {
                display: none;
                width: 100%;
                margin: 0;
            }

            .add-actions {

                padding: 0;

            }

            .direction-list {

                padding: 0;
            }

            .ingre-icards {
                display: flex;

                flex-direction: column;
                gap: 2rem;
                justify-content: center;
                align-items: center;

            }

            .directions {
                width: auto !important;
            }
        }

        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.6);
            transition: opacity 500ms;
            display: none;
        }

        .popup {
            padding: 20px;
            background: #fff;
            box-shadow: 0px 0px 34.0377px rgba(0, 0, 0, 0.25);
            border-radius: 25.5283px;
            width: 400px;
            transition: all 5s ease-in-out;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Styles for the cancel icon button */
        .close-btn {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }

        .cancel-icon {
            width: 24px;
            height: 24px;
            vertical-align: middle;
        }

        .close-btn:hover .cancel-icon {
            filter: brightness(0.7);
            /* Adjust brightness for hover effect */
        }


        .directions {
            background: #FFFFFF;
            border: 1.74869px solid #D4D4D4;
            border-radius: 10px;
            width: 350.43px;
            height: 57.71px;
        }

        .ingredient {
            background: #FFFFFF;
            border: 1.74869px solid #D4D4D4;
            border-radius: 10px;
            width: 300.43px;
            height: 57.71px;
        }

        .direction_btn {
            background: #A85CF1;
            border-radius: 10px;
            color: white;
            padding: 1% 10%;
            border: none;
            font-size: 30px;


        }

        .popup2_wrapper {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .direction_li {
            padding-bottom: 12px;
        }

        .dropdown-container {
            margin-left: 0;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'createRecipe';
    }

    if ($action == 'editRecipe') {
        global $conn;
        if ($_GET['isDefault'] == 'true') {
            $query = "SELECT * FROM `default_recipes` WHERE drecipe_id = '{$_GET['recipe_id']}'";
            $result = $conn->query($query);
            $data = $result->fetch_assoc();
            $edit['name'] = $data['drecipe_name'];
            $edit['img'] = '';
            $edit['time'] = $data['drecipe_time'];
            $edit['ingredients'] = json_decode($data['drecipe_ingredients'], true);
            $drecipeDirections = trim($data['drecipe_recipe'], '{}');
            $edit['directions'] =  explode('},{', $drecipeDirections);
            $edit['nutritional'] = json_decode($data['drecipe_nutritional_information'], true);
            $edit['course'] = $data['drecipe_course'];
            $edit['category'] = $data['drecipe_category'];
        } else {
            $query = "SELECT * FROM `dietitian_recipes` WHERE recipe_id = '{$_GET['recipe_id']}'";
            $result = $conn->query($query);
            $data = $result->fetch_assoc();
            $edit['name'] = $data['recipe_name'];
            $edit['img'] = $data['recipe_img'];
            $edit['time'] = $data['recipe_time'];
            $edit['ingredients'] = json_decode($data['recipe_ingredients'], true);
            $recipeDirections = trim($data['recipe_recipe'], '{}');
            $edit['directions'] =  explode('},{', $recipeDirections);
            $edit['nutritional'] = json_decode($data['recipe_nutritional_information'], true);
            $edit['course'] = $data['recipe_courses'];
            $edit['category'] = $data['recipe_category'];
        }
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
        <input type="hidden" name="action" id="action" value="<?php echo $action; ?>">
        <div id="content" class="container-fluid">
            <div class="row">
                <div class="col cheader d-flex justify-content-between">
                    <span style="font-size:40px;margin-top:0.5rem;margin-left:1.5rem"><?php if ($action == 'createRecipe') {
                                                                                            echo "New Recipe";
                                                                                        } else {
                                                                                            echo "Edit Recipe";
                                                                                        } ?></span>
                    <button name='<?= $action ?>' type="button" id='submit_btn' class="btn btn-save"><?php if ($action == 'createRecipe') {
                                                                                                            echo "Save";
                                                                                                        } else {
                                                                                                            echo "Save Changes";
                                                                                                        } ?></button>
                </div>
            </div>
            <div class="ctop">
                <div class="left uploadImg">
                    <?php if ($action == 'editRecipe') {
                        if ($edit['img'] != "") {
                            $imgSrc = $DEFAULT_PATH . "uploads/recipe/" . $edit['img'];
                        } else {
                            $imgSrc = $DEFAULT_PATH . "assets/images/alooparantha.svg";
                        }
                    ?>
                        <img src="<?= $imgSrc ?>" alt="" id="camera" style="width:200px;height:170px;border-radius:20px;">
                    <?php } else { ?>
                        <img src="<?= $DEFAULT_PATH ?>assets/images/camera.svg" alt="" id="camera" style="width:200px;height:170px;border-radius:20px;">
                    <?php } ?>
                    <input data-name="recipeImage" type="file" class="form-control" id="recipeImg" style="display:none" name="recipeImage" onchange="previewImage(this)">
                </div>

                <div class="right">
                    <input data-name="recipeName" required class="form-control" style="border:none;font-size:30px" type="text" value="<?php if ($action == 'editRecipe') {
                                                                                                                                            echo $edit['name'];
                                                                                                                                        } ?>" name="recipeName" id="" placeholder="Recipe Name">
                    <span style="font-size:20px;margin-left:22px">(auto sync)</span>
                </div>
            </div>
            <div class="row bottom">
                <div class="rtab-group">
                    <div id="toggle-recipe" data-toggle="details-tab" class="rtab">Recipe Details</div>
                    <div id="toggle-ingredient" data-toggle="ingredient-tab" class="rtab">Ingredients</div>
                    <div id="toggle-directions" data-toggle="direction-tab" class="rtab">Directions</div>
                </div>
                <div class="rtab-content-group">
                    <div class="rtab-content details-tab">
                        <div class="d-flex align-items-center justify-content-center flex-column gap-3">
                            <div class="row w-100">
                                <div class="col">
                                    <input class="form-control input_bar" type="text" required class="form-control" placeholder="Recipe Name" value="<?php if ($action == 'editRecipe') {
                                                                                                                                                            echo $edit['name'];
                                                                                                                                                        } ?>">
                                </div>
                                <div class="col dropdown-container">
                                    <select data-validate name="courses" id="recipeCourse" class="form-control input_bar" style="color: #212529 !important" placeholder="Courses">
                                        <?php
                                        $courseOptions = array(
                                            "Courses" => "Courses",
                                            "breakfast" => "Breakfast",
                                            "lunch" => "Lunch",
                                            "snacks" => "Snack",
                                            "dinner" => "Dinner"
                                        );

                                        foreach ($courseOptions as $value => $label) {
                                            $selected = ($edit['course'] === $value) ? 'selected' : '';
                                            echo "<option value='$value' $selected>$label</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row w-100">
                                <div class="col dropdown-container ">
                                    <select data-name="recipeCategory" name="category" id="recipeCategory" class="form-control input_bar" style="color: #212529 !important" placeholder="Categories">
                                        <?php
                                        if ($action == 'createRecipe') {
                                            echo "<option value='Categories' selected>Categories</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <input data-name="recipePrepTime" required name="Preparationtime" class="form-control input_bar" type="text" class="form-control" placeholder="Preparation Time hh:mm" value="<?php if ($action == 'editRecipe') {
                                                                                                                                                                                                                        echo $edit['time'];
                                                                                                                                                                                                                    } ?>" onblur="updateResult(this)">
                                </div>


                            </div>

                            <h3 class="text-center">Nutritional Details</h3>
                            <div class="row w-75">
                                <div class="col">
                                    <input data-nutri="Calories" required name="Calories" class="form-control input_bar" type="text" class="form-control" placeholder="Calories" value="<?php if ($action == 'editRecipe') {
                                                                                                                                                                                            echo $edit['nutritional']['Calories'];
                                                                                                                                                                                        } ?>">
                                </div>
                                <div class="col">
                                    <input data-nutri="Protein (g)" required name="Protien" class="form-control input_bar" type="text" class="form-control" value="<?php if ($action == 'editRecipe') {
                                                                                                                                                                        echo $edit['nutritional']['Protein (g)'];
                                                                                                                                                                    } ?>" placeholder="Protien">
                                </div>
                            </div>
                            <div class="row w-75">
                                <div class="col">
                                    <input data-nutri="Fat (g)" name="Fats" required class="form-control input_bar" type="text" class="form-control" placeholder="saturates" value="<?php if ($action == 'editRecipe') {
                                                                                                                                                                                        echo $edit['nutritional']['Fat (g)'];
                                                                                                                                                                                    } ?>" placeholder="Fats">
                                </div>
                                <div class="col">
                                    <input data-nutri="Carbohydrates (g)" required name="Cars" class="form-control input_bar" type="text" class="form-control" placeholder="Carbohydrates" value="<?php if ($action == 'editRecipe') {
                                                                                                                                                                                                        echo $edit['nutritional']['Carbohydrates (g)'];
                                                                                                                                                                                                    } ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input data-nutri="Fibre (g)" name="Fibre" required class="form-control input_bar" type="text" class="form-control" placeholder="Fibres" value="<?php if ($action == 'editRecipe') {
                                                                                                                                                                                        echo $edit['nutritional']['Fibre (g)'];
                                                                                                                                                                                    } ?>">
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="rtab-content ingredient-tab">
                        <div class="add-ingredient">
                            <button class="plus" id="btn_plus2">+</button>
                            <span>Add Ingredients</span>
                        </div>
                        <div class="ingre-icards" id="ingredients_box">
                            <!-- Dont Remove this code it will help in edit page -->
                            <?php if (isset($edit['ingredients'])) :
                                foreach ($edit['ingredients'] as $ingre) : ?>
                                    <div class="icard">
                                        <img src="<?= $DEFAULT_PATH ?>assets/images/salt.svg" alt="" srcset="">
                                        <span class="igre-name"><?= $ingre ?></span>
                                        <input data-ingredient-name="<?= $ingre ?>" data-ingredient="true" checked type="checkbox" name="ingredient[]" id="" value="1" class="input_bar check">
                                    </div>
                            <?php endforeach;
                            endif; ?>


                        </div>
                    </div>
                    <div class="rtab-content direction-tab">
                        <div class="add-actions">
                            <div class="add-direction">
                                <button class="plus" id="btn_plus">+</button>

                                <span>Add Direction</span>
                            </div>
                            <div class="add-video">
                                <button style="background:none;border:none;text-decoration:none" id="url_button">
                                    <div class="upload-url"><img src="<?= $DEFAULT_PATH ?>assets/images/Upload_Url.svg" alt="" srcset="" style="margin-right:0.5rem"><span>Upload URL</span></div>
                                </button>
                            </div>
                        </div>
                        <div class="direction-list">
                            <ul class="direcions" id="direcions">
                                <!-- don't delete this code  -->
                                <?php if (isset($edit['directions'])) :
                                    foreach ($edit['directions'] as $dir) : ?>
                                        <li data-direction="<?= $dir ?>" class="direction">
                                            <?php if (filter_var($dir, FILTER_VALIDATE_URL)) : ?>
                                                <a href="<?= $dir ?>" target="_blank"><?= $dir ?></a>
                                            <?php else : ?>
                                                <?= htmlspecialchars($dir) ?>
                                            <?php endif; ?>
                                        </li>
                                <?php endforeach;
                                endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-------------------------------------- popups------------------------------------------------------------------------------------------------ -->
    <!----Add Direction--->
    <div id="popup1" class="overlay">
        <div class="popup">
            <button class="close-btn" onclick="closePopup('popup1')">
                <img src="<?= $DEFAULT_PATH ?>assets/icons/cancel.svg" alt="Cancel" class="cancel-icon">
            </button>

            <p style="font-size:40px">Add Directions</p>
            <form action="">
                <input type="text" value="" placeholder="Type Directions Here" id="add_direction" class="directions">
            </form>
            <p style="color: #7B62FB;font-size:31px"> Add more Directions</p>
            <button onclick="add_direction()" class="direction_btn">+ Add</button>

        </div>
    </div>
    <div id="popup2" class="overlay">
        <div class="popup" style="padding: 20px 60px !important">
            <button class="close-btn" onclick="closePopup('popup2')">
                <img src="<?= $DEFAULT_PATH ?>assets/icons/cancel.svg" alt="Cancel" class="cancel-icon">
            </button>

            <p style="font-size: 40px">Add Ingredients</p>
            <div class="popup2_wrapper">
                <a href="#" class="plus" style="height: 50px">+</a>
                <div>
                    <form action="">
                        <div class="input-group">
                            <input type="text" value="" placeholder="Name Of the ingredient" id="ingredient_name" class="ingredient">
                            <input type="text" value="" placeholder="Quantity" id="quantity" class="ingredient">
                            <select id="measurementUnit" class="ingredient_select">
                                <option value="grams">gram</option>
                                <option value="kilograms">kilogram</option>
                                <option value="milliliters">milliliter</option>
                                <option value="liters">liter</option>
                                <option value="cups">cup</option>
                                <option value="teaspoons">teaspoon</option>
                                <option value="tablespoons">tablespoon</option>
                                <option value="each">each</option>
                                <option value="dozen">dozen</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <p style="color: #7B62FB; font-size: 31px">Add more Ingredients</p>
            <button onclick="add_ingredient()" class="direction_btn">+ Add</button>
        </div>
    </div>

    <!----Add URL--->
    <div id="popup3" class="overlay">
        <div class="popup">
            <button class="close-btn" onclick="closePopup('popup3')">
                <img src="<?= $DEFAULT_PATH ?>assets/icons/cancel.svg" alt="Cancel" class="cancel-icon">
            </button>

            <p style="font-size:40px">Add Video</p>
            <form action="">
                <input type="text" value="" placeholder="Type URL Here" id="add_video" class="directions">
            </form>
            <button onclick="add_video()" class="direction_btn">Upload</button>
        </div>
    </div>
    <?php require('constant/scripts.php'); ?>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script>
        function updateResult(inputField) {
            var inputValue = inputField.value;
            var totalMinutes = parseDuration(inputValue);

            if (!isNaN(totalMinutes)) {
                var hours = Math.floor(totalMinutes / 60);
                var minutes = Math.round(totalMinutes % 60);

                var formattedResult = '';

                if (hours > 0) {
                    formattedResult += (isNaN(hours) ? '0' : hours) + "hr ";
                }
                if (minutes > 0) {
                    formattedResult += (isNaN(minutes) ? '0' : minutes) + "min";
                }

                inputField.value = formattedResult.trim();
            } else {
                inputField.value = ''; // Clear the input if the value is incorrect
            }
        }

        function parseDuration(duration) {
            var parts = duration.split(":");
            if (parts.length === 2) {
                var hours = parseInt(parts[0]);
                var minutes = parseInt(parts[1]);
                if (!isNaN(hours) && !isNaN(minutes)) {
                    return hours * 60 + minutes;
                }
            }
            return NaN;
        }
    </script>

    <script>
        function validateForm() {
            const recipeName = document.querySelector('[data-name="recipeName"]');
            const recipePrepTime = document.querySelector('[data-name="recipePrepTime"]');
            const recipeCourse = document.querySelector('#recipeCourse');
            const recipeCategory = document.querySelector('#recipeCategory');

            if (recipeName.value.trim() === "") {
                alert("Please fill out the Recipe Name.");
                return false;
            }

            if (recipePrepTime.value.trim() === "") {
                alert("Please fill out the Preparation Time.");
                return false;
            }

            if (recipeCourse.value === "Courses" || recipeCategory.value === "Categories") {
                alert("Please select a valid Course and Category.");
                return false;
            }

            return true; // Allow form submission
        }
    </script>
    <script>
        // Simulate fetched category from PHP
        const fetchedCategory = "<?php echo $edit['category']; ?>";

        // Simulated category options
        const categoryOptions = {
            "breakfast": ["Pancake", "Omelette", "Cereal"],
            "lunch": ["Salad", "Sandwich", "Soup"],
            "snacks": ["Fruit", "Nuts", "Yogurt"],
            "dinner": ["Steak", "Pasta", "Fish"]
        };

        // Initialize the dropdown with the fetched category
        const categoryDropdown = document.getElementById('recipeCategory');
        const initialCategoryOption = document.createElement('option');
        initialCategoryOption.value = fetchedCategory;
        initialCategoryOption.textContent = fetchedCategory;
        categoryDropdown.appendChild(initialCategoryOption);

        // Function to update dropdown options
        function updateCategoryDropdown(selectedCourse) {
            const categories = categoryOptions[selectedCourse] || [];
            const existingOptions = [...categoryDropdown.options].map(option => option.value);

            // Clear existing options and add fetched category
            categoryDropdown.innerHTML = '';
            categoryDropdown.appendChild(initialCategoryOption);

            // Add new options (excluding fetched category)
            categories.forEach(category => {
                if (category !== fetchedCategory && !existingOptions.includes(category)) {
                    const option = document.createElement('option');
                    option.value = category;
                    option.textContent = category;
                    categoryDropdown.appendChild(option);
                }
            });
        }

        // Course dropdown change event listener
        const courseDropdown = document.getElementById('recipeCourse');
        courseDropdown.addEventListener('change', function() {
            const selectedCourse = this.value;
            updateCategoryDropdown(selectedCourse);
        });

        // Trigger initial update based on the fetched course
        courseDropdown.dispatchEvent(new Event('change'));
    </script>
    <script>
        function previewImage(input) {
            var preview = document.getElementById('camera');
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#camera").click(function() {
                $("#recipeImg").trigger('click');
            });
            $('.rtab').click(function() {
                $('.ractive').removeClass('ractive');
                $(this).addClass('ractive');
                $('.rtab-content').hide();
                $('.' + $(this).data('toggle')).show();
            });
            $('#toggle-recipe').trigger('click');
        });


        var modal = document.getElementById("popup1");
        var btn = document.getElementById("btn_plus");

        btn.onclick = function() {
            event.preventDefault();
            modal.style.display = "block";
        }
        var modal2 = document.getElementById("popup2");
        var btn2 = document.getElementById("btn_plus2");
        btn2.onclick = function() {
            event.preventDefault();
            modal2.style.display = "block";
        }
        var modal3 = document.getElementById("popup3");
        var btn3 = document.getElementById("url_button");
        btn3.onclick = function() {
            event.preventDefault();
            modal3.style.display = "block";
        }
    </script>

    <script>
        function add_direction() {
            const node = document.createElement("li");
            node.classList.add("direction_li");
            var text = document.getElementById("add_direction").value;
            const textnode = document.createTextNode(text);
            node.setAttribute('data-direction', text);
            node.appendChild(textnode);
            document.getElementById("direcions").appendChild(node);
            document.getElementById("add_direction").value = "";
            var div = document.getElementById("popup1");
            div.style.display = "none";


        }
        // Add event listener to capture Enter key press in the input field
        document.getElementById("add_direction").addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                event.preventDefault(); // Prevent form submission
                add_direction(); // Call your function to add the direction
            }
        });
        document.getElementById("add_video").addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                event.preventDefault(); // Prevent form submission
                add_video();
            }
        });


        function closePopup(popupId) {
            const popup = document.getElementById(popupId);
            if (popup) {
                popup.style.display = "none";

                // Clear input data
                if (popupId === 'popup1') {
                    document.getElementById("add_direction").value = '';
                } else if (popupId === 'popup2') {
                    document.getElementById("ingredient_name").value = '';
                    document.getElementById("quantity").value = '';
                    // Clear measurement unit dropdown
                    document.getElementById("measurementUnit").selectedIndex = 0;
                } else if (popupId === 'popup3') {
                    document.getElementById("add_video").value = '';
                }
            }
        }

        function add_video() {
            const videoInput = document.getElementById("add_video").value;
            if (videoInput.trim() === "") {
                return; // Do nothing if the input is empty
            }

            const videoLink = document.createElement("a");
            videoLink.href = videoInput;
            videoLink.textContent = "Uploaded URL";
            videoLink.style.textDecoration = "none";
            videoLink.style.color = "#D257E6"; 
            videoLink.style.fontWeight = "bold";

            const directionsList = document.getElementById("direcions"); // Note: "direcions" is a typo, should be "directions"
            if (directionsList) {
                const listItem = document.createElement("li");
                listItem.appendChild(videoLink);
                listItem.classList.add("direction_li");
                listItem.setAttribute('data-direction', videoInput);
                // Append the new video hyperlink to the directions list
                directionsList.appendChild(listItem);
            }

            // Clear the input field and close the popup
            document.getElementById("add_video").value = "";
            const div3 = document.getElementById("popup3");
            div3.style.display = "none";
        }

        document.querySelectorAll(".input_bar").forEach(input => {
            input.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault(); // Prevent form submission
                    // Do not open popup2 on Enter key press
                    return;
                }
            });
        });

        function add_ingredient() {
            const div = document.getElementById("ingredients_box");
            const icard = document.createElement("div");
            const ingredient_name = document.getElementById("ingredient_name");
            const quantity = document.getElementById("quantity");
            const measurementUnit = document.getElementById("measurementUnit"); // Get the measurement unit dropdown

            if (ingredient_name.value == "" || quantity.value == "") {
                // console.log('snskjc');
                ingredient_name.style.border = "1px solid red";
                quantity.style.border = "1px solid red";
                return;
            }

            const ingredientWithUnit = `${quantity.value} ${measurementUnit.value}`; // Combine quantity and unit

            icard.classList.add("icard");
            icard.innerHTML = `
        <img src="<?= $DEFAULT_PATH ?>assets/images/salt.svg" alt="" srcset="">
        <span class="igre-name">${ingredient_name.value}</span>
        <span class="igre-amount">${ingredientWithUnit}</span>
        <input data-ingredient-name="${ingredient_name.value} ${ingredientWithUnit}" data-ingredient="true" checked type="checkbox" name="ingredient[]" id="" value="1" class="input_bar check">
    `;

            div.appendChild(icard);
            ingredient_name.value = "";
            quantity.value = "";
            const div2 = document.getElementById("popup2");
            div2.style.display = "none";
            checkBoxEvent();
        }


        // function add_video() {
        //     const div3 = document.getElementById("popup3");
        //     div3.style.display = "none";
        // }

        function checkBoxEvent() {
            const allCheckBoxs = document.querySelectorAll('[data-ingredient]');
            // console.log(allCheckBoxs);
            allCheckBoxs.forEach(element => {
                element.addEventListener('click', () => {
                    if (element.checked) {
                        element.setAttribute('data-ingredient', true);
                    } else {
                        element.setAttribute('data-ingredient', false);
                    }
                });
            });
        }
        checkBoxEvent();

        const submit_btn = document.getElementById('submit_btn');


        submit_btn.addEventListener('click', () => {
            const actionInput = document.getElementById('action');
            const allIngredient = document.querySelectorAll('[data-ingredient-name]');
            const recipeDetails = document.querySelectorAll('[data-name]');
            const recipeName = document.querySelector('[data-name="recipeName"]');
            const recipeTime = document.querySelector('[data-name="recipePrepTime"]');
            const recipeCourse = document.querySelector('#recipeCourse');
            const recipeCategory = document.querySelector('#recipeCategory');
            const recipeNutri = document.querySelectorAll('[data-nutri]');
            const recipeDirections = document.querySelectorAll('[data-direction]');
            const recipeImg = document.querySelector('#recipeImg');
            const file = recipeImg.files[0];

            const finalJson = {};

            ingredientArray = [];
            allIngredient.forEach(i => {
                if (i.checked) {
                    const ingre = i.getAttribute('data-ingredient-name');
                    ingredientArray.push(ingre);
                }
            });
            nutriArray = {};
            recipeNutri.forEach(nut => {
                const nutri = nut.getAttribute('data-nutri');
                nutriArray[nutri] = nut.value;
            });

            const directionArray = [];
            recipeDirections.forEach(d => {
                const direction = d.getAttribute('data-direction');
                directionArray.push(direction);
            });
            const videoInput = document.getElementById("add_video").value;
            if (videoInput.trim() !== "") {
                directionArray.push(videoInput); // Add video URL to the directions
            }

            const directionsString = `{${directionArray.join('},{')}}`;


            //console.log(directionArray);

            // console.log(JSON.stringify(nutriArray));

            //console.log(ingredientArray);

            const form = $('<form action="" method="post" enctype="multipart/form-data"></form>');
            if (actionInput.value === "createRecipe") {
                form.append(`<input type="hidden" name="add" value="true">`);
            } else if (actionInput.value === "editRecipe") {
                form.append(`<input type="hidden" name="edit" value="true">`);
            }
            form.append(`<input type="hidden" name="recipeName" value="${recipeName.value}">`);
            form.append(`<input type="hidden" name="recipeCourse" value="${recipeCourse.value}">`);
            form.append(`<input type="hidden" name="recipeCategory" value="${recipeCategory.value}">`);
            form.append(`<input type="hidden" name="recipeTime" value="${recipeTime.value}">`);
            form.append(`<input type="hidden" name="nutriDetails" value='${JSON.stringify(nutriArray)}'>`);
            form.append(`<input type="hidden" name="recipeDirections" value='${directionsString}'>`);
            form.append(`<input type="hidden" name="recipeingredients" value='${JSON.stringify(ingredientArray)}'>`);

            if (file) {
                form.append(recipeImg); // Append the file input
            }
            $('body').append(form);
            form.submit();

        });
    </script>
</body>

</html>
