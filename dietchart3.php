
<?php include('navbar.php');
require('constant/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="dietchart3_style.css" />
    <title>Infits</title>
    <?php require('constant/head.php');?>


  
  </head>
  <style>

body {
  font-family: "NATS", sans-serif !important;
}

.main__container {
  overflow: hidden;
}
.heading__div {

  margin-top: 2rem;
  margin-left:1rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0px 20.3px;
}

.newDietChart__heading__div {
  display: flex;
  justify-content: center;
  align-items: center;
}
.New_Diet_Chart {
  font-size: 44px;
  font-style: Regular;
}
.edit__icon {
  margin-left: 25px;
  cursor: pointer;
}
.Ronald_Richards {
  margin-top: -10px;
  font-size: 33px;
  font-style: Regular;
  color: #cbcbcb;
}
.heading__rightDiv {
  display: flex;
  justify-content: center;
  align-items: center;
}
.heathyDiet__btn {
  background: #9c74f5;
  border-radius: 10px;
  color: #ffffff;
  padding: 7px 20px;
  border: none;
  font-family: "NATS";
  font-style: normal;
  font-weight: 400;
  font-size: 30px;
}
.heading__rightDiv_icon {
  margin-left: 14px;
  cursor: pointer;
}

/* weeks_div */

.weeks_div {
  display: flex;
  justify-content: space-evenly;
  width: 70%;
  margin: 0 auto;
  overflow-y: hidden;
}
.week__name {
  margin-top: 5px;
  font-style: Regular;
  font-size: 26.42px;
  padding: 0 9px;
  border-radius: 12px;
  transition: 0.2s ease-in-out;
  cursor: pointer;
}
.week__name:hover {
  color: #fff;
  background: linear-gradient(
    180deg,
    #9c74f5 0%,
    rgba(104, 125, 238, 0.52) 100%
  );
}

/* options__div */
.options__div {
  width: 80%;
  margin: 20px auto;
  overflow-y: hidden;
  display: flex;
  justify-content: space-evenly;
  align-items: center;
}
.options__btn {
  font-family: "Poppins";
  font-style: normal;
  font-weight: 500;
  font-size: 19.3714px;
  background: #fff;
  border: 0.880519px solid #9c74f5;
  border-radius: 10px;
  padding: 10px 35px;
  color: #9c74f5;
}

.options__btn:focus {
  background-color: #9c74f5;
  color: #fff;
}
.options__btn:active {
  background-color: #9c74f5;
  color: #fff;
}
.options__btn:hover {
  background-color: #9c74f5;
  color: #fff;
}

/* foodCard__div */
.foodCard__div {
  padding: 30px 25px;
  width: 80%;
  margin: 20px auto;
  overflow-y: hidden;
  background: #ffffff;
  box-shadow: 0px 7.04415px 21.1324px rgba(176, 190, 197, 0.32),
    0px 2.64156px 4.40259px rgba(176, 190, 197, 0.32);
  border-radius: 15px;
}
.foodCart__topDiv {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.topDiv__heading {
  font-family: "Poppins";
  font-style: normal;
  font-weight: 500;
  font-size: 26.4156px;
}
.calDiv {
  display: flex;
  justify-content: start;
  align-items: start;
}
.cal__icon {
  padding-right: 7px;
}
.cal__h3 {
  font-family: "Poppins";
  font-style: normal;
  font-size: 20px;
  font-weight: 400;
  color: #a6a1a1;
}
.foodCards__wrapper {
  display: flex;
  overflow-x: auto;
  overflow-y: hidden;
}
.foodCard {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin: 0px 7px;
}
.foodCard img {
  border-radius: 10px;
  border: 1px solid rgba(156, 116, 245, 1);
}

.foodName {
  font-family: "NATS";
  font-style: normal;
  font-weight: 400;
  font-size: 25px;
  margin-top: 5px;
}

/* addANote__wrapper */

.addANote__wrapper {
  width: 80%;
  margin: 15px auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.leftDiv__wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  background: #ffffff;
  padding: 8px 15px;
  box-shadow: 0px 7.04415px 21.1324px rgba(176, 190, 197, 0.32),
    0px 2.64156px 4.40259px rgba(176, 190, 197, 0.32);
  border-radius: 8.80519px;
  cursor: pointer;
}
.leftDiv__wrapper button {
  border: none;
  background: transparent;
  font-family: "NATS";
  font-style: normal;
  font-weight: 400;
  font-size: 25px;
}
.right__btn {
  background: #9c74f5;
  border-radius: 10px;
  font-family: "NATS";
  font-style: normal;
  font-weight: 400;
  font-size: 30px;
  color: #f8f8f8;
  padding: 5px 25px;
  border: none;
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (max-width: 600px) {
  .heading__div {
    padding: 0px 10.3px;
  }
  .New_Diet_Chart {
    font-size: 35px;
    font-style: Regular;
  }
  .edit__icon {
    margin-left: 10px;
    cursor: pointer;
  }
  .Ronald_Richards {
    margin-top: -10px;
    font-size: 23px;
    font-style: Regular;
    color: #cbcbcb;
  }

  .heathyDiet__btn {
    font-size: 22px;
    padding: 7px 7px;
  }
  .heading__rightDiv_icon {
    margin-left: 7px;
    cursor: pointer;
  }

  .weeks_div {
    width: 95%;
  }
  .options__div {
    width: 96%;
  }
  .options__btn {
    padding: 5px 10px;
  }
  .foodCard__div {
    padding: 25px 20px;
    width: 97%;
  }

  .addANote__wrapper {
    width: 97%;
  }
}
/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (max-width: 720px) {
  .weeks_div {
    width: 95%;
  }
  .options__div {
    width: 96%;
  }
  .options__btn {
    padding: 5px 10px;
  }
  .foodCard__div {
    padding: 25px 20px;
    width: 97%;
  }

  .addANote__wrapper {
    width: 97%;
  }
}

  </style>
  <body>


  <?php



function fetchData($client_id)
{
  $sql = "SELECT monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM diet_chart where client_id=$client_id;";
  global $conn;
  $result = $conn->query($sql);
  return ($result);
}

function fetchInformation($result, $day)
{
  if ($result->num_rows > 0) {
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
    if (mysqli_num_rows($resultd) > 0) {
      while ($row = mysqli_fetch_assoc($resultd)) {
        ?>
        <div class="d-flex justify-content-center flex-column justify-content-center text-center me-4">
        <img src="assets/images/Alooparantha1.svg">
          
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


    <div class="main__container">
      <?php $client_id = 2 ?>
      <!-- heading starts here... -->
      <div class="heading__div">
        <div class="heading__leftDiv">
          <div class="newDietChart__heading__div">
          
            <h1 class='New_Diet_Chart' contenteditable="true" style="font-size:40px">New Diet Chart</h1>
            <img src="<?=$DEFAULT_PATH?>assets/images/Edit.svg" style="margin-left:10px">
          </div>
          <h2 class='Ronald_Richards'style="font-size:33px">Ronald Richards</h2>
        </div>
        <div class="heading__rightDiv">
          <button class="heathyDiet__btn">Heathy Diet</button>
          <img src="<?=$DEFAULT_PATH?>assets/images/error.svg" style="margin-left:10px">
        </div>
      </div>
       <!-- ....heading starts end -->

<!-- weeks div start.... -->
    <div class='weeks_div'>
      <span class='week__name'>Mon</span>
      <span class='week__name'>Tus</span>
      <span class='week__name'>Wed</span>
      <span class='week__name'>Thu</span>
      <span class='week__name'>Fri</span>
      <span class='week__name'>Sat</span>
      <span class='week__name'>Sun</span>
    </div>
 <!-- ....weeks div end -->

  <!-- options start... -->
    <?php $info = update($client_id, "monday"); ?>    
    <div class="options__div " id='nav-tab' role='tablist'>
      <!-- Breakfast -->
      <button class='options__btn nav-link active' id="nav-breakfast-tab" data-bs-toggle="tab" data-bs-target="#nav-breakfast" type="button" role="tab" aria-controls="nav-breakfast" aria-selected="true"  >Breakfast</button>
      <!-- lunch -->
      <button class='options__btn nav-link ' id="nav-lunch-tab" data-bs-toggle="tab" data-bs-target="#nav-lunch" type="button" role="tab" aria-controls="nav-lunch" aria-selected="false"  data-toggle='tab'>Lunch</button>
      <!-- snack -->
      <button class='options__btn nav-link ' id="nav-snack-tab" data-bs-toggle="tab" data-bs-target="#nav-snack" type="button" role="tab" aria-controls="nav-snack" aria-selected="false"  data-toggle='tab'>Snack</button>
      <!-- dinner -->
      <button class='options__btn nav-link ' id="nav-dinner-tab" data-bs-toggle="tab" data-bs-target="#nav-dinner" type="button" role="tab" aria-controls="nav-dinner" aria-selected="false"  data-toggle='tab'>Dinner</button>
    </div>
  <!-- ...options end -->

    <!-- note divs/tabs start... -->   
        <div class="tab-content" id="nav-tabContent">

              <!-- breakfast -->

              <div class=" tab-pane fade show active" id="nav-breakfast" role="tabpanel" aria-labelledby="nav-breakfast-tab" tabindex="0" >
                <div class="foodCard__div">
                  <div class="foodCart__topDiv">
                    <h1 class='topDiv__heading'>In Morning</h1>
                    <div class="calDiv">
                    <img src="<?=$DEFAULT_PATH?>assets/images/calorie.svg
                      " alt="foodImg">
                    <h3 class='cal__h3'>200 Kcal </h3>
                    </div>
                  </div>
                  <div class='foodCards__wrapper tab-pane fabe'>        
                    <?php compute($info, "breakfast", "breakfast_morning") ?>
                    <!-- add more div or u can say button -->
                    <div onclick="redirectTo('<?php echo $client_id ?>','monday','breakfast','breakfast_morning') ">
                      <img src="<?=$DEFAULT_PATH?>assets/images/dietchart3Add.svg
                      " alt="foodImg">
                  
                    </div>
                  </div>
                </div>
                <!--  -->
                <div class="foodCard__div">
                  <div class="foodCart__topDiv">
                    <h1 class='topDiv__heading'>After break</h1>
                    <div class="calDiv">
                    <img src="<?=$DEFAULT_PATH?>assets/images/calorie.svg
                      " alt="foodImg">
                    <h3 class='cal__h3'>200 Kcal </h3>
                    </div>
                  </div>
                  <?php $type = "breaka" ?>
                  <div class='foodCards__wrapper'>        
                    <?php compute($info, "breakfast", "breakfast_after") ?>
                    <!-- add more div or u can say button -->
                    <div onclick="redirectTo('<?php echo $client_id ?>','monday','breakfast','breakfast_after')">
                      <img src="<?=$DEFAULT_PATH?>assets/images/dietchart3Add.svg
                      " alt="foodImg">        
                    </div>
                  </div>
                </div>
              </div>

              <!-- lunch -->

            <div class=" tab-pane fade" id="nav-lunch" role="tabpanel" aria-labelledby="nav-lunch-tab" tabindex="0">
              <!-- loop this div to get another food box wrapper -->
              <div class="foodCard__div">
                  <div class="foodCart__topDiv">
                    <h1 class='topDiv__heading'>Afternoon</h1>
                    <div class="calDiv">
                    <img src="<?=$DEFAULT_PATH?>assets/images/calorie.svg
                      " alt="foodImg">
                    <h3 class='cal__h3'>200 Kcal </h3>
                    </div>
                  </div>
                  <?php $type = "lunch" ?>
                  <div class='foodCards__wrapper'>
                    <?php compute($info, "lunch", "afternoon") ?>

                    <!-- add more button -->
                    <div  onclick="redirectTo('<?php echo $client_id ?>','monday','lunch','afternoon')">
                      <img src="<?=$DEFAULT_PATH?>assets/images/dietchart3Add.svg
                      " alt="foodImg">        
                    </div>
                  </div>
              </div>
            </div>

            <!-- snack -->
            <div class=" tab-pane fade" id="nav-snack" role="tabpanel" aria-labelledby="nav-snack-tab" tabindex="0">
              <div class="foodCard__div">
                  <div class="foodCart__topDiv">
                    <h1 class='topDiv__heading'>High Tea and snack</h1>
                    <div class="calDiv">
                    <img src="<?=$DEFAULT_PATH?>assets/images/calorie.svg
                      " alt="foodImg">
                    <h3 class='cal__h3'>200 Kcal </h3>
                    </div>
                  </div>
                  <?php $type = "snacks" ?>
                  <div class='foodCards__wrapper'>
                    <?php compute($info, "snacks", "High Tea and Snacks") ?>

                    <!-- add more button -->
                    <div onclick="redirectTo('<?php echo $client_id ?>','monday','snacks','High Tea and Snacks')">
                      <img src="<?=$DEFAULT_PATH?>assets/images/dietchart3Add.svg
                      " alt="foodImg">        
                    </div>
                  </div>
              </div>
            </div>

            <!-- dinner -->

            <div class=" tab-pane fade" id="nav-dinner" role="tabpanel" aria-labelledby="nav-dinner-tab" tabindex="0">
              <div class="foodCard__div">        
                  <div class="foodCart__topDiv">
                    <h1 class='topDiv__heading'>Night</h1>
                    <div class="calDiv">
                    <img src="<?=$DEFAULT_PATH?>assets/images/calorie.svg
                      " alt="foodImg">
                    <h3 class='cal__h3'>200 Kcal </h3>
                    </div>
                  </div>
                  <?php $type = "dinner" ?>
                  <div class='foodCards__wrapper'>
                      <?php compute($info, "dinner", "night") ?>
                    <!-- add more -->
                    <div onclick="redirectTo('<?php echo $client_id ?>','monday','dinner','night')">
                      <img src="<?=$DEFAULT_PATH?>assets/images/dietchart3Add.svg
                      " alt="foodImg">        
                    </div>
                  </div>
              </div>

              <!--  -->

              <div class="foodCard__div">        
                  <div class="foodCart__topDiv">
                    <h1 class='topDiv__heading'>Light Night Food</h1>
                    <div class="calDiv">
                    <img src="<?=$DEFAULT_PATH?>assets/images/calorie.svg
                      " alt="foodImg">
                    <h3 class='cal__h3'>200 Kcal </h3>
                    </div>
                  </div>
                  <?php $type = "breaka" ?>
                  <div class='foodCards__wrapper'>
                      <?php compute($info, "dinner", "late_night") ?>
                    <!-- add more -->
                    <div onclick="redirectTo('<?php echo $client_id ?>','monday','dinner','late_night')">
                      <img src="<?=$DEFAULT_PATH?>assets/images/dietchart3Add.svg
                      " alt="foodImg">        
                    </div>
                  </div>
              </div>
            </div>

        </div> 
    <!-- ...note divs/tabs end -->

    <!-- Add a note start... -->
      <div class="addANote__wrapper">
        <div class='leftDiv__wrapper'>
          <span>
            <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.5 0.5V20M19 10H0" stroke="black" stroke-width="2"/>
            </svg>
          </span>
        <button>Add a note</button>
        </div>
        <button class='right__btn'>Save Plan</button>
      </div>
    <!-- ...Add a note end -->

  </div>


<!-- scripts here... -->

      <script>
        function getQueryParams() {
          const urlSearchParams = new URLSearchParams(window.location.search);
          const params = Object.fromEntries(urlSearchParams.entries());
          return {
            day: params.day,
            course: params.course,
          };
        }

        function updateTo(day, course) {
          const queryParams = getQueryParams();
          if (queryParams.day !== day || queryParams.course !== course) {
            queryParams.day = day;
            queryParams.course = course;
            const queryString = new URLSearchParams(queryParams).toString();
            const url = `dietchart3new.php?${queryString}`;
            fetch('all_recipes_old.php')
              .then(response => response.text())
              .then(html => {
              window.history.pushState({ day, course }, null, url);
              })
              .catch(error => {
                console.error('Error:', error); 
              });
          }
        }

        function redirectTo(client_id, day, course, subcourse) {
          const form = document.createElement('form');
          form.method = 'POST';
          form.action = 'all_recipes_old.php';

          const idInput = document.createElement('input');
          idInput.type = 'hidden';
          idInput.name = 'id';
          idInput.value = client_id;

          const dayInput = document.createElement('input');
          dayInput.type = 'hidden';
          dayInput.name = 'day';
          dayInput.value = day;

          const courseInput = document.createElement('input');
          courseInput.type = 'hidden';
          courseInput.name = 'course';
          courseInput.value = course;

          const subcourseInput = document.createElement('input');
          subcourseInput.type = 'hidden';
          subcourseInput.name = 'subcourse';
          subcourseInput.value = subcourse;

          form.appendChild(idInput);
          form.appendChild(courseInput);
          form.appendChild(subcourseInput);
          form.appendChild(dayInput);

          document.body.appendChild(form);
          form.submit();

        }
        function getDayNumber(day) {
          switch (day) {
            case 'monday':
              return "brm";
            case 'tuesday':
              return "brt";
            case 'wednesday':
              return "brw";
            case 'thursday':
              return "brth";
            case 'friday':
              return "brf";
            case 'saturday':
              return "brsa";
            case 'sunday':
              return "brsu";
            default:
              return -1;
          }
        }
        function getDayNumber1(day) {
          switch (day) {
            case 'monday':
              return "tabm";
            case 'tuesday':
              return "tabt";
            case 'wednesday':
              return "tabw";
            case 'thursday':
              return "tabth";
            case 'friday':
              return "tabf";
            case 'saturday':
              return "tabsa";
            case 'sunday':
              return "tabsu";
            default:
              return -1; // return -1 for invalid input
          }
        }
        function getDayNumber2(day) {
          switch (day) {
            case 'monday':
              return 0;
            case 'tuesday':
              return 1;
            case 'wednesday':
              return 2;
            case 'thursday':
              return 3;
            case 'friday':
              return 4;
            case 'saturday':
              return 5;
            case 'sunday':
              return 6;
            default:
              return -1;
          }
        }
        function getDayNumber3(course) {
          switch (course.charAt(0)) {
            case 'b':
              return 0;
            case 'l':
              return 1;
            case 'd':
              return 2;
            case 's':
              return 3;
            default:
              return -1;
          }
        }
        const tab = document.querySelectorAll('.tab');
        tab.forEach(el => {
          el.addEventListener('click', function () {
            const id = el.getAttribute('tab');
            updateTo(id,getDayNumber(id));
            document.querySelectorAll('.tab-content').forEach(element => {
              element.style.display = 'none';
            });
            document.querySelectorAll('.BrC').forEach(element => {
              element.style.display = 'none';
            });
            document.querySelectorAll('.SnC').forEach(element => {
              element.style.display = 'none';
            });
            document.querySelectorAll('.LuC').forEach(element => {
              element.style.display = 'none';
            });
            document.querySelectorAll('.DiC').forEach(element => {
              element.style.display = 'none';
            });
            document.getElementById(id).style.display = 'flex';
            document.getElementById(id).style.flexDirection="column";
            document.getElementById(getDayNumber(id)).style.display = 'block';
          });
        });
        const queryParams = getQueryParams();
        console.log(getDayNumber2(queryParams.day));
        tab[getDayNumber2(queryParams.day)].click();
        
        const tabm=document.querySelectorAll('.tabm');
        tabm.forEach(el => {
          el.addEventListener('click', function () {
            const id = el.getAttribute('tab');
            console.log(id);
            updateTo('monday', id);
            document.querySelectorAll('.tabm-content').forEach(element => {
              element.style.display = 'none';
            });
            document.getElementById(id).style.display = 'flex';
            document.getElementById(id).style.flexDirection="column";
          });
        });

        const tabt = document.querySelectorAll('.tabt');
        tabt.forEach(el => {
          el.addEventListener('click', function () {
            const id = el.getAttribute('tab');
            updateTo('tuesday', id);
            document.querySelectorAll('.tabt-content').forEach(element => {
              element.style.display = 'none';
            });
            document.getElementById(id).style.display = 'flex';
            document.getElementById(id).style.flexDirection="column";
          });
        });

        const tabw = document.querySelectorAll('.tabw');
        tabw.forEach(el => {
          el.addEventListener('click', function () {
            const id = el.getAttribute('tab');
            updateTo('wednesday', id);
            document.querySelectorAll('.tabw-content').forEach(element => {
              element.style.display = 'none';
            });
            document.getElementById(id).style.display = 'flex';
            document.getElementById(id).style.flexDirection="column";
          });
        });

        const tabth = document.querySelectorAll('.tabth');
        tabth.forEach(el => {
          el.addEventListener('click', function () {
            const id = el.getAttribute('tab');
            updateTo('thursday', id);
            document.querySelectorAll('.tabth-content').forEach(element => {
              element.style.display = 'none';
            });
            document.getElementById(id).style.display = 'flex';
            document.getElementById(id).style.flexDirection="column";
          });
        });

        const tabf = document.querySelectorAll('.tabf');
        tabf.forEach(el => {
          el.addEventListener('click', function () {
            const id = el.getAttribute('tab');
            updateTo('friday', id);
            document.querySelectorAll('.tabf-content').forEach(element => {
              element.style.display = 'none';
            });
            document.getElementById(id).style.display = 'flex';
            document.getElementById(id).style.flexDirection="column";
          });
        });

        const tabsa = document.querySelectorAll('.tabsa');
        tabsa.forEach(el => {
          el.addEventListener('click', function () {
            const id = el.getAttribute('tab');
            updateTo('saturday', id);
            document.querySelectorAll('.tabsa-content').forEach(element => {
              element.style.display = 'none';
            });
            document.getElementById(id).style.display = 'flex';
            document.getElementById(id).style.flexDirection="column";
          });
        });

        const tabsu = document.querySelectorAll('.tabsu');
        tabsu.forEach(el => {
          el.addEventListener('click', function () {
            const id = el.getAttribute('tab');
            updateTo('sunday', id);
            document.querySelectorAll('.tabsu-content').forEach(element => {
              element.style.display = 'none';
            });
            document.getElementById(id).style.display = 'flex';
            document.getElementById(id).style.flexDirection="column";
          });
        });
        console.log(getDayNumber3(queryParams.course));
        document.querySelectorAll(getDayNumber1(queryParams.day))[getDayNumber3(queryParams.course)].click();
      </script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
      <?php require('constant/scripts.php');?>
    </body>
</html>
