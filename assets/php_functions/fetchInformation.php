<?php

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