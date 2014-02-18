<!-- HTML header, title, body tags, etc -->
<!-- HTML header, title, body tags, etc -->
<?php

require_once("includes/header.php");

//Main menu bar for all pages
require_once("includes/main_menu_bar_https.php");

// connect to database
require_once("includes/database_info.php");
?>

<div id="content-container">

<?php

// Perform database query
if (isset($_SESSION['valid_visitor'])) {
    if (isset($_GET['follow']) && is_numeric($_GET['follow'])) {
        $follower_id = mysql_escape_string($_SESSION['valid_visitor']);
        $followed_id = mysql_escape_string($_GET['follow']);

        // check if already following
        $exists_query = "SELECT * FROM `followers_table` WHERE `follower_id` =  (SELECT `id` FROM `visitors` WHERE email=\"".$follower_id."\") AND `following_id` =  \"".$followed_id."\";";
        $exists_result = $db->query($exists_query);

        // echo $exists_query;

        // if already following
        if ($exists_result->num_rows > 0) {
            echo "Already following!";
        }

        // if not following
        else {

            $query = "INSERT INTO followers_table(follower_id, following_id) VALUES((SELECT `id` FROM `visitors` WHERE email=\"".$follower_id."\"), \"".$followed_id."\");";
            $result = $db->query($query);

            echo $query;

            if ($result) {
                echo "<h1>Now following ".$followed_id."</h1>";
                header('Location:'.$_SESSION['callback_URL']);
            }

            else {
                echo "<h1 class='main-header'>User not found!</h1>";
            }
        }
    }

    if (isset($_GET['unfollow']) && is_numeric($_GET['unfollow'])) {
        $follower_id = mysql_escape_string($_SESSION['valid_visitor']);
        $followed_id = mysql_escape_string($_GET['unfollow']);

        // check if already following
        $exists_query = "SELECT * FROM `followers_table` WHERE `follower_id` =  (SELECT `id` FROM `visitors` WHERE email=\"".$follower_id."\") AND `following_id` =  \"".$followed_id."\";";
        $exists_result = $db->query($exists_query);

        echo $exists_query;

        // if already following
        if ($exists_result->num_rows > 0) {
            $query = "DELETE FROM `followers_table` WHERE `follower_id` =  (SELECT `id` FROM `visitors` WHERE email=\"".$follower_id."\") AND `following_id` =  \"".$followed_id."\";";
            $result = $db->query($query);

            echo $query;

            if ($result) {
                echo "<h1>Stopped following ".$followed_id."</h1>";
                header('Location:'.$_SESSION['callback_URL']);
            }

            else {
                echo "<h1 class='main-header'>User not found!</h1>";
            }
        }

        // if not following
        else {
            echo "<h1>You were not following this user.";
        }
    }
    // close connection
    $db->close();
}
else {
    header('Location: login_visitor_authenticate.php');
    exit;
}
?>

</div>

<?php require_once("includes/footer.php"); ?>