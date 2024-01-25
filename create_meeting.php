<?php
    include "constant/config.php";
    include "constant/constant.php";
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    if(isset($_POST['save'])){
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $date = $_POST['mydate'];
        $time = $_POST['mytime'];

        // $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO create_meeting (dietitian_id,title, description, date, time) VALUES ('{$_SESSION['dietitian_id']}','$title', '$desc', '$date','$time')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
            
        $conn->close();


        // echo "<h1>".$title.$desc.$date.$time."</h1>";

        header("location: ".$DEFAULT_PATH."live.php");
    }
    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infits | Live</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>

        .content{
            width:100%;
            height:100vh;
        }

        .frm{
            width:30%
        }

        /* .dateandtime{
            width:50%
        } */

    </style>

</head>
<body>
    <div class="content d-flex justify-content-center align-items-center">
        <form class="frm shadow p-3 mb-5 bg-body-tertiary rounded" method="post">
            <div class="mb-3 text-center">
                <h4>Scheduling Live</h4>
            </div>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="desc" id="" cols="30" rows="4"class="form-control"></textarea>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-md-6 ">
                    <div class="mb-3 d-flex align-items-center">
                        <label class="form-label me-3"><h4><i class="bi bi-calendar-date"></i></h4></label>
                        <input type="date" name="mydate" class="form-control">
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label class="form-label me-3"><h4><i class="bi bi-clock-fill"></i></h4></label>
                        <input type="time" name="mytime" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check form-switch">
                        <div class="row d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                        </div>
                        <div class="row">
                            <label class="form-check-label" for="flexSwitchCheckChecked">Set Reminder</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <button class="btn btn-lg btn-outline-primary">Cancel</button>
                <button type="submit" name="save" class="btn btn-lg btn-primary">Save</button>
            </div>
        </form>
    </div>

    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</body>
</html>