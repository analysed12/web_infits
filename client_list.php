<?php
include('navbar.php');

if(isset($_SESSION['dietitianuserID'])){
    $id = $_SESSION['dietitianuserID'] ;
    $sql="SELECT * FROM addclient WHERE dietitianuserID='$id'";
    $result = $conn->query($sql);
    if(mysqli_num_rows($result)<1){
        header('Location:clientlist.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('constant/head.php');?>
    
</head>
<style>
  
::placeholder { 
  color: #BBBBBB;
  opacity: 1;
}
body{
    font-family: 'NATS', sans-serif !important;
    overflow-x:hidden !important;
}

.clients {
   
    font-weight: 400;
    margin-top:2rem;
  margin-left: 17rem;
   
}

.clients_container {
    display: flex;
}

.clients_operations {
    display: flex;
    gap: 3rem;
}

#btn1 {
    background-color: white;
    border: none;
    color: #9C74F5;
    width: auto;

}

.add_set_client {
    width: auto;
    margin-top: 1rem;
    color: #9C74F5;
    background-color: white;
    box-shadow: 0.7px 0.7px 2.5px 1.5px rgb(231, 208, 253);
    border-radius: 0.6rem;
    font-size: 20px;
    font-weight:400;
    border: none;
    display: flex;
    align-items: center;
    padding-right: 1rem;
    padding-left:0.5rem;
}

#btn2 {
    width: auto;
    background-color: #FD2B2B;
    border: none;
    color: white;
    margin-top: 1rem;
    border-radius: 0.6rem;
    box-shadow: 0.6px 0.6px 2px 1px #ccc;
    padding: 0.5rem;
    padding-bottom: 0.3rem;
}

.search_client {
    width:343px;
    margin-top: 1rem;
    color: #BBBBBB;
    background-color: white;
    box-shadow: 0.6px 0.6px 2px 1px #ccc;
    border-radius: 0.6rem;
    font-size: 20px;
    font-weight:400;
    border: none;
    display: flex;
    padding-top: 0.5rem;
    padding-right: 0.5rem;
    margin-right:1rem;
}

#btn3 {
    width: auto;
    background-color: white;
    border: none;
    color: #ACACAC;
    margin-left:0.5rem;
}

.seach_clients_text {
    border: none;
}

.clients_container2 {
    margin-top: 2rem;
    font-size:25px;
}
#active {
    border: none;
    background-color: white;
    font-weight: 500;
    font-size: 1.2rem;
    border: 1px solid transparent;
    width: auto;
}

#active:hover {
    border-bottom: 0.25rem solid #4B9AFB;
    border-radius:17px;
}

.client_wrapper1 {
    padding: 1.5rem;
    display: flex;
    gap: 1rem;
}

.client_wrapper2 {
    padding: 1.5rem;
    display: flex;
    gap: 1rem;
}

.client_profile {
    height: 9rem;
    width: auto;
    background-color: #FAFAFA;
    border-radius: 1rem;
    padding: 1.5rem;
    display: flex;
    gap: 1.5rem;
}

img {
    width:87px;
    height: 87px;
    border-radius: 100%;
}

#btn4 {
    background-color: white;
    border-color: #4B9AFB;
    border-radius: 0.3rem;
    font-size: 0.8rem;
    margin-top: 0.8rem;
    width: auto;
}

#toast{
    position: fixed;
    bottom: 0;
    left: 20%;
    display:flex;
    justify-content: space-evenly;
    align-items: center;
    padding:10px 5px;
    width: 70%;
    margin: 0 auto;
    margin-bottom: 1rem;
    border-radius: 10px;
    display: none;
    transition: all 0.4 ease-in-out !important;
}
#toast__h1{
 
    font-style: normal;
    font-weight: 400;
    font-size: 30px;
    color: #000000;
}
.btn1{
    background: #9C74F5;
    color: #FFFFFF;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    transition: all 0.2 .2 ease-in ;
}
.btn2{
    color: #9C74F5 !important;
    background: #FFFFFF;
    border: 1px solid #9C74F5;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
}
 .btn{
  
    font-style: normal;
    font-weight: 400;
    font-size: 25px;
    margin:0 5px;    
}
.myCheckboxs{
  
    position: absolute;
    top: 10%;
    right:6%;
    display: none;
    border:1px solid #7282FB;
}



@media screen and (max-width: 720px) {
    .clients {
        margin-left: 2rem !important;
    }

    .clients_container {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .add_set_client {
        font-size: 0.8rem;
    }
    #add_set_client{
    margin-left:0% !important;

}
   .client-container{
    justify-content: center; 
    }

    

    .add_set {
        font-size:25px;
        font-weight:400;
    }

    .client_wrapper1 {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        padding: 0.1rem;
    }

    .client_wrapper2 {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        padding: 0.1rem;
    }

    .clients_container3 {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .clients_operations {
        display: flex;
        flex-wrap:wrap;
        gap: 0.5rem;
        max-width:fit-content;
        margin-left:0rem !important;
    }

    .clients_container3 {
        display: none;
    }
    #toast{
        flex-direction: column;
         width: 70%;
         left:10%;
         right:10%;
    }
    .search_client{
        width:80% !important;
    }

}

.client-container {
    display: flex;
    flex-wrap: wrap;
    max-width: 1000px;
}

.client-item {
    padding: 30px 10px;
    margin: 5px;
        padding-left: 30px;
    width: 150px;
    flex-basis: 300px;
    background: #FAFAFA;
    border-radius: 15px;
    position: relative;
    

}
.client-item:hover{
    border: 1px solid #D9D9D9;
    box-shadow: 0px 10px 15px rgba(136, 136, 136, 0.05);

}

.button-top{
    border:none;
    background:white;
    
    
}


.button-top:focus{
    border-bottom : 4px solid #4B9AFB;


}
.button-top:active{
    border-bottom : 4px solid #4B9AFB;

}
.button-top:hover{
    border-bottom : 4px solid #4B9AFB;

}
.bottomborder{
    border-bottom: 0.25rem solid #4B9AFB;
}
@media screen and (max-width: 1100px){
    .clients_container{
        display:flex !important;
        flex-direction:column !important;
        gap:0.5rem;
    }
    .clients{
        margin-left:15rem;
    }
    .clients_operations {
    display: flex;
    gap: 2rem !important;
    }
}
</style>

<body>
    <div class="clients">
        <p style="font-size:40px">Clients</p>
        <div class="clients_container">
        <div class="search_client" style="justify-content:center;align-items:center">
                <div><button id="btn3"><span class="material-symbols-outlined">search</span></button> </div>
                <div style="margin-left:1rem;margin-right:4rem;margin-bottom:0.5rem;"> <input type="text" name="search_client" placeholder="Search Clients"
                        class="seach_clients_text" style="width:100%"></div>
            </div>


            <div class="clients_operations">
                <div class="add_set_client" id="add_set_client" >
                    <div><button id="btn1" >
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.0448 16.1345V9.3051H0.202393V7.02863H7.0448V0.199219H9.3256V7.02863H16.168V9.3051H9.3256V16.1345H7.0448Z" fill="#9C74F5"/>
                    </svg>
                    </button> </div>
                    <div class="add_set"> <span">Add Clients</span></div>
                </div>
                <div onclick="toast('Set Goals');" class="add_set_client">
                    <div><button  id="btn1"><svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_9709_21946)">
                        <path d="M14.6048 3.36312H14.6038L16.2798 3.69812C16.3698 3.71612 16.4438 3.78212 16.4698 3.87112C16.4829 3.91435 16.4841 3.96034 16.4732 4.00418C16.4622 4.04803 16.4396 4.08809 16.4078 4.12012L15.0348 5.49412C14.8705 5.65809 14.6479 5.75016 14.4158 5.75012H13.2778L10.4178 8.61112C10.4723 8.81714 10.4824 9.03242 10.4472 9.24263C10.412 9.45283 10.3325 9.65313 10.2138 9.83018C10.0952 10.0072 9.94019 10.157 9.75914 10.2694C9.57809 10.3818 9.37516 10.4544 9.16386 10.4823C8.95257 10.5101 8.73776 10.4927 8.53375 10.431C8.32974 10.3693 8.14122 10.2649 7.98074 10.1246C7.82025 9.98441 7.6915 9.81158 7.60305 9.61767C7.51459 9.42377 7.46848 9.21324 7.46777 9.00012C7.46792 8.77001 7.52098 8.54302 7.62284 8.33668C7.7247 8.13034 7.87263 7.95019 8.05521 7.81013C8.23779 7.67008 8.45013 7.57388 8.67581 7.52897C8.9015 7.48406 9.13449 7.49164 9.35677 7.55112L12.2178 4.68912V3.55212C12.2178 3.32012 12.3098 3.09712 12.4738 2.93312L13.8478 1.55912C13.8798 1.52725 13.9199 1.50465 13.9637 1.49374C14.0076 1.48282 14.0535 1.48399 14.0968 1.49712C14.1858 1.52312 14.2518 1.59712 14.2698 1.68712L14.6048 3.36312Z" fill="#9C74F5"/>
                        <path d="M2.96772 9.00078C2.96875 9.85874 3.15376 10.7065 3.51029 11.4869C3.86681 12.2673 4.38655 12.9621 5.03444 13.5245C5.68234 14.087 6.44332 14.5039 7.26605 14.7472C8.08879 14.9906 8.95414 15.0546 9.80373 14.9351C10.6533 14.8155 11.4674 14.5152 12.191 14.0542C12.9147 13.5933 13.5311 12.9826 13.9986 12.2632C14.4661 11.5438 14.7739 10.7325 14.9013 9.88407C15.0286 9.03561 14.9725 8.16971 14.7367 7.34478C14.7036 7.2484 14.6905 7.14629 14.6981 7.04468C14.7057 6.94306 14.7339 6.84405 14.781 6.75369C14.8281 6.66333 14.8931 6.58349 14.9721 6.51905C15.051 6.45461 15.1422 6.40691 15.2402 6.37885C15.3382 6.35079 15.4408 6.34297 15.5419 6.35585C15.643 6.36873 15.7404 6.40204 15.8282 6.45377C15.916 6.5055 15.9924 6.57455 16.0526 6.65673C16.1129 6.73891 16.1558 6.83249 16.1787 6.93178C16.6352 8.5293 16.5485 10.2332 15.9322 11.7761C15.3158 13.319 14.2047 14.6137 12.7731 15.457C11.3416 16.3003 9.67056 16.6445 8.02227 16.4356C6.37397 16.2267 4.84166 15.4765 3.66572 14.3028C2.49106 13.1271 1.74009 11.5947 1.53072 9.94599C1.32135 8.29732 1.66543 6.62579 2.50894 5.19385C3.35245 3.76191 4.64762 2.65064 6.19111 2.03452C7.7346 1.4184 9.439 1.33231 11.0367 1.78978C11.227 1.84539 11.3875 1.97404 11.4831 2.14763C11.5788 2.32121 11.6019 2.52561 11.5473 2.71615C11.4927 2.9067 11.3649 3.06789 11.1919 3.16451C11.0188 3.26112 10.8146 3.28531 10.6237 3.23178C9.7303 2.97544 8.78955 2.93014 7.87563 3.09944C6.96172 3.26874 6.09962 3.64802 5.35731 4.20737C4.615 4.76673 4.01276 5.49086 3.59808 6.3227C3.1834 7.15453 2.96761 8.07131 2.96772 9.00078Z" fill="#9C74F5"/>
                        <path d="M5.96776 8.99974C5.96782 9.54633 6.11711 10.0825 6.39953 10.5505C6.68194 11.0185 7.08677 11.4005 7.57033 11.6553C8.0539 11.9101 8.59786 12.028 9.14353 11.9964C9.6892 11.9647 10.2159 11.7847 10.6668 11.4757C11.1176 11.166 11.4751 10.7389 11.7007 10.2406C11.9263 9.74234 12.0114 9.19187 11.9468 8.64874C11.9293 8.51694 11.9473 8.38287 11.9988 8.26032C12.0504 8.13777 12.1337 8.03118 12.2401 7.95152C12.3466 7.87187 12.4723 7.82202 12.6044 7.80712C12.7365 7.79222 12.8702 7.8128 12.9918 7.86674C13.1133 7.91998 13.2185 8.0045 13.2966 8.11166C13.3748 8.21882 13.4232 8.3448 13.4368 8.47674C13.5454 9.40484 13.3625 10.3437 12.9133 11.1631C12.4641 11.9825 11.771 12.6418 10.9301 13.0494C10.0892 13.457 9.14235 13.5927 8.22086 13.4377C7.29936 13.2827 6.44898 12.8446 5.78773 12.1844C5.12648 11.5242 4.68716 10.6744 4.53077 9.75318C4.37437 8.83192 4.50864 7.88482 4.91495 7.04334C5.32126 6.20186 5.97944 5.50773 6.79816 5.05731C7.61687 4.60688 8.5555 4.42249 9.48376 4.52974C9.58316 4.53896 9.67971 4.56793 9.76777 4.61496C9.85582 4.66198 9.9336 4.7261 9.99655 4.80358C10.0595 4.88105 10.1063 4.97031 10.1344 5.06612C10.1624 5.16193 10.171 5.26237 10.1596 5.36155C10.1483 5.46073 10.1173 5.55665 10.0685 5.6437C10.0196 5.73074 9.95383 5.80715 9.87505 5.86845C9.79627 5.92975 9.70604 5.97471 9.60966 6.00069C9.51328 6.02667 9.41268 6.03315 9.31376 6.01974C8.89342 5.97094 8.46751 6.01161 8.064 6.13909C7.66049 6.26657 7.28852 6.47797 6.97251 6.75942C6.6565 7.04086 6.40361 7.38597 6.23045 7.77208C6.05728 8.15819 5.96776 8.57657 5.96776 8.99974V8.99974Z" fill="#9C74F5"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_9709_21946">
                        <rect width="16" height="16" fill="white" transform="translate(0.967773 1)"/>
                        </clipPath>
                        </defs>
                        </svg>
                        </button> </div>
                    <div class="add_set"> <span>Set Goals</span></div>
                </div>

                <div onclick="toast('Set Reminders');" class="add_set_client">
                    <div><button id="btn1"><svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.408 3.99334V8.54628H13.8875V3.99334M13.8875 10.0639H15.408V11.5816H13.8875M7.04504 0.199219C6.64177 0.199219 6.25502 0.359113 5.96986 0.643727C5.68471 0.928341 5.52451 1.31436 5.52451 1.71687C5.51917 1.79012 5.51917 1.86367 5.52451 1.93692C3.33494 2.58192 1.72317 4.61557 1.72317 7.02863V11.5816L0.202637 13.0992V13.858H13.8875V13.0992L12.3669 11.5816V7.02863C12.3669 4.61557 10.7551 2.58192 8.56558 1.93692C8.57091 1.86367 8.57091 1.79012 8.56558 1.71687C8.56558 1.31436 8.40538 0.928341 8.12022 0.643727C7.83507 0.359113 7.44831 0.199219 7.04504 0.199219ZM5.52451 14.6169C5.52451 15.0194 5.68471 15.4054 5.96986 15.69C6.25502 15.9746 6.64177 16.1345 7.04504 16.1345C7.44831 16.1345 7.83507 15.9746 8.12022 15.69C8.40538 15.4054 8.56558 15.0194 8.56558 14.6169H5.52451Z" fill="#9C74F5"/>
</svg></button>
                    </div>
                    <div class="add_set"> <span>Set Reminders</span></div>
                </div>
                <div class="delete_client">
                    <button id="btn2"><span class="material-symbols-outlined">delete</span></button>

                </div>
            </div>
        </div>

        <div class="clients_container2">
            <form action="" method="post">
                <button class="button-top active-button bottomborder" id="activebtn" name='active-btn' type="button">Active</button>
                <button class="button-top pending-btn" id="pendingbtn" name="pending-btn" style="margin-left:2rem" type="button">Pending</button>
            </form>
        </div>
        <br><br>
        
        <div class="client-container" >
            <?php
                if(isset($_POST['pending-btn']))
                {
                   

                    $sql = "SELECT * FROM addclient WHERE dietitianuserID='$id' AND status=0";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                      while($row = mysqli_fetch_assoc($result))
                    {
                        $client_id = $row["client_id"];
                        $plan_id = $row["plan_id"] ;


                        $sql1 = "SELECT * FROM create_plan WHERE `plan_id`= $plan_id";
                        $result1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                        $date1 = strtotime($row1["start_date"]);
                        $date2 = strtotime($row1["end_date"]);
                        $months = 0;
                        
                        while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2)
                            $months++;
                        
                            $plan_name = $row1['name'] ;
                            $plan_duration = $months." Month" ;
                        // echo $months;

                        if(mysqli_num_rows($result1) > 0)
                    {
                        // $name_of_plan = $row1["name"];
                
                    echo "<div class='client-item'id='card' >";
                    echo "<div class='profile1' style='float:left; margin-right:10px;'><img style='border:radius:50%' src='".$DEFAULT_PATH."assets/images/client_profile.svg'></div>";
                    echo "<div class='profile2'>";
                    echo "<input style='cursor:pointer;border:1px solid #7282FB;' id='chk' class='myCheckboxs' type='checkbox' name='checkbox_name[]' value='".$row["client_id"]."'>";
                    echo "<p style='font-weight:400;text-transform:capitalize;font-size:22px;line-height:88%;'>".$row["name"]."</p>";
                    echo "<a href='client_profile.php?client_id=".$row['client_id']."' style='text-decoration:none !important;font-size:18px;font-weight:400;line-height:88%;padding:0px !important;margin-top:-1rem;'>Profile</a>";
                    echo "<div>";
                    echo "<div class='box1' style='display:inline-block;background: #FFFFFF;
                    border: 1px solid #4B9AFB;font-size:13px;font-weight:400;
                    border-radius: 6px;padding:5px;margin-top:5px;margin-right:15px;'>".$plan_name."</div>";
                    echo "<div class='box2' style='display:inline-block;background: #FFFFFF;
                    border: 1px solid #4B9AFB;font-size:13px;font-weight:400;
                    border-radius: 6px;padding:5px;margin-top:5px;margin-left:5px;'>".$plan_duration." </div>";
                    echo "</div>";
    
                    echo "</div>";
                    echo "</div>";
    
                
                 }}}
                }
                else
                {
                   
                    $sql = "SELECT * FROM addclient WHERE dietitianuserID='$id' AND status=1";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                      while($row = mysqli_fetch_assoc($result))
                    {
                        $client_id = $row["client_id"] ;
                        $plan_id = $row["plan_id"] ;


                        if($plan_id == 0){
                            $plan_name ="No plan";
                            $plan_duration = "No Plan";

                        }
                        else{
                        $sql1 = "SELECT * FROM create_plan WHERE `plan_id`= $plan_id";
                        $result1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                        $date1 = strtotime($row1["start_date"]);
                        $date2 = strtotime($row1["end_date"]);
                        $months = 0;
                        
                        while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2)
                            $months++;

                        $plan_name = $row1['name'] ;
                        $plan_duration = $months." Month" ;
                    }
                 
                    echo "<div class='client-item' id='card'>";
                    echo "<input style='cursor:pointer;solid border:1px solid #7282FB;' id='chk' class='myCheckboxs' type='checkbox' name='checkbox_name[]' value='".$row['client_id']."'>";
                    echo "<div class='profile1' style='float:left; margin-right:10px;'><img style='border:radius:50%' src='".$DEFAULT_PATH."assets/images/client_profile.svg'></div>";
                    echo "<div class='profile2'>";
                    echo "<p style='font-weight:400;text-transform:capitalize;font-size:22px;line-height:88%;'>".$row["name"]."</p>";
                    echo "<a href='client_dashboard.php?client_id=".$row['client_id']."' style='text-decoration:none !important;font-size:18px;font-weight:400;line-height:88%;padding:0px !important;margin-top:-1rem;'>Profile</a>";
                    echo "<div>";
                    echo "<div class='box1' style='display:inline-block;background: #FFFFFF;
                    border: 1px solid #4B9AFB;font-size:13px;font-weight:400;
                    border-radius: 6px;padding:5px;margin-top:5px;margin-right:5px;'>".$plan_name."</div>";
                    echo "<div class='box2' style='display:inline-block;background: #FFFFFF;
                    border: 1px solid #4B9AFB;font-size:13px;font-weight:400;
                    border-radius: 6px;padding:5px;margin-top:5px';margin-right:5px;'>".$plan_duration." </div>";
                    echo "</div>";
    
                    echo "</div>";
                    echo "</div>";
                
                 }}
                }
                ?>


        </div>
    
    </div>
    <div id="toast">
        <h1 id="toast__h1">
          Select the clients for whom you want the reminders to be set!
        </h1>

        <div id="toast__btns">
            <form action=""  method="POST" id='form'>
            <input style='cursor:pointer' id='form__input' type='text' hidden name='clientList' value=''>
             <button type="submit" class="btn btn1" >
            <span>
                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.3767 3.99431V8.54725H13.859V3.99431M13.859 10.0649H15.3767V11.5825H13.859M7.02961 0.200195C6.6271 0.200195 6.24108 0.36009 5.95647 0.644704C5.67185 0.929318 5.51196 1.31534 5.51196 1.71784C5.50663 1.7911 5.50663 1.86464 5.51196 1.9379C3.32655 2.5829 1.71784 4.61655 1.71784 7.02961V11.5825L0.200195 13.1002V13.859H13.859V13.1002L12.3414 11.5825V7.02961C12.3414 4.61655 10.7327 2.5829 8.54725 1.9379C8.55258 1.86464 8.55258 1.7911 8.54725 1.71784C8.54725 1.31534 8.38736 0.929318 8.10275 0.644704C7.81813 0.36009 7.43211 0.200195 7.02961 0.200195ZM5.51196 14.6178C5.51196 15.0203 5.67185 15.4064 5.95647 15.691C6.24108 15.9756 6.6271 16.1355 7.02961 16.1355C7.43211 16.1355 7.81813 15.9756 8.10275 15.691C8.38736 15.4064 8.54725 15.0203 8.54725 14.6178H5.51196Z" fill="white"/>
                    </svg>

                </span><span class='btn__span'></span>
          </button>
           <button onclick='close()' class="btn btn2">Cancel</button>

        </form>

         

        </div>
    </div>
    
<script>
    function addac(){
        remove('pendingbtn');
        ac.classList.add('bottomborder');
    }
    let ac=document.querySelector('#activebtn').addEventListener('click',addac);
    document.querySelector('#pendingbtn').addEventListener('click',(e)=>{
     remove('activebtn');
     let a=document.querySelector('#pendingbtn').classList.add('bottomborder');
     alert(a.classList);

     });
     function remove(s){
        let a=document.querySelector(`#${s}`);
        // console.log();
        alert(a.classList);
        a.classList.add('bottomborder');
        alert(a.classList);
     }
    document.getElementsByClassName('client-item').onclick=function(){
        var checkbox= document.getElementById('chk');
        checkbox.checked=!checkbox.checked;
    }
   
        const popUp = document.querySelector("#toast");
        const btn1 = document.querySelector(".btn1");
        const btn2 = document.querySelector(".btn2");
        const btn__span = document.querySelector(".btn__span");
        const myCheckBox = document.querySelectorAll(".myCheckboxs");
        const form = document.querySelector("#form");
        const from__input = document.querySelector("#from__input");

        let selectedClients = [];

        // display checkBox and popUp here...
        const toast = (val) => {
            popUp.style.display = "inline-flex";
            btn__span.innerHTML = val;
            myCheckBox.forEach((items) => {
                items.style.display = "block";
            });
        };

        // after checking the checkbox...the further opration...
        btn1.addEventListener("click", () => {
        if (btn__span.innerHTML == "Set Goals") { //the set goals page linking and sending the data...
            myCheckBox.forEach((items) => {
                if (items.checked) {
                    selectedClients.push(items.value);
                }
                form__input.value = JSON.stringify(selectedClients);
                form.action = "setgoals.php";
                console.log( "setgoals");
            });
            window.location.href = "setgoals.php";
        } else if (btn__span.innerHTML == "Set Reminders") {   //the set Reminders page linking and sending the data...
             
            myCheckBox.forEach((items) => {
                if (items.checked) {
                    selectedClients.push(items.value);
                }
                form__input.value = JSON.stringify(selectedClients);
                form.action = 'set_reminders.php';
                console.log( "Set Reminders", selectedClients);
            });
            window.location.href = "set_reminders.php";
        }
        });

        // hide checkBox and popUp here...
        btn2.addEventListener("click", (e) => {
            e.preventDefault();
            popUp.style.display = "none";
            myCheckBox.forEach((items) => {
                items.style.display = "none";
            });
        });

</script>

<?php require('constant/scripts.php');?>
</body>
</html>