<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['valid_member']) || isset($_SESSION['valid_visitor'])) {
    unset($_SESSION['valid_member']);
    unset($_SESSION['valid_visitor']);
    // echo "<h1>You have been logged out.</h1>";
} else {
    // echo "<h1>You were not logged in.</h1>";
}

header('Location:'.$_SESSION['callback_URL']);

//session_destroy();

// echo '<p>Menu: <a href="protectedPage1.php">Page 1</a>,
//          <a href="protectedPage2.php">Page 2</a></p>';

?>