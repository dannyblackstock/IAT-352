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
    // if this is a proper user page URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        // Perform database query
        $userID = mysql_escape_string($_GET['id']);

        $user_info_query = "SELECT * FROM members WHERE id=".$userID.";";
        $user_info_result = $db->query($user_info_query);

        // if the user's info exists
        if ($user_info_result) {
            if ($user_info_result->num_rows > 0) {

                // fetch associative array
                $user = $user_info_result->fetch_array(MYSQLI_ASSOC);

                // profile picture
                echo "<div id='user-info-box' class='container'>
                        <div id='user-main-profile-picture'  style='background-image:url(\"img/profile_pic.jpg\");' >
                        </div>
                        <div id='user-info-content'>";

                // user's name
                echo "<h1 class='user-name'>".$user['name']."</h1>";




                // Code for follow/unfollow button

                // user must login to a visitor account if they want to follow
                if (!isset($_SESSION['valid_member']) && !isset($_SESSION['valid_visitor'])) {
                    echo "<p><a href='login_visitor_authenticate.php' class='button'>Follow</a></p>";
                }

                // if they are a visitor
                else if (isset($_SESSION['valid_visitor'])) {

                    // check if the visitor is following this member already by querying the database
                    $follower_id = mysql_escape_string($_SESSION['valid_visitor']);
                    $following_query = "SELECT * FROM `followers_table` WHERE `follower_id` =  (SELECT `id` FROM `visitors` WHERE email=\"".$follower_id."\") AND `following_id` =  \"".$userID ."\";";
                    $following_result = $db->query($following_query);

                    // echo $exists_query;

                    // if already following
                    if ($following_result->num_rows > 0) {
                        // visitor can unfollow
                        echo "<p><a href='follow.php?unfollow=".$userID."' class='button'>Unfollow</a></p>";
                    }
                    else {
                        // if they're not following, they can follow
                        echo "<p><a href='follow.php?follow=".$userID."' class='button'>Follow</a></p>";
                    }
                }

                // email address
                echo "<div><a href='mailto:".$user['email']."?Subject=SIAT' target='_top'>".$user['email']."</a>";

                if (!empty($user['phone']) && $user['phone'] !== "NULL") {
                    echo " | ".$user['phone']."</div>";

                    if ($user['is_phone_preferred'] == "1") {
                        echo "<div>".$user['name']." prefers to be contacted by phone.</div>";
                    }
                }

                else {
                    echo "</div>";
                }

                // High school info
                echo "<p>Graduated from ".$user['high_school']." in ".$user['grad_year'].".</p>";

                // Current city
                echo "<p>Currently lives in ".$user['location'].".</p>";

                // Bio
                if (!empty($user['bio']) && $user['bio'] !== "NULL") {
                    echo "<p>".$user['bio']."</p>";
                }
                echo "</div>
                        </div>";


                // user's posts
                $user_posts_query = "SELECT * FROM posts WHERE user_id=".$userID." ORDER BY date DESC;";
                $user_posts_result = $db->query($user_posts_query);

                if ($user_posts_result) {

                    echo "<div id='user-posts' class='container'>
                    <h1 id='user-posts-header'>Posts</h1>";

                    // if this user has any posts
                    if ($user_posts_result->num_rows > 0) {

                        // show them all
                        while ($post = $user_posts_result->fetch_assoc()) {
                            echo "<div class='post-container'>
                                <div class='post-info'>
                                    <div class='post-info-left'>
                                        <img class='user-profile-pic' src='img/user_icon.png' alt='User Profile Picture'>
                                        <div class='user-name'>".$user['name']."</div>
                                    </div>

                                    <div class='post-info-right'>
                                        <div class='time-posted'>Posted on ".$post['date']."</div>
                                    </div>
                                </div>

                                <div class='post-contents'>
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
                echo "<h1 class='main-header'>User not found!</h1>";
            }
        }
        else {
            echo "<h1 class='main-header'>Query failed!</h1>";
        }
        // close connection
        $db->close();
    }
    else {
        echo "<h1 class='main-header'>User not found!</h1>";
    }
    ?>
</div>

<?php require_once("includes/footer.php"); ?>