<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar.php"); ?>

<div id="content-container">
    <h1 class="center-text">Members</h1>
    <table id="members-table">
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>High School</th>
            <th>High School Graduation Year</th>
        </tr>
        <tr>
            <td>:)</td>
            <td>Danny Blackstock</td>
            <td>ACRSS</td>
            <td>2011</td>
        </tr>
        <?php
            // load info file for all users
            $userInfo = file_get_contents("user_info.txt");

            // create an array of each user
            $userInfo = explode("\n", $userInfo);
            print_r($userInfo);

            // loop through fields for each user
            foreach($userInfo as $user){
                $user = explode(" | ", $user);
                echo "<br>".$user[0]."<br>";
            }
        ?>
    </table>
</div>

<?php require("includes/footer.php"); ?>