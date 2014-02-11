<?php
  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "classicmodels";
  
  // create new connection
  
  // Test if connection succeeded
	// if connection failed, skip the rest of PHP code, and print an error
  
?>
<?php
	// Read values from $_POST
	$userID = $_POST["id"];
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$email = $_POST["email"];
			
	// 2. Perform database query
	
	// check for results
	// if success - redirect to info_success.php
	// else if error - skip the rest of PHP code, and print an error
?>

<?php
  // 5. Close database connection  
?>