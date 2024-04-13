<!doctype html>

<html lang="en">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Infits Home page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .nav-link {
      color: #AAA;
    }

    .color_shadow {
      box-shadow:
        0 0 0 5px rgba(128, 129, 249, 0.2),
        0 0 10px rgba(128, 129, 249, 0.12),
        0 0 20px rgba(128, 129, 249, 0.5);
      border-radius: 15px;
    }

    .nav-link {
      color: #8081F9;
    }

    .main-head {
      color: #4F1963;
      font-size: 3.5rem;
    }

    .main-class {
      margin-top: 5rem;
    }

    .hand-content {
      margin-top: 2rem;
    }

    .feat-theory {
      padding-top: 5.5rem;
    }

    /* ////////////////////////// */
    body {
      font-family: 'NATS', sans-serif !important;
      margin: 0;
    }

    .features {
      margin-left: 45px;
      margin-right: 40px;
    }

    .features>img {
      width: 195px;
      position: relative;

    }

    .feat {
      display: flex;
      flex-direction: column;
      margin-inline: 74px;
    }

    .featImg {
      margin-right: 132px;
    }

    .featImg>img {
      width: 230px;
    }

    .col {
      margin: 20px;
      margin-left: 75px;
    }

    .col>h5 {
      color: #C056E7;
    }

    li {
      font-size: 23px;
    }

    .item {
      display: flex;
    }

    .gettouch {
      margin-top: 65px;
      margin-left: 120px;
    }

    .gettouch>img {
      width: 250px;
    }

    .contactbox {
      display: flex;
      margin-inline: 5vw;
      height: fit-content;
      border-radius: 40px;
      margin-top: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .left {
      color: #C056E7;
    }

    .faqlogo {
      margin-top: 2vh;
      margin-left: 10vw;
    }

    .faqlogo>img {
      width: 220px;
    }

    .faqcontainer {
      padding-inline: 10vw;
    }

    .accordion-item {
      margin-top: 50px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      border-radius: 20px;

    }

    .x-accordion-group,
    .x-accordion {
      border-radius: 15px;
    }

    .faq-drop {
      border-radius: 4rem;
    }

    .faq-button {
      border-radius: 4rem;
    }

    .title-content {
      width: 20vw;
    }

    /* ////////////////////////// */
    @media (max-width: 768px) {
      .main-class {
        margin-top: 1rem;
      }

      .feat-theory {
        padding-top: 1rem;
      }

      .title-content {
        width: 34vw;
      }
    }

    @media (max-width: 451px) {
      .main-class {
        margin-top: 1rem;
        padding-left: 5vw;
      }

      .download-btn {
        padding-left: 3vw;
      }

      .main-img {
        padding-left: 0px;
        margin-right: 2vw;
      }

      .hand-content {
        margin-top: 0.1rem;
        margin-left: 3vw;
      }

      .about-content {
        margin-left: 3vw;
      }

      .feat-theory {
        padding-top: 1rem;
      }

      .title-content {
        width: 50vw;
      }
    }
  </style>

</head>

<body>

  <nav class="navbar navbar-expand-md navbar-light bg-light bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="./assets/dashboard/infits-logo.png" style="height :3.5rem" alt="Infits Logo">
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" style="margin: 0rem 0.7rem;" href="#about-section">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="margin: 0rem 0.7rem;" href="#feat-section">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="margin: 0rem 0.7rem;" href="#contact-section">Get in touch</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn color_shadow" style="margin: 0rem 0.7rem; margin-right: 1.5rem;" href="./login_form.php">SignIn/SignUp</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Offcanvas Navbar for smaller screens (collapsed by default) -->
  <nav class="navbar bg-body-tertiary fixed-top d-md-none">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="./assets/dashboard/infits-logo.png" style="width:35vw" alt="Infits Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" style="border: 3px solid #a048f7; border-radius: 15px;">
        <!-- <span class="navbar-toggler-icon"></span> -->
        <img src="./assets/dashboard/menu.png" style="width:2rem" alt="Infits Logo">
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: fit-content">
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <ul class="navbar-nav ms-auto px-2 ps-4">
              <li class="nav-item">
                <a class="nav-link" href="#about-section">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#feat-section">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact-section">Get in touch</a>
              </li>
              <li class="nav-item mt-3">
                <a class="nav-link btn color_shadow" style="padding: 3px 15px;" href="./login_form.php">SignIn/SignUp</a>
              </li>
            </ul>
        </div>
      </div>
    </div>
  </nav>

  <script>
    // Smooth scroll to anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
  </script>

  <div class="container" style="width: 93vw ">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 main-class">
        <h2 class="main-head">Client Management Made Easy for Nutritionists and Dietitians</h2>
        <h5 style="margin-top: 3rem">An advance health tech startup to track your client’s fitness and health goals.</h5>
        <div class="row download-btn" style="margin-top: 3rem">
          <div class="col-lg-6 col-md-5 col-sm-6">
            <img src="./assets/dashboard/button-appstore.png" alt="Image" style="width: 9rem;">
          </div>
          <div class="col-lg-6 col-md-5 col-sm-6">
            <img src="./assets/dashboard/button-google-playstore.png" alt="Image" style="width: 9rem;">
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 main-img">
        <img src="./assets/dashboard/dashboard_img.png" alt="Image" style="width: 110%">
      </div>
    </div>
  </div>

  <div style="width: 100%; display: flex; align-item: center; justify-content: center;">
    <h2 style="color: #4F1963; font-size: 2.8rem;">Handcrafted for</h2>
  </div>
  <div class="row hand-content" style="width: 99.7vw;">
    <div class="col-lg-3 col-md-3 col-sm-6 d-flex justify-content-center">
      <img src="./assets/dashboard/handcrafted_1.png" alt="Image" style="width: 9rem;">
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 d-flex justify-content-center">
      <img src="./assets/dashboard/handcrafted_2.png" alt="Image" style="width: 9rem;">
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 d-flex justify-content-center">
      <img src="./assets/dashboard/handcrafted_3.png" alt="Image" style="width: 9rem;">
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 d-flex justify-content-center">
      <img src="./assets/dashboard/handcrafted_3.png" alt="Image" style="width: 9rem;">
    </div>
  </div>

  <div style="width: 100%; display: flex; align-item: center; justify-content: center;">
    <!-- <h2 id="about-section" style="color: #4F1963; font-size: 2.8rem;">About</h2> -->
    <img id="about-section " class="title-content" src="./assets/dashboard/About-title.png" alt="">
  </div>
  <div class="row about-content" style="width: 95vw;">
    <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center">
      <img src="./assets/dashboard/About_img.png" alt="Image" style="width: 90%; margin-top: auto; margin-bottom: auto;">
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center" style="flex-direction: column; padding-left: 5vw;">
      <h3 style="font-size: 1.6rem; color: #C056E7;">It is crucial for nutritionists and dietitians to track their clients’ nutritional journeys, and INFITS aims to ease this monumental task for you.</h3>
      <ul>
        <li style="font-size: 1.5rem; color: #C056E7;">India's first health and wellness app for nutritionists.</li>
        <li style="font-size: 1.5rem; color: #C056E7;">Track and monitor your client's daily progress to generate charts, reports, and statistics.</li>
        <li style="font-size: 1.5rem; color: #C056E7;">Make online appointment bookings, stream live videos, and communicate consistently with clients.</li>
      </ul>
      <h3 style="font-size: 1.6rem; color: #C056E7;">INFITS is determined to help you keep track of your client’s journey to stay healthy, happy, and fit.</h3>
    </div>
  </div>

  <div style="width: 100%; display: flex; align-item: center; justify-content: start; margin-left: 3vw; padding-top: 2rem;">
    <!-- <h2 id="feat-section" style="color: #4F1963; font-size: 2.8rem; margin-left: 1rem;">Features</h2> -->
    <img id="feat-section" class="title-content" src="./assets/dashboard/feat-title.png" alt="">
  </div>
  <h6 style="margin-left: 4vw; color: #C056E7; font-size: 1.6rem;">A smarter, simpler way to take charge of your health and benefits. With infits app you can:</h6>

  <div class="row" style="margin: 0px 1vw;">
    <div class="col-lg-8 col-md-7 col-sm-12 feat-theory">
      <ul>
        <h2 style="color: #4F1963; font-size: 1.7rem;">KEEP TRACK FOR EVERYTHING</h2>
      </ul>
      <h5 style="margin-left: 3vw; color: #C056E7; font-size: 1.6rem;">Track your client's health metrics, workout regimes, health conditions, and other relevant activities daily to provide informed instructions.</h5>
    </div>
    <div class="col-lg-4 col-md-5 col-sm-12">
      <img src="./assets/dashboard/feat1.png" alt="Image" style="width: 80%;">
    </div>
  </div>
  <div class="row" style="margin: 0px 1vw;">
    <div class="col-lg-4 col-md-5 col-sm-12">
      <img src="./assets/dashboard/feat2.png" alt="Image" style="width: 80%;">
    </div>
    <div class="col-lg-8 col-md-7 col-sm-12 feat-theory">
      <ul>
        <h2 style="color: #4F1963; font-size: 1.7rem;">ALERTS & REMINDERS</h2>
      </ul>
      <h5 style="margin-left: 3vw; color: #C056E7; font-size: 1.6rem;">Create alerts and reminders to keep track of your client's progress towards a healthy lifestyle. </h5>
    </div>
  </div>

  <div class="row" style="margin: 0px 1vw;">
    <div class="col-lg-8 col-md-7 col-sm-12 feat-theory">
      <ul>
        <h2 style="color: #4F1963; font-size: 1.7rem;">ONLINE APPOINTMENTS</h2>
      </ul>
      <h5 style="margin-left: 3vw; color: #C056E7; font-size: 1.6rem;">It doesn't matter if your client is out of town or even out of the country, get your appointments online hassle-free.</h5>
    </div>
    <div class="col-lg-4 col-md-5 col-sm-12">
      <img src="./assets/dashboard/feat3.png" alt="Image" style="width: 80%;">
    </div>
  </div>
  <div class="row" style="margin: 0px 1vw;">
    <div class="col-lg-4 col-md-5 col-sm-12">
      <img src="./assets/dashboard/feat4.png" alt="Image" style="width: 80%;">
    </div>
    <div class="col-lg-8 col-md-7 col-sm-12 feat-theory">
      <ul>
        <h2 style="color: #4F1963; font-size: 1.7rem;">GO LIVE</h2>
      </ul>
      <h5 style="margin-left: 3vw; color: #C056E7; font-size: 1.6rem;">Seamless communication with clients via in-app messaging and live video streaming services, no matter where you are.</h5>
    </div>
  </div>

  <div class="row" style="margin: 0px 1vw;">
    <div class="col-lg-8 col-md-7 col-sm-12 feat-theory">
      <ul>
        <h2 style="color: #4F1963; font-size: 1.7rem;">HEALTH RECORD MANAGEMENT</h2>
      </ul>
      <h5 style="margin-left: 3vw; color: #C056E7; font-size: 1.6rem;">Receive each and every client's health reports and files systematically in preset formats for effortless management.</h5>
    </div>
    <div class="col-lg-4 col-md-5 col-sm-12">
      <img src="./assets/dashboard/feat5.png" alt="Image" style="width: 80%;">
    </div>
  </div>
  <div class="row" style="margin: 0px 1vw;">
    <div class="col-lg-4 col-md-5 col-sm-12">
      <img src="./assets/dashboard/feat6.png" alt="Image" style="width: 80%;">
    </div>
    <div class="col-lg-8 col-md-7 col-sm-12 feat-theory">
      <ul>
        <h2 style="color: #4F1963; font-size: 1.7rem;">CONTROL THEIR DIETS</h2>
      </ul>
      <h5 style="margin-left: 3vw; color: #C056E7; font-size: 1.6rem;">Track your client's meals to generate diet charts, routines, and recipes that fit their lifestyle.</h5>
    </div>
  </div>
  <!--////////////////////-->

  <div class="contact" id="contact-section">
    <div class="gettouch">
      <img src="./assets/dashboard/gettouch.png" alt="">
    </div>

    <div class="contactbox row">
      <div class="col-lg-2 col-md-1 col-sm-0"></div>
      <div class="left col-lg-4 col-md-5 col-sm-12 mt-4 mb-4">
        <h2 class="ms-3">Contact Us</h2>
        <img class="mt-3 me-4" src="./assets/dashboard/guy_chat.jpg" alt="" style="width: 90%;">
      </div>

      <div class="right col-lg-6 col-md-6 col-sm-12 ps-4 pe-4">
        <form id="myForm">
          <div class="form-group mt-5 mb-3">
            <input type="text" name="username" class="form-control" id="inlineFormInputGroup" placeholder="Username">
          </div>
          <div class="form-group my-3">
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            <small id="emailHelp" class="form-text text-muted mt-1">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group my-3">
            <input type="text" name="message" class="form-control" id="exampleInputMessage" placeholder="Message">
          </div>

          <button type="submit" class="btn mt-4 mb-5" style="width:100%; background-color:#C056E7">Submit</button>
        </form>
        <div id="result"></div>
      </div>
      <script>
        function setResult(message) {
          document.getElementById("result").innerText = message;
        }
        const onSubmit = async (event) => {
          event.preventDefault();
          setResult("Sending....");
          const formData = new FormData(event.target);

          formData.append("access_key", "ad2c413d-73a5-41d2-8b4a-f9aab4e853c3");

          try {
            const res = await fetch("https://api.web3forms.com/submit", {
              method: "POST",
              body: formData
            }).then((res) => res.json());

            if (res.success) {
              console.log("Success", res);
              setResult(res.message);
            } else {
              console.log("Error", res);
              setResult(res.message);
            }
          } catch (error) {
            console.error("Error:", error);
            setResult("Error: Failed to submit form.");
          }
        };

        const form = document.getElementById("myForm");
        const resultDiv = document.getElementById("result");

        form.addEventListener("submit", onSubmit);
      </script>


    </div>
  </div>

  <div id="faq-section" class="faq mt-4">
    <div class="faqlogo">
      <img src="./assets/dashboard/faq.png" alt="">
    </div>

    <div class="faqcontainer">

      <div class="accordion" id="accordionExample">
        <div class="accordion-item mt-1">
          <h2 class="accordion-header faq-drop">
            <button class="accordion-button faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              1. For whom the INFITS Wellness app is for?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show faq-drop" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              The Infits Wellness app is tailored for wellness practitioners and consultants. It is created to help nutritionists and dietitians maintain track of their clients' daily progress and dietary decisions. With INFITS, you can keep track of your client's daily progress and customise their goals and plans. The general public can also use INFITS to monitor their health progress.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header faq-drop">
            <button class="accordion-button faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              2. What makes INFITS different from, say other Wellness apps?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse faq-drop" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              There are a lot of wellness apps out there; INFITS shows its uniqueness by tailoring its functions to meet the needs of wellness consultants and practitioners who wish to keep track of their clients' daily progress. It helps you connect to smart devices, create daily reports, save documents, set alerts and reminders for your clients, have online appointment booking, and live stream while your clients can track their steps, sleep, calories, diets, heart rate, and water intake. It's an app tailored for both nutritionists and their clients.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header faq-drop">
            <button class="accordion-button faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              3. What are the benefits of INFITS wellness app?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse faq-drop" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              There are various benefits to using the INFITS wellness app. Nutritionists, dietitians, and other fitness instructors can use it to track their clients' daily activities and reach target milestones more easily. It also acts as a platform for instructors to accept online appointments and make live video streaming. This will help them escape from the exhausting task of individual calling and messaging.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header faq-drop">
            <button class="accordion-button faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              4. What does INFITS exactly does?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse faq-drop" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              INFITS is a wellness app tailored to the needs of wellness instructors and their clients. It documents every activity of clients, including steps, meals/calories, weight, water, and exercise/workout, while monitoring their sleep and heart rate, providing end-to-end analysis of each client daily. INFITS will help you connect with a smart device for tracking, create alerts and reminders for your progress, accept online appointment booking, live stream videos, and share documents with your clients.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header faq-drop">
            <button class="accordion-button faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              5. Should I prescribe custom equipment when using INFITS?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse faq-drop" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              When using the INFITS wellness app, there is no need to prescribe custom equipment as long as your customers have smart devices to track their activities. INFITS can connect with all wellness devices and collect data through them to get precise readings of your clients. So as long as your clients have smart tracking devices, there is no need for custom prescriptions.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header faq-drop">
            <button class="accordion-button faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              6. Can I have consultations with international clients?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse faq-drop" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Boundaries and nationalities do not bind INFITS, you can have clients from all over the world as long as they have downloaded the app. It's an online platform where you can interact with clients worldwide. You can track their progress from your home through the app, and give them proper consultations and milestones no matter how far apart you are.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-4">
          <h2 class="accordion-header faq-drop">
            <button class="accordion-button faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              7. How precise is the INFITS wellness app?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse faq-drop" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              INFITS wellness app will be as precise as your client's smart device. INFITS collects data from your client's smart devices to compile all their activities to create reports and daily end-to-end analyses of each client. Any smart device can be connected to INFITS, and reports can be generated based on data shared through these connected smart devices.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
    /* CSS for the image container */
    .infits-container {
      width: 100%;
      text-align: center;
      background-color: white;
      margin-top: 20px;
      padding: 20px;

      height: 100%;
    }

    /* Styling for the INFITS title */
    .infits-title {
      font-size: 35px;
      font-weight: bold;
      background: linear-gradient(to right, #0074D9, #9B59B6, #FF4136);
      -webkit-background-clip: text;
      color: transparent;
    }

    /* Styling for the slogan */
    .infits-slogan {
      font-size: 24px;
      color: black;
    }

    /* Styling for social media icons */
    .social-icons {
      margin-top: 20px;
    }

    .social-icons a {
      margin-right: 10px;
      color: #3b5998;
      /* Facebook blue */
    }

    /* Copyright text */
    .copyright {
      font-size: 18px;
      color: black;
    }

    .app-container {
      text-align: center;
      padding: 20px;
      
    }

    /* Styling for the title */
    .app-title {
      font-size: 24px;
      font-weight: bold;
      color: black;
    }

    /* Styling for the buttons */
    .app-button {
      display: inline-block;
      margin: 10px;
      padding: 10px 20px;

      border-radius: 20px;
      font-size: 16px;
      text-decoration: none;
      color: black;
    }

    /* Hover effect for buttons */
    .app-button:hover {

      color: white;
    }

    /* Styling for the links */
    .app-links {
      font-size: 20px;
      color: #333;
    }
    .section{
      margin-top: 20px;
    }
  </style>
  <hr>
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6">
      <div class="infits-container">
        <div class="infits-title">INFITS</div>
        <div class="infits-slogan">Fitter. Healthier. Happier.</div>
        <div class="social-icons">
          <a href="https://www.instagram.com/teaminfits/"><img src="./assets/images/Instagram.svg"></img></a>
          <a href="#"><img src="./assets/images/Twitter.svg"></img></a>
          <a href="https://www.linkedin.com/company/team-infits/"><img src="./assets/images/Linkedin.svg"></img></a>
        </div>
        <div class="copyright">Copyright 2022 Infits. All rights reserved.</div>
      </div>

    </div>
    <div class=" section col-lg-4 col-md-4 col-sm-6" style="display: flex; flex-direction: column; justify-content: center; align-items: center; padding-left: 5vw;">
      <h4 style="color: #4F1963; font-weight: bold;">Company</h4>
      <a href="#about-section" style="text-decoration: none; color: #8E8E8E;">
        <h4>About</h4>
      </a>
      <a href="#feat-section" style="text-decoration: none; color: #8E8E8E;">
        <h4>Features</h4>
      </a>
      <a href="#contact-section" style="text-decoration: none; color: #8E8E8E;">
        <h4>Get in touch</h4>
      </a>
      <a href="#faq-section" style="text-decoration: none; color: #8E8E8E;">
        <h4>FAQs</h4>
      </a>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12" style="display: flex; flex-direction: column; justify-content: center; align-item: center;">
      <div class="app-container">
        <div class="app-title">Get the app</div>
        <a href="#" class="app-button">
          <img src="./assets/dashboard/button-appstore.png" alt="App Store" width="150" height="60">

        </a>
        <a href="#" class="app-button">
          <img src="./assets/dashboard/button-google-playstore.png" alt="Google Play" width="150" height="60">

        </a>
        <div class="app-links">
          <a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
