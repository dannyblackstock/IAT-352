<?php
require_once("includes/header.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['valid_member']) || isset($_SESSION['valid_visitor'])) {
    unset($_SESSION['valid_member']);
    unset($_SESSION['valid_visitor']);
    $loggedOut = True;
} else {
    $loggedOut = False;
}

//Main menu bar for all pages
require_once("includes/main_menu_bar_https.php");

if ($loggedOut == True) {
    echo "<h1>You have been logged out.</h1>";
}
else if ($loggedOut == False) {
    echo "<h1>You were not logged in.</h1>";
}

echo "<a href=\"index.php\">Index</a>";

//session_destroy();

// echo '<p>Menu: <a href="protectedPage1.php">Page 1</a>, 
// 			<a href="protectedPage2.php">Page 2</a></p>';
	
 require("includes/footer.php"); ?>