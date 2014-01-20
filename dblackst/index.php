<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar.php"); ?>

<div id="content-container">
    <h1 class="main-header">Members</h1>
    
    <div class="toggle-switch" id="hs-members-toggle">
        <!-- <div class="sort-label">SORT BY </div> -->
        <a class="toggle-switch-left active" href="index.php">
            Name</a><a class="toggle-switch-right" href="high_schools_list.php">
            High School</a>
    </div>

    <div id="members-table" class="container">
<!--         <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>High School</th>
        </tr> -->
        <?php
            // compare two names using the "human order" algrorithm
            function compare_name($a, $b) {
                return strnatcasecmp($a[1], $b[1]);
            }

            if (filesize("user_info.txt") > 0) {
                // array to hold users when all fields are separated and sorted
                $usersSortedArray = array();

                // load info file for all users
                $userFile = file_get_contents("user_info.txt");

                // create an array of each user by splitting it every new line
                $usersArray = explode("\n", $userFile);

                foreach ($usersArray as $user) {
                    // split each user into an array of fields and add it to an array
                    $user = explode(" | ", $user);
                    array_push($usersSortedArray, $user);
                }

                // sort the array of arrays alphabetically by name
                usort($usersSortedArray, 'compare_name');

                // print the sorted array
                foreach($usersSortedArray as $user){
                    echo "<a href=\"user.php?id=".$user[0]."\" class=\"user-container\">
                            <img src=\"img/user_icon.png\" alt=\"Placeholder user photo\" class=\"user-profile-picture\">
                            <div class=\"user-info-container\">
                                <div class=\"user-name\">".$user[1]."</div>
                                <div class=\"user-high-school\">".$user[5]."</div>
                            </div>
                        </a>";
                }
            }
        ?>
    </div>
</div>

<?php require("includes/footer.php"); ?>