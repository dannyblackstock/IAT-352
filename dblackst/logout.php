<?php
require_once("includes/header.php");

//Main menu bar for all pages
require_once("includes/main_menu_bar.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['valid_user'])) {
	unset($_SESSION['valid_user']);
	echo "<h1>You have been logged out.</h1>";
} else {
	echo "<h1>You were not logged in.</h1>";
}
echo "<a href=\"index.php\">Index</a>";

//session_destroy();

// echo '<p>Menu: <a href="protectedPage1.php">Page 1</a>, 
// 			<a href="protectedPage2.php">Page 2</a></p>';
	
 require("includes/footer.php"); ?>