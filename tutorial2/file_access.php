<?php
    $file = "test.txt";
    $content = file_get_contents($file);
    //unlink("test.txt"); // delete a file

    echo "<br>";
    nl2br($content);
?>