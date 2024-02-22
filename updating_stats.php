<?php 
function fetchData($query)
{
    // echo $query;
    // include('constant/config.php');
    require('constant/config.php');
    $result = $conn->query($query) or die("Query Failed");

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $conn->close();
    return ($data);
}
function fetchInformation($client_id)
{
    date_default_timezone_set("Asia/Calcutta");
    $date = new DateTime();
    $data = array(
        'steps' => array(
            'goal' => 0,
            'progress' => 0,
        ),
        'heart' => array(
            'goal' => 0,
            'progress' => 0,
        ),
        'water' => array(
            'goal' => 0,
            'progress' => 0,
        ),
        'sleep' => array(
            'goal' => 0,
            'progress' => 0,
        ),
        'weight' => array(
            'goal' => 0,
            'progress' => 0,
        ),
        'calorie' => array(
            'goal' => 0,
            'progress' => 0,
        ),
        'client_id'=>$client_id,
        'name'=>'',
    );
    $query = "SELECT steps FROM goals WHERE client_id = '$client_id'";
    $value = fetchData($query);
    if (!empty($value)) {
        $data['steps']['goal'] = $value[0]['steps'];
    } else {
        $data['steps']['goal'] = 0;
    }
    $query = "SELECT water FROM goals WHERE client_id = '$client_id'";
    $value = fetchData($query);
    if (!empty($value)) {
        $data['water']['goal'] = $value[0]['water'];
    } else {
        $data['water']['goal'] = 0;
    }
    $query = "SELECT sleep FROM goals WHERE client_id = '$client_id'";
    $value = fetchData($query);
    if (!empty($value)) {
        $data['sleep']['goal'] = $value[0]['sleep'];
    } else {
        $data['sleep']['goal'] = 0;
    }
    $query = "SELECT weight FROM goals WHERE client_id = '$client_id'";
    $value = fetchData($query);
    if (!empty($value)) {
        $data['weight']['goal'] = $value[0]['weight'];
    } else {
        $data['weight']['goal'] = 0;
    }
    $query = "SELECT calorie FROM goals WHERE client_id = '$client_id'";
    $value = fetchData($query);
    if (!empty($value)) {
        $data['calorie']['goal'] = $value[0]['calorie'];
    } else {
        $data['calorie']['goal'] = 0;
    }

    $query = "SELECT SUM(steps) FROM steptracker WHERE client_id= '$client_id' AND `dateandtime` >= '{$date->format('y-m-d')} 00:00:00' AND `dateandtime` <= '{$date->format('y-m-d')} 23:59:59'";
    $value = fetchData($query);
    if ($value[0]['SUM(steps)'] != '') {
        $data['steps']['progress'] = $value[0]['SUM(steps)'];
    } else {
        $data['steps']['progress'] = 0;
    }

    $query = "SELECT avg(average) FROM heartrate WHERE client_id= '$client_id' AND `dateandtime` >= '{$date->format('y-m-d')} 00:00:00' AND `dateandtime` <= '{$date->format('y-m-d')} 23:59:59'";
    $value = fetchData($query);
    if ($value[0]['avg(average)'] != '') {
        $data['heart']['progress'] = $value[0]['avg(average)'];
    } else {
        $data['heart']['progress'] = 0;
    }

    $query = "SELECT SUM(drinkConsumed) FROM watertracker WHERE client_id= '$client_id' AND  `dateandtime` = '{$date->format('y-m-d')}'";
    $value = fetchData($query);
    if ($value[0]['SUM(drinkConsumed)'] != '') {
        $data['water']['progress'] = $value[0]['SUM(drinkConsumed)'];
    } else {
        $data['water']['progress'] = 0;
    }

    $query = "SELECT SUM(hrsSlept) FROM sleeptracker WHERE client_id= '$client_id' AND `sleeptime` >= '{$date->format('y-m-d')} 00:00:00' AND `waketime` <= '{$date->format('y-m-d')} 23:59:59'";
    $hours = fetchData($query)[0]['SUM(hrsSlept)'];
    $query = "SELECT SUM(minsSlept) FROM sleeptracker WHERE client_id= '$client_id' AND `sleeptime` >= '{$date->format('y-m-d')} 00:00:00' AND `waketime` <= '{$date->format('y-m-d')} 23:59:59'";
    $mins = fetchData($query)[0]['SUM(minsSlept)'];
    $data['sleep']['progress'] = (float) $hours + $mins / 60;

    $query = "SELECT avg(weight) FROM weighttracker WHERE client_id= '$client_id' AND `dateandtime` >= '{$date->format('y-m-d')} 00:00:00' AND `dateandtime` <= '{$date->format('y-m-d')} 23:59:59'";
    $value = fetchData($query);
    if ($value[0]['avg(weight)'] != '') {
        $data['weight']['progress'] = $value[0]['avg(weight)'];
    } else {
        $data['weight']['progress'] = 0;
    }

    $query = "SELECT SUM(caloriesconsumed) FROM calorietracker WHERE client_id= '$client_id' AND `dateandtime` >= '{$date->format('y-m-d')} 00:00:00' AND `dateandtime` <= '{$date->format('y-m-d')} 23:59:59'";
    $value = fetchData($query);
    if ($value[0]['SUM(caloriesconsumed)'] != '') {
        $data['calorie']['progress'] = $value[0]['SUM(caloriesconsumed)'];
    } else {
        $data['calorie']['progress'] = 0;
    }

    return $data;
}  
function fetchDataSql($clientId, $from_date, $to_date, $isCustom = 0)
{
    require('constant/config.php');
    // For Sum of All Data Till Today
    if ($isCustom == 1) {
        $query = "SELECT SUM(average) FROM heartrate WHERE client_id= '$clientId' AND 
                `dateandtime` <= '{$to_date} 23:59:59';";
        // for sum of Data between two dates
    } else if ($isCustom == 2) {
        $query = "SELECT SUM(average) FROM heartrate WHERE client_id= '$clientId' AND 
                `dateandtime` >= '{$from_date} 00:00:00'
                AND `dateandtime` <= '{$to_date} 23:59:59';";
        // for average of data end to end (monthly)
    } else if ($isCustom == 3) {
        $query = "SELECT avg(average) FROM heartrate WHERE client_id= '$clientId' AND 
            `dateandtime` >= '{$from_date} 00:00:00'
            AND `dateandtime` < '{$to_date} 00:00:00';";
        // for get latest goal from goals table
    } else if ($isCustom == 4) {
        $query = "SELECT heart FROM goals WHERE client_id = {$clientId}";
        // for getting past actvities 
    } else if ($isCustom == 5) {
        $query = "SELECT * FROM `heartrate` WHERE client_id = '$clientId' AND `dateandtime` >= '{$from_date} 00:00:00'
        AND `dateandtime` < '{$to_date} 23:59:59' ORDER BY dateandtime DESC;";
        // for average of data of one full day
    } else if ($isCustom == 6) {
        $query = "SELECT SUM(maximum) FROM heartrate WHERE client_id= '$clientId' AND 
                `dateandtime` >= '{$from_date} 00:00:00'
                AND `dateandtime` <= '{$to_date} 23:59:59';";
        // for average of data end to end (monthly)
    } else if ($isCustom == 7) {
        $query = "SELECT SUM(minimum) FROM heartrate WHERE client_id= '$clientId' AND 
                `dateandtime` >= '{$from_date} 00:00:00'
                AND `dateandtime` <= '{$to_date} 23:59:59';";
        // for average of data end to end (monthly)
    } else {
        $query = "SELECT avg(average) FROM heartrate WHERE client_id= '$clientId' AND 
            `dateandtime` >= '{$from_date} 00:00:00'
            AND `dateandtime` <= '{$to_date} 23:59:59';";
    }
    $result = $conn->query($query) or die("Query Failed");
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $conn->close();
    return ($data);
}
function fetchDataSqlStep($clientId, $from_date, $to_date, $isCustom = 0)
{
    require('constant/config.php');
    // For Sum of All Data Till Today
    if ($isCustom == 1) {
        $query = "SELECT SUM(steps) FROM steptracker WHERE client_id= '$clientId' AND 
                `dateandtime` <= '{$to_date} 23:59:59';";
        // for sum of Data between two dates
    } else if ($isCustom == 2) {
        $query = "SELECT SUM(steps) FROM steptracker WHERE client_id= '$clientId' AND 
                `dateandtime` >= '{$from_date} 00:00:00'
                AND `dateandtime` <= '{$to_date} 23:59:59';";
        ;
        // for average of data end to end (monthly)
    } else if ($isCustom == 3) {
        $query = "SELECT avg(steps) FROM steptracker WHERE client_id= '$clientId' AND 
            `dateandtime` >= '{$from_date} 00:00:00'
            AND `dateandtime` < '{$to_date} 00:00:00';";
        // for get latest goal from goals table
    } else if ($isCustom == 4) {
        $query = "SELECT steps FROM goals WHERE client_id = '$clientId'";
        // for getting past actvities 
    } else if ($isCustom == 5) {
        $query = "SELECT * FROM `steptracker` WHERE client_id = '$clientId' AND `dateandtime` >= '{$from_date} 00:00:00'
        AND `dateandtime` < '{$to_date} 23:59:59' ORDER BY dateandtime DESC;";
        // for average of data of one full day
    } else if ($isCustom == 6) {
        $query = "SELECT SUM(distance) FROM steptracker WHERE client_id= '$clientId' AND 
                `dateandtime` >= '{$from_date} 00:00:00'
                AND `dateandtime` <= '{$to_date} 23:59:59';";
        ;
        // for average of data end to end (monthly)
    } else if ($isCustom == 7) {
        $query = "SELECT SUM(calories) FROM steptracker WHERE client_id= '$clientId' AND 
                `dateandtime` >= '{$from_date} 00:00:00'
                AND `dateandtime` <= '{$to_date} 23:59:59';";
        ;
        // for average of data end to end (monthly)
    } else {
        $query = "SELECT avg(steps) FROM steptracker WHERE client_id= '$clientId' AND 
            `dateandtime` >= '{$from_date} 00:00:00'
            AND `dateandtime` <= '{$to_date} 23:59:59';";
    }
    $result = $conn->query($query) or die("Query Failed");
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $conn->close();
    return ($data);
}
function fetchDataSqlsleep($clientId, $from_date, $to_date, $isCustom = 0)
{
    require('constant/config.php');
    // For Sum of All Data Till Today
    if ($isCustom == 1) {
        $query = "SELECT SUM(hrsSlept) FROM sleeptracker WHERE client_id= '$clientId' AND 
                `sleeptime` <= '{$to_date} 23:59:59';";
        // for sum of Data between two dates
    } else if ($isCustom == 2) {
        $query = "SELECT SUM(hrsSlept) FROM sleeptracker WHERE client_id= '$clientId' AND 
                `sleeptime` >= '{$from_date} 00:00:00'
                AND `sleeptime` <= '{$to_date} 23:59:59';";
        // for average of data end to end (monthly)
    } else if ($isCustom == 3) {
        $query = "SELECT avg(hrsSlept) FROM sleeptracker WHERE client_id= '$clientId' AND 
            `sleeptime` >= '{$from_date} 00:00:00'
            AND `sleeptime` < '{$to_date} 00:00:00';";
        // for get latest goal from goals table
    } else if ($isCustom == 4) {
        $query = "SELECT sleep FROM goals WHERE client_id = {$clientId}";
        // for getting past actvities 
    } else if ($isCustom == 5) {
        $query = "SELECT * FROM `sleeptracker` WHERE client_id = '$clientId' AND `sleeptime` >= '{$from_date} 00:00:00'
        AND `sleeptime` < '{$to_date} 23:59:59' ORDER BY sleeptime DESC;";
        // for average of data of one full day
    } else if ($isCustom == 6) {
        $query = "SELECT SUM(minsSlept) FROM sleeptracker WHERE client_id= '$clientId' AND 
                `sleeptime` >= '{$from_date} 00:00:00'
                AND `sleeptime` <= '{$to_date} 23:59:59';";
        // for average of data end to end (monthly)
    } else {
        $query = "SELECT avg(hrsSlept) FROM sleeptracker WHERE client_id= '$clientId' AND 
            `sleeptime` >= '{$from_date} 00:00:00'
            AND `sleeptime` <= '{$to_date} 23:59:59';";
    }
    $result = $conn->query($query) or die("Query Failed");
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $conn->close();
    return ($data);
}
function fetchDataSqlwater($clientId, $from_date, $to_date, $isCustom = 0)
{
    require('constant/config.php');
    // For Sum of All Data Till Today
    if ($isCustom == 1) {
        $query = "SELECT SUM(amount) FROM watertracker WHERE client_id= '$clientId' AND 
                `dateandtime` <= '{$to_date} 23:59:59';";
        // for sum of Data between two dates
    } else if ($isCustom == 2) {
        $query = "SELECT SUM(amount) FROM watertracker WHERE client_id= '$clientId' AND 
                `dateandtime` >= '{$from_date} 00:00:00'
                AND `dateandtime` <= '{$to_date} 23:59:59';";
        ;
        // for average of data end to end (monthly)
    } else if ($isCustom == 3) {
        $query = "SELECT avg(amount) FROM watertracker WHERE client_id= '$clientId' AND 
            `dateandtime` >= '{$from_date} 00:00:00'
            AND `dateandtime` < '{$to_date} 00:00:00';";
        // for get latest goal from goals table
    } else if ($isCustom == 4) {
        $query = "SELECT water FROM goals WHERE client_id = {$clientId}";
        // for getting past actvities 
    } else if ($isCustom == 5) {
        $query = "SELECT * FROM `watertracker` WHERE client_id = '$clientId' AND `dateandtime` >= '{$from_date} 00:00:00'
        AND `dateandtime` < '{$to_date} 23:59:59' ORDER BY dateandtime DESC;";
        // for average of data of one full day
    } else {
        $query = "SELECT avg(amount) FROM watertracker WHERE client_id= '$clientId' AND 
            `dateandtime` >= '{$from_date} 00:00:00'
            AND `dateandtime` <= '{$to_date} 23:59:59';";
    }
    $result = $conn->query($query) or die("Query Failed");
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $conn->close();
    return ($data);
}
function fetchDataSqlweight($clientId,$from_date, $to_date, $isCustom=0){
    require('constant/config.php');
    if($isCustom==1){
        $query="SELECT avg(weight) FROM `weighttracker` WHERE client_id= '$clientId' AND dateandtime <= '$to_date'";

    }else if($isCustom==2){
        $query = "SELECT avg(weight) FROM `weighttracker` WHERE client_id= '$clientId' AND dateandtime = '$to_date'";

    }else if($isCustom==3){
        $query="SELECT avg(weight) FROM `weighttracker` WHERE client_id= '$clientId' AND dateandtime BETWEEN '$from_date' AND '$to_date'";

    }else if($isCustom==4){
        $query="SELECT weight FROM goals WHERE client_id = {$clientId}";
    }else if($isCustom==5){
        $query = "SELECT * FROM `weighttracker` WHERE client_id= '$clientId' AND dateandtime BETWEEN '$from_date' AND '$to_date'";
    }

    $result = $conn->query($query) or die("Query Failed");
    $data = array();
    while($row = $result->fetch_assoc()){
        $data[] =  $row;
    }
    $conn->close();
    return ($data);
}
function fetchDataSqlcal($clientId, $from_date, $to_date, $isCustom = 0)
{
    require('constant/config.php');
    // For Sum of All Data Till Today
    if ($isCustom == 1) {
        $query = "SELECT SUM(caloriesConsumed) FROM calorietracker WHERE client_id= '$clientId' AND 
                `dateandtime` <= '{$to_date} 23:59:59';";
        // for sum of Data between two dates
    } else if ($isCustom == 2) {
        $query = "SELECT SUM(caloriesConsumed) FROM calorietracker WHERE client_id= '$clientId' AND 
                `dateandtime` >= '{$from_date} 00:00:00'
                AND `dateandtime` <= '{$to_date} 23:59:59';";
        ;
        // for average of data end to end (monthly)
    } else if ($isCustom == 3) {
        $query = "SELECT avg(caloriesConsumed) FROM calorietracker WHERE client_id= '$clientId' AND 
            `dateandtime` >= '{$from_date} 00:00:00'
            AND `dateandtime` < '{$to_date} 00:00:00';";
        // for get latest goal from goals table
    } else if ($isCustom == 4) {
        $query = "SELECT calorie FROM goals WHERE client_id = {$clientId}";
        // for getting past actvities 
    } else if ($isCustom == 5) {
        $query = "SELECT * FROM `calorietracker` WHERE client_id = '$clientId' AND `dateandtime` >= '{$from_date} 00:00:00'
        AND `dateandtime` < '{$to_date} 23:59:59' ORDER BY dateandtime DESC;";
        // for average of data of one full day
    } else {
        $query = "SELECT avg(caloriesConsumed) FROM calorietracker WHERE client_id= '$clientId' AND 
            `dateandtime` >= '{$from_date} 00:00:00'
            AND `dateandtime` <= '{$to_date} 23:59:59';";
    }
    $result = $conn->query($query) or die("Query Failed");
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $conn->close();
    return ($data);
}
if (isset($_POST['updating'])){
    if ($_POST['updating']==="1"){
        $today = new DateTime();
        $clientId = $_POST['client_id'];
        $allDataSum = fetchDataSql($clientId, '', $today->format('Y-3-d'), 1)[0]['SUM(average)'];
        // Today Data Sum
        $todayData = fetchDataSql($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 2)[0]['SUM(average)'];
        // Week Average
        $pastWeek = new DateTime();
        $pastWeek->modify('-1 week');
        $weekAvg = fetchDataSql($clientId, $pastWeek->format('Y-m-d'), $today->format('Y-m-d'))[0]['avg(average)'];
        // Month Average
        $pastMonth = new DateTime();
        $pastMonth->modify('-1 month');
        $monthAvg = fetchDataSql($clientId, $pastMonth->format('Y-m-d'), $today->format('Y-m-d'))[0]['avg(average)'];
    
        $progressBarData = fetchDataSql($clientId, '', '', 4);
        $calorieConsumed = fetchDataSql($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 2);
        $heartRateM = fetchDataSql($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 6);
        $heartRatem = fetchDataSql($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 7);
        if (empty($heartRateM)) {
            $heartRateM = 0;
        } else {
            $heartRateM = $heartRateM[0]['SUM(maximum)'];
        }
        if (empty($heartRatem)) {
            $heartRatem = 0;
        } else {
            $heartRatem = $heartRatem[0]['SUM(minimum)'];
        }
        if (empty($calorieConsumed)) {
            $calorieConsumed = 0;
        } else {
            $calorieConsumed = $calorieConsumed[0]['SUM(average)'];
        }
        if (empty($progressBarData) or $progressBarData[0]['heart'] == 0) {
            $currentGoal = 0;
            $progressPercent = 0;
        } else {
            $progressPercent = $calorieConsumed;
        }
        $responsedata = json_encode(array(
            "d"=>$todayData,
            "w"=>$weekAvg,
            "m"=>$monthAvg,
            "t"=>$allDataSum,
            "sh"=>$calorieConsumed,
            "avg"=>$calorieConsumed,
            "low"=>$heartRatem,
            "max"=>$heartRateM,
        ));
        header("Content-type: application/json");
        print_r($responsedata);
        exit;
    }else if ($_POST['updating']==="0"){
        $dietitian_id=$_POST['dietitian_id'];
        // echo $dietitian_id;
        $query = "SELECT `client_id`,`name` FROM `addclient` WHERE dietitian_id = '$dietitian_id'";
        // echo $query
        $data = fetchData($query);
        $recordeddata=array();
        if (!empty($data)) {
            $lim = 5;
            if ($lim > count($data)) {
                $lim = count($data);
            }
            for ($i = 0; $i < $lim; $i++) {
                $infom = fetchInformation($data[$i]['client_id']);
                $infom['name']=$data[$i]['name'];
                $recordeddata["id$i"]=json_encode($infom);
            }
            print_r(json_encode($recordeddata));
        }
        exit;
    }else if ($_POST['updating']==="2"){
        $today = new DateTime();
        $clientId = $_POST['client_id'];
        // All Data Total Sum
        $allDataSum = fetchDataSqlStep($clientId, '', $today->format('Y-3-d'), 1)[0]['SUM(steps)'];
        // Today Data Sum
        $todayData = fetchDataSqlStep($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 2)[0]['SUM(steps)'];
        $todayDatad = fetchDataSqlStep($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 6)[0]['SUM(distance)'];
        $todayDatac = fetchDataSqlStep($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 7)[0]['SUM(calories)'];
        // Week Average
        $pastWeek = new DateTime();
        $pastWeek->modify('-1 week');
        $weekAvg = fetchDataSqlStep($clientId, $pastWeek->format('Y-m-d'), $today->format('Y-m-d'))[0]['avg(steps)'];
        // Month Average
        $pastMonth = new DateTime();
        $pastMonth->modify('-1 month');
        $monthAvg = fetchDataSqlStep($clientId, $pastMonth->format('Y-m-d'), $today->format('Y-m-d'))[0]['avg(steps)'];
        $progressBarData = fetchDataSqlStep($clientId, '', '', 4);
        $calorieConsumed = fetchDataSqlStep($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 2);
        if (empty($calorieConsumed)) {
            $calorieConsumed = 0;
        } else {
            $calorieConsumed = $calorieConsumed[0]['SUM(steps)'];
        }
        if (empty($progressBarData) or $progressBarData[0]['steps'] == 0) {
            $currentGoal = 0;
            $progressPercent = 0;
        } else {
            $currentGoal = $progressBarData[0]['steps'];
            $progressPercent = round(($calorieConsumed / $currentGoal) * 100, 2);
        }
        $calorieRemaining = (int) $currentGoal - (int) $calorieConsumed;
        $responsedata = json_encode(array(
            "d"=>$todayData,
            "w"=>$weekAvg,
            "m"=>$monthAvg,
            "t"=>$allDataSum,
            "pp"=>$progressPercent,
            "dg"=>$currentGoal,
            "wg"=>(7 * $currentGoal),
            "mg"=>(30 * $currentGoal),
            "st"=>ceil($todayData),
            "di"=>ceil($todayDatad),
            "bu"=>ceil($todayDatac),
        ));
        header("Content-type: application/json");
        echo ($responsedata);
        exit;
    }else if ($_POST['updating']==="3"){
        $today = new DateTime();
        $clientId = $_POST['client_id'];
        // All Data Total Sum
        $allDataSum = fetchDataSqlsleep($clientId, '', $today->format('Y-3-d'), 1)[0]['SUM(hrsSlept)'];
        // Today Data Sum
        $todayData = fetchDataSqlsleep($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 2)[0]['SUM(hrsSlept)'];
        // Week Average
        $pastWeek = new DateTime();
        $pastWeek->modify('-1 week');
        $weekAvg = fetchDataSqlsleep($clientId, $pastWeek->format('Y-m-d'), $today->format('Y-m-d'))[0]['avg(hrsSlept)'];
        // Month Average
        $pastMonth = new DateTime();
        $pastMonth->modify('-1 month');
        $monthAvg = fetchDataSqlsleep($clientId, $pastMonth->format('Y-m-d'), $today->format('Y-m-d'))[0]['avg(hrsSlept)'];
        $progressBarData = fetchDataSqlsleep($clientId, '', '', 4);
        $sleepConsumed = fetchDataSqlsleep($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 2);
        $sleepConsumedl = fetchDataSqlsleep($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 6);
        $progressPercenta=0;
        if (empty($sleepConsumed)) {
            $sleepConsumed = 0;
        } else {
            $sleepConsumed = $sleepConsumed[0]['SUM(hrsSlept)'];
        }
        if (empty($sleepConsumedl)) {
            $sleepConsumedl = 0;
        } else {
            $sleepConsumedl = $sleepConsumedl[0]['SUM(minsSlept)'];
        }
        if (empty($progressBarData) or $progressBarData[0]['sleep'] == 0) {
            $currentGoal = 0;
            $progressPercent = 0;
        } else {
            $currentGoal = $progressBarData[0]['sleep'];
            if ($currentGoal != 0) {
                $progressPercent = round(($sleepConsumed / $currentGoal) * 100, 2);
                $progressPercenta = round(((24 - $sleepConsumed) / 24) * 100, 2);
            } else {
                $progressPercent = 0;
                $progressPercenta = 0;
            }
        }
        $sleepRemaining = (int) $currentGoal - (int) $sleepConsumed;
        $responsedata = json_encode(array(
            "d"=>$todayData,
            "w"=>$weekAvg,
            "m"=>$monthAvg,
            "t"=>$allDataSum,
            "pp"=>$progressPercent,
            "ap"=>$progressPercenta,
            "ds"=>$progressPercent,
            "ls"=>$sleepConsumedl
        ));
        header("Content-type: application/json");
        echo ($responsedata);
        exit;
    }else if ($_POST['updating']==="4"){
        $today = new DateTime();
        $clientId = $_POST['client_id'];
        // All Data Total Sum
        $allDataSum = fetchDataSqlwater($clientId, '', $today->format('Y-3-d'), 1)[0]['SUM(amount)'];
        // Today Data Sum
        $todayData = fetchDataSqlwater($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 2)[0]['SUM(amount)'];
        // Week Average
        $pastWeek = new DateTime();
        $pastWeek->modify('-1 week');
        $weekAvg = fetchDataSqlwater($clientId, $pastWeek->format('Y-m-d'), $today->format('Y-m-d'))[0]['avg(amount)'];
        // Month Average
        $pastMonth = new DateTime();
        $pastMonth->modify('-1 month');
        $monthAvg = fetchDataSqlwater($clientId, $pastMonth->format('Y-m-d'), $today->format('Y-m-d'))[0]['avg(amount)'];
        $progressBarData = fetchDataSqlwater($clientId, '', '', 4);
            $calorieConsumed = fetchDataSqlwater($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 2);
            if (empty($calorieConsumed)) {
                $calorieConsumed = 0;
            } else {
                $calorieConsumed = $calorieConsumed[0]['SUM(amount)'];
            }
            if (empty($progressBarData) or $progressBarData[0]['water'] == 0) {
                $currentGoal = 0;
                $progressPercent = 0;
            } else {
                $currentGoal = $progressBarData[0]['water'];
                $progressPercent = round(($calorieConsumed / $currentGoal) * 100, 2);
            }
            $calorieRemaining = (int) $currentGoal - (int) $calorieConsumed;
        $responsedata = json_encode(array(
            "d"=>$todayData,
            "w"=>$weekAvg,
            "m"=>$monthAvg,
            "t"=>$allDataSum,
            "pp"=>$progressPercent,
            "tc"=>$calorieRemaining,
            "tr"=>$calorieConsumed
        ));
        header("Content-type: application/json");
        echo ($responsedata);
        exit;
    }else if ($_POST['updating']==="5"){
        $today = new DateTime();
        $clientId = $_POST['client_id'];
        // All Data Total Sum
        $allDataSum = fetchDataSqlweight($clientId, '', $today->format('Y-m-d'), 1)[0]['avg(weight)'];
        $todayData = fetchDataSqlweight($clientId, "", $today->format('Y-m-d'),2)[0]['avg(weight)'];
        $pastWeek =new DateTime();
        $pastWeek->modify('-1 week');
        $weekAvg = fetchDataSqlweight($clientId,$pastWeek->format('Y-m-d'), $today->format('Y-m-d'),3)[0]['avg(weight)'];
        $pastMonth = new DateTime();
        $pastMonth->modify('-1 month');
        $monthAvg = fetchDataSqlweight($clientId,$pastMonth->format('Y-m-d'), $today->format('Y-m-d'),3)[0]['avg(weight)'];
        $progressBarData = fetchDataSqlweight($clientId, "", $today->format('Y-m-d'), 2);
        $yesterday_date = new DateTime();
        $lastweek_date = new DateTime();
        $yesterday_date->modify('-1 day');
        $lastweek_date->modify('-1 week');
        $yesterday_data =  fetchDataSqlweight($clientId, "", $yesterday_date->format('Y-m-d'),2)[0]['avg(weight)'];
        $pastweek_data =  fetchDataSqlweight($clientId, "", $lastweek_date->format('Y-m-d'),2)[0]['avg(weight)'];
        $responsedata = json_encode(array(
            "d"=>$todayData,
            "w"=>$weekAvg,
            "m"=>$monthAvg,
            "t"=>$allDataSum,
            "pp"=>$progressBarData[0]['avg(weight)'],
            "pt"=>($yesterday_data - $progressBarData[0]['avg(weight)']),
            "ow"=>($pastweek_data - $progressBarData[0]['avg(weight)'])
        ));
        header("Content-type: application/json");
        echo ($responsedata);
        exit;
    }else if ($_POST['updating']==="6"){
        $today = new DateTime();
        $clientId = $_POST['client_id'];
        // All Data Total Sum
        $allDataSum = fetchDataSqlcal($clientId, '', $today->format('Y-3-d'), 1)[0]['SUM(caloriesConsumed)'];
        // Today Data Sum
        $todayData = fetchDataSqlcal($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 2)[0]['SUM(caloriesConsumed)'];
        // Week Average
        $pastWeek = new DateTime();
        $pastWeek->modify('-1 week');
        $weekAvg = fetchDataSqlcal($clientId, $pastWeek->format('Y-m-d'), $today->format('Y-m-d'))[0]['avg(caloriesConsumed)'];
        // Month Average
        $pastMonth = new DateTime();
        $pastMonth->modify('-1 month');
        $monthAvg = fetchDataSqlcal($clientId, $pastMonth->format('Y-m-d'), $today->format('Y-m-d'))[0]['avg(caloriesConsumed)'];
        $progressBarData = fetchDataSqlcal($clientId, '', '', 4);
        $calorieConsumed = fetchDataSqlcal($clientId, $today->format('Y-m-d'), $today->format('Y-m-d'), 2);
        if (empty($calorieConsumed)) {
            $calorieConsumed = 0;
        } else {
            $calorieConsumed = $calorieConsumed[0]['SUM(caloriesConsumed)'];
        }
        if (empty($progressBarData) or $progressBarData[0]['calorie'] == 0) {
            $currentGoal = 0;
            $progressPercent = 0;
        } else {
            $currentGoal = $progressBarData[0]['calorie'];
            $progressPercent = round(($calorieConsumed / $currentGoal) * 100, 2);
        }
        $calorieRemaining = (int) $currentGoal - (int) $calorieConsumed;
        $responsedata = json_encode(array(
            "d"=>$todayData,
            "w"=>$weekAvg,
            "m"=>$monthAvg,
            "t"=>$allDataSum,
            "pp"=>$progressPercent,
            "tc"=>((int) $calorieConsumed),
            "tr"=>$calorieRemaining
        ));
        header("Content-type: application/json");
        echo ($responsedata);
        exit;
    }
    else if($_POST['updating']==="7"){
        require('constant/config.php');
        date_default_timezone_set("Asia/Calcutta");
        $today = new DateTime();
        $today = $today->format('Y-m-d');
        $client_id = $_POST['client_id'];
        $sql2 = "SELECT SUM(steps) FROM `steptracker` WHERE client_id = $client_id AND `dateandtime` >= '{$today} 00:00:00' AND `dateandtime` <= '{$today} 23:59:59'; ";
        $result2 = $conn->query($sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $todaysteps = $row2['SUM(steps)'];

        $sql3 = "SELECT SUM(average) FROM `heartrate` WHERE client_id = $client_id AND `dateandtime` >= '{$today} 00:00:00' AND `dateandtime` <= '{$today} 23:59:59'; ";
        $result3 = $conn->query($sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $todayheart = $row3['SUM(average)'];

        $sql4 = "SELECT SUM(amount) FROM `watertracker` WHERE client_id = $client_id AND `dateandtime` >= '{$today} 00:00:00' AND `dateandtime` <= '{$today} 23:59:59'; ";
        $result4 = $conn->query($sql4);
        $row4 = mysqli_fetch_assoc($result4);
        $todaywater = $row4['SUM(amount)'];

        $sql5 = "SELECT SUM(weight) FROM `weighttracker` WHERE client_id = $client_id AND `dateandtime` >= '{$today} 00:00:00' AND `dateandtime` <= '{$today} 23:59:59'; ";
        $result5 = $conn->query($sql5);
        $row5 = mysqli_fetch_assoc($result5);
        $todayweight = $row5['SUM(weight)'];

        $sql6 = "SELECT SUM(hrsSlept), SUM(minsSlept) FROM `sleeptracker` WHERE client_id = $client_id AND `dateandtime` >= '{$today} 00:00:00' AND `dateandtime` <= '{$today} 23:59:59'; ";
        $result6 = $conn->query($sql6);
        $row6 = mysqli_fetch_assoc($result6);
        $todaysleephrs = $row6['SUM(hrsSlept)'];
        $todaysleepmins = $row6['SUM(minsSlept)'];

        $sql7 = "SELECT SUM(caloriesConsumed) FROM `calorietracker` WHERE client_id = $client_id AND `dateandtime` >= '{$today} 00:00:00' AND `dateandtime` <= '{$today} 23:59:59'; ";
        $result7 = $conn->query($sql7);
        $row7 = mysqli_fetch_assoc($result7);
        $todaycalorie = $row7['SUM(caloriesConsumed)'];
        $responsedata = json_encode(array(
            "ts"=>$todaysteps,
            "th"=>$todayheart,
            "tw"=>$todaywater,
            "twe"=>$todayweight,
            "tsh"=>$todaysleephrs,
            "tsm"=>$todaysleepmins,
            "tc"=>$todaycalorie
        ));
        header("Content-type: application/json");
        echo ($responsedata);
        exit;
    }
}

?>