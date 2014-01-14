<?php
/* 
* Using code Snippet 1, create page form.php
*/


// Snippet 1. Form template
?>

<?php // Please note that the line beginning with <!-- DOCTYPE should be uncommented ?>
<!--DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"-->

<html lang="en">
	<head>
		<title>Form</title>
	</head>
	<body>

		<form action="form_processing.php" method="post">
		  Player: <input type="text" name="player" value="" /><br />
		  Team: <input type="text" name="team" value="" /><br />
		  Email: <input type="text" name="email" value="" /><br />
		  Homepage: <input type="text" name="homepage" value="" /><br />
		  Details: <input type="text" name="details" value="" /><br />
			<br />
		  <input type="submit" name="submit" value="Submit" />
		</form>

	</body>
</html>

<?php
/*
* Using Snippet 2, create form_processing.php page. This page should detect whether form was submitted.
* If form was submitted, data should be entered into text file (players_info.txt). 
* Each line in players_info.txt should contain data related to one player, while name, team, 
* email address, homepage and details info should be comma separated (or any other separator appropriate).
*/
?>

<?php
// Snippet 2. Form processing template
?>

<?php // Please note that the line beginning with <!-- DOCTYPE should be uncommented ?>
<!--DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"-->
<html lang="en">
	<head>
		<title>Form Processing - write file</title>
	</head>
	<body>	
		<?php
			// detect form submission
				// true:
					// detect if each variable is set (player, team, email, homepage, details)
					// true: assign values to variables $player, $team, $email, $homepage, $details
						// open file players_info.txt in "append" mode
						// insert values into the file
						// close session
					// false: for each variable that is not set, assign an empty string
				// false:
					// false: for each variable assign an empty string
					// and print message that values are not defined
		?>		
		
	</body>
</html>

<?php
/*
* Using Snippet 3, create read_file_basic.php page. This page should load content from file players.txt.
* Please note that content should be loaded at once (without incremental reading) and printed out.
*/
?>

<?php
// Snippet 3. Reading file content
?>

<?php // Please note that the line beginning with <!-- DOCTYPE should be uncommented ?>
<!--DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"-->
<html lang="en">
	<head>
		<title>Reading file</title>
	</head>
	<body>	
		<?php 
			$file = 'players.txt';			
			// Insert PHP code that loads file content into the variable $content
			// Print variable $content		
			echo "<hr/>";
		?>
	</body>
</html>




<?php
/*
* Using Snippet 4, create player_info.php page. The page should load content from file players.txt,
* and create hyperlinks to their homepage. Please note that content should be loaded line by line.
*/
?>

<?php
// Snippet 4. Player info page
?>

<?php // Please note that the line beginning with <!-- DOCTYPE should be uncommented ?>
<!--DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"-->
<html lang="en">
	<head>
		<title>Player info</title>
	</head>
	<body>	
		<?php 
			$file = 'players.txt';									
			$content = "";
			// create file handler, and open $file connection
				// iterate until the end of file
					// print content of file in the form "<a href={$var1}>{$var2}</a>, {$var3}, {$var4}"
					echo "<br/>";
			
			// close the connection
			
		?>
	</body>
</html>

<?php
/*
* Programming Challenge: Implement submission form (Snippet 1) and write data (Snippet 2) to the file "players_single.txt" on 
*						a single page ("form_processing_single.php") (Single page form). Player's name and team are mandatory fields. 
*						After the form is submitted, detect whether these values are provided.
*						If one or more mandatory fields is not defined, display validation error(s) and print a message that values are not saved. 
*						Be sure to keep previously entered values.
*						Try setting default values using ternary operator (boolean_test ? value_if_true : value_if_false) instead of if-else structure.
*/
?>
