<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar.php"); ?>

<div id="content-container">
    <h1 class="center-text">Log in</h1>
    <!-- Sign up form -->
    <form name="input" action="html_form_action.asp" method="get" class="sign-up-log-in-form">

        <input class="form-input" type="email" name="email" id="emailInput" placeholder="Email">

        <input class="form-input" type="password" name="password" id="passwordInput" placeholder="Password">

        <input class="form-button" type="submit" value="Submit">
        <p>Don't have an account? <a href="sign_up.php">Sign up</a></p>
    </form> 
</div>

<?php require("includes/footer.php"); ?>