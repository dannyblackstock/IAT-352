<?php
// 1. Create a database connection
require_once("includes/database_info.php");
require_once("includes/header.php");
require_once("includes/main_menu_bar_https.php");

// // force HTTPS for the form submission if not set already
// if($_SERVER["HTTPS"] != "on") {
//     //header("Location: https://". $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//     header("Location: https://". str_replace(":8080", "", $_SERVER['HTTP_HOST']) .$_SERVER['REQUEST_URI']);

//     exit;
// }

// if the session isn't already running
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//let's see how we got here
// echo "<p>callback_URL is: ";
// if (isset($_SESSION['callback_URL'])) echo $_SESSION['callback_URL'];
// echo "</p>";

// if logged in as a member
if (isset($_SESSION['valid_member'])) {
        echo "<h1 class=\"center-text\">You are already logged in!</h1>
            <p>You are already logged in as a member! Please <a href=\"logout.php\">logout</a> before logging into a visitor account.</p>";
        require_once("includes/footer.php");
        exit;
}

if (!isset($_SESSION['valid_visitor'])) {

    // if the form was submitted
    if(isset($_POST['submit'])) {
        // check if each form input was filled, read values from $_POST if not, make the variable and empty string

        if(isset($_POST['password'])) {
            $password = $_POST['password'];
            $password = hash("sha256", $password);
        }
        else {
            $password = '';
        }

        if(isset($_POST['email'])) {
            $email = mysql_escape_string($_POST['email']);
        }
        else {
            $email = '';
        }


        // Perform database query

        $query = "SELECT * FROM visitors WHERE `email`=\"".$email."\" AND `password`=\"".$password."\";";

        // check for results
        $result = $db->query($query);

        echo $query;

        // if success - redirect to info_success.php
        if ($result) {
            // visitor's name and password combination are correct
            // do whatever matching is necessary - against the DB here
            $_SESSION['valid_visitor'] = $_POST['email'];
            echo "<br><br>Success!";
              // header('Location: info_success.php');
        }

        else {
            //login failed, let them try again
            echo "<h1>Invalid login info, please try again</h1>";
        }


        // else if error - skip the rest of PHP code, and print an error
        if ($db->connect_error)  {
            die('Connect Error: ' . $db->connect_error);
        }

        // Close database connection
        $db->close();

    }

    else {
        //login info missing - signing in first time
        // echo "<h1>Please Log In</h1>";
    }
}

if (isset($_SESSION['valid_visitor'])) {
    //autheticated correctly
    if (isset($_SESSION['callback_URL'])) {
        // go back where you came from
        $callback_URL=$_SESSION['callback_URL'];
        unset($_SESSION['callback_URL']);
        echo $callback_URL;
        header('Location: '.$callback_URL);
        exit();
    }

    else {
        echo "<h1>You are now logged in.</h1>";
    }
}

else {
    //did not authenticate yet or failed previous attempt
    //show form
    ?>
    <div id="content-container">

        <!-- Sign up form -->
        <form name="input" action="login_visitor_authenticate.php" method="post" class="user-info-form container">

            <h1 class="center-text">Visitor log in</h1>

            <input class="form-input" type="email" name="email" id="emailInput" placeholder="Email" required>

            <input class="form-input" type="password" name="password" id="passwordInput" placeholder="Password" required>

            <input class="form-button button-grey" name="submit" type="submit" value="Submit">
            <p>Don't have an account? <a href="sign_up.php">Sign up</a></p>
            <p>Not a visitor? <a href="login_member_authenticate.php">Log in as a member</a></p>
        </form>
    </div>
<?php
}
require_once("includes/footer.php");
?>