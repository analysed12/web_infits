<?php
require('constant/config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infits | Health Details</title>
    <?php require('constant/head.php'); ?>

   <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    overflow: hidden;
}
.content {
    display: flex;
    align-items: center;
    flex-direction: column;
    padding: 20px 16px;
    font-family: "NATS";
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
  margin-top:1.8rem;
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

.content .created-form-container,
.content .created-client-form-container {
    width: 87%;
}

.content .created-client-form-container {
    margin-top: 30px;
}

.content .created-form-container .heading-box,
.content .created-client-form-container .heading-box {
    width: 100%;
}

.content .created-form-container .heading-box h2,
.content .created-client-form-container .heading-box h2 {
    font-size: 1.8rem;
    font-weight: 400;
}

.content .created-form-container .heading-box button,
.content .created-client-form-container .heading-box button {
    border: none;
    background-color: transparent;
}

.content .created-form-container .heading-box button a,
.content .created-client-form-container .heading-box button a {
    color: #525252;
    font-size: 1.1rem;
    text-decoration: none;
}

.content .created-form-container .heading-box button a:hover,
.content .created-client-form-container .heading-box button a:hover {

    background-color: transparent;
    color: #525252;
    border: none;
    border-radius: 0;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -ms-border-radius: 0;
    -o-border-radius: 0;
}

.content .created-form-container .form-card-container,
.content .created-client-form-container .client-card-container {
    width: 110%;
    display: flex;
    flex-wrap: wrap;
    gap: 30px;

}
.form-cards{
    margin-right: 30px;
 }
.option-popup{
    margin-left: 55px;
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

.content .created-form-container .form-card-container .form-cards {
    position: relative;
    height: 100px;
    max-width: 500px;
    width: 45%;
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

.content .created-form-container .form-card-container .form-cards .option-popup.show {
    background-color: #FFFFFF;
    width: 250px;
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

.content .created-client-form-container .client-card-container {
    gap: 60px;
}

.content .created-client-form-container .client-card-container .client-cards {
    height: 190px;
    width: 186px;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    box-shadow: 0px 2px 6px 0px rgba(0, 0, 0, 0.25);
    border-radius: 18px;
    -webkit-border-radius: 18px;
    -moz-border-radius: 18px;
    -ms-border-radius: 18px;
    -o-border-radius: 18px;
}

.content .created-client-form-container .client-card-container .client-cards .card-content {
    height: 90%;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
}
.content .created-client-form-container .client-card-container .client-cards img.vector {
    position: absolute;
    bottom: 0;
    right: 0;
    height: 120px;
    user-select: none;
    pointer-events: none;
}


.content .created-client-form-container .client-card-container .client-cards .card-content p {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 500;
    z-index: 1;
    
}

.content .created-client-form-container .client-card-container .client-cards .card-content .btn-box {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    z-index: 1;
    
    
}

.content .created-client-form-container .client-card-container .client-cards .card-content .btn-box a {
    border: none;
    background-color: #4B9AFB;
    color: #ffffff;
    padding: 5px 15px;
    text-decoration: none;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
}
.create_btn{
    position: absolute;
width: 70px;
height: 70px;
left: 90%;
top: 82%;
border:none;
border-radius:50%;
font-style:normal;
font-weight:100;
font-size:40px;
color:white;
background: #9C74F5;
box-shadow: 0px 0px 68px rgba(0, 0, 0, 0.3);
padding-bottom:0.5rem;
}
.sub-content {
    padding:10px;
  height: 550px; 
  margin-left: 100px;
  margin-right: 45px;
  overflow-y: scroll;
  width: 100%;

}
.sub-content::-webkit-scrollbar{
    width:10px; 
}
.sub-content::-webkit-scrollar-thumb{
  background: #888;
}
.sub-content::-webkit-scrollbar-track {
  background: #F3F3F3; 
  border-radius: 20px;
}

/* Handle on hover */
.sub-content::-webkit-scrollbar-thumb:hover {
  background:  #E3E3E3;
  border-radius: 20px; 
}
 .heading-box button{
    margin-right: -50px;
 }
 img.vector{
    border-bottom-right-radius:15px;
}
@media screen and (max-width: 1200px){
    .heading-box h1{
        width:430px;
        margin-right: 20px;
    }
    .create_btn{
        left:84%;
        right: auto;
    }
    .option-popup{
        width: 30px;
        margin-top:40px;
    }
}
@media screen and (max-width: 720px){
  .heading-box{
    margin-top:-40px;
    margin-left:20px;
  }
  .sub-content .heading-box{
    margin-top:1px;
  }
}
 @media screen and (max-width:450px){
    .sub-content{
        width: 300px;
        margin-right: 30px;
    }

    .heading-box h1{
        margin-left: 20px;
        width: 500px;
        margin-top:40px;
    }    
        .create_btn{
        margin-left:-30px;
        z-index: 2;
    }
} 
@media screen and (max-width:550px) {
     .content{
        overflow: hidden;
     }
    .sub-content{
        margin-top: 70px;
        margin-right: 80px;
    margin-left: 70px;
    }

    .search-box1{
        margin-top: 170px;
        margin-left: -300px;
        margin-right: 30px;
}
    .create_btn{
        top:86%;
   }
}
 
   </style>
</head>

<body>
    <?php include 'navbar.php' ?>

    <div class="content">
        <div class="heading-box">
            <h1>Forms and Documents</h1>
            <div class="search-box1">
                <img src="<?=$DEFAULT_PATH?>assets/images/Search.svg" alt="#">
                <input type="search" name="form" id="form" placeholder="Search forms or clients">
            </div>
        </div>

    <div class="sub-content">
        <div class="created-form-container">
            <div class="heading-box">
                <h2>My Forms</h2>
                <button><a href="health_viewall_forms.php">View all</a></button>
            </div>
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
                        <button class="formDelete">DELTE</button>
                        <button class="formEdit"  data-form-id="<?=$form['form_id']?>"><a href="health_detail_form_edit.php?id=<?=$form['form_id']?>">EDIT</a></button>
                    </div>
                </div>
            <?php
                }
            ?>

            </div>
        </div>
        <div class="created-client-form-container">
            <div class="heading-box">
                <h2>Client forms and documents</h2>
                <button><a href="health_viewall_forms&documents.php">View all</a></button>
            </div>
            <div class="client-card-container">
                
                <?php
                    $sql = "SELECT * FROM client_forms_docs WHERE dietitianuserID = '{$_SESSION['dietitianuserID']}'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        ?>
                            <div class="client-cards">
                            <img class="vector" src="<?=$DEFAULT_PATH?>assets/images/client-card-vector.svg">
                            <div class="card-content">
                                <img src="<?=$DEFAULT_PATH?>assets/images/Form_Profile.svg" alt="Profile" id="clientProfile">
                                <p> <?=$row['clientuserID']?> </p>
                                <div class="btn-box">
                                    <a href="health_detail_form.php?form=show" id="clientForm">Form</a>
                                    <a href="health_detail_form.php?document=show" id="clientDocument">Documents</a>
                                </div>
                            </div>
                        </div>
                        <?php
                          }
                    }
                ?>
            </div>
        </div>
    </div>
                </div>
    <div class="button">
        <a style="background-color:none"href="health_detail_form_create.php"><button class="create_btn">+</button></a>
        
        
    </div>

    <script>
        const optionBtn = document.querySelector(".options");
        const clientForm = document.querySelector("#clientForm");
        const clientDocument = document.querySelector("#clientDocument");

        function showPopup(e) {
            e.parentNode.children[3].classList.toggle("show");
        };

        clientForm.addEventListener("click", () => {
            document.location.href = 'health_detail_form.php?form=show';
        });
        clientDocument.addEventListener("click", () => {
            document.location.href = 'health_detail_form.php?documents=show';
        });

    </script>
     <?php require('constant/scripts.php'); ?>
</body>

</html>