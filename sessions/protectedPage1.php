<?php

include_once("loadSession.php");

echo "<h1>Protected Page 1</h1>";
echo "<p>This page requires authenticated user. 
	You are logged in as: ".$_SESSION['valid_user']."</p>";
	
echo '<p>Menu: Page 1, 
			<a href="protectedPage2.php">Page 2</a></p>';
			
echo '<p><a href="logout.php">Logout</a></p>';
	
?>