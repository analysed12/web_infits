<?php require 'constant/config.php';
session_start();
if (isset($_POST['saveForm'])) {
    global $conn;
    $form = $_POST['questions'];
    echo $form;
    $count = $_POST['queCount'];
    $formName = $_POST['formName'];
    if (isset($_GET['form_id'])) {
        $query = "UPDATE `dietitian_forms` SET `form_name`='$formName',`total_que`='$count',`dietitian_id`='{$_SESSION['dietitian_id']}',`dietitianuserID`='{$_SESSION['dietitianuserID']}',`questions`='$form' WHERE form_id= {$_GET['form_id']}";
        echo $query;
        $conn->query($query);
        $form_id = $_GET['form_id'];
    } else {

        $query = "INSERT INTO `dietitian_forms`(`form_name`, `total_que`, `dietitian_id`, `dietitianuserID`, `questions`) VALUES ('$formName','$count','{$_SESSION['dietitian_id']}','{$_SESSION['dietitianuserID']}','$form')";
        $conn->query($query);
        $query = "SELECT * FROM dietitian_forms WHERE dietitian_id = '{$_SESSION['dietitian_id']}' ORDER BY form_id DESC LIMIT 1";
        $result = $conn->query($query);
        $form_id = $result->fetch_assoc()['form_id'];
    }

    header("Location:health_detail_form_create.php?form_id=$form_id");
}
if (isset($_POST['addClient'])) {
    global $conn;
    $clientId = $_POST['clientId'];
    $userId = $_POST['userId'];
    if (isset($_GET['form_id'])) {
        $query = "SELECT * FROM `client_forms_docs` WHERE form_id = '{$_GET['form_id']}' AND `client_id` = '$clientId'";
        $result = $conn->query($query);
        $num = $result->num_rows;
        if ($num < 1) {
            $query2 = "INSERT INTO `client_forms_docs`(`client_id`, `clientuserID`, `dietitian_id`, `dietitianuserID`, `form_id`) VALUES ('$clientId','$userId','{$_SESSION['dietitian_id']}','{$_SESSION['dietitianuserID']}','{$_GET['form_id']}')";
                    $conn->query($query2);
        }
    }
}
if (isset($_POST['removeClient'])) {
    global $conn;
    $clientId = $_POST['clientId'];
    $userId = $_POST['userId'];
    if (isset($_GET['form_id'])) {
        $query = "DELETE FROM `client_forms_docs` WHERE client_id = '$clientId' AND form_id = '{$_GET['form_id']}'";
        $conn->query($query);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infits | Health Details</title>
    <?php require 'constant/head.php';?>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "NATS" !important;
    }

    .content {
        display: flex;
        align-items: center;
        flex-direction: column;
        padding: 20px 16px;
    }

    .content .heading-box {
        height: 70px;
        width: 94%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .content .heading-box h1 {
        font-size: 2.3rem;
        font-weight: 400;
    }

    .content .heading-box button#save {
        background-color: #6883fb;
        color: #ffffff;
        width: 120px;
        font-size: 1.5rem;
        padding: 5px 20px;
        border: none;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
    }

    .content .flex-container {
        position: relative;
        display: flex;
        justify-content: space-around;
        width: 100%;
        margin-top: 30px;
    }

    .content .flex-container .form-container {
        width: 60%;
        padding: 0px 20px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .content .flex-container .form-container .form-title {
        width: 100%;
        display: flex;
        align-items: center;
        padding: 10px 20px;
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
    }

    .content .flex-container .form-container .form-title input#formName {
        width: 100%;
        padding: 10px 20px;
        border: none;
        font-size: 1.6rem;
    }

    .content .flex-container .form-container .form-title input#formName:focus {
        outline: none;
    }

    .content .flex-container #popup .controller-box button#popupSave:hover {
        background-color: #4d6cf7;
        color: #ffffff;
    }

    .content .flex-container .share-box {
        display: flex;
        align-items: center;
        flex-direction: column;
        height: 600px;
        width: 30%;
        max-width: 400px;
        min-width: 350px;
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.25);
        padding: 15px;
        border-radius: 15px;
    }

    .content .flex-container .share-box h3 {
        font-size: 1.8rem;
    }

    .content .flex-container .share-box .search-box1 {
        width: 100%;
        display: flex;
        align-items: center;
        font-size: 1.6rem;
        padding: 5px 15px;
        margin-top: 10px;
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
    }

    .content .flex-container .share-box .search-box1 img {
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        margin-right: 10px;
    }

    .content .flex-container .share-box .search-box1 input#search {
        width: 100%;
        border: none;
        padding: 5px 5px;
    }

    .content .flex-container .share-box .search-box1 input#search:focus {
        outline: none;
    }

    .content .flex-container .share-box #selectedUser-box {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        width: 100%;
        padding-top: 20px;
        margin-top: 10px;
    }

    .content .flex-container .share-box #selectedUser-box .selectedUser {
        background-color: #EFF4FF;
        display: flex;
        align-items: center;
        width: -moz-fit-content;
        width: fit-content;
        padding: 5px 10px;
        border-radius: 15px;
    }

    .content .flex-container .share-box #selectedUser-box .selectedUser p.userName {
        margin: 0;
        color: #6883fb;
    }

    .content .flex-container .share-box #selectedUser-box .selectedUser img {
        margin-left: 20px;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        cursor: pointer;
    }

    .content .flex-container .share-box ul#usersList {
        display: flex;
        flex-direction: column;
        gap: 20px;
        height: 300px;
        width: 100%;
        margin-top: 20px;
        overflow-y: auto;
    }

    .content .flex-container .share-box ul#usersList li {
        display: flex;
        align-items: center;
        font-size: 1.8rem;
        position: relative;
    }

    .content .flex-container .share-box ul#usersList li input.checkBox {
        display: flex;
        align-items: center;
        justify-content: center;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        outline: 2px solid #6883fb;
        height: 20px;
        width: 20px;
        cursor: pointer;
        border-radius: 5px;
    }

    .content .flex-container .share-box ul#usersList li input.checkBox::after {
        content: "\f00c";
        font-size: 18px;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        color: #ffffff;
        display: none;
    }

    .content .flex-container .share-box ul#usersList li input.checkBox:checked {
        background-color: #6883fb;
    }

    .content .flex-container .share-box ul#usersList li input.checkBox:checked::after {
        display: block;
    }

    .content .flex-container .share-box ul#usersList li label.userName {
        color: #6883fb;
        margin: 0 0 0 30px;
        cursor: pointer;
    }

    /*# sourceMappingURL=health_detail_form_create.css.map */
    /* styles for que sec  */
    #questions-container div {
        padding: 10px 30px;
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
        margin-bottom: 2rem;
    }

    #questions-container input {
        margin: 0;
        color: #D6D6D6;
        font-size: 1.6rem;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        margin-right: 1rem;

    }

    #questions-container input::placeholder {
        color: #D6D6D6;
    }

    #questions-container span {
        padding: 0rem 0.5rem;
    }

    h3 {
        font-size: 2rem;
    }

    label {
        display: block;
        /* margin-top: 10px; */
        font-size: 1.6rem;
        width: 100%;
    }

    input[type="text"] {
        /* width: 300px; */
        width: 85%;
        border: none;
    }

    input[type="radio"],
    input[type="checkbox"] {
        margin-right: 5px;
    }

    #questions-container {
        margin-top: 20px;
        width: 100%;
    }

    #save-button,
    #cancel-button {
        margin-top: 20px;
    }

    .popup-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
    }

    #popup-question::placeholder {
        font-size: 1.6rem;
    }

    #popup-question {
        border: none;
        width: 90%;
        font-size: 1.6rem;
        padding: 10px 35px;
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
    }

    .popup {
        background-color: #fff;
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
        height: 500px;
        width: 50%;
        padding: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .edit-icon,
    .delete-icon {
        cursor: pointer;
        font-size: 1.5rem;
        float:right;
    }

    #popup-answer-type {
        flex-wrap: wrap;
        width: 90%;
        display: flex;
        align-items: center;
        justify-content: space-around;
        margin-top: 30px;
    }

    .radio-box {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1rem;
    }

    #popup-cancel-button {
        border: 2px solid #6883fb;
        background-color: #ffffff;
        color: #6883fb;
        padding: 5px 20px;
        border-radius: 10px;
        font-size: 1.6rem;
    }

    #popup-save-button {
        border: 2px solid #6883fb;
        background-color: #6883fb;
        color: #ffffff;
        padding: 5px 20px;
        border-radius: 10px;
        font-size: 1.6rem;
    }

    #add-question-button {
        border: 2px solid #6883fb;
        background-color: #ffffff;
        color: #6883fb;
        height: 60px;
        width: 200px;
        font-size: 1.6rem;
        margin-top: 40px;
        border-radius: 15px;
        transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
    }

    @media only screen and (max-device-width: 1200px) {
        .flex-container {
            flex-direction: column !important;
        }

        .content .flex-container .form-container {
            width: 100%;
        }

        .content .flex-container .share-box {
            margin: 2rem 0rem;
            align-self: center;
        }
    }

    @media only screen and (max-device-width: 768px) {
        .content .flex-container .share-box {
            min-width: 100%;
        }

        .content .heading-box h1 {
            font-size: 32px !important;
        }

        .popup {
            width: 95%;
        }
    }

    .tab {
        display: none;
/*        width: 100%;*/
    }

    .tab-button {
        border: none;
        font-size: 30px;
        background-color: white;
    }

    .checkbox-content {
        display: flex;
        align-items: center;
    }

    .checkbox-content label {
        margin-right: 5px;
    }

    .radiobox-content {
        display: flex;
        align-items: center;
    }

    .radiobox-content label {
        margin-right: 5px;
    }


    .button-gap {
        margin-left: 10px;
        font-size: 25px;
        margin-right: 50px;
        color: #6883FB;
        border-radius: 10px;
        width: 150px;
    }

    .close-gap {
        margin-left: 5px;
        font-size: 25px;
        margin-right: 50px;
        color: #6883FB;
        border-radius: 10px;
        width: 100px;
        height: 40px;
    }

    .checkbox-content{
        margin-top: 10px;
    }

    .radiobox-content{
        margin-top: 10px;
    }

    .text {
        font-size: 25px;
        margin-right: 40px;
        color: #6883FB;
        border-radius: 10px;
    }

    .inputCheck,
    .inputRadio,
    .inputLabel {
        display: inline !important;
        margin-right: 15px;
    }
    .tab-content{
        width: 100%;
    }
    </style>

</head>

<body>
    <?php include 'navbar.php'?>

    <div class="content">
        <div class="heading-box">
            <h1 style="font-size:40px">Health Details Form</h1>
            <button id="save">Save</button>
        </div>

        <div class="flex-container">
            <div class="form-container">
                <?php if (isset($_GET['form_id'])):
    $query = "SELECT * FROM dietitian_forms WHERE dietitian_id = '{$_SESSION['dietitian_id']}' AND form_id = '{$_GET['form_id']}'";
    $result = $conn->query($query);
    $form = $result->fetch_assoc();endif;?>
                <div class="form-title">
                    <img src="<?=$DEFAULT_PATH?>assets/images/form-name.svg">
                    <input type="text" name="formName" id="formName" placeholder="Enter form name"
                        value="<?php if (isset($form)) {echo $form['form_name'];}?>">
                </div>



                <div id="questions-container">
                    <?php if (isset($_GET['form_id'])):

    $form = json_decode($form['questions'], true);
    foreach ($form as $que): ?>
                    <div data-question="<?= $que['que']; ?>"><label><?= $que['que']; ?></label>
                                <?php if ($que['ansType'] == "checkbox") {
                                    $options = $que['options'];
                                    foreach ($options as $key => $value) : 
                                        // $id = 'checkbox_'.$que['queId'];?>
                                        <input type="<?= $que['ansType']; ?>" name="<?= $value; ?>" id="<?= $value; ?>" value="<?= $value ?>" class="inputCheck">
                                        <label for="<?= $value; ?>" class="inputLabel"><?= $value; ?></label>
                                    <?php endforeach;
                                     
                                } else if ($que['ansType'] == "radio") {
                                    $options = $que['options'];
                                    foreach ($options as $key => $value) : ?>
                                        <input type="<?= $que['ansType']; ?>" name="<?= $que['name']; ?>" id="<?= $value; ?>" value="<?= $value; ?>" class="inputradio">
                                        <label for="<?= $value; ?>" class="inputLabel"><?= $value; ?></label>
                                    <?php endforeach;
                                } else if ($que['ansType'] == "text") { ?>
                                    <input type="<?= $que['ansType']; ?>" style="max-width:30vw;" placeholder="Answer">
                                <?php }
                                ?>
                                <span class="edit-icon" onclick="edit_from_db(this.parentElement, this.parentElement.children[1].type, Array.prototype.indexOf.call(this.parentElement.parentElement.children, this.parentElement))">✎</span><span class="delete-icon" onclick="delete_from_db(this.parentElement)">&#128465;</span>
                            </div>
                    <?php endforeach;
                    endif; ?>
                </div>
                <button type="button" id="add-question-button">Add Question</button>
                </form>

                <div class="popup-container">
                    <div class="popup">
                        <h3>Add/Edit Question</h3>
                        <input type="text" placeholder="Type your Question here..." id="popup-question">
                        <div class="tabs" id="popup-answer-type">
                            <button class="tab-button radio-box" data-tab="text"><input type="radio" name="options"
                                    class="radio" value="radio">Text Field</button>
                            <button class="tab-button radio-box" data-tab="checkbox"><input type="radio" name="options"
                                    class="radio" value="radio">Checkbox</button>
                            <button class="tab-button radio-box" data-tab="radio"><input type="radio" name="options"
                                    class="radio" value="radio">Radio Button</button>
                        </div>
                        <div class="tab-content">
                            <div class="tab" id="text">
                            </div>
                            <div class="tab" id="checkbox">
                                <div id="checkbox-button-container">
                                    <button type="button" id="add-checkbox-button"
                                        style="width:180px;height:60px;margin-right:50px;border-radius:20px;color:#6883FB;font-size:22px;border:2px solid #6883FB"><img
                                            src="<?=$DEFAULT_PATH?>assets/images/Form_plus.svg"
                                            style="margin-right:10px;margin-bottom:8px">Add Checkbox</button>
                                    <!-- <button type="button" id="table-checkbox-button"
                                        style="width:280px;height:60px;margin-right:200px;border-radius:20px;color:#6883FB;font-size:22px;border:2px solid #6883FB"><img
                                            src="<?=$DEFAULT_PATH?>assets/images/Form_plus.svg"
                                            style="margin-right:10px;margin-bottom:8px">Create a table of
                                        checkboxes</button> -->
                                </div>
                            </div>
                            <div class="tab" id="radio">
                                <div id="radiobox-button-container">
                                    <button type="button" id="add-radiobox-button"
                                        style="width:180px;height:60px;margin-right:50px;border-radius:20px;color:#6883FB;font-size:22px;border:2px solid #6883FB"><img
                                            src="<?=$DEFAULT_PATH?>assets/images/Form_plus.svg"
                                            style="margin-right:10px;margin-bottom:8px">Add Radiobox</button>
                                    <!-- <button type="button" id="table-radiobox-button"
                                        style="width:280px;height:60px;margin-right:200px;border-radius:20px;color:#6883FB;font-size:22px;border:2px solid #6883FB"><img
                                            src="<?=$DEFAULT_PATH?>assets/images/Form_plus.svg"
                                            style="margin-right:10px;margin-bottom:8px">Create a table of
                                        radiobox</button> -->
                                </div>
                            </div>
                            <div
                                style="position: absolute; bottom: 0; right: 0; width: 250px; height: 70px; display: flex; justify-content: space-around; align-items: center;">
                                <button type="button" id="popup-save-button">Save</button>
                                <button type="button" id="popup-cancel-button">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="share-box">
                <h3>Assign form to the clients</h3>

                <div class="search-box1">
                    <img src="<?=$DEFAULT_PATH?>assets/images/search.svg">
                    <input type="search" name="search" id="search" placeholder="Search clients">
                </div>

                <div id="selectedUser-box">

                    <!-- Don't Add Elements here Elements are Added With JavaScript -->
                    <?php if (isset($_GET['form_id'])) {

    $query = "SELECT * FROM `client_forms_docs` WHERE form_id = {$_GET['form_id']}";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($client = $result->fetch_assoc()) {?>
                    <div class="selectedUser">
                        <p class="userName"><?=$client['clientuserID']?></p>
                        <img data-userId="<?=$client['clientuserID']?>" data-clientId="<?=$client['client_id']?>"
                            class="removeClient" src="<?=$DEFAULT_PATH?>assets/images/CrossX.svg" alt="Remove"
                            title="Remove">
                    </div>

                    <?php }}}?>

                </div>

                <ul id="usersList">

                    <!-- Don't Add Elements here Elements are Added With JavaScript -->

                    <?php $query = "SELECT * FROM addclient WHERE dietitianuserID = '{$_SESSION['dietitianuserID']}'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($client = $result->fetch_assoc()) {
        $query2 = "SELECT * FROM `client_forms_docs` WHERE form_id = {$_GET['form_id']} AND clientuserID = '{$client['clientuserID']}'";
        $result2 = $conn->query($query2);
        if ($result2->num_rows < 1) {?>
                    <li>
                        <input class="addClient" data-userId="<?=$client['clientuserID']?>"
                            data-clientId="<?=$client['client_id']?>" type="checkbox" name="checkBox" id="checkBox">
                        <label for="checkBox" class="userName"><?=$client['clientuserID']?></label>
                    </li>
                    <?php
            // code...
        } }}?>

                </ul>
            </div>
        </div>
    </div>
    <?php require 'constant/scripts.php';?>
    <script>
    // Get all tab buttons
    const tabButtons = document.querySelectorAll('.tab-button');

    // Get the tab content
    const tabContent = document.querySelector('.tab-content');

    // Add click event listener to each tab button
    tabButtons.forEach((button) => {
        const input = button.querySelector('input');
        button.addEventListener('click', (event) => {
            const tabName = event.target.dataset.tab;
            openPopup('', tabName, -1);
            input.checked = true;
            showTab(tabName);
        });
    });

    // Function to show the selected tab
    function showTab(tabName) {
        // Hide all tabs
        const tabs = document.querySelectorAll('.tab');
        tabs.forEach((tab) => {
            tab.style.display = 'none';
        });

        // Show the selected tab
        const selectedTab = document.getElementById(tabName);
        if (selectedTab) {
            selectedTab.style.display = 'block';
        }
    }

    function hideTab(tabName) {
        // Hide all tabs
        const tabs = document.querySelectorAll('.tab');
        // Show the selected tab
        const selectedTab = document.getElementById(tabName);
        if (selectedTab) {
            selectedTab.style.display = 'none';
        }
    }

    // Initially show the first tab
    showTab('text');
    </script>
    <script>
    var editedQuestionIndex = -1;

        function generate_checkbox_content(label) {
            const checkboxContainer = document.getElementById('checkbox-button-container');
                
            const checkboxId = 'checkbox-option' + (checkboxContainer.children.length + 1);

            const checkboxDiv = document.createElement('div');
            checkboxDiv.classList.add('checkbox-content');

            const checkboxInput = document.createElement('input');
            checkboxInput.type = 'checkbox';
            checkboxInput.id = checkboxId;
            checkboxInput.name = checkboxId;

            const checkboxLabel = document.createElement('label');
            checkboxLabel.htmlFor = checkboxId;

            const labelTextInput = document.createElement('input');
            labelTextInput.type = 'text';
            labelTextInput.placeholder = 'Label Text';
            labelTextInput.classList.add('text');

            const labelButton = document.createElement('button');
            labelButton.textContent = 'Save';
            labelButton.classList.add('button-gap');
            labelButton.addEventListener('click', function() {
                checkboxLabel.textContent = labelTextInput.value;
                checkboxInput.value = labelTextInput.value;
                // var question = checkboxInput.id;
                checkboxDiv.removeChild(labelTextInput);
                checkboxDiv.removeChild(labelButton);
            });

            const closeButton = document.createElement('button');
            closeButton.textContent = 'X';
            closeButton.classList.add('close-gap');
            closeButton.addEventListener('click', function() {
                checkboxContainer.removeChild(checkboxDiv);
            });

            if (editedQuestionIndex !== -1) {
                labelTextInput.value = label;
            }

            checkboxDiv.appendChild(checkboxInput);
            checkboxDiv.appendChild(checkboxLabel);
            checkboxDiv.appendChild(labelTextInput);
            checkboxDiv.appendChild(labelButton);
            checkboxDiv.appendChild(closeButton);

            checkboxContainer.appendChild(checkboxDiv);
    }
        function generate_radiobox_content(label){
        const radioboxContainer = document.getElementById('radiobox-button-container');
        let num = 1;
        const name = "radio_box_" + num;
            const radioboxId = 'radiobox-option' + (radioboxContainer.children.length + 1);

            const radioboxDiv = document.createElement('div');
            radioboxDiv.classList.add('radiobox-content');

            const radioboxInput = document.createElement('input');
            radioboxInput.type = 'radio';
            radioboxInput.id = radioboxId;
            radioboxInput.name = name;

            const radioboxLabel = document.createElement('label');
            radioboxLabel.htmlFor = radioboxId;

            const labelTextInput = document.createElement('input');
            labelTextInput.type = 'text';
            labelTextInput.placeholder = 'Label Text';
            labelTextInput.classList.add('text');

            const labelButton = document.createElement('button');
            labelButton.textContent = 'Save';
            labelButton.classList.add('button-gap');
            labelButton.addEventListener('click', function() {
                radioboxLabel.textContent = labelTextInput.value;
                radioboxInput.value = labelTextInput.value;
                radioboxDiv.removeChild(labelTextInput);
                radioboxDiv.removeChild(labelButton);
            });

            const closeButton = document.createElement('button');
            closeButton.textContent = 'X';
            closeButton.classList.add('close-gap');
            closeButton.addEventListener('click', function() {
                radioboxContainer.removeChild(radioboxDiv);
            });

            if (editedQuestionIndex !== -1) {
                labelTextInput.value = label;
            }

            radioboxDiv.appendChild(radioboxInput);
            radioboxDiv.appendChild(radioboxLabel);
            radioboxDiv.appendChild(labelTextInput);
            radioboxDiv.appendChild(labelButton);
            radioboxDiv.appendChild(closeButton);

            radioboxContainer.appendChild(radioboxDiv);
            num+=1;
    }
    function edit(index){
        let questionsContainer = document.getElementById('questions-container');
        console.log(index);
        let element_to_edit = questionsContainer.children[index];
        let answerType = document.getElementById('popup-answer-type').value;
        console.log(element_to_edit);
        let inputs = element_to_edit.querySelectorAll('input');
        let inputs_id = [];
        console.log(inputs);
        inputs.forEach((input) => {
            inputs_id.push(input.value);
        });
        console.log(inputs_id);
        if (answerType === "checkbox") {
            let checkboxDiv = document.querySelectorAll('.checkbox-content');
            if (checkboxDiv.length < 1){
                for (let index = 0; index < inputs_id.length; index++) {
                    let id1 = inputs_id[index];
                    generate_checkbox_content(id1);
                }    
            }
        }

        if (answerType === "radio") {
            let radioboxDiv = document.querySelectorAll('.radiobox-content');
            if (radioboxDiv.length < 1) {
                for (let index1 = 0; index1 < inputs_id.length; index1++) {
                    let id2 = inputs_id[index1];
                    generate_radiobox_content(id2);
                }
            }
        }
    }
    // Function to open the popup window for adding/editing a question
    function openPopup(question, answerType, index) {
        console.log(answerType);
        var popupContainer = document.querySelector('.popup-container');
        popupContainer.style.display = 'block';

        document.getElementById('popup-question').value = question;
        document.getElementById('popup-answer-type').value = answerType;

        editedQuestionIndex = index;
    }

    // Function to close the popup window
    function closePopup() {
        var popupContainer = document.querySelector('.popup-container');
        popupContainer.style.display = 'none';

        editedQuestionIndex = -1;
    }

    function delete_from_db(a) {
        a.parentElement.removeChild(a);
    }
    function edit_from_db(a, b, c){
        // let answerType = document.getElementById('popup-answer-type').value;
        console.log(a, b, c)
        openPopup(a.dataset.question, b, c);
        showTab(b);
        if (b === "text") {
            tabButtons[0].querySelector('input').checked = true;
        }
        if (b === "checkbox") {
            tabButtons[1].querySelector('input').checked = true;
        }
        if (b === "radio") {
            tabButtons[2].querySelector('input').checked = true;
        }
        edit(c);
    }

    // Function to add a question to the form
    function addQuestion(question, answerType, editedQuestionIndex) {
        const questionsContainer = document.getElementById('questions-container');

        var questionElement = document.createElement('div');
        questionElement.setAttribute('data-question', question);
        var labelElement = document.createElement('label');
        labelElement.textContent = question;
        questionElement.appendChild(labelElement);

        var inputElement;
        if (answerType === 'text') {
            inputElement = document.createElement('input');
            inputElement.type = 'text';
            inputElement.placeholder = 'Answer';
            questionElement.appendChild(inputElement);
        } else if (answerType === 'radio') {
            let radioElementParent = document.getElementById('radiobox-button-container');
            let radioElement = radioElementParent.querySelectorAll('.radiobox-content');

            let radioInputValues = [];

            radioElement.forEach(function(element){
                let radioInput = element.querySelector('input');
                let radioInputValue = {};
                radioInputValue.id = radioInput.id
                radioInputValue.label = radioInput.value;
                radioInputValue.name = radioInput.name;
                radioInputValues.push(radioInputValue);
            });

            radioInputValues.forEach(function(value){
                let inputRadio = document.createElement('input');
                inputRadio.type = answerType;
                inputRadio.id = value.id;
                inputRadio.name = value.name;
                inputRadio.value = value.label;

                let radioLabel = document.createElement('label');
                radioLabel.htmlFor = value.id;
                radioLabel.textContent = value.label;
                radioLabel.className = 'inputLabel';

                questionElement.appendChild(inputRadio);
                questionElement.appendChild(radioLabel);
            });
        } else if (answerType === 'checkbox') {
            let checkElementParent = document.getElementById('checkbox-button-container');
            let checkElement = checkElementParent.querySelectorAll('.checkbox-content');

            let checkInputValues = [];

            checkElement.forEach(function(element){
                let checkInput = element.querySelector('input');
                let checkInputValue = {};
                checkInputValue.id = checkInput.id
                checkInputValue.label = checkInput.value;
                checkInputValues.push(checkInputValue);
            });
            console.log('checkInputValues' ,checkInputValues);

            checkInputValues.forEach(function(value){
                let inputCheck = document.createElement('input');
                inputCheck.type = answerType;
                inputCheck.id = value.id;
                inputCheck.name = value.id;
                inputCheck.value = value.label;

                let checkLabel = document.createElement('label');
                checkLabel.htmlFor = value.id;
                checkLabel.textContent = value.label;
                checkLabel.className = 'inputLabel';

                questionElement.appendChild(inputCheck);
                questionElement.appendChild(checkLabel);
            });
        }
        var editIcon = document.createElement('span');
        editIcon.classList.add('edit-icon');
        editIcon.innerHTML = '&#9998;';
        editIcon.addEventListener('click', function() {
            openPopup(question, answerType, Array.from(questionElement.parentNode.children).indexOf(
                questionElement));
            if (answerType === "text") {
                tabButtons[0].querySelector('input').checked = true;
            }
            if (answerType === "checkbox") {
                tabButtons[1].querySelector('input').checked = true;
            }
            if (answerType === "radio") {
                tabButtons[2].querySelector('input').checked = true;
            }
            showTab(answerType);
            edit(Array.from(questionElement.parentNode.children).indexOf(
                questionElement));
        });
        questionElement.appendChild(editIcon);

        var deleteIcon = document.createElement('span');
        deleteIcon.classList.add('delete-icon');
        deleteIcon.innerHTML = '&#128465;';
        deleteIcon.addEventListener('click', function() {
            questionElement.parentNode.removeChild(questionElement);
        });
        questionElement.appendChild(deleteIcon);
        if (editedQuestionIndex !== -1) {
            if (answerType === "checkbox" || answerType === "radio") {
                questionsContainer.insertBefore(questionElement, questionsContainer.children[editedQuestionIndex+1]);
                questionsContainer.removeChild(questionsContainer.children[editedQuestionIndex]);
            }
        } else {
        questionsContainer.appendChild(questionElement);
    }
    }

    // Event listener for "Add Question" button
    var addButton = document.getElementById('add-question-button');
    addButton.addEventListener('click', function() {
        openPopup('', 'text', -1);
    });

    // Event listener for popup "Save" button
    var popupSaveButton = document.getElementById('popup-save-button');
    popupSaveButton.addEventListener('click', function() {
        var question = document.getElementById('popup-question').value;
        var answerType = document.getElementById('popup-answer-type').value;

        const checkboxContainer = document.getElementById('checkbox-button-container');
        const radioboxContainer = document.getElementById('radiobox-button-container');
        const labelTextInput = document.getElementsByClassName('text');
        const labelButton = document.getElementsByClassName('button-gap');

        if (editedQuestionIndex !== -1) {
            if (answerType === "text") {
                // Editing existing question
                var questionElement = document.getElementById('questions-container').children[editedQuestionIndex];
                var labelElement = questionElement.querySelector('label');
                labelElement.textContent = question;
                labelElement.parentElement.setAttribute('data-question', question);
                questionElement.querySelector('input').type = answerType;
            }

            if (answerType === "checkbox") {
                if (labelTextInput.length > 0 || labelButton.length > 0) {
                    alert('Please save changes');
                    return false;
                } else if (checkboxContainer.querySelectorAll('.checkbox-content').length < 1) {
                    alert('Please Add Options');
                    return false;
                } else {
                        addQuestion(question, answerType, editedQuestionIndex);
                        let checkboxDivWrap = document.querySelectorAll('.checkbox-content');
                            console.log('checkboxDivWarp not -1',checkboxDivWrap);
                            if (checkboxDivWrap.length !== 0) {
                                checkboxDivWrap.forEach((content) => {
                                    checkboxContainer.removeChild(content);
                                });
                            tabButtons[1].querySelector('input').checked = false;
                            hideTab(answerType);
                    }
                } 
        }

            if (answerType === "radio") {
                if (labelTextInput.length > 0 || labelButton.length > 0) {
                    alert('Please save changes');
                    return false;
                } else if (radioboxContainer.querySelectorAll('.radiobox-content').length < 1) {
                    alert('Please Add Options');
                    return false;
                } else {
                    addQuestion(question, answerType, editedQuestionIndex);
                    let radioboxDivWrap = document.querySelectorAll('.radiobox-content');
                    console.log(radioboxDivWrap);
                    if (radioboxDivWrap.length !== 0) {
                        radioboxDivWrap.forEach((content) => {
                            radioboxContainer.removeChild(content);
                        });
                    tabButtons[2].querySelector('input').checked = false;
                    hideTab(answerType);
                    } 
                }
            }           
        } else {
            // Adding new question
            if (question !== "") {
                if (answerType === "text"){
                    addQuestion(question, answerType, editedQuestionIndex);
                }

                if (answerType === "checkbox"){
                    // console.log(labelTextInput.length);
                    if (labelTextInput.length > 0 || labelButton.length > 0) {
                        alert('Please save option');
                        return false;
                    } else if (checkboxContainer.querySelectorAll('.checkbox-content').length < 1) {
                        alert('Please Add Options');
                        return false;
                    } else {
                        addQuestion(question, answerType, editedQuestionIndex);
                        let checkboxDivWrap = document.querySelectorAll('.checkbox-content');
                        if (checkboxDivWrap.length !== 0) {
                            checkboxDivWrap.forEach((content) => {
                                checkboxContainer.removeChild(content);
                            });
                        tabButtons[1].querySelector('input').checked = false;
                        hideTab(answerType);
                        }
                    }
                }

                if (answerType === "radio") {
                    if (labelTextInput.length > 0 || labelButton.length > 0) {
                        alert('Please save option');
                        return false;
                    } else if (radioboxContainer.querySelectorAll('.radiobox-content').length < 1) {
                        alert('Please Add Options');
                        return false;
                    } else {
                        addQuestion(question, answerType, editedQuestionIndex);
                        let radioboxDivWrap = document.querySelectorAll('.radiobox-content');
                        console.log(radioboxDivWrap);
                        if (radioboxDivWrap.length !== 0) {
                            radioboxDivWrap.forEach((content) => {
                                radioboxContainer.removeChild(content);
                            });
                        tabButtons[2].querySelector('input').checked = false;
                        hideTab(answerType);
                        }
                    }
                }
            } else {
                return;
            }
        }

        closePopup();
    });

    // Event listener for popup "Cancel" button
    var popupCancelButton = document.getElementById('popup-cancel-button');
    popupCancelButton.addEventListener('click', closePopup);

    const saveForm = document.getElementById('save');
    const formName = document.getElementById('formName');
    saveForm.addEventListener('click', () => {
        if (formName.value == "") {
            formName.style.border = '1px solid red';
        } else {
            formName.style.border = 'none';
        }
        const allQuestions = document.querySelectorAll('[data-question]');
        console.log(allQuestions);
        const formQuestions = [];
        let i = 1;
        allQuestions.forEach(el => {
            const input = el.querySelectorAll('input');
            let ids = [];
            let labels = [];
            let type = '';
            let name = '';
            let optionsArray = [];
            let optionsPair = {};
            if (input.length > 0) {
                input.forEach((value) => {
                    let id = value.id;
                    let label = value.value;
                    ids.push(id);
                    labels.push(label);
                    type = value.type;
                    name = value.name;
                });
                for (var a = 0; a < ids.length; a++) {
                    optionsPair['option_' + a] = labels[a];
                }
                optionsArray.push(optionsPair);
            }
            const question = el.getAttribute('data-question');
            let queArray = {}
            if (type == "radio") {
                queArray = {
                    queId: i,
                    que: question,
                    ansType: type,
                    options: optionsPair,
                    name: name
                };
            } else if (type == "checkbox") {
                queArray = {
                    queId: i,
                    que: question,
                    ansType: type,
                    options: optionsPair
                };
            } else {
                queArray = {
                    queId: i,
                    que: question,
                    ansType: type
                };
            }
            formQuestions.push(queArray);
        });

        console.log(formQuestions);
        const form = $('<form action="" method="post"></form>');
        form.append(`<input type="hidden" name="saveForm" value="true">`);
        form.append(`<input type="hidden" name="formName" value="${formName.value}">`);
        form.append(`<input type="hidden" name="questions" value='${JSON.stringify(formQuestions)}'>`);
        form.append(`<input type="hidden" name="queCount" value="${formQuestions.length}">`);
        $('body').append(form);
        form.submit();
    });
    document.addEventListener('DOMContentLoaded', function() {
        const addCheckboxButton = document.getElementById('add-checkbox-button');

        addCheckboxButton.addEventListener('click', function() {
            generate_checkbox_content('');
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        const addRadioboxButton = document.getElementById('add-radiobox-button');

        addRadioboxButton.addEventListener('click', function() {
            generate_radiobox_content('');
        });
    });

    const addClient = document.querySelectorAll('.addClient');
    addClient.forEach(client => {
        client.addEventListener('click', () => {

            const clientId = client.getAttribute('data-clientId');
            const userId = client.getAttribute('data-userId');
            const form = $('<form action="" method="post"></form>');
            form.append(`<input type="hidden" name="addClient" value="true">`);
            form.append(`<input type="hidden" name="clientId" value='${clientId}'>`);
            form.append(`<input type="hidden" name="userId" value='${userId}'>`);
            $('body').append(form);
            form.submit();
        });
    });

    const removeClient = document.querySelectorAll('.removeClient');
    removeClient.forEach(client => {
        client.addEventListener('click', () => {

            const clientId = client.getAttribute('data-clientId');
            const userId = client.getAttribute('data-userId');
            const form = $('<form action="" method="post"></form>');
            form.append(`<input type="hidden" name="removeClient" value="true">`);
            form.append(`<input type="hidden" name="clientId" value='${clientId}'>`);
            form.append(`<input type="hidden" name="userId" value='${userId}'>`);
            $('body').append(form);
            form.submit();
        });
    });
    </script>

</body>

</html>