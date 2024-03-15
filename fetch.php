<?php
// Include your database connection file (config.php)
include 'constant/config.php';

// Check if eventID is provided in the POST request
if(isset($_POST['eventID'])) {
    // Sanitize the input to prevent SQL injection
    $eventID = mysqli_real_escape_string($conn, $_POST['eventID']);

    // Query to fetch event details from the database
    $sql = "SELECT * FROM create_event WHERE eventID = '$eventID'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        // Fetch event details
        $row = mysqli_fetch_assoc($result);

        // You can format the data as per your requirement
        $eventDetails = '<div class="event-details">';
        $eventDetails .= '<h2 style="color: blue; font-weight: bold;">' . $row['eventname'] . '</h2>';

        $eventDetails .= '<p><strong>Start Date:</strong> ' . $row['start_date'] . '</p>';
        $eventDetails .= '<p><strong>End Date:</strong> ' . $row['end_date'] . '</p>';
        $eventDetails .= '<p><strong>Client Name:</strong> ' . $row['clientuserID'] . '</p>';
        
        $eventDetails .= '<p><strong>Place:</strong> ' . $row['place_of_meeting'] . '</p>';


        // Add more details as needed
        $eventDetails .= '</div>';

        // Return the event details as JSON response
        echo json_encode(array('success' => true, 'eventDetails' => $eventDetails));
    } else {
        // If event is not found
        echo json_encode(array('success' => false, 'message' => 'Event not found.'));
    }
} else {
    // If eventID is not provided in the request
    echo json_encode(array('success' => false, 'message' => 'Event ID not provided.'));
}
?>
