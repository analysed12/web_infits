<?php

$sql = "SELECT * 
FROM watertracker
WHERE clientID='$clientID' AND `date` between '$from' and '$to' AND `time` IN (
  SELECT MAX(`time`) 
  FROM watertracker
    
  GROUP BY DATE(`date`)
 );";

?>
