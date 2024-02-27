<?php include('navbar.php');
$sql = "SELECT * FROM `dietitian_recipes` WHERE dietitian_id = '{$_SESSION['dietitian_id']}' AND recipe_courses = 'dinner'";
// $sql2 = "SELECT dr.* FROM `default_recipes` dr LEFT JOIN `updated_by_users` ubu ON dr.`drecipe_id` = ubu.`updated_drecipe_id`AND ubu.`dietitian_id`='{$_SESSION['dietitian_id']}' WHERE ubu.`updated_drecipe_id` IS NULL AND ubu.`dietitian_id` IS NULL AND drecipe_course = 'dinner'";
if (isset($_SESSION['dinner_recipe_search'])) {
    $dinnerRecipeSearch = $_SESSION['dinner_recipe_search'];
}
if (isset($_POST['search_btn'])) {
    if (!empty($_POST['search_query'])) {
        $dinnerRecipeSearch = $_POST['search_query'];
    }
    unset($_SESSION['dinner_recipe_search']);
}
if (!empty($dinnerRecipeSearch)) {
    $sql .= " AND recipe_name LIKE '%$dinnerRecipeSearch%'";
    $sql2 .= " AND drecipe_name LIKE '%$dinnerRecipeSearch%'";
}
$res = mysqli_query($conn, $sql);
// $res2 = mysqli_query($conn, $sql2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Recipe Dinner</title>

    <style>
        body {
            font-family: "NATS", sans-serif !important;
            letter-spacing: 1px;
            font-weight: 400;
            position: relative;
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

        .header {
            display: flex;
            flex-direction: row !important;
            margin: 10px;
            margin-left: 20px;
            justify-content: space-between;
            letter-spacing: 0em;
        }

        .searchbox {
            width: auto;
            width: 360px;
            height: 45px;
            background: #ffffff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            padding: 10px;
            display: flex;
            align-items: center;
        }
        .ellipsis{
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

        .card {
            background: #FFFFFF;
            border-radius: 15.8334px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
            margin: 20px;
        }

        .card-upper-text {
            /* font-size: 20px; */
            font-weight: bold;
            padding: 5px 10px;
            background-color: #FEA945;
            box-shadow: 0px 0px 25px rgba(255, 255, 255, 0.75);
            border-radius: 8px;
            color: white;
            font-weight: 500;
            font-size: 15px;
            line-height: 18px;
        }

        .card-food {
            font-size: 23px;
            font-weight: 500;
            line-height: 27px;
            letter-spacing: -0.11428570002317429px;
            text-align: left;
            margin-top: -10px;
        }

        .card-calorie {
            font-size: 18px;
            font-weight: 400;
            line-height: 12px;
            letter-spacing: 0em;
            text-align: left;
            align-items: center;
            display: flex;
            color: #A3A1A1;
            margin-top: 10px !important;
        }

        .card-num-circle {
            background: #9C74F5;
            border-radius: 50%;
            color: white;
            padding: 7px;
            width: 25px;
            height: 25px;
            padding-top: 5px;
        }

        .card-num {
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 18px;
            color: #9C74F5;
        }

        .recipe-container {
            display: flex;
            flex-wrap: wrap;
            gap: 35px;
            padding-left: 70px;
            padding-top: 25px;
        }

        .flex.row {
            --bs-gutter-x: 0rem;
        }

        @media screen and (max-width:945px) {
            .header {
                flex-direction: column !important;
            }

        }
        @media screen and (min-width: 879px) and (max-width:1500px) {
            .row{
                margin-left: 200px !important;
            }
        }

        @media screen and (min-width: 720px) and (max-width:1500px) {
            .heading {
                justify-content: flex-start !important;
            }
            .header h4 {
                margin-top: 39px;
            }
            .searchbox {
                margin-left: 50px !important;
                margin-top: 10px;
                width: 350px;
                margin-bottom: 20px;
            }

            .category {
                display: flex;
                flex-direction: row;
                overflow-x: auto;
            }

            .container1 {
                left: 30px;
                gap: 40px;
            }

            .row {
                margin: 20px  !important;
            }

            .card-food {
                font-size: 23px;
                font-weight: 500;
                line-height: 20px;
                min-width: 180px;
                margin-bottom: 5px;
            }

            .card-calorie {
                margin-top: 5px;
            }

            .dropdown-content {
                left: -120px;
                top: -40px;
            }

            .butt {
                background: #9C74F5;
                border: 0px;
                color: white;
                border-radius: 50%;
                position: absolute;
                bottom: 20px;
                right: 25px;
                margin-top: 20px;
                width: 85px;
                height: 85px;
                font-size: 40px;
            }
        }

        @media screen and (min-width:0px) and (max-width:720px) {
            .searchbox {
                margin-left: 60px;
            }

            .category {
                display: flex;
                flex-direction: row;
                overflow-x: auto;
                margin: 10px auto !important;
            }

            .heading {
                justify-content: flex-start !important;
                margin-left: 20px;
            }

            .header {
                flex-direction: column !important;
            }

            .container1 {
                grid-template-columns: auto auto auto auto;
                left: -1px;
                margin-right: 420px;
                gap: 50px;
            }

            .recipe {
                margin-left: -200px;
            }

            .middle_wrapper a {
                margin-top: 10px;
            }

            .middle_wrapper {
                margin: 20px auto !important;
            }

            .card {
                margin: 20px 20px!important;
            }

            .row {
                margin: auto !important;
            }

            .card-food {
                font-size: 21.5px;
                font-weight: 500;
                line-height: 20px;
                min-width: 180px;
                margin-bottom: 5px;
            }

            .card-calorie {
                margin-top: 5px;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                margin-top: 0px;
                background-color: #f9f9f9;
                min-width: 150px;
                left: -100px;
            }

            .butt {
                position: absolute !important;
                right: 0 !important;
                bottom: 0 !important;
            }

        }
        @media screen and (min-width:721px) and (max-width:999px) { 
            .row{
                justify-content: center;
            }
        }
        @media screen and (min-width:1100px) and (max-width:1375px) { 
            .row{
                padding-left: 10vw;
            }
        }

        @media screen and (min-width:300px) and (max-width:699px) { 
            .row{
                justify-content: center;
            }
        }
        @media screen and (min-width:300px) and (max-width:340px){
    .card{
        width: 300px !important;
        margin-left:10px !important;
        margin-right:10px !important;
    }
   
    }@media screen and (min-width:0px) and (max-width:400px){
    .searchbox{
        width:270px;
    }
    }
        @media screen and (min-width:300px) and (max-width:400px) {
            .butt {
                position: absolute !important;
                right: 0 !important;
                bottom: 0 !important;
            }

            input[type=search] {
                width: 50% !important;
            }

            h3.recipe {
                margin-left: -20px !important;
            }

            .middle_wrapper {
                margin-left: 3rem !important;
            }
        }
        .popupholder{
    display: none;
    top: 0;
    position: fixed;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.569);
    transition: opacity 500ms;
    justify-content: center;
    align-items: center;
    z-index:10;
}
    </style>
</head>

<body>
    <div class="header" style="align-items:center;">
        <div class="title" style="font-size:40px;margin-left:2.8rem;margin-top:1.2rem;font-family:'NATS'; font-weight:400;">Recipes
            <small style="color: #787885; font-size:20px; margin-left:1rem;">All Dinner Recipes</small>
        </div>
        <div style="margin-right:2rem;display:flex;gap:1.5rem">
            <div class="searchbox">
                <form method="post">
                    <button style="background-color:white;border:none;" id="search-btn" name="search_btn"><img src="<?= $DEFAULT_PATH ?>assets/images/search_recipe.svg" alt=""></button>
                    <input type="search" name="search_query" placeholder="Search" style="outline:none;border:none;font-size:20px;margin-left:1rem; width:80%;" value="<?php if (!empty($dinnerRecipeSearch)) {
                                                                                                                                                                            echo $dinnerRecipeSearch;
                                                                                                                                                                        } ?>">
                </form>
            </div>
        </div>
    </div>
    <div class="popupholder">
        <?php include("namehover.php"); ?>
    </div>
    <div class="flex row">
        <?php while ($d = mysqli_fetch_assoc($res)) {
            $recipeDirections = trim($d['recipe_recipe'], '{}');
            $recipe_recipe = explode('},{', $recipeDirections);
            $steps = !empty($recipeDirections) && $recipeDirections !== '{}' ? count($recipe_recipe) : 0;
            $nutritional = json_decode($d['recipe_nutritional_information'], true);
            $temp_data=array("recipe_name"=>$d['recipe_name'],"recipe_nutritional_information"=>$d['recipe_nutritional_information'],"recipe_img"=>$d['recipe_img']);

        ?>
            <div class="card d-flex" style="padding:15px; width:310px; border-radius:16px;height:238px;margin:35px 35px;">
                <div class="card-upper d-flex justify-content-between">
                    <p id="bu" class="card-upper-text"> Added Recipe </p>
                    <p id="bu" class="card-upper-text"><img src="<?= $DEFAULT_PATH ?>assets/images/Clock.svg" style="margin-right:10px"> <?php echo $d['recipe_time']; ?> </p>
                </div>
                <div class="img-dis" style="width:100%; text-align:center;">
                    <?php if ($d['recipe_img'] != "") {
                        $imgSrc = $DEFAULT_PATH . "uploads/recipe/" . $d['recipe_img'];
                    } else {
                        $imgSrc = $DEFAULT_PATH . "assets/images/Dinner.svg";
                    } ?>
                    <img src="<?= $imgSrc ?>" style="height:116px; width:160px; object-fit:cover;margin-top:-10px; margin-bottom: 8px;" />
                </div>
                <div class="d-flex justify-content-between">
                    <p class="card-food ellipsis" onmouseover='toggleShowHide(stuff=<?= json_encode($temp_data)?>)' onmouseout='toggleShowHide(stuff=<?= json_encode($temp_data)?>)'><?php echo $d['recipe_name'] ?></p>
                    <div class="header">
                        <div class="dropdown ">
                            <div id="myDropdownIcon" class="dropbtn" onclick="showDropdown(event)">
                                <img class="" src="<?= $DEFAULT_PATH ?>assets/images/vertical-three-dots.svg" alt="" style="margin-top:-40px">
                            </div>

                            <div id="myDropdownContent" class="dropdown-content dropdown-card " style="display:none;">
                                <a style="color: white;" class="edit-button" href="create_recipe.php?recipe_id=<?= $d['recipe_id'] ?>&action=editRecipe&isDefault=false">Edit</a>
                                <a style="color: white;" class="delete-button" href="deleteRecipe.php?recipeId=<?= $d['recipe_id'] ?>&isDefault=false">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between" style="align-items:center;margin-top:-30px;">
                    <p class="card-calorie"> <img src="<?= $DEFAULT_PATH ?>assets/images/Calorie.svg" alt=""> <?php echo $nutritional['Calories'] ?>
                        kcal</p>
                    <div class="d-flex align-items-center card-num">
                        <div class="card-num-circle"><?= $steps ?> </div> &nbsp;
                        <div class="">steps</div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php 
        // while ($d = mysqli_fetch_assoc($res2)) {
        //     $drecipeDirections = trim($d['drecipe_recipe'], '{}');
        //     $drecipe_recipe = explode('}, {', $drecipeDirections);
        //     $steps = count($drecipe_recipe);
        //     $nutritional = json_decode($d['drecipe_nutritional_information'], true);
        //     $temp_data=array("drecipe_name"=>$d['drecipe_name'],"recipe_nutritional_information"=>$d['drecipe_nutritional_information']);

        ?>
            <!-- <div class="card d-flex" style="padding:15px; width:310px; border-radius:16px;height:238px;margin:35px 35px;">
                <div class="card-upper d-flex justify-content-between">
                    <p id="bu" class="card-upper-text"> Default Recipe </p>
                    <p id="bu" class="card-upper-text"><img src="<?= $DEFAULT_PATH ?>assets/images/Clock.svg" style="margin-right:10px"> <?php echo $d['drecipe_time']; ?> </p>
                </div>
                <div class="img-dis" style="width:100%; text-align:center;">
                    <img src="<?= $DEFAULT_PATH ?>assets/images/Dinner.svg" style="height:116px; width:160px; object-fit:cover;margin-top:-10px; margin-bottom: 8px;" />
                </div>
                <div class="d-flex justify-content-between">
                    <p class="card-food ellipsis" onmouseover='toggleShowHide(stuff="",dstuff=<?=json_encode($d)?>)' onmouseout='toggleShowHide(stuff="",dstuff=<?=json_encode($d)?>)'><?php echo $d['drecipe_name'] ?></p>
                    <div class="header">
                        <div class="dropdown ">
                            <div id="myDropdownIcon" class="dropbtn" onclick="showDropdown(event)">
                                <img class="" src="<?= $DEFAULT_PATH ?>assets/images/vertical-three-dots.svg" alt="" style="margin-top:-40px">
                            </div>

                            <div id="myDropdownContent" class="dropdown-content dropdown-card " style="display:none;">
                                <a style="color: white;" class="edit-button" href="create_recipe.php?recipe_id=<?= $d['drecipe_id'] ?>&action=editRecipe&isDefault=true">Edit</a>
                                <a style="color: white;" class="delete-button" href="deleteRecipe.php?recipeId=<?= $d['drecipe_id'] ?>&isDefault=true">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between" style="align-items:center;margin-top:-30px;">
                    <p class="card-calorie"> <img src="<?= $DEFAULT_PATH ?>assets/images/Calorie.svg" alt=""> <?php echo $nutritional['Calories'] ?>
                        kcal</p>
                    <div class="d-flex align-items-center card-num">
                        <div class="card-num-circle"><?= $steps ?> </div> &nbsp;
                        <div class="">steps</div>
                    </div>
                </div>
            </div> -->
        <?php //} ?>
        <a class="butt" href="create_recipe.php" style="border-radius:50%;background-color:#9C74F5;width:85px;height:85px;filter: drop-shadow(0px 0px 68px rgba(0, 0, 0, 0.3));color:white;font-size:60px;border:none;position:fixed;right:50px;bottom:60px;display:flex;justify-content:center;align-items:center;box-shadow:0px 0px 30px 0px #9C74F5;">+</a>
    </div>


    <?php require('constant/scripts.php'); ?>
    <script>
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
        const toggleShowHide=(stuff="",dstuff="")=>{
            let hover_img = document.getElementsByClassName('hover-img')[0];
            let aloo_paratha = document.getElementsByClassName("aloo-paratha")[0];
            let maindiv = document.getElementsByClassName("main-div2")[0];
            const popholder = document.getElementsByClassName("popupholder")[0];
            if (popholder.style.display!="block"){
                popholder.style.display = "block";
                if (typeof stuff === 'object' && typeof dstuff==='string'){
                    const arr = Array("Calories","Protein (g)","Carbohydrates (g)","Fibre (g)")
                    let i = 0;
                    const details = JSON.parse(stuff["recipe_nutritional_information"]);
                    Array.from(maindiv.children).forEach(element => {
                        if (details[arr[i]]==""){
                            element.firstElementChild.innerHTML= 0;
                        }else{
                            element.firstElementChild.innerHTML=details[arr[i]];
                        }
                        i++;
                    });
                    aloo_paratha.innerHTML=stuff["recipe_name"];
                    if (stuff['recipe_img']!=="" && stuff['recipe_img']!==null){
                        hover_img.src = "<?=$DEFAULT_PATH?>uploads/recipe/"+stuff['recipe_img'];
                    }else{
                        hover_img.src = "<?=$DEFAULT_PATH?>assets/images/Dinner.svg"
                    }
                    
                }
                if (typeof dstuff==='object' && typeof stuff==='string'){
                    const arr = Array("Calories","Protein (g)","Carbohydrates (g)","Fibre (g)")
                    let i = 0;
                    const details = JSON.parse(dstuff["drecipe_nutritional_information"]);
                    Array.from(maindiv.children).forEach(element => {
                        if (details[arr[i]]==""){
                            element.firstElementChild.innerHTML= 0;
                        }else{
                            element.firstElementChild.innerHTML=details[arr[i]];
                        }
                        i++;
                    });
                    aloo_paratha.innerHTML=dstuff["drecipe_name"];
                    hover_img.src = "<?=$DEFAULT_PATH?>assets/images/Dinner.svg"
                }
                // document.body.style = " background: rgba(0, 0, 0, 0.03579);transition: opacity 500ms;";
            }else{
                popholder.style.display = "none";
                // document.body.style = " background: none;transition: none";
            }
        }
    
    </script>

</body>

</html>
