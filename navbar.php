<?php
require('constant/config.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['name'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['name']);
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infits</title>
    <?php require('constant/head.php'); ?>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap');

    body {
        margin: 0;
        background: url('./assets/images/Vector_Bottom_Right.svg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: bottom -51px right -40px;

    }

    .nav {
        height: 0px;
        background-color: black;
    }

    .nav-res {
        display: none;
    }

    .sidenav {
        min-width: 15vw;
        max-width: fit-content;
        height: 100vh;
        background-color: white;
        text-align: left;
        position: sticky;
        top: 0;
        float: left;
        display: flex;
        flex-direction: column;
        border-right: #E8ECF5 2px solid;
        background: url('<?= $DEFAULT_PATH ?>assets/images/Vector_Top_Left.svg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: 0 -60px;
    }

    .sidenav .sidenavlink {
        color: #131635;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        font-family: 'NATS';
        text-decoration: none;
        margin-bottom: 5px;
        margin-left: 25px;
        font-style: normal;
        font-weight: 400;
        font-size: 23px;
        margin-right: 15px;
        padding-right: 15px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        position: relative;
        letter-spacing: 0 !important;
    }

    .sidenav .menu-bottom {
        position: absolute;
        bottom: 10px;
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .sidenav .sidenavlink:hover {
        cursor: pointer;
    }

    #logo {
        height: auto;
        width: 174px;
        margin-left: 10px;
        margin-bottom: 4.5vh;
        margin-top: 2vh;
    }

    .sidenav .nav-icon {
        height: 20px;
        width: 20px;
        margin-right: 15px;
        margin-left: 10px;
        border-radius: 0 !important;
    }

    .tabcontent {
        color: white;
        display: none;
        padding: 40px 20px;
        height: 100%;
    }

    .topnav {
        position: relative;
        min-height: 10%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: auto;
        padding-top: 1vh;
        border-bottom: #E8ECF5 2px solid;
    }

    .topnav .topnav-content p {
        margin: 0;
    }

    .topnav-content {
        margin-left: 30px;
        color: #8D8D8D;
        font-style: normal;
        font-family: 'Manrope', serif;
        font-weight: 700;
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    #topnav-content-1 {
        font-size: 20px;
        letter-spacing: 0.05em;
        margin-bottom: 5px;
    }

    #topnav-content-2 {
        letter-spacing: 1px;
        font-weight: 500;
        font-size: 15px;
    }

    .topnav-content #topnav-content-3 {
        font-family: 'Poppins';
        /* NATS */
        font-style: normal;
        font-weight: 400;
        font-size: 33px;
        color: #000000;
    }

    #topnav-content-1-name {
        color: #212121;
    }

    .topnav-icons {
        height: 100%;
        margin-right: 3vw;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .topnav-icons img {
        margin-left: 30px;
        justify-self: center;
    }

    a.sidenavlink:hover,
    .navactive {
        align-items: center;
        background: rgba(114, 130, 251, 0.1);
        color: #0177FB !important;
        border-radius: 10px;
    }

    .navactive::after {
        content: "";
        width: 5px;
        height: 35px;
        background: #7282FB;
        position: absolute;
        left: -25px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .profile-image:hover {
        cursor: pointer;
    }

    a {
        padding: 1px 2px 1px 3px;
        text-decoration: none;
    }

    @media screen and (min-width: 720px) {

        /* Styles go here */
        .mobile-menu {
            display: none;
        }
    }

    @media (min-width: 0px) and (max-width: 720px) {
        .sidenav {
            display: none;
        }
    }

    @media only screen and (max-width:300px) {
        .sidenav {
            display: none;
        }

        .topnav {
            width: 350%;
            border-bottom: 4px solid #E8ECF5;
        }

        #topnav-content-1 {
            font-size: 70px;
        }

        #topnav-content-2 {
            font-size: 60px;
        }

    }


    @media only screen and (min-width:300px) and (max-width:600px) {
        .sidenav {
            display: none;
        }

        .topnav {
            width: 100%;
            border-bottom: 4px solid #E8ECF5;
        }

    }

    /*--------------------- MOBILE SIDENAV---------------------*/
    /*HAMBURGER MENU*/
    .sidenavv {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #ffffff;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenavv a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenavv a:hover {
        border: 1px solid #E5F1FF;
        background-color: #E5F1FF;
        color: #0177FB !important;
        border-radius: 10px;
    }

    .sidenavv .closebtn {
        position: absolute;
        margin: 0;
        padding: 5px 10px;
        line-height: 30px;
        top: 15px;
        right: 25px;
        font-size: 36px;
    }

    .notification img {
        height: 30px;
        margin-left: 0;
    }

    .noti-box {
        font-family: 'NATS';
        font-style: normal;
        font-weight: 400;
        position: absolute;
        top: 60px;
        right: 40px;
        width: 400px;
        height: 440px;
        filter: drop-shadow(0px 0px 4px rgba(0, 0, 0, 0.25));
        border-radius: 20px;
        background: #FFFFFF;
        padding: 15px 20px;
        display: none;
        z-index: 9999;
    }

    @keyframes slideDown {
        from {
            top: -450px;
        }

        to {
            top: 60px;
        }
    }

    @keyframes slideUp {
        from {
            top: 60px;
        }

        to {
            top: -500px;
        }
    }

    .serchi {
        display: none;
    }

    .top {
        display: flex;
        justify-content: space-between;
        font-size: 28px;
        color: #292A2E;
        margin-right: 15px;
        margin-bottom: 10px;
    }

    .notifications {
        display: flex;
        flex-direction: column;
        padding: 10px 25px 10px 5px;
        gap: 15px;
        overflow-y: scroll;
        overflow-x: hidden;
        height: 340px;
    }

    .notifications::-webkit-scrollbar {
        display: none;
    }

    .notification {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .notification .noti-description .title {
        font-size: 18px;
        line-height: 13px;
        color: #000000;
    }

    .noti-description {
        display: flex;
        flex-direction: column;
    }

    .fixing {
        margin-left: 17% !important;
        align-items: flex-start !important;
        text-decoration: none !important;
    }

    .dropdown-container a {
        margin-left: 10% !important;
        display: grid !important;
        padding: 4px !important;
        gap: 12px !important;
        width: 75% !important;
        text-decoration: none !important;
    }

    .sidenavlink2 {
        color: #131635;
        position: relative;
    }

    .search-container {
        display: none;
        position: absolute;
        top: -10px;
        right: 0;
        width: 343px;
        height: 45px;
        flex-shrink: 0;
        border-radius: 10px;
        background: #FFF;
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.25);
        align-items: center;
        padding-left: 10px;
    }

    .search-results-container {
        display: none;
        position: absolute;
        top: 50px;
        /* Adjust the distance from the search container */
        right: 0;
        width: 343px;
        background: #FFF;
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        border: 1px solid #ccc;
        /* Add border to the search results container */
        overflow: hidden;
        /* Hide overflow to ensure the border is consistent */
        z-index: 999;
    }

    .search-icon {
        height: 20px;
        width: 20px;
        margin-right: 10px;
    }

    .search-input {
        border: none;
        outline: none;
        flex-grow: 1;
        max-width: 240px;
    }

    .search-box {
        position: relative;
        display: inline-block;
    }

    .search-result:hover {
        background-color: #8d8d8d1f;

    }

    .search-result {
        padding: 10px;
    }

    .search-result:last-child {
        border-bottom: none;
        /* Remove border for the last search result */
    }

    a {
        padding: 1px 2px 1px 3px;
        text-decoration: none;
    }

    a.table-link {
        padding: 0;
        text-decoration: none;
        color: inherit;
        font-weight: 500;
        font-size: 18px;
    }

    .result-arrow {
        height: 10px;
        width: 10px;
        margin-left: 10px;
        vertical-align: middle;
        float: right;
        margin: 6px;
    }

    .noti_li {
        list-style: none;
        display: flex;
        width: 100%;
        /* height: ; */
        box-sizing: border-box;
        height: 70px;
        margin-bottom: 5px;
    }

    .img_container {
        box-sizing: inherit;
        width: 85px;
        /* width: auto; */
        height: 70px;
        background-image: url("./assets/images/noti_reminder.png");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        /* background-color: #000000; */
        /* border: 1px solid black; */
        /* padding: 5px; */
        /* background-clip: content-box; */
    }

    .content_container {
        display: flex;
        flex-direction: column;
        box-sizing: inherit;
        width: 100%;
        height: 70px;
        /* background-color: #0177FB; */
        /* border: 1px solid black; */
        padding: 0 0 0 15px;
        /* background-clip: content-box; */
        color: black;
    }

    .noti_content {
        line-height: 14px;
    }

    .noti_image {
        width: 100%;
        height: auto;
        margin: 0px !important;
    }

    .scrolling-navbar {
        overflow-y: auto;
    }

    .nav600 {
        max-height: 60vh;
    }

    .nav550 {
        max-height: 58vh;
    }

    .nav500 {
        max-height: 55vh;
    }

    .nav450 {
        max-height: 50vh;
    }

    .nav400 {
        max-height: 41.5vh;
    }

    .scrolling-navbar::-webkit-scrollbar {
        width: 6px;
        background-color: white;
    }

    .scrolling-navbar::-webkit-scrollbar-thumb {
        background: linear-gradient(0deg, #cb1fd5, #2b5eeb);
        border-radius: 3px;
    }


    .mobile-menu-toggle {
        display: none;
        /* Hide by default */
    }

    @media screen and (max-width: 720px) {
        .mobile-menu-toggle {
            display: block;
            /* Display only in small screens */
        }

        .topnav-items {
            display: none;
            /* Hide other items in small screens */
        }

        /* Style for navigation items */
        .nav-items {
            display: flex;
            align-items: center;
        }


        .nav-items>* {
            margin-right: 20px;
        }


        .mobile-menu-toggle {
            font-size: 35px;
            cursor: pointer;
        }


        #topnav-content-1,
        #topnav-content-2 {
            margin: 0;
        }

        #topnav-content-1-name {
            font-weight: bold;
        }

    }
</style>



<body>
    <div class="sidenav" id="sidenavbar">
        <img src="<?= $DEFAULT_PATH ?>assets/images/InfitsLogo.svg" class="sidenavlink" id="logo">
        <!-- changed id of below a tag from index to dashboard for search process -->
        <div style=" display: flex; flex-direction: column; " id="basicnavbar">
            <a id="dashboard" class="sidenavlink nav-index nav-task_list nav-track_stats_steps nav-track_stats_water nav-track_stats_heart nav-track_stats_sleep nav-track_stats_weight nav-track_stats_calorie" href="index.php"><img src="<?= $DEFAULT_PATH ?>assets/images/dashboard.svg" class="nav-icon">Dashboard</a>
            <a id="messages" class="sidenavlink nav-chat_home" href="chat_home.php"><img src="<?= $DEFAULT_PATH ?>assets/images/chat.svg" class="nav-icon">Messages</a>
            <a id="live" class="sidenavlink" href="live.php"><img src="<?= $DEFAULT_PATH ?>assets/images/live.svg" class="nav-icon">Live</a>
            <a id="calendar_of_events" class="sidenavlink nav-calendar_of_events" href="appointments.php"><img src="<?= $DEFAULT_PATH ?>assets/images/calendar.svg" class="nav-icon">Appoinments</a>
            <a id="client_list" class="sidenavlink nav-add_client nav-client_list nav-client_dashboard nav-setgoals nav-set_reminders nav-mealTracker" href="client_list.php"><img src="<?= $DEFAULT_PATH ?>assets/images/clients.svg" class="nav-icon">Clients</a>
            <a id="myplan" class="sidenavlink nav-update_plan"><img src="<?= $DEFAULT_PATH ?>assets/images/dietPlan.svg" class="nav-icon">Diet Plans</a>
            <div class="dropdown-container fixing" style="display:none;">
                <a class="nav-myplan nav-create_plan nav-dietplan_default sidenavlink2" href="myplan.php">&nbsp;&nbsp;&nbsp; My Plans</a>
            </div>
            <a id="payments" class="sidenavlink"><img src="<?= $DEFAULT_PATH ?>assets/images/payment.svg" class="nav-icon">Payments</a>
            <div class="dropdown-container fixing" style="display:none;">
                <a class="nav-billingAndInvoices sidenavlink2" href="billingAndInvoices.php">&nbsp;&nbsp;&nbsp; Your Bills</a>
                <a class="nav-payments sidenavlink2" href="payments.php">&nbsp;&nbsp;&nbsp; Client Payment</a>
            </div>
            <a id="create_recipe" class="sidenavlink nav-recipe_breakfast nav-recipe_all_breakfast nav-recipe_lunch nav-recipe_all_lunch 
                    nav-recipe_snacks nav-recipe_all_snacks nav-recipe_dinner nav-recipe_all_dinner"><img src="<?= $DEFAULT_PATH ?>assets/images/recipies.svg" class="nav-icon">Recipes</a>
            <div class="dropdown-container fixing" style="display:none;">
                <a class="nav-all_recipes sidenavlink2" href="all_recipes.php">&nbsp;&nbsp;&nbsp; My Recipes</a>
                <a class="nav-create_recipe sidenavlink2" href="create_recipe.php">&nbsp;&nbsp;&nbsp; Add Recipe</a>
            </div>
            <a id="healthform" class="sidenavlink nav-healthform"><img src="<?= $DEFAULT_PATH ?>assets/images/healthForm.svg" class="nav-icon">Health Form</a>
            <div class="dropdown-container fixing" style="display:none;">
                <a class="nav-forms_and_documents nav-health_detail_form_blank sidenavlink2" href="forms_and_documents.php">&nbsp;&nbsp;&nbsp; My Forms</a>
            </div>
            <script>
                // Get all dropdown buttons
                var dropdownBtns = document.getElementsByClassName('sidenavlink ');
                // Loop through the dropdown buttons and add the onclick event
                for (var i = 0; i < dropdownBtns.length; i++) {
                    dropdownBtns[i].addEventListener('click', function() {
                        this.classList.toggle('active');
                        var dropdownContainer = this.nextElementSibling;
                        if (dropdownContainer.style.display === 'block') {
                            dropdownContainer.style.display = 'none';
                            dropdownContainer.style.borderLeft = 'none';
                        } else {
                            dropdownContainer.style.display = 'block';
                            dropdownContainer.style.borderLeft = '5px #0177FB';
                        }
                    });
                }
            </script>
        </div>
        <script>
            window.addEventListener('resize', function() {
                var navbarContainer = document.getElementById('basicnavbar');
                var windowHeight = window.innerHeight;

                if (windowHeight < 400) {
                    navbarContainer.classList.remove('nav600', 'nav550', 'nav500', 'nav450');
                    navbarContainer.classList.add('nav400', 'scrolling-navbar');
                } else if (windowHeight < 450) {
                    navbarContainer.classList.remove('nav600', 'nav550', 'nav500', 'nav400');
                    navbarContainer.classList.add('nav450', 'scrolling-navbar');
                } else if (windowHeight < 500) {
                    navbarContainer.classList.remove('nav600', 'nav550', 'nav450', 'nav400');
                    navbarContainer.classList.add('nav500', 'scrolling-navbar');
                } else if (windowHeight < 550) {
                    navbarContainer.classList.remove('nav600', 'nav500', 'nav450', 'nav400');
                    navbarContainer.classList.add('nav550', 'scrolling-navbar');
                } else if (windowHeight < 600) {
                    navbarContainer.classList.remove('nav550', 'nav500', 'nav450', 'nav400');
                    navbarContainer.classList.add('nav600', 'scrolling-navbar');
                } else {
                    navbarContainer.classList.remove('nav600', 'nav550', 'nav500', 'nav450', 'nav400', 'scrolling-navbar');
                }
            });
        </script>
        <div class="menu-bottom">
            <a class="sidenavlink nav-help" href="help.php"><img src="<?= $DEFAULT_PATH ?>assets/images/getHelp.svg" class="nav-icon">Get Help</a>
            <a class="sidenavlink nav-settings nav-profile_settings_show nav-profile_settings_edit" href="settings.php"><img src="<?= $DEFAULT_PATH ?>assets/images/settings.svg" class="nav-icon">Settings</a>
            <a href="logout.php" class="sidenavlink"><img src="<?= $DEFAULT_PATH ?>assets/images/logOut.svg" class="nav-icon">Log Out</a>
        </div>
    </div>

    <div class="topnav">
        <div class="topnav-content" id="topnav-change">
            <?php
            $url = explode('/', str_replace(['?'], '/', $_SERVER['REQUEST_URI']));
            // print_r($url);

            $id11 = $_SESSION['dietitianuserID'];
            $sql1 = "SELECT * FROM dietitian WHERE dietitianuserID ='$id11'";
            $res = mysqli_query($conn, $sql1);
            $user = mysqli_fetch_array($res, MYSQLI_ASSOC);
            if ($url[2] !== 'health_detail_form_create.php') { ?>
                <div class="nav-items">
                    <span class="mobile-menu-toggle" style="font-size:35px;cursor:pointer; margin-right: 20px;" onclick="openNav()" id="navbar-res">&#9776;</span>
                    <p id="topnav-content-1">Good Morning, <span id="topnav-content-1-name"><strong><?php echo ($user['name']); ?></strong></span></p>
                    <p id="topnav-content-2">Your performance summary this week</p>
                </div>
            <?php } else { ?>
                <div class="nav-items">
                    <p id="topnav-content-1"><span id="topnav-content-1-name"><strong><?php echo ($user['name']); ?></strong></span></p>
                    <p id="topnav-content-2">Health Details</p>
                </div>
            <?php } ?>
        </div>
        <div class="topnav-icons">


            <div class="search-box">
                <button onclick="toggleSearch()" id="toggleSearch" style="border-style:none;background:white;"><img src="<?= $DEFAULT_PATH ?>assets/images/search.svg" style="height: 20px; width: 20px;" class="sea"></button>
                <div id="searchContainer" class="search-container">
                    <img src="<?= $DEFAULT_PATH ?>assets/images/search1.svg" class="search-icon" onclick="performSearch(false)">
                    <input type="search" class="search-input" name="search_text" id="searchText" placeholder="Enter your search here" onchange="performSearch(false)">
                </div>
                <div id="searchResultsContainer" class="search-results-container">
                    <!-- This is where search results will be displayed -->
                </div>
            </div>

            <img id="notifications-pop" src="<?= $DEFAULT_PATH ?>assets/images/notification.svg" style="height: 20px; width: 20px;">
            <div class="noti-box">
                <div class="top"><span>Notifications</span><span id="noti-close"><i style="cursor: pointer;" class="fa-solid fa-xmark"></i></span></div>
            </div>
            <img class="profile-image" src="<?php if ($user['p_p'] === '' || $user['p_p'] === 'user-default.png') {
                                                echo $DEFAULT_PATH . 'assets/images/user-default.png';
                                            } else {
                                                echo 'uploads/profile/images/' . $user['p_p'];
                                            } ?>" style="height: 24px; width: 24px; border-radius:50%" id="addusermale">

        </div>

    </div>

    <!-- <div id="searchResultsContainer" style="width: 100vw; padding-left:50px" class="search-results-container"> -->
    <!-- This is where search results will be displayed -->
    <!-- </div> -->

    <!----------------------------------- MOBILE MENU ----------------------------------------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="mobile-menu">
        <div id="mySidenav" class="sidenavv">
            <img src="<?= $DEFAULT_PATH ?>assets/images/InfitsLogo.svg" id="logo">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.php"><img src="<?= $DEFAULT_PATH ?>assets/images/dashboard.svg">&nbsp&nbsp Dashboard</a>
            <a href="chat_home.php"><img src="<?= $DEFAULT_PATH ?>assets/images/chat.svg">&nbsp&nbsp Messages</a>
            <a href="live.php"><img src="<?= $DEFAULT_PATH ?>assets/images/live.svg">&nbsp&nbsp Live</a>
            <a href="appointments.php"><img src="<?= $DEFAULT_PATH ?>assets/images/calendar.svg">&nbsp&nbsp Appoinments</a>
            <a href="client_list.php"><img src="<?= $DEFAULT_PATH ?>assets/images/clients.svg">&nbsp&nbsp Clients</a>
            <a style="color:gray"><img src="<?= $DEFAULT_PATH ?>assets/images/dietPlan.svg">&nbsp&nbsp Diet Plans</a>
            <div class="submenu">
                <a style="font-size: 17px; margin-left: 14%;" href="myplan.php">My Plans</a>
            </div>
            <a style="color:gray"><img src="<?= $DEFAULT_PATH ?>assets/images/payment.svg">&nbsp&nbsp Payments</a>
            <div class="submenu">
                <a style="font-size: 17px; margin-left: 14%;" href="billingAndInvoices.php">Your Bills</a>
                <a style="font-size: 17px; margin-left: 14%;" href="payments.php">Client Payment</a>
            </div>
            <a style="color:gray"><img src="<?= $DEFAULT_PATH ?>assets/images/recipies.svg">&nbsp&nbsp Recipies</a>
            <div class="submenu">
                <a style="font-size: 17px; margin-left: 14%;" href="all_recipes.php">My Recipes</a>
                <a style="font-size: 17px; margin-left: 14%;" href="create_recipe.php">Add Recipe</a>
            </div>
            <a style="color:gray"><img src="<?= $DEFAULT_PATH ?>assets/images/healthForm.svg">&nbsp&nbsp Health Form</a>
            <div class="submenu">
                <a style="font-size: 17px; margin-left: 14%;" href="forms_and_documents.php">My forms</a>
            </div>
            <Script>
                $(document).ready(function() {
                    $('.submenu').hide(); // Hide all submenus initially

                    $('.sidenavv a').click(function(e) {
                        var submenu = $(this).next('.submenu');
                        submenu.toggle(); // Toggle the clicked submenu
                    });
                });
            </Script>
            <a href="help.php"><img src="<?= $DEFAULT_PATH ?>assets/images/getHelp.svg">&nbsp&nbsp Get Help</a>
            <a href="settings.php"><img src="<?= $DEFAULT_PATH ?>assets/images/settings.svg">&nbsp&nbsp Settings</a>
            <a href="logout.php"><img src="<?= $DEFAULT_PATH ?>assets/images/logOut.svg">&nbsp&nbsp Log Out</a>
        </div>

    </div>
    <?php require('constant/scripts.php'); ?>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

        function myFunction() {
            var x = document.getElementById("navbar-res");
            if (x.className === "nav-res") {
                x.className += " responsive";
            } else {
                x.className = "nav-res";
            }
        }
        document.getElementById('notifications-pop').addEventListener('click', () => {
            document.getElementsByClassName('noti-box')[0].style.animation = 'slideDown 0.5s forwards';
            document.getElementsByClassName('noti-box')[0].style.display = 'block';
            document.getElementsByClassName('noti-box')[0].style.zIndex = 5;

        });
        document.getElementById('noti-close').addEventListener('click', () => {
            document.getElementsByClassName('noti-box')[0].style.animation = 'slideUp 0.5s forwards';
            // document.getElementsByClassName('noti-box')[0].style.zIndex = 0;

        });
        // const currentPath = window.location.pathname;
        // const lastPage = currentPath.split('/').pop().split('.').shift();
        // document.getElementsByClassName('nav-' + lastPage)[0].classList.add('navactive');
        // const active_bar = document.querySelector('.navactive');
        // iconChange(active_bar);

        // function iconChange(el, active = "__active") {
        //     const src = el.firstElementChild.getAttribute('src');
        //     let new_src = src.split('/').pop().split('.').shift();
        //     if (active == "") {
        //         new_src = src.split('/').pop().split('.').shift().split('__').shift();
        //     }
        //     el.firstElementChild.setAttribute('src', `<?= $DEFAULT_PATH ?>assets/images/${new_src}${active}.svg`);

        // }
        // const side_links_hover = document.querySelectorAll('.sidenavlink');
        // side_links_hover.forEach(el => {
        //     el.addEventListener('mouseover', () => {
        //         if (el.classList.contains('navactive')) {
        //             return true;
        //         }
        //         iconChange(el);
        //     });
        //     el.addEventListener('mouseout', () => {
        //         if (el.classList.contains('navactive')) {
        //             return true;
        //         }
        //         iconChange(el, "");
        //     })
        // });

        // const side_links_hover2 = document.querySelectorAll('.sidenavlink2');
        // side_links_hover2.forEach(el => {
        //     el.addEventListener('mouseover', () => {
        //         if (el.classList.contains('navactive')) {
        //             return true;
        //         }
        //         iconChange(el);
        //     });
        //     el.addEventListener('mouseout', () => {
        //         if (el.classList.contains('navactive')) {
        //             return true;
        //         }
        //         iconChange(el, "");
        //     })
        // });

        if (typeof window.currentPath === 'undefined') {
            // If it's not declared, declare it
            window.currentPath = window.location.pathname;
            console.log(window.currentPath); // Do something with currentPath
        } else {
            // If it's already declared, you can choose to update it or perform other actions
            console.log('currentPath is already declared');
            console.log(window.currentPath); // Access the existing value of currentPath
        }

        if (typeof window.lastPage === 'undefined') {
            // If it's not declared, declare it
            window.lastPage = currentPath.split('/').pop().split('.').shift();
            console.log(window.lastPage); // Do something with currentPath
        } else {
            // If it's already declared, you can choose to update it or perform other actions
            console.log('lastPage is already declared');
            console.log(window.lastPage); // Access the existing value of currentPath
        }
        //console.log('currentPath', currentPath);
        // const lastPage = currentPath.split('/').pop().split('.').shift();
        console.log('lastPage', lastPage);
        console.log('get element', document.querySelectorAll('.nav-' + lastPage));
        document.getElementsByClassName('nav-' + lastPage)[0].classList.add('navactive');
        //const active_bar = document.querySelector('.navactive');

        if (typeof window.active_bar === 'undefined') {
            // If it's not declared, declare it
            window.active_bar = document.querySelector('.navactive');
            console.log(window.active_bar); // Do something with currentPath
        } else {
            // If it's already declared, you can choose to update it or perform other actions
            console.log('active_bar is already declared');
            console.log(window.active_bar); // Access the existing value of currentPath
        }

        iconChange(active_bar);

        function iconChange(el, active = "__active") {
            const src = el.firstElementChild.getAttribute('src');
            let new_src = src.split('/').pop().split('.').shift();
            /* if (active == "") {
                new_src = src.split('/').pop().split('.').shift().split('__').shift();
            } */
            el.firstElementChild.setAttribute('src', `<?= $DEFAULT_PATH ?>assets/images/${new_src}.svg`);

        }

        if (typeof window.side_links_hover === 'undefined') {
            // If it's not declared, declare it
            window.side_links_hover = document.querySelectorAll('.sidenavlink');
            console.log(window.side_links_hover); // Do something with currentPath
        } else {
            // If it's already declared, you can choose to update it or perform other actions
            console.log('side_links_hover is already declared');
            console.log(window.side_links_hover); // Access the existing value of currentPath
        }
        //const side_links_hover = document.querySelectorAll('.sidenavlink');
        side_links_hover.forEach(el => {
            el.addEventListener('mouseover', () => {
                if (el.classList.contains('navactive')) {
                    return true;
                }
                iconChange(el);
            });
            el.addEventListener('mouseout', () => {
                if (el.classList.contains('navactive')) {
                    return true;
                }
                iconChange(el, "");
            })
        });

        if (typeof window.side_links_hover2 === 'undefined') {
            // If it's not declared, declare it
            window.side_links_hover2 = document.querySelectorAll('.sidenavlink2');
            console.log(window.side_links_hover2); // Do something with currentPath
        } else {
            // If it's already declared, you can choose to update it or perform other actions
            console.log('side_links_hover2 is already declared');
            console.log(window.side_links_hover2); // Access the existing value of currentPath
        }

        //const side_links_hover2 = document.querySelectorAll('.sidenavlink2');
        side_links_hover2.forEach(el => {
            el.addEventListener('mouseover', () => {
                if (el.classList.contains('navactive')) {
                    return true;
                }
                iconChange(el);
            });
            el.addEventListener('mouseout', () => {
                if (el.classList.contains('navactive')) {
                    return true;
                }
                iconChange(el, "");
            })
        });

        function toggleSearch() {
            var searchContainer = document.getElementById("searchContainer");
            searchContainer.style.display = (searchContainer.style.display === "flex") ? "none" : "flex";
        }

        function performSearch(showAll) {
            var searchText = $("#searchText").val();

            if (searchText === "") {
                // Clear search results
                $("#searchResultsContainer").css("display", "none");
                $("#searchResultsContainer").html("");
            } else {
                // Send AJAX request using jQuery
                $.ajax({
                    type: "POST",
                    url: "search_app.php",
                    data: {
                        search_text: searchText,
                        show_all: showAll

                    },
                    success: function(response) {
                        $("#searchResultsContainer").css("display", "block");
                        $("#searchResultsContainer").html(response);
                    }
                });
            }
        }
    </script>

    <script>
        window.addEventListener('load', function() {
            window.dispatchEvent(new Event('resize'));
        });

        // let profile_image = document.getElementsByClassName("profile-image")[0];
        // profile_image.addEventListener("click",()=>{
        //     window.location = 'profile_settings_show.php';
        // });

        if (typeof window.profile_image === "undefined") {
            let profile_image = document.getElementsByClassName("profile-image")[0];
            profile_image.addEventListener("click", () => {
                window.location = 'profile_settings_show.php';
            });
        }

        function get_notifications() {
            console.log('get_notifications()');
            $.ajax({
                type: "POST", // HTTP method
                url: "notification_fetch.php", // URL to send the request
                data: {
                    dietitianuserID: <?= '"' . $id11 . '"'; ?>
                },
                success: function(response) {
                    var notifications = JSON.parse(response);
                    var notificationList = $('.noti-box');
                    console.log("This is response : ", response);

                    // Display notifications in the notification bar
                    notifications.forEach(function(notification) {
                        /* notification_content = [notification.ttl, notification.body];
                        notification_content.forEach((noti_c)=>{
                        }); */
                        let listItemContent = "<b>" + notification.ttl + "</b>" + " " + notification.body;
                        let listItem = $('<li class = "noti_li">');
                        let listDiv1 = $('<div class = "img_container">');
                        // let listImg = $('<img>');
                        // listImg.attr('src', './assets/images/reminder.svg');
                        // listImg.attr('class', 'noti_image');
                        let listDiv2 = $('<div class = "content_container">');
                        let h1 = $('<span class = "noti_ttl">');
                        h1.text(notification.ttl);
                        let p = $('<span class = "noti_content">');
                        p.text(notification.body);
                        listDiv2.append(h1);
                        listDiv2.append(p);
                        // listDiv1.append(listImg);
                        listItem.append(listDiv1);
                        listItem.append(listDiv2);
                        notificationList.append(listItem);
                    });
                    // Function to handle successful response
                    console.log("Response:", response);
                },
                error: function(xhr, status, error) {
                    // Function to handle errors
                    console.error("Error:", error);
                }
            });



        }
        get_notifications();
    </script>
</body>

</html>
