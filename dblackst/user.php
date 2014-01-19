<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar.php"); ?>

<div id="content-container">

    <?php
        if (is_numeric($_GET['id'])) {
            $userID = $_GET['id'];

            $userFile = file_get_contents("user_info.txt");

            $usersArray = explode("\n", $userFile);

            // array to hold users when all fields are separated and sorted
            $usersSortedArray = array();

            foreach ($usersArray as $user) {
                // split each user into an array of fields and add it to an array
                $user = explode(" | ", $user);
                array_push($usersSortedArray, $user);
            }

            // print the sorted array
            $userName = $usersSortedArray[($userID-1)][1];

            echo "<h1 class=\"main-header\">".$userName."</h1>";
        }
    ?>

</div>

<?php require("includes/footer.php"); ?>