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
      <h1>Example: read data from database</h1>
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
				
				&lt;?php <br />
					&nbsp;&nbsp; // 2. Perform database query <br />
					&nbsp;&nbsp; $query  = "SELECT * "; <br />
					&nbsp;&nbsp; $query .= "FROM customers "; <br />
					&nbsp;&nbsp; $query .= "WHERE country = 'USA'";	<br />
					&nbsp;&nbsp; $result = mysqli_query($connection, $query); <br />
					&nbsp;&nbsp; // Test if there was a query error <br />
					&nbsp;&nbsp; if (!$result) { <br />
					&nbsp;&nbsp;&nbsp;&nbsp; 	die("Database query failed."); <br />
					&nbsp;&nbsp; } <br />
				?> <br />
				
				&lt;!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> <br />
				
				&lt;html lang="en"> <br />
					&nbsp;&nbsp; &lt;head> <br />
					&nbsp;&nbsp;&nbsp;&nbsp; 	&lt;title>Tutorial 4: PHP and MySQL &lt;/title> <br />
					&nbsp;&nbsp; &lt;/head> <br />
					&nbsp;&nbsp; &lt;body> <br />
					&nbsp;&nbsp; &nbsp;&nbsp; 	&lt;ul> <br />
					&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 	&lt;?php <br />
					&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 		// 3. Use returned data <br />
					&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 		while($row = mysqli_fetch_assoc($result)){ <br />
					&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 			// print data from each row <br />
					&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 	?> <br />
					&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 	&lt;li>&lt;?php echo $row["customerName"]; ?> &lt;/li> <br />							 
					&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 	&lt;?php <br />
					&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 		} <br />
					&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 	?> <br />
					&nbsp;&nbsp; &nbsp;&nbsp; 	&lt;/ul> <br />
						<br />
					&nbsp;&nbsp; &nbsp;&nbsp; &lt;?php <br />
					&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 	// 4. Release returned data <br />
					&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 	mysqli_free_result($result); <br />
					&nbsp;&nbsp; &nbsp;&nbsp; ?> <br />
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
