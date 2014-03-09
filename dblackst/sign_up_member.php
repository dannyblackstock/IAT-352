<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar_https.php"); ?>

<div id="content-container">

    <!-- Sign up form -->
    <form name="input" action="sign_up_member_process.php" method="post" class="user-info-form container">

        <h1 class="center-text">Member sign up</h1>

        <input class="form-input" type="email" name="email" placeholder="Email" required>

        <input class="form-input" type="password" name="password" placeholder="Password" required>

        <input class="form-input" type="text" name="name" placeholder="Full Name" required>

        <!-- Profile picture upload-->
        <!-- <input class="form-file-input" type='file' name='profilePicture'> -->

        <input class="form-input" type="text" name="location" placeholder="Current City" required>

        <input class="form-input" type="text" name="highschool" placeholder="High School" required>

        <input class="form-input" type="number" name="graduationYear"  min="1900" max="2100" placeholder="High School Grad Year" required>

        <input class="form-input" type="tel" name="phone" placeholder="Phone">

        <input class="form-input" type="checkbox" name="isPhonePreferred" id="isPhonePreferred">
        <label for="isPhonePreferred">I prefer to be contacted by phone.

        <textarea class="form-textarea" name="bio" placeholder="Bio"></textarea>

        <input class="form-input" type="text" name="twitter_handle" placeholder="Twitter Screen Name">
        <input class="form-input" type="text" name="flickr_handle" placeholder="Flickr Screen Name">

        <input class="form-button button-grey" type="submit" name="submit" value="Submit">

        <p>Already have an account? <a href="login.php">Log in</a></p>
    </form>
</div>

<?php require("includes/footer.php"); ?>