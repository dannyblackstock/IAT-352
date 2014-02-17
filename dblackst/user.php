<!-- HTML header, title, body tags, etc -->
<!-- HTML header, title, body tags, etc -->
<?php

require_once("includes/header.php");

//Main menu bar for all pages
require_once("includes/main_menu_bar.php");

// connect to database
require_once("includes/database_info.php");
?>

<div id="content-container">

        <?php
        // Perform database query
        if (is_numeric($_GET['id'])) {
            $userID = mysql_escape_string($_GET['id']);

            $user_info_query = "SELECT * FROM members WHERE id=".$userID.";";
            $user_info_result = $db->query($user_info_query);

            if ($user_info_result) {
                if ($user_info_result->num_rows > 0) {
                    // fetch associative array
                    $user = $user_info_result->fetch_array(MYSQLI_ASSOC);

                    echo "<div id=\"user-info-box\" class=\"container\">
                            <div id=\"user-main-profile-picture\"  style=\"background-image:url('img/profile_pic.jpg');\" >
                            </div>
                            <div id=\"user-info-content\">";

                    echo "<h1 class=\"user-name\">".$user['name']."</h1>";
                    echo "<div><a href=\"mailto:".$user['email']."?Subject=SIAT\" target=\"_top\">".$user['email']."</a>";
                    if (!empty($user['phone']) && $user['phone'] !== "NULL") {
                        echo " | ".$user['phone']."</div>";
                        if ($user['is_phone_preferred'] == "1") {
                            echo "<div>".$user['name']." prefers to be contacted by phone.</div>";
                        }
                    }
                    else {
                        echo "</div>";
                    }
                    echo "<p>Graduated from ".$user['high_school']." in ".$user['grad_year'].".</p>";

                    echo "<p>Currently lives in ".$user['location'].".</p>";
                    if (!empty($user['bio']) && $user['bio'] !== "NULL") {
                        echo "<p>".$user['bio']."</p>";
                    }
                    echo "</div></div>";

                    $user_posts_query = "SELECT * FROM posts WHERE user_id=".$userID.";";
                    $user_posts_result = $db->query($user_posts_query);

                    if ($user_posts_result) {

                        echo "<div id=\"user-posts\" class=\"container\">
                        <h1 id=\"user-posts-header\">Posts</h1>";

                        if ($user_posts_result->num_rows > 0) {
                            // fetch associative array

                            while ($post = $user_posts_result->fetch_assoc()) {
                                echo "<div class=\"post-container\">
                                    <div class=\"post-info\">
                                        <div class=\"post-info-left\">
                                            <img class=\"user-profile-pic\" src=\"img/user_icon.png\" alt=\"User Profile Picture\">
                                            <div class=\"user-name\">".$user['name']."</div>
                                        </div>

                                        <div class=\"post-info-right\">
                                            <div class=\"time-posted\">Posted on ".$post['date']."</div>
                                        </div>
                                    </div>

                                    <div class=\"post-contents\">
                                        <b>".$post['title']."</b>
                                        <p>".$post['content']."</p>
                                    </div>
                                </div>";
                            }
                            echo "</div>";
                        }

                        else {
                            echo "<p>This user has no posts!</p>";
                        }
                    }
                    else {
                        echo "<p>Could not get user's posts!</p>";
                    }
                }

                else {
                    echo "<h1 class=\"main-header\">User not found!</h1>";
                }
            }
            else {
                echo "<h1 class=\"main-header\">Query failed!</h1>";
            }
            // close connection
            $db->close();
        }
        else {
            echo "<h1 class=\"main-header\">User not found!</h1>";
        }
        ?>
</div>

<?php require_once("includes/footer.php"); ?>