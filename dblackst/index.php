<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php");

//Main menu bar for all pages
require("includes/main_menu_bar.php");

// connect to database
require("includes/database_info.php");
?>

<div id="content-container">
    <h1 class="main-header">Members</h1>
    
    <div class="toggle-switch" id="hs-members-toggle">
        <!-- <div class="sort-label">SORT BY </div> -->
        <a class="toggle-switch-left active" href="index.php">
            Name</a><a class="toggle-switch-right" href="high_schools_list.php">
            High School</a>
    </div>

    <div id="members-table" class="container">

        <?php
        // Perform database query

        $query = "SELECT `id`, `name` , `high_school` FROM `members` ORDER BY `members`.`name` ASC LIMIT 0 , 30";

        $result = $db->query($query);

        if ($result = $db->query($query)) {

            /* fetch associative array */
            while ($user = $result->fetch_assoc()) {
                // printf ("%s (%s)\n", $user["name"], $user["high_school"]);
                echo "<a href=\"user.php?id=".$user['id']."\" class=\"user-container\">
                            <div style=\"background-image:url('img/user_icon.png');\" alt=\"Placeholder user photo\" class=\"user-profile-picture\"></div>
                            <div class=\"user-info-container\">
                                <div class=\"user-name\">".$user['name']."</div>
                                <div class=\"user-high-school\">".$user['high_school']."</div>
                            </div>
                        </a>";
            }

            /* free result set */
            $result->free();
        }


        /* close connection */
        $db->close();
        ?>
    </div>
</div>

<?php require("includes/footer.php"); ?>