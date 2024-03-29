<style>
    .card-details {
        font-size: 16px;
        text-align: center;
        font-family: Poppins;
    }
.fts{
    font-family: Poppins;
}
    .card-details p {
        margin-top: 10px;
        font-size: 14px;
    }

    .card-details strong {
        font-size: 16px;
    }

    .card-details .card-image {
        max-width: 100%;
        margin-bottom: 10px;
    }

    .card-details-container h2 {
        position: relative;
        width: 300px;
        background-color: #7282FB;
        color: white;
        margin: 0 auto !important;
        padding: 5px;
        border-radius: 10px;
        font-size: 3rem;
    }

    .paragraph {
        background-color: red;
    }
</style>

<?php
function formatDate($date)
{
    return date("M d, Y", strtotime($date));
}

require ('constant/config.php');

if (isset ($_GET['planId'])) {
    $planId = $_GET['planId'];
    error_log("Plan ID: " . $planId);

    $stmt = $conn->prepare("SELECT * FROM create_plan WHERE plan_id = ?");
    $stmt->bind_param("i", $planId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            //anurag
            $my_string = $row['features'];
            $my_array = explode(",", $my_string);
            $a = $i = count($my_array);
            $y = count($my_array);





            $cardDetails = "<div class='card-details'>";

            // Include the image using the provided URL
            $cardDetails .= "<img src='assets/images/fruit_salad.svg' class='card-image' alt='" . $row['name'] . "'>";

            $cardDetails .= "<h2 style='font-size: 24px; text-align: center; font-family: Poppins; margin-bottom: 10px;display:block;'>" . $row['name'] . "</h2>";
            $cardDetails .= "<p><strong>Tags:</strong> " . $row['tags'] . "</p>";
            $cardDetails .= "<p><strong>Start Date:</strong> " . formatDate($row['start_date']) . "</p>";
            $cardDetails .= "<p><strong>End Date:</strong> " . formatDate($row['end_date']) . "</p>";
            $cardDetails .= "<p><strong>Price:</strong> Rs. " . number_format($row['price'], 2) . "/month</p>";
            $cardDetails .= "</div>";

            echo $cardDetails;

            // features
            echo "<p class='fts' style='display:block;text-align:center; font-size:14px;'><strong style='font-size:16px;'>Features:</strong> ";
            for ($a - 1; $a >= $y - 3; $a--) {
                echo $my_array[$a - 1];
                if ($a != $y - 3) {
                    echo " || ";
                }

            }
            echo "</p>";

            // features end
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
