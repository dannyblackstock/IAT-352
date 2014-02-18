<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar_https.php"); ?>

<div id="content-container">
    <?php
    if (isset($_SESSION['valid_member']) || isset($_SESSION['valid_visitor'])) {
        if (isset($_SESSION['valid_member'])) {
            $query = "SELECT * FROM `members` WHERE email=\"".mysql_real_escape_string($_SESSION['valid_member'])."\";";
            $result = $db->query($query);

            if ($result) {
                if ($result->num_rows > 0) {
                    $user = $result->fetch_array(MYSQLI_ASSOC);
                    echo "<form name=\"input\" action=\"update_user_info.php\" method=\"post\" class=\"sign-up-log-in-form container\">

                            <h1 class=\"center-text\">Edit my info</h1>

                            <input class=\"form-input\" type=\"text\" name=\"name\" value=\"".$user['name']."\" class=\"required\">

                            <input class=\"form-input\" type=\"text\" name=\"location\" value=\"".$user['location']."\" class=\"required\">

                            <input class=\"form-input\" type=\"text\" name=\"highschool\" value=\"".$user['high_school']."\" class=\"required\">

                            <input class=\"form-input\" type=\"number\" name=\"graduationYear\" value=\"".$user['grad_year']."\" class=\"required\" value=\"2000\">";

                            if ($user['phone'] != "NULL" && $user['phone'] != NULL ) {
                                echo "<input class=\"form-input\" type=\"tel\" name=\"phone\" value=\"".$user['phone']."\">";
                            }
                            else {
                                echo "<input class=\"form-input\" type=\"tel\" name=\"phone\" placeholder=\"Phone number\">";
                            }

                            if ($user['is_phone_preferred'] == "1") {
                                echo "<input class=\"form-input\" type=\"checkbox\" name=\"isPhonePreferred\" id=\"isPhonePreferred\" checked>";
                            }

                            else {
                                echo "<input class=\"form-input\" type=\"checkbox\" name=\"isPhonePreferred\" id=\"isPhonePreferred\">";
                            }

                            echo "<label for=\"isPhonePreferred\">I prefer to be contacted by phone.";

                            if ($user['bio'] != "NULL" && $user['bio'] != NULL && $user['bio'] != "") {
                                echo "<textarea class=\"form-textarea\" name=\"bio\">".$user['bio']."</textarea>";
                            }
                            else {
                                echo "<textarea class=\"form-textarea\" name=\"bio\" placeholder=\"Bio\"></textarea>";
                            }

                            echo "<!-- hidden post request -->
                            <input type=\"hidden\" name=\"user_type\" value=\"member\">

                            <input class=\"form-button button-grey\" type=\"submit\" name=\"submit\" value=\"Submit\">

                        </form>";
                }
                else {
                    // if the name couldn't be retrieved, use the email
                    echo " <a href=\"new_post.php\">New Post</a>";
                    echo "Logged in as ".$_SESSION['valid_member']."</p>";
                    echo "<a href=\"logout.php\">Log out</a>";
                }
            }
            else {
                echo "<h1 class=\"main-header\">Query failed!</h1>";
            }
        }
        if (isset($_SESSION['valid_visitor'])) {
            $query = "SELECT * FROM `visitors` WHERE email=\"".mysql_real_escape_string($_SESSION['valid_visitor'])."\";";
            $result = $db->query($query);
            if ($result) {
                if ($result->num_rows > 0) {
                    $user = $result->fetch_array(MYSQLI_ASSOC);
                    echo "<form name=\"input\" action=\"update_user_info.php\" method=\"post\" class=\"sign-up-log-in-form container\">

                            <h1 class=\"center-text\">Edit my info</h1>

                            <input class=\"form-input\" type=\"text\" name=\"name\" value=\"".$user['name']."\" class=\"required\">
                            <input class=\"form-button button-grey\" type=\"submit\" name=\"submit\" value=\"Submit\">

                            <!-- hidden post request -->
                            <input type=\"hidden\" name=\"user_type\" value=\"visitor\">";
                }
                else {
                    // if the name couldn't be retrieved, use the email
                    echo "<a href='post_feed.php'>Post Feed</a>";
                    echo "Logged in as ".$_SESSION['valid_visitor']."</p>";
                    echo "<a href=\"logout.php\">Log out</a>";
                }
            }
            else {
                echo "<h1 class=\"main-header\">Query failed!</h1>";
            }
        }
    }
    //if not a member or visitor
    else {
        header('Location: login.php');
    }
    ?>
</div>

<?php require("includes/footer.php"); ?>