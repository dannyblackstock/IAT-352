<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar.php"); ?>

<div id="content-container">
    
    <!-- Sign up form -->
    <form name="input" action="sign_up_process.php" method="post" class="sign-up-log-in-form container">

        <h1 class="center-text">Sign up</h1>

        <input class="form-input" type="email" name="email" placeholder="Email" class="required">

        <input class="form-input" type="password" name="password" placeholder="Password" class="required">

        <input class="form-input" type="text" name="name" placeholder="Full Name" class="required">

        <!-- Profile picture upload-->
        <!-- <input class="form-file-input" type='file' name='profilePicture'> -->

        <input class="form-input" type="text" name="location" placeholder="Current City" class="required">

        <input class="form-input" type="text" name="highschool" placeholder="High School" class="required">

        <input class="form-input" type="number" name="graduationYear" placeholder="High School Grad Year" class="required" value="2000">

        <input class="form-input" type="tel" name="phone" placeholder="Phone">

        <input class="form-input" type="checkbox" name="isPhonePreferred" id="isPhonePreferred">
        <label for="isPhonePreferred">I prefer to be contacted by phone.

        <textarea class="form-textarea" name="bio" placeholder="Bio"></textarea>


        <input class="form-button button-grey" type="submit" name="submit" value="Submit">

        <p>Already have an account? <a href="log_in.php">Log in</a></p>
    </form> 
</div>

<?php require("includes/footer.php"); ?>