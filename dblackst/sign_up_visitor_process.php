<?php
require_once("includes/database_info.php");

// Prepared statement
if (!($stmt = $db->prepare("INSERT INTO  `visitors`(`password`, `name`, `email`) 
    VALUES (?, ?, ?)"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}

//bind parameters
$stmt->bind_param('sss', $password, $name, $email);

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