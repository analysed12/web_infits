<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "infits";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function fetchMeetings($conn, $selectedDate, $endDate) {
        $meetings = array();

        $sql = "SELECT * FROM create_meeting WHERE date BETWEEN '$selectedDate' AND '$endDate' ORDER BY date ASC";
        /*$stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $selectedDate);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $meetings[] = array(
                    'title' => htmlspecialchars($row['title']),
                    'description' => htmlspecialchars($row['description']),
                    'time' => htmlspecialchars($row['time'])
                );
            }
        }

        $stmt->close();*/
        $query = mysqli_query($conn, $sql);
        if ($query) {
         // echo 'Executed';
            // $row = mysqli_fetch_array($query);
            // print_r($row);
            // while ($row = mysqli_fetch_array($query)){
                /*$title = $row['title'];
                $description = $row['description'];
                $time = $row['time'];
                echo "$title". "<br>";
                echo "$description". "<br>";
                echo "$time"."<br>";*/
            // }
            $num = mysqli_num_rows($query);
            if ($num > 0) {
                while ($row = mysqli_fetch_array($query)) {
                    $formattedTime = date("h:i A", strtotime($row['time']));
                    $formattedDate = date("d/m/Y", strtotime($row['date']));
                    $meetings[] = array(
                        'title' => htmlspecialchars($row['title']),
                        'description' => htmlspecialchars($row['description']),
                        'time' => htmlspecialchars($formattedTime),
                        'date' => htmlspecialchars($formattedDate),
                    );
                }
            }
        }
        return $meetings;
    }

    // Check if a date is selected and return the meetings
    if (isset($_POST['selectedDate'])) {
        // $data = array();
        $selectedDate = $_POST['selectedDate'];
        $endDate = $_POST['endDate'];
        error_log('Selected date: ' . $selectedDate);  // Log the selected date

        $meetings = fetchMeetings($conn, $selectedDate, $endDate);
        // $data['info'] = $meetings
        echo json_encode($meetings);
    }
?>
