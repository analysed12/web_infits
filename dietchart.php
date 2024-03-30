<?php
include('navbar.php');
if (isset($_SESSION['dietitian_id'])) {
    $dietitian_id = $_SESSION['dietitian_id'];
    $dietitianuserid = $_SESSION['dietitianuserID'];
    $clientId = $_GET['client_id'];
    $q = "SELECT * FROM addclient WHERE dietitianuserID = '$dietitianuserid' AND client_id = '$clientId';";
    $result1 = $conn->query($q);
    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) {
            $name = $row['name'];
        }
    }
    $sql = "SELECT * FROM diet_chart WHERE dietitian_id='$dietitian_id' AND client_id = '$clientId'";
    $result = $conn->query($sql);
    
}
?>

<?php require('constant/config.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infits | DietChart2</title>
    <?php require('constant/head.php'); ?>
</head>
<style>
    .main {
        display: flex;
        flex-wrap: wrap !important;
        margin-top: 30px;
        width: max-content;

    }

    body {
        font-family: 'NATS', sans-serif !important;
    }

    .items {
        width: 307px;
        padding: 20px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 30px;
    }

    .item {
        display: flex;
        justify-content: space-between;
    }

    .item1 {
        justify-content: space-between;
    }

    .item1 .left {
        width: 150px;
        height: 38px;
        left: 52px;
        top: 28px;
        padding-left: 8%;
        font-weight: 400;
        font-size: 25px;
        line-height: 150%;
        display: flex;
        align-items: center;
        background: #9C74F5;
        border-radius: 10px;
        color: #FFFFFF;
    }

    .to {
        width: 110px;
        height: 30px;
        left: 32px;
        top: 82px;
        font-weight: 400;
        font-size: 20px;
        line-height: 150%;
        display: flex;
        align-items: center;
        color: #D2D2D2;
    }

    .name {
        width: 180px;
        height: 30px;
        left: 32px;
        top: 82px;
        font-weight: 400;
        font-size: 20px;
        line-height: 150%;
        display: flex;
        align-items: center;
        color: black;
    }

    .text {
        height: 23px;
        left: 32px;
        top: 123px;
        font-weight: 400;
        font-size: 18px;
        line-height: 150%;
        display: flex;
        align-items: center;
        color: #000000;
    }

    .no {
        width: 25px;
        height: 22px;
        left: 323px;
        top: 165px;
        border-radius: 50%;
        background-color: #9C74F5;
        color: white;
        text-align: center;
        font-size: 18px;
        font-weight: 500;
        padding-left: 0px;
        padding-bottom: 25px;
    }

    .item3 {
        display: flex;
        gap: 10px;
    }

    .item .dayes {
        width: 121px;
        height: 30px;
        left: 159px;
        top: 162px;
        background: #9C74F5;
        border-radius: 8px;
        font-weight: 400;
        font-size: 15px;
        line-height: 32px;
        padding-left: 5%;
        color: #FFFFFF;
    }

    .r {
        font-style: normal;
        font-weight: 400;
        font-size: 15px;
        margin-top: 3px;
    }

    .sliding-cal {
        position: relative;
        width: 80.5rem;
        height: 115px;
        overflow: scroll;
        background: #FFFFFF;
        margin-top: 20px;
        border: 1px solid rgba(225, 225, 225, 0.66);
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
    }

    #slider-content {
        position: absolute;
        display: flex;
        justify-content: space-around;
        height: 100%;
        display: flex;
    }

    .current-day {
        border-radius: 100%;
        color: white;
        width: 55px;
        height: 100px;
        text-align: center;
        background: linear-gradient(180deg, rgba(156, 116, 245, 0.61) 33.65%, #9C74F5 70.62%);
        cursor: pointer;
    }

    .itemes {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        width: 80px;
        background-color: white;
        padding: 20px;
    }

    .day {
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 50px;
        margin-top: 10px;
    }

    .day:hover {
        border-radius: 100%;
        color: white;
        width: 55px;
        text-align: center;
        height: 100px;
        background: linear-gradient(180deg, rgba(156, 116, 245, 0.61) 33.65%, #9C74F5 70.62%);
        cursor: pointer;
    }

    .date {
        font-style: normal;
        font-weight: 700;
        font-size: 19px;
        line-height: 24px;
        margin-top: -10px;
        margin-bottom: 10px;
    }

    .sliding-cal::-webkit-scrollbar {
        display: none;
    }

    .sliding-cal {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .maindiv {
        display: flex;
        gap: 50px;
        flex-wrap: wrap;
        margin-top: 4%;
        justify-content: center;
        flex-wrap: wrap;
    }

    .main .right {
        height: 74px;
        left: 532px;
        top: 93px;
        margin-top: 7px;
        font-weight: 400;
        font-size: 32px;
        line-height: 74px;
        letter-spacing: -0.114286px;
        color: #CBCBCB;
    }

    .left h1 {
        margin-top: 20px !important;
        margin-left: 6%;
    }

    .flex {
        display: flex;
        margin-top: 1rem;
        /* margin-left: 16rem; */
    }

    @media only screen and (max-width: 720px) {
        .flex {
            display: flex;
            margin-top: 1rem;
            /* margin-left: 2rem; */
        }

        .main .right {
            margin-top: 2px;
        }

        .sliding-cal {
            margin-right: 0;
        }

        .butt {
            position: absolute !important;
            bottom: 0 !important;
            right: 0 !important;

        }

        .main {
            justify-content: center;
            align-items: center;
        }
    }

    @media screen and (min-width: 720px) and (max-width:1500px) {
        .sliding-cal {
            position: relative;
            width: auto;
        }

        .button-container {
            display: flex;
            flex-direction: row;
            overflow-x: auto;
            margin-right: 40px;
            margin-left: -20px;
        }


    }

    @media screen and (min-width:500px) and (max-width:720px) {
        .sliding-cal {
            width: auto;
            margin-left: 1px;
            margin-top: 20px;
        }

        .right {
            margin-top: 4px !important;
        }

        .maindiv {
            margin-left: 12%;
        }
    }

    @media screen and (min-width:0px) and (max-width:500px) {
        .main-content {
            overflow: none;
            margin-right: 20px;
        }

        .maindiv {
            margin-left: 12%;
            justify-content: center;
        }

        .sliding-cal {
            width: auto;
            margin-top: 30px;
            margin-left: 1px;
        }
    }

    /* .option-popup{
     margin-left: 55px; 
} */
    .option-popup button {
        width: 100px;
    }

    .option-popup {
        display: none;
    }

    .show {
        display: flex;
        flex-direction: column;
        background-color: transparent;
        width: 250px;
        height: 100px;
        position: relative;
        top: 45%;
        left: -20%;
        transform: translate(-40%, -50%);
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        -webkit-transform: translate(-40%, -50%);
        -moz-transform: translate(-40%, -50%);
        -ms-transform: translate(-40%, -50%);
        -o-transform: translate(-40%, -50%);
        border-radius: 10.0347px;
        background: white;
        padding: 13px 20px !important;
        border: #E4E3E3 solid 1px;
    }

    .option-popup button {
        background-color: #FF2929;
        color: #FFFFFF;
        padding: 5px 30px;
        font-size: 1rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 5px;
    }

    .option-popup button:last-child {
        background-color: #9C74F5;
        text-decoration: none !important;
    }

    @media screen and (max-width: 1200px) {
        .option-popup {
            width: 130px;
            margin-top: 0;

        }
    }

    .container {}

    .btn .butt {
        background: #9C74F5;
        border: 0px;
        color: white;
        border-radius: 50%;
        position: absolute;
        bottom: 35px;
        right: 25px;
        width: 85px;
        height: 85px;
        font-size: 40px;
    }
</style>

<body>
    <div class="main" >
        <div>
            <div class="flex">
                <div class="left" style="width: 22%;">
                    <h1 style="margin-top:2reml just">Diet Chart</h1>
                </div>
                <div class="right" style="font-size: 2.8vw; color: #79608e">
                    <?php echo $name ?>
                </div>
            </div>
            <div class="sliding-cal col-12" style="width: 80vw;">
                <div class="col-12" id="slider-content" style="width: 100vw !important;"> </div>
                <!-- <div id="slider-content" style="overflow:auto; width:max-content;"> </div> -->
            </div>
            <div class="container" style="display: flex; flex-wrap:wrap; ">
                <?php
                $clientId = $_GET['client_id'];
                $dietitian_id = $_SESSION['dietitian_id'];
                $sql = "SELECT * FROM diet_chart WHERE dietitian_id='$dietitian_id' AND client_id = '$clientId'";
                $result = $conn->query($sql);
                if ($result1->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="mainDiv d-flex" style="padding:15px; width:310px; height:238px;border-radius:16px;margin:35px 1.5vmax;">
                            <div class="items">
                                <div class="item item1">
                                    <div class="left" style="width:70%"><?= $row['dietchart_name'] ?></div>
                                    <div>
                                        <img src="<?= $DEFAULT_PATH ?>assets/images/vertical-three-dots.svg" style="height:20px; width:20px;" onclick="showPopup(this)" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="to">Assigned to: </div>
                                    <div class="name"> <?= $name ?></div>
                                </div>
                                <div class="item text">Breakfast, Lunch, Snacks, Dinner</div>
                                <div class="item">
                                    <div class="item3">
                                        <div class="no">12</div>
                                        <div class="r">Recipes</div>
                                    </div>
                                    <div class="dayes"> Monday - Sunday</div>
                                </div>
                            </div>
                            <div class="option-popup">
                                <button onclick="return confirm('Are you sure to delete this?')" class="formDelete"><a style="text-decoration:none;color:white;" href="delete_dietchart.php?client_id=<?= $clientId ?>&dietchart=<?= $row['dietchart_id'] ?>">DELETE</a></button>
                                <button class="formEdit"><a style="text-decoration:none;color:white;" href="create_dietchart.php?client_id=<?= $clientId ?>&dietchart_id=<?= $row['dietchart_id'] ?>">EDIT</a></button>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>


            <a class="butt" href="create_dietchart.php?client_id=<?php echo $clientId ?>&dietchart_id=-1&day=monday&course=brm" style="text-decoration:none;border-radius:50%;background-color:#9C74F5;width:85px;height:85px;filter: drop-shadow(0px 0px 68px rgba(0, 0, 0, 0.3));color:white;font-size:60px;border:none;position:absolute;right:50px;bottom:60px;display:flex;justify-content:center;align-items:center;">+</a>
            <?php require('constant/scripts.php'); ?>

            <script>
                const Date_function = () => {
                    var now = new Date();
                    var value;
                    const str = obtain_Date(now, 0);
                    const startdate = new Date(str);
                    const currentDate = new Date();
                    const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();
                    var i = 0;
                    while (i < daysInMonth) {
                        value = obtain_Date(startdate, i);
                        const isCurrentDate = value.toDateString() === currentDate.toDateString();
                        days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                        const dayClass = isCurrentDate ? 'day current-day' : 'day';
                        const dateClass = isCurrentDate ? 'date current-date' : 'date';
                        html = `<div class="itemes">
          <div class="${dayClass}">${days[parseInt(value.getDay())]}</div><br>
            <div class="${dateClass}">${value.getDate()}</div>
          </div>`;
                        document.getElementById('slider-content').innerHTML += html;
                        i++;
                    }
                };

                // Obtain specific dates -->
                const obtain_Date = (date, x) => {
                    var newdate = new Date();
                    newdate.setDate(date.getDate() + x)
                    return newdate;
                }
                Date_function();
                const slider = document.querySelector('#slider-content');
                let sliderGrabbed = false;
                slider.addEventListener('mousedown', (e) => {
                    sliderGrabbed = true;
                    slider.style.cursor = 'grabbing';
                })
                slider.addEventListener('mouseup', (e) => {
                    sliderGrabbed = false;
                    slider.style.cursor = 'grab';
                })
                slider.addEventListener('mouseleave', (e) => {
                    sliderGrabbed = false;
                })
                slider.addEventListener('mousemove', (e) => {
                    if (sliderGrabbed) {
                        slider.parentElement.scrollLeft -= e.movementX;
                    }
                })
                slider.addEventListener('wheel', (e) => {
                    e.preventDefault()
                    slider.parentElement.scrollLeft += e.deltaY;
                })

                function getScrollPercentage() {
                    return ((slider.parentElement.scrollLeft / (slider.parentElement.scrollWidth - slider.parentElement
                        .clientWidth)) * 100);
                }

                function showPopup(e) {
                    // e.parentNode.parentNode.children[2].classList.toggle("show");
                    console.log(e.parentNode.parentNode.parentNode.parentNode.children[1].classList.toggle("show"));
                }
            </script>
</body>

</html>
