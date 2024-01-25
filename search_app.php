<?php
require('constant/constant.php');
require('constant/config.php');
global $conn;
session_start();
ob_start(); ?><?php
                if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["search_text"])) {
                    $searchText = $_POST["search_text"];
                    $tableColumnText = array(
                        "default_recipes" => array(
                            "drecipe_name" => "Recipe Name",
                            "drecipe_ingredients" => "Ingredients",
                            "drecipe_recipe" => "Recipe Instrcutions",
                            "drecipe_nutritional_information" => "Recipe Nutritions",
                            "drecipe_category" => "Recipe category",
                            "drecipe_course" => "Recipe course",
                            "drecipe_time" => "Preparation Time"
                        ),
                        "weighttracker" => array(
                            "height" => "Height",
                            "weight" => "weight",
                            "goal" => "Weight Goal"
                        ),
                        "watertracker" => array(
                            "drinkConsumed" => "water Consumed",
                            "type" => "",
                            "goal" => "Water Goal",
                            "amount" => "amount"
                        ),
                        "walkingtracker" => array(
                            "steps" => "Steps",
                            "distance" => "Walking Distance",
                            "calories" => "Calories Burnt",
                            "date" => " Walk Date",
                            "goal" => "Walk Goal"
                        ),
                        "steptracker" => array(
                            "dateandtime" => "",
                            "steps" => "Steps",
                            "goal" => "Steps Goal",
                            "calories" => "Calories",
                            "distance" => "Distance",
                            "avgspeed" => "Average Speed"
                        ),
                        "sleeptracker" => array(
                            "sleeptime" => "Sleep Time",
                            "waketime" => "Wake Time",
                            "hrsSlept" => "Hours Slept",
                            "goal" => "Sleep Goal",
                            "minsSlept" => "Minutes Slept",
                            "dateandtime" => ""
                        ),
                        "runningtracker" => array(
                            "distance" => "Running Distance",
                            "calories" => "Calories",
                            "runtime" => "Run Time",
                            "goal" => "Run Goal",
                            "date" => ""
                        ),
                        "reminders" => array(
                            "water_interval" => "Water Remainder",
                            "water_amount" => "Water Quantity Remainder",
                            "sleep_time" => "Sleep Remainder",
                            "wake_time" => "Wakeup Remainder",
                            "breakfast_time" => "breakfast Remainder",
                            "lunch_time" => "Lunch Remainder",
                            "snacks_time" => "Snacks Remainder",
                            "dinner_time" => "Dinner Remainder",

                        ), "messages" => array(
                            "message" => "Messages",
                            "messageBy" => "",
                        ),
                        "heartrate" => array(
                            "average" => "Average Heartrate",
                            "maximum" => "Maximum Heartrate",
                            "minimum" => "Minimum Heartrate",
                        ),
                        "goals" => array(
                            "steps" => "Steps",
                            "heart" => "Heart",
                            "water" => "Water",
                            "weight" => "Weight",
                            "sleep" => "Sleep",
                            "calorie" => "Calorie"

                        ),
                        "food_info" => array(
                            "name" => "Food Name",
                            "calorie" => "Calories in Food",
                            "protein" => "Proteins in Food",
                            "fibre" => "Fibre in Food",
                            "carb" => "Carbohydrates in Food",
                            "fat" => "Fats in Food"
                        ),
                        "favourite_food_items" => array(
                            "nameofFoodItem" => "Favourite Food ItemName",
                            "calorie" => "Calories in Food",
                            "protein" => "Proteins in Food",
                            "carb" => "Carbohydrates in Food",
                            "fat" => "Fats in Food"
                        ),
                        "dietitian_tasks" => array(
                            "title" => "Dietitan Tasks",
                            "description" => "Dietitian Task Description",
                            "date" => "Dieitian Task Date",
                            "start_time" => "Dietitian Task Time",
                            "end_time" => "Dietitian Task Time",
                            // "add_to_calender" => " Dietitian task calender"
                        ),
                        "dietitian_recipes" => array(
                            "recipe_name" => "Added Recipe Name",
                            "recipe_ingredients" => "Added Recipe Ingredients",
                            "recipe_recipe" => "Added Recipe instructions",
                            "recipe_courses" => "Added Recipe Course",
                            "recipe_category" => "Added Recipe Category",
                            "recipe_nutritional_information" => "Added Recipe Nutritions",
                            "recipe_time" => "Preparation Time"
                        ),
                        "dietitian_forms" => array(
                            "form_name" => "Form Name",
                            "total_que" => "",
                            "questions" => "",
                        ),
                        "create_plan" => array(
                            "profile" => "DietPlan Profile",
                            "name" => "DietPlan Name",
                            "tags" => "DietPlan Tags",
                            "duration" => "DietPlan Duration",
                            "start_date" => "DietPlan date",
                            "end_date" => "DietPlan date",
                            "features" => "DietPlan Features",
                            "description" => "DietPlan Description",
                            "price" => "DietPlan Price"
                        ),
                        "create_event" => array(
                            "eventname" => "Event Name",
                            "meeting_type" => "Event Meeting Type",
                            "start_date" => "Event Date",
                            "end_date" => "Event Date",
                            "place_of_meeting" => "Event Place",
                            "description" => "Event description",
                            "attachment" => "Event Attachment"
                        ),
                        "client" => array(
                            "name" => "Client Name",
                            "location" => "Client Location",
                            "email" => "Client Email",
                            "mobile" => "Client Mobile",
                            "plan" => "Client Plan",
                            "age" => "Client Age",
                            "height" => "Client Height",
                            "weight" => "Client Weight"
                        ),
                        "chats" => array(
                            "message" => "Message"
                        ),
                        "calorie_consumed" => array(
                            "meal" => "Meal",
                            "name" => "Name",
                            "calorie" => "Calorie",
                            "protein" => "Proteins",
                            "fibre" => "Fibres",
                            "carb" => "Carbohydrates",
                            "fat" => "Fats",
                            "goal" => "Goals"
                        ),
                        "live" => array(
                            "dietitian_id" => "",
                            "invite_code" => ""
                             ),
                        "addclient" => array(
                            "name" => "Client Name"
                        ),
                        "dietitian" => array(
                            "dietitianuserID" => "Dietitian Username"
                        ),/* 
                        "dietitian_recipes" => array(
                            "recipe_name" => "Recipe Name"
                        ), */
                        /*"diet_chart" => array(
                            "dietchart_name" => "Diet CHat Name"
                        )*/
                        "notification" => array(
                            "ttl" => "Notification Title",
                            "body" => "Notification Body"
                        )


                    );

                    $tableDisplayNames = array(
                        "default_recipes" => "Default Recipe",
                        "weighttracker" => " Weight Tracker",
                        "watertracker" => " Water Tracker",
                        "walkingtracker" => "Walking Tracker",
                        "steptracker" => "Step Tracker",
                        "sleeptracker" => "Sleep Tracker",
                        "runningtracker" => "Running Tracker",
                        "reminders" => "Remainders",
                        "messages" => "Messages",
                        "meal_tracker" => "Meal Tracker",
                        "heartrate" => "Health",
                        "goals" => "Goals",
                        "food_info" => "Food",
                        "favourite_food_items" => "Favourite Food",
                        "dietitian_tasks" => "Dietitian Tasks",
                        "dietitian_recipes" => "Dietitian Recipes",
                        "dietitian_forms" => "Dietitan Forms",
                        "create_plan" => "DietPlans",
                        "create_event" => "Events",
                        "client" => "Clients",
                        "chats" => "Chats",
                        "calorie_consumed" => "Calories",
                        "live" => "Live",
                        "addclient" => "Add Client",
                        "dietitian" => "Dietitian Profile",
                        // "dietitian_recipes" => "Dietitian Recipies",
                        // "diet_chart" => "Diet Chart"
                        "notification" => "Notification"
                    );
                    $tableLinks = array(
                        "default_recipes" => $DEFAULT_PATH . "all_recipes.php",
                        "weighttracker" => "search.php4",
                        "dietitian_forms" => $DEFAULT_PATH . "forms_and_documents.php",
                        "dietitian_tasks" => $DEFAULT_PATH . "task_list.php",
                        "messages" => $DEFAULT_PATH . "chat_home.php",
                        "chats" => $DEFAULT_PATH . "chat_home.php",
                        "client" => $DEFAULT_PATH . "client_list.php",
                        "create_event" => $DEFAULT_PATH . "createevent.php",
                        "live" => $DEFAULT_PATH . "live.php",
                        "addclient" => $DEFAULT_PATH . "client_list.php",
                        "create_plan" => $DEFAULT_PATH. "create_plan.php",
                        "dietitian" => $DEFAULT_PATH. "profile_settings_show.php",
                        "dietitian_recipes" => $DEFAULT_PATH. "recipe_detail.php",
                        // "diet_chart" => $DEFAULT_PATH. "dietchart.php"
                        "notification" => $DEFAULT_PATH. "notification.php"
                    );

                    $showAll = isset($_POST["show_all"]) && $_POST["show_all"] === "true";

                    $searchResult = '';
                    $resultCount = 0;
                    
    $fileNames = ['index.php' , 'all_recipes.php','all_recipe_list.php','add_client.php','calendar_of_events.php', 'appointments.php', 'chat_home.php', 'choose_recipe.php', 'client_detailed_progress.php', 'client_list.php', 'client_progress.php', 'editRecipe_main.php', 'forms_and_documents.php', 'health_viewall_forms_and_documents.php', 'health_viewall_forms.php',  'live_personalcall.php', 'live.php', 'myplan.php', 'profile_settings_edit.php', 'profile_settings_show.php', 'refer_friend.php', 'set_reminders.php', 'setgoals.php', 'settings.php', 'task_list.php'];
    $matchedFiles = [];
    $displayFileNames = array('index.php'=>'Dashboard' , 'all_recipes.php'=>'All Recipes', 'all_recipe_list.php'=>'All Recipe List', 'add_client.php'=>'Add Client', 'calendar_of_events.php'=>'Appointments', 'appointments.php'=>'Appointments', 'chat_home.php'=>'Messages', 'choose_recipe.php'=> 'Choose Recipe', 'client_detailed_progress.php'=>'Client Detailed Progress', 'client_list.php'=>'Clients', 'client_progress.php'=>'Client Progress', 'editRecipe_main.php'=>'Edit Recipe Main', 'forms_and_documents.php'=>'Forms and Documents', 'health_viewall_forms_and_documents.php'=>'Health Froms and Documents View All', 'health_viewall_forms.php'=>'Health Forms View All','live_personalcall.php'=>'Live Personal Call', 'live.php'=>'Live', 'myplan.php'=>'My Plan', 'profile_settings_edit.php'=>'Profile Settings Edit', 'profile_settings_show.php'=>'Profile Settings Show', 'refer_friend.php'=>'Refer Friends', 'set_reminders.php'=>'Set Reminders', 'setgoals.php'=>'Set Goals', 'settings.php'=>'Settings', 'task_list.php'=>'Task List');

    foreach ($fileNames as $fileName) {
        ob_start();
        echo $fileName;
        require_once($fileName);
        $cleaned_output =  ob_get_clean();
        // echo $cleaned_output;
        
        $pattern = '/<[^>]+>(*SKIP)(*F)|\b' . preg_quote($searchText, '/') . '\b/i';
        if (preg_match($pattern, $cleaned_output)) {
            $matchedFiles[] = $fileName;
        }
        $cleaned_output = '';
    }
    if (!empty($matchedFiles)) {
        foreach ($matchedFiles as $matchedFile) {
            $searchResult .= "<a href='".$DEFAULT_PATH.$matchedFile."' class='table-link'><div class='search-result'><b>".$searchText.".".$displayFileNames[$matchedFile]."</b><img src='" . $DEFAULT_PATH . "assets/icons/arrow.svg' class='result-arrow'></div></a>";
            $resultCount++;
        }
    }

                    foreach ($tableColumnText as $tableName => $columnsText) {
                        $tableDisplayName = isset($tableDisplayNames[$tableName]) ? $tableDisplayNames[$tableName] : " ";
                        $tableLink = isset($tableLinks[$tableName]) ? $tableLinks[$tableName] : "#";
                        /*  $dietitianuser_id = $_SESSION['dietitianuserID'];
                       if ($tableName === "default_recipes") {
                            $tableQuery = "SELECT dr.* FROM `default_recipes` dr LEFT JOIN `updated_by_users` ubu ON dr.`drecipe_id` = ubu.`updated_drecipe_id`AND ubu.`dietitian_id`='{$_SESSION['dietitian_id']}' WHERE ubu.`updated_drecipe_id` IS NULL AND ubu.`dietitian_id` IS NULL AND ";
                        } else { */
                        $tableQuery = "SELECT * FROM $tableName WHERE   ";
                        // }

                        $firstColumn = true;
                        foreach ($columnsText as $columnName => $displayColumnName) {
                            if (!$firstColumn) {
                                $tableQuery .= " OR ";
                            }
                            $tableQuery .= "$columnName LIKE '%$searchText%'";
                            $firstColumn = false;
                        }
                        $result = $conn->query($tableQuery);
                        $tableLink .= "?search=" . urlencode($searchText);
                        while ($row = $result->fetch_assoc()) {
                            foreach ($row as $columnValue) {
                                $words = explode(' ', $columnValue);

                                // Find and highlight the matched word
                                foreach ($words as $word) {

                                    if (stristr($word, $searchText)) {
                                        $highlightedWord = str_ireplace($searchText, "<b>$searchText</b>", $word);
                                        $searchResult .= "<a href='$tableLink' class='table-link'><div class='search-result'>$highlightedWord <b> . </b> $tableDisplayName<b> . </b> $displayColumnName <img src='" . $DEFAULT_PATH . "assets/icons/arrow.svg' class='result-arrow'></div></a>";
                                        $resultCount++;
                                    }
                                }
                            }
                        }
                    }

                    if ($showAll) {
                        if (!empty($searchResult)) {
                            echo $searchResult;
                        } else {
                            $noResultMessage = "<a class='table-link'><div class='search-result'>No Result Found</div></a>";
                            echo $noResultMessage;
                        }
                    } else {
                        $maxResultsToShow = 5; // Maximum number of results to show initially

                        $limitedResults = '';
                        $limitedCount = 0;

                        $results = explode("</a>", $searchResult);
                        foreach ($results as $result) {
                            if ($limitedCount >= $maxResultsToShow) {
                                break;
                            }
                            $limitedResults .= $result . "</a>";
                            $limitedCount++;
                        }

                        if ($resultCount > $maxResultsToShow) {
                            $limitedResults .= '<a class="table-link"><div class="search-result" style="text-align:center;"><button id="showAllResultsButton" style="border:none;background:none;"onclick="performSearch(true)">Show All Results</button></div></a>';
                        }
                        if (!empty($searchResult)) {
                            echo $limitedResults;
                        } else {
                            $noResultMessage = "<a class='table-link'><div class='search-result'>No Result Found</div></a>";
                            echo $noResultMessage;
                        }
                    }
                }
                ?>