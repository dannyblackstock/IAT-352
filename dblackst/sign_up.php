<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar.php"); ?>

<div id="content-container">
    <h1 class="center-text">Sign up</h1>
    <!-- Sign up form -->
    <form name="input" action="sign_up_submit.php" method="post" class="sign-up-log-in-form">

        <input type="text" name="name" placeholder="Name">

        <input type="email" name="email" placeholder="Email">

        <input type="password" name="password" placeholder="Password">

        <!-- Profile picture upload-->
        <input type='file' name='profilePicture'>

        <input type="text" name="highschool" placeholder="Highschool">

        <input type="text" name="graduationYear" placeholder="Highschool Grad Year">

        <textarea name="bio" placeholder="Bio"></textarea>

        <input type="submit"  name="submit" value="Submit">
        <p>Already have an account? <a href="log_in.php">Log in</a></p>
    </form> 
</div>

<?php require("includes/footer.php"); ?>