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
    <div id="main"> <a name="ReadDatabase"></a>
      <h1>Example: delete record in a database</h1>
	  <h3>Code</h3>
      <p><code> &lt;?php <br />
					// 1. Create a database connection <br />
					$dbhost = "localhost"; <br />
					$dbuser = "root"; <br />
					$dbpass = ""; <br />
					$dbname = "classicmodels"; <br />
					$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); <br />
					<br />
					// Test if connection succeeded <br />
					if(mysqli_connect_errno()) { <br />
					&nbsp;&nbsp; // if connection failed, skip the rest of PHP code, and print an error <br />
					&nbsp;&nbsp; die("Database connection failed: " . <br />
					&nbsp;&nbsp; mysqli_connect_error() .  <br />
					&nbsp;&nbsp;&nbsp;&nbsp;" (" . mysqli_connect_errno() . ")" <br />
					&nbsp;&nbsp; ); <br />
					} <br />
				?>  <br />
				<br />
				&lt;?php <br />
					&nbsp;&nbsp; // Often these are form values in $_POST <br />
					&nbsp;&nbsp; $orderNumber = (int) 10100; <br />
					&nbsp;&nbsp; $orderLineNumber = (int) 3; <br />
					<br />
					&nbsp;&nbsp; // 2. Perform database query <br />
					&nbsp;&nbsp; $query  = "DELETE FROM orderdetails "; <br />
					&nbsp;&nbsp; $query .= "WHERE orderNumber = {$orderNumber} "; <br />
					&nbsp;&nbsp; $query .= "AND orderLineNumber = {$orderLineNumber} "; <br />
					&nbsp;&nbsp; $query .= "LIMIT 1"; <br />
					<br />
					&nbsp;&nbsp; $result = mysqli_query($connection, $query); <br />
					<br />
					&nbsp;&nbsp; if ($result && mysqli_affected_rows($connection) == 1) { <br />
					&nbsp;&nbsp; &nbsp;&nbsp; 	// Success <br />
					&nbsp;&nbsp; &nbsp;&nbsp; 	// redirect_to("successpage.php");<br />
					&nbsp;&nbsp; &nbsp;&nbsp; 	echo "Success!"; <br />
					&nbsp;&nbsp; } else { <br />
					&nbsp;&nbsp; &nbsp;&nbsp; 	// Failure <br />
					&nbsp;&nbsp; &nbsp;&nbsp; 	// $message = "Subject delete failed"; <br />
					&nbsp;&nbsp; &nbsp;&nbsp; 	die("Database query failed. " . mysqli_error($connection)); <br />
					&nbsp;&nbsp; } <br />
				?> <br />
				<br />
				&lt;!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> <br />
				
				&lt;html lang="en"> <br />
					&nbsp;&nbsp; &lt;head> <br />
					&nbsp;&nbsp;&nbsp;&nbsp; 	&lt;title>Tutorial 4: Database update record &lt;/title> <br />
					&nbsp;&nbsp; &lt;/head> <br />
					&nbsp;&nbsp; &lt;body> <br />
					
					&nbsp;&nbsp; &lt;/body> <br />
				&lt;/html> <br />
				&lt;?php <br />
					&nbsp;&nbsp; // 5. Close database connection <br />
					&nbsp;&nbsp; mysqli_close($connection); <br />
				?> <br />
			</code>
		</p>
	  
      
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
