<?php
// include('navbar.php');
// require('constant/config.php');

// $sql = "SELECT * FROM `dietitian_recipes` ";
// // $id = $_GET['recipeID'];
// $result = $conn->query($sql);
// $num = mysqli_num_rows($result);
// // echo $num ;

// while($row = mysqli_fetch_assoc($result)){
//echo var_dump($row);
// echo $row['recipe_id']. $row['recipe_name'].$row['recipe_nutritional_information'];
// echo "<br>";

echo '<div class="main-div1" id="hover">';
echo '<img src="assets/images/alooparantha.svg" class="hover-img">';
echo '<p class="aloo-paratha">aloo paratha</p>';

echo '<div class="nutritient-fact">Nutritient fact </div>';
echo '<div class="main-div2">';

echo '<div class="div">';
echo '<div class="num">12</div>';
echo '<div class="calories">Calories</div>';
echo '</div>';

echo '<div class="div2">';
echo '<div class="all-nutrients">12g</div>';
echo '<div class="fats">Fats</div>';
echo '</div>';

echo '<div class="div3">';
echo '<div class="all-nutrients">04</div>';
echo '<div class="fats">Protein</div>';
echo '</div>';

echo '<div class="div4" >';
echo '<div class="all-nutrients">36</div>';
echo '<div class="fats">Carbs</div>';
echo '</div>';

echo '</div>';

echo '<div class="main-div3">';
// echo '<div class="qty">Qty:</div>';
// echo '<div class="note">Note:</div>';
// echo '<div class="chlid">';
// echo '</div>';
// echo '<div class="parent2">';
// echo '<div class="item3">';
// echo '</div>';
// echo '<div class="note1">This is for morning breakfast, first have this for a heavy diet. </div>';
// echo '</div>';
// echo '<div class="div5">02</div>';
echo '</div>';
echo '</div> ';



// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.main-div1 {
			top: 50%;
			width: 80%;
			max-width: 562px;
			height: 573px;
			/* justify-content: center;
    		 align-items: center;
    		 margin-left: 500px; */
			position: fixed;
			border-radius: 12px;
			background-color: #fff;
			border: 1px solid #d9d9d9;
			box-sizing: border-box;
			z-index: 10;
			/* display: block; */
			transition: all 1s ease;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		.hover-img {
			position: relative;
			border-radius: 12px;
			width: 70%;
			height: auto;
			object-fit: cover;
			margin: 7%;

		}

		.aloo-paratha {
			position: relative;
			font-size: 2rem;
			font-weight: 500;
			font-family: Poppins;
			color: #000;
			text-align: center;
		}

		.nutritient-fact {
			position: relative;
			font-size: 1rem;
			line-height: 150%;
			font-weight: 500;
			font-family: Poppins;
			color: #000;
			text-align: center;
		}

		.num {
			line-height: 150%;
			font-weight: 600;
		}

		.calories {
			line-height: 150%;
			color: #858383;
		}

		.div {
			width: 79px;
			height: 49px;
		}

		.all-nutrients {
			line-height: 150%;
			font-weight: 600;
		}

		.fats {
			line-height: 150%;
			color: #858383;
		}

		.div2 {
			width: 79px;
			height: 49px;
		}

		.div3 {
			width: 79px;
			height: 49px;
		}

		.div4 {
			width: 79px;
			height: 49px;
		}



		.main-div2 {
			position: relative;
			width: 80%;
			/* height: 49px; */
			text-align: center;
			font-size: 1rem;
			color: #000;
			font-family: Poppins;
			/* margin-left: 70px; */
			/* margin-top: 20px; */
			margin: 10%;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}

		.qty {
			position: absolute;
			top: 9px;
			left: 0px;
			line-height: 150%;
			font-weight: 600;
		}

		.note {
			position: absolute;
			top: 9px;
			left: 156px;
			line-height: 150%;
			font-weight: 600;
		}

		.chlid {
			position: absolute;
			top: 0px;
			left: 39px;
			border-radius: 10px;
			background-color: #fff;
			border: 1px solid #ebebeb;
			box-sizing: border-box;
			width: 92px;
			height: 41px;
		}

		.item3 {
			position: absolute;
			top: 0px;
			left: 0px;
			border-radius: 10px;
			background-color: #fff;
			border: 1px solid #ebebeb;
			box-sizing: border-box;
			width: 255px;
			height: 41px;
		}

		.note1 {
			position: absolute;
			top: 14px;
			left: 14px;
			line-height: 96%;
			overflow: hidden;
			display: -webkit-box;
			-webkit-line-clamp: 1;
			-webkit-box-orient: vertical;
			max-height: 1em;
			white-space: normal;
			text-overflow: ellipsis;
		}

		.parent2 {
			position: absolute;
			top: 0px;
			left: 207px;
			width: 255px;
			height: 41px;
			font-size: 15px;
		}

		.div5 {
			position: absolute;
			top: 14px;
			left: 75px;
			font-size: 15px;
			line-height: 96%;
		}

		.main-div3 {
			position: relative;
			width: 100%;
			/* height: 41px; */
			overflow: hidden;
			text-align: left;
			font-size: 1rem;
			color: #000;
			font-family: Poppins;
		}
	</style>