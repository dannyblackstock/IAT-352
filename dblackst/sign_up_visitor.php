<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar_https.php"); ?>

<div id="content-container">

    <!-- Sign up form -->
    <form name="input" action="sign_up_visitor_process.php" method="post" class="user-info-form container">

        <h1 class="center-text">Visitor sign up</h1>

        <input class="form-input" type="email" name="email" placeholder="Email" required>

        <input class="form-input" type="password" name="password" placeholder="Password" required>

        <input class="form-input" type="text" name="name" placeholder="Full Name" required>

        <input class="form-button button-grey" type="submit" name="submit" value="Submit">

        <p>Already have an account? <a href="login.php">Log in</a></p>
    </form>
</div>

<?php require("includes/footer.php"); ?>