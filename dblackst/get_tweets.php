<?php

// connect to database

require_once ("includes/database_info.php");

// Require codebird and Twitter authentication parameters to dsplay tweets

require_once ('includes/twitter_config.php');

// library for generating twitter links
require_once ('includes/twitter-text-php/Autolink.php');

date_default_timezone_set('America/Vancouver');
$tweetArray = [];

// print_r($_GET['id']); echo "<br>";
// if this is a proper user page URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {

  // Perform database query

  $userID = mysql_escape_string($_GET['id']);
  $user_info_query = "SELECT twitter_handle FROM members WHERE id=" . $userID . ";";
  $user_info_result = $db->query($user_info_query);

  // if the user's info exists
  if ($user_info_result) {
    if ($user_info_result->num_rows > 0) {

      // fetch associative array
      $user = $user_info_result->fetch_array(MYSQLI_ASSOC);

      if (!empty($user['twitter_handle']) && $user['twitter_handle'] !== "NULL") {
        // CODEBIRD GET TWEETS FOR USER
        // Create query get tweets
        $numTweets = 3;
        $tweets = get_user_tweets($user['twitter_handle'], $numTweets, $cb);

        foreach($tweets as $tweet) {
          // skip entry if it has no id (may be status item "httpstatus")
          if (empty($tweet['id'])) {
            continue;
          }

          // generate links for the tweets
          $tweetWithLinks = Twitter_Autolink::create($tweet['text'])
            ->setNoFollow(false)
            ->addLinks();

          // add the tweets to the news feed array
          $tempTweetArray = ["username" => $tweet['user']['screen_name'],
            "date" => strtotime($tweet['created_at']) ,
            "content" => $tweetWithLinks];
          array_push($tweetArray, $tempTweetArray);
        }
      }


      header ("Content-Type:text/xml");
      echo "<?xml version='1.0' encoding='UTF-8'?>
        <tweets>";

      // print tweets
      foreach($tweetArray as $tweet) {
        echo "
          <tweet>
            <username>".$tweet['username']."</username>
            <date>".$tweet['date']."</date>
            <content>".$tweet['content']."</content>
          </tweet>";

          // <div class='post-container " . $tweet['type'] . "'>
          //   <div class='post-info'>
          //     <div class='post-info-left'>
          //       <img class='user-profile-pic' src='img/user_icon.png' alt='User Profile Picture'>
          //       <div class='user-name'>
          //         @<a href='http://www.twitter.com/".$tweet['username']."'>".$tweet['username']."</a>
          //       </div>
          //     </div>
          //     <div class='post-info-right'>
          //       <div class='time-posted'>
          //           Posted " . date('M j, Y', $tweet['date']) . " at " . date('g:ia', $tweet['date']) . "
          //       </div>
          //     </div>
          //   </div>
          //   <div class='post-contents'>
          //     <b>" . $tweet['title'] . "</b>
          //     <p>" . $tweet['content'] . "</p>
          //   </div>
          // </div>
        // ";
      }
      echo "</tweets>";
    }
  }
}
?>