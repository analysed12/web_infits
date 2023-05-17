<?php
include('navbar.php');
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Infits</title>
    <?php require('constant/head.php');?>
 
  </head>
  <style>
    body{
        font-family: 'NATS', sans-serif !important;
    }

    .right__side {
      display:flex;
      flex-direction: column;
      gap:2rem;
      position: relative;
      overflow-y: scroll;
      margin-left:15rem;
      margin-top:1rem;
    }
    .faqs {
     
      font-style: normal;
      font-weight: 600;
      font-size: 32px;
      letter-spacing: -0.114286px;
      color: #202224;
      padding-left: 35px;
      margin-top: 25px;
    }

    .input__div {
      padding-left: 15px;
      width: 95%;
      padding: 5px;
      margin: 10px auto;
      display: flex;
      gap:0.5rem;
      justify-content: center;
      align-items: center;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
      border-radius: 15px;
    }
    .input {
      flex: 1;
      
      font-style: normal;
      font-weight: 500;
      font-size: 25px;
      color: #b8d3f2;
      border: none;
      outline: none;
      padding-left: 5px;
      text-transform: capitalize;
    }

    .main__Div {
      display: flex;
      justify-content: space-evenly;
      flex-direction: row;
      padding: 20px 40px;
    }
    .small__faq {
      
      font-style: normal;
      font-weight: 700;
      font-size: 22px;
      color: #0177fd;
    }

    .main__title {
      
      font-style: normal;
      font-weight: 700;
      font-size: 40px;
      line-height: 60px;
      color: #0e0e2c;
      width: 78%;
    }
    .main__p {
      
      font-style: normal;
      font-weight: 400;
      font-size: 22px;
      line-height: 171.5%;
      color: rgba(14, 14, 44, 0.6);
      width: 80%;
      margin-top: 25px;
    }
    .main__right {
      display: flex;
      flex-direction: column;
    }

    .main__right__wrapper {
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
      border-radius: 15px;
      width: 80%;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      margin-bottom: 20px;
      justify-content: center;
      align-items: center;
      padding: 10px 5px;
      position: relative;
    }
    .main__right__plus {
      position: absolute;
      right: 25px;
      top: 8px;
    }
    .main__right__h1 {
     
      font-style: normal;
      font-weight: 500;
      font-size: 18px;
      color: #0e0e2c;
    }
    .main__right__p {
      
      font-style: normal;
      font-weight: 400;
      font-size: 16px;
      line-height: 171.5%;
      width: 70%;
      margin: 10px auto;
      color: rgba(14, 14, 44, 0.6);
    }

    @media only screen and (max-width: 600px) {

  .input__div {
    width: 90%;
  }
  .main__Div {
    flex-direction: column;
  }
  .main__title {
    width: 98%;
  }
  .main__p {
    width: 98%;
  }
  .main__right {
    margin-top: 17px;
    width: 95%;
  }
  .main__right__wrapper {
    width: 100%;
    padding: 10px 7px;
  }
  .main__right__p {
    width: 90%;
  }
  .main__right__plus {
    right: 6px;
  }
}

@media only screen and (max-width: 720px) {
  .right__side{
    margin-left: auto !important;
  }

}
  </style>
  <body>
    <div class="right__side">
      <h1 class="faqs" style="font-size:40px;font-weight:400">FAQs</h1>

          <div class="input__div">
            <span class="search__icon">
              <img src="<?=$DEFAULT_PATH?>assets/images/Bluesearch.svg">
            </span>
            <input type="text" placeholder="search" class="input" />
          </div>

          <div class="main__Div">
            <div class="main__left">
              <h3 class="small__faq">FAQ</h3>
              <h1 class="main__title">
                Here are Some Answer For Frequntly asked Questions.
              </h1>
              <p class="main__p">
                We got alot of Message With the same Questions so here are some
                fast answer for populare Question.
              </p>
            </div>
            <div class="main__right">
              <div class="main__right__wrapper rows">
                <h1 class="main__right__h1">
                  Lorem ipsum dolor sit amet, adipiscing elit.
                </h1>
                <span class="main__right__plus">
                <img src="<?=$DEFAULT_PATH?>assets/images/plus.svg">
              
                </span>
              </div>
              <div class="main__right__wrapper">
                <h1 class="main__right__h1">
                  Lorem ipsum dolor sit amet, adipiscing elit.
                </h1>

                <p class="main__right__p">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. At ut
                  adipiscing sit pretium amet nam volutpat adipiscing lacus. Id
                  nibh ut augue feugiat in.
                </p>
              </div>
              <div class="main__right__wrapper">
                <h1 class="main__right__h1">
                  Lorem ipsum dolor sit amet, adipiscing elit.
                </h1>
                <span class="main__right__plus">
                <img src="<?=$DEFAULT_PATH?>assets/images/plus.svg">
              
                </span>
              </div>
              <div class="main__right__wrapper">
                <h1 class="main__right__h1">
                  Lorem ipsum dolor sit amet, adipiscing elit.
                </h1>
                <span class="main__right__plus">
                <img src="<?=$DEFAULT_PATH?>assets/images/plus.svg">
              
                </span>
              </div>
            </div>
          </div>
    </div>
    <?php require('constant/scripts.php');?>
  </body>
</html>