<?php
$conn = new mysqli("www.db4free.net", "infits_free_test", "EH6.mqRb9QBdY.U", "infits_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$encrypted_text = $_POST['encrypted_text'];
$phrase_key = $_POST['phrase_key'];
$original_text = $_POST['original_text'];
$sql = "insert into data_test (encrypted_text,phrase_key,original_text) VALUES ('$encrypted_text','$phrase_key',
	'$original_text');";
try {
    if ($conn->query($sql)) {
        echo "success";
    }
} catch (mysqli_sql_exception $th) {
    echo $th;
}
