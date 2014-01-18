<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar.php"); ?>

<?php
    // print_r($_POST);

    // if the form was submitted
    if(isset($_POST['submit'])) {

        // check if each form input was filled, if not, make the variable and empty string
        if(isset($_POST['name'])) {
            $name = $_POST['name'];
        }
        else {
            $name = '';
        }

        if(isset($_POST['email'])) {
            $email = $_POST['email'];
        }
        else {
            $email = '';
        }

        if(isset($_POST['password'])) {
            $password = $_POST['password'];
        }
        else {
            $password = '';
        }

        if(isset($_POST['profilePicture'])) {
            $profilePicture = $_POST['profilePicture'];
        }
        else {
            $profilePicture = '';
        }

        if(isset($_POST['highschool'])) {
            $highschool = $_POST['highschool'];
        }
        else {
            $highschool = '';
        }

        if(isset($_POST['graduationYear'])) {
            $graduationYear = $_POST['graduationYear'];
        }
        else {
            $graduationYear = '';
        }

        if(isset($_POST['bio'])) {
            $bio = $_POST['bio'];
        }
        else {
            $bio = '';
        }

        $userDataString = "\n".$name." | ".$email." | ".$password." | ".$profilePicture." | ".$highschool." | ".$graduationYear." | ".$bio;

        // write the user info to a text file
        file_put_contents("user_info.txt", $userDataString, FILE_APPEND);

        // inform the user that the account was added
        echo "<div id=\"sign-up-results\">
            <h2>Your account was created!</h2>
            <p>Name: ".$name."</p>
            <p>Email: ".$email."</p>
            <p>Password: ".$password."</p>
            <p>Profile picture: ".$profilePicture."</p>
            <p>Highschool: ".$highschool."</p>
            <p>Graduation Year: ".$graduationYear."</p>
            <p>Bio: ".$bio."</p>
            </div>";
    }

    else {
        echo 'Submit button was not clicked.<br>';
    }
?>

<?php require("includes/footer.php"); ?>