<?php
        include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFITS</title>
    <?php require('constant/head.php');?>

</head>
<style>
     body {
        font-family: 'NATS', sans-serif !important;
        font-weight: 400;
            
        }
        ::placeholder {
            color: #AEAEAE;
            padding:10px;
        }
    .maincontainer{
        display:flex;
        flex-direction: column;
        padding-top: 2rem;
        padding-left:2.5rem;
        padding-right:4rem;
    }
    .maincontainer_wrapper{
        display: flex;
        justify-content: space-between;
        font-size: 25px;
        
    }
    
     .input_field{
        width:342px;
        height: 48px;
        background: #FFFFFF;
        box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        border:none;
        padding: 10px;
        color: #AEAEAE;

    }
    .gender{
        width: 157px;
        height: 48px;
        background: #FFFFFF;
        box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        border:none;
        padding: 10px;
        color: #AEAEAE;

    }
    .editbutton{
width: 342px;
height: 48px;
background: #0177FD;
border-radius: 10px;
color:white;
border:none;
font-size: 29px;
display:flex;
justify-content: center;
align-items: center;
text-decoration: none;
margin-top: 3rem;
    }
    .sharebutton{
        width: 342px;
height: 48px;
border-radius: 10px;
font-size: 29px;
background: #FFFFFF;
border: 2px solid #0177FD;
display:flex;
justify-content: center;
align-items: center;
text-decoration: none;
margin-top: 3rem;
color: #0177FD;

    }
    .footer{
        display:flex;
        gap:14.5%;

    }
       
.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.6);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
    
  margin: 290px ;
  margin-left:550px;
  padding: 20px;
  background: #fff;
  box-shadow: 0px 0px 34.0377px rgba(0, 0, 0, 0.25);
border-radius: 25.5283px;
  width: 400px;
  position: relative;
  transition: all 5s ease-in-out;
  
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
 
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
  background:none;
  border:none;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

       
    @media screen and (max-width: 350px){
        .gender{
        width:100px !important;
    }
    }
    @media screen and (max-width: 1200px){
        .popup {
            margin-left:10% !important;
            margin-right:10% !important;
            width:auto
        }

    }
    @media screen and (max-width: 1200px){
        .input_field{
        width:auto !important;
    }
    .editbutton{
        width:auto !important;  
    }
    .sharebutton{
        width:auto !important;  
    }
    .footer{
        display:flex;
        flex-direction: column;
        justify-content: center;
        gap:0rem;

    }
    .maincontainer{
        padding-right: 2rem;
    }
    

    @media screen and (max-width: 1120px){
        .maincontainer_wrapper{
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap:1rem;
    }

    }

    }
</style>
<body>
    <div class="maincontainer">
    <h1 style="font-size:40px;fontweight:400;padding-bottom:1rem">Profile Settings</h1>
        <div class="maincontainer_wrapper">
            <div class="leftside" style="display:flex;flex-direction:column;gap:1rem">
            
            <span style="display:flex;flex-direction:column">
                        User ID <input type="text" class="input_field" placeholder="XXXXX">
            </span>
            <span style="display:flex;flex-direction:column">
                    Name <input type="text" class="input_field" placeholder="XXXXX">
                </span>
                <span style="display:flex;flex-direction:column">
                    Email <input type="text" class="input_field" placeholder="XXXXX">
                </span>
                <span style="display:flex;flex-direction:column">
                    Mobile No <input type="text" class="input_field" placeholder="XXXXX">
                </span>
                <span style="display:flex;flex-direction:column">
                    Qualification <input type="text" class="input_field" placeholder="XXXXX">
                </span>
                <span style="display:flex;flex-direction:column" >
                    Password 
                    <span style="display:flex;align-items:center;justify-content:space-between " class="input_field"><input type="text"  id="password" placeholder="XXXXX" style="border:none;">
                    <img style="cursor: pointer"
                                src="<?=$DEFAULT_PATH?>assets/images/eye.svg" id="eyeicon" alt="eye"></span>
                </span>
               
                 
                

            </div>

            <div class="middle" style="display:flex;flex-direction:column;gap:1rem">
            <span style="display:flex;flex-direction:column">
                    Username <input type="text" class="input_field" placeholder="XXXXX">
                </span>

                <span style="display:flex;flex-direction:column">
                    Location <input type="text" class="input_field" placeholder="XXXXX">
                </span>


                <span style="display:flex;gap:1.5rem">
                <span style="display:flex;flex-direction:column">
                    Gender <input type="text"  placeholder="XXXXX" class="gender">
                </span>
                <span style="display:flex;flex-direction:column">
                    Age <input type="text"  placeholder="XXXXX" class="gender">
                </span>

                </span>

                <span style="display:flex;flex-direction:column">
                    Experience <input type="text" class="input_field" placeholder="XXXXX">
                </span>
                <span style="display:flex;flex-direction:column">
                    Refferal Code <input type="text" class="input_field" placeholder="XXXXX">
                </span>
                <span style="display:flex;flex-direction:column">
                    Acheivements and Certificates <input type="text" class="input_field" placeholder="XXXXX">
                </span>

            </div>


            <div class="rightside" style="display:flex;flex-direction:column;justify-content:center;align-items:center;gap:2rem">
            <div>   
            <img src="<?=$DEFAULT_PATH?>assets/images/Profile_dp.svg" style="border-radius:25px;" />
                <div style="display:flex;align-items:center;justify-content:center;gap:0.5rem;padding-top:1rem;" >
                    <img src="<?=$DEFAULT_PATH?>assets/images/Star.svg" style="background:none">
                    <h3 style="font-size:25px;padding-top:0.5rem">4.8</h3>
            </div>
            </div>
            <div style="display:flex;flex-direction:column;gap:2rem">
                <div style="display:flex;align-items:center;gap:1rem"><img src="<?=$DEFAULT_PATH?>assets/images/WhatsApp.svg"><span>Whatsapp</span></div>
                <div style="display:flex;align-items:center;gap:1rem"><img src="<?=$DEFAULT_PATH?>assets/images/twitter.svg"><span>Twitter</span></div>
                <div style="display:flex;align-items:center;gap:1rem"><img src="<?=$DEFAULT_PATH?>assets/images/facebook.svg"><span>Facebook</span></div>
                <div style="display:flex;align-items:center;gap:1rem"><img src="<?=$DEFAULT_PATH?>assets/images/LinkedIn-Circled.svg"><span>Linkdin</span></div>
                <div style="display:flex;align-items:center;gap:1rem"><img src="<?=$DEFAULT_PATH?>assets/images/Instagram.svg"><span>Instagram</span></div>
            </div>
            

            </div>
            
        </div>
        <div class="footer">
            <a href="profile_settings_edit.php" class="editbutton">Edit Profile Details</a>
            <a id="sharebutton" class="sharebutton" style="text-decoration: none;" href="#popup1"> Share Profile</a>
        </div>

</div>

<!-------------------------------------POPUPS-------------------------------------------------->
<div id="popup1" class="overlay">
	<div class="popup">
		<div style="display:flex;justify-content:space-between;align-items:center">
        <h5>Share Via <img src="<?=$DEFAULT_PATH?>assets/images/Share.svg" ></h5>
		<a class="close" href="#">&times;</a>
        </div>
        
		<div class="content" style="display:flex;gap:1rem;margin-left:1rem">
        <a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share"><img src="<?=$DEFAULT_PATH?>assets/images/WhatsApp.svg" ></a>
        <a class="twitter-share-button" href="https://twitter.com/intent/tweet"><img src="<?=$DEFAULT_PATH?>assets/images/twitter.svg" ></a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=#url" target="_blank"> <img src="<?=$DEFAULT_PATH?>assets/images/facebook.svg" ></a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={url}"><img src="<?=$DEFAULT_PATH?>assets/images/LinkedIn-Circled.svg" ></a>
            <img src="<?=$DEFAULT_PATH?>assets/images/Instagram.svg" >
		</div>
	</div>
                    </div>

       
  <script>
    let eyeicon = document.getElementById("eyeicon");
    let password = document.getElementById("password");
    eyeicon.onclick = function() {
        if (password.type == "password") {
            password.type = "text";
            eyeicon.src = "<?=$DEFAULT_PATH?>assets/images/eye-open.png";
        } else {
            password.type = "password";
            eyeicon.src = "<?=$DEFAULT_PATH?>assets/images/eye.svg";
        }
    }
    </script>
    <?php require('constant/scripts.php');?>
</body>
</html>