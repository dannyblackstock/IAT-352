<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar.php"); ?>

<div id="content-container">
    <h1 class="center-text">Test Form</h1>
    <!-- Sign up form -->
    <form name="input" action="form_result.php" method="post" class="sign-up-log-in-form">

        <input type="text" name="name" placeholder="Name">

        <input type="email" name="email" placeholder="Email">

        <input type="password" name="password" placeholder="Password">

        <input type="submit" name="submit" value="Submit">

        <p>Don't have an account? <a href="sign_up.php">Sign up</a></p>
    </form> 
</div>

<?php require("includes/footer.php"); ?>