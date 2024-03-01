<?php
include 'navbar.php';
require('constant/config.php');
if(isset($_GET['client_id'])){
    $client_id = $_GET['client_id'];
}else{
    header("Location:  forms_and_documents.php");
}
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
        .content {
            display: flex;
            align-items: center;
            flex-direction: column;
            padding: 40px 16px;
            font-family: "NATS";
            order:2;
        }

        .content .heading-box {
            width: 94%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .content  {
            font-size: 2.5rem;
        }

        .content .heading-box button {
            background-color: #6883FB;
            color: #ffffff;
            width: 173px;
            height: 50px;
            font-family: 'NATS';
            font-style: normal;
            font-weight: 400;
            font-size: 1.6rem;
            border: none;
            border-radius: 10px;
            letter-spacing: 2px;
        }

        .content .heading-box button a {
            color: #FFFFFF;
            text-decoration: none;
        }
        .content .heading-box h1 {
            font-size: 40px;
        font-weight: 400;
        
        margin-left: -13px;
        }

        #addDocumentPopup.active {
            display: flex;
        }

        #addDocumentPopup {
            position:fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #FFFFFF;
            height: 200px;
            width: 350px;
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.25);
            border-radius: 20px;
            z-index:999;
        }

        #addDocumentPopup h2 {
            font-size: 2rem;
        }

        #addDocumentPopup button#fileUpload {
            border: 1px solid #6883FB;
            background-color: #FFFFFF;
            height: 42px;
            width: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            -ms-border-radius: 10px;
            -o-border-radius: 10px;
        }

        #addDocumentPopup button#fileUpload span {
            margin-right: 15px;
        }

        #addDocumentPopup .option-box {
            display: flex;
            justify-content: space-evenly;
            width: 80%;
        }
        #addDocumentPopup .option-box button {
            height: 42px;
            width: 115px;
            font-size: 1.3rem;
            border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            -ms-border-radius: 10px;
            -o-border-radius: 10px;
        }

        #addDocumentPopup .option-box #cancel {
            background-color: #FFFFFF;
            border: 1px solid #6883FB;
        }

        #addDocumentPopup .option-box #save {
            background-color: #6883FB;
            border: 1px solid #FFFFFF;
            color: #FFFFFF;
        }

        .content .health-form-container {
            width: 95%;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .content .health-form-container .title-options-container {
            position: relative;
            width: 550px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0px;
            margin-bottom: 50px;
        }

        .content .health-form-container .title-options-container .border-bottom {
            position: absolute;
            background-color: #1FB688;
            height: 4px;
            width: 200px;
            transition: all 0.3s ease;
        }

        .content .health-form-container .title-options-container .border-bottom.left {
            transform: translateY(20px);
            -webkit-transform: translateY(20px);
            -moz-transform: translateY(20px);
            -ms-transform: translateY(20px);
            -o-transform: translateY(20px);
        }

        .content .health-form-container .title-options-container .border-bottom.right {
            transform: translate(300px, 20px);
            width: 250px;
            -webkit-transform: translate(300px, 20px);
            -moz-transform: translate(300px, 20px);
            -ms-transform: translate(300px, 20px);
            -o-transform: translate(300px, 20px);
        }

        .content .health-form-container .title-options-container h3 {
            font-size: 1.7rem;
            cursor: pointer;
        }

        .content .health-form-container #form-details,
        .content .health-form-container #form-documents {
            position: relative;
            overflow-y: scroll;
            height: 400px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            display: none;
        }

        /* width */
        .content .health-form-container #form-details::-webkit-scrollbar,
        .content .health-form-container #form-documents::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        .content .health-form-container #form-details::-webkit-scrollbar-track,
        .content .health-form-container #form-documents::-webkit-scrollbar-track {
            background-color: #F3F3F3;
            border-radius: 20px;
        }

        /* Handle */
        .content .health-form-container #form-details::-webkit-scrollbar-thumb,
        .content .health-form-container #form-documents::-webkit-scrollbar-thumb {
        border-radius: 20px;
        }

        /* Handle on hover */
        .content .health-form-container #form-details::-webkit-scrollbar-thumb:hover,
        .content .health-form-container #form-documents::-webkit-scrollbar-thumb:hover {
            background: #E3E3E3;
            border-radius: 20px;
        }

        .content .health-form-container #form-details .details {
            height: 115px;
            width: 85%;
            padding: 3px 33px;
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            background: #FFFFFF;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
            border-radius: 15px;
            margin-bottom: 19px;
            -webkit-border-radius: 15px;
            -moz-border-radius: 15px;
            -ms-border-radius: 15px;
            -o-border-radius: 15px;
        }

        .content .health-form-container #form-details .details p {
            position: relative;
        }

        .content .health-form-container #form-details .details p#question {
            font-size: 1.5rem;
            font-weight: 500;
        }

        .content .health-form-container #form-details .details p#question::after {
            content: "";
            position: absolute;
            background-color: #808080;
            height: 1.5px;
            width: 100%;
            bottom: -9px;
            left: 0px;
        }

        .content .health-form-container #form-details .details p#answer {
            font-size: 1.3rem;
            font-weight: 500;
        }

        .content .health-form-container #form-documents .details {
            border: 1px solid #f2f2f2;
            height: 80px;
            width: 90%;
            padding: 15px 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #FFFFFF;
            border-radius: 15px;
            margin-bottom: 20px;
        }

        .content .health-form-container #form-documents .details .title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 260px;
        }

        .content .health-form-container #form-documents .details .title .info-box {
            width: 200px;
            margin-top: 12px;
        }

        .content .health-form-container #form-documents .details .title .info-box p {
            font-size: 1.5rem;
            font-weight: 500;
            line-height: 0px;
        }

        .content .health-form-container #form-documents .details .title .info-box .minor-details {
            color: #8D8D8D;
            display: flex;
            justify-content: space-between;
            font-size: 1.2rem;
            font-weight: 500;
        }

        .content .health-form-container #form-documents .details .options {
            display: flex;
            justify-content: space-between;
            width: 100px;
        }
        .share-popup.show {
            display: flex;
        }
        .share-popup {
            position:relative;
            background-color: #FFFFFF;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            height: 149px;
            width: 330px;
            box-shadow: 0px 2px 5px 0px rgb(0 0 0 / 25%);
            border-radius: 15px;
            padding-top:1.5rem;
        }
        .share-popup p{
            font-size: 1.4rem;
            text-align:center;
            display:flex;
            justify-content:space-between;
            padding-left:20px;
            padding-right:20px;
        }
        .share-popup p img{
            margin-left: 15px;
        }
        .share-popup .share-icon-container{
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            width: 100%;
        }
        .share-popup .share-icon-container .share-icon{
            cursor:pointer;
        }
        .modal{
                position: fixed;
                width:100%;
                height:100%;
                background: rgba(0, 0, 0, 0.6);
                transition: opacity 500ms;
                align-items:center;
        }
        .cont{
            display: flex;
            flex-direction: column;
        }
    @media screen and (max-width: 400px){
        .content .health-form-container .title-options-container{
            width:100px;
        }
        .content{
            overflow: auto;
        }
        .heading-box {
            margin-top: 70px;
            margin-left:60px;
        }
        .content .health-form-container #form-details .details {
           height: 120px;
        }
        .title-options-container{
            margin-left: 320px;
            margin-right: 250px;
        }
        .border-bottom.left{
            margin-top: 30px;
            margin-left: 10px;
        }
        .border-bottom.right{
            margin-left: -56px;
            margin-top: 30px;
        }
        .title-options-container h3{
            margin-left: 10px;
        }
        .heading-box h1{
            margin-top: 30px;
            width:auto;
        }
        #edit_btn{
            margin-top: 60px;
            margin-right:10px;
            width:300px;
        }
    }
    @media screen and (max-width: 720px){
       .content .health-form-container #form-documents .details {
            height: 200px;
            width:300px;
        }
        .form-documents {
            height: 500px;
            width:auto;
            margin-top: -30px;
        }
        .title{
            margin-top: -30px;
            margin-left: -20px;
        }
        .details .options{
            margin-top: 100px;
            margin-left:-300px;
        }
        .heading-box {
            margin-top: -70px;
            margin-left:60px;
            margin-right: 20px;
        }
        .content .health-form-container .title-options-container{
            width:350px;
        }
        .content .health-form-container .title-options-container .border-bottom{
            width:100px;
            margin-top: 10px;
        }
        .border-bottom.right{
            margin-left: -67px;
        }
       .title-options-container{
            margin-left: 320px;
            margin-right: 270px;
        }
       
        #healthDocument {
            font-size: 25px;
        }
        #healthFormDetails{
            font-size: 25px;
        }
        .content .health-form-container .title-options-container .border-bottom.right {
            transform: translate(220px, 20px);
            width: 100px;
            -webkit-transform: translate(220px, 20px);
            -moz-transform: translate(220px, 20px);
            -ms-transform: translate(220px, 20px);
            -o-transform: translate(220px, 20px);
        }
        .content .health-form-container .title-options-container h3 {
            font-size: 100%;
            
        }
                
    }
    @media screen and (min-width:720px) and (max-width: 780px){
        .content{
            overflow:hidden ;
        }
        .title-options-container{
            margin-right:230px;
            margin-left:300px;
        }
        #healthDocument {
            font-size: 25px;          
            margin-right: 100px;
        }
        #healthFormDetails{ 
            font-size: 25px;
            margin-left: 40px;
        }
        .border-bottom.left{
            margin-left: 30px;
            margin-top: 30px;
         }
        .border-bottom.right{
          
            margin-top: 30px;
            margin-left:-100px;
        }
    }
        </style>
</head>

<body>
   
    <div class="cont">
    <div id="addDocumentPopup">
        <h2>Add Document</h2>
        <button id="fileUpload"><span><svg width="17" height="17" viewBox="0 0 17 17" fill="none">
                    <path
                        d="M1.0625 11.3333H5.3125V17H11.6875V11.3333H15.9375L8.5 3.77778L1.0625 11.3333ZM17 1.88889L0 1.88889V0L17 0V1.88889Z"
                        fill="#9A5EF5" />
                </svg></span> Upload File</button>
        <div class="option-box">
            <button id="cancel">Cancel</button>
            <button id="save">Save</button>
        </div>
    </div> 


    <div class="content">
       
        <div class="heading-box">
            <h1>Health Details Form and Documents</h1>
            <button data-btn="edit" id="edit_btn">Edit</button>
        </div>

        <div class="health-form-container">
            <div class="title-options-container">
                <h3 id="healthFormDetails" onclick="formContent(1)">Health Details Form</h3>
                <h3 id="healthDocument" onclick="formContent(2)">Health Details Documents</h3>
                <div class="border-bottom left"></div>
            </div>

            <div id="form-details">

            <?php
            $sql = "SELECT * FROM client_forms_docs WHERE client_id = '$client_id' and dietitianuserID = '{$_SESSION['dietitianuserID']}'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc()['form_data'];
                $data = json_decode($data,true);
                if (is_array($data) && count($data)>0){
                    foreach($data as $que) { ?>
                    <div class="details">
                        <p id="question"><?php echo $que["que"]; ?></p>
                        <p id="answer"><?php echo $que["ans"]; ?></p>
                    </div>
                <?php } } 
            else{
                echo "<span class='text-center'>No Forms Found!</span>";
            }
        }else{
            echo "<span class='text-center'>No Forms Found!</span>";
        }
        ?>

            </div>

            <div id="form-documents">

                <?php
                $sql = "SELECT * FROM client_forms_docs WHERE client_id = '$client_id' and dietitianuserID = '{$_SESSION['dietitianuserID']}'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $data = $result->fetch_assoc()['docs'];
                    $data = json_decode($data,true);
                    if (is_array($data) && count($data)>0){
                        foreach($data as $doc) { 
                            ?>
                        <div class="details">
                            <div class="title">
                                <img src="<?=$DEFAULT_PATH?>assets/images/Pdf.svg" alt="PDF">
                                <div class="info-box">
                                    <p class="name"><?=$doc['docName']?></p>
                                    <div class="minor-details">
                                        <span><?=$doc['uploadedOn']?></span>
                                        <span><?=$doc['fileSize']?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="options">
                                <a href="<?=$DEFAULT_PATH."uploads/document/".$doc['fileLink']?>"  download ><img src="<?=$DEFAULT_PATH?>assets/images/Download.svg" alt="Download" title="Download"></a>
                                <button id="popup_btn" style="background-color:white;border:none"><img src="<?=$DEFAULT_PATH?>assets/images/Share_Black.svg" alt="Share" title="Share" class="shareBtn"></button>
                                <img src="<?=$DEFAULT_PATH?>assets/images/Delete2.svg" alt="Delete" title="Delete">
                            </div>
                        </div>
                <?php
                }}else{
                    echo "<span class='text-center'>No Documents Found!</span>";
                }}
                else{
                    echo "<span class='text-center'>No Documents Found!</span>";
                }

                ?>
                <div id="myModal" class="modal">
                <div class="share-popup " >
                    <p><span>Share via <img src="<?=$DEFAULT_PATH?>assets/images/Share.svg" alt="Share" title="Share"></span> <span class="close" style="font-size:30px;cursor:pointer">&times;</span></p>
                    <div class="share-icon-container">
                        <div class="share-icon"><img src="<?=$DEFAULT_PATH?>assets/images/WhatsApp.svg" alt="whatsapp"></div>
                        <div class="share-icon"><img src="<?=$DEFAULT_PATH?>assets/images/Twitter.svg" alt="twitter"></div>
                        <div class="share-icon"><img src="<?=$DEFAULT_PATH?>assets/images/Facebook.svg" alt="facebook"></div>
                        <div class="share-icon"><img src="<?=$DEFAULT_PATH?>assets/images/LinkedIn_Circled.svg" alt="linkedin"></div>
                        <div class="share-icon"><img src="<?=$DEFAULT_PATH?>assets/images/Instagram.svg" alt="instagram"></div>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <script>
              
                    var modal = document.getElementById("myModal");
                    var button = document.getElementById("popup_btn");
                    var span = document.getElementsByClassName("close")[0];
                    button.onclick = function() {
                        
                        modal.style.display = "block";
                    }
                    span.onclick = function() {
                        modal.style.display = "none";
                    }
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                    </script>

    <script>
        const formDetails = document.querySelector("#form-details");
        const formDocuments = document.querySelector("#form-documents");
        const borderBottom = document.querySelector(".border-bottom");
        const editbtn = document.querySelector("#edit_btn");
        const btn = document.querySelector("[data-btn");
        let popup = document.querySelector("#addDocumentPopup");
        let shareBtn = document.querySelectorAll(".shareBtn");
        let sharePopup = document.querySelector("#sharePopup");
        <?php
        
        if (isset($_GET['form'])) {
            ?>
            formDetails.style.display = "flex";
            formDocuments.style.display = "none";
            borderBottom.classList.add("left");
            borderBottom.classList.remove("right");
            <?php
        } 
        if (isset($_GET['document'])) {
            ?>
            formDetails.style.display = "none";
            formDocuments.style.display = "flex";
            borderBottom.classList.add("right");
            borderBottom.classList.remove("left");

        <?php
        }
        ?>

        function formContent(content) {
            if (content === 1) {
                //For Border-Bottom Animation
                borderBottom.classList.add("left");
                borderBottom.classList.remove("right");

                //For showing the content
                formDetails.style.display = "flex";
                formDocuments.style.display = "none";

                //For showing The btn According to Content
                btn.innerHTML = "Edit";
                btn.setAttribute("data-btn", "edit");
                btn.addEventListener("click", () => {
            // document.location.href = 'health_detail_form_create.php';
        });
                
            } else if (content === 2) {
                //For Border-Bottom Animation
                borderBottom.classList.add("right");
                borderBottom.classList.remove("left");

                //For showing the content
                formDetails.style.display = "none";
                formDocuments.style.display = "flex";

                //For showing The btn According to Content
                btn.innerHTML = "Add";
                btn.setAttribute("data-btn", "add");

                if (btn.getAttribute("data-btn") === "add") {

                    btn.addEventListener("click", () => {
                        popup.classList.toggle("active");

                        if (popup.classList.contains("active")) {

                            popup.addEventListener("click", () => {
                                popup.classList.remove("active");
                            });
                        }
                    });
                }
            }

            console.log(`================== ${content} ======================`);
        }

    </script>
 <?php require('constant/scripts.php'); ?>
</body>

</html>