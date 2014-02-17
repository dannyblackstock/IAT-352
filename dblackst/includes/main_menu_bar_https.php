<?php
// force HTTPS for the form submission if not set already
if($_SERVER["HTTPS"] != "on") {
    //header("Location: https://". $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    header("Location: https://". str_replace(":8080", "", $_SERVER['HTTP_HOST']) .$_SERVER['REQUEST_URI']);
    exit;
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
        <a href="index.php">Browse members</a>

        <!-- right side of menu bar -->
        <div id="main-menu-bar-right">
            <?php
            require_once("database_info.php");

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (isset($_SESSION['valid_member'])) {
                $query = "SELECT `id`, `name` FROM `members` WHERE email=\"".mysql_real_escape_string($_SESSION['valid_member'])."\";";
                $result = $db->query($query);
                if ($result) {
                    if ($result->num_rows > 0) {
                        $user = $result->fetch_array(MYSQLI_ASSOC);
                        echo "Logged in as <a href=\"user.php?id=".$user['id']."\">".$user['name']."</a>. ";
                        echo "<a href=\"logout.php\">Log out</a>";
                        echo "<a href=\"new_post.php\"> New Post</a>";
                    }
                    else {
                        // if the name couldn't be retrieved, use the email
                        echo "Logged in as ".$_SESSION['valid_member']."</p>";
                        echo "<a href=\"logout.php\">Log out</a>";
                        echo " <a href=\"new_post.php\">New Post</a>";
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
                        echo "Logged in as ".$user['name'].". ";
                        echo "<a href=\"logout.php\">Log out</a>";
                    }
                    else {
                        // if the name couldn't be retrieved, use the email
                        echo "Logged in as ".$_SESSION['valid_visitor']."</p>";
                        echo "<a href=\"logout.php\">Log out</a>";
                    }
                }
                else {
                    echo "<h1 class=\"main-header\">Query failed!</h1>";
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