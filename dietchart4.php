<?php
//include('navbar.php');
session_start();
require_once "constant/constant.php";
require('constant/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... (head content) ... -->
</head>
<style>
    body {
        font-family: 'NATS', serif !important;
        letter-spacing: 1px;
    }

    .heading {
        margin-top: 2rem;
        margin-left: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0px 20.3px;
    }

    .cancel-button {
        background: #FFFFFF;
        border: 1px solid #9C74F5;
        border-radius: 10px;
        color: #9C74F5;
        padding: 7px 20px;
        font-family: "NATS";
        font-style: normal;
        font-weight: 400;
        font-size: 30px;
        height: 60px;
        width: 130px;
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        /* Adjust this value to control the spacing between cards */
        padding-right: 20px;
        /* Add padding to the container */
    }

    .plan-card {
        display: flex;
        /* Display content in a row */
        justify-content: space-between;
        /* Space items evenly along the row */
        align-items: center;
        /* Align items vertically */
        padding: 1rem;
        width: 400px;
        min-height: 260px;
        background: #FFFFFF;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        border-radius: 1.25rem !important;
        border: none !important;
        margin-left: 60px;
        margin-bottom: 60px;
    }

    .plan-card-content {
        flex: 1;
        padding: 0 1rem;
        justify-content: flex-start;
        /* Add this line to start content from left to right */
    }

    .select-button {
        background-color: #7282FB;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 0px 100px 0px 100px;
        /* Increase the padding on both left and right */
        font-size: 20px;
        cursor: pointer;
        width: 130%;
        /* Allow the button to expand based on content */
        height: 40px;
        margin-top: 20px;
        text-align: center;
        margin-left: -95px;
    }

    /* Style the tags text */
    .plan-card .tags-container {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .plan-card .tag {
        background-color: #7282FB;
        color: white;
        margin: 5px !important;
        padding: 5px;
        border-radius: 10px;
        padding: 10px 10px 10px 10px;
    }

    .create_btn {

        width: 85px;
        height: 85px;
        margin-right: 2rem;
        border: none;
        border-radius: 50%;
        font-size: 40px;
        color: white;
        background: #9C74F5;
        box-shadow: 0px 0px 68px rgba(0, 0, 0, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .error-container {
        margin-left: auto;
        /* This pushes the error container to the right */
        position: relative;
    }

    .error-container img {
        position: absolute;
        top: -10px;
        right: 0;
    }
</style>

<body>
    <div class="heading">
        <!-- Display the selected plan's name here -->
        <h3 id="selectedPlanName">Connect a diet plan with diet chart</h3>
        <button class="cancel-button" onclick="redirectToDietchart3()">Cancel</button>
    </div>
    <!-- card making -->
    <div class="card-container">
        <?php
        if (isset($_SESSION['dietitianuserID'])) {
            global $conn;
            $dietitianuser_id = $_SESSION['dietitianuserID'];

            $query = "SELECT plan_id,name, tags, description FROM create_plan WHERE dietitianuserID = '$dietitianuser_id'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['name'];
                    $tags = explode(',', $row['tags']); // Split tags into an array
                    $description = $row['description'];
                    $id = $row['plan_id'];

                    // Create a card for each record
                    echo '<div class="plan-card">';
                    echo '<div class="plan-card-image">';
                    echo '<img src="' . $DEFAULT_PATH . 'assets/images/fruit_salad.svg" alt="" style="max-width: 100px; height: auto; padding: 0px 0px 75px 0px; ">';
                    echo '</div>';

                    // Content on the right side
                    echo '<div class="plan-card-content">';
                    echo '<div class="name-container">';
                    echo '<div style="display: flex; align-items: center">';
                    echo '<h4>' . $name . '</h4> ';
                    echo '<div class="error-container">';
                    echo '<img src="' . $DEFAULT_PATH . 'assets/images/error.svg" alt="Error">';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';


                    // Display tags in different boxes
                    echo '<div class="tags-container">';
                    foreach ($tags as $tag) {
                        echo '<div class="tag">' . trim($tag) . '</div>';
                    }
                    echo '</div>';
                    echo '<div class="description-container">';
                    echo '<div class="description">' . $description . '</div>';
                    echo '</div>';

                    // Modify the Select button to pass the plan name
                    echo '<button class="select-button" data-plan-id ="' . $id . '" data-plan-name ="' . $name . '"onclick="redirectToDietchart(this)">Select</button>';
                    echo '</div>'; // Close plan-card-content
                    echo '</div>'; // Close the div for each card
                }
            }
        }
        ?>

    </div>
    <div class="d-flex justify-content-end p-3">
        <a style="background-color:none; text-decoration: none;" class="create_btn" onclick="redirectToCreateConnectPlan()">+</a>
    </div>
    <?php require('constant/scripts.php'); ?>
    <script>
        /*   function redirectToDietchart(button) {
            const client_id = '<?php echo isset($_GET['client_id']) ? $_GET['client_id'] : ''; ?>';
            var planId = $(button).data('plan-id');
            var planName = $(button).data('plan-name');

            // Redirect to connectplan.php with the plan ID and plan name
            window.location.href = 'dietchart3.php?client_id=' + client_id + '&plan_id=' + planId + '&plan_name=' + encodeURIComponent(planName);
        }



        function redirectToDietchart3() {
            var client_id = '<?php echo isset($_GET['client_id']) ? $_GET['client_id'] : ''; ?>';
            if (client_id !== '') {
                window.location.href = 'dietchart3.php?client_id=' + client_id;
            }
        }

        function redirectToCreateConnectPlan() {
            // Get the client_id if it exists
            const client_id = '<?php echo isset($_GET['client_id']) ? $_GET['client_id'] : ''; ?>';
            // Build the URL with the client_id parameter
            const url = `create_connectplan.php?client_id=${client_id}`;
            // Redirect to the URL
            window.location.href = url;
        } */
    </script>
    <script>
        // Declare global variables to store selected plan ID and name
        var selectedPlanId = null;
        var selectedPlanName = null;

        function redirectToDietchart(button) {
            var planId = $(button).data('plan-id');
            var planName = $(button).data('plan-name');

            // Store selected plan ID and name
            selectedPlanId = planId;
            selectedPlanName = planName;

            // Make AJAX request to the server
            $.ajax({
                url: 'dietchart3.php', // Replace with the actual path to your server-side handler
                type: 'POST',
                data: {
                    plan_id: selectedPlanId,
                    plan_name: selectedPlanName
                },
                success: function(response) {
                    // Update the content of #selectedPlanName and the value of #selectedPlanId
                    $("#selectedPlanName").text(selectedPlanName);
                    $("#selectedPlanId").val(selectedPlanId);
                    // Manipulate visibility of default and fetched content
                    $(".fetched-content").hide().empty(); // Empty the fetched content
                    $(".default-content").show();
                },
                error: function(xhr, status, error) {
                    console.error('Error sending selected data:', error);
                    // Handle error if needed
                }
            });
        }

        function redirectToDietchart3() {
            $(".fetched-content").hide().empty(); // Empty the fetched content
            $(".default-content").show();
        }
    </script>



</body>

</html>