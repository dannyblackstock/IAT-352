<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Log in/Register</title>
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
	
    <div id="main"> <a name="FormTemplate"></a>
      <h1>Log in/Register</h1>
	 <form action="form_processing.php" method="post">
        <p>
          <label>User Identifier</label>
          <input name="id" value="Unique ID" type="text" size="30" />
          <label>First name</label>
          <input name="firstName" value="First name" type="text" size="30" />
		  <label>Last name</label>
          <input name="lastName" value="Last name" type="text" size="30" />
          <label>Email</label>
          <input name="email" value="Email" type="text" size="30" />
          <br />
          <input class="button" type="submit" />
        </p>
      </form>
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
