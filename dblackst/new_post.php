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

        if (isset($_SESSION['valid_member'])) {
        ?>

            <div id="content-container">

                <form name="input" action="submit_new_post.php" method="post" class="sign-up-log-in-form container">

                    <h1 class="center-text">New post</h1>

                    <input class="form-input" type="title" name="title" placeholder="Title" class="required">

                    <textarea class="form-textarea" name="content" placeholder="Write your post here!"></textarea>

                    <input class="form-button button-grey" type="submit" name="submit" value="Finish post">
                </form>
            </div>
        <?php
        }
        else {
            header("Location: login_member_authenticate.php");
            exit;
        }

    ?>
</div>

<?php require_once("includes/footer.php"); ?>