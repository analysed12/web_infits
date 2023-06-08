<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infits</title>
    <?php require('constant/head.php');?>

    <style>
       body {
        font-family: 'NATS', serif !important;
        
    }
    #content {
        display: flex;
        flex-direction: column;
        height: 90%;
        padding: 20px;
        margin-top:20px;
        left: 20px  ;
        overflow: clip;
    }

    
    /*------------------HELP-----------------------*/
    .help-box{
    margin-left: 42px;
    background: #FFFFFF;
    border: 1px solid #F4F4F4;
    box-shadow: 0px 8px 24px rgba(176, 190, 197, 0.32), 0px 3px 5px rgba(176, 190, 197, 0.32);
    border-radius: 12px;
    width: 70%;
    padding: 5px;
    margin: 10px;
    }
    .help-content{
    display: flex;
    flex-direction: row;
    align-items: center;
    }
    .help-text{
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    justify-content: center;
    }
    .main {
 
  float: left;
  margin-left:25%;
  width: 48%;
  padding: 0 40px;
}
@media screen and (max-width: 1120px){
  .main {
    float: left;
    width: 83%;
  margin-left:0% }
  }


@media screen and (max-width: 920px) {
  .main {
    float: left;
    margin-left: 1%;
    width: 83%; }
}
@media only screen and (max-width: 768px) {
  .main {
    width: 90%;
    margin-left: 5%;
    padding: 0;
  }
}
@media only screen and (max-width: 767px) {
        #content {
          height: auto;
          padding: 10px;
        }
        .img1{
          height:12rem;
        }
        .main {
          float: none;
          margin-left: 0;
          width: 100%;
          padding: 0;
        }

        .help-box {
          margin-left: 0;
          width: 80%;
        }
        .help-text {
    display: flex;
    flex-direction: column;
    justify-content: left;
    align-items: left;
}
      }

        
    </style>
  </head>

  <body>
  <div id="page">
    <?php include 'navbar.php'; ?>

    <div id="content">
   
        <h1 style="font-size: 40px; color:#202224; margin-left:20px; font-weight: 500;">Help</h1>

      
      <center>
      <div class="main">
      <div class="center-flex">
      <img src="<?=$DEFAULT_PATH?>assets/images/help_img.svg" class="img1" height="248rem">
    </div>  

    <a href="FAQ.php" style="text-decoration: none;">
    <div class="help-box">
      <div class="help-content">
      <img src="<?=$DEFAULT_PATH?>assets/images/faq.svg" style="margin-right:20px ;margin-left:20px ; height: 48px">
      <div class="help-text">
        <p style="font-size: 26px; margin: 0;color:#000000;">FAQs 
          <br> 
          <p style="font-size: 22px; margin: 0; color:#747688;">Frequently Asked Questions
    </div>
    </div>
    </div>
  </a>

    <a href="email.html" style="text-decoration: none;">
    <div class="help-box">
      <div class="help-content">
      <img src="<?=$DEFAULT_PATH?>assets/images/help_email.svg" style="margin-right:20px ;margin-left:20px ; height: 48px;">
      <div class="help-text">
        
        <p style="font-size: 26px; margin-left: 10px; margin: 0;color:#000000;">EMAIL
          <br> 
          <p style="font-size: 22px; margin: 0; color:#747688;">Reach us through Email
      </div>
      </div>
    </div>
  </a>
  </center>
    </div>


</div>
<?php require('constant/scripts.php');?>
</body>
</html>