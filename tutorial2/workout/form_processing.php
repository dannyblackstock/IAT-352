<?php
// Snippet 2. Form processing template
?>

<?php // Please note that the line beginning with <!-- DOCTYPE should be uncommented ?>
DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"
<html lang="en">
    <head>
        <title>Form Processing - write file</title>
    </head>
    <body>  
        <?php
            // detect form submission
                // true:
                    // detect if each variable is set (player, team, email, homepage, details)
                    // true: assign values to variables $player, $team, $email, $homepage, $details
                        // open file players_info.txt in "append" mode
                        // insert values into the file
                        // close session
                    // false: for each variable that is not set, assign an empty string
                // false:
                    // false: for each variable assign an empty string
                    // and print message that values are not defined
            if(isset($_POST['submit']))
            {
                echo 'true';
                if(isset($_POST['player'])) {
                    $player = $_POST['player'];
                } else {
                    $player = '';
                }
            } else {
                echo 'false';
            }
        ?>      
        
    </body>
</html>