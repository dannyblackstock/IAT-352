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
        // if (is_numeric($_GET['id'])) {
            // $userID = mysql_escape_string($_GET['id']);

            // $query = "SELECT * FROM members WHERE id=".$userID.";";
            // $result = $db->query($query);

            if (isset($_SESSION['valid_user'])) {
                $query = "SELECT `id` FROM `members` WHERE email=\"".mysql_real_escape_string($_SESSION['valid_user'])."\";";
                $result = $db->query($query);

                if ($result) {
                    if ($result->num_rows > 0) {
                        $user = $result->fetch_array(MYSQLI_ASSOC);?>
                        <div id="content-container">

                            <form name="input" action="submit_new_post.php" method="post" class="sign-up-log-in-form container">

                                <h1 class="center-text">New post</h1>

                                <input class="form-input" type="title" name="title" placeholder="Title" class="required">

                                <textarea class="form-textarea" name="content" placeholder="Write your post here!"></textarea>

                                <input class="form-button button-grey" type="submit" name="submit" value="Finish post">
                            </form>
                        </div>

                    <?php }
                    else {
                        // if the name couldn't be retrieved, use the email
                        echo "You are logged in as: ".$_SESSION['valid_user']."</p>";
                        echo "<a href=\"logout.php\">Logout</a>";
                    }
                }
                else {
                    echo "<h1 class=\"main-header\">Query failed!</h1>";
                }
            }
            else {
                header("Location: login_authenticate.php");
                exit;
            }

        ?>
</div>

<?php require_once("includes/footer.php"); ?>