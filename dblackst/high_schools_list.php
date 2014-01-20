<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar.php"); ?>

<div id="content-container">
    <h1 class="main-header">High Schools</h1>
    
    <div class="toggle-switch" id="hs-members-toggle">
        <!-- <div class="sort-label">SORT BY </div> -->
        <a class="toggle-switch-left" href="index.php">
            Name</a><a class="toggle-switch-right active" href="high_schools_list.php">
            High School</a>
    </div>

    <table id="members-table" class="container">
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>High School</th>
        </tr>
        <?php
            // compare two high school names using the "human order" algrorithm
            function compare_lastname($a, $b) {
                return strnatcasecmp($a[5], $b[5]);
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

                // sort the array of arrays alphabetically by high school
                usort($usersSortedArray, 'compare_lastname');

                // print the sorted array
                foreach($usersSortedArray as $user){
                    echo "<tr><td class=\"profile-picture-cell\"><img src=\"img/user_icon.png\" alt=\"Placeholder user photo\" width=\"50\" height=\"50\"</td>";
                    echo "<td class=\"user-name-cell\"><a href=\"user.php?id=".$user[0]."\">".$user[1]."</a></td>";
                    echo "<td class=\"high-school-name-cell\">".$user[5]."</td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
</div>

<?php require("includes/footer.php"); ?>