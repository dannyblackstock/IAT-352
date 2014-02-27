<!-- HTML header, title, body tags, etc -->
<?php require_once("includes/header.php");

//Main menu bar for all pages
require_once("includes/main_menu_bar.php");

// connect to database
require_once("includes/database_info.php");
?>

<div id="content-container">
    <h1 class="main-header">Posts by members I'm following</h1>

    <div class="container">
        <?php
        // user must login to a visitor account if they want to follow
        if (!isset($_SESSION['valid_visitor'])) {
            header('Location: login_visitor_authenticate.php');
            exit;
        }

        // Code for follow/unfollow button
        // if they are a visitor
        else if (isset($_SESSION['valid_visitor'])) {

            // check if the visitor is following this member already by querying the database
            $follower_id = mysql_escape_string($_SESSION['valid_visitor']);

            // get all posts from users the visitor is following
            $following_query = "SELECT *
                                FROM posts p
                                WHERE EXISTS (SELECT *
                                    FROM followers_table f
                                    WHERE f.follower_id = (SELECT `id` FROM `visitors` WHERE email=\"".mysql_escape_string($_SESSION['valid_visitor'])."\") AND f.following_id = p.user_id)";
            // echo $following_query;

            $following_result = $db->query($following_query);

            // if this user has any posts
            if ($following_result->num_rows > 0) {

                while ($post = $following_result->fetch_assoc()) {
                    echo "<div class='post-container'>
                        <div class='post-info'>
                            <div class='post-info-left'>
                                <img class='user-profile-pic' src='img/user_icon.png' alt='User Profile Picture'>
                                <div class='user-name'>";
                    // get the user's name
                    $user_info_query = "SELECT name FROM members WHERE id=".$post['user_id'].";";
                    $user_info_result = $db->query($user_info_query);

                    // if the user's name exists
                    if ($user_info_result) {
                        if ($user_info_result->num_rows > 0) {
                            // fetch associative array
                            $user = $user_info_result->fetch_array(MYSQLI_ASSOC);
                            echo $user['name'];
                        }
                        else {
                            echo $post['user_id'];
                        }
                    }
                    else {
                        echo $post['user_id'];
                    }

                    echo "</div>
                            </div>

                            <div class='post-info-right'>
                                <div class='time-posted'>Posted on ".$post['date']."</div>
                            </div>
                        </div>

                        <div class='post-contents'>
                            <b>".$post['title']."</b>
                            <p>".$post['content']."</p>
                        </div>
                    </div>";
                }
                echo "</div>";
            }

            else {
                echo "<p>No posts to show!</p>";
            }
        }
        ?>
    </div>
</div>

<?php require_once("includes/footer.php"); ?>

<!-- SELECT *
FROM posts p
WHERE EXISTS (SELECT *
    FROM followers_table f
    WHERE f.follower_id = @your_id AND f.following_id = p.following_id) -->