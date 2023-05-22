<?php           
require('constant/config.php');
$display_query = "SELECT `eventID`, `eventname`,`meeting_type`, `start_date`, `end_date`, `place_of_meeting`, `description`FROM `create_event`";
$results = mysqli_query($conn,$display_query);   
$count = mysqli_num_rows($results);  
if($count>0) 
{
	$data_arr=array();
    $i=1;
	while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
	{	
	$data_arr[$i]['eventID'] = $data_row['eventID'];
	$data_arr[$i]['eventname'] = $data_row['eventname'];
	$data_arr[$i]['start_date'] = $data_row['start_date'];
	$data_arr[$i]['end_date'] = $data_row['end_date'];
	$i++;
	}
	
	$data = array(
                'status' => true,
                'msg' => 'successfully!',
				'data' => $data_arr
            );
}
else
{
	$data = array(
                'status' => false,
                'msg' => 'Error!'				
            );
}
echo json_encode($data);
?>