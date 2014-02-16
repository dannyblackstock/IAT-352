<?php
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
?>