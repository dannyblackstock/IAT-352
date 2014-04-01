<?php
require_once ("includes/header.php");

// Main menu bar for all pages
require_once ("includes/main_menu_bar.php");

// connect to database
require_once ("includes/database_info.php");

// Require codebird and Twitter authentication parameters to dsplay tweets
require_once ('includes/codebird-php/src/codebird.php');
require_once ('includes/twitter_config.php');
?>

<div id="content-container">
    <h1 class="main-header">Updates from people I follow</h1>
    <div class="container">
      <div id='user-posts-header'>
        <div id='toggle-posts' class='active'>Posts</div>
        <div id='toggle-tweets' class='active'>Tweets</div>
      </div>
<?php

// user must login to a visitor account if they want to view this page
if (!isset($_SESSION['valid_visitor'])) {
  header('Location: login_visitor_authenticate.php');
  exit;
}

// if they are a visitor
else if (isset($_SESSION['valid_visitor'])) {

  // create an common array of tweets and posts
  $feedContent = [];
  // list of users who have twitter handles in the database
  $twitterUsers = [];
  // use vancouver time
  date_default_timezone_set('America/Vancouver');

  // get all posts from users the visitor is following
  // $following_posts_query =
  //   "SELECT *
  //     FROM posts p
  //     WHERE EXISTS (
  //       SELECT *
  //       FROM followers_table f
  //       WHERE f.follower_id = (
  //           SELECT `id`
  //           FROM `visitors`
  //           WHERE email=\""
  //           . mysql_escape_string($_SESSION['valid_visitor'])
  //           . "\")
  //       AND f.following_id = p.user_id)
  //   ORDER BY p.date DESC";

  // get all users the visitor is following
  $following_users_query =
    "SELECT *
      FROM members m
      WHERE EXISTS (
        SELECT *
        FROM followers_table f
        WHERE f.follower_id = (
            SELECT `id`
            FROM `visitors`
            WHERE email=\""
            . mysql_escape_string($_SESSION['valid_visitor'])
            . "\")
        AND f.following_id = m.id)";

  // echo $following_users_query;
  $following_users_result = $db->query($following_users_query);

  // if there are any users that this visitor is following
  if ($following_users_result->num_rows > 0) {

    while ($user = $following_users_result->fetch_assoc()) {

      // get all this user's posts
      $user_posts_query = "SELECT * FROM posts WHERE user_id=" . $user['id'] . " ORDER BY date DESC;";
      $user_posts_result = $db->query($user_posts_query);

      if ($user_posts_result) {

        // if this user has any posts
        if ($user_posts_result->num_rows > 0) {

          // loop through them all
          while ($post = $user_posts_result->fetch_assoc()) {

            // add posts to the array in standard format
            $postArray = [
              "userID" => $user['id'],
              "name" => $user['name'],
              "twitter_handle" => "",
              "date" => strtotime($post['date']),
              "title" => $post['title'],
              "content" => $post['content'],
              "type" => "post"
            ];
            // add the posts to the content array
            array_push($feedContent, $postArray);
          }
        }
      }

      // if they have a twitter handle
      if (!empty($user['twitter_handle']) && $user['twitter_handle'] !== "NULL") {

        // get their tweets and add them to the feed content in standard format
        $numTweets = 3;
        $tweets = get_user_tweets($user['twitter_handle'], $numTweets, $cb);

        // add the tweets to the news feed array
        foreach($tweets as $tweet) {
          // skip entry if it has no id (may be status item "httpstatus")
          if (empty($tweet['id'])) {
            continue;
          }

          $tweetArray = [
            "userID" => $user['id'],
            "name" => $user['name'],
            "twitter_handle" => "@" . $tweet['user']['screen_name'],
            "date" => strtotime($tweet['created_at']),
            "title" => "",
            "content" => $tweet['text'],
            "type" => "tweet"
          ];

          array_push($feedContent, $tweetArray);
        }
      }
    }
  }
  else {
    echo "You aren't following any users.";
  }

  // sort tweets+posts by timestamp
  usort($feedContent,
  function ($a, $b)
  {
    return $b['date'] - $a['date'];
  });

  // print all posts + tweets
  foreach($feedContent as $post) {
    echo "
      <div class='post-container " . $post['type'] . "'>
        <div class='post-info'>
          <div class='post-info-left'>
            <img class='user-profile-pic' src='img/profile_pictures/";
            // defined in header.php
            echo get_user_picture($post['userID']);
            echo"' alt='User Profile Picture'>
            <div class='user-name'>
              <a href='user.php?id=".$post['userID']."'>".$post['name']."</a>";
    if ($post['type'] == 'tweet') {
      echo " - via <a href='http://www.twitter.com/".$post['twitter_handle']."'>".$post['twitter_handle']."</a> on Twitter";
    }
    echo "</div>
          </div>

          <div class='post-info-right'>
            <div class='time-posted'>
                Posted " . date('M j, Y', $post['date'])
                . " at " . date('g:ia', $post['date']) . "
            </div>
          </div>
        </div>

        <div class='post-contents'>
          <b>" . $post['title'] . "</b>
          <p>" . $post['content'] . "</p>
        </div>
      </div>
    ";
  }
}

?>
  </div>
</div>

<?php
require_once ("includes/footer.php");
?>