<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar.php"); ?>

<div id="content-container">
    <h1 class="center-text">Sign up</h1>
    <!-- Sign up form -->
    <form name="input" action="html_form_action.asp" method="get" class="sign-up-log-in-form">

        <input type="text" name="firstName" id="firstNameInput" placeholder="First name">

        <input type="text" name="lastName" id="lastNameInput" placeholder="Last name">

        <input type="password" name="password" id="passwordInput" placeholder="Password">

        <input type="submit" value="Submit">
        <p>Already have an account? <a href="log_in.php">Log in</a></p>
    </form> 
</div>

<?php require("includes/footer.php"); ?>