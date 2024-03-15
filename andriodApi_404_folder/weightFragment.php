<?php 
require "connect.php";

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

	$userID = $_POST['clientuserID'];

	
	$stmnt = $conn -> prepare("SELECT SUM(weight) AS total_sum , AVG(weight) AS total_avg FROM weighttracker WHERE WEEKOFYEAR(cast(weighttracker.dateandtime as DATE))=WEEKOFYEAR(NOW()) AND clientuserID=?");
	
	$stmnt-> bind_param("s",$userID);
	$stmnt-> execute();
	$stmnt-> bind_result($Sum,$Avg);
	
	$products = array();
	
	while($stmnt->fetch()){
	  $temp = array();
	  
	  $temp['SumWeek']= $Sum;
	  $temp['AvgWeek']= $Avg;
	   
	  array_push($products,$temp);
	}

	$stmnt = $conn -> prepare("SELECT SUM(weight) AS total_sum , AVG(weight) AS total_avg FROM weighttracker WHERE YEAR(cast(weighttracker.dateandtime as DATE)) = YEAR(NOW()) AND MONTH(cast(weighttracker.dateandtime as DATE))=MONTH(NOW()) AND clientuserID=?");
	
	$stmnt-> bind_param("s",$userID);
	$stmnt-> execute();
	$stmnt-> bind_result($Sum,$Avg);
	
	while($stmnt->fetch()){
	  $temp = array();
	  
	  $temp['SumMonth']= $Sum;
	  $temp['AvgMonth']= $Avg;
	   
	  array_push($products,$temp);
	}

	$stmnt = $conn -> prepare("SELECT SUM(weight) AS total_sum , AVG(weight) AS total_avg FROM weighttracker WHERE cast(weighttracker.dateandtime as DATE)=CURRENT_DATE AND clientuserID=?");
	
	$stmnt-> bind_param("s",$userID);
	$stmnt-> execute();
	$stmnt-> bind_result($Sum,$Avg);
	
	while($stmnt->fetch()){
	  $temp = array();
	  
	  $temp['SumDaily']= $Sum;
	  $temp['AvgDaily']= $Avg;
	   
	  array_push($products,$temp);
	}

	$stmnt = $conn -> prepare("SELECT SUM(weight) AS total_sum , AVG(weight) AS total_avg FROM weighttracker WHERE clientuserID=?");
	
	$stmnt-> bind_param("s",$userID);
	$stmnt-> execute();
	$stmnt-> bind_result($Sum,$Avg);
	
	while($stmnt->fetch()){
	  $temp = array();
	  
	  $temp['SumTotal']= $Sum;
	  $temp['AvgTotal']= $Avg;
	   
	  array_push($products,$temp);
	}

if(count($products)>-1){
echo json_encode($products);
}

else {
echo "failure";
}
?>
