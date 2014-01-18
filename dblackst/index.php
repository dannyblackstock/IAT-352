<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar.php"); ?>

<div id="content-container">
    <h1 class="center-text">Members</h1>

    <p>
        <a href="high_schools_list.php">View Highschools</a>
    </p>

    <table id="members-table">
        <tr>
            <th>Photo</th>
            <th>Name</th>
        </tr>
        <?php
            // load info file for all users
            $userInfo = file_get_contents("user_info.txt");

            // create an array of each user
            $userInfo = explode("\n", $userInfo);
            // print_r($userInfo);

            // loop through fields for each user
            foreach($userInfo as $user){
                $user = explode(" | ", $user);
                // print name at index 0 from user array
                echo "<tr><td><img src=\"img/user_icon.png\" alt=\"Placeholder user photo\" width=\"50\" height=\"50\"</td>";
                echo "<td>".$user[0]."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>

<?php require("includes/footer.php"); ?>