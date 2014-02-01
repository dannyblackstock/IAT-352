<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Tutorial4</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="images/SimpleBlog.css" type="text/css" />
</head>
<body>
<div id="wrap">
  <div id="header">
    <?php
		include("header.php");
	?>
  </div>
	<div id="menu">
		<?php
			include("menu.php");
		?>	
	</div>
  <div id="content-wrap">
    <div id="sidebar">      
		<?php
			include("sidebar_menu.php");
		?>	      
    </div>
	
    <div id="main"> <a name="TaskDescription"></a>
      <h1>Task Description</h1>
	  <p> <strong> Task 1. </strong></p>
      <p>Using provided templates, form.php and form_processing.php, implement user registration form. <br />
		<br />
		Insert user data into the database "tutorial", table "user". ID should be unique value, however it is not required
		to implement function that will assign unique values. For the purpose of this assignment, user will enter arbitrary values.
		<br/>
		<br/>
		Details are provided in source files.
	  </p>
	  
	  <br />
	  <p> <strong> Task 2. </strong></p>
	  <p> Using "members.php" template, display all inserted users from database "tutorial", table "user". </p>
	  <p> Details are provided in the source file. </p>
     
    </div>
  </div>
  <div id="footer">
    <?php
		include("footer.php");
	?>
  </div>
</div>
</body>
</html>
