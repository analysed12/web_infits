<?php 

require "connect.php";

	$userID = $_POST['clientuserID'];
	
	$stmnt = $conn -> prepare("SELECT SUM(steps) AS total_sum , AVG(steps) AS total_avg FROM steptracker WHERE WEEKOFYEAR(cast(steptracker.dateandtime as DATE))=WEEKOFYEAR(NOW()) AND clientuserID=?");
	
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

	$stmnt = $conn -> prepare("SELECT SUM(steps) AS total_sum , AVG(steps) AS total_avg FROM steptracker WHERE YEAR(cast(steptracker.dateandtime as DATE)) = YEAR(NOW()) AND MONTH(cast(steptracker.dateandtime as DATE))=MONTH(NOW()) AND clientuserID=?");
	
	$stmnt-> bind_param("s",$userID);
	$stmnt-> execute();
	$stmnt-> bind_result($Sum,$Avg);
	
	while($stmnt->fetch()){
	  $temp = array();
	  
	  $temp['SumMonth']= $Sum;
	  $temp['AvgMonth']= $Avg;
	   
	  array_push($products,$temp);
	}

	$stmnt = $conn -> prepare("SELECT SUM(steps) AS total_sum , AVG(steps) AS total_avg FROM steptracker WHERE cast(steptracker.dateandtime as DATE)=CURRENT_DATE AND clientuserID=?");
	
	$stmnt-> bind_param("s",$userID);
	$stmnt-> execute();
	$stmnt-> bind_result($Sum,$Avg);
	
	while($stmnt->fetch()){
	  $temp = array();
	  
	  $temp['SumDaily']= $Sum;
	  $temp['AvgDaily']= $Avg;
	   
	  array_push($products,$temp);
	}

	$stmnt = $conn -> prepare("SELECT SUM(steps) AS total_sum , AVG(steps) AS total_avg FROM steptracker WHERE clientuserID=?");
	
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
