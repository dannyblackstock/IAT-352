<?php

session_start();

if (isset($_SESSION['valid_user'])) {
	unset($_SESSION['valid_user']);
	echo "<h1>You have been logged out.</h1>";
} else {
	echo "<h1>You were not logged in.</h1>";
}

//session_destroy();

echo '<p>Menu: <a href="protectedPage1.php">Page 1</a>, 
			<a href="protectedPage2.php">Page 2</a></p>';
	
?>