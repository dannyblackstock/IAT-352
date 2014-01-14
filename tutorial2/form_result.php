<!-- HTML header, title, body tags, etc -->
<?php require("includes/header.php"); ?>

<!-- Main menu bar for all pages -->
<?php require("includes/main_menu_bar.php"); ?>


<?php print_r($_POST); ?>

<?php
    if(isset($_POST['submit'])) {
        echo 'true';
        if(isset($_POST['name'])) {
            $name = $_POST['name'];
        } else {
            $name = '';
        }

    } else {
        echo 'false';
    }
?>

<?php require("includes/footer.php"); ?>