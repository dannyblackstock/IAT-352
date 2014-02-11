<?php
$errors = array();

$uniqueId = "#####";
$firstName = "First Name";
$lastName = "Last Name";
$email = "Email";

if(isset($_POST['submit'])){
	// echo "IS SET!!!";
	// * presence
	// use trim() so empty spaces don't count
	// use === to avoid false positives
	// empty() would consider "0" to be empty
	$id = trim($_POST["id"]);
	//(!isset($id) || $id === "") && 
	if (!is_numeric($id)) {
		$errors['id'] = "ID must be unique and numeric value!";
	}

	$email = trim($_POST["email"]);
	// strpos is faster than preg_match
	// use === to make exact match with false

	if (strpos($email, "@") === false) {
	  $errors['email'] =  "Email validation failed.";

	}

    $firstName = ucwords(strtolower(trim($_POST["firstName"])));

    if (empty($firstName)) {
        $errors['firstName'] = "First name cannot be empty!";
    }

    $lastName = ucwords(strtolower(trim($_POST["lastName"])));

    if (empty($lastName)) {
        $errors['lastName'] = "Last name cannot be empty!";
    }

	$uniqueId = $_POST["id"];
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$email = $_POST["email"];  
	// print_r($errors);
}
?>


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
	 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <p>
          <label>User Identifier</label>		  
          <input name="id" value="<?php echo htmlspecialchars($uniqueId); ?>" type="text" size="30" />
		  <span id='register_username_error' class='error'>
						<?php if (!empty($errors['id'])){
								echo $errors['id'];
							}
						?>
			</span>
          <label>First name</label>
          <input name="firstName" value="<?php echo htmlspecialchars($firstName); ?>" type="text" size="30" />
            <span id='register_firstname_error' class='error'>
                    <?php if (!empty($errors['firstName'])){
                            echo $errors['firstName'];
                        }
                       ?>
            </span>
		  <label>Last name</label>
          <input name="lastName" value="<?php echo htmlspecialchars($lastName); ?>" type="text" size="30" />
            <span id='register_lastname_error' class='error'>
                    <?php if (!empty($errors['lastName'])){
                            echo $errors['lastName'];
                        }
                       ?>
            </span>
          <label>Email</label>
          <input name="email" value="<?php echo htmlspecialchars($email); ?>" type="text" size="30" />
		  <span id='register_email_error' class='error'>							
								<?php if (!empty($errors['email'])){
										echo $errors['email'];
									}
								?></span>
          <br />
          <input class="button" type="submit" name="submit"/>
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