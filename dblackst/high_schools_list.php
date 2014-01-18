<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar.php"); ?>

<div id="content-container">
    <h1 class="center-text">High Schools</h1>

    <p>
        <a href="index.php">View Members</a>
    </p>

        <ul>
            <?php
                // load info file for all users
                $userInfo = file_get_contents("user_info.txt");

                // create an array of each user
                $userInfo = explode("\n", $userInfo);
                // print_r($userInfo);

                // loop through fields for each user
                foreach($userInfo as $user){
                    $user = explode(" | ", $user);
                    // print highschool at index 4 from user array
                    echo "<li>".$user[4]."</li>";
                }
            ?>
        </ul>
</div>

<?php require("includes/footer.php"); ?>