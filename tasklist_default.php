<?php
include("navbar.php");

$today = new DateTime();
$dietition = $_SESSION['dietitianuserID'];
if (isset($_POST['create-submit'])) {
    $dietition = $_SESSION['dietitianuserID'];
    $title = $_POST['task-title'];
    $description = $_POST['task-description'];
    $date = $_POST['task-date'];
    $from_time = $_POST['task-from-time'];
    $to_time = $_POST['task-to-time'];
    $sql = "INSERT INTO `dietitian_tasks`(`dietitianuserID`, `title`, `description`, `date`, `start_time`, `end_time`) VALUES ('$dietition','$title','$description','$date','$from_time','$to_time')";

    $result = mysqli_query($conn, $sql);
    if ($result) { ?>
        <script>
            location.replace("task_list.php");
        </script>
        <?php
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
body {
    font-family: "NATS", sans-serif !important;
    font-weight: 400;
    position: relative;
}
.image{
    margin-top:30px !important;
    height:280px;
}
.create-task {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding-right: 3rem;
        padding-bottom: 2rem;
        position: absolute;
        bottom: 0;
        top:125%;
        right: 0;
    }

    .create {
        width: 270px;
        height: 90px;
        background: #FFFFFF;
        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.25);
        border-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .create span {
        font-size: 35px;
        line-height: 90.84%;
        color: #4B9AFB;
    }

    #create-pop{
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 30px 50px;
        width: 845px;
        height: 486px;
        background: #FFFFFF;
        border-radius: 15px;
        display: none;
    }
    .content{
        margin-top:20px !important;
    }
    #background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
    }

    #pop-title {
        text-align: center;
        font-size: 40px;
        line-height: 111.34%;
        color: #000000;
        margin-bottom: 3rem;
    }

    .input-group {
        flex-direction: column;
    }

    .input {
        display: flex;
        margin-bottom: 30px;
        flex-direction: column !important;
    }

    .sub-input {
        display: flex;
        justify-content: space-between;
    }

    .input label {
        display: flex;
        flex-direction: column;
        font-size: 28px;
        color: #000000;
    }

    .input input {
        background: #FFFFFF;
        border: 1px solid #F2F2F2;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
        height: 45px;
        padding: 10px 20px;
    }

    .input input::placeholder {
        font-size: 25px;
        color: #BFBFBF;
    }

    .input input:focus {
        outline: none;
    }

    .input textarea {
        background: #FFFFFF;
        border: 1px solid #F2F2F2;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
        padding: 15px 20px;
    }

    .input textarea:focus {
        outline: none;
    }

    .input textarea::placeholder {
        font-size: 25px;
        line-height: 111.34%;
        color: #BFBFBF;
    }

    .create-cancel{
        height: 58px;
        background: #FFFFFF;
        border: 2px solid #6883FB;
        border-radius: 15px;
        font-size: 25px;
        text-transform: capitalize;
        width: 45%;
        color: #6883FB;
    }

    .create-submit{
        outline: none;
        border: none;
        height: 58px;
        background: #6883FB;
        border-radius: 15px;
        font-size: 25px;
        line-height: 53px;
        text-transform: capitalize;
        color: #FFFFFF;
        width: 45%;
    }
.create p,
img {
    color: #4B9AFB !important;
    font-size: 35px;
    font-weight: 400;
    margin: auto 10px;
}

@media screen and (min-width:720px) and (max-width:1500px) {
    .create-task{
        top:107%;
        
    }
    .image{
    margin-top:-10px !important;
    height:280px;
}
}

@media (min-width: 576px) {

    .container,
    .container-sm {
        max-width: none !important;
    }
}

@media screen and (min-width:0px) and (max-width:720px) {
    .create-task {
        top:110%;
        /* width:auto; */
    }
    .title {
        margin-left: 1rem !important;
        margin-top: -2rem !important;
    }
    .container {
        margin: 0px !important;
    }
    .image{
    margin-top:-10px !important;
    height:280px;
}
}

@media screen and (min-width:0px) and (max-width:450px) {
   
    .topnav-icons {
        gap: 10px !important;
        padding-right: 0px !important;
    }
    .image{
    margin-top:-10px !important;
    height:250px;
    width:250px;
}
}

@media (max-width: 720px) {
    .title {
        margin-top: 1rem !important;
    }
}
</style>

<body>
    <div class="container" style="align-items:center;margin:10px;margin-left:13rem;width:auto;">
        <div class="title" style="font-size:40px;font-weight:400;margin-top:1.7rem;margin-left:3rem;">Task List
        </div>
        <div class="" style="margin:auto;">
            <img src="<?=$DEFAULT_PATH?>assets/images/Task management.svg" class="image" alt="..." style="margin:auto;display:flex;">
            <p style="margin:auto;font-size:33px;display:flex;text-align:center;align-items:center;justify-content:center;">
                No tasks created yet!</p>
        </div>
        </div>
    <div id="background"></div>
        <div id="create-pop">
            <h2 id="pop-title">Create a task</h2>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group">
                            <div class="input">
                                <label for="task-title">Title</labtiel>
                                    <input type="text" name="task-title" id="task-title"
                                        placeholder="Type the title here..." required>
                            </div>
                            <div class="input">
                                <label for="task-description">Description</label>
                                <textarea name="task-description" id="task-description" cols="30" rows="5"
                                    placeholder="Type the description here..." required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="offset-1 col-5">
                        <div class="input-group">
                            <div class="input">
                                <label for="task-date">Date</label>
                                <input type="date" name="task-date" id="task-date" required>
                            </div>
                            <div class="sub-input">
                                <div class="input">
                                    <label for="task-from-time">From</label>
                                    <input type="time" name="task-from-time" id="task-from-time" required>
                                </div>
                                <div class="input">
                                    <label for="task-to-time">To</label>
                                    <input type="time" name="task-to-time" id="task-to-time" required>
                                </div>
                            </div>
                            <div class="btns">
                                <button id="create-cancel" type="button" class="create-cancel">Cancel</button>
                                <button name="create-submit" class="create-submit" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col">
                <div class="create-task" style="cursor:pointer">
                    <div id="create-task" class="create">
                        <span>Create Task</span>
                        <img src="<?= $DEFAULT_PATH ?>assets/images/Task_Plus.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    
    <script>
        const createBtn = document.getElementById('create-task');
        const background = document.getElementById('background');
        const create_pop = document.getElementById('create-pop');
        const createcancel = document.getElementById('create-cancel');
        createBtn.addEventListener('click', () => {
            background.style.display = 'Block';
            create_pop.style.display = 'Block';
        });
        
        createcancel.addEventListener('click', () => {
            background.style.display = 'none';
            create_pop.style.display = 'none';
        });
    </script>
</body>
</html>