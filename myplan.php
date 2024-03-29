<?php
error_reporting(0);
require ('constant/config.php');
session_start();
if (isset ($_SESSION['dietitianuserID'])) {
    global $conn;
    $dietitianuser_id = $_SESSION['dietitianuserID'];
    $sql = "SELECT * FROM create_plan WHERE `dietitianuserID`='$dietitianuser_id'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        header('Location:dietplan_default.php');
    }
}
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Infits | My Plans</title>
    <?php require ('constant/head.php'); ?>
    <style>
        body {
            font-family: 'NATS', serif !important;
            letter-spacing: 1px;
        }

        .search_client {
            width: 100%;
            height: 50px;
            margin-top: 1rem;
            color: #BBBBBB;
            background-color: white;
            box-shadow: 0.6px 0.6px 2px 1px #ccc;
            border-radius: 0.6rem;
            font-size: 20px;
            font-weight: 400;
            border: none;
            display: flex;
            padding-right: 0.5rem;
            margin-right: 1rem;
        }

        #btn3 {
            width: auto;
            background-color: white;
            border: none;
            color: #ACACAC;
            margin-left: 0.5rem;
        }

        .seach_clients_text {
            border: none;
        }

        .card {
            color: black;
            padding: 1rem;
            min-width: 430px;
            min-height: 318px;
            background: #FFFFFF;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
            border-radius: 1.25rem !important;
            border: none !important;
        }

        .cards {
            margin: 0 auto;
            gap: 3.5rem;
            display: flex;
            flex-wrap: wrap;
            padding: 0 30px;
        }

        .card-upper-image {
            display: inline;
        }

        .card-upper-image img {
            min-height: 130px;
            min-width: 124px;
        }

        .card-upper-details {
            display: inline;
        }

        .card-upper-options {
            width: 20% !important;
            display: flex;
            justify-content: end;
        }

        .card-upper-image img {
            max-width: 100%;
            max-height: 100%;
            display: block;
        }

        .tag-element {
            background-color: #7282FB;
            color: white;
            margin: 5px !important;
            padding: 5px;
            border-radius: 10px;
        }

        .card-middle {
            padding-left: 1rem;
        }

        .card-below {
            padding: 0.5rem 1rem;
        }

        input:focus {
            outline: none !important;
        }

        a:hover {
            cursor: pointer;
            background-color: none;
        }

        .box input {
            width: 100%;
            background-color: blue;
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
        }

        #btn1 {
            border: none;
            background-color: #0177FD;
            color: white;
            border-radius: 100%;
            font-size: 2.7rem;
            padding-left: 1.4rem;
            padding-right: 1.4rem;
            position: relative;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .features-grid {
            /* display: grid;
            grid-template-columns: 1fr 1fr;
            row-gap: 1vh;
            column-gap: 0.5vw; */
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        @media screen and (max-width: 763px) {
            #heading {
                font-size: 35px !important;
            }

            .search_client {
                width: 80%;
                margin-bottom: 2rem;
            }

            .head-sec {
                margin-left: 15.8rem !important;
                display: flex;
                flex-direction: column;
                padding: 0px !important;
            }
        }

        @media screen and (max-width: 720px) {
            .head-sec {
                margin-left: 1.8rem !important;
            }

            .card {
                width: 100%;
                padding-right: 2rem;
            }

            .card-sec {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-left: 0rem !important;
            }

            #btn1 {
                right: 3rem;
            }
        }

        @media screen and (max-width: 720px) {
            .search_client {
                width: 94% !important;
                margin-bottom: 2rem;
            }

            #btn1 {
                right: 3rem;
            }
        }

        .card {
            min-height: 280px;
        }

        .card-details-container {
            font-size: 25px;
            position: relative;
            background-color: #FFFFFF;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
            border-radius: 1.25rem;
            padding: 1rem;
            min-width: 430px;
            max-width: 430px;
            min-height: 318px;
            display: none;
            overflow: auto;
        }

     

      


        .border-1 {
            position: absolute;
            right: 10px;
            top: 10px;
            display: block;
        }

        /*  */
        .card-title {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 75px;
            margin-right: 75px;
        }

        .card-middle {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;

            min-height: 40px;
            font-size: 19px;
            line-height: 1em;
        }

        .features-point {

            display: inline-block;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            line-height: 1.5;
        }


        .fp {
            width: 50%;

        }

        .features-grid .fp {
            display: none;

        }


        .features-grid .fp:nth-last-child(-n+4) {
            display: flex;

        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <?php
    include "navbar.php";
    $output = ob_get_contents();
    ob_end_clean();
    echo $output;
    ?>

    <div class="head-sec"
        style="padding: 1rem 2rem 1rem 0rem; margin-left: 16rem; display: flex; justify-content: space-between;">
        <div class="col-6" id="heading"
            style="font-weight: 400; font-size: 40px; color: black !important; margin-top: 1rem; margin-left: 1rem">
            Plans</div>
        <form method="GET" style="margin-left:1rem">
            <div class="search_client" style="align-items:center">
                <div><button id="btn3" name="search-btn"><img
                            src="<?= $DEFAULT_PATH ?>assets/images/search1.svg"></button> </div>
                <div style="margin-left:1rem; margin-right:4rem;"> <input type="text" name="search" placeholder="Search"
                        class="seach_clients_text" style="width:100%"></div>
            </div>
        </form>
    </div>

    <div class="card-sec" style="display: flex; justify-content:center;">
        <div class="col-md-12">
            <div class="">
                <div class="cards row gx-0" style="margin-left:1rem">
                    <?php
                    if (isset ($_GET['search-btn'])) {
                        if (!empty ($_GET['search'])) {
                            $search = $_GET['search'];
                            $sql1 = "SELECT * FROM create_plan WHERE name like '%$search%' AND  dietitianuserID = '$dietitianuser_id' ";
                            if ($result1 = mysqli_query($conn, $sql1)) {
                                if (mysqli_num_rows($result1) > 0) {
                                    while ($row1 = mysqli_fetch_array($result1)) {
                                        ?>

                                        <div class="card col-lg-5 p-3 m-5" container>
                                            <div class="card-upper row">
                                                <div class="card-upper-image col-4">
                                                    <img src="<?= $DEFAULT_PATH ?>assets/images/fruit_salad.svg" alt="">
                                                </div>
                                                <div class="card-upper-details col-8">
                                                    <div class="row">
                                                        <div class="col" style=" font-size:30px;font-weight:400 !important;">
                                                            <p class="card-name" data-card-id="<?php echo $row1['plan_id']; ?>">
                                                                <?php echo $row1['name'] ?>
                                                            </p>
                                                        </div>
                                                        <!-- ... (Your existing code) ... -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-middle" style="color:#919191  !important">
                                                <?php echo $row1['description'] ?>
                                            </div>
                                             <div class="card-below row">
                                        <div class="col">
                                            <!-- fetaure heading -->
                                            <div class="row">FEATURES</div>
                                            <div class="feature-box">
                                                <?php
                                                echo '<div class="features-grid">';
                                                $mark = explode(',', $row1['features']);
                                                foreach ($mark as $out) {
                                                    echo '<div class="fp">';
                                                    // checkbox icon
                                                    echo '<div class="feature-check" style="display:inline-block;width:auto;margin-right:5px; "><i style="color:black;" class="fa-regular fa-circle-check"></i></div>';
                                                    // content
                                                    echo '<div class="features-point" style="display:inline-block; margin-right:20px;">' . $out . '</div>';
                                                    echo '</div>';
                                                }
                                                echo '</div>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                        </div>
                                        <!-- Additional div for card details -->
                                        <div class="card-details-container"></div>
                                    </div>

                                    <?php
                                    }
                                } else {
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            }
                        }
                    } else {
                        $sql = "SELECT * FROM create_plan where dietitianuserID = '$dietitianuser_id' ";
                        if ($result = mysqli_query($conn, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>


                                <div class="card col-lg-5 p-3" container>
                                    <div class="card-upper row">
                                        <div class="card-upper-image col-4" style="min-height: 130px; min-width: 124px;">
                                            <img src="<?= $DEFAULT_PATH ?>assets/images/fruit_salad.svg" alt="">
                                        </div>
                                        <!-- title and edit delete button -->

                                        <div class="card-upper-details col-8">

                                            <div class="row position-relative">
                                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                                    <!-- title -->
                                                    <div class="col ps-0 card-title"
                                                        style="margin-top:5px;margin-bottom:5px; font-size:30px;font-weight:400;">
                                                        <p class="card-name" data-card-id="<?php echo $row['plan_id']; ?>">
                                                            <?php echo $row['name'] ?>
                                                        </p>
                                                    </div>
                                                    <!-- /edit and delete button -->

                                                    <span class="border-1 ">
                                                        <!-- edit button -->
                                                        <a href="update_plan.php?id=<?php echo $row['plan_id'] ?>" title="Update Record"
                                                            style="color:#7282FB;height: 30px;border-radius: 8px;"
                                                            data-toggle="tooltip">
                                                            <img src="<?= $DEFAULT_PATH ?>assets/images/edit-icon.svg" alt="">
                                                        </a>
                                                        <!-- delete button -->
                                                        <a onclick="return confirm('Are you sure?')"
                                                            href="delete_plan.php?id=<?php echo $row['plan_id'] ?>"
                                                            title="Delete Record"
                                                            style="color:#FF3D3D;height: 30px;border-radius: 8px;margin-top:10rem"
                                                            data-toggle="tooltip">
                                                            <img src="<?= $DEFAULT_PATH ?>assets/images/delete-icon.svg" alt="">
                                                        </a>
                                                    </span>
                                                </div>
                                                <div class="w-100"></div>
                                                <!-- price -->
                                                <div class="col-5" style="padding:0 0 0 8px;overflow:hidden;"><span
                                                        style="font-weight:bold;">Rs.
                                                        <?php echo $row['price'] ?>
                                                    </span>/month
                                                </div>
                                                <!-- per montth -->
                                                <div class="col-7"
                                                    style="color: #000; font-family: NATS; font-size: 22px; font-style: normal; font-weight: 400; line-height:30.896px;">
                                                    <?php
                                                    $startDate = new DateTime($row["start_date"]);
                                                    $endDate = new DateTime($row["end_date"]);
                                                    $interval = $startDate->diff($endDate);
                                                    $months = ($interval->y * 12) + $interval->m;
                                                    echo "$months Months";
                                                    ?>
                                                </div>
                                                <div class="w-100 d-flex flex-wrap gap-1"></div>
                                                <!-- buttons -->
                                                <?php
                                                $mark = explode(',', $row['tags']);
                                                foreach ($mark as $out) {
                                                    echo '<div class="tag-element" style="width:auto;">' . $out . '</div>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <!-- Additional div for card details -->
                                        <div class="card-details-container">


                                            <!-- Add any additional details here -->
                                        </div>
                                    </div>
                                    <div class="card-middle" style="color:#919191;">
                                        <?php echo $row['description'] ?>
                                    </div>
                                    <!-- card  footer -->
                                    <div class="card-below row">
                                        <div class="col">
                                            <!-- fetaure heading -->
                                            <div class="row">FEATURES</div>
                                            <div class="feature-box">
                                                <?php
                                                echo '<div class="features-grid">';
                                                $mark = explode(',', $row['features']);
                                                foreach ($mark as $out) {
                                                    echo '<div class="fp">';
                                                    // checkbox icon
                                                    echo '<div class="feature-check" style="display:inline-block;width:auto;margin-right:5px; "><i style="color:black;" class="fa-regular fa-circle-check"></i></div>';
                                                    // content
                                                    echo '<div class="features-point" style="display:inline-block; margin-right:20px;">' . $out . '</div>';
                                                    echo '</div>';
                                                }
                                                echo '</div>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <?php
                                }
                                mysqli_free_result($result);
                            } else {
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        } else {
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    }
                    ?>

            </div>
        </div>

        <div class="d-flex justify-content-end" style="position:absolute;right:20px;">
            <a style="background-color:none" class="create_btn"
                onclick="window.location.href = 'create_plan.php';">+</a>
        </div>

        <?php require ('constant/scripts.php'); ?>







        <script>

            var hoverTimeout; // Variable to store the timer

            $(document).on('mouseenter', '.card-name', function () {
                var cardId = $(this).data('card-id');
                console.log("Hovering over card with ID:", cardId);
                var detailsContainer = $(this).closest('.card').find('.card-details-container');

                // Clear any existing timeout
                clearTimeout(hoverTimeout);

                // Fetch and display card details from backend
                $.get('fetch_card_details.php', { planId: cardId }, function (data) {
                    detailsContainer.html(data);

                    // Center the details container on the screen with reduced width
                    detailsContainer.css({
                        'position': 'fixed',

                        'top': '50%',
                        'left': '50%',
                        'transform': 'translate(-50%, -50%)',
                        //'display': 'flex',
                        'justify-content': 'center',
                        'align-items': 'center',
                        'z-index': 9999, // Set a high z-index
                        'width': '40%', // Adjust the width as needed
                    });

                    detailsContainer.show();
                });

                // Set a timeout to hide the details container after 3 seconds
                hoverTimeout = setTimeout(function () {
                    detailsContainer.hide();
                }, 300000);
            });

            // Clear the timeout if the mouse leaves the card or details container
            $(document).on('mouseleave', '.card', function () {
                clearTimeout(hoverTimeout);
                var detailsContainer = $(this).find('.card-details-container');
                detailsContainer.hide();
            });

        </script>

</body>

</html>
