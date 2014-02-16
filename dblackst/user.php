<!-- HTML header, title, body tags, etc -->
<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php");

//Main menu bar for all pages
require("includes/main_menu_bar.php");

// connect to database
require("includes/database_info.php");?>


<div id="content-container">

        <?php
        // Perform database query
        if (is_numeric($_GET['id'])) {
            $userID = mysql_escape_string($_GET['id']);

            $query = "SELECT * FROM members WHERE id=".$userID.";";
            $result = $db->query($query);

            if ($result) {
                if ($result->num_rows > 0) {
                    // fetch associative array
                    $user = $result->fetch_array(MYSQLI_ASSOC);

                    echo "<div id=\"user-info-box\" class=\"container\">
                            <div id=\"user-main-profile-picture\"  style=\"background-image:url('img/profile_pic.jpg');\" >
                            </div>
                            <div id=\"user-info-content\">";

                    echo "<h1 class=\"user-name\">".$user['name']."</h1>";
                    echo "<div><a href=\"mailto:".$user['email']."?Subject=Regarding%20SIAT%20Outreach%Page\" target=\"_top\">".$user['email']."</a></div>";
                    echo "<p>Graduated from ".$user['high_school']." in ".$user['grad_year'].".</p>";

                    if (!empty($user['bio']) && $user['bio'] !== "NULL") {
                        echo "<p>".$user['bio']."</p>";
                    }

                    // print_r($user);
                    echo "</div>
                            </div>
                            <div id=\"user-posts\" class=\"container\">
                                <h1 id=\"user-posts-header\">Posts</h1>
                                <div class=\"post-container\">

                                    <div class=\"post-info\">
                                        
                                        <div class=\"post-info-left\">
                                            <img class=\"user-profile-pic\" src=\"img/user_icon.png\" alt=\"User Profile Picture\">
                                            <div class=\"user-name\">Danny Blackstock</div>
                                        </div>

                                        <div class=\"post-info-right\">
                                            <div class=\"time-posted\">Posted on Tuesday at 5:19pm</div>
                                        </div>
                                    </div>

                                    <div class=\"post-contents\">
                                        This is my first post! Yipee!
                                    </div>
                                </div>

                                <div class=\"post-container\">

                                    <div class=\"post-info\">
                                        
                                        <div class=\"post-info-left\">
                                            <img class=\"user-profile-pic\" src=\"img/user_icon.png\" alt=\"User Profile Picture\">
                                            <div class=\"user-name\">Danny Blackstock</div>
                                        </div>

                                        <div class=\"post-info-right\">
                                            <div class=\"time-posted\">Posted on Tuesday at 5:19pm</div>
                                        </div>
                                    </div>

                                    <div class=\"post-contents\">
                                        This is my second post! Yipee!
                                    </div>
                                </div>
                            </div>";
                    // free result set
                    $result->free();
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

<?php require("includes/footer.php"); ?>