<?php
ob_start();
session_start();
include "navbar.php";
require('constant/config.php');


// Check if the newCount parameter is set in the POST request
if (isset($_SESSION['dietitian_id']) && isset($_POST['newCount'])) {
    $newCount = intval($_POST['newCount']);
    $id = $_SESSION['dietitian_id']; // Assuming you have a session variable for the ID
    $updateGreetingCountSQL = "UPDATE dietitian SET greetings_shown = greetings_shown+'$newCount' WHERE dietitian_id = '$id'";
    $conn->query($updateGreetingCountSQL);
    $conn->close();
}


if (isset($_SESSION['dietitian_id'])) {
    $id = $_SESSION['dietitian_id'];
    $sql = "SELECT * FROM dietitian WHERE dietitian_id = '$id'";
    global $conn;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch the row
        $total = $row['no_of_clients']; // Access 'no_of_clients' column
        $achievementsEarned = $row['achievements']; // Access 'achievements' column
        $greetingToShowCount = $row['greetings_to_show'];
        $greetingShownCount = $row['greetings_shown'];
    } else {
        $total = 0;
        $achievementsEarned = 0;
        $greetingToShowCount = 0;
        $greetingShownCount = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Cards</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'NATS', sans-serif;
            font-style: normal;
        }

        .custom-card {
            display: flex;
            align-items: flex-start;
            flex-direction: row;
            border-radius: 12.093px;
            background: #FFF;
            box-shadow: 0px 1.51167px 4.53501px 0px rgba(0, 0, 0, 0.25);
            margin-bottom: 20px;
        }

        .custom-card1 {
            width: 331px;
            height: 112px;
        }

        .custom-card2 {
            height: 101px;
            width: 475px;
        }

        .number-box {
            width: 68.923px;
            height: 68.923px;
            flex-shrink: 0;
            border-radius: 8.615px;
            background: #8C68F8;
            margin: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .number {
            color: #FFF;
            font-size: 50px;
            font-weight: 400;
            line-height: 101.84%;
        }

        /* Custom CSS for the text */
        .text {
            color: #000;
            font-size: 27.21px;
            font-weight: 400;
            line-height: normal;
            margin-left: 20px;
            display: flex;
            align-items: center;
        }

        .progress-bar {
            width: 233px;
            height: 20px;
            background-color: #D6D5D5;
            border-radius: 75.584px;
        }

        .progress {
            width: 0;
            height: 100%;
            background-color: #8C68F8;
            border-radius: inherit;
        }

        .image-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 101px;
            width: 20%
        }

        .custom-image {
            width: 50px;
            height: 50px;
            margin: 0 auto;
        }

        .custom-container {
            padding: 52px 0 91px 91px;
            margin-right: 0;
        }

        .heading {
            color: #000;
            font-size: 48px;
            font-weight: 400;
            line-height: 89.84%;
            margin-bottom: 67px;
        }

        .reach-text {
            color: #000;
            font-size: 27.21px;
            font-weight: 400;
            line-height: normal;
            float: left;
        }

        .column-layout {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 0px 0 20px 34px;
            width: 80%;
        }

        .completed-text {
            color: #787878;
            font-size: 27.21px;
            font-weight: 400;
            line-height: normal;
            margin-top: -19px;
        }

        .custom-image-replaced {
            width: 50px;
        }

        .row {
            display: inline-flex;
        }

        #greeting-popup {
            width: 393px;
            height: 500px;
            background-color: #8C68F8;
            border-radius: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            display: none;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            z-index: 9998;
        }

        .overlay-box {
            width: 129px;
            height: 129px;
            background-color: #fff;
            position: absolute;
            top: -65px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 39px;
            padding: 6px;
            z-index: 9997;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .popup-column {
            background-color: #fff;
            border-radius: 30px;
            position: relative;
            margin: 2px;
            padding: 10px;
            z-index: 9998;
            height: 361px;
        }

        .inner-box1 {
            width: 293.47px;
            height: 67.724px;
            flex-shrink: 0;
            border-radius: 15.203px;
            background: #FFF;
            box-shadow: 0px 1.90038px 5.70114px 0px rgba(0, 0, 0, 0.25);
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #000;
            font-size: 36.94px;
            font-weight: 400;
            line-height: 133.34%;
            text-align: center;
            padding-top: 6px;
        }

        .inner-box2 {
            width: 293.263px;
            height: 113.474px;
            flex-shrink: 0;
            border-radius: 15.203px;
            background: #FFF;
            box-shadow: 0px 1.90038px 5.70114px 0px rgba(0, 0, 0, 0.25);
            position: absolute;
            padding: 30px 36px 30px 36px;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: inline-flex;
            align-items: center;
            color: #000;
            text-align: center;
            font-size: 24.627px;
            font-weight: 400;
            line-height: 95.84%;
        }

        .image-wrapper {
            position: relative;
        }

        .image-wrapper img {
            width: 100%;
            height: 361px;
            border-radius: 10px;
        }

        .popup-column p {
            margin: 0;
            padding: 5px;
        }

        #overlay-box-img {
            width: 100%;
            height: 100%;
            margin: 0 auto;
            z-index: 2;
        }

        .inner-content p {
            margin: 0 10px 0 0;
        }

        .right-image {
            width: 41px;
            height: 41px;
            margin-left: auto;
        }

        .bottom-overlay {
            text-align: center;
            z-index: 999;
            margin-top: -27px;
        }

        .bottom-overlay-image {
            width: 50px;
            height: 50px;
            margin-bottom: -25px;
        }

        .bottom-box {
            width: 159.128px;
            height: 71.608px;
            flex-shrink: 0;
            border-radius: 25.846px;
            border: 2.652px solid #9E5EF4;
            background: #FFF;
            position: absolute;
            bottom: -36px;
            left: 50%;
            transform: translateX(-50%);
            color: #000;
            text-align: center;
            font-size: 30px;
            font-weight: 400;
            line-height: 95.84%;
            text-align: initial;
            padding: 20px;
            cursor: pointer;

        }

        #main-text {
            color: #FFF;
            text-align: center;
            font-size: 30.784px;
            font-weight: 400;
            line-height: 95.84%;
            text-align: center;
            text-wrap: wrap;
            width: 384px;
        }

        .share-overlay {
            position: fixed;
            top: -50px;
            bottom: 0;
            left: -72px;
            right: 0;
            background: rgba(0, 0, 0, 0.6);
            transition: opacity 500ms;
            display: none;
            z-index: 9999;
            opacity: 1;
        }


        .share-popup {
            margin: 290px;
            margin-left: 550px;
            padding: 20px;
            background: #fff;
            box-shadow: 0px 0px 34.0377px rgba(0, 0, 0, 0.25);
            border-radius: 25.5283px;
            width: 400px;
            position: relative;
            transition: all 5s ease-in-out;

        }


        .share-popup h2 {
            margin-top: 0;
            color: #333;
            font-family: Tahoma, Arial, sans-serif;
        }

        .share-popup .close {

            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
            background: none;
            border: none;
        }

        .share-popup .close:hover {
            color: #06D85F;
            cursor: pointer;
        }

        .share-popup .content {
            max-height: 30%;
            overflow: auto;
        }


        @media screen and (max-width: 1200px) {
            .share-popup {
                margin-left: 10% !important;
                margin-right: 10% !important;
                width: auto
            }

        }

        @media screen and (max-width:1320px) {

            .completed-text {
                font-size: 23.21px;
            }
        }
    </style>
</head>

<body>
    <div class="container custom-container">
        <!-- First Row of Cards -->
        <div class="heading">My Achievements</div>
        <div style="margin-bottom:71px;" class="row card-row">
            <div class="col-md-6">
                <div class="custom-card custom-card1">
                    <div class="number-box">
                        <div class="number"><?php echo $total; ?></div>
                    </div>
                    <div class="text">Total Clients</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom-card custom-card1">
                    <div class="number-box">
                        <div class="number" id="achievements-earned"><?php echo $achievementsEarned; ?></div>
                    </div>
                    <div class="text">Achievements Earned</div>
                </div>
            </div>
        </div>

        <!-- Second Row of Cards -->
        <div class="row card-row">
            <div class="col-md-6">
                <div class="custom-card custom-card2">
                    <div class="column-layout">
                        <div class="reach-text">Reach 5 Clients</div>
                        <div class="progress-bar">
                            <div class="progress"></div>
                        </div>
                    </div>
                    <div class="image-container">
                        <img src="<?= $DEFAULT_PATH ?>assets/images/Medal.svg" alt="Image" class="custom-image">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom-card custom-card2">
                    <div class="column-layout">
                        <div class="reach-text">Reach 10 Clients</div>
                        <div class="progress-bar">
                            <div class="progress"></div>
                        </div>
                    </div>
                    <div class="image-container">
                        <img src="<?= $DEFAULT_PATH ?>assets/images/Medal.svg" alt="Image" class="custom-image">
                    </div>
                </div>
            </div>
        </div>

        <!-- Third Row of Cards -->
        <div class="row card-row">
            <div class="col-md-6">
                <div class="custom-card custom-card2">
                    <div class="column-layout">
                        <div class="reach-text">Reach 15 Clients</div>
                        <div class="progress-bar">
                            <div class="progress"></div>
                        </div>
                    </div>
                    <div class="image-container">
                        <img src="<?= $DEFAULT_PATH ?>assets/images/Medal.svg" alt="Image" class="custom-image">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom-card custom-card2">
                    <div class="column-layout">
                        <div class="reach-text">Reach 20 Clients</div>
                        <div class="progress-bar">
                            <div class="progress"></div>
                        </div>
                    </div>
                    <div class="image-container">
                        <img src="<?= $DEFAULT_PATH ?>assets/images/Medal.svg" alt="Image" class="custom-image">
                    </div>
                </div>
            </div>
        </div>

        <!-- Fourth Row of Cards -->
        <div class="row card-row">
            <div class="col-md-6">
                <div class="custom-card custom-card2">
                    <div class="column-layout">
                        <div class="reach-text">Reach 25 Clients</div>
                        <div class="progress-bar">
                            <div class="progress"></div>
                        </div>
                    </div>
                    <div class="image-container">
                        <img src="<?= $DEFAULT_PATH ?>assets/images/Medal.svg" alt="Image" class="custom-image">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom-card custom-card2">
                    <div class="column-layout">
                        <div class="reach-text">Reach 30 Clients</div>
                        <div class="progress-bar">
                            <div class="progress"></div>
                        </div>
                    </div>
                    <div class="image-container">
                        <img src="<?= $DEFAULT_PATH ?>assets/images/Medal.svg" alt="Image" class="custom-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="greeting-popup">
        <div class="popup-column">
            <div class="image-wrapper">
                <img src="<?= $DEFAULT_PATH ?>assets/images/congratulations.svg" alt="Your Image">
            </div>
            <div class="overlay-box"><img src="<?= $DEFAULT_PATH ?>assets/images/greetings_profile.svg" alt="Your Image" id="overlay-box-img">
                <div class="bottom-overlay">
                    <img src="<?= $DEFAULT_PATH ?>assets/images/greetings_approval.svg" alt="Bottom Overlay Image" class="bottom-overlay-image">
                </div>
            </div> <!-- Added overlay div -->
            <div class="inner-box1">congratulations!</div>
            <div class="inner-box2">
                <p id="greeting-text">Reach 5 Clients
                    Completed!</p>
                <img src="<?= $DEFAULT_PATH ?>assets/images/Approval.svg" alt="Second Image" class="right-image">
            </div>
        </div>
        <div id="main-text">You’ve unlocked an
            Achievement!</div>
        <div class="bottom-box">Share<img src="<?= $DEFAULT_PATH ?>assets/images/share.svg" style="width:22px;height:22px;float:right;"></div>
    </div>
    <div style="clear: both;"></div>
    </div>
    <div id="popup1" class="share-overlay">
        <div class="share-popup">
            <div style="display:flex;justify-content:space-between;align-items:center">
                <h5>Share Via <img src="<?= $DEFAULT_PATH ?>assets/images/Share.svg"></h5>
                <a class="close" id="share-close">&times;</a>
            </div>

            <div class="content" style="display:flex;gap:1rem;margin-left:1rem">
                <a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share"><img src="<?= $DEFAULT_PATH ?>assets/images/WhatsApp.svg"></a>
                <a class="twitter-share-button" href="https://twitter.com/intent/tweet"><img src="<?= $DEFAULT_PATH ?>assets/images/twitter.svg"></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=#url" target="_blank"> <img src="<?= $DEFAULT_PATH ?>assets/images/facebook.svg"></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={url}"><img src="<?= $DEFAULT_PATH ?>assets/images/LinkedIn-Circled.svg"></a>
                <img src="<?= $DEFAULT_PATH ?>assets/images/Instagram.svg">
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Define the limits for each progress bar
            const limits = [5, 10, 15, 20, 25, 30]; // Adjust these limits as needed
            const greetingCount = <?php echo ($greetingToShowCount > $greetingShownCount) ? $greetingToShowCount : 0; ?>;

            const progressBars = $(".progress-bar .progress");
            const achievementsEarnedNumber = $("#achievements-earned");
            let achievementsEarnedCount = 0;

            function updateProgressBars() {
                let clientCount = <?php echo $total; ?>;
                progressBars.each(function(index) {
                    const currentLimit = limits[index];
                    const progressBar = $(this);

                    if (clientCount >= currentLimit) {
                        progressBar.css("width", "100%");
                        const card = progressBar.closest('.custom-card');
                        card.find('.progress-bar').replaceWith('<div class="completed-text">Achievement Unlocked! </div>');
                        card.find('.image-container img').attr('src', '<?= $DEFAULT_PATH ?>assets/images/Approval.svg');
                        achievementsEarnedCount++;
                        achievementsEarnedNumber.text(achievementsEarnedCount);
                    } else {
                        const percentage = (clientCount / currentLimit) * 100;
                        progressBar.css("width", percentage + "%");
                    }
                });
            }
            updateProgressBars();

            function showGreetingPopupSequentially(count) {
                const popup = document.getElementById("greeting-popup");
                const popup1 = document.getElementById('share-close');
                const greetingToShowCount = <?php echo $greetingShownCount; ?>;

                if (count > 0 && count > greetingToShowCount) {
                    setTimeout(function() {
                        showGreetingPopup(count);
                    }, 1000)

                    document.addEventListener("click", function closePopupOutside(event) {
                        if (event.target !== popup && !popup.contains(event.target) && event.target !== popup1 && !popup1.contains(event.target)) {
                            document.removeEventListener("click", closePopupOutside);
                            showGreetingPopupSequentially(count - 1);
                        }
                    });
                }
            }
            // Call the function to show greetings sequentially
            showGreetingPopupSequentially(greetingCount);

        });

        function showGreetingPopup(count) {
            const popup = document.getElementById("greeting-popup");
            const mainText = document.getElementById("greeting-text");
            mainText.innerText = `Reach ${count * 5} Clients Completed!`;
            popup.style.display = "inline-grid";

            document.addEventListener("click", function closePopupOutside(event) {
                if (event.target !== popup && !popup.contains(event.target) && event.target !== popup1 && !popup1.contains(event.target)) {
                    hideGreetingPopup();
                    document.removeEventListener("click", closePopupOutside);

                    // Decrease the count and update the database
                    $.ajax({
                        type: "POST",
                        url: "achievements.php", // Create this PHP file to handle the update
                        data: {
                            newCount: 1
                        }

                    });
                }
            });
        }

        function hideGreetingPopup() {
            document.getElementById("greeting-popup").style.display = "none";
        }
        $(document).on('click', '.bottom-box', function() {
            $('#popup1').show();
        });

        $(document).on('click', '#popup1 #share-close', function() {
            $('#popup1').hide();
        });
    </script>

</body>

</html>