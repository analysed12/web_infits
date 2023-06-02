<?php 
error_reporting(0);
include('navbar.php');
if(isset($_GET['category'])){
    $sql = "SELECT * FROM `default_recipes` WHERE drecipe_category = '{$_GET['category']}'";
}else{
    $sql = "SELECT * FROM `default_recipes`";
}
$res = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe List</title>
    <?php require('constant/head.php');?>
    
    <style>
        
        body{
            overflow-x: hidden !important;
        }
        .header {
            display: flex;
            flex-direction: row;
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
        }

        .card {
            background: #FFFFFF;
            border-radius: 15.8334px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
            margin: 20px;
        }

        .card-upper-text {
            font-size: 20px;
            font-weight: bold;
            padding: 5px 10px;
            background-color: #FEA945;
            box-shadow: 0px 0px 25px rgba(255, 255, 255, 0.75);
            border-radius: 8px;
            color: white;
            font-weight: 500;
            font-size: 12px;
            line-height: 18px;
        }

        .card-food {
            font-size: 20px;
            line-height:20px;
            letter-spacing: -0.11428570002317429px;
            text-align: left;
            font-family:"NATS";
            font-weight:400;
            font-style:normal;
        }

        .card-calorie {
            font-size: 16px;
            font-weight: 400;
            line-height: 12px;
            letter-spacing: 0em;
            text-align: left;
            align-items: center;
            display: flex;
            color: #A3A1A1;
            font-style:normal;
            font-family:"NATS";
            margin-top:17px;
            margin-bottom:0px;
        }

        .card-num-circle {
            background: #9C74F5;
            border-radius: 50px;
            color: white;
            padding: 5px
        }

        .card-num {
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 18px;
            color: #9C74F5;
            font-family:"NATS";
            margin-top:20px;
        }

        .recipe-container {
            display: flex;
            flex-wrap: wrap;
            gap: 35px;
            padding-left: 70px;
            padding-top: 25px;
        }

        .recipe-add-btn {
        position: inherit;
        justify-content: flex-end;
        display: flex;
        padding-bottom:100px;
        /* margin:0px 21px 40px -60px !important; */
       
    }
    @media screen and (min-width:920px) and (max-width:1500px){
        .card{
            margin: 20px auto !important;
        }
    }
    @media screen and (min-width:720px) and (max-width:920px) {
       .header{
        display:flex;
        flex-direction:column !important;
        align-items:flex-start !important;
       }
       .searchbox{
        margin-left:40px;
       }
    }

    @media screen and (min-width:0px) and (max-width:720px) {
        .header{
        display:flex;
        flex-direction:column !important;
        align-items:flex-start !important;
        
       }
        .flex.row{
            margin:auto;
            margin-left:auto !important;
        }
        .card{
            margin: 10px auto !important;
        } 
        .searchbox{
            margin-left:20px;
    }
        .heading{
            margin-left:20px !important;
        }
        
    }
    @media screen and (min-width:0px) and (max-width:420px){
        .searchbox{
            width:300px;
        }
    }
   
    </style>
</head>

<body>
    <div class="header" style="align-items:center;">
    
        <div class="heading" style="font-size:40px;margin-left:2.8rem;margin-top:1.2rem;font-family:'NATS'; font-weight:400;">Recipes <small style="color: #787885; font-size:25px; margin-left:1rem;font-family:'NATS';font-weight:400;margin-top:-10px !important;"><?php if(isset($_GET['category'])){ echo ucwords($_GET['category']); }else{ echo 'All Recipes'; } ?></small></div>
        <div style="display:flex;gap:1.5rem">
            <div class="searchbox" style="align-items:center;">
                <button style="background-color:white;border:none;" id="seabtn" name="seabtn"><img src="<?=$DEFAULT_PATH?>assets/images/search_recipe.svg"></button>
                <input type="search" name="sinput" placeholder="Search" style="border:none;font-size:20px;margin-left:1rem;font-family:'NATS';font-weight:400;margin-top:-5px;">
            </div>
        </div>

    </div>

    <div class="flex row" style="margin-left:260px;">
        <?php while ($d = mysqli_fetch_assoc($res)) {
            $drecipe_recipe = explode(',', $d['drecipe_recipe']);
            $steps = count($drecipe_recipe);
            $drecipe_nutritional = $d['drecipe_nutritional_information'];

            $drecipe_nutritional = trim($drecipe_nutritional, '{}');
            $pairs = explode(', ', $drecipe_nutritional);
            $nutritional = json_decode($d['drecipe_nutritional_information'],true);
        ?>
            <div class="card d-flex" style="padding:15px; width:310px; border-radius:16px;height:auto;margin:25px 40px;">
                <div class="card-upper d-flex justify-content-between">
                    <p id="bu" class="card-upper-text"> Medium </p>
                    <p id="bu" class="card-upper-text"><i class="fa-solid fa-clock"></i> 20:00 </p>
                </div>
                <div class="img-dis" style="width:100%; text-align:center;">
                    <img src="<?=$DEFAULT_PATH?>assets/images/Alooparantha.svg" style="height:116px; width:200px; object-fit:cover;margin-top:-52px;margin-left:-13px;margin-bottom:12px" />
                </div>
                <div class="d-flex justify-content-between">
                    <p class="card-food"><?php echo $d['drecipe_name'] ?></p>
                    <div class="header">
                        <div class="dropdown ">
                            <div id="myDropdownIcon" class="dropbtn" onclick="showDropdown(event)">
                                <img class="" src="./icons/vertical-three-dots.svg" alt="" style="margin-top:-27px;">
                            </div>

                            <div id="myDropdownContent" class="dropdown-content dropdown-card " style="display:none;">
                                <a style="color: white;" class="edit-button" href="#">Edit</a>
                                <a style="color: white;" class="delete-button" href="#">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between" style="align-items:center;margin-top:-30px;">
                    <p class="card-calorie"> <img src="./icons/calorie.svg" alt=""> <?php echo $nutritional['Calories'] ?> kcal</p>
                    <div class="d-flex align-items-center card-num">
                        <div class="card-num-circle"><?= $steps ?> </div> &nbsp;
                        <div class="">steps</div>
                    </div>
                </div>
            </div>
        <?php } ?>
        
    </div>

    <a class="butt" href="create_recipe.php"
            style="border-radius:50%;background-color:#9C74F5;width:85px;height:85px;filter: drop-shadow(0px 0px 68px rgba(0, 0, 0, 0.3));color:white;font-size:40px;text-decoration:none;border:none;position:absolute;right:40px;bottom:60px;display:flex;justify-content:center;align-items:center;">+</a>
    <?php require('constant/scripts.php');?>
</body>

</html>