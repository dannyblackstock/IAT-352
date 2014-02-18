<?php
    require_once("includes/database_info.php");

    // Prepared statement
    if (!($stmt = $db->prepare("INSERT INTO  `members`(`password`, `name`, `email`, `bio`, `location`, `high_school`, `grad_year`, `phone`, `is_phone_preferred`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"))) {
        echo "Prepare failed: (" . $db->errno . ") " . $db->error;
    }
    
    //bind parameters
    $stmt->bind_param('ssssssisi', $password, $name, $email, $bio, $location, $highschool, $graduationYear, $phone, $isPhonePreferred);

    // if the form was submitted
    if(isset($_POST['submit'])) {
        // check if each form input was filled,  read values from $_POST if not, make the variable and empty string

        if(isset($_POST['password'])) {
            $password = $_POST['password'];
            $password = hash("sha256", $password);
        }
        else {
            $password = '';
        }

        if(isset($_POST['name'])) {
            $name = $_POST['name'];
        }
        else {
            $name = '';
        }

        if(isset($_POST['email'])) {
            $email = $_POST['email'];
        }
        else {
            $email = '';
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
    }

	// execute database query
    if ($stmt->execute()) {
        echo "Success!\n";
        printf("%d Row inserted.\n", $stmt->affected_rows);
        $stmt->close();
        header('Location: register_success.php');
    }

    if ($db->connect_error)  {
        die('Connect Error: ' . $db->connect_error);
    }

    //Close database connection 
    $db->close();
    ?>