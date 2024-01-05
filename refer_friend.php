<?php require('constant/config.php');
session_start();
if (isset($_SESSION['dietitian_id'])) {
    $id = $_SESSION['dietitian_id'];
    $sql = "SELECT * FROM dietitian WHERE `dietitian_id`='$id' ";
    $res =  $conn->query($sql);
    $result = mysqli_fetch_assoc($res);
} ?>
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
            /* justify-content: center; */
            flex-direction: column;
            /* justify-content: space-between; */
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
        #content .flex-container .friend-list-box ul li .user .ppf{
            width: 3rem;
            height: 3rem;
        }

        #content .flex-container .friend-list-box ul li .user .para-box {
            padding-top: 15px;
            padding-left: 10px;
        }

        #content .flex-container .friend-list-box ul li .user .para-box p {
            color: black;
            line-height: 2px;
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

        .popup1{
            display: none;
            top: 0;
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            transition: opacity 500ms;
            justify-content: center;
            align-items: center;
        }
        .popup{
            display: flex;
            flex-direction: column;
            width: 467px;
            padding: 20px;
            left: 500px;
            top: 20px;
            background: #FFFFFF;
            border: 1px solid #DDD9D9;
            border-radius: 17px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
            justify-content: center;
            align-items: center;
        }
        .popup .close:hover {
            cursor: pointer;
            color: #06D85F;
        }
        .popup .content{
            max-height: 30%;
        }
        @media screen and (max-width: 1200px) {
            .popup {
                margin-left: 10% !important;
                margin-right: 10% !important;
                width: auto
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
                        <input type="text" id="copy-input"  class="form-control border-primary text-primary border-end-0" placeholder="Copy code" aria-label="Referral code" aria-describedby="button-addon2" value="<?php echo $result['referral_code'];?>">
                        <button id="copy-button" class="btn btn-outline-primary border-start-0" type="button" id="button-addon2">copy</button>
                      </div>
                   
                    <button id="share">Share</button>
                </div>
            </div>
            <div class="friend-list-box">
                <div class="heading-box">
                    <h3>Referral Users</h3>
                    <img src="<?=$DEFAULT_PATH?>assets/images/search.svg" alt="Search" style="border-radius:100%;border:1px solid black;padding:8px;cursor:pointer; color:#051532;">
                </div>
                <ul>
                <?php 
                    foreach (json_decode($result['referral_users']) as $key){ 
                        $sql__ = "SELECT * FROM dietitian WHERE dietitianuserID='$key'";
                        $result = $conn->query($sql__);
                        $row = $result->fetch_assoc();
                        echo "<li style='cursor: pointer;'>
                            <div href='#' class='user'>
                                <img src=";
                        if ($row['p_p']==='' || $row['p_p']==='user-default.png'){echo $DEFAULT_PATH.'assets/images/user-default.png';}
                        else{echo 'uploads/profile/images/'.$row['p_p'];}
                        echo " alt='profile_photo' class='ppf'>
                                <div class='para-box'>
                                    <p class='name'>$key</p>
                                </div>
                            </div>
                                <span class='status'>".date('Y-m-d', strtotime($row['joined_date']))."</span>
                        </li>";
                    }
                ?>
                
                </ul>
            </div>
        </div>
    </div>
    <div class="popup1">
        <div class="popup">
            <div style="display:flex;justify-content:space-between;align-items:center;width:100%;">
                <h5>Share Via <img src="<?= $DEFAULT_PATH ?>assets/images/Share.svg"></h5>
                <div class="close" style="align-self:flex-start;font-size:1.5rem;">&times;</div>
            </div>
            <div class="content" style="display:flex;gap:1rem;margin-left:1rem">
                <a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share"><img
                        src="<?= $DEFAULT_PATH ?>assets/images/WhatsApp.svg"></a>
                <a class="twitter-share-button" href="https://twitter.com/intent/tweet"><img
                        src="<?= $DEFAULT_PATH ?>assets/images/twitter.svg"></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=#url" target="_blank"> <img
                        src="<?= $DEFAULT_PATH ?>assets/images/facebook.svg"></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={url}"><img
                        src="<?= $DEFAULT_PATH ?>assets/images/LinkedIn-Circled.svg"></a>
                <img src="<?= $DEFAULT_PATH ?>assets/images/Instagram.svg">
            </div>
        </div>
    </div>
<script>
        const copyButton = document.getElementById("copy-button");
        const copyInput = document.getElementById("copy-input");

        const close = document.getElementsByClassName("close")[0];
        const share = document.getElementById("share");
        const status = document.getElementsByClassName("status");

        copyButton.addEventListener("click", () => {
            copyInput.select();
            document.execCommand("copy");
            copyButton.textContent = "Copied!";
            setTimeout(() => {
                copyButton.textContent = "Copy";
            }, 2000);
        });

        close.addEventListener("click",()=>{
            document.getElementsByClassName("popup1")[0].style.display = "none";
            copyButton.disabled = false
        });
        
        share.addEventListener("click",()=>{
            document.getElementsByClassName("popup1")[0].style.display = "flex";
            copyButton.disabled = true
        });
        
        Array.from(status).forEach(element => {
            element.addEventListener("click",()=>{
                document.getElementsByClassName("popup1")[0].style.display = "flex";
                copyButton.disabled = true
            });
        });
</script>

 <?php require('constant/scripts.php'); ?>
    
</body> 
</html>