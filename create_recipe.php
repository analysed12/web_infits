<?php 
session_start();
require('constant/config.php');
if(isset($_POST['add'])){
    global $conn;
    $query = "INSERT INTO `dietitian_recipes`( `dietitian_id`, `dietitianuserID`, `recipe_name`, `recipe_ingredients`, `recipe_recipe`, `recipe_nutritional_information`, `recipe_category`) VALUES ('{$_SESSION['dietitian_id']}','{$_SESSION['dietitianuserID']}','{$_POST['recipeName']}','{$_POST['recipeingredients']}','{$_POST['recipeDirections']}','{$_POST['nutriDetails']}','{$_POST['recipeCourse']}')";
    $conn->query($query);

    $query = "SELECT recipe_id FROM dietitian_recipes ORDER BY lastupdate DESC LIMIT 1";
    $result = $conn->query($query);
    $newRecipeId = $result->fetch_assoc()['recipe_id'];
    if(isset($_GET['action']) && $_GET['action'] == 'editRecipe'){
        if($_GET['isDefault'] == true){
            $query = "SELECT * FROM default_recipes WHERE drecipe_id = '{$_GET['recipe_id']}'";
            $result = $conn->query($query);
            $isDeleted = $result->fetch_assoc()['isDeleted'];
            $toAdd = array();
            if($isDeleted == ''){
                $toAdd = array(
                    "{$_SESSION['dietitian_id']}"
                );
                $toAdd = json_encode($toAdd);
            }else{
                $isDeleted = json_decode($isDeleted,true);
                array_push($isDeleted,$_SESSION['dietitian_id']);
                $toAdd = json_encode($isDeleted);
            }
            $query = "UPDATE default_recipes SET isDeleted = '$toAdd' WHERE drecipe_id = '{$_GET['recipe_id']}'";
            $conn->query($query);
        }
    }
    header("Location:create_recipe.php?recipe_id={$newRecipeId}&action=editRecipe&isDefault=false");
}
include('navbar.php');

    
?>

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
        ::placeholder {
        color: #AEAEAE;
        padding: 10px;
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
        .input_bar{
            background: #FFFFFF;
box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
border-radius: 10px;
        }
       
        @media screen and (max-width: 1200px){
            .popup {
            margin-left: 10% !important;
            margin-right: 10% !important;
            width: auto !important;
        }

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
        
        .directions{
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
       display:none;
    }

    .popup {
        margin: 290px;
margin-left: 550px;
padding: 20px;
background: #fff;
box-shadow: 0px 0px 34.0377px rgba(0, 0, 0, 0.25);
border-radius: 25.5283px;
width: 400px;
position: relative;
transition: all 5s ease-in-out;
display:flex;
flex-direction: column;
align-items: center;
justify-content: center;
gap:0.5rem;
    }
.directions{
    background: #FFFFFF;
border: 1.74869px solid #D4D4D4;
border-radius: 10px;
width: 350.43px;
height: 57.71px;
}
.ingredient{
    background: #FFFFFF;
border: 1.74869px solid #D4D4D4;
border-radius: 10px;
width: 300.43px;
height: 57.71px; 
}
.direction_btn{
    background: #A85CF1;
border-radius: 10px;
color:white;
padding: 1% 10%;
border:none;
font-size: 30px;


}
.popup2_wrapper{
    display:flex;
    gap:1rem;
    align-items: center;
}
.direction_li{
    padding-bottom: 12px;
}
.dropdown-container{
    margin-left:0;
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

    if($action == 'editRecipe'){
        global $conn;
        if($_GET['isDefault']== 'true'){
            $query = "SELECT * FROM `default_recipes` WHERE drecipe_id = '{$_GET['recipe_id']}'";
            $result = $conn->query($query);
            $data = $result->fetch_assoc();
            $edit['name'] = $data['drecipe_name'];
            $edit['ingredients'] = json_decode($data['drecipe_ingredients'],true);
            $edit['directions'] = json_decode($data['drecipe_recipe'],true);
            $edit['nutritional'] = json_decode($data['drecipe_nutritional_information'],true);
            $edit['course'] = $data['drecipe_category'];
            $edit['category'] = $data['drecipe_category'];
        }else{
            $query = "SELECT * FROM `dietitian_recipes` WHERE recipe_id = '{$_GET['recipe_id']}'";
            $result = $conn->query($query);
            $data = $result->fetch_assoc();
            $edit['name'] = $data['recipe_name'];
            $edit['ingredients'] = json_decode($data['recipe_ingredients'],true);
            $edit['directions'] = json_decode($data['recipe_recipe'],true);
            $edit['nutritional'] = json_decode($data['recipe_nutritional_information'],true);
            $edit['course'] = $data['recipe_category'];
            $edit['category'] = $data['recipe_category'];
        }
    }
    ?>
    <form action="" method="post">
        <div id="content" class="container-fluid">
            <div class="row">
                <div class="col cheader d-flex justify-content-between">
                    <span style="font-size:40px;margin-top:0.5rem;margin-left:1.5rem">New Recipe</span>
                    <button name='<?=$action?>' type="button" id='submit_btn' class="btn btn-save"><?php if($action == 'createRecipe'){ echo "Save";} else { echo "Save Changes";}?></button>
                </div>
            </div>
            <div class="ctop">
                <div class="left uploadImg">
                    <?php if($action=='editRecipe'){ ?>
                        <img src="<?=$DEFAULT_PATH?>assets/images/alooparantha.svg" alt="" id="camera" style="width:60%">
                    <?php }else{ ?>
                    <img src="<?=$DEFAULT_PATH?>assets/images/camera.svg" alt="" id="camera" style="width:60%">
                    <?php } ?>
                    <input data-name="recipeImage" type="file"  id="recipeImg" style="display:none"  name="recipeImage">
                </div>
                <div class="right">
                    <input data-name="recipeName"  class="form-control" style="border:none;font-size:30px" type="text" value="<?php if($action == 'editRecipe')echo $edit['name']; ?>" name="recipeName" id="" placeholder="Recipe Name">
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
                                    <input class="form-control input_bar" type="text" class="form-control" placeholder="Recipe Name" value="<?php if($action == 'editRecipe'){echo $edit['name'];} ?>">
                                </div>
                                <div class="col dropdown-container" >
                                <select  data-validate name="courses" id="recipeCourse" class="form-control input_bar" style="color: #212529 !important"  placeholder="Courses">
                                <?php if($action == 'editRecipe'){echo "<option value='{$edit['course']}'>{$edit['course']}</option>";} ?>
                                <option value="Courses" selected>Courses</option>    
                                <option value="Breakfast">Breakfast</option>
                                    <option value="Lunch">Lunch</option>
                                    <option value="Snack">Snack</option>
                                    <option value="Dinner">Dinner</option>
                                </select>
                                </div>
                            </div>
                            <div class="row w-100">
                            <div class="col dropdown-container " >
                                <select data-name="recipeCategory" name="category" id="" class="form-control input_bar" style="color: #212529 !important" placeholder="Categories">
                                <?php if($action == 'editRecipe'){echo "<option value='{$edit['category']}'>{$edit['category']}</option>";} ?>
                                <option value="Categories" selected>Categories</option>    
                                <option value="Breakfast">Pancake</option>
                                    <option value="Lunch">Juice</option>
                                    <option value="Snack">Butter Bread</option>
                                    <option value="Dinner">Waffle</option>
                                </select>
                                </div>
                                <div class="col">
                                    <input data-name="recipePrepTime"  name="Preparationtime" class="form-control input_bar" type="text" class="form-control" placeholder="Preparation Time" >
                                </div>
                            </div>
                            
                            <h3 class="text-center">Nutritional Details</h3>
                            <div class="row w-75">
                                <div class="col">
                                    <input data-nutri="Calories"  name="Calories" class="form-control input_bar" type="text" class="form-control" placeholder="Calories" value="<?php if($action == 'editRecipe'){echo $edit['nutritional']['Calories'];} ?>">
                                </div>
                                <div class="col">
                                    <input data-nutri="Protein (g)"  name="Protien" class="form-control input_bar" type="text" class="form-control" value="<?php if($action == 'editRecipe'){echo $edit['nutritional']['Protein (g)'];} ?>" placeholder="Protien">
                                </div>
                            </div>
                            <div class="row w-75">
                                <div class="col">
                                    <input data-nutri="Fat (g)"  name="Fats" class="form-control input_bar" type="text" class="form-control" placeholder="saturates" value="<?php if($action == 'editRecipe'){echo $edit['nutritional']['Fat (g)'];} ?>" placeholder="Fats">
                                </div>
                                <div class="col">
                                    <input data-nutri="Carbohydrates (g)"  name="Cars" class="form-control input_bar" type="text" class="form-control" placeholder="Cars" value="<?php if($action == 'editRecipe'){echo $edit['nutritional']['Carbohydrates (g)'];} ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rtab-content ingredient-tab">
                       <div class="add-ingredient">
                       <button  class="plus" id="btn_plus2">+</button>
                            <span>Add Ingredients</span>
                       </div>
                       <div class="ingre-icards" id="ingredients_box">
                        <!-- Dont Remove this code it will help in edit page -->
                        <?php if(isset($edit['ingredients'])):
                            foreach($edit['ingredients'] as $ingre): ?>
                            <div class="icard" >
                                <img src="<?=$DEFAULT_PATH?>assets/images/salt.svg" alt="" srcset="">
                                <span class="igre-name"><?=$ingre?></span>
                                <input data-ingredient-name="<?=$ingre?>" data-ingredient="true" checked type="checkbox" name="ingredient[]" id="" value="1" class="input_bar check">
                            </div>
                        <?php endforeach; endif; ?>
                           
                            
                       </div>
                    </div>
                    <div class="rtab-content direction-tab">
                        <div class="add-actions">
                            <div class="add-direction">
                                <button  class="plus" id="btn_plus">+</button>
                               
                                <span>Add Direction</span>
                            </div>
                            <div class="add-video">
                               <button style="background:none;border:none;text-decoration:none" id="url_button"> <div class="upload-url"><img src="<?=$DEFAULT_PATH?>assets/images/Upload_Url.svg" alt="" srcset="" style="margin-right:0.5rem"><span>Upload URL</span></div></button>
                            </div>
                        </div>
                        <div class="direction-list" >
                            <ul class="direcions" id="direcions">
                                <!-- dont delete this code  -->
                                <?php if(isset($edit['directions'])):
                                    foreach($edit['directions'] as $dir): ?>
                                    <li data-direction="<?=$dir?>" class="direction"><?=$dir?></li>
                                <?php endforeach; endif; ?>
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
            <p style="font-size:40px">Add Directions</p>
            <form action="">
                <input type="text" value="" placeholder="Type Directions Here" id="add_direction" class="directions">
            </form>
            <p style="color: #7B62FB;font-size:31px"> Add more Directions</p>
            <button onclick="add_direction()" class="direction_btn">+ Add</button>

        </div>  
    </div>

     <!----Add Ingredient--->
     <div id="popup2" class="overlay">
        <div class="popup" style="padding:20px 60px !important">
        <p style="font-size:40px">Add Ingredients</p>
        <div class="popup2_wrapper">
            <a  href="#" class="plus" style="height:50px">+</a>
            <div>
                <form action="">
                        <input type="text" value="" placeholder="Name Of the ingredient" id="ingredient_name" class="ingredient">
                        <input type="text" value="" placeholder="Quantity" id="quantity" class="ingredient" style="margin-top:1rem">
                </form>

            </div>

        </div>
        <p style="color: #7B62FB;font-size:31px"> Add more Ingredients</p>
            <button onclick="add_ingredient()" class="direction_btn">+ Add</button>
            

        </div>
        
    </div>
    <!----Add URL--->
    <div id="popup3" class="overlay">
        <div class="popup">
        <p style="font-size:40px">Add Video</p>
        <form action="">
                <input type="text" value="" placeholder="Type URL Here" id="add_video" class="directions">
            </form>
            <button onclick="add_video()" class="direction_btn">Upload</button>
        </div>  
    </div>
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

    var modal = document.getElementById("popup1");
        var btn = document.getElementById("btn_plus");
        
        btn.onclick = function () {
            event.preventDefault();
            modal.style.display = "block";
        }
        var modal2 = document.getElementById("popup2");
        var btn2 = document.getElementById("btn_plus2"); 
        btn2.onclick = function () {
            event.preventDefault();
            modal2.style.display = "block";
        }
        var modal3 = document.getElementById("popup3");
        var btn3 = document.getElementById("url_button"); 
        btn3.onclick = function () {
            event.preventDefault();
            modal3.style.display = "block";
        }
       
   
    </script>

    <script>
        function add_direction(){
            const node = document.createElement("li");
            node.classList.add("direction_li");
            var text = document.getElementById("add_direction").value;
            const textnode = document.createTextNode(text);
            node.setAttribute('data-direction',text);
            node.appendChild(textnode);
            document.getElementById("direcions").appendChild(node);
            var div = document.getElementById("popup1");
            div.style.display = "none";

    }

    function add_ingredient(){
    const div = document.getElementById("ingredients_box");
     const icard = document.createElement("div");
     const ingredient_name = document.getElementById("ingredient_name");
     const quantity = document.getElementById("quantity");
     if(ingredient_name.value == "" || quantity.value== ""){
        console.log('snskjc');
        ingredient_name.style.border = "1px solid red";
        quantity.style.border = "1px solid red";
        return;
     }
     icard.classList.add("icard");
     icard.innerHTML=`
     <img src="<?=$DEFAULT_PATH?>assets/images/salt.svg" alt="" srcset="">
     <span class="igre-name">${ingredient_name.value}</span>
         <span class="igre-amount">${quantity.value}</span>
        <input data-ingredient-name="${ingredient_name.value} ${quantity.value}" data-ingredient="true" checked  type="checkbox" name="ingredient[]" id="" value="1" class="input_bar check">
     `
     div.appendChild(icard);
     ingredient_name.value = "";
        quantity.value = "";
     const div2 = document.getElementById("popup2");
    div2.style.display = "none";
    checkBoxEvent();

   }
   function add_video(){
    const div3 = document.getElementById("popup3");
    div3.style.display = "none";
   }

   function checkBoxEvent(){
    const allCheckBoxs =document.querySelectorAll('[data-ingredient]');
    console.log(allCheckBoxs);
    allCheckBoxs.forEach(element => {
        element.addEventListener('click',()=>{
            if (element.checked) {
                element.setAttribute('data-ingredient',true);
            }else{
                element.setAttribute('data-ingredient',false);
            }
        });
    });
   }
   checkBoxEvent();

   const submit_btn =document.getElementById('submit_btn');

   submit_btn.addEventListener('click',()=>{

    const allIngredient =document.querySelectorAll('[data-ingredient-name]');
    const recipeDetails =document.querySelectorAll('[data-name]');
    const recipeName =document.querySelector('[data-name="recipeName"]');
    const recipeCourse =document.querySelector('#recipeCourse');
    const recipeNutri =document.querySelectorAll('[data-nutri]');
    const recipeDirections =document.querySelectorAll('[data-direction]');

    // const recipeImg =document.querySelector('#recipeImg');
    // const file = recipeImg.files[0];

    // const recipeImage = new FormData();
    // recipeImage.append("file", file);
    // recipeImage.append("filename", file.name);



    console.log(allIngredient);
    console.log(recipeDetails);
    console.log(recipeDirections);

    const finalJson = {};
    
    ingredientArray = [];
    allIngredient.forEach(i=>{
        if(i.checked){
            const ingre = i.getAttribute('data-ingredient-name');
            ingredientArray.push(ingre);
        }
    });
    nutriArray = {};
    recipeNutri.forEach(nut=>{
        const nutri = nut.getAttribute('data-nutri');
        nutriArray[nutri] = nut.value;
    });
    
    directionArray = [];
    recipeDirections.forEach(d=>{
        const nutri = d.getAttribute('data-direction');
        directionArray.push(nutri);
    });

    console.log(directionArray);

    console.log(JSON.stringify(nutriArray));

    console.log(ingredientArray);

    const form = $('<form action="" method="post"></form>');
    form.append(`<input type="hidden" name="add" value="true">`);
    form.append(`<input type="hidden" name="recipeName" value="${recipeName.value}">`);
    form.append(`<input type="hidden" name="recipeCourse" value="${recipeCourse.value}">`);
    form.append(`<input type="hidden" name="nutriDetails" value='${JSON.stringify(nutriArray)}'>`);
    form.append(`<input type="hidden" name="recipeDirections" value='${JSON.stringify(directionArray)}'>`);
    form.append(`<input type="hidden" name="recipeingredients" value='${JSON.stringify(ingredientArray)}'>`);
    $('body').append(form);
    form.submit();

   });


    </script>
  </body>
</html>