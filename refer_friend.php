<?php require('constant/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Refer friend </title>
    <?php require('constant/head.php'); ?>
    

    <style>

        #copy-input {
           width: 215px;
           padding: 10px;
        }

        #content h1 {
            margin-left:17rem;
            margin-top: 10px;
            font-size: 2rem;        }
        

        #content .flex-container {
          
            display: flex;
            align-items: center;
            justify-content: center;
            align-items: flex-start;
            margin-top: 50px;
            flex-wrap: wrap;
            gap: 20px;
        }

        #content .flex-container .refer-code-container {
           
            width: 500px;
            display: flex;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        #content .flex-container .refer-code-container img {
           
            width: 274px;
            height: 255px

        }



        #content .flex-container .refer-code-container .refer-code-box {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            flex-direction: column;
        }

        #content .flex-container .refer-code-container .refer-code-box p {
            border: 1px solid #4b9afb;
            color: #4b9afb;
            width: 250px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px 15px;
            border-radius: 10px;
        }

        #content .flex-container .refer-code-container .refer-code-box p button {
            color: #4b9afb;
            border: none;
            font-size: 0.8rem;
            background-color: white;
        }

        #content .flex-container .refer-code-container .refer-code-box button#share {
            border: none;
            background-color: #4b9afb;
            color: white;
            width: 125px;
            height: 45px;
            margin-top: 10px;
            border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            -ms-border-radius: 10px;
            -o-border-radius: 10px;
            font-family: 'NATS';
            font-style: normal;
            font-weight: 400;
            font-size: 20px;
        }

        #content .flex-container .friend-list-box {
            width: 400px;
            padding: 20px;
        }

        #content .flex-container .friend-list-box .heading-box {
            width: 87%;
            display: flex;
            align-items: center;
            justify-content: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        #content .flex-container .friend-list-box .heading-box h3 {
            font-size: 1.4rem;
            margin-left: 30px;
        }


        #content .flex-container .friend-list-box{
            /* border: 1px solid red; */
            width: 500px;
            margin-bottom: 5rem;
        }
        #content .flex-container .friend-list-box ul {
            /* border: 1px solid red; */
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            justify-content: space-between;
            list-style: none;
            padding: 20px;
            position: relative;
            height:30rem;
            width: 100%;
            overflow: hidden;
            overflow-y: scroll;
        }

        #content .flex-container .friend-list-box ul::-webkit-scrollbar {
            width: 10px;    
        }

        #content .flex-container .friend-list-box ul::-webkit-scrollbar-track {
            background:#F3F3F3;
;
            border-radius: 10px;
        }

        #content .flex-container .friend-list-box ul::-webkit-scrollbar-thumb {
            background: #D6D6D6;
            border-radius: 10px;
        }

        #content .flex-container .friend-list-box ul li {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        #content .flex-container .friend-list-box ul li .user {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #content .flex-container .friend-list-box ul li .user .para-box {
            padding-top: 15px;
            padding-left: 10px;
        }
        p{
            margin-bottom: 0.5rem !important;
        }
        #content .flex-container .friend-list-box ul li .user .para-box p {
            color: black;
            line-height: 20px;
            font-family: 'NATS';
            font-style: normal;
            font-weight: 400;
            font-size: 22px;
        }

        #content .flex-container .friend-list-box ul li .user .para-box p.company {
            font-family: 'NATS';
            font-style: normal;
            font-weight: 400;
            font-size: 17px;
            padding-left: 2px;
            color: #051532;
            opacity: 0.6;
        }

        #content .flex-container .friend-list-box ul li .status {
            width: 100px;
            text-align: center;
        }

        #content .flex-container .friend-list-box ul li .status span {
            color: #4b9afb;
        }

        #content .flex-container .friend-list-box ul li .status span.accepted {
            color: #45e945;
        }
        body::-webkit-scrollbar {
  display: none;
}

        @media only screen and (max-width:768px) {
            #content h1{
                margin-left:1.5rem;
            }
            
        }
    </style>

</head>

<body>

    <?php 
    error_reporting(0);
    include 'navbar.php' ?>

    <div id="content">
        <h1 style="margin-top:2rem;">Refer to a friend</h1>
        <div class="flex-container">
            <div class="refer-code-container">
                <img src="<?=$DEFAULT_PATH?>assets/images/Istockphoto.svg" alt="SVG">
                <div class="refer-code-box">
                    <div class="input-group mb-3">
                        <input type="text" id="copy-input"  class="form-control border-primary text-primary border-end-0" placeholder="Copy code" aria-label="Referral code" aria-describedby="button-addon2">
                        <button id="copy-button" class="btn btn-outline-primary border-start-0" type="button" id="button-addon2">copy</button>
                      </div>
                   
                    <button id="share">Share</button>
                </div>
            </div>
            <div class="friend-list-box">
                <div class="heading-box">
                    <h3>Invite a friend</h3>
                    <img src="<?=$DEFAULT_PATH?>assets/images/search.svg" alt="Search" style="border-radius:100%;border:1px solid black;padding:8px;cursor:pointer; color:#051532;">
                </div>
                <ul>

                    <?php for ($i = 0; $i < 10 ; $i++) { ?>
                        <li style="cursor: pointer;">
                            <a href="#" class="user">
                                <img src="<?=$DEFAULT_PATH?>assets/images/refer_profile.svg" alt="profile_photo">
                                <div class="para-box">
                                    <p class="name">Tongkun Lee</p>
                                    <p class="company">Facebook</p>
                                </div>
                            </a>
                            <a href="#" class="status">
                                <span>Invite</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
<script>
const copyInput = document.getElementById("copy-input");
const copyButton = document.getElementById("copy-button");

copyButton.addEventListener("click", () => {
  copyInput.select();
  document.execCommand("copy");
  alert("Copied to clipboard");
});
 </script>

 <?php require('constant/scripts.php'); ?>
    
</body> 
</html>