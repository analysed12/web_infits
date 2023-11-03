<?php
// Include necessary constants and configuration
require('constant/constant.php');
require('constant/config.php');
global $conn;
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["search_text"])) {
    $searchText = $_POST["search_text"];
    
    // Query database to get auto-suggest words
    $autoSuggestWords = array(); // Array to store auto-suggest words
    
    // ... Perform your database query here ...
    // Populate $autoSuggestWords array with matching words
    
    // Output the auto-suggest words as HTML
    foreach ($autoSuggestWords as $word) {
        echo "<div class='auto-suggest-item'>$word</div>";
    }
}
?>
<?php
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
                // "" => array(
                //     "" => "",
                //     "" => "",
                //     "" => "",
                //      "" => ""
                // ),
                // "" => array(
                //     "" => "",
                //     "" => "",
                //     "" => "",
                //      "" => ""
                // ),
                // "" => array(
                //     "" => "",
                //     "" => "",
                //     "" => "",
                //      "" => ""
                // ),
                // "" => array(
                //     "" => "",
                //     "" => "",
                //     "" => "",
                //      "" => ""
                // ),
                // "" => array(
                //     "" => "",
                //     "" => "",
                //     "" => "",
                //      "" => ""
                // ),
                // "" => array(
                //     "" => "",
                //     "" => "",
                //     "" => "",
                //      "" => ""
                // ),

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
                "heartrate" => "",
                // "" => "",
                // "" => "",
                // "" => "",


            );

            $cacheKey = 'auto_suggest_words';
            $words = array();
            if (isset($_SESSION[$cacheKey]) && $_SESSION[$cacheKey]['expiration'] > time()) {
                $words = $_SESSION[$cacheKey]['data'];
            } else {
                foreach ($tableColumnText as $tableName => $columnsText) {
                    foreach ($columnsText as $columnName => $displayColumnName) {
                        $query = "SELECT $columnName FROM $tableName LIMIT 100"; // Limit results to 100
                        $result = $conn->query($query);
                        while ($row = $result->fetch_assoc()) {
                            $words = array_merge($words, explode(' ', $row[$columnName]));
                        }
                    }
                }
                $words = array_unique(array_filter($words));

                $_SESSION[$cacheKey] = array(
                    'data' => $words,
                    'expiration' => time() + 3600 // Cache expiration time (1 hour)
                );
            }

            // Convert to JSON
            $wordsJson = json_encode($words);
            ?>