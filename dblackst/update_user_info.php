<?php
    require_once("includes/database_info.php");

    // start the session if it's not running
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // if the form was submitted
    if(isset($_POST['submit'])) {
        // check if each form input was filled,  read values from $_POST if not, make the variable and empty string
        // check what type of member submitted the form
        if(isset($_POST['user_type']) && ($_POST['user_type']) == "member") {

            // Prepared statements
            if (!($memberStatement = $db->prepare("UPDATE `members` SET `name`=?, `bio`=?, `location`=?, `high_school`=?, `grad_year`=?, `phone`=?, `is_phone_preferred`=?, `twitter_handle`=?, `flickr_handle`=? WHERE email=\"".$db->real_escape_string($_SESSION['valid_member'])."\""))) {
                echo "Prepare failed: (" . $db->errno . ") " . $db->error;
            }

            //bind parameters
            $memberStatement->bind_param("ssssisiss", $name, $bio, $location, $highschool, $graduationYear, $phone, $isPhonePreferred, $twitter_handle, $flickr_handle);

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

            if(isset($_POST['twitter_handle']) && ($_POST['twitter_handle'] !== "")) {
                $twitter_handle = $_POST['twitter_handle'];
            }
            else {
                $twitter_handle = 'NULL';
            }

            if(isset($_POST['flickr_handle']) && ($_POST['flickr_handle'] !== "")) {
                $flickr_handle = $_POST['flickr_handle'];
            }
            else {
                $flickr_handle = 'NULL';
            }

            // update member's info
            if ($memberStatement->execute()) {
                echo "Success!\n";
                printf("%d Row modified.\n", $memberStatement->affected_rows);
                $memberStatement->close();

                // to send the member back to their own page
                $current_user_query = "SELECT `id` FROM `members` WHERE email=\"".$db->real_escape_string($_SESSION['valid_member'])."\"";
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

        if(isset($_POST['user_type']) && ($_POST['user_type']) == "visitor") {


            if (!($visitorStatement = $db->prepare("UPDATE `visitors` SET `name`=? WHERE email=\"".$db->real_escape_string($_SESSION['valid_visitor'])."\""))) {
                echo "Prepare failed: (" . $db->errno . ") " . $db->error;
            }

            //bind parameters
            $visitorStatement->bind_param("s", $name);

            if(isset($_POST['name'])) {
                $name = $_POST['name'];
            }
            else {
                $name = '';
            }

            // update visitor's name
            if ($visitorStatement->execute()) {
                echo "Success!\n";
                printf("%d Row modified.\n", $visitorStatement->affected_rows);
                $visitorStatement->close();
                header("Location:".$_SESSION['callback_URL']);
            }

            if ($db->connect_error)  {
                die('Connect Error: ' . $db->connect_error);
            }
        }
    }

    //Close database connection
    $db->close();
    ?>