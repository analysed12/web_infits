<?php
include('navbar.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <title>Infits</title>
  <?php require('constant/head.php');?>

</head>
<style>
  body {
    font-family: 'NATS', sans-serif !important;
  }

  .right__side {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    position: relative;
    overflow-y: scroll;
    margin-top: 1rem;
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
    gap: 0.5rem;
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
    justify-content: space-between;
    flex-direction: row;
    padding: 20px 40px;
  }

  .main__left {
    min-width: 35vw !important;
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

  /* .main__right {
    display: flex;
    flex-direction: column;
  }

  .main_right_wrapper {
    border-radius: 15px;
    border: 2px solid greenyellow;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
    width: 100%;
    margin-right: 200px;
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
    padding: 7px 25px;
    position: relative;
    height: 65px;

  } */

/*   
  .main_right_h1 {
    font-family: Poppins;
    border: 2px solid rgb(241, 8, 8);
    font-size: 18px;
    font-weight: 500;
    line-height: 27px;
    letter-spacing: 0em;
    text-align: left;
    width: 406px;
    height: 30px;
    margin-top:9.6px;
    left: 900px;
    justify-content: center;
    color: #0e0e2c;
    padding-top: 3px;
     
  } */

  /* .main_right_p {
    font-family: Poppins;
    font-size: 16px;
    font-weight: 400;
    line-height: 27px;
    letter-spacing: 0rem;
    text-align:left;
    width: 540px;
    height: 81px;
    justify-content: center;
    /* padding-top: 23px; */
    margin-top: 14px;
    /* margin-right: 123px; */
    /* margin-left: 23px; */
    /* left: 120px; */
    
    border: 2px solid pink;
    
    /* font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 171.5%; */
    /* width: 70%; */
    /* margin: 10px auto; */
    /* color: rgba(14, 14, 44, 0.6); */
  } */
  
  /* .main_right_wrapper-rows-para {
    /* background-color: antiquewhite; */
    /* box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25); */
    /* border-radius: 15px; */
    /* width: 100%; */
    /* margin: 0 auto; */
    /* display: flex; */
    /* flex-direction: column; */
    /* margin-bottom: 20px; */
    /* margin-right: 60px; */
    /* justify-content:space-between; */
    /* align-items: center; */
    /* padding: 5px 25px; */
    /* position: relative; */
    /* height: 180px; */
    
  /* } */
/*   
  .main_right_Plus-Math {
    position: absolute;
    display: flex;
    /* border: 2px solid rgba(1, 119, 253, 1); */
    right: 25px;
    margin-top: 12px;
    width: 24px;
height: 24px;
/* top: 339px; */
/* left: 1323px; */

  }  */ */

  /* .plus-math-image{
    height: 24px;
    width: 24px;
    /* border: 2px solid rgba(1, 119, 253, 1);
margin: auto;
justify-content: center;
 top: 13rem;  */
/* padding-top: 120px; */

/*...................... css of toggle faqs.............................. */
#faq{
    background-color: #f5f5f5;
    padding: 84px 0px 144px 134px;
    display: flex;
    flex-direction: column;
}
.faq-box{
    /* padding: 7px 25px; */
    /* position: relative; */
    padding: 13px 35px;
    background: rgba(255, 255, 255, 0.4);
    border: 1px solid #ffffff; 
    /* box-shadow: 14px 14px 60px rgba(59, 42, 130, 0.06); */
    border-radius: 15px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
    display: flex;
    flex-direction: column;
    width: 40vw;
    margin-bottom:20px;
    margin-right: 70px;
    /* border: 2px solid red; */
    min-height: 65px;
}
.faq-box-container{
    margin-right: 50px;
}
.faq-box-question{
    display: grid;
    grid-template-columns: 1fr 30px;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    user-select: none;
}
.faq-box-question h4{
    font-weight: 500;
    font-size: 20px;
    line-height: 31px;
    color:rgb(16, 16, 16);
    font-family: Poppins;
}
.faq-box-icon{
    display: block;
    position: relative;
    height: 3px;
   width: 16px;
   margin-left: auto;
}
.faq-box-icon::before,
.faq-box-icon::after{
    background: #3b2a82;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 3px;
}
.faq-box-icon::before{
top:0px;
}
.faq-box-icon::after{
    top: 0px;
    transform: rotate(90deg);
}
.faq-box-question.active .faq-box-icon::after{
     transform: rotate(0deg);
}
.faq-box-question.active h4{
  color:rgb(16, 16, 16);
}
.faq-box-answer p{
    font-weight: 400;
    font-size: 16px;
    line-height: 20px;
    color: #7a719b;
    padding-top: 20px;
    word-spacing: 0.2rem;
    font-family: Poppins;
    padding-bottom: 26px;
}
.faq-box-answer{
    max-height:0px;
    overflow: hidden;
    transition: all ease-in-out 0.5s;
}


*/
/* ............................................Responsive code ................................ */
  @media only screen and (max-width: 600px) {

    .input__div {
      width: 90%;
    }

    .main__Div {
      flex-direction: column !important;
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

    .main_right_wrapper {
      width: 100%;
      padding: 10px 7px;
    }

    .main_right_p {
      width: 90%;

    }

    .main_right_Plus-Math {
      right: 6px;
    }
  }

  ::placeholder {
    color: #b8d3f2;
  }
  @media  screen and (min-width: 200px) and (max-width:1000px) {
  .faq-box{
    width:200px;
  } 

  }
  @media  screen and (min-width: 1000px) and (max-width:1400px) {
  .faq-box{
    width:300px;
  } 
  }
  @media  screen and (min-width: 0px) and (max-width:400px) {
    .main__title{
      font-size: 30px;
    }
  }
</style>
 <!-- ........................................right side faqs .................................-->

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
      <div class="main__left" style="padding-right: 0px;">
        <h3 class="small__faq">FAQ</h3>
        <h1 class="main__title">
          Here are some answers for frequently asked questions!
        </h1>
        <p class="main__p">
          We get a lot of messages with the same questions so here are some
          fast answers for popular questions.
        </p>
      </div>

<!-- ........................................Toggle section of faq ............................................-->

      <section id="faq">
        <div class="faq-box">
            <div class="faq-box-question">
                <h4>Lorem ipsum dolor sit amet.?</h4>
                <span class="faq-box-icon"></span>
            </div>
                <div class="faq-box-answer">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus illum repudiandae libero id exercitationem ossimus laudantium doloremque dolorum cupiditate repellendus velit!

                    </p>
        
    </div>
</div>
<div class="faq-box">
  <div class="faq-box-question">
      <h4>Lorem ipsum dolor sit amet.?</h4>
      <span class="faq-box-icon"></span>
  </div>
      <div class="faq-box-answer">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus illum repudiandae libero id exercitationem ossimus laudantium doloremque dolorum cupiditate repellendus velit!

        </p>

</div>
</div>
<div class="faq-box">
  <div class="faq-box-question">
      <h4>Lorem ipsum dolor sit amet.?</h4>
      <span class="faq-box-icon"></span>
  </div>
      <div class="faq-box-answer">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus illum repudiandae libero id exercitationem ossimus laudantium doloremque dolorum cupiditate repellendus velit!

        </p>

</div>
</div>
<div class="faq-box">
  <div class="faq-box-question">
      <h4>Lorem ipsum dolor sit amet.?</h4>
      <span class="faq-box-icon"></span>
  </div>
      <div class="faq-box-answer">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus illum repudiandae libero id exercitationem ossimus laudantium doloremque dolorum cupiditate repellendus velit!

        </p>

</div>
</div>
</section>
<script>
    var faq = document.getElementsByClassName("faq-box-question");
    var i;
    for(i=0; i < faq.length; i++){
        faq[i].addEventListener("click",function(){
            this.classList.toggle("active");
            var body = this.nextElementSibling;
            if(body.style.maxHeight === "100px"){
                body.style.maxHeight = "0px";
            }
            else{
                body.style.maxHeight = "100px"

            }
        });
    }
</script>
          <!-- <h1 class="main_right_h1">
            Lorem ipsum dolor sit amet, adipiscing elit.
          </h1>
          <div class="main_right_Plus-Math">
          <img src="<?=$DEFAULT_PATH?>assets/images/Plus Math.svg" class="plus-math-image">
          </div>
        </div> -->
        <!-- <div class="main_right_wrapper-rows-para">
          <h1 class="main_right_h1">
            Lorem ipsum dolor sit amet, adipiscing elit.
          </h1>

          <p class="main_right_p">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. At ut
            adipiscing sit pretium amet nam volutpat adipiscing lacus. Id
            nibh ut augue feugiat in.
          </p>
        </div> -->
        <!-- <div class="main_right_wrapper">
          <h1 class="main_right_h1">
            Lorem ipsum dolor sit amet, adipiscing elit.
          </h1>
          <div class="main_right_Plus-Math">
          <img src="<?=$DEFAULT_PATH?>assets/images/Plus Math.svg" class="plus-math-image"">

          </div>
        </div> -->
        <!-- <div class="main_right_wrapper">
          <h1 class="main_right_h1">
            Lorem ipsum dolor sit amet, adipiscing elit.
          </h1>
          <div class="main_right_Plus-Math">
            <img src="<?=$DEFAULT_PATH?>assets/images/Plus Math.svg" class="plus-math-image">

          </div>
        </div> -->
      </div>
    </div>
  </div>
  <?php require('constant/scripts.php');?>
 

</body>

</html>