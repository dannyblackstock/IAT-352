<?php 
// force HTTPS for the form submission if not set already
if( isset($_SERVER['HTTPS'] )  && $_SERVER['HTTPS'] != 'off' )  {
    //header("Location: https://". $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    // Return to normal http on port 8080
    // header("Location: http://".$_SERVER['HTTP_HOST'] . ":8080" . $_SERVER['REQUEST_URI']);
    // exit;
}
?>
<!-- START Main menu bar for all pages -->
<div id="main-menu-bar-container">
    <div id="main-menu-bar">

        <!-- SIAT logo / home button -->
        <a href="index.php" id="main-menu-bar-left">
            <img id="main-menu-bar-logo" src="img/siat_white_logo.png" alt="SIAT SFU LOGO">
            OUTREACH
        </a>

        <!-- right side of menu bar -->
        <div id="main-menu-bar-right">
            <a  class="right-nav-button" href="index.php">Browse</a>
            <?php
            require_once("database_info.php");

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            // set the callback URL
            $_SESSION['callback_URL'] = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . 
                $_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];

            if (isset($_SESSION['valid_member']) || isset($_SESSION['valid_visitor'])) {
                if (isset($_SESSION['valid_member'])) {
                    $query = "SELECT `id`, `name` FROM `members` WHERE email=\"".mysql_real_escape_string($_SESSION['valid_member'])."\";";
                    $result = $db->query($query);
                    if ($result) {
                        if ($result->num_rows > 0) {
                            $user = $result->fetch_array(MYSQLI_ASSOC);
                            echo "<a class=\"right-nav-button\" href=\"new_post.php\"> Post</a>
                                    <ul id=\"user-dropdown\">
                                    <li>
                                        <a href=\"#\" class=\"button\" id=\"user-dropdown-button\">".$user['name']." </a>
                                        <ul>
                                            <li><a href=\"user.php?id=".$user['id']."\">View my page</a></li>
                                            <li><a href='edit_user_info.php'>Edit my account</a></li>
                                            <li><a href=\"logout.php\">Log out</a></li>
                                        </ul>
                                    </li>
                                </ul>";
                        }
                        else {
                            // if the name couldn't be retrieved, use the email
                            echo "<a class=\"right-nav-button\" href=\"new_post.php\"> Post</a>
                                    <ul id=\"user-dropdown\">
                                    <li>
                                        <a href=\"#\" class=\"button\" id=\"user-dropdown-button\">".$_SESSION['valid_member']." </a>
                                        <ul>
                                            <li><a href=\"user.php?id=".$user['id']."\">View my page</a></li>
                                            <li><a href='edit_user_info.php'>Edit my account</a></li>
                                            <li><a href=\"logout.php\">Log out</a></li>
                                        </ul>
                                    </li>
                                </ul>";
                        }
                    }
                    else {
                        echo "<h1 class=\"main-header\">Query failed!</h1>";
                    }
                }
                if (isset($_SESSION['valid_visitor'])) {
                    $query = "SELECT `id`, `name` FROM `visitors` WHERE email=\"".mysql_real_escape_string($_SESSION['valid_visitor'])."\";";
                    $result = $db->query($query);
                    if ($result) {
                        if ($result->num_rows > 0) {
                            $user = $result->fetch_array(MYSQLI_ASSOC);
                            echo "<a class=\"right-nav-button\" href='post_feed.php'>News Feed</a>
                                    <ul id=\"user-dropdown\">
                                    <li>
                                        <a href=\"#\" class=\"button\" id=\"user-dropdown-button\">".$user['name']." </a>
                                        <ul>
                                            <li><a href='edit_user_info.php'>Edit my account</a></li>
                                            <li><a href=\"logout.php\">Log out</a></li>
                                        </ul>
                                    </li>
                                </ul>";
                        }
                        else {
                            // if the name couldn't be retrieved, use the email
                            echo "<a class=\"right-nav-button\" href='post_feed.php'>News Feed</a>
                                    <ul id=\"user-dropdown\">
                                    <li>
                                        <a href=\"#\" class=\"button\" id=\"user-dropdown-button\">".$_SESSION['valid_visitor']." </a>
                                        <ul>
                                            <li><a href='edit_user_info.php'>Edit my account</a></li>
                                            <li><a href=\"logout.php\">Log out</a></li>
                                        </ul>
                                    </li>
                                </ul>";
                        }
                    }
                    else {
                        echo "<h1 class=\"main-header\">Query failed!</h1>";
                    }
                }
            }

            else {
            ?>

            <!-- sign up prompt -->
            <a  class="button-grey" id="sign-up-button" href="sign_up.php">
                Sign up
            </a>

            <!-- log in / sign out button -->
            <a  class="button" id="log-in-button" href="login.php">
                Log in
            </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- END Main menu bar for all pages -->