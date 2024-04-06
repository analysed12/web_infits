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
    .nav-link{
        color: #8081F9; 
    }
    .main-head{
        color: #4F1963; 
        font-size: 3.5rem;
    }
    .main-class{
        margin-top: 5rem;
    }
    .hand-content{
        margin-top: 2rem;
    }
    .feat-theory{
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

      .features>img{
        width: 195px;
        position: relative;
    
      }
      .feat{
        display: flex;
        flex-direction: column;
        margin-inline: 74px;
      }
      .featImg{
        margin-right: 132px;
      }
      .featImg>img{
        width: 230px;
      }
      .col{
        margin: 20px;
        margin-left: 75px;
      }
      .col>h5{
        color: #C056E7;
      }
      li{
        font-size: 23px;
      }
      .item{
        display: flex;
      }
      
      .gettouch{
        margin-top: 65px;
        margin-left: 120px;
      }
      .gettouch>img{
        width: 250px;
      }
      .contactbox{
        display: flex;
        margin-inline: 5vw;
        height: fit-content;
        border-radius: 40px;
        margin-top: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }
      .left{
       color: #C056E7;
      }

      .faqlogo{
        margin-top: 2vh;
        margin-left: 10vw;
      }
      .faqlogo>img{
        width: 220px;
      }
      .faqcontainer{
        padding-inline: 10vw;
      }
      .accordion-item{
        margin-top: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 20px;
        
      }
      .x-accordion-group,.x-accordion {
        border-radius: 15px; 
      }
    /* ////////////////////////// */
    @media (max-width: 768px) {
        .main-class{
            margin-top: 1rem;
        }
        .feat-theory{
            padding-top: 1rem;
        }
    }
    @media (max-width: 451px) {
        .main-class{
            margin-top: 1rem;
            padding-left: 5vw;
        }
        .download-btn{
            padding-left: 3vw;
        }
        .main-img{
            padding-left: 0px;
            margin-right: 2vw;
        }
        .hand-content{
            margin-top: 0.1rem;
            margin-left: 3vw;
        }
        .about-content{
            margin-left: 3vw;
        }
        .feat-theory{
            padding-top: 1rem;
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
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation"
       style="border: 3px solid #a048f7; border-radius: 15px;" >
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
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    </script>

    <div class="container" style="width: 93vw ">
    <div class="row" >
        <div class="col-lg-6 col-md-6 col-sm-12 main-class">
        <h2 class="main-head" >Client Management Made Easy for Nutritionists and Dietitians</h2>
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

    <div style="width: 100%; display: flex; align-item: center; justify-content: center;" >
        <h2 style="color: #4F1963; font-size: 2.6rem;">Handcrafted for</h2>
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

    <div style="width: 100%; display: flex; align-item: center; justify-content: center;" >
        <h2 id="about-section" style="color: #4F1963; font-size: 2.6rem;">About</h2>
    </div>
    <div class="row about-content" style="width: 95vw;">
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center">
            <img src="./assets/dashboard/About_img.png" alt="Image" style="width: 80%;">
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

    <div style="width: 100%; display: flex; align-item: center; justify-content: start; margin-left: 3vw;" >
        <h2 id="feat-section" style="color: #4F1963; font-size: 2.6rem;">Features</h2>
    </div>
    <h6 style="margin-left: 4vw; color: #C056E7; font-size: 1.6rem;">A smarter, simpler way to take charge of your health and benefits. With infits app you can:</h6>

    <div class="row" style="margin: 0px 2vw;">
        <div class="col-lg-8 col-md-7 col-sm-12 feat-theory">
            <ul><h2 style="color: #4F1963; font-size: 1.9rem;">KEEP TRACK FOR EVERYTHING</h2></ul>
            <h5 style="margin-left: 3vw; color: #C056E7; font-size: 1.6rem;">Track your client's health metrics, workout regimes, health conditions, and other relevant activities daily to provide informed instructions.</h5>
        </div>
        <div class="col-lg-4 col-md-5 col-sm-12">
            <img src="./assets/dashboard/feat1.png" alt="Image" style="width: 80%;">
        </div>
    </div>
    <div class="row" style="margin: 0px 2vw;">
        <div class="col-lg-4 col-md-5 col-sm-12">
            <img src="./assets/dashboard/feat2.png" alt="Image" style="width: 80%;">
        </div>
        <div class="col-lg-8 col-md-7 col-sm-12 feat-theory">
            <ul><h2 style="color: #4F1963; font-size: 1.9rem;">ALERTS & REMINDERS</h2></ul>
            <h5 style="margin-left: 3vw; color: #C056E7; font-size: 1.6rem;">Create alerts and reminders to keep track of your client's progress towards a healthy lifestyle. </h5>
        </div>
    </div>

    <div class="row" style="margin: 0px 2vw;">
        <div class="col-lg-8 col-md-7 col-sm-12 feat-theory">
            <ul><h2 style="color: #4F1963; font-size: 1.9rem;">ONLINE APPOINTMENTS</h2></ul>
            <h5 style="margin-left: 3vw; color: #C056E7; font-size: 1.6rem;">It doesn't matter if your client is out of town or even out of the country, get your appointments online hassle-free.</h5>
        </div>
        <div class="col-lg-4 col-md-5 col-sm-12">
            <img src="./assets/dashboard/feat3.png" alt="Image" style="width: 80%;">
        </div>
    </div>
    <div class="row" style="margin: 0px 2vw;">
        <div class="col-lg-4 col-md-5 col-sm-12">
            <img src="./assets/dashboard/feat4.png" alt="Image" style="width: 80%;">
        </div>
        <div class="col-lg-8 col-md-7 col-sm-12 feat-theory">
            <ul><h2 style="color: #4F1963; font-size: 1.9rem;">GO LIVE</h2></ul>
            <h5 style="margin-left: 3vw; color: #C056E7; font-size: 1.6rem;">Seamless communication with clients via in-app messaging and live video streaming services, no matter where you are.</h5>
        </div>
    </div>

    <div class="row" style="margin: 0px 2vw;">
        <div class="col-lg-8 col-md-7 col-sm-12 feat-theory">
            <ul><h2 style="color: #4F1963; font-size: 1.9rem;">HEALTH RECORD MANAGEMENT</h2></ul>
            <h5 style="margin-left: 3vw; color: #C056E7; font-size: 1.6rem;">Receive each and every client's health reports and files systematically in preset formats for effortless management.</h5>
        </div>
        <div class="col-lg-4 col-md-5 col-sm-12">
            <img src="./assets/dashboard/feat5.png" alt="Image" style="width: 80%;">
        </div>
    </div>
    <div class="row" style="margin: 0px 2vw;">
        <div class="col-lg-4 col-md-5 col-sm-12">
            <img src="./assets/dashboard/feat6.png" alt="Image" style="width: 80%;">
        </div>
        <div class="col-lg-8 col-md-7 col-sm-12 feat-theory">
            <ul><h2 style="color: #4F1963; font-size: 1.9rem;">CONTROL THEIR DIETS</h2></ul>
            <h5 style="margin-left: 3vw; color: #C056E7; font-size: 1.6rem;">Track your client's meals to generate diet charts, routines, and recipes that fit their lifestyle.</h5>
        </div>
    </div>
    <!--////////////////////-->

    <div class="contact" id="contact-section">
        <div class="gettouch">
            <img src="./assets/dashboard/gettouch.png" alt="">
        </div>

        <div class="contactbox row">
            <div class="left col-lg-5 col-md-5 col-sm-12 mt-4">
                <h2 class="ms-3">Contact Us</h2>
                <img class="mt-3 me-4" src="./assets/dashboard/guy_chat.jpg" alt="">
            </div>

            <div class="right col-lg-6 col-md-6 col-sm-12 ps-4">
                <form>
                    <div class="form-group mt-5 mb-3">
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                    </div>
                    <div class="form-group my-3">
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                      <small id="emailHelp" class="form-text text-muted mt-1">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group my-3">
                      <input type="text" class="form-control" id="exampleInputMessage" placeholder="Message">
                    </div>

                    <button type="submit" class="btn mt-4 mb-5" style="width:100%; background-color:#C056E7">Submit</button>
                  </form>
            </div>
        </div>
    </div>

    <div class="faq">
        <div class="faqlogo">
            <img src="./assets/dashboard/faq.png" alt="">
        </div>

        <div class="faqcontainer">
            
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        1. For whom the INFITS Wellness app is for?
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        2. What makes INFITS different from, say other Wellness apps?
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        3. What are the benefits of INFITS wellness app?
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        4. What does INFITS exactly does?
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        5. Should I prescribe custom equipment when using INFITS?
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        6. Can I have consultations with international clients?
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        7. How precise is the INFITS wellness app?
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                      </div>
                    </div>
                  </div>
              </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <img src="./assets/dashboard/foot1.png" alt="Image" style="width: 80%;">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6" style="display: flex; flex-direction: column; justify-content: center; align-item: center; padding-left: 5vw;">
            <h4 style="color: #4F1963; font-wight: bold;">Company</h4>
            <h4 style="color: #8E8E8E">About</h4>
            <h4 style="color: #8E8E8E">Features</h4>
            <h4 style="color: #8E8E8E">Get in touch</h4>
            <h4 style="color: #8E8E8E">FAQs</h4>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12" style="display: flex; flex-direction: column; justify-content: center; align-item: center;">
            <img src="./assets/dashboard/foot2.png" alt="Image" style="width: 80%;">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>