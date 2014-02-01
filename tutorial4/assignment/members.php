<?php
  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "classicmodels";
  
  // Create new connetion
    
  // Test if connection succeeded  
	// if connection failed, skip the rest of PHP code, and print an error
  
?>

<?php
	// 2. Perform database query
	// SELECT ALL RECORDS
	
	// get results
	
	// Test if there was a query error
		// if error, skip the rest of PHP code, and print an error
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Members</title>
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
	
    <div id="main"> <a name="Members"></a>
      <h1>Members</h1>
	  
	  <table class="striped">
            <tr class="header">
                <td>User Identifier</td>
                <td>First Name</td>
				<td>Last Name</td>
                <td>Email</td>
            </tr>
            <?php
				// Uncomment while loop
               /*
			   * while ($row = mysqli_fetch_assoc($result)) {			   
                *   echo "<tr>";				   
				*	echo "<td>".$row["columnName"]."</td>";
				*	echo "<td>".$row["columnName"]."</td>";
				*	echo "<td>".$row["columnName"]."</td>";
				*	echo "<td>".$row["columnName"]."</td>";
                *   echo "</tr>";
               *}
			   */
            ?>
        </table>
		<?php
			// 4. Release returned data			
		?>      
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

<?php
  // 5. Close database connection  
?>
