<style>
    .card-details {
        font-size: 16px; /* Adjust the font size as needed */
        text-align: center;
        font-family: Poppins;
    }

    .card-details p {
        margin-top: 10px;
    }

    .card-details strong {
        font-size: 18px; /* Adjust the font size for strong elements */
    }

    .card-details .card-image {
        max-width: 100%; /* Ensure the image doesn't exceed its container */
        margin-bottom: 10px; /* Add some spacing between the image and other details */
    }
</style>

<?php
function formatDate($date) {
    return date("M d, Y", strtotime($date));
}

require('constant/config.php');

if (isset($_GET['planId'])) {
    $planId = $_GET['planId'];
    error_log("Plan ID: " . $planId);

    $stmt = $conn->prepare("SELECT * FROM create_plan WHERE plan_id = ?");
    $stmt->bind_param("i", $planId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $cardDetails = "<div class='card-details'>";
            
            // Include the image using the provided URL
            $cardDetails .= "<img src='assets/images/fruit_salad.svg' class='card-image' alt='" . $row['name'] . "'>";

            $cardDetails .= "<h2 style='font-size: 24px; text-align: center; font-family: Poppins; margin-bottom: 10px;'>" . $row['name'] . "</h2>";
            $cardDetails .= "<p><strong>Tags:</strong> " . $row['tags'] . "</p>";
            $cardDetails .= "<p><strong>Start Date:</strong> " . formatDate($row['start_date']) . "</p>";
            $cardDetails .= "<p><strong>End Date:</strong> " . formatDate($row['end_date']) . "</p>";
            $cardDetails .= "<p><strong>Features:</strong> " . nl2br($row['features']) . "</p>";
            $cardDetails .= "<p><strong>Price:</strong> Rs. " . number_format($row['price'], 2) . "/month</p>";
            $cardDetails .= "</div>";

            echo $cardDetails;
        } else {
            echo "Plan details not found";
        }
    } else {
        error_log("Error executing the query: " . $stmt->error);
        echo "Something went wrong. Please try again later.";
    }

    $stmt->close();
} else {
    echo "Plan ID not provided";
}

$conn->close();
?>
