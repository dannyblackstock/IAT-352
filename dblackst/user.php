<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar.php"); ?>

<div id="content-container">

    <?php
        if (is_numeric($_GET['id'])) {

            // set id for the current user view
            $userID = $_GET['id'];

            // load user file
            $userFile = file_get_contents("user_info.txt");

            // split into an array at every new line
            $usersArray = explode("\n", $userFile);

            // array to hold users when all fields are separated
            $usersSortedArray = array();

            foreach ($usersArray as $user) {
                // split each user into an array of fields and add it to an array
                $user = explode(" | ", $user);
                array_push($usersSortedArray, $user);
            }

            // set the user based on the current ID of the GET with the page
            $pageUser = $usersSortedArray[($userID-1)];

            // get the variables for the user
            $userName = $pageUser[1];
            $userEmail = $pageUser[2];
            // $userPassword = $pageUser[3];
            // $userProfilePhoto = $pageUser[4];
            $userHighSchool = $pageUser[5];
            $userGradYear = $pageUser[6];
            $userBio = $pageUser[7];

            echo "<div id=\"user-info-box\" class=\"container\">
                    <div id=\"user-main-profile-picture\"  style=\"background-image:url('img/profile_pic.jpg');\" >
                    </div>
                    <div id=\"user-info-content\">";

            echo "<h1 class=\"user-name\">".$userName."</h1>";
            echo "<div><a href=\"mailto:".$userEmail."?Subject=Hello%20again\" target=\"_top\">".$userEmail."</a></div>";
            echo "<p>Graduated from ".$userHighSchool." in ".$userGradYear.".</p>";
            echo "<p>".$userBio."</p>";
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
        }

        else {
            echo "<h1 class=\"main-header\">User not found!</h1>";
        }
    ?>

</div>

<?php require("includes/footer.php"); ?>