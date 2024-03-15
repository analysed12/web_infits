<?php
require "conn.php"; // Assuming your database connection details are in 'conn.php'

// Assuming the encrypted_text and phrase_key values are received via POST
$encrypted_text = mysqli_real_escape_string($conn, $_POST['encrypted_text']);
$phrase_key = mysqli_real_escape_string($conn, $_POST['phrase_key']);

$sql = "SELECT encrypted_text, phrase_key, original_text FROM data_test WHERE encrypted_text = ? AND phrase_key = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $encrypted_text, $phrase_key);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $products = array();

    while ($row = $result->fetch_assoc()) {
        $temp = array();
        $temp['encrypted_text'] = $row['encrypted_text'];
        $temp['phrase_key'] = $row['phrase_key'];
        $temp['original_text'] = $row['original_text'];

        $products[] = $temp;
    }

    echo json_encode($products);
} else {
    echo "failure";
}
?>
