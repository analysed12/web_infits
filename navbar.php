<?php
require('constant/config.php');

 if (session_status() === PHP_SESSION_NONE) { session_start(); }
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
    background: url('<?=$DEFAULT_PATH?>assets/images/Vector_Bottom_Right.svg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: bottom -51px right -40px;
    /* width: 100vw;
                height: 100vh; */
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
    background: url('<?=$DEFAULT_PATH?>assets/images/Vector_Top_Left.svg');
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
    width: 6px;
    height: 50px;
    background: #7282FB;
    position: absolute;
    left: -25px;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
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
    /* transition: 0.3s ease-in-out; */
    /* animation: slideDown 1s forwards; */
    /* animation: slideUp 1s forwards; */
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
</style>



<body>
    <div class="sidenav" id="sidenavbar">
        <img src="<?=$DEFAULT_PATH?>assets/images/InfitsLogo.svg" class="sidenavlink" id="logo">
        <a id="index"
            class="sidenavlink nav-index nav-task_list nav-track_stats_steps nav-track_stats_water nav-track_stats_heart nav-track_stats_sleep nav-track_stats_weight nav-track_stats_calorie"
            href="index.php"><img src="<?=$DEFAULT_PATH?>assets/images/dashboard.svg" class="nav-icon">Dashboard</a>
        <a id="messages" class="sidenavlink nav-chat_home" href="chat_home.php"><img
                src="<?=$DEFAULT_PATH?>assets/images/chat.svg" class="nav-icon">Messages</a>
        <a id="live" class="sidenavlink" href="live.php"><img src="<?=$DEFAULT_PATH?>assets/images/live.svg"
                class="nav-icon">Live</a>
        <a id="calendar_of_events" class="sidenavlink nav-calendar_of_events" href="calendar_of_events.php"><img
                src="<?=$DEFAULT_PATH?>assets/images/calendar.svg" class="nav-icon">Appoinments</a>
        <a id="client_list"
            class="sidenavlink nav-add_client nav-client_list nav-client_dashboard nav-setgoals nav-set_reminders nav-mealTracker"
            href="client_list.php"><img src="<?=$DEFAULT_PATH?>assets/images/clients.svg" class="nav-icon">Clients</a>
        <a id="myplan" class="sidenavlink nav-myplan nav-create_plan nav-update_plan" href="myplan.php"><img
                src="<?=$DEFAULT_PATH?>assets/images/dietPlan.svg" class="nav-icon">Diet Plans</a>
        <a id="payments" class="sidenavlink nav-payments" href="billingAndInvoices.php"><img
                src="<?=$DEFAULT_PATH?>assets/images/payment.svg" class="nav-icon">Payments</a>
        <a id="create_recipe" class="sidenavlink nav-all_recipes nav-create_recipe" href="all_recipes.php"><img
                src="<?=$DEFAULT_PATH?>assets/images/recipies.svg" class="nav-icon">Recipes</a>
        <a id="healthform" class="sidenavlink nav-healthform" href="#"><img
                src="<?=$DEFAULT_PATH?>assets/images/healthForm.svg" class="nav-icon">Health Form</a>

        <div class="menu-bottom">
            <a class="sidenavlink nav-help" href="help.php"><img src="<?=$DEFAULT_PATH?>assets/images/getHelp.svg"
                    class="nav-icon">Get Help</a>
            <a class="sidenavlink nav-settings" href="settings.php"><img
                    src="<?=$DEFAULT_PATH?>assets/images/settings.svg" class="nav-icon">Settings</a>
            <a href="logout.php" class="sidenavlink"><img src="<?=$DEFAULT_PATH?>assets/images/logOut.svg"
                    class="nav-icon">Log Out</a>
        </div>
    </div>

    <div class="topnav">
        <div class="topnav-content" id="topnav-change">
            <p id="topnav-content-1">Good Morning, <span id="topnav-content-1-name">
                    <strong>
                        <?php
                    $id11 = $_SESSION['dietitianuserID'] ;
                    $sql1 = "SELECT * FROM dietitian WHERE dietitianuserID ='$id11'";
                    $res = mysqli_query($conn,$sql1);
                    $user = mysqli_fetch_array($res, MYSQLI_ASSOC);
                    // $row = mysqli_fetch_assoc($res) ; 
                    // echo ($_SESSION['dietitianuserID']);
                    echo($user['name']);
                    // echo $id11;
                    ?>
                    </strong></span></p>
            <p id="topnav-content-2">Your performance summary this week</p>
        </div>
        <div class="topnav-icons">

            <!-- <img src="images/vec_search.png" style="height: 20px; width: 20px;" class="sea"> -->
            <!-- <div style="margin-right:2rem;display:flex;gap:1.5rem">
            <div class="searchbox">
                <form action="searching.php" method="POST">
                    <input type="text" name="search" placeholder="Search here" style="border:none;font-size:1rem;margin-left:1rem">
                    <button><img src="images/vec_search.png" alt=""></button>
            </div>
        </div> -->

            <div class="search-box">
                <button onclick="" id="toggleSearch" style="border-style:none;background:white;"><img
                        src="<?=$DEFAULT_PATH?>assets/images/search.svg" style="height: 20px; width: 20px;"
                        class="sea"></button>
            </div>

            <img id="notifications-pop" src="<?=$DEFAULT_PATH?>assets/images/notification.svg"
                style="height: 20px; width: 20px;">
            <div class="noti-box">
                <div class="top"><span>Notifications</span><span id="noti-close"><i style="cursor: pointer;"
                            class="fa-solid fa-xmark"></i></span></div>
            </div>
            <img <?php if($user['socialLogin'] == 1){ echo "src='{$user['p_p']}'"; }else{ ?> src="<?=$DEFAULT_PATH?>assets/images/dietitian_profile.svg" <?php } ?> style="height: 24px; width: 24px; border-radius:50%"
                id="addusermale">

        </div>

    </div>

    <!----------------------------------- MOBILE MENU ----------------------------------------->

    <div class="mobile-menu">
        <div id="mySidenav" class="sidenavv">
            <img src="<?=$DEFAULT_PATH?>assets/images/InfitsLogo.svg" id="logo">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.php" id="defaultOpen"><img src="<?=$DEFAULT_PATH?>assets/images/dashboard.svg">&nbsp&nbsp
                Dashboard</a>
            <a href="chat_home.php"><img src="<?=$DEFAULT_PATH?>assets/images/chat.svg">&nbsp&nbsp Messages</a>
            <a href="live.php"><img src="<?=$DEFAULT_PATH?>assets/images/live.svg">&nbsp&nbsp Live</a>
            <a href="calendar_of_events.php"><img src="<?=$DEFAULT_PATH?>assets/images/calendar.svg">&nbsp&nbsp Appoinments</a>
            <a href="client_list.php"><img src="<?=$DEFAULT_PATH?>assets/images/clients.svg">&nbsp&nbsp Clients</a>
            <a href="myplan.php"><img src="<?=$DEFAULT_PATH?>assets/images/dietPlan.svg">&nbsp&nbsp Diet Plans</a>
            <a href="billingAndInvoices.php"><img src="<?=$DEFAULT_PATH?>assets/images/payment.svg">&nbsp&nbsp Payments</a>
            <a href="all_recipes.php"><img src="<?=$DEFAULT_PATH?>assets/images/recipies.svg">&nbsp&nbsp Recipies</a>
            <a href="#"><img src="<?=$DEFAULT_PATH?>assets/images/healthForm.svg">&nbsp&nbsp Health Form</a>

            <a href="help.php"><img src="<?=$DEFAULT_PATH?>assets/images/getHelp.svg">&nbsp&nbsp Get Help</a>
            <a href="settings.php"><img src="<?=$DEFAULT_PATH?>assets/images/settings.svg">&nbsp&nbsp Settings</a>
            <a href="logout.php"><img src="<?=$DEFAULT_PATH?>assets/images/logOut.svg">&nbsp&nbsp Log Out</a>
        </div>
        <span style="font-size:35px;cursor:pointer; margin: 5px;" onclick="openNav()" id="navbar-res">&#9776;</span>
    </div>


    <?php require('constant/scripts.php'); ?>
    <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    /* Toggle between adding and removing the "responsive" class to sidenav when the user clicks on the icon */
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

    });
    document.getElementById('noti-close').addEventListener('click', () => {
        document.getElementsByClassName('noti-box')[0].style.animation = 'slideUp 0.5s forwards';
        // document.getElementsByClassName('noti-box')[0].style.display = 'none';
    });
    // get the url and add active to page 
    const currentPath = window.location.pathname;
    const lastPage = currentPath.split('/').pop().split('.').shift();
    // document.getElementById(lastPage).classList.add('navactive');
    document.getElementsByClassName('nav-' + lastPage)[0].classList.add('navactive');
    const active_bar = document.querySelector('.navactive');
    iconChange(active_bar);

    function iconChange(el, active = "__active") {
        const src = el.firstElementChild.getAttribute('src');
        let new_src = src.split('/').pop().split('.').shift();
        if (active == "") {
            new_src = src.split('/').pop().split('.').shift().split('__').shift();
        }
        el.firstElementChild.setAttribute('src', `<?=$DEFAULT_PATH?>assets/images/${new_src}${active}.svg`);

    }
    const side_links_hover = document.querySelectorAll('.sidenavlink');
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
    </script>
</body>

</html>