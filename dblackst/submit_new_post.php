<?php

require_once("includes/header.php");

//Main menu bar for all pages
require_once("includes/main_menu_bar.php");

// connect to database
require_once("includes/database_info.php");

if (!isset($_SESSION['valid_member'])) {
    //use proper https URL with a full path
    header("Location: login_member_authenticate.php");
    exit;
}

// Prepared statement
if (!($stmt = $db->prepare("INSERT INTO `posts` (`user_id`, `title`, `content`, `date`)
    VALUES ((SELECT `id` FROM `members` WHERE email=\"".$db->real_escape_string($_SESSION['valid_member'])."\"), ?, ?, NOW())"))) {
    echo "Prepare failed: (" . $db->errno . ") " . $db->error;
}


// INSERT INTO  `posts` (  `user_id` ,  `title` ,  `content` ,  `date` )
// VALUES ((SELECT  `id` FROM  `members` WHERE email =  "dannyblackstock@gmail.com"),  "Fun!",  "Content!", NOW( ))


//bind parameters
$stmt->bind_param('ss', $title, $content);

// if the form was submitted
if(isset($_POST['submit'])) {
    // check if each form input was filled,  read values from $_POST if not, make the variable and empty string

    if(isset($_POST['title'])) {
        $title = $_POST['title'];
    }
    else {
        $title = '';
    }

    if(isset($_POST['content'])) {
        $content = $_POST['content'];
    }
    else {
        $content = '';
    }
}

else {
    // header("Location: new_post.php");
    // exit;
}
// execute database query
if ($stmt->execute()) {
    // echo "Success!\n";
    // printf("%d Row inserted.\n", $stmt->affected_rows);
    $stmt->close();

    $current_user_query = "SELECT `id` FROM `members` WHERE email=\"".$db->real_escape_string($_SESSION['valid_member'])."\"";
    $current_user_result = $db->query($current_user_query);

    echo $current_user_query;
    // if the user's info exists
    if ($current_user_result) {
        $user = $current_user_result->fetch_assoc();
        // send back to the user's page
        header("Location: user.php?id=".$user['id']);
    }
    else {

    echo "<BR>POST SUBMITTED";
    }

}

if ($db->connect_error)  {
    die('Connect Error: ' . $db->connect_error);
}

//Close database connection
$db->close();

require_once("includes/footer.php");
?>