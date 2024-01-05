<?php

// if (!$_SESSION) {
    session_start();
// }

require('constant/config.php');

$today = new DateTime();
$ress = $today->format('Y-m-d');
 // echo "hello";
if (isset($_SESSION['dietitianuserID'])) {
    $tasks_id = $_SESSION['dietitianuserID'];
    // echo $tasks_id;
    $sql = "SELECT * FROM dietitian_tasks WHERE dietitianuserID='$tasks_id' AND date >= '{$ress}'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "yes";
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        // echo $count;
        if ($count < 1) {
            // echo "yes";
            header('Location:tasklist_default.php');
        }
    } else {
        // echo "no";
    }
}
if (isset($_POST['add_calender'])) {
    $query = "UPDATE `dietitian_tasks` SET `add_to_calander`= 1 WHERE task_id = {$_POST['task_id']}";
    $result = mysqli_query($conn, $query);
    if ($result) {
        ?>
        <script>
            window.location.replace("task_list.php");
        </script>
        <?php
    }
    $conn->close();
    exit();
}
if (isset($_POST['edit_task'])) {
    $query = "SELECT * FROM `dietitian_tasks` WHERE task_id = {$_POST['t_id']}  AND dietitianuserID = '{$_POST['dietitianuserID']}'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }
    $response = json_encode($response);
    echo ($response);
    $conn->close();
    exit();
}
if (isset($_POST['delete_task'])) {
    $query = "DELETE FROM `dietitian_tasks` WHERE task_id = {$_POST['t_id']}  AND dietitianuserID = '{$_POST['dietitianuserID']}'";
    $result = mysqli_query($conn, $query);
    echo ($result);
    $conn->close();
    exit();
}
ob_start(); // start output buffering

include 'navbar.php';

if (isset($_SESSION['dietitian_id'])) {
    $dietitianuserid = $_SESSION['dietitianuserID'];
    $q = "SELECT * FROM dietitian_tasks WHERE dietitianuserID = '$dietitianuserid'";
    $result1 = $conn->query($q);
    
    if (mysqli_num_rows($result1) < 1) {
        header("Location:  tasklist_default.php");
        ob_end_flush(); // end output buffering before header
        exit(); // ensure script stops here
    }
}

ob_end_flush();

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
    if ($result) {
        ?>
        <script>
            location.replace("task_list.php");
        </script>
        <?php
    }
}
if (isset($_POST['edit-submit'])) {
    $task_id = $_POST['edit-task-id'];
    $title = $_POST['edit-task-title'];
    $description = $_POST['edit-task-description'];
    $date = $_POST['edit-task-date'];
    $from_time = $_POST['edit-task-from-time'];
    $to_time = $_POST['edit-task-to-time'];
    $sql = "UPDATE `dietitian_tasks` SET `title` = '{$title}' , `description` = '{$description}', `date` = '{$date}', `start_time` = '{$from_time}', `end_time` = '{$to_time}' WHERE `task_id` = '{$task_id}'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        ?>
        <script>
            window.location.replace("task_list.php");
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <?php require('constant/head.php'); ?>
</head>
<style>
    #main {
        font-family: 'NATS';
        font-weight: 400;
        font-style: normal;
        padding-left: 4rem;
        padding-top: 1rem;
        overflow-x: hidden;
    }

    .col {
        padding: 0;
    }

    .heading {
        font-size: 48px;
    }

    .today-tasks,
    .upcoming-tasks {
        margin-top: 1rem;
        padding-left: 2rem;
    }

    .title {
        font-size: 30px;
        letter-spacing: -0.312px;
        color: #000000;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 1rem;
    }

    .title span {
        width: 30px;
        height: 30px;
        background: #F7FBFF;
        border-radius: 8px;
        font-size: 30px;
        line-height: 22px;
        letter-spacing: -0.312px;
        color: #3C82D7;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .today-task-cards,
    .upcoming-task-cards {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        margin: 2rem 0;
    }

    .tcard,
    .dialogpop {
        width: 300px;
        min-height: 150px;
        background: #FAFDFF;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        border-radius: 21px;
        display: flex;
        align-items: center;
        flex-direction: column;
        position: relative;
    }

    .ttitle {
        margin-top: 1rem;
        display: flex;
        width: 80%;
        justify-content: space-between;
        align-items: center;
        font-size: 25px;
        line-height: 22px;
        letter-spacing: -0.408px;
        color: #3C82D7;
    }

    .ttitle i {
        font-size: 20px;
        cursor: pointer;
    }

    .ttime {
        display: flex;
        width: 80%;
        justify-content: space-between;
        margin-block: 0.7rem 1rem;
        font-size: 17px;
        line-height: 22px;
        letter-spacing: -0.408px;
        color: #3C82D7;
        mix-blend-mode: normal;
        opacity: 0.9;
    }

    .tdescription {
        font-size: 17px;
        line-height: 22px;
        letter-spacing: -0.408px;
        color: #000000;
        mix-blend-mode: normal;
        opacity: 0.9;
        width: 80%;
        padding-right: 11px;
        margin-bottom: 1rem
    }

    .dialogpop {
        display: none;
        position: absolute;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        animation: fadeInAnimation ease 0.3s;
        animation-iteration-count: 1;
        animation-fill-mode: forwards;
    }

    @keyframes fadeInAnimation {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    button.ep-top {
        width: 75%;
        border: none;
        height: 47px;
        background: #9C74F5;
        border-radius: 8px;
        font-size: 17.4667px;
        line-height: 150%;
        text-align: center;
        color: #FFFFFF;
    }

    .ep-bottom {
        width: 75%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    span.ep-delete {
        width: 45%;
        height: 35px;
        background: #FF2929;
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-size: 17.4667px;
        line-height: 150%;
        color: #FFFFFF;
        cursor: pointer;
    }

    span.ep-edit {
        width: 45%;
        height: 35px;
        background: #FFFFFF;
        border: 1px solid #9C74F5;
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-size: 17.4667px;
        line-height: 150%;
        color: #9C74F5;
        cursor: pointer;
    }

    .create-task {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding-right: 5rem;
        padding-bottom: 2rem;
        position: absolute;
        bottom: 0;
        right: 0;
    }

    .create {
        width: 284px;
        height: 97px;
        background: #FFFFFF;
        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.25);
        border-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 22px;
    }

    .create span {
        font-size: 35px;
        line-height: 90.84%;
        color: #4B9AFB;
    }

    #create-pop,
    #edit-pop {
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

    .create-cancel,
    .edit-cancel {
        height: 58px;
        background: #FFFFFF;
        border: 2px solid #6883FB;
        border-radius: 15px;
        font-size: 25px;
        text-transform: capitalize;
        width: 45%;
        color: #6883FB;
    }

    .create-submit,
    .edit-submit {
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

    .btns {
        display: flex;
        justify-content: space-between;
        margin: 17px 0;
    }
    @media screen and (max-width: 720px){

    .upcoming-tasks {
        padding-left: 0;
    }
}
</style>

<body>
    <div id="main">

        <div class="row">
            <div class="col">
                <div class="heading">
                    <h1 style="font-size:40px;margin-top:1rem">Task List</h1>
                </div>
            </div>
        </div>
        <?php
        $query = "SELECT * FROM `dietitian_tasks` WHERE dietitianuserID = '{$dietition}' AND date = '{$today->format('Y-m-d')}' ORDER BY date,start_time";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $count = mysqli_num_rows($result);
            ?>
            <div class="row">
                <div class="col">
                    <div class="today-tasks">
                        <h3 class="title">Today <span>
                                <?php echo ($count) ?>
                            </span></h3>
                        <div class="today-task-cards">
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $date = new DateTime($row['date']);
                                $start = "";
                                $end = "";
                                if ($row['start_time'] != '') {
                                    $start = date("g:i a", strtotime($row['start_time']));
                                }
                                if ($row['end_time'] != '') {
                                    $end = date("g:i a", strtotime($row['end_time']));
                                }
                                ?>
                                <div id="tcard<?php echo ($row['task_id']) ?>" class=" tcard">
                                    <div class="ttitle"><span>
                                            <?php echo (ucwords($row['title'])) ?>
                                        </span><i class="showdialog fa-solid fa-ellipsis-vertical"></i></div>
                                    <div class="ttime"><span>
                                            <?php echo ($start . ' - ' . $end) ?>
                                        </span><span>
                                            <?php echo ($date->format('F d,Y')) ?>
                                        </span></div>
                                    <div class="tdescription"><span>
                                            <?php echo ($row['description']) ?>
                                        </span></div>
                                    <div class="dialogpop">
                                        <button type="button" onclick="add_to_calender(this,<?php echo ($row['task_id']) ?>)"
                                            class=" ep-top">Add to calender</button>
                                        <div class="ep-bottom">
                                            <span onclick="delete_task('tcard<?php echo ($row['task_id']) ?>',<?php echo ($row['task_id']) ?>)" class="ep-delete">Delete</span>
                                            <span onclick="edit_task(<?php echo ($row['task_id']) ?>)" class=" ep-edit" id="edit-popup">Edit</span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        $query = "SELECT * FROM `dietitian_tasks` WHERE dietitianuserID = '{$dietition}' AND time > '{$today->format('Y-m-d')}' ORDER BY  date, start_time";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $count = mysqli_num_rows($result);
            ?>
            <div class="row">
                <div class="col">
                    <div class="upcoming-tasks">
                        <h3 class="title">Upcoming <span>
                                <?php echo ($count) ?>
                            </span></h3>
                        <div class="upcoming-task-cards">
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $date = new DateTime($row['date']);
                                $start = "";
                                $end = "";
                                if ($row['start_time'] != '') {
                                    $start = date("g:i a", strtotime($row['start_time']));
                                }
                                if ($row['end_time'] != '') {
                                    $end = date("g:i a", strtotime($row['end_time']));
                                }
                                ?>
                                <!-- tcard -->
                                <div id="tcard<?php echo ($row['task_id']) ?>" class=" tcard">
                                    <div class="ttitle"><span>
                                            <?php echo (ucwords($row['title'])) ?>
                                        </span><i class="showdialog fa-solid fa-ellipsis-vertical"></i></div>
                                    <div class="ttime"><span>
                                            <?php echo ($start . ' - ' . $end) ?>
                                        </span><span>
                                            <?php echo ($date->format('F d,Y')) ?>
                                        </span></div>
                                    <div class="tdescription"><span>
                                            <?php echo ($row['description']) ?>
                                        </span></div>
                                    <div class="dialogpop">
                                        <button class="ep-top"
                                            onclick="add_to_calender(this,<?php echo ($row['task_id']) ?>)">Add to
                                            calender</button>
                                        <div class="ep-bottom">
                                            <span
                                                onclick="delete_task('tcard<?php echo ($row['task_id']) ?>',<?php echo ($row['task_id']) ?>)"
                                                class=" ep-delete">Delete</span>
                                            <span onclick="edit_task(<?php echo ($row['task_id']) ?>)" class=" ep-edit"
                                                id="edit-popup">Edit</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- tcard -->
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col">
                <div class="create-task" style="cursor:pointer">
                    <div id="create-task" class="create">
                        <span>Create Task</span>
                        <img src="<?= $DEFAULT_PATH ?>assets/images/create-task.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Create pop -->
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

        <div id="edit-pop">
            <h2 id="pop-title">Edit a task</h2>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <input name="edit-task-id" hidden id="edit-task-id">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group">
                            <div class="input">
                                <label for="task-title">Title</labtiel>
                                    <input type="text" name="edit-task-title" id="edit-task-title"
                                        placeholder="Type the title here..." required>
                            </div>
                            <div class="input">
                                <label for="task-description">Description</label>
                                <textarea name="edit-task-description" id="edit-task-description" cols="30" rows="5"
                                    placeholder="Type the description here..." required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="offset-1 col-5">
                        <div class="input-group">
                            <div class="input">
                                <label for="task-date">Date</label>
                                <input type="date" name="edit-task-date" id="edit-task-date" required>
                            </div>
                            <div class="sub-input">
                                <div class="input">
                                    <label for="task-from-time">From</label>
                                    <input type="time" name="edit-task-from-time" id="edit-task-from-time">
                                </div>
                                <div class="input">
                                    <label for="task-to-time">To</label>
                                    <input type="time" name="edit-task-to-time" id="edit-task-to-time">
                                </div>
                            </div>
                            <div class="btns">
                                <button id="edit-cancel" type="button" class="edit-cancel">Cancel</button>
                                <button name="edit-submit" class="edit-submit" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require('constant/scripts.php'); ?>
    <script>
        const showdialog = document.getElementsByClassName('showdialog');
        const dialogpop = document.getElementsByClassName('dialogpop');
        const tcard = document.getElementsByClassName('tcard');
        for (let i = 0; i < showdialog.length; i++) {
            showdialog[i].addEventListener('click', () => {
                dialogpop[i].style.display = "flex";
            });
            document.addEventListener('click', function (event) {
                if (tcard[i].offsetParent !== null) {
                    const isClickInside = tcard[i].contains(event.target);
                    if (!isClickInside) {
                        dialogpop[i].style.display = 'none';
                    }
                }
            });
        }
        // Date Picker Validation Added

        $(document).ready(function () {
            $(function () {
                var dtToday = new Date();

                var month = dtToday.getMonth() + 1;
                var day = dtToday.getDate();
                var year = dtToday.getFullYear();

                if (month < 10)
                    month = '0' + month.toString();
                if (day < 10)
                    day = '0' + day.toString();

                var maxDate = year + '-' + month + '-' + day;

                $('#task-date').attr('min', maxDate);
            })
        })
        // create Task
        const createBtn = document.getElementById('create-task');
        const background = document.getElementById('background');
        const create_pop = document.getElementById('create-pop');
        const edit_pop = document.getElementById('edit-pop');
        createBtn.addEventListener('click', () => {
            background.style.display = 'Block';
            create_pop.style.display = 'Block';
        });
        const createcancel = document.getElementById('create-cancel');
        const editcancel = document.getElementById('edit-cancel');
        createcancel.addEventListener('click', () => {
            background.style.display = 'none';
            create_pop.style.display = 'none';
        });
        editcancel.addEventListener('click', () => {
            background.style.display = 'none';
            edit_pop.style.display = 'none';
        });
        // Delete function
        function delete_task(t, t_id) {
            const tcard = document.getElementById(t);
            tcard.remove();
            $.ajax({
                type: "POST",
                url: "task_list.php",
                data: {
                    delete_task: true,
                    t_id: t_id,
                    dietitianuserID: '<?php echo ($dietition) ?>'
                },
                success: function (data) {
                    // Handle the response here
                    location.reload();
                }
            });
        }

        function edit_task(t_id) {
            const edit_task_id = document.getElementById('edit-task-id');
            const edit_task_title = document.getElementById('edit-task-title');
            const edit_task_desc = document.getElementById('edit-task-description');
            const edit_task_date = document.getElementById('edit-task-date');
            const edit_task_from_time = document.getElementById('edit-task-from-time');
            const edit_task_to_time = document.getElementById('edit-task-to-time');
            $.ajax({
                type: "POST",
                url: "task_list.php",
                data: {
                    edit_task: true,
                    t_id: t_id,
                    dietitianuserID: "<?php echo $dietition ?>"
                },
                success: function (data) {
                    // Handle the response here
                    try {
                        task = JSON.parse(data);
                    } catch (error) {
                        console.log('Error parsing JSON:', error, data);
                    }
                    console.log(task);
                    console.log(task.t_id);
                    edit_task_id.value = task.task_id;
                    edit_task_title.value = task.title;
                    edit_task_desc.value = task.description;
                    edit_task_date.value = task.date;
                    edit_task_from_time.value = task.start_time;
                    edit_task_to_time.value = task.end_time;
                    background.style.display = 'block';
                    edit_pop.style.display = 'block';
                }
            });
        }

        function add_to_calender(dialog, task_id) {
            $.ajax({
                type: "POST",
                url: "task_list.php",
                data: {
                    add_calender: true,
                    task_id: task_id
                },
                success: function (data) {
                    // Handle the response here
                    console.log(data);
                    console.log(task_id);
                    dialog.parentElement.style.display = 'none';
                }
            });
        }
    </script>
</body>

</html>