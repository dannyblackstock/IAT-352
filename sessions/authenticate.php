<?php
//force HTTPS for the form submission if not set already
if($_SERVER["HTTPS"] != "on") {
	header("Location: https://". $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	exit;
	}

session_start();

//let's see how we got here
echo "<p>callback_URL is: "; 
if (isset($_SESSION['callback_URL'])) echo $_SESSION['callback_URL'];
echo "</p>";

if (!isset($_SESSION['valid_user'])) {
	if (isset($_POST['userid']) && isset($_POST['password'])) {
		if($_POST['userid']=="marek" && $_POST['password']=="pass1") {
			// visitor's name and password combination are correct
			// do whatever matching is necessary - against the DB here
			$_SESSION['valid_user'] = $_POST['userid'];
			// login succesful let it fall through the if
		} else {
			//login failed, let them try again
			echo "<h1>Invalid login info, please try again</h1>";
		}
	} else {
		//login info missing - signing in first time
		echo "<h1>Please Log In</h1>";
	}
}

if (isset($_SESSION['valid_user'])) {
	//autheticated correctly 
	if (isset($_SESSION['callback_URL'])) {
		// go back where you came from
		$callback_URL=$_SESSION['callback_URL'];
		unset($_SESSION['callback_URL']);
		echo $callback_URL;
		header('Location: '.$callback_URL);
		exit();
	} else {
		echo "<h1>You are now logged in.</h1>";
	}
} else {
	//did not authenticate yet or failed previous attempt
	//show form
	?>
		<form method="post" action="authenticate.php">
		<p>Username: <input type="text" name="userid"></p>
		<p>Password: <input type="password" name="password"></p>
		<p><input type="submit" name="submit" value="Log In"></p>
		</form>
<?php
}
?>