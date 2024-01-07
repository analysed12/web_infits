<?php

include("navbar.php");
require('constant/config.php');


function fetchData($client_id)
{
  $sql = "SELECT monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM diet_chart where client_id=$client_id;";
  global $conn;
  $result = $conn->query($sql);
  return ($result);
}

function fetchInformation($result, $day)
{
    $total=mysqli_num_rows($result);
  if ($total > 0) {
    while ($row = $result->fetch_assoc()) {
      // Decode the JSON data for each day
      $daydata = json_decode($row[$day], true);
      return $daydata;
    }
  }
}
function compute($info, $time, $subtime)
{
  global $conn;
  foreach ($info[$time][$subtime] as $value) {
    $sqld = "SELECT * FROM default_recipes WHERE drecipe_id = $value";
    $resultd = mysqli_query($conn, $sqld);
    $total=mysqli_num_rows($resultd);
    if ($total > 0) {
      while ($row = mysqli_fetch_assoc($resultd)) {
        ?>
<div class="d-flex justify-content-center flex-column justify-content-center text-center me-4">
    <img src="images/Screenshot__136_-removebg-preview 6.png" alt="s">
    <div class="fw-bold mt-3">
        <?php echo ($row['drecipe_name']); ?>
    </div>
</div>
<?php
      }
    }

  }
  ?>

<?php
}
function update($client_id, $day)
{
  $result = fetchData($client_id);
  $info = fetchInformation($result, $day);
  return $info;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('constant/head.php');?>
    <title>MealTracker</title>
    <style>
    body {
        font-family: 'NATS' !important;
        overflow-y: none;
        overflow-x: none;
    }

    .left {
        position: relative;
        display: inline-block;
        margin-top: 20px;
        margin-left: 30px;
    }
    .right {
        position: relative;
        display: inline-block;
        float: right;
        margin-right: 50px;
        margin-top: 30px;
        font-size: 24px;
        font-weight: 400px;
        color: #5c5c5c;

    }

    .button-container {
        display: inline-block;
        margin-top: 50px;
        margin-left: 2px;

    }

    .btn1 {
        margin-left: 70px;
        padding: 10px;
        width: 203.19px;
        height: 47.55px;
        font-family: 'NATS';
        font-size: normal;
        font-weight: 500;
        font-size: 24px;
        line-height: 100%;

        text-align: center;
        border: 1px solid #9C74F5;
        border-radius: 10px;
        background-color: #fff;
        color: #9C74F5;
    }

    .btn1.active {
        background-color: #9C74F5;
        color: #fff;
    }

    .btn1:hover {
        background-color: #9C74F5;
        color: #fff;
    }

    .card {
        background: #FFFFFF;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        bottom: 20px;
        padding: 15px;
        width: 300px;
        height: 270px;
        border-radius: 16px;
        margin-right: -5px;
        margin-left: 70px;
        margin-top: 50px;
    }

    .card-food {
        font-family: 'NATS';
        font-style: normal;
        font-weight: 100;
        font-size: 18px;
        background-color: #9C74F5;
        border-radius: 10px;
        padding: 2px 7px;
        color: #fff;
        border-width: 1px;
        border-color: #9C74F5;
        margin-right: 5px;
        line-height: 140%;
        margin-top: 4px;
    }

    .card-calorie {
        left: 27px;
        margin-top: -5px;
        top: 41.36px;
        font-family: 'NATS';
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 67%;
        align-items: center;
        color: #C1C1C1;
    }

    .date2 {
        text-align: center;
        color: #C1C1C1;
        line-height: 237.5%;
        font-family: 'NATS';
        font-style: normal;
        font-weight: 400;
        font-size: 16.6px;
        margin-left: 158px;
        margin-top: -77px;
    }

    .time {
        text-align: center;
        color: #C1C1C1;
        line-height: 237.5%;
        font-style: normal;
        font-weight: 200;
        font-size: 16px;
        margin-left: 170px;
        margin-top: -19px;
    }

    /*-----------------------------Calendar css--------------------------------*/

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
        background: linear-gradient(180deg, rgba(118, 165, 255, 0.61) 44.58%, #76A5FF 70.62%);
        cursor: pointer;
    }

    .item {
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
        background: linear-gradient(180deg, rgba(118, 165, 255, 0.61) 44.58%, #76A5FF 70.62%);
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

    @media screen and (min-width: 720px) and (max-width:1500px) {
        .sliding-cal {
            position: relative;
            width: auto;
        }

        .button-container {
            display: flex;
            overflow-y: hidden;
            flex-direction: row;
            overflow-x: auto;
            margin-right: 40px;
            margin-left: -20px;

        }

        .btn1 {
            margin-left: 30px;
        }
    }

    @media screen and (min-width:0px) and (max-width:600px) {
        .main-content {
            overflow: none;
            margin-right: 10px;
        }

        .sliding-cal {
            margin-top: 60px;
            margin-right: -10px;
            width: auto;
            margin-left: -50px;
        }

    }

    @media screen and (min-width:600px) and (max-width:720px) {

        .main-content {
            overflow: none;
            margin-right: 20px;
        }

        .sliding-cal {
            margin-right: -16px;
            margin-left: -55px;
            margin-top: 60px;
            width:auto;
        }

        .card {
            display: flex;
        }
    }

    @media screen and (min-width:0px) and (max-width:720px) {

        .main-content {
            margin-top: -10px;
            bottom: 20px;
            margin-left: 50px;
            overflow: none;
        }

        .left {
            margin-top: -15px;
            margin-left: 20px;
        }

        .left h1 {
            font-size: 40px;
        }

        .right {
            margin-top: -10px;
        }

        .button-container {
            display: flex;
            flex-direction: row;
            overflow-x: auto;
            overflow-y: hidden;
            margin-right: 20px;
            margin-left: -65px;
        }

        .btn1 {
            margin-left: 20px;
        }
    }

    @media screen and (min-width:360px) and (max-width:720px) {
        .card {
            margin-left: 1rem;
        }
    }

    @media screen and (min-width:0px) and (max-width:360px) {
        .card {
            margin-left: 1rem;
        }
    }
    </style>
</head>

<body>
    <div class="main-content">
        <div>
            <div class="left">
                <h1 style="margin-top:1rem;margin-left:0.7rem">Meal Tracker</h1>
            </div>
            <div class="right" style="margin-left:1.5rem">
                <img src="<?=$DEFAULT_PATH?>assets/images/Tea.svg" style="margin-top:-10px;">
                <p style="display: inline-block;">
                <?php
            date_default_timezone_set('Asia/Kolkata'); 
            print "". date("d M Y"); ?></p>
            </div>
        </div>
        <div class="sliding-cal col-sm-12">
            <div id="slider-content"></div>
        </div>
    </div>

    <div class="button-container">
            <button class="btn1 active" id="btn1" style="margin-left:70px;">Breakfast</button>
            <button class="btn1" id="btn2">Lunch</button>
            <button class="btn1" id="btn3">Snacks</button>
            <button class="btn1" id="btn4">Dinner</button>
    </div>
<div class="tabcontent" id="breakfast1">

 <!--------------breakfast recipes---------->
    <?php
    $sql = "SELECT * FROM `default_recipes` where drecipe_category='breakfast'";
    
    $res = mysqli_query($conn, $sql);
    $total=mysqli_num_rows($res);
    if($total>0){
    ?>
    <div class="flex row">
        <?php $counter = 0;
        while ($d = mysqli_fetch_assoc($res)) {
            $drecipe_recipe = explode(',', $d['drecipe_recipe']);
            $steps = count($drecipe_recipe);
            $drecipe_nutritional = $d['drecipe_nutritional_information'];

            $drecipe_nutritional = trim($drecipe_nutritional, '{}');
            $pairs = explode(', ', $drecipe_nutritional);
            $nutritional = json_decode($d['drecipe_nutritional_information'],true);
        ?>
            <div class="card d-flex">
                <div class="img-dis">
                    <img src="<?=$DEFAULT_PATH?>assets/images/Alooparantha.svg"
                        style="width:240px;height:148px;margin-left:10px;top: 25px;border-radius:10px;" />
                </div>
                <div class="d-flex justify-content-between">
                    <p class="card-food" style="margin-left:18px;"><?php echo $d['drecipe_name'] ?></p>
                </div>
                <div class="d-flex justify-content-between" style="align-items:center;">
                    <h6 class="card-calorie"> <img src="<?=$DEFAULT_PATH?>assets/images/calorie.svg" style="margin-left:18px;" alt="">
                        <?php echo $nutritional['Calories'] ?> kcal</h6>
                </div>
                <div class="date2">
                    <p style="display: inline-block;">
                        <?php
                    date_default_timezone_set('Asia/Kolkata'); 
                    print "". date("d M Y"); 
                ?></p>
                </div>
                <div class="time">
                    <p>10:52 a.m.</p>
                </div>
            </div>
            <?php }
            }
                else{?>
                    

  
                    <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;">
                        <img src="assets/images/Thanksgiving Day.svg" class="image">
                        <p style="font-size:40px;text-align:center; color: black;">No image shared by the client yet!</p> 
                    </div>
<!-----------------------------Calender--------------------------------><?php
                 } ?>
        </div>
</div>


<div class="tabcontent" id="lunch1">

 <!--------------Lunch recipes---------->
    <?php
    $sql = "SELECT * FROM `default_recipes` where drecipe_category='lunch'";
    
    $res = mysqli_query($conn, $sql);
    $total1=mysqli_num_rows($res);
    if($total1>0){
    ?>
    <div class="flex row">
        <?php $counter = 0;
        while ($d = mysqli_fetch_assoc($res)) {
            $drecipe_recipe = explode(',', $d['drecipe_recipe']);
            $steps = count($drecipe_recipe);
            $drecipe_nutritional = $d['drecipe_nutritional_information'];

            $drecipe_nutritional = trim($drecipe_nutritional, '{}');
            $pairs = explode(', ', $drecipe_nutritional);
            $nutritional = json_decode($d['drecipe_nutritional_information'],true);
        ?>
            <div class="card d-flex">
                <div class="img-dis">
                    <img src="<?=$DEFAULT_PATH?>assets/images/Alooparantha.svg"
                        style="width:240px;height:148px;margin-left:10px;top: 25px;border-radius:10px;" />
                </div>
                <div class="d-flex justify-content-between">
                    <p class="card-food" style="margin-left:18px;"><?php echo $d['drecipe_name'] ?></p>
                </div>
                <div class="d-flex justify-content-between" style="align-items:center;">
                    <h6 class="card-calorie"> <img src="<?=$DEFAULT_PATH?>assets/images/calorie.svg" style="margin-left:18px;" alt="">
                        <?php echo $nutritional['Calories'] ?> kcal</h6>
                </div>
                <div class="date2">
                    <p style="display: inline-block;">
                        <?php
                    date_default_timezone_set('Asia/Kolkata'); 
                    print "". date("d M Y"); 
                ?></p>
                </div>
                <div class="time">
                    <p>10:52 a.m.</p>
                </div>
            </div>
            <?php } 
            }
            else{
                ?>                    

  
            <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;">
                  <img src="assets/images/Thanksgiving Day.svg" class="image">
                  <p style="font-size:40px;text-align:center; color: black;">No image shared by the client yet!</p> 
                  
                </div>
                       
            <!-----------------------------Calender--------------------------------><?php
                            
                    }        ?>
        </div>
</div>

<div class="tabcontent" id="snack1">
    <!--------------snacks recipes---------->
    <?php
    $sql = "SELECT * FROM `default_recipes` where drecipe_category='snacks'";
   
    $res = mysqli_query($conn, $sql);
    
    $total2=mysqli_num_rows($res);
    if($total2>0){
    ?>
    <div class="flex row">
        <?php $counter = 0;
        while ($d = mysqli_fetch_assoc($res)) {
            $drecipe_recipe = explode(',', $d['drecipe_recipe']);
            $steps = count($drecipe_recipe);
            $drecipe_nutritional = $d['drecipe_nutritional_information'];

            $drecipe_nutritional = trim($drecipe_nutritional, '{}');
            $pairs = explode(', ', $drecipe_nutritional);
            $nutritional = json_decode($d['drecipe_nutritional_information'],true);
        ?>
            <div class="card d-flex">
                <div class="img-dis">
                    <img src="<?=$DEFAULT_PATH?>assets/images/Alooparantha.svg"
                        style="width:240px;height:148px;margin-left:10px;top: 25px;border-radius:10px;" />
                </div>
                <div class="d-flex justify-content-between">
                    <p class="card-food" style="margin-left:18px;"><?php echo $d['drecipe_name'] ?></p>
                </div>
                <div class="d-flex justify-content-between" style="align-items:center;">
                    <h6 class="card-calorie"> <img src="<?=$DEFAULT_PATH?>assets/images/calorie.svg" style="margin-left:18px;" alt="">
                        <?php echo $nutritional['Calories'] ?> kcal</h6>
                </div>
                <div class="date2">
                    <p style="display: inline-block;">
                        <?php
                    date_default_timezone_set('Asia/Kolkata'); 
                    print "". date("d M Y"); 
                ?></p>
                </div>
                <div class="time">
                    <p>10:52 a.m.</p>
                </div>
            </div>
            <?php } }
            else {?>
                <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;">
                  <img src="assets/images/Thanksgiving Day.svg" class="image">
                  <p style="font-size:40px;text-align:center; color: black;">No image shared by the client yet!</p> 
                  
                </div>
                <?php
            
            } ?>
        </div>
</div>

<div class="tabcontent" id="dinner1">
 <!--------------dinner recipes---------->
    <?php
    $sql = "SELECT * FROM `default_recipes` where drecipe_category='dinner'";
    $res = mysqli_query($conn, $sql);
    
    $total3=mysqli_num_rows($res);
    if($total3>0){
    ?>
    <div class="flex row">
        <?php $counter = 0;
        while ($d = mysqli_fetch_assoc($res)) {
            $drecipe_recipe = explode(',', $d['drecipe_recipe']);
            $steps = count($drecipe_recipe);
            $drecipe_nutritional = $d['drecipe_nutritional_information'];

            $drecipe_nutritional = trim($drecipe_nutritional, '{}');
            $pairs = explode(', ', $drecipe_nutritional);
            $nutritional = json_decode($d['drecipe_nutritional_information'],true);
        ?>
            <div class="card d-flex">
                <div class="img-dis">
                    <img src="<?=$DEFAULT_PATH?>assets/images/Alooparantha.svg"
                        style="width:240px;height:148px;margin-left:10px;top: 25px;border-radius:10px;" />
                </div>
                <div class="d-flex justify-content-between">
                    <p class="card-food" style="margin-left:18px;"><?php echo $d['drecipe_name'] ?></p>
                </div>
                <div class="d-flex justify-content-between" style="align-items:center;">
                    <h6 class="card-calorie"> <img src="<?=$DEFAULT_PATH?>assets/images/calorie.svg" style="margin-left:18px;" alt="">
                        <?php echo $nutritional['Calories'] ?> kcal</h6>
                </div>
                <div class="date2">
                    <p style="display: inline-block;">
                        <?php
                    date_default_timezone_set('Asia/Kolkata'); 
                    print "". date("d M Y"); 
                ?></p>
                </div>
                <div class="time">
                    <p>10:52 a.m.</p>
                </div>
            </div>
            <?php }}
            else{
                ?>
                <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;">
                  <img src="assets/images/Thanksgiving Day.svg" class="image">
                  <p style="font-size:40px;text-align:center; color: black;">No image shared by the client yet!</p> 
                  
                </div>
                <?php
            
            } ?>
        </div>
</div>
<script>
  $(document).ready(function () {
    $("#btn1").click(function () {
      $("#breakfast1").show();
      $("#snack1").hide();

      $("#lunch1").hide();
      $("#dinner1").hide();
      $("#search").hide();

    });
  });
</script>

<script>
  $(document).ready(function () {
    $("#btn2").click(function () {
      $("#lunch1").show();
      $("#breakfast1").hide();
      $("#snack1").hide();
      $("#dinner1").hide();
      $("#search").hide();
    });
  });
</script>

<script>
  $(document).ready(function () {
    $("#btn3").click(function () {
      $("#snack1").show();
      $("#breakfast1").hide();
      $("#lunch1").hide();
      $("#dinner1").hide();
      $("#search").hide();

    });
  });
</script>

<script>
  $(document).ready(function () {
    $("#btn4").click(function () {
      $("#dinner1").show();
      $("#snack1").hide();
      $("#breakfast1").hide();
      $("#lunch1").hide();
      $("#search").hide();

    });
  });
</script>
        
        <script>
        const btns = document.querySelectorAll('.btn1');
        btns.forEach((btn) => {
            btn.addEventListener('click', () => {
                // Remove active class from all buttons
                btns.forEach((btn) => {
                    btn.classList.remove('active');
                });
                // Add active class to clicked button
                btn.classList.add('active');
            });
        });
        const initialActiveButton = document.querySelector('.my-button.active');
        initialActiveButton.click();
        </script>

        <!-----------------------------Calender-------------------------------->
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
                html = `<div class="item">
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