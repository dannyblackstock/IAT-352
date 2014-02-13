<?php
      // 1. Create a database connection
    $dbhost = "localhost";
    $dbuser = "dblackst";
    $dbpass = "dblackst";
    $dbname = "dblackst";

      // create new connection
    @$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

      // Test if connection succeeded
        // if connection failed, skip the rest of PHP code, and print an error
    if ($db->connect_error)  {
        die('Connect Error: ' . $db->connect_error);
    }

    // if the form was submitted
    if(isset($_POST['submit'])) {
        // check if each form input was filled,  read values from $_POST if not, make the variable and empty string
        if(isset($_POST['username'])) {
            $username = $_POST['username'];
        }
        else {
            $username = '';
        }

        if(isset($_POST['password'])) {
            $password = $_POST['password'];
            $password = md5($password);
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
            echo "derp";
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

        if(isset($_POST['bio']) && $_POST['bio'] !== "")) {
            $bio = $_POST['bio'];
        }
        else {
            $bio = 'NULL';
        }
    }

	// 2. Perform database query

    $query = "INSERT INTO `members`(`username`, `password`, `name`, `email`, `bio`, `location`, `high_school`, `grad_year`, `phone`, `is_phone_preferred`) 
    VALUES ('{$username}', '{$password}', '{$name}', '{$email}', '{$bio}', '{$location}', '{$highschool}', {$graduationYear}, {$phone}, {$isPhonePreferred})";
    // print_r($query);
    // echo"<br>";
	// check for results
    $result = $db->query($query);

    echo $query;

	// if success - redirect to info_success.php
    if ($result) {
        echo "Success!";
        header('Location: info_success.php');
    }

	// else if error - skip the rest of PHP code, and print an error
    if ($db->connect_error)  {
        die('Connect Error: ' . $db->connect_error);
    }

    else {
        echo "<br>whut";
    }
  // 5. Close database connection 
    $db->close();
    ?>