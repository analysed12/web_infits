<?php  

session_start();

# check if the user is logged in
if (isset($_SESSION['dietitianuserID'])) {
	
	# database connection file
	include '../db.conn.php';

	# get the logged in user's dietitianuserID from SESSION
	$id = $_SESSION['dietitian_id'];

	$sql = "UPDATE dietitian
	        SET last_seen = NOW() 
	        WHERE dietitian_id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);

}else {
	header("Location: ../../index.php");
	exit;
}