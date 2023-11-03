<?php
// error_reporting(0);
ob_start();
include ('navbar.php');

if (isset($_SESSION['dietitianuserID'])) {
    $id = $_SESSION['dietitianuserID'];
    $sql = "SELECT * FROM addclient WHERE dietitianuserID='$id'";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) < 1) {
        header('Location:clientlist.php');
    }
}

if (isset($_POST['clientList'])) {
    $clients = json_decode($_POST['clientList'], true);
    if (is_array($clients)) {
        foreach ($clients as $clientID) {
            $query = "UPDATE addclient set status = 0 where client_id = '$clientID'";
            if ($conn) {
                $conn->query($query);
            }
        }
    }
}
$output = ob_get_contents();
ob_end_clean();
echo $output;
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Client List</title>
</head>
<style>
::placeholder {
	color: #BBBBBB;
	opacity: 1;
}

body {
	font-family: 'NATS', sans-serif !important;
	overflow-x: hidden !important;
}

.clients {
	margin-left: 17rem;
	font-weight: 400;
	margin-top: 2rem;
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
	font-weight: 400;
	border: none;
	display: flex;
	padding-top: 0.5rem;
	padding-right: 1rem;
	padding-left: 0.5rem;
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
	width: 343px;
	margin-top: 1rem;
	color: #BBBBBB;
	background-color: white;
	box-shadow: 0.6px 0.6px 2px 1px #ccc;
	border-radius: 0.6rem;
	font-size: 20px;
	font-weight: 400;
	border: none;
	display: flex;
	padding-top: 0.5rem;
	padding-right: 0.5rem;
	margin-right: 1rem;
	position: relative;
}

#btn3 {
	width: auto;
	background-color: white;
	border: none;
	color: #ACACAC;
	margin-left: 0.5rem;
}

.seach_clients_text {
	border: none;
	outline: none;
}

.clients_container2 {
	margin-top: 2rem;
	font-size: 25px;
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
	border-radius: 17px;
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

#btn4 {
	background-color: white;
	border-color: #4B9AFB;
	border-radius: 0.3rem;
	font-size: 0.8rem;
	margin-top: 0.8rem;
	width: auto;
}

#add_set_client {
	margin-left: 5rem !important;
}

#goals {
	position: fixed;
	bottom: 0;
	left: 20%;
	display: flex;
	justify-content: space-evenly;
	align-items: center;
	padding: 10px 5px;
	width: 70%;
	margin: 0 auto;
	margin-bottom: 1rem;
	border-radius: 10px;
	display: none;
	transition: all 0.4 ease-in-out !important;
}

#del {
	position: fixed;
	bottom: 0;
	left: 20%;
	display: flex;
	justify-content: space-evenly;
	align-items: center;
	padding: 10px 5px;
	width: 70%;
	margin: 0 auto;
	margin-bottom: 1rem;
	border-radius: 10px;
	display: none;
	transition: all 0.4 ease-in-out !important;
}

#toast {
	position: fixed;
	bottom: 0;
	left: 20%;
	display: flex;
	justify-content: space-evenly;
	align-items: center;
	padding: 10px 5px;
	width: 70%;
	margin: 0 auto;
	margin-bottom: 1rem;
	border-radius: 10px;
	display: none;
	transition: all 0.4 ease-in-out !important;
}

#toast__h1 {
	font-family: 'NATS';
	font-style: normal;
	font-weight: 400;
	font-size: 30px;
	color: #000000;
}

.goalbtn {
	background: #9C74F5;
	color: #FFFFFF;
	box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
	border-radius: 10px;
	transition: all 0.2 .2 ease-in;
}

.reminderbtn {
	background: #9C74F5;
	color: #FFFFFF;
	box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
	border-radius: 10px;
	transition: all 0.2 .2 ease-in;
}

.deletebtn {
	background: red;
	color: #FFFFFF;
	box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
	border-radius: 10px;
	transition: all 0.2 .2 ease-in;
}

.btn2 {
	color: #9C74F5 !important;
	background: #FFFFFF;
	border: 1px solid #9C74F5;
	box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
	border-radius: 10px;
}

.btn {
	font-family: 'NATS';
	font-style: normal;
	font-weight: 400;
	font-size: 25px;
	margin: 0 5px;
}

.cancel-btn {
	color: #9C74F5 !important;
	background: #FFFFFF;
	border: 1px solid #9C74F5;
	box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
	border-radius: 10px;
	width: 120px;
}

.del-btn {
	background: red;
	color: #FFFFFF;
	box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
	border-radius: 10px;
	transition: all 0.2 .2 ease-in;
	width: 120px;
}

.myCheckboxs {
	position: absolute;
	top: 10%;
	right: 6%;
	display: none;
	border: 1px solid #7282FB;
}

.modal {
	position: fixed;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0.6);
	transition: opacity 500ms;
	align-items: center;
}

.modal-content {
	width: 400px;
	height: 250px;
	padding: 50px;
	border-radius: 25px;
	margin: 200px;
	margin-left: 550px;
	margin-top: 220px;
	overflow: hidden;
}

.modal-content .pop {
	margin-left: 15px;
	text-align: center;
}

.modal-content .pop br {
	margin-left: 10px;
}

.modal-content .delete {
	margin-top: 20px;
}

.modal-content .close {
	position: absolute;
	top: 10px;
	right: 20px;
	transition: all 200ms;
	font-size: 30px;
	font-weight: bold;
	text-decoration: none;
	color: #333;
	background: none;
	border: none;
}

@media screen and (max-width: 720px) {
	.clients {
		margin-left: 2rem;
	}
	.search_client {
		width: auto;
	}
	#suggestion-list {
		width: auto;
	}
	.clients_container {
		display: flex;
		flex-direction: column;
		gap: 1rem;
	}
	.add_set_client {
		font-size: 0.8rem;
	}
	#add_set_client {
		margin-left: 0% !important;
	}
	.modal-content {
		margin-left: 0rem;
		width: 400px;
	}
	.add_set {
		font-size: 25px;
		font-weight: 400;
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
		gap: 0.5rem;
		max-width: fit-content;
		margin-left: 0rem !important;
	}
	.clients_container3 {
		display: none;
	}
	#toast {
		position: inherit;
		flex-direction: column;
		width: 100% !important;
		margin-left: 0 !important;
	}
	#goals {
		position: inherit;
		flex-direction: column;
		width: 100% !important;
		margin-left: 0 !important;
	}
	#del {
		position: inherit;
		flex-direction: column;
		width: 100% !important;
		margin-left: 0 !important;
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
	width: 150px;
	flex-basis: 300px;
	background: #FAFAFA;
	border-radius: 15px;
	position: relative;
}

.client-item:hover {
	border: 1px solid #D9D9D9;
	box-shadow: 0px 10px 15px rgba(136, 136, 136, 0.05);
}

.button-top {
	border: none;
	background: white;
}

.button-top:focus {
	border-bottom: 4px solid #4B9AFB;
}

.button-top.active {
	border-bottom: 4px solid #4B9AFB;
}

.button-top:hover {
	border-bottom: 4px solid #4B9AFB;
}

@media screen and (max-width: 1100px) {
	#toast {
		position: inherit;
		flex-direction: column;
		margin-left: 13.5rem;
		/* width:70%; */
	}
	#goals {
		position: inherit;
		flex-direction: column;
		margin-left: 13.5rem;
		/* width:70%; */
	}
	#del {
		position: inherit;
		flex-direction: column;
		margin-left: 13.5rem;
	}
	.clients_container {
		display: flex !important;
		flex-direction: column !important;
		gap: 0.5rem;
	}
	.clients_operations {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		margin-left: -10rem;
	}
	.search_client {
		width: auto;
	}
	#suggestion-list {
		width: auto;
	}
}

#suggestion-list {
	position: absolute;
	width: 343px;
	background: #FFF;
	box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.25);
	border-radius: 10px;
	border: 1px solid #ccc;
	overflow: hidden;
	z-index: 999;
	display: none;
}
</style>

<body>
	<div class="clients">
		<p style="font-size: 40px; font-weight: 500">Clients</p>
		<div class="clients_container">
			<div class="search_client"
				style="justify-content: center; align-items: center">
				<div>
					<button id="btn3">
						<span class="material-symbols-outlined">search</span>
					</button>
				</div>
				<div
					style="margin-left: 1rem; margin-right: 4rem; margin-bottom: 0.5rem;">
					<input type="text" name="search_client"
						placeholder="Search Clients" class="seach_clients_text"
						id="form-search">
				</div>
				<div id="suggestion-list"></div>
			</div>


			<div class="clients_operations">
				<div class="add_set_client" id="add_set_client">
					<div>
						<a href="add_client.php"><button id="btn1">
								<span class="material-symbols-outlined">add</span>
							</button></a>
					</div>
					<div class="add_set">
						<span">Add Clients</span>
					</div>
				</div>
				<div onclick="showSetGoalsPopUp('Set Goals');" class="add_set_client">
					<div>
						<button id="btn1">
							<span class="material-symbols-outlined">settings</span>
						</button>
					</div>
					<div class="add_set">
						<span>Set Goals</span>
					</div>
				</div>

				<div onclick="showSetRemindersPopUp('Set Reminders');" class="add_set_client">
					<div>
						<button id="btn1">
							<span class="material-symbols-outlined">notification_add</span>
						</button>
					</div>
					<div class="add_set">
						<span>Set Reminders</span>
					</div>
				</div>
				<div onclick="showDeleteClientsPopUp('Delete Clients');" class="delete_client">
					<button id="btn2">
						<span class="material-symbols-outlined">delete</span>
					</button>
				</div>
			</div>
		</div>

		<div class="clients_container2">
			<a class="button-top active-button text-dark" name="active-btn"
				data-filter="active-btn">Active</a> <a
				class="button-top pending-btn text-dark" name="pending-btn"
				style="margin-left: 2rem" data-filter="pending-btn">Pending</a>
		</div>
		<br> <br>

		<div class="client-container"></div>
	</div>

	<div id="goals">
		<h1 id="toast__h1">Select the clients for whom you want to set the
			general fitness goals!</h1>
		<div id="toast__btns">
			<form action="" method="POST" id='form'>
				<input style='cursor: pointer' id='form__input' type='text' hidden
					name='clientList' value=''>
				<button type="submit" class="btn goalbtn">
					<span> <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
							xmlns="http://www.w3.org/2000/svg">
                            <path
								d="M15.3767 3.99431V8.54725H13.859V3.99431M13.859 10.0649H15.3767V11.5825H13.859M7.02961 0.200195C6.6271 0.200195 6.24108 0.36009 5.95647 0.644704C5.67185 0.929318 5.51196 1.31534 5.51196 1.71784C5.50663 1.7911 5.50663 1.86464 5.51196 1.9379C3.32655 2.5829 1.71784 4.61655 1.71784 7.02961V11.5825L0.200195 13.1002V13.859H13.859V13.1002L12.3414 11.5825V7.02961C12.3414 4.61655 10.7327 2.5829 8.54725 1.9379C8.55258 1.86464 8.55258 1.7911 8.54725 1.71784C8.54725 1.31534 8.38736 0.929318 8.10275 0.644704C7.81813 0.36009 7.43211 0.200195 7.02961 0.200195ZM5.51196 14.6178C5.51196 15.0203 5.67185 15.4064 5.95647 15.691C6.24108 15.9756 6.6271 16.1355 7.02961 16.1355C7.43211 16.1355 7.81813 15.9756 8.10275 15.691C8.38736 15.4064 8.54725 15.0203 8.54725 14.6178H5.51196Z"
								fill="white" />
                        </svg>
					</span><span class='btn__span'></span>
				</button>
				<button onclick='close()' class="btn btn2">Cancel</button>
			</form>
		</div>
	</div>
	<div id="toast">
		<h1 id="toast__h1">Select the clients for whom you want the reminders
			to be set!</h1>
		<div id="toast__btns">
			<form action="" method="POST" id='form1'>
				<input style='cursor: pointer' id='form__input1' type='text' hidden
					name='clientList' value=''>
				<button type="submit" class="btn reminderbtn">
					<span> <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
							xmlns="http://www.w3.org/2000/svg">
                            <path
								d="M15.3767 3.99431V8.54725H13.859V3.99431M13.859 10.0649H15.3767V11.5825H13.859M7.02961 0.200195C6.6271 0.200195 6.24108 0.36009 5.95647 0.644704C5.67185 0.929318 5.51196 1.31534 5.51196 1.71784C5.50663 1.7911 5.50663 1.86464 5.51196 1.9379C3.32655 2.5829 1.71784 4.61655 1.71784 7.02961V11.5825L0.200195 13.1002V13.859H13.859V13.1002L12.3414 11.5825V7.02961C12.3414 4.61655 10.7327 2.5829 8.54725 1.9379C8.55258 1.86464 8.55258 1.7911 8.54725 1.71784C8.54725 1.31534 8.38736 0.929318 8.10275 0.644704C7.81813 0.36009 7.43211 0.200195 7.02961 0.200195ZM5.51196 14.6178C5.51196 15.0203 5.67185 15.4064 5.95647 15.691C6.24108 15.9756 6.6271 16.1355 7.02961 16.1355C7.43211 16.1355 7.81813 15.9756 8.10275 15.691C8.38736 15.4064 8.54725 15.0203 8.54725 14.6178H5.51196Z"
								fill="white" />
                        </svg>

					</span><span class='btn__span1'></span>
				</button>
				<button onclick='close()' class="btn btn2">Cancel</button>

			</form>
		</div>
	</div>

	<div id="del">
		<h1 id="toast__h1">Select the clients you want to remove!</h1>
		<div id="toast__btns">
			<form action="" method="POST" id='form2'>
				<input style='cursor: pointer' id='form__input2' type='text' hidden
					name='clientList' value=''> <input hidden value='name'
					name="clients">
				<button type="button" class="btn deletebtn" id="myBtn">
					<span> <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
							xmlns="http://www.w3.org/2000/svg">
                            <path
								d="M15.3767 3.99431V8.54725H13.859V3.99431M13.859 10.0649H15.3767V11.5825H13.859M7.02961 0.200195C6.6271 0.200195 6.24108 0.36009 5.95647 0.644704C5.67185 0.929318 5.51196 1.31534 5.51196 1.71784C5.50663 1.7911 5.50663 1.86464 5.51196 1.9379C3.32655 2.5829 1.71784 4.61655 1.71784 7.02961V11.5825L0.200195 13.1002V13.859H13.859V13.1002L12.3414 11.5825V7.02961C12.3414 4.61655 10.7327 2.5829 8.54725 1.9379C8.55258 1.86464 8.55258 1.7911 8.54725 1.71784C8.54725 1.31534 8.38736 0.929318 8.10275 0.644704C7.81813 0.36009 7.43211 0.200195 7.02961 0.200195ZM5.51196 14.6178C5.51196 15.0203 5.67185 15.4064 5.95647 15.691C6.24108 15.9756 6.6271 16.1355 7.02961 16.1355C7.43211 16.1355 7.81813 15.9756 8.10275 15.691C8.38736 15.4064 8.54725 15.0203 8.54725 14.6178H5.51196Z"
								fill="white" />
                        </svg>

					</span><span class='btn__span2'></span>
				</button>
				<button onclick='close()' class="btn btn2">Cancel</button>
			</form>
		</div>
	</div>
	<div id="myModal" class="modal">
		<div class="modal-content">
			<span class="close"></span>
			<div class="pop">
				<h3>
					Sure you want to <br>remove these clients?</br>
					<div class="delete">
						<button class="btn del-btn">Delete</button>
						<button class="btn cancel-btn">Cancel</button>
					</div>
			
			</div>
		</div>
	</div>


	
<script>document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("myModal");
    const btn = document.getElementById("myBtn");
    const span = document.querySelector(".close");
    const modalContent = document.getElementById("modalContent");

    // When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";

        // Load dynamic content here, for example:
        modalContent.innerHTML = "<h2>Dynamic Content</h2><p>This is dynamic content loaded into the modal.</p>";
    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
});

// Function to show the "Set Goals" pop-up
function showSetGoalsPopUp(val) {
    const popUp = document.getElementById("goals");
    const popUp1 = document.getElementById("toast");
    const popUp2 = document.getElementById("del");
    const btnSpan = document.querySelector(".btn__span");
    const myCheckBoxes = document.querySelectorAll(".myCheckboxs");

    popUp.style.display = "inline-flex";
    btnSpan.innerHTML = val;

    myCheckBoxes.forEach((item) => {
        popUp1.style.display = "none";
        popUp2.style.display = "none";
        item.style.display = "block";
    });
}

// Event delegation for the "Set Goals" button
document.body.addEventListener("click", function (event) {
    if (event.target.classList.contains("goalbtn")) {
        const btnSpan = document.querySelector(".btn__span");
        const form = document.querySelector("#form");
        const formInput = document.querySelector("#form__input");
        const selectedClients = [];

        if (btnSpan.innerHTML === "Set Goals") {
            const myCheckBoxes = document.querySelectorAll(".myCheckboxs");
            myCheckBoxes.forEach((item) => {
                if (item.checked) {
                    selectedClients.push(item.value);
                }
            });

            if (selectedClients.length > 0) {
                // If at least one client is selected, proceed to set goals
                formInput.value = JSON.stringify(selectedClients);
                form.action = "setgoals.php";
                form.submit();
            } else {
                // Inform the user that they need to select at least one client
                alert("Please select at least one client to set goals.");
            }
        }
    }
});

// Function to show the "Set Reminders" pop-up
function showSetRemindersPopUp(val) {
    const popUp = document.getElementById("goals");
    const popUp1 = document.getElementById("toast");
    const popUp2 = document.getElementById("del");
    const btnSpan1 = document.querySelector(".btn__span1");
    const myCheckBoxes = document.querySelectorAll(".myCheckboxs");

    popUp1.style.display = "inline-flex";
    btnSpan1.innerHTML = val;

    myCheckBoxes.forEach((item) => {
        popUp.style.display = "none";
        popUp2.style.display = "none";
        item.style.display = "block";
    });
}

// Event delegation for the "Set Reminders" button
document.body.addEventListener("click", function (event) {
    if (event.target.classList.contains("reminderbtn")) {
        const btnSpan1 = document.querySelector(".btn__span1");
        const form1 = document.querySelector("#form1");
        const formInput1 = document.querySelector("#form__input1");
        const selectedClients = [];

        if (btnSpan1.innerHTML === "Set Reminders") {
            const myCheckBoxes = document.querySelectorAll(".myCheckboxs");
            myCheckBoxes.forEach((item) => {
                if (item.checked) {
                    selectedClients.push(item.value);
                }
            });

            if (selectedClients.length > 0) {
                // If at least one client is selected, proceed to set reminders
                formInput1.value = JSON.stringify(selectedClients);
                form1.action = "set_reminders.php";
                form1.submit();
            } else {
                // Inform the user that they need to select at least one client
                alert("Please select at least one client to set reminders.");
            }
        }
    }
});

// Function to show the "Delete Clients" pop-up
function showDeleteClientsPopUp(val) {
    const popUp = document.getElementById("goals");
    const popUp1 = document.getElementById("toast");
    const popUp2 = document.getElementById("del");
    const btnSpan2 = document.querySelector(".btn__span2");
    const myCheckBoxes = document.querySelectorAll(".myCheckboxs");

    popUp2.style.display = "inline-flex";
    btnSpan2.innerHTML = val;

    myCheckBoxes.forEach((item) => {
        popUp.style.display = "none";
        popUp1.style.display = "none";
        item.style.display = "block";
    });
}

// Event delegation for the "Delete Clients" button
document.body.addEventListener("click", function (event) {
    if (event.target.classList.contains("deletebtn")) {
        const btnSpan2 = document.querySelector(".btn__span2");
        const form2 = document.querySelector("#form2");
        const formInput2 = document.querySelector("#form__input2");
        const selectedClients = [];

        if (btnSpan2.innerHTML === "Delete Clients") {
            const myCheckBoxes = document.querySelectorAll(".myCheckboxs");
            myCheckBoxes.forEach((item) => {
                if (item.checked) {
                    selectedClients.push(item.value);
                }
            });

            if (selectedClients.length > 0) {
                // If at least one client is selected, proceed to delete clients
                formInput2.value = JSON.stringify(selectedClients);
                form2.submit();
            } else {
                // Inform the user that they need to select at least one client
                alert("Please select at least one client to delete.");
            }
        }
    }
});

// Event delegation for the "Cancel" button
document.body.addEventListener("click", function (event) {
    if (event.target.classList.contains("cancel-btn")) {
        const modal = document.getElementById("myModal");
        const myCheckBoxes = document.querySelectorAll(".myCheckboxs");

        modal.style.display = "none";
        myCheckBoxes.forEach((item) => {
            item.style.display = "none";
        });
    }
});

    </script>
	<script>
$(document).ready(function() {

 $('.button-top').click(function (e) {
        e.preventDefault();
        $('.button-top').removeClass('active');
        $(this).addClass('active');
        var filterValue = $(this).data('filter');
        loadContent(filterValue);
        
    });

    // Trigger a click on the "active-button" by default on page load
    $('.active-button').trigger('click');




    // Function to load content on page load
    function loadContent(filterValue) {
        $.ajax({
            url: 'common/get_clients.php', // Replace with the correct URL of your AJAX page
            type: 'GET',
            data:{action: filterValue},
            dataType: 'html',
            success: function(responseData) {
			 $('.client-container').html(responseData);
            },
            error: function(error) {
                console.error('Error fetching content:', error);
            }
        });
    }

    // Add an event listener to the search input field
  function loadSearchContent(searchQuery){
  var filterValue = $('.button-top.active').data('filter');
        $.ajax({
            url: 'common/get_clients.php', // Replace with the correct URL of your AJAX page
            type: 'GET', // Use POST to send search query
            data: { action: filterValue ,search_query_independent: searchQuery}, // Send the search query data
            dataType: 'html',
            success: function(responseData) {
			  $('.client-container').html(responseData);
            },
            error: function(error) {
                console.error('Error fetching content:', error);
            }
        });
   }
   $('#form-search').on('input', function() {
    var searchQuery = $(this).val();
    if (searchQuery === "") { // Check if searchQuery is empty
     var filterValue = $('.button-top.active').data('filter');
        loadContent(filterValue); // Call the loadContent function with an empty search query
    }
});

        $('#btn3').on('click', function() {
        var searchQuery = $('#form-search').val();
        loadSearchContent(searchQuery); // Call the loadContent function with the search query
    });

    // Add an event listener for the Enter key press in the search input field
    $('#form-search').on('keydown', function(event) {
        if (event.keyCode === 13) { // Check if Enter key is pressed
            var searchQuery = $(this).val();
            loadSearchContent(searchQuery); // Call the loadContent function with the search query
        }
    });
});
    // ...
</script>
	<script>const optionalCourseValue = "";
	const specifiedTexts = ["Add Client"];</script>

</body>

</html>
