<?php 
    include('navbar.php');
    require('constant/config.php')?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require('constant/head.php');?>
    <title>Infits | Create_Recipe</title>
    <style>
        body{
            font-family: 'NATS';
        }
        .cheader{
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        } 
        .cheader span{
            font-style: normal;
            font-weight: 400;
            font-size: 44px;
            color: #000000;
        }
        .btn-save{
            height:46px;
            width:151px;
            background:#D257E6; 
            color:white;
            text-align:center; 
            border:none;
            border-radius:15px;
            box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
            font-size: 24px;
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
            justify-content: center;
            align-items: center;
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
            color: rgb(0, 0, 0,0.6);
            cursor: pointer;
        }
        .ractive{
            background: #D257E6;
            color: #fff;
        }
        .rtab-content-group {
            width: 80%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-bottom: 500px;
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
        span.plus {
            border: 2px solid;
            font-size: 50px;
            font-weight: 600;
            padding: 15px;
            line-height: 15px;
            border-radius: 10px;
            color: #BD59EB;
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
            gap: 40px;
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
        .input_bar{
            background: #FFFFFF;
box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
border-radius: 10px;
        }
        @media screen and (max-width: 720px){
            .rtab-content-group {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
           
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
            
            padding:0 ;
        }
        .ingre-icards {
            display: flex;
           
            flex-direction: column;
            gap:2rem;
            justify-content: center;
    align-items: center;
            
        }
        }
    </style>
  </head>
  <body>
     <?php
     if(isset($_GET['action'])){
        $action = $_GET['action'];
     }else{
        $action = 'createRecipe';
     }
        // $rid = $_POST['RID'];  
        // $tableName = isset($_POST['tableName']); 
        //   if(!$rid || $rid == null){   // check weather id is present or not...
        //         session_start();
        //         $_SESSION['NoID'] = "Oops! need recipes id to edit.";
        //         return;
        //     }  
        //     if($tableName == 'default'){
        //         $sql= "select * from `default_recipes` where `drecipe_id` = '$rid'";                
        //     }else{
        //         $sql= "select * from `custom_recipes` where `drecipe_id` = '$rid'";
        //     }
        //     $result = $conn ->query($sql);
        //     if($result ->num_rows > 0){
        //       while($row= $result ->fetch_assoc()){
        //         $ingredient = json_decode($row['drecipe_nutritional_information'],true);
        //         $Rname =  $row['drecipe_name'];                           
        //         $category =   $row['drecipe_category'];
        //     }}

            // update or edit recipe code start here...
            if(isset($_POST['editRcp'])){
                $rname = $_POST['recipeName'];
                $name1 = $_POST['name1'];
                echo $rname.$name1;
                $Calories = $_POST['Calories'];
                $fat = $_POST['fat'];
                $saturates = $_POST['saturates'];
                $Carbohydrates = $_POST['Carbohydrates'];
                $sugars = $_POST['sugars'];
                $Fibre = $_POST['Fibre'];
                $Protein = $_POST['Protein'];
                $Salt = $_POST['Salt'];
                $category = $_POST['category'];
                $obj = array(
                    'Calories'=>$Calories,
                    'Fat (g)'=>$fat,
                    'of which saturates (g)'=>$saturates,
                    'Carbohydrates (g)'=>$Carbohydrates,
                    'of which sugars (g)' => $sugars,
                    'Fibre (g)' => $Fibre,
                    'Protein (g)' => $Protein,
                    'Salt (mg)' => $Salt,
                );
                $nutritionData = json_encode($obj);
                $sql = "UPDATE `custom_recipes` set `drecipe_name` = '$name1',`drecipe_category` = '$category', `drecipe_nutritional_information` = '$nutritionData' where `drecipe_id` = '$rid'";
                if($conn -> query($sql)==true){
                   echo '<div class="alert alert-primary" role="alert" style="text-align:center;">
                        Recipes Updated;
                      </div>';
                    } else {
                    echo  '<div class="alert alert-primary" role="alert" style="text-align:center;">
                        Recipes not updated;
                      </div>';
                 }
            }

            // add new recipe code start here...
            if(isset($_POST['saveRec'])){
                $rname = $_POST['recipeName'];
                $name1 = $_POST['name1'];
                $Calories = $_POST['Calories'];
                $fat = $_POST['fat'];
                $saturates = $_POST['saturates'];
                $Carbohydrates = $_POST['Carbohydrates'];
                $sugars = $_POST['sugars'];
                $Fibre = $_POST['Fibre'];
                $Protein = $_POST['Protein'];
                $Salt = $_POST['Salt'];
                $category = $_POST['category'];
                $obj = array(
                    'Calories'=>$Calories,
                    'Fat (g)'=>$fat,
                    'of which saturates (g)'=>$saturates,
                    'Carbohydrates (g)'=>$Carbohydrates,
                    'of which sugars (g)' => $sugars,
                    'Fibre (g)' => $Fibre,
                    'Protein (g)' => $Protein,
                    'Salt (mg)' => $Salt,
                );
                $nutritionData = json_encode($obj);
                $Newsql = "INSERT INTO `custom_recipes` (drecipe_name,drecipe_category,drecipe_nutritional_information) VALUES ('$rname','$category','$nutritionData')";
                if($conn -> query($Newsql)==true){
                    echo '<div class="alert alert-primary" role="alert" style="text-align:center;">
                        Recipes Updated;
                      </div>';
                    } else {
                    echo  '<div class="alert alert-primary" role="alert" style="text-align:center;">
                        Recipes not updated;
                      </div>';
                    }
                }
    ?>
    <form action="" method="post">
        <div id="content" class="container-fluid">
            <div class="row">
                <div class="col cheader d-flex justify-content-between">
                    <span>New Recipe</span>
                    <button name='<?=$action?>' type="submit" id='submit_btn' class="btn btn-save"><?php if($action == 'createRecipe'){ echo "Save";} else { echo "Edit";}?></button>
                </div>
            </div>
            <div class="ctop">
                <div class="left uploadImg">
                    <img src="<?=$DEFAULT_PATH?>assets/images/camera.svg" alt="" id="camera" style="width:60%">
                    <input type="file"  id="recipeImg" style="display:none"  name="recipeImg">
                </div>
                <div class="right">
                    <input class="form-control" style="border:none;font-size:30px" type="text" value="<?php if($action == 'editRecipe')echo $edit['name']; ?>" name="recipeName" id="" placeholder="Recipe Name">
                    <span style="font-size:20px">(auto sync)</span>
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
                                    <input class="form-control input_bar" type="text" class="form-control" placeholder="Recipe Name" value="<?php if($action == 'editRecipe'){echo $edit['name'];} ?>">
                                </div>
                                <div class="col dropdown-container" >
                                <select name="courses" id="" class="form-control input_bar" style="color: #212529 !important"  placeholder="Courses">
                                <?php if($action == 'editRecipe'){echo "<option value='{$edit['course']}'>{$edit['course']}</option>";} ?>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Lunch">Lunch</option>
                                <option value="Snack">Snack</option>
                                <option value="Dinner">Dinner</option>
                                </select>
                                </div>
                            </div>
                            <div class="row w-100">
                            <div class="col dropdown-container" >
                                <select name="category" id="" class="form-control input_bar" style="color: #212529 !important" placeholder="Categories">
                                <?php if($action == 'editRecipe'){echo "<option value='{$edit['category']}'>{$edit['category']}</option>";} ?>
                                <option value="Breakfast">Pancake</option>
                                <option value="Lunch">Juice</option>
                                <option value="Snack">Butter Bread</option>
                                <option value="Dinner">Waffle</option>
                                </select>
                                </div>
                                <div class="col">
                                    <input name="Preparationtime" class="form-control input_bar" type="text" class="form-control" placeholder="Preparation Time" >
                                </div>
                            </div>
                            
                            <h3 class="text-center">Nutritional Details</h3>
                            <div class="row w-75">
                                <div class="col">
                                    <input name="Calories" class="form-control input_bar" type="text" class="form-control" placeholder="Calories" value="<?php if($action == 'editRecipe'){echo $edit['calories'];} ?>">
                                </div>
                                <div class="col">
                                    <input name="Protien" class="form-control input_bar" type="text" class="form-control" value="<?php if($action == 'editRecipe'){echo $edit['Protin'];} ?>" placeholder="Protien">
                                </div>
                            </div>
                            <div class="row w-75">
                                <div class="col">
                                    <input name="Fats" class="form-control input_bar" type="text" class="form-control" placeholder="saturates" value="<?php if($action == 'editRecipe'){echo $edit['name'];} ?>" placeholder="Fats">
                                </div>
                                <div class="col">
                                    <input name="Cars" class="form-control input_bar" type="text" class="form-control" placeholder="Cars" value="<?php if($action == 'editRecipe'){echo $edit['name'];} ?>">
                                     <input name="RID" hidden  type="text"   value="<?php echo $rid; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rtab-content ingredient-tab">
                       <div class="add-ingredient">
                            <span class="plus">+</span>
                            <span>Add Ingredients</span>
                       </div>
                       <div class="ingre-icards">
                            <div class="icard">
                                <img src="<?=$DEFAULT_PATH?>assest/images/salt.svg" alt="" srcset="">
                                <span class="igre-name">Salt</span>
                                <span class="igre-amount">1/4 table Spoon</span>
                                <input type="checkbox" name="ingredient[]" id="" value="1" class="input_bar">
                            </div>
                            <div class="icard">
                                <img src="<?=$DEFAULT_PATH?>assest/images/salt.svg" alt="" srcset="">
                                <span class="igre-name">Salt</span>
                                <span class="igre-amount">1/4 table Spoon</span>
                                <input type="checkbox" name="ingredient[]" id="" value="1" class="input_bar">
                            </div>
                       </div>
                    </div>
                    <div class="rtab-content direction-tab">
                        <div class="add-actions">
                            <div class="add-direction">
                                <span class="plus">+</span>
                                <span>Add Direction</span>
                            </div>
                            <div class="add-video">
                                <div class="upload-url"><img src="<?=$DEFAULT_PATH?>assest/images/UploadUrl.svg" alt="" srcset=""><span>Upload URL</span></div>
                            </div>
                        </div>
                        <div class="direction-list">
                            <ul class="direcions">
                                <li class="direction">In a large bowl, mix all-purpose flour, whole wheat flour, salt, baking powder and sugar. </li>
                                <li class="direction">In a large bowl, mix all-purpose flour, whole wheat flour, salt, baking powder and sugar. </li>
                                <li class="direction">In a large bowl, mix all-purpose flour, whole wheat flour, salt, baking powder and sugar. </li>
                                <li class="direction">In a large bowl, mix all-purpose flour, whole wheat flour, salt, baking powder and sugar. </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

<?php require('constant/scripts.php');?>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script>
    $(document).ready(function() {        
        $("#camera").click(function() {
            $("#recipeImg").trigger('click');
        });
        $('.rtab').click(function(){
            $('.ractive').removeClass('ractive');
            $(this).addClass('ractive');
            $('.rtab-content').hide();
            $('.' + $(this).data('toggle')).show();
        });
        $('#toggle-recipe').trigger('click');
    });
    </script>
  </body>
</html>