<!-- HTML header, title, body tags, etc -->
<?php require_once("includes/header.php");

//Main menu bar for all pages
require_once("includes/main_menu_bar.php");

// connect to database
require_once("includes/database_info.php");
?>

<div id="content-container">
    <h1 class="main-header">High Schools</h1>
    
    <div class="toggle-switch" id="hs-members-toggle">
        <div class="sort-label">SORT BY </div>
        <a class="toggle-switch-left" href="index.php">
            Name</a><a class="toggle-switch-right active" href="high_schools_list.php">
            High School</a>
    </div>

    <div id="high-schools-table" class="container">


        <?php
        // Perform database query

        $query = "SELECT `id`, `name` , `high_school` FROM `members` ORDER BY `members`.`high_school` ASC";

        $result = $db->query($query);

        if ($result = $db->query($query)) {
            $current_school = "";
            /* fetch associative array */
            while ($user = $result->fetch_assoc()) {
                // printf ("%s (%s)\n", $user["name"], $user["high_school"]);
                if ($user['high_school'] != $current_school) {
                    $current_school = $user['high_school'];
                    echo "<h1>".$user['high_school']."</h1><br>";
                }
                echo "<a href=\"user.php?id=".$user['id']."\" class=\"user-container\">
                        <div class=\"user-info-container\">
                            <div class=\"user-name\">".$user['name']."</div>
                        </div>
                    </a>";
            }

            /* free result set */
            $result->free();
        }


        /* close connection */
        $db->close();
        ?>
    </table>
</div>

<?php require("includes/footer.php"); ?>