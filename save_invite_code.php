<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inviteCode = $_POST['inviteCode'];
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'intern';

    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Prepare the SQL statement to insert the invite code into the table
    $stmt = $conn->prepare('INSERT INTO live (invite_code) VALUES (?)');
    
    if (!$stmt) {
        die('Error: ' . $conn->error);
    }
    
    // Bind parameters
    $stmt->bind_param('s', $inviteCode);

    // Execute the statement
    if ($stmt->execute()) {
        echo 'Invite code saved successfully.';
    } else {
        echo 'Error: ' . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
