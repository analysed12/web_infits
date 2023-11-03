<?php
if (isset($_POST['clientUserId'])) {
    header('Content-Type: application/json');
    include 'constant/config.php';
    $query = "SELECT * FROM client WHERE clientuserID = '{$_POST['clientUserId']}'";
    $query1 = "SELECT * FROM addclient WHERE clientuserID = '{$_POST['clientUserId']}'";
    $result = $conn->query($query);
    $result1 = $conn->query($query1);
    $client = $result->fetch_assoc();
    $client1 = $result1->fetch_assoc();
    $responsee = json_encode($client1);
    if (isset($_POST['dietitianUserId'])) {
        echo json_encode($client1);
    } else {
        echo json_encode($client);
    }
    exit;
}
include 'navbar.php';
if (isset($_SESSION['dietitianuserID'])) {
    $id = $_SESSION['dietitian_id'];
    $userid = $_SESSION['dietitianuserID'];
    $sql = "SELECT * FROM dietitian WHERE dietitianuserID = '$userid'";
    global $conn;
    $result = $conn->query($sql);
    
    $verification = $result->fetch_assoc()['verification_code'];
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        global $conn;
        // print_r($_POST); exit;
        $clientuserID = $_POST['clientuserID'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $height = $_POST['height'];
        $age = $_POST['age'];
        $about = $_POST['about'];
        $weight = $_POST['weight'];
        $plan = "-1";
        $location = $_POST['location'];

        $sql = "INSERT INTO `addclient`(`dietitian_id`, `dietitianuserID`, `clientuserID`, `profile`, `p_p`, `name`, `gender`, `email`, `phone`, `age`, `height`, `weight`, `about`, `plan_id`, `status`, `client_code`, `location`) VALUES ('$id','$userid','$clientuserID','','','$name','$gender','$email','$mobile','$age','$height','$weight','$about','$plan','1','','$location')";

        mysqli_query($conn, $sql);

        $sql2 = "SELECT client_id FROM addclient WHERE clientuserID = '$clientuserID'";
        $result = mysqli_query($conn, $sql2);

        $client_id = mysqli_fetch_assoc($result)['client_id'];
        $sql3 = "UPDATE `client` SET `client_id`='$client_id',`plan`='',`dietitianuserID`='$userid',`dietitian_id`='{$_SESSION['dietitian_id']}',`verification`='1' WHERE `clientuserID`='$clientuserID'";
        // echo $sql3;
        mysqli_query($conn, $sql3);

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client</title>
    <?php require('constant/head.php'); ?>

</head>
<style>
body {
    overflow-x: hidden;
}

::placeholder {
    /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: #BBBBBB;
    opacity: 1;
    /* Firefox */
    padding: 5px;
}

#main {
    font-family: 'NATS';
    font-weight: 400;
    font-style: normal;
    /* padding-left: 4rem; */
    padding-top: 1rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;


}
.row{
     --bs-gutter-x: 0 !important;
}

.text {
    position: absolute;
    bottom: -150px;
    display: flex;

    font-weight: 500;
}

.searchbar {
    display: flex;
    align-items: center;
    padding-left: 1rem;
    width: 349px;
    background: #FFFFFF;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
}

.col {
    padding: 0;
}

.title-bar {
    display: flex;
    justify-content: space-between;
    padding: 0 60px;
}

.heading {
    font-size: 48px;
}

.tabs-title {
    margin: 20px 0;
}

.client-card-container {
    padding: 40px 0;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    
    gap: 20px;
}

.client-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    /* gap: 14rem; */
}

.bartab {
    padding-bottom: 0.5rem;
    /* color:black; */
}

.bartab:hover {
    border-bottom: 3.59764px solid #9E5EF4;

}

.tabActive {
    border-bottom: 3.59764px solid #9E5EF4 !important;
}

.bartab:focus {
    border-bottom: 3.59764px solid #9E5EF4 !important;
}

.ccard-left {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 30px;
}

img.profile {
    width: 56px;
    height: 56px;
    border-radius: 100px;
}

span.client-name {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 27px;
    line-height: 88%;
    color: #000000;
    width: 161px;
    text-align: center;
}

button.btn {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 20px;
    line-height: 42px;
    color: #9E5EF4;

}

.ccard-right {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
}

span.date {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 20px;
    line-height: 42px;
    color: #CACACA;
}

span.time {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 20px;
    line-height: 42px;
    color: #CACACA;
}

.verified-client {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

.verified-client span {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 27px;
    line-height: 57px;
    color: #96C362;
}

.pending-client {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

.pending-client span {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 27px;
    line-height: 57px;
    color: #FF0000;
}

@media (min-width:992px) {
    .gap-lg-6 {
        gap: 10rem !important;
    }
}

.code-box {
    background: #FFFFFF;
    box-shadow: 0px 2.48366px 6.20915px rgba(0, 0, 0, 0.25);
    border-radius: 18.6275px;
    width: 347px;
    height: 263px;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    gap: 15px;
    padding-top: 25px;
}

.code-box h4 {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 30px;
    line-height: 88%;
    /* identical to box height, or 22px */
    display: flex;
    align-items: center;
    text-align: center;
    color: #000000;
}

.code-box .vcode {
    width: 238px;
    height: 63px;
    background: #4B9AFB;
    border: 1.24183px solid #4B9AFB;
    border-radius: 15px;
    justify-content: center;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 25px;
    line-height: 88%;
    /* or 22px */
    display: flex;
    align-items: center;
    text-align: center;
    color: #FFFFFF;
}



.code-box p {
    width: 238px;
    height: 45px;
    background: #FFFFFF;
    border: 1px solid #9E5EF4;
    border-radius: 10px;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 18px;
    line-height: 38px;
    display: flex;
    align-items: center;
    color: #9E5EF4;
    display: flex;
    justify-content: center;
    animation: c;
}

.dietitian-code {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100%;
    gap: 50px;
    position: relative;
}

.text-box {
    max-width: 80%;
}

.text {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    display: flex;
    align-items: center;
    color: #000000;
}

.text-box .text h3 {
    font-size: 24.8366px;
    line-height: 144%;
    color: #000000;
}

.tab,
.share-btn {
    cursor: pointer;
}

.tab-content {
    display: none;
}

.share-pop {
    width: 404.99px;
    height: 169.57px;
    background: #FFFFFF;
    box-shadow: 0px 0px 30.7014px rgba(0, 0, 0, 0.25);
    border-radius: 23.026px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 15px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.profilepopup {
    width: 804.99px;
    padding: 25px;
    background: #FFFFFF;
    box-shadow: 0px 0px 30.7014px rgba(0, 0, 0, 0.25);
    border-radius: 23.026px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 15px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.socials {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

.share-pop h4.title {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 27.9689px;
    color: #000000;
}

.popup1 {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.6);
    transition: opacity 500ms;


}

.popup2 {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.6);
    transition: opacity 500ms;


}

.inputrow {
    display: flex;
    gap: 2rem;
    justify-content: center;
}

.inputbar1 {
    width: 294.98px;
    height: 45.8px;
    background: #FFFFFF;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    border: none;
}

.close {
    position: absolute;
    transition: all 200ms;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
    background: none;
    border: none;
}

.close:hover {
    color: #06D85F;
}

@media screen and (max-width: 500px) {
   
    .code-box{
        width:300px;
    }
    .title-bar{
        display: flex;
    justify-content: space-between;
    padding: 0 5%;
    flex-direction: column;
}
    
}
@media screen and (max-width: 1000px){
    .img111{
        display:none;
    }
    .img112{
        display:none;
    }


}
@media screen and (max-width: 720px) {
    span .client-name {
        font-size: 20px !important;
        width: 130px !important;
    }
    #flexchange {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .img111 {
        display: none;
    }

    .img112 {
        display: none;
    }

    .searchbar {
        width: auto;
        height: 35px;

    }

    .tabsss {
        margin-left: 2rem;
    }

    

    .profilepopup {
        width: auto;
    }

    .inputbar1 {
        width: auto;
    }

    .tab-content {
        margin-left: 1.5rem;

    }

    .tab-content {
        margin-left: 1rem;

    }

    .gap-lg-6 {
        gap: 1rem !important;
    }

    .gap-lg-5 {
        gap: 1rem !important;
    }

}

@media screen and (max-width:932px) {
    .tab-content {
        margin-left: 1rem;

    }

    .gap-lg-6 {
        gap: 1rem !important;
    }

    .gap-lg-5 {
        gap: 1rem !important;
    }
}

@media screen and (max-width:1100px) {
    .tab-content {
        margin-left: 1rem;

    }

    .gap-lg-6 {
        gap: 0.5rem !important;
    }

    .gap-lg-5 {
        gap: 0.5rem !important;
    }
}
</style>

<body>
    <div id="main">

        <div class="row mt-3">
            <div class="col">
                <div class="title-bar">
                    <div class="heading">
                        <h1 style="font-size:40px">Add Client</h1>
                    </div>
                    <div class="searchbar">
                        <img src="<?= $DEFAULT_PATH ?>assets/images/vec_search.svg" style="margin-right:1rem">
                        <input type="text" style="border:none;width:70%" placeholder="Search Clients">
                    </div>
                </div>
            </div>
        </div>
        <div class="row tabs-title mt-3 mb-3 tabsss" style="margin-top:2rem !important">
            <div id="verification" class="col-4 tab" tab="vcode">
                <h3 class="text-center  bartab  tabActive">Verification Code</h3>
            </div>
            <div id="verified" class="col-4 tab" tab="vclients">
                <h3 class="text-center  bartab">Verified Clients</h3>
            </div>
            <div id="pending" class="col-4 tab" tab="pclients">
                <h3 class="text-center  bartab">Pending Verification</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <!----------verified clients-------------------->
                <div id='vclients' class='tab-content  client-card-container'>
                    <?php
                    $sql = "SELECT * FROM addclient WHERE dietitianuserID='$userid'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <div id="flexchange" class="client-card gap-1 gap-md-3 gap-lg-6 ">
                                <div class="ccard-left gap-md-2 gap-lg-5">
                                    <img class="profile" src="<?= $DEFAULT_PATH ?>assets/images/client1.svg" alt="">
                                    <span class="client-name">
                                        <?php echo $row['name'] ?>
                                    </span>
                                    <button data-client-username="<?= $row['clientuserID'] ?>"
                                        data-client-dietitian="<?= $row['dietitianuserID'] ?>" type="button"
                                        class="btn btn_verified">Profile</button>
                                </div>
                                <div class="ccard-right gap-md-2 gap-lg-5">
                                    <span class="date">
                                        <?php echo $row['last_seen'] ?>
                                    </span>
                                    <div class="verified-client">
                                        <span>Verified!</span>
                                        <img src="<?= $DEFAULT_PATH ?>assets/images/Approval.svg" alt="">
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }else{ ?>
                        <div id="flexchange" class="client-card gap-1 gap-md-3 gap-lg-6 ">
                            <h2>No Verified Client Found</h2>
                        </div>
                     <?php }
                    ?>
                </div>
            


                <!--------------pending verification---------------->
                <div id='pclients' class='tab-content client-card-container'>
                    <?php
                    $sql = "SELECT * FROM client WHERE verification_code='$verification' and dietitianuserID!='$userid'";
                       print_r($sql);  
                    $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <div id='flexchange' class='client-card gap-1 gap-md-3 gap-lg-6'>
                                    <div class='ccard-left gap-md-2 gap-lg-5'>
                                        <img class='profile' src='<?= $DEFAULT_PATH ?>assets/images/client1.svg' alt=''>
                                        <span class='client-name'>
                                            <?php echo $row['name'] ?>
                                        </span>
                                        <button data-client-username="<?= $row['clientuserID'] ?>" type='button'
                                            class='btn btn_pending'>Profile</button>
                                    </div>
                                    <div class='ccard-right gap-md-2 gap-lg-5'>
                                        <span class='date'>
                                            <?php echo $row['last_seen'] ?>
                                        </span>
                                        <div class='pending-client'>
                                            <span>pending!</span>
                                            <img src='<?= $DEFAULT_PATH ?>assets/images/pending-client.svg' alt=''>
                                        </div>
                                    </div>

                                                                    </div>
                    <?php
                        }
                    }else{ ?>
                        <div id="flexchange" class="client-card gap-1 gap-md-3 gap-lg-6 ">
                            <h2>No Pending Client Found</h2>
                        </div>
                     <?php }
                    ?>
                </div>



            <!----------verification code-------------------->


                <div id="vcode" class="dietitian-code tab-content ">
                    <div style="display: flex;justify-content: center">
                        <img class="img112" src="<?= $DEFAULT_PATH ?>assets/images/lilac user icon.svg"
                            style="width:20%; right:15%;position: absolute">
                        <div class="code-container">
                            <div class="code-box">
                                <h4>Your Verification Code</h4>
                                <p class="vcode">
                                    <?php echo $verification; ?>
                                </p>
                                <p class="share-btn" style="display:flex;gap:1rem"> <img
                                        src="<?= $DEFAULT_PATH ?>assets/images/shareeee.svg" alt="">Share
                                    Verification Code</p>
                            </div>
                        </div>
                        <img class="img111" src="<?= $DEFAULT_PATH ?>assets/images/lilac user icon (1).svg"
                            style="width:18%;position:absolute;left:18%;bottom:10%">
                    </div>
                    <div class="vcode_footer" style="display:flex;gap:1rem;margin-top:3rem">
                        <div><img src="<?= $DEFAULT_PATH ?>assets/images/vec_active_help.svg"></div>
                        <div>
                            <p style="font-size: 20px;">This verification code will help you connect with the clients. You
                                can share the code with your clients so that
                                they can verify the code and succesfully connect with you!</p>
                        </div>
                    </div>

                </div>
            </div>

            <!----------SHARE POPUP-------------------->
            <div class="popup1" id="popup1" style="display:none">
                <div class="share-pop">
                    <h4 style="text-align: center;" class="title">Share Via</h4>
                    <a class="close" href="add_client.php" style="top:15%;right:7%">&times;</a>
                    <div class="socials">
                        <a href="whatsapp://send?text=<?php echo $verification; ?>" data-action="share/whatsapp/share"><img src="<?= $DEFAULT_PATH ?>assets/images/WhatsApp.svg" alt=""></a>
                        
                        <!-- Twitter Share Button -->
<a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=<?php echo urlencode($verification); ?>">
    <img src="<?= $DEFAULT_PATH ?>assets/images/twitter.svg">
</a>

   <a href="#" onclick="shareOnFacebook()">
                <img src="<?= $DEFAULT_PATH ?>assets/images/facebook.svg" alt="Share on Facebook">
            </a>




   <a href="https://www.linkedin.com/messaging/compose/?body=<?php echo urlencode($verification); ?>" target="_blank">
    <img src="<?= $DEFAULT_PATH ?>assets/images/LinkedIn-Circled.svg" alt="Send on LinkedIn">
</a>



                <a href="#" onclick="shareOnInstagram()">
                <img src="<?= $DEFAULT_PATH ?>assets/images/Instagram.svg">
            </a>
        </div>
    </div>
</div>

<script>
    function copyVerificationCodeToClipboard() {
        var verificationCode = "<?php echo $verification; ?>";
        var tempInput = document.createElement("input");
        document.body.appendChild(tempInput);
        tempInput.value = verificationCode;
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
    }

    function shareOnFacebook() {
        copyVerificationCodeToClipboard();
        var message = "Verification code copied!";
        alert(message); // Display an alert message
        openFacebookWithMessage();
    }

    function openFacebookWithMessage() {
        var facebookURL = "https://www.facebook.com/messages/t/Tanishq Negi";
        window.open(facebookURL, "_blank");
    }

    function shareOnInstagram() {
        copyVerificationCodeToClipboard();
        var message = "Verification code copied!";
        alert(message); // Display an alert message
        openInstagramWithMessage();
    }

    function openInstagramWithMessage() {
        var verificationCode = "<?php echo $verification; ?>";
        var instagramURL = "https://www.instagram.com/direct/t/recipient_username?text=" + encodeURIComponent(verificationCode);
        window.open(instagramURL, "_blank");
    }
</script>

                    </div>
                </div>
            </div>
            <!----------profile POPUP for verified clients and pending verification-------------------->

            <!-- pending profile -->
            <div class="pendingPopup" id="popupPending">
                <div class="pendingPopForm">
                </div>
            </div>
            <div class="verifiedPopup" id="popupVerified">
                <div class="verifiedPopForm">
                </div>
            </div>

            <?php require('constant/scripts.php'); ?>
            <script>
            const tab = document.querySelectorAll('.tab');
            tab.forEach(el => {
                el.addEventListener('click', function() {
                    const id = el.getAttribute('tab');
                    document.querySelectorAll('.tab-content').forEach(element => {
                        element.style.display = 'none';
                        // element.classList.add("active");
                    });
                    document.getElementById(id).style.display = 'flex';

                })
            });
            tab[0].click();
            const allBars = document.querySelectorAll('.bartab');
            allBars.forEach(element => {
                element.addEventListener('click',function(){
                    allBars.forEach(el=>{
                        el.classList.remove('tabActive');
                    });
                    this.classList.add('tabActive');
                })
            });
            const shareBtn = document.querySelector('.share-btn');
            shareBtn.addEventListener('click', () => {
                document.querySelector('.popup1').classList.toggle('d-flex');
            })

            var verifiedBtn = document.querySelectorAll('.btn_verified');
            var pendingBtn = document.querySelectorAll('.btn_pending');

            pendingBtn.forEach(pBtn => {
                pBtn.addEventListener('click', function() {
                    const pendingPopDiv = document.querySelector('.pendingPopForm');
                    const clientUserId = this.getAttribute('data-client-username');
                    $.ajax({
                        type: 'POST',
                        url: 'add_client.php',
                        data: {
                            clientUserId
                        },
                        success: function(resp) {
                            pendingPopDiv.innerHTML = "";
                            pendingPopDiv.innerHTML = `
                            <form method="post" action="">
                                <input hidden name="clientuserID" value="${resp.clientuserID}" >
                                <input hidden name="name" value="${resp.name}" >
                                <div class="profilepopup">
                                    <div class="profilehead"
                                        style="display:flex;gap:1.5rem;justify-content:center;align-items:center">
                                        <img src="<?= $DEFAULT_PATH ?>assets/images/ronalduser.svg" style="width:25%">
                                        <p style="font-size:27px;display:flex;font-weight:500">
                                        ${resp.name}
                                        </p>
                                        <span onclick="closePopForm('${resp.clientuserID}')"  class="close popClose"
                                            style="top:5%;right:7%;cursor:pointer">&times;</span>
                                    </div>

                                    <div class="inputrow">
                                        <div>
                                            <p>Email</p>
                                            <input type="text" class="inputbar1" name="email" value="${resp.email}">
                                        </div>
                                        <div>
                                            <p>Phone No</p>
                                            <input type="text" class="inputbar1" name="mobile"
                                                value="${resp.mobile}">
                                        </div>
                                    </div>
                                    <div class="inputrow">
                                        <div>
                                            <p>Gender</p>
                                            <input type="text" class="inputbar1" name="gender"
                                                value="${resp.gender}">
                                        </div>
                                        <div>
                                            <p>Height</p>
                                            <input type="text" class="inputbar1" name="height"
                                                value="${resp.height}">
                                        </div>
                                    </div>
                                    <div class="inputrow">
                                        <div>
                                            <p>Age</p>
                                            <input type="text" class="inputbar1" name="age" value="${resp.age}">
                                        </div>
                                        <div>
                                            <p>About</p>
                                            <input type="text" class="inputbar1" name="about" value="${resp.email}">
                                        </div>
                                    </div>

                                    <div class="inputrow">
                                        <div>
                                            <p>Weight</p>
                                            <input type="text" class="inputbar1" name="weight"
                                                value="${resp.weight}">
                                        </div>
                                        <div>
                                            <p>Duration</p>
                                            <input type="text" class="inputbar1" name="duration"
                                                value="${resp.email}">
                                        </div>
                                    </div>

                                    <div class="inputrow">
                                        <div>
                                            <p>Plan</p>
                                            <input type="text" class="inputbar1" name="plan" value="${resp.plan}">
                                        </div>
                                        <div>
                                            <p>Location</p>
                                            <input type="text" class="inputbar1" name="location"
                                                value="${resp.location}">
                                        </div>
                                    </div>
                                    <button type="submit" name="verified"
                                    style="border:none; background-color: #4B9AFB; paddding: 20px; width: 6rem; height: 2.5rem; border-radius: 5px;color: white;font-size: 20px;">Verify</button>
                                    <button type="submit" name="Decline" class="bg-warning"
                                        style="border:none;  paddding: 20px; width: 6rem; height: 2.5rem; border-radius: 5px;color: white;font-size: 20px;">Decline</button>
                                </div>
                                </div>

                            </form>
                            `;
                            pendingPopDiv.setAttribute('id', resp.clientuserID);
                            pendingPopDiv.style.display = 'block';
                        }
                    })
                });
            })

            verifiedBtn.forEach(vBtn => {
                vBtn.addEventListener('click', function() {
                    console.log(this);
                    const verifiedPopDiv = document.querySelector('.verifiedPopForm');
                    const clientUserId = this.getAttribute('data-client-username');
                    const dietitianUserId = this.getAttribute('data-client-dietitian');
                    $.ajax({
                        type: 'POST',
                        url: 'add_client.php',
                        data: {
                            clientUserId,
                            dietitianUserId
                        },
                        success: function(resp) {
                            console.log(resp);
                            verifiedPopDiv.innerHTML = "";
                            verifiedPopDiv.innerHTML = `
                            <form method="post" action="">
                                <input hidden name="clientuserID" value="${resp.clientuserID}" >
                                <input hidden name="name" value="${resp.name}" >
                                <div class="profilepopup">
                                    <div class="profilehead"
                                        style="display:flex;gap:1.5rem;justify-content:center;align-items:center">
                                        <img src="<?= $DEFAULT_PATH ?>assets/images/ronalduser.svg" style="width:25%">
                                        <p style="font-size:27px;display:flex;font-weight:500">
                                        ${resp.name}
                                        </p>
                                        <span onclick="closePopForm('${resp.clientuserID}')"  class="close popClose"
                                            style="top:5%;right:7%;cursor:pointer">&times;</span>
                                    </div>

                                    <div class="inputrow">
                                        <div>
                                            <p>Email</p>
                                            <input type="text" class="inputbar1" name="email" value="${resp.email}">
                                        </div>
                                        <div>
                                            <p>Phone No</p>
                                            <input type="text" class="inputbar1" name="mobile"
                                                value="${resp.phone}">
                                        </div>
                                    </div>
                                    <div class="inputrow">
                                        <div>
                                            <p>Gender</p>
                                            <input type="text" class="inputbar1" name="gender"
                                                value="${resp.gender}">
                                        </div>
                                        <div>
                                            <p>Height</p>
                                            <input type="text" class="inputbar1" name="height"
                                                value="${resp.height}">
                                        </div>
                                    </div>
                                    <div class="inputrow">
                                        <div>
                                            <p>Age</p>
                                            <input type="text" class="inputbar1" name="age" value="${resp.age}">
                                        </div>
                                        <div>
                                            <p>About</p>
                                            <input type="text" class="inputbar1" name="about" value="${resp.about}">
                                        </div>
                                    </div>

                                    <div class="inputrow">
                                        <div>
                                            <p>Weight</p>
                                            <input type="text" class="inputbar1" name="weight"
                                                value="${resp.weight}">
                                        </div>
                                        <div>
                                            <p>Duration</p>
                                            <input type="text" class="inputbar1" name="duration"
                                                value="${resp.email}">
                                        </div>
                                    </div>

                                    <div class="inputrow">
                                        <div>
                                            <p>Plan</p>
                                            <input type="text" class="inputbar1" name="plan" value="${resp.plan_id}">
                                        </div>
                                        <div>
                                            <p>Location</p>
                                            <input type="text" class="inputbar1" name="location"
                                                value="${resp.location}">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            `;
                            verifiedPopDiv.setAttribute('id', resp.clientuserID);
                            verifiedPopDiv.style.display = 'block';
                        }
                    })
                });
            })

            function closePopForm(popId) {
                document.getElementById(popId).style.display = 'none';
            }
            
            </script>
</body>

</html>
