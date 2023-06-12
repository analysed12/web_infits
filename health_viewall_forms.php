

<?php include 'navbar.php';
require('constant/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infits | Health Details</title>
    <?php require('constant/head.php'); ?>
        <style>

body{
    font-family: 'NATS' !important;
    overflow: hidden;
 }
        .content {
    display: flex;
    align-items: center;
    flex-direction: column;
    padding: 20px 16px;
}
.content .heading-box {
    height: 70px;
    width: 94%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
}

.content .heading-box h1 {
    font-size: 40px;
  font-weight: 400;
  margin-top:2.3rem;
  margin-left: -10px;
}

.content .heading-box .search-box1 {
    width: 380px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px 10px;
    box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
}
.content .heading-box .search-box1 input {
    width: 100%;
    font-size: 1.2rem;
    padding: 5px 10px;
    margin-left: 10px;
    border: none;
}

.content .heading-box .search-box1 input:focus {
    outline: none;
}
.sub-heading{
    font-style: normal;
font-weight: 400;
font-size: 30px;
margin-left: 5px;
    }
.create_btn{
    position: absolute;
width:75px;
height: 75px;
left: 90%;
top: 80%;
border:none;
border-radius:50%;
font-style:normal;
font-weight:10;
font-size:50px;
color:white;
background: #9C74F5;
box-shadow: 0px 0px 68px rgba(0, 0, 0, 0.3);
padding-bottom:0.5rem;
}
.content .created-form-container,
.content .created-client-form-container {
    /* border: 1px solid rgb(0, 0, 0); */
    width: 87%;
}
.content .created-form-container .form-card-container,
.content .created-client-form-container .client-card-container {
    /* border: 1px solid red; */
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    gap: 30px;

}
.form-cards{
    margin-right: 30px;

}
.content .created-form-container .form-card-container .form-cards {
    position: relative;
    height: 100px;
    max-width: 500px;
    width: 80%;
    min-width: 350px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px 20px;
    box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.25);
    border-radius: 15px;
    -webkit-border-radius: 15px;
    -moz-border-radius: 15px;
    -ms-border-radius: 15px;
    -o-border-radius: 15px;
}

.content .created-form-container .form-card-container .form-cards img.vector {
    position: absolute;
    bottom: 0;
    right: 0;
    height: 80px;
    user-select: none;
    pointer-events: none;
}
img.vector{
    border-bottom-right-radius:15px;
}
.content .created-form-container .form-card-container .form-cards .form-content {
    height: 70px !important;
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    justify-content: space-evenly;
}

.content .created-form-container .form-card-container .form-cards .form-content h4 {
    font-size: 1.5rem;
    font-weight: 400;
}

.content .created-form-container .form-card-container .form-cards .form-content p {
    margin: 0;
    width: 100px;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    font-size: 1rem;
    font-weight: 400;
}

.content .created-form-container .form-card-container .form-cards .form-content p span {
    background-color: #9C74F5;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 20px;
    height: 20px;
    margin-right: 5px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
}

.content .created-form-container .form-card-container .form-cards .options {
    z-index: 1;
    cursor: pointer;
    user-select: none;
}

.content .created-form-container .form-card-container .form-cards .option-popup {
    display: none;
}

.option-popup{
    margin-left: 60px;
}
.option-popup button{
    width: 100px;
}
.form-content{
    margin-left: 20px;
}
.options{
    margin-right: 20px;
}
.sub-con{
    padding:10px;
  height: 495px; 
  margin-left: -10px;
  margin-right: -40px;/* Adjust the height as needed */
overflow-y: scroll; 
}
.sub-con::-webkit-scrollbar{
    width:10px; 
}
.sub-con::-webkit-scrollar-thumb{
  background: #888;
}
.sub-con::-webkit-scrollbar-track {
  background: #F3F3F3; 
  border-radius: 20px;
}

/* Handle on hover */
.sub-con::-webkit-scrollbar-thumb:hover {
  background:  #E3E3E3;
  border-radius: 20px; 
}
.content .created-form-container .form-card-container .form-cards .option-popup.show {
    background-color: #FFFFFF;
    width: 230px;
    height: 70px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-40%, -50%);
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    -webkit-transform: translate(-40%, -50%);
    -moz-transform: translate(-40%, -50%);
    -ms-transform: translate(-40%, -50%);
    -o-transform: translate(-40%, -50%);
    border-radius: 10.0347px;
}

.content .created-form-container .form-card-container .form-cards .option-popup button {
    background-color: #FF2929;
    color: #FFFFFF;
    padding: 5px 30px;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.content .created-form-container .form-card-container .form-cards .option-popup button:last-child {
    background-color: #9C74F5;
}

@media screen and (max-width:550px) {
    .create_btn{
        margin-left:-50px;
    }
    .sub-con{
        margin-right: -20px;
}
    .search-box1{
        margin-top: 140px;
        margin-left: -200px;
        margin-right: 30px;
    }
    .heading-box h1{
        margin-left: 20px;
    }
    .sub-heading{
        margin-top: 50px;
    }
    .create_btn{
        top:86%;
   }
}
@media screen and (max-width: 950px){
    .heading-box h1{
        width:300px;
    }
    .create_btn{
        left:85%;
    }
    .option-popup{
        width: 30px;
        margin-top:40px;
    }
}
@media screen and (max-width: 720px){
  .heading-box{
    margin-top:-55px;
    margin-left:20px;
  }
}
        </style>
</head>
<body>
    <div class="content">

    <div class="heading-box">
            <h1>My Forms</h1>
            <div class="search-box1">
                <img src="<?=$DEFAULT_PATH?>assets/images/search.svg" alt="#">
                <input type="search" name="form" id="form" placeholder="Search clients">
            </div>
        </div> 
        
        <div class="created-form-container">
           <p class="sub-heading">All Forms</p>
           <div class="sub-con">  
           
            <div class="form-card-container">

                <?php
                   $sql = "SELECT * from dietitian_forms where dietitianuserID = '{$_SESSION['dietitianuserID']}'";
                   $result = $conn->query($sql);
                       while($form = $result->fetch_assoc()) {
                ?>
                <div class="form-cards">
                    <img class="vector" src="<?=$DEFAULT_PATH?>assets/images/form-card-vector.svg">
                    <div class="form-content">
                    <h4><?=$form['form_name']?></h4>
                        <p><span><?=$form['total_que']?></span> Question</p>
                    </div>
                    <div class="options" onclick="showPopup(this)">
                        <img src="<?=$DEFAULT_PATH?>assets/images/vertical-three-dots.svg" alt="options" title="options">
                    </div>
                    <div class="option-popup">
                        <button>Delete</button>
                        <button>Edit</button>
                    </div>
                </div>
            <?php
                }
            ?>
                    </div>
            </div>
        </div>
        <script>
            const optionBtn = document.querySelector(".options");
            function showPopup(e) {
            e.parentNode.children[3].classList.toggle("show");
        };
        </script>
<div class="button">
        <a style="background-color:none" href="health_detail_form_create.php"><button class="create_btn">+</button></a>
    </div>
    </div>

    <?php require('constant/scripts.php'); ?>
</body>
</html>