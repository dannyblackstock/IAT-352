<?php
    require_once("includes/database_info.php");

    // start the session if it's not running
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Prepared statement
    if (!($memberStatement = $db->prepare("UPDATE `members` SET `name`=?, `bio`=?, `location`=?, `high_school`=?, `grad_year`=?, `phone`=?, `is_phone_preferred`=? WHERE email=\"".mysql_real_escape_string($_SESSION['valid_member'])."\""))) {
        echo "Prepare failed: (" . $db->errno . ") " . $db->error;
    }
    
    //bind parameters
    $memberStatement->bind_param("ssssisi", $name, $bio, $location, $highschool, $graduationYear, $phone, $isPhonePreferred);

    // if the form was submitted
    if(isset($_POST['submit'])) {
        // check if each form input was filled,  read values from $_POST if not, make the variable and empty string
        if(isset($_POST['user_type']) && ($_POST['user_type']) == "member") {

            if(isset($_POST['name'])) {
                $name = $_POST['name'];
            }
            else {
                $name = '';
            }

            if(isset($_POST['location'])) {
                $location = $_POST['location'];
            }
            else {
                $location = '';
            }

            if(isset($_POST['highschool'])) {
                $highschool = $_POST['highschool'];
            }
            else {
                $highschool = '';
            }

            if(isset($_POST['graduationYear'])) {
                $graduationYear = $_POST['graduationYear'];
            }
            else {
                $graduationYear = '';
            }

            if(isset($_POST['phone']) && $_POST['phone'] !== "") {
                $phone = $_POST['phone'];
            }
            else {
                echo "No phone number.\n";
                $phone = 'NULL';
            }

            if(isset($_POST['isPhonePreferred'])) {
                $isPhonePreferred = $_POST['isPhonePreferred'];
                if ($isPhonePreferred == 'on') {
                    $isPhonePreferred = '1';
                }
                else {
                    $isPhonePreferred = '0';
                }
            }
            else {
                $isPhonePreferred = 'NULL';
            }

            if(isset($_POST['bio']) && ($_POST['bio'] !== "")) {
                $bio = $_POST['bio'];
            }
            else {
                $bio = 'NULL';
            }

            // print_r($memberStatement);

            // execute database query
            if ($memberStatement->execute()) {
                echo "Success!\n";
                printf("%d Row modified.\n", $memberStatement->affected_rows);
                $memberStatement->close();

                // to send the member back totheir own page
                $current_user_query = "SELECT `id` FROM `members` WHERE email=\"".mysql_real_escape_string($_SESSION['valid_member'])."\"";
                $current_user_result = $db->query($current_user_query);

                echo $current_user_query;
                // if the user's info exists
                if ($current_user_result) {
                    $user = $current_user_result->fetch_assoc();

                    // send back to the user's page
                    header("Location: user.php?id=".$user['id']);
                }
                else {

                echo "<BR>POST SUBMITTED";
                }
            }

            if ($db->connect_error)  {
                die('Connect Error: ' . $db->connect_error);
            }
        }
    }

    //Close database connection 
    $db->close();
    ?>