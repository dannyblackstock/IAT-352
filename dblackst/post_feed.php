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

  // get all posts from users the visitor is following
  $following_query =
    "SELECT *
      FROM posts p
      WHERE EXISTS (
        SELECT *
        FROM followers_table f
        WHERE f.follower_id = (
            SELECT `id`
            FROM `visitors`
            WHERE email=\""
            . mysql_escape_string($_SESSION['valid_visitor'])
            . "\")
        AND f.following_id = p.user_id)
    ORDER BY p.date DESC";

  // echo $following_query;
  $following_result = $db->query($following_query);

  // if this user has any posts
  if ($following_result->num_rows > 0) {

    while ($post = $following_result->fetch_assoc()) {
      // get the user's info
      $user_info_query = "SELECT * FROM members WHERE id=" . $post['user_id'] . ";";
      $user_info_result = $db->query($user_info_query);

      // if the user's name exists
      if ($user_info_result) {
        if ($user_info_result->num_rows > 0) {

          // fetch associative array
          $user = $user_info_result->fetch_array(MYSQLI_ASSOC);
          // echo "<a href='user.php?id=" . $post['user_id'] . "'>" . $user['name'] . "</a>";

          // add posts to the array in standard format
          $postArray =[
            "username" => $user['name'],
            "date" => strtotime($post['date']),
            "title" => $post['title'],
            "content" => $post['content'],
            "type" => "post"
          ];
          array_push($feedContent, $postArray);

          // if they have a twitter handle
          if (!empty($user['twitter_handle']) && $user['twitter_handle'] !== "NULL") {
            //if their name isn't already in the list
            if (!in_array($user['twitter_handle'], $twitterUsers)) {
              // add their twitter handle to this list of users to get tweets for
              array_push($twitterUsers, $user['twitter_handle']);
            }
          }

        }
        else {
          // echo "<a href='user.php?id=" . $post['user_id'] . "'>" . $user['user_id'] . "</a>";
        }
      }
      else {
        // echo "<a href='user.php?id=" . $post['user_id'] . "'>" . $user['user_id'] . "</a>";
      }
    }
  }
  else {

  }

  // for each twitter handle of the following users
  foreach ($twitterUsers as $twitterHandle) {
    // get 3 tweets
    //add them to the feed content array in the standard format

    // Create query get tweets
    $numTweets = 3;
    $tweets = get_user_tweets($twitterHandle, $numTweets, $cb);

    // add the tweets to the news feed array
    foreach($tweets as $tweet) {
      // skip entry if it has no id (may be status item "httpstatus")
      if (empty($tweet['id'])) {
        continue;
      }

      $tweetArray = [
        "username" => "@" . $tweet['user']['screen_name'],
        "date" => strtotime($tweet['created_at']),
        "title" => "",
        "content" => $tweet['text'],
        "type" => "tweet"
      ];

      array_push($feedContent, $tweetArray);
    }
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
            <img class='user-profile-pic' src='img/user_icon.png' alt='User Profile Picture'>
            <div class='user-name'>";
    if ($post['type'] == "tweet") {
      echo "<a href='http://www.twitter.com/".$post['username']."'>".$post['username']."</a>";
    }
    else {
      // echo "<a href='user.php?id=".$post['username']."'>".$post['username']."</a>";
      echo $post['username'];
    }
    echo "</div>
          </div>

          <div class='post-info-right'>
            <div class='time-posted'>
                Posted " . date('M j, Y', $post['date']) . " at " . date('g:ia', $post['date']) . "
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