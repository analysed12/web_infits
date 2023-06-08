<?php
include('navbar.php');
if (isset($_SESSION['dietitian_id'])) {
  $dietitian_id = $_SESSION['dietitian_id'];
  $dietitianuserid = $_SESSION['dietitianuserID'];
  $clientId = $_GET['client_id'];
  $q = "SELECT * FROM addclient WHERE dietitianuserID = '$dietitianuserid' AND client_id = $clientId;";
  $result1 = $conn->query($q);
  if (mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_assoc($result1)) {
      $name = $row['name'];
    }
  }
  $sql = "SELECT * FROM diet_chart WHERE dietitian_id='$dietitian_id' AND client_id = '$clientId'";
  $result = $conn->query($sql);
  // if (mysqli_num_rows($result) < 1) {
  // header("Location:dietchart_default.php?client_id=$clientId");
  // }
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
    margin-left: 16rem;
}

@media only screen and (max-width: 720px) {
    .flex {
        display: flex;
        margin-top: 1rem;
        margin-left: 2rem;
    }

    .main .right {
        margin-top: 2px;
    }

    .sliding-cal {
        margin-right: 0;
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
</style>

<body>
    <div class="main">
        <div>
            <div class="flex">
                <div class="left" style="width: 22%;">
                    <h1 style="margin-top:2rem">Diet Chart</h1>
                </div>
                <div class="right" style="margin-top:0.6rem">
                    <?php echo $name ?>
                </div>
            </div>
            <div class="sliding-cal col-sm-12">
                <div id="slider-content"> </div>
            </div>
            <div class="maindiv">
                <div class="items">
                    <div class="item item1">
                        <div class="left">Diet Chart 1</div>
                        <div>
                            <img src="<?= $DEFAULT_PATH ?>assets/images/vertical-three-dots.svg"
                                style="height:20px; width:20px;" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="to">Assigned to: </div>
                        <div class="name"> Ronald Richards</div>
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
                <a class="butt" href="dietchart1.php?client_id=<?php echo $clientId ?>"
                    style="text-decoration:none;border-radius:50%;background-color:#9C74F5;
                  width:85px;height:85px;filter: drop-shadow(0px 0px 68px rgba(0, 0, 0, 0.3));color:white;font-size:60px;
                  border:none;position:absolute;right:60px;bottom:10px;display:flex;justify-content:center;align-items:center;">+</a>
            </div>
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
            </script>
</body>

</html>