<?php
    echo __FILE__;
    echo "<br/>";
    echo __DIR__;

    echo"<br />";
    if(file_exists("file_basics.php")) {
        echo "true";
    } else {
        echo "false";
    }
?>