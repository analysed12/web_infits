<?php include 'navbar.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infits | Health Details</title>
</head>

<style>
  
body{
    font-family: 'NATS' !important;
}
.left {     
  position: relative;
  display:inline-block;
  margin-top: 15px;
  margin-left: 30px;
  font-weight: 400;
  }
  .content img{    
  width: 370px;
  height: 250px;
  margin-left: 400px;
  margin-top: 50px;
  }
  .content p{
  font-family: 'NATS';
  font-style: normal;
  font-weight: 500;
  font-size: 36px;
  line-height: 48px;
  text-align: center;
  color: #000000;
  margin-right: 130px;
  margin-top: 7px;

  }
  
  .recipe-add-btn{
  display: flex;
    margin-left:77.3rem;
    bottom:20px;
    margin-top:4.7rem;
    width: 250px;
    height: 80px;
    background: #FFFFFF;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);
    border-radius: 50px;
    }
  
@media screen and (min-width: 720px) and (max-width:1500px) {
.main-content{
  overflow: hidden;
}
.recipe-add-btn{
margin-top:  60px;
margin-right: 30px;
margin-bottom:20px; 
float: right;
}
}
@media screen and (min-width: 1010px) and (max-width:1500px) {
  .content img{
margin-top: 50px;
margin-left: 270px;
width: auto;
}
}
@media screen and (min-width: 720px) and (max-width:1010px) {
.content img{
  margin-right:auto;
  margin-left: 70px;
  width:auto;
}
}
@media screen and (min-width: 0px) and (max-width: 720px) {
.main-content{
  overflow-x:hidden;
  margin-top: -20px;
}
.left{
margin-top:-10px;
margin-left: 60px;
}
.content p{
  margin-left: 20px;
  margin-top: 0.5rem;
  font-size: 24px;
  width:100%;
}
.content img{ 
  margin-left: 20px;
  margin-top: 0.5rem;
  font-size: 24px;
  width:100%;

margin-top:4rem;
}
.recipe-add-btn{
margin-top:30px;
margin-right: 20px;
float: right;
margin-bottom:20px;
}
} 


</style>

</style>

<body>
<div class="main-content">
      <div> 
        <div class="left"> 
          <h1 style="margin-left:1rem;margin-top:1.5rem">Forms and Documents</h1> 
        </div> 
      </div> 
     <div class="content">
          <img src="<?=$DEFAULT_PATH?>assets/images/No messages.svg">
          <p>You haven't created<br> any form yet!</p>
      </div>
    <a href="health_detail_form_create.php" style="text-decoration:none">
    <div class="recipe-add-btn" style="padding-right:40px; cursor:pointer;" >
        <h3 style="margin-left:20px; margin-top:25px; font-size:29px;color: #4B9AFB;">Create Recipe</h3>
        <img src="<?=$DEFAULT_PATH?>assets/images/Task_Plus.svg" alt="" style="width:40px; height:40px; margin-top:20px; margin-right:-20px; margin-left:18px;">
    </div>
    </a>
</div>
<?php require('constant/scripts.php'); ?>
</body>
</html>