<?php
      // 1. Create a database connection
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "tutorial";

      // create new connection
    @$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

      // Test if connection succeeded
        // if connection failed, skip the rest of PHP code, and print an error
    if ($db->connect_error) {
        printf("Connect failed: %s\n", $db->connect_error);
        exit();
    }
    ?> 

    ?>
    <?php
	// Read values from $_POST
    $userID = $_POST["id"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];

	// 2. Perform database query

    $query = "INSERT INTO user (iduser, firstname, lastname, email) 
    VALUES('$userID', '$firstName', '$lastName', '$email')";

	// check for results
    $result = $db->query($query);

	// if success - redirect to info_success.php
    if ($result) {
        echo "Success!";
        header('Location: info_success.php');
    }

	// else if error - skip the rest of PHP code, and print an error
    else {
        printf("Connect failed: line 41%s\n", $db->connect_error);
        exit();
    }

    ?>

    <?php
  // 5. Close database connection 
    $db->close();
    ?>