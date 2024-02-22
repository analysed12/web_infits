

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
               * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

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
.content .created-form-container .form-card-container,
.content .created-client-form-container .client-card-container {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    gap: 60px;

}


.content .created-client-form-container .client-card-container .client-cards {
    height: 190px;
    width: 250px;
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
    text-decoration: none;
    background-color: #4B9AFB;
    color: #ffffff;
    padding: 5px 15px;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
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
font-weight:100;
font-size:50px;
color:white;
background: #9C74F5;
box-shadow: 0px 0px 68px rgba(0, 0, 0, 0.3);
padding-bottom:0.5rem;
}
.sub-heading{
    font-style: normal;
font-weight: 400;
font-size: 30px;
margin-left: -5px;
margin-top: -30px;
}
.sub-con{
    padding:10px;
  height: 610px; 
  margin-left: -20px;
  margin-right: -40px;
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

img.vector{
    border-bottom-right-radius:15px;
}
@media screen and (max-width: 950px){
    .heading-box h1{
        width:430px;
        margin-right: 20px;
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
    margin-top:-40px;
    margin-left:20px;
  }
}
@media screen and (max-width:550px) {
    .create_btn{
        margin-left:-50px;
        z-index: 2;
    }
    .sub-con{
        margin-right: -20px;
        margin-left: 30px;
    }
    .search-box1{
        margin-top: 190px;
        margin-left: -200px;
        margin-right: 30px;
    }
    .heading-box h1{
        margin-left: 20px;
        width: 500px;
    }
    .sub-heading{
        margin-top: 50px;
    }
    .create_btn{
        top:86%;
   }
}
        </style>
</head>
<body>
    <div class="content">

       <div class="heading-box">
            <h1>Client Forms and Documents</h1>
            <div class="search-box1">
                <img src="<?=$DEFAULT_PATH?>assets/images/Search.svg"  alt="#">
                <input type="search" name="form" id="form" placeholder="Search clients">
            </div>
        </div>

        <div class="created-client-form-container">
        <p class="sub-heading">All Forms</p>
        <div class="sub-con">  
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
                                <p> <?php echo $row["clientuserID"]; ?> </p>
                                <div class="btn-box">
                                <a href="health_detail_form.php?form=show&client_id=<?=$row['client_id']?>" id="clientForm">Form</a>
                                    <a href="health_detail_form.php?document=show&client_id=<?=$row['client_id']?>" id="clientDocument">Documents</a>
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