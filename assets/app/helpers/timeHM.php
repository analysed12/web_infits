<?php

// setting up the time Zone
// It Depends on your location or your P.c settings
// define('TIMEZONE', );
date_default_timezone_set('Asia/Calcutta');

function last_time($date_time)
{
    // $var = date('H:i');
    // $timestamp = strtotime($date_time); 
    // $var = TIME_FORMAT($timestamp, '%H:%i');
    // return $var;
    $timestamp = strtotime($date_time);
    
    return  date("H:i", $timestamp);
    // echo "Created date is " . date("Y-m-d h:i:sa", $d);

    //For date
    // $strTime = array("second", "minute", "hour", "day", "month", "year");
    // $length = array("60", "60", "24", "30", "12", "10");

    // $currentTime = time();
    // if ($currentTime >= $timestamp) {
    //     $diff     = time() - $timestamp;
    //     for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
    //         $diff = $diff / $length[$i];
    //     }

    //     $diff = round($diff);
    //     if ($diff < 59 && $strTime[$i] == "second") {
    //         return date("H:i", $timestamp);
    //     } else if($i > 2 ){
    //         return  date("d/m/y", $timestamp);
    //     }else{
    //         return  date("H:i", $timestamp);
    //     }
    // }
  
}


