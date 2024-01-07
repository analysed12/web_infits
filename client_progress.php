<?php
require('constant/config.php');
// session_start();
include('navbar.php');

// Get Id
if(isset($_SESSION['dietitianuserID'])){
    $dietitian_id = $_SESSION['dietitianuserID'];
}else{
    header('Location:  login.php');
}
// Configure Dates
date_default_timezone_set("Asia/Calcutta");
$date = new DateTime();

function fetchData($query){
    
    global $conn;
    if($conn->connect_error){
        die("Connection failed :" . $conn->connect_error);
    }
    
    $result = $conn->query($query) or die("Query Failed");
    $data = array();
    while($row = $result->fetch_assoc()){
        $data[] =  $row;
    }
  
    return ($data);
}
function fetchInformation($client_id){
    date_default_timezone_set("Asia/Calcutta");
    $date = new DateTime();
    $data = array(
        'steps'=> array(
            'goal' => 0,
            'progress' => 0,
        ),
        'heart' =>array(
            // 'goal' => 0,
            'progress' => 0,
        ),
        'water' =>array(
            'goal' => 0,
            'progress' => 0,
        ),
        'sleep' =>array(
            'goal' => 0,
            'progress' => 0,
        ),
        'weight' =>array(
            'goal' => 0,
            'progress' => 0,
        ),
        'calorie' =>array(
            'goal' => 0,
            'progress' => 0,
        ),
    );
    $query = "SELECT steps FROM goals WHERE client_id = '$client_id'";
    $value = fetchData($query);
    if(!empty($value)){
        $data['steps']['goal'] =$value[0]['steps'];
    }else{
        $data['steps']['goal'] = 0;
    }
    $query = "SELECT water FROM goals WHERE client_id = '$client_id'";
    $value = fetchData($query);
    if(!empty($value)){
        $data['water']['goal'] =$value[0]['water'];
    }else{
        $data['water']['goal'] = 0;
    }
    $query = "SELECT sleep FROM goals WHERE client_id = '$client_id'";
    $value = fetchData($query);
    if(!empty($value)){
        $data['sleep']['goal'] =$value[0]['sleep'];
    }else{
        $data['sleep']['goal'] = 0;
    }
    $query = "SELECT weight FROM goals WHERE client_id = '$client_id'";
    $value = fetchData($query);
    if(!empty($value)){
        $data['weight']['goal'] =$value[0]['weight'];
    }else{
        $data['weight']['goal'] = 0;
    }
    $query = "SELECT calorie FROM goals WHERE client_id = '$client_id'";
    $value = fetchData($query);
    if(!empty($value)){
        $data['calorie']['goal'] =$value[0]['calorie'];
    }else{
        $data['calorie']['goal'] = 0;
    }
    
    $query = "SELECT SUM(steps) FROM steptracker WHERE client_id= '$client_id' AND `dateandtime` >= '{$date->format('y-m-d')} 00:00:00' AND `dateandtime` <= '{$date->format('y-m-d')} 23:59:59'";
    $value = fetchData($query);
    if($value[0]['SUM(steps)'] != ''){
        $data['steps']['progress'] =$value[0]['SUM(steps)'];
    }else{
        $data['steps']['progress'] = 0;
    }

    $query = "SELECT avg(average) FROM heartrate WHERE client_id= '$client_id' AND `dateandtime` >= '{$date->format('y-m-d')} 00:00:00' AND `dateandtime` <= '{$date->format('y-m-d')} 23:59:59'";
    $value = fetchData($query);
    if($value[0]['avg(average)'] != ''){
        $data['heart']['progress'] =$value[0]['avg(average)'];
    }else{
        $data['heart']['progress'] = 0;
    }

    $query = "SELECT SUM(drinkConsumed) FROM watertracker WHERE client_id= '$client_id' AND  `dateandtime` = '{$date->format('y-m-d')}'";
    $value = fetchData($query);
    if($value[0]['SUM(drinkConsumed)'] != ''){
        $data['water']['progress'] =$value[0]['SUM(drinkConsumed)'];
    }else{
        $data['water']['progress'] = 0;
    }

    $query = "SELECT SUM(hrsSlept) FROM sleeptracker WHERE client_id= '$client_id' AND `sleeptime` >= '{$date->format('y-m-d')} 00:00:00' AND `waketime` <= '{$date->format('y-m-d')} 23:59:59'";
    $hours = fetchData($query)[0]['SUM(hrsSlept)'];
    $query = "SELECT SUM(minsSlept) FROM sleeptracker WHERE client_id= '$client_id' AND `sleeptime` >= '{$date->format('y-m-d')} 00:00:00' AND `waketime` <= '{$date->format('y-m-d')} 23:59:59'";
    $mins = fetchData($query)[0]['SUM(minsSlept)'];
    $data['sleep']['progress'] = (float) $hours + $mins/60;

    $query = "SELECT avg(weight) FROM weighttracker WHERE client_id= '$client_id' AND `dateandtime` >= '{$date->format('y-m-d')} 00:00:00' AND `dateandtime` <= '{$date->format('y-m-d')} 23:59:59'";
    $value = fetchData($query);
    if($value[0]['avg(weight)'] != ''){
        $data['weight']['progress'] =$value[0]['avg(weight)'];
    }else{
        $data['weight']['progress'] = 0;
    }
    
    $query = "SELECT SUM(caloriesconsumed) FROM calorietracker WHERE client_id= '$client_id' AND `dateandtime` >= '{$date->format('y-m-d')} 00:00:00' AND `dateandtime` <= '{$date->format('y-m-d')} 23:59:59'";
    $value = fetchData($query);
    if($value[0]['SUM(caloriesconsumed)'] != ''){
        $data['calorie']['progress'] =$value[0]['SUM(caloriesconsumed)'];
    }else{
        $data['calorie']['progress'] = 0;
    }

    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('constant/head.php');?>
    <title>Document</title>

</head>
<style>
body {
    font-family: 'NATS', sans-serif !important;
    font-weight: 400;
}

.client_progress {
    font-family: 'NATS', sans-serif !important;
    margin-top: 2rem;
    margin-left: 14.8rem;

    display: flex;
    flex-direction: column;
    gap: 1rem;
    width: auto;
}

#details {
    color: #717171;
    border: none;
    background-color: white;
    font-size: 18px;

}

.details {

    border: none;
}

.dashboard_container3 {
    display: flex;
    justify-content: space-between;
    margin: 0 2rem;
}

.dashboard_container4 {
    margin-left: 1rem;

}

.container4_wrapper1 {
    display: flex;
    justify-content: flex-end;
    width: 95%;
    padding-right: 1.5rem;

}

.material-symbols-outlined {
    margin-top: 0.1rem;
    margin-right: 0.3rem;
}

.symbols {
    display: flex;
    gap: 0.2rem;
}

.symbols.col-2 img {
    scale: 0.8;
}

.container4_wrapper2 {
    display: flex;
    background-color: #FDFDFD;
    border: 1px solid #e4e1e1;
    width: fit-content;
    padding: 0.7rem;
    padding-left: 1rem;
    padding-right: 1.5rem;
    border-radius: 0.5rem;
    margin-top: 1rem;
    justify-content: space-between;
    width: 95%;
}

.values {
    margin-top: 2rem;
    background-color: #FDFDFD;
    color: #454545;
    font-weight: 300;
    border: none;
}

.steps {
    margin-top: 1rem;
}

#two {
    background-color: #0177FD;
    border-radius: 100%;
    padding: 0.09rem;
    color: white;
    padding-left: 0.3rem;
    padding-right: 0.3rem;
    font-size: 0.6rem;

}

.list1 {
    display: flex;
    gap: 13rem;
}

.list2 {
    display: flex;
    gap: 14rem;
}

.mobileview_clientprogress {

    display: none;
}

.symbols-container,
.values-container {
    display: flex;
    font-weight: 400;
    justify-content: flex-end;
    width: 77%;
    align-items: center;
    font-size: 20px;
    padding-right: 0px;
}
.values-container {
    width: 75%;
}

.mobile-card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
    margin-right: 3rem;
}

@media screen and (max-width: 1100px) {
    .dashboard_container3 {
        display: flex;
        gap: 1rem !important;
        justify-content: space-between;
        align-items: center;
    }

    .details {
        margin-left: 0;
    }

    .symbols img {
        text-align: center;
    }

    .symbols span {
        display: none;
    }

    .show {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .values {
        font-size: 13px;
    }

}

@media screen and (max-width: 1100px) {
    .dashboard_container4 {
        display: none;
    }

    .details {
        margin-left: 0;
    }

    .dashboard_container3 {
        display: flex;
        gap: 1rem !important;

        justify-content: space-between;
    }

    .client_progress {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-left: 2rem;


    }

    .mobileview_clientprogress {
        display: flex;
        flex-direction: column;
        width: 290px;
        margin-top: 10px;



    }

    .mob_wrapper1 {

        box-shadow: 0 4px 7px rgba(0, 0, 0, 0.12);
        border-radius: 0.7rem;
        padding: 1rem;
        width: auto;
        height: auto;
        margin-right: 1rem;
        margin-left: 1rem;
    }

    .client_data {
        font-size: 0.8rem;
        text-align: right;
    }

    .list1 {
        display: flex;
        gap: 8rem;
    }

    .list2 {
        display: flex;
        gap: 9rem;
    }

    .steps {
        width: 100%;
        display: flex;

        align-items: center;
        padding: 10px;
    }
}
</style>

<body>
    <div class="client_progress">
        <div class="dashboard_container3">
            <div style="font-size:40px; font-weight:400">Client Progress</div>
            <div class="details">
                <a href="client_detailed_progress.php"><button id="details">View Detailed Progress</button></a>
            </div>

        </div>
        <?php
$query = "SELECT `client_id`,`name` FROM `addclient` WHERE dietitianuserID = '$dietitian_id' AND status = 1;";
$data = fetchData($query);
?>
        <div class="dashboard_container4">

            <div class="container4_wrapper1">
                <div style="width: 25%;"></div>
                <div class="symbols-container col-12">
                    <div class="symbols col-2"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame.svg" style="width:1.8rem"><span>Steps</span></div>
                    <div class="symbols col-2"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame-1.svg" style="width:2rem; margin-left:-18px;"><span>Heart Rate</span></div>
                    <div class="symbols col-2"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame-2.svg" style="width:1.8rem; margin-left:18px;"><span>Water</span></div>
                    <div class="symbols col-2"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame-3.svg" style="width:1.8rem; margin-left:18px;"><span>Sleep</span></div>
                    <div class="symbols col-2"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame-4.svg" style="width:1.8rem"><span>Weight</span></div>
                    <div class="symbols col-2"><img src="<?= $DEFAULT_PATH ?>assets/images/Frame-5.svg" style="width:1.8rem"><span>Calories</span></div>
                </div>
            </div>
            <?php
if(!empty($data)){
    $count = count($data);
    
    for($i = 0; $i<$count; $i++){
        $infom = fetchInformation($data[$i]['client_id']);
?>
            <div class="container4_wrapper2">
                <div class="show" style="font-size:400">
                    <span style="width: 25%;">
                        <a href=""
                            style="background-color:#FDFDFD; color:black;font-weight:400; font-size:20px; border:none; margin-top:1rem;text-decoration:none !important">
                            <img src="<?=$DEFAULT_PATH?>assets/images/ronald.svg"
                                style="width:2rem; background-color:#FDFDFD;border-radius:1rem">
                            <?php echo($data[$i]['name']) ?></a>
                    </span>
                </div>
                <div class="values-container col-12">
                    <span class="col-2"><a style="text-decoration:none !important"
                            href="track_stats_steps.php?client_id=<?php echo($data[$i]['client_id']) ?>"
                            class="values"><?php echo($infom['steps']['progress'] . '/' . $infom['steps']['goal']) ?></a></span>
                    <span class="col-2"><a style="text-decoration:none !important"
                            href="track_stats_heart.php?client_id=<?php echo($data[$i]['client_id']) ?>"
                            class="values"><?php echo($infom['heart']['progress']) ?> Bpm</a></span>
                    <span class="col-2"><a style="text-decoration:none !important"
                            href="track_stats_water.php?client_id=<?php echo($data[$i]['client_id']) ?>"
                            class="values"><?php echo($infom['water']['progress'] . '/' . $infom['water']['goal']) ?>
                            ltrs</a></span>
                    <span class="col-2"><a style="text-decoration:none !important"
                            href="track_stats_sleep.php?client_id=<?php echo($data[$i]['client_id']) ?>"
                            class="values"><?php echo(round($infom['sleep']['progress'],2) . '/' . $infom['sleep']['goal']) ?>
                            hrs.</a></span>
                    <span class="col-2"><a style="text-decoration:none !important"
                            href="track_stats_weight.php?client_id=<?php echo($data[$i]['client_id']) ?>"
                            class="values"><?php echo($infom['weight']['progress'] . '/' . $infom['weight']['goal']) ?>
                            kg</a></span>
                    <span class="col-2"><a style="text-decoration:none !important"
                            href="track_stats_calorie.php?client_id=<?php echo($data[$i]['client_id']) ?>"
                            class="values"><?php echo($infom['calorie']['progress'] . '/' . $infom['calorie']['goal']) ?>
                            kcal</a></span>
                </div>
            </div>
            <?php
    }
}
?>
        </div>
    </div>



    <!----------------------------MOBILE VIEW OF CLIENT PROGRESSS-------------------->
    <?php
if(!empty($data)){
    $count = count($data);
    
    for($i = 0; $i<$count; $i++){
        $infom = fetchInformation($data[$i]['client_id']);
?>
<div class="mobile-card-container">
    <div class="mobileview_clientprogress">

        <div class="mob_wrapper1">
            <span style="display:flex;justify-content:center;"><a href=""
                    style=" color:black;font-weight:500; border:none;background-color:none;text-decoration:none !important "><span><img
                            src="<?=$DEFAULT_PATH?>assets/images/ronald.svg" style="width:2rem;border-radius:1rem">
                        <?php echo($data[$i]['name']) ?></span></a></span>
            <div class="row1" style="display:flex ; justify-content:space-between">
                <div class="steps">
                    <div class="symbols">
                        <div style="color:#F6A682"><img src="<?=$DEFAULT_PATH?>assets/images/Frame.svg"
                                style="width:1.8rem"></div>
                        <div style="margin-top:0.2rem; font-weight:500"><span>Steps</span></div>
                    </div>
                    <span class="client_data"
                        style="color:#454545"><?php echo($infom['steps']['progress'] . '/' . $infom['steps']['goal']) ?></span>
                </div>
                <div class="steps">
                    <div class="symbols">
                        <div style="color:#EF80B2"><img src="<?=$DEFAULT_PATH?>assets/images/Frame-1.svg"
                                style="width:1.8rem"></div>
                        <div style="margin-top:0.2rem; font-weight:500"><span>Heart Rate</span></div>
                    </div>
                    <span class="client_data"
                        style="font-size:0.9rem;color:#454545"><?php echo($infom['heart']['progress']) ?> bpm</span>
                </div>
            </div>

            <div class="row2" style="display:flex; justify-content:space-between">
                <div class="steps">
                    <div class="symbols">
                        <div style="color:#8FAFF3"><img src="<?=$DEFAULT_PATH?>assets/images/Frame-2.svg"
                                style="width:1.8rem"></div>
                        <div style="margin-top:0.2rem; font-weight:500"><span>Water</span></div>
                    </div>
                    <span class="client_data"
                        style="color:#454545"><?php echo($infom['water']['progress'] . '/' . $infom['water']['goal']) ?>
                        ltrs</span>
                </div>
                <div class="steps">
                    <div class="symbols">
                        <div style="color:#7550E2"><img src="<?=$DEFAULT_PATH?>assets/images/Frame-3.svg"
                                style="width:1.8rem"></div>
                        <div style="margin-top:0.2rem; font-weight:500"><span>Sleep</span></div>
                    </div>
                    <span class="client_data"
                        style="color:#454545"><?php echo(round($infom['sleep']['progress'],2) . '/' . $infom['sleep']['goal']) ?>
                        hrs.</span>
                </div>
            </div>

            <div class="row3" style="display:flex ; justify-content:space-between">
                <div class="steps">
                    <div class="symbols">
                        <div style="color:#788F96"><img src="<?=$DEFAULT_PATH?>assets/images/Frame-4.svg"
                                style="width:1.8rem"></div>
                        <div style="margin-top:0.2rem; font-weight:500"><span>Weight</span></div>
                    </div>
                    <span class="client_data"
                        style="color:#454545"><?php echo($infom['weight']['progress'] . '/' . $infom['weight']['goal']) ?>
                        kg</span>
                </div>
                <div class="steps">
                    <div class="symbols">
                        <div style="color:#E388A0"><img src="<?=$DEFAULT_PATH?>assets/images/Frame-5.svg"
                                style="width:1.8rem"></div>
                        <div style="margin-top:0.2rem; font-weight:500"><span>Calories</span></div>
                    </div>
                    <span class="client_data"
                        style="color:#454545"><?php echo($infom['calorie']['progress'] . '/' . $infom['calorie']['goal']) ?>
                        kcal</span>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
    }
}
?>



    <?php require('constant/scripts.php');?>
</body>

</html>