<?php 
require "connect.php";
// Create connection

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

	$userID = $_POST['userID'];
	
	$stmnt = $conn -> prepare("SELECT SUM(hrsslept) AS total_sum , AVG(hrsslept) AS total_avg  FROM sleeptracker WHERE WEEKOFYEAR(cast(sleeptracker.waketime as TIME))=WEEKOFYEAR(NOW())AND clientuserID=?");
	
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

	$stmnt = $conn -> prepare("SELECT SUM(hrsslept) AS total_sum , AVG(hrsslept) AS total_avg FROM sleeptracker WHERE YEAR(cast(sleeptracker.waketime as TIME)) = YEAR(NOW()) AND MONTH(cast(sleeptracker.waketime as TIME))=MONTH(NOW()) AND clientuserID=?");
	
	$stmnt-> bind_param("s",$userID);
	$stmnt-> execute();
	$stmnt-> bind_result($Sum,$Avg);
	
	while($stmnt->fetch()){
	  $temp = array();
	  
	  $temp['SumMonth']= $Sum;
	  $temp['AvgMonth']= $Avg;
	   
	  array_push($products,$temp);
	}

	$stmnt = $conn -> prepare("SELECT SUM(hrsslept) AS total_sum , AVG(hrsslept) AS total_avg FROM sleeptracker WHERE cast(sleeptracker.waketime as TIME)=CURRENT_DATE AND clientuserID=?");
	
	$stmnt-> bind_param("s",$userID);
	$stmnt-> execute();
	$stmnt-> bind_result($Sum,$Avg);
	
	while($stmnt->fetch()){
	  $temp = array();
	  
	  $temp['SumDaily']= $Sum;
	  $temp['AvgDaily']= $Avg;
	   
	  array_push($products,$temp);
	}

	$stmnt = $conn -> prepare("SELECT SUM(hrsslept) AS total_sum , AVG(hrsslept) AS total_avg FROM sleeptracker WHERE clientuserID=?");
	
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
