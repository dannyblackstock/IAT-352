<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar_https.php"); ?>

<div id="content-container">
    <div class="container">

        <?php
        if (isset($_SESSION['valid_member']) || isset($_SESSION['valid_visitor']))
        {?>
            <h1 class="center-text">Already logged in!</h1>
            <p>You are already logged in! Please <a href="logout.php">log out</a> if you would like to log in to another account.</p>
        <?php
        } else {
        ?>

            <h1 class="center-text">Log in</h1>
            <!-- sign up prompt -->
            <div class="center-text">
                <p>Log in as a </p>
                <a class="button" href="login_member_authenticate.php">
                    Member
                </a>
                or
                <!-- log in / sign out button -->
                <a class="button" href="login_visitor_authenticate.php">
                    Visitor
                </a>
                <p>Don't have an account? <a href="sign_up.php">Sign up</a></p>
            </div>

        <?php
        }
        ?>

    </div>
</div>

<!-- Main menu bar for all pages -->
<?php require("includes/footer.php"); ?>