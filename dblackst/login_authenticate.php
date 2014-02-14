<?php
      // 1. Create a database connection
    require("includes/database_info.php");

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

        if(isset($_POST['email'])) {
            $email = mysql_escape_string($_POST['email']);
        }
        else {
            $email = '';
        }
    }

	// Perform database query

    $query = "SELECT * FROM members WHERE `email`=\"".$email."\" AND `password`=\"".$password."\";";

	// check for results
    $result = $db->query($query);

    echo $query;

	// if success - redirect to info_success.php
    if ($result) {
        // print_r($result);
        echo "<br><br>Success!";
          // header('Location: info_success.php');
    }

	// else if error - skip the rest of PHP code, and print an error
    if ($db->connect_error)  {
        die('Connect Error: ' . $db->connect_error);
    }

    // Close database connection 
    $db->close();
?>