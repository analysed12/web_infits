<?php

require "connect.php";

$day = $_POST['day'];
$client_id = $_POST['client_id'];
$stmt = $conn->prepare("select $day from diet_chart where client_id = $client_id;");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($diet);
$stmt->fetch();
echo $diet;
?>