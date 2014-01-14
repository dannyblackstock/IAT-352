<?php
/* 
* Using code Snippet 1, create page form.php
*/


// Snippet 1. Form template
?>

<?php // Please note that the line beginning with <!-- DOCTYPE should be uncommented ?>
<!--DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"-->

<html lang="en">
    <head>
        <title>Form</title>
    </head>
    <body>

        <form action="form_processing.php" method="post">
          Player: <input type="text" name="player" value="" /><br />
          Team: <input type="text" name="team" value="" /><br />
          Email: <input type="text" name="email" value="" /><br />
          Homepage: <input type="text" name="homepage" value="" /><br />
          Details: <input type="text" name="details" value="" /><br />
            <br />
          <input type="submit" name="submit" value="Submit" />
        </form>

    </body>
</html>