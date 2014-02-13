<?php

include_once("loadSession.php");

echo "<h1>Protected Page 2</h1>";
echo "<p>This page requires authenticated user. 
	You are logged in as: ".$_SESSION['valid_user']."</p>";

echo '<p>Menu: <a href="protectedPage1.php">Page 1</a>, 
			Page 2</p>';
echo '<p><a href="logout.php">Logout</a></p>';
	
?>