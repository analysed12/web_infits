<?php
require('constant/config.php');

session_start(); // Start the session if it hasn't already been started

// Function to decode JSON and handle potential errors
function decodeJson($json)
{
    $decoded = json_decode($json, true);

    if ($decoded === null && json_last_error() !== JSON_ERROR_NONE) {
        // Handle JSON decoding error
        die("JSON decoding error: " . json_last_error_msg());
    }

    return $decoded;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve JSON data from the request
    $requestDataJson = file_get_contents("php://input");

    // Decode JSON data
    $requestData = decodeJson($requestDataJson);

    // Extract data from the decoded JSON
    $dietchart_name = mysqli_real_escape_string($conn, $requestData['subject']);
    $client_id = intval($requestData['client_id']);
    $plan_id = intval($requestData['plan_id']);
    $dietData = $requestData['diet_data'];
    $dietitian_id = $_SESSION['dietitian_id'];

    // Initialize an array to hold meals data for each day
    $mealsData = [];

    // Iterate through dietData to extract meals
    foreach ($dietData as $dayData) {
        // Extract the 'meals' from the array
        $meals = $dayData['meals'];

        // Convert meals array to a string
        $mealsString = implode(', ', array_map(function ($meal) use ($conn) {
            // Extract the 'course' and 'recipes' from the subarray
            $course = mysqli_real_escape_string($conn, $meal['course']);
            $recipes = implode(', ', array_map(function ($recipe) use ($conn) {
                $recipeId = mysqli_real_escape_string($conn, $recipe['recipeId']);
                $isDefault = mysqli_real_escape_string($conn, $recipe['isDefault']);
                return "{recipeId: $recipeId, isDefault: $isDefault}";
            }, $meal['recipes']));

            return "{course: '$course', recipes: [$recipes]}";
        }, $meals));

        // Add the meals data to the array for the corresponding day
        $mealsData[$dayData['day']] = $mealsString;
    }
    // Build the SQL columns and values dynamically based on days
$sqlColumns = "plan_id, client_id, dietchart_name,dietitian_id " . implode(', ', array_keys($mealsData));
$sqlValues = "$plan_id, $client_id, '$dietchart_name','{$dietitian_id}', \"" . implode('", "', $mealsData) . "\"";

$sql1 = "INSERT INTO diet_chart ($sqlColumns) VALUES ($sqlValues)";
    // Execute the SQL query
    $result1 = mysqli_query($conn, $sql1);

    if ($result1) {
        // Insertion was successful
        echo "Diet Chart Name Updated Successfully!";
    } else {
        // Insertion failed, display an error message
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "The 'subject' or 'client_id' key is not set in POST data.";
}
