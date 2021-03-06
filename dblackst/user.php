<?php
require_once ("includes/header.php");

// Main menu bar for all pages

require_once ("includes/main_menu_bar.php");

// connect to database

require_once ("includes/database_info.php");

// Require twitter authentication parameters to dsplay tweets

require_once ('includes/twitter_config.php');

// include flickr api key and functions
require_once ('includes/flickr_config.php');

// library for generating twitter links
require_once ('includes/twitter-text-php/Autolink.php');

?>

<div id="content-container">

<div id="mybox">
</div>

<?php

// if this is a proper user page URL

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

  // Perform database query

  $userID = mysql_escape_string($_GET['id']);
  $user_info_query = "SELECT * FROM members WHERE id=" . $userID . ";";
  $user_info_result = $db->query($user_info_query);

  // if the user's info exists

  if ($user_info_result) {
    if ($user_info_result->num_rows > 0) {

      // fetch associative array

      $user = $user_info_result->fetch_array(MYSQLI_ASSOC);

      // profile picture

      echo "<div id='user-info-box' class='container'>
            <div id='user-main-profile-picture' style='background-image:url(\"img/profile_pictures/";

      // defined in header.php
      echo get_user_picture($user['id']);

      echo "\");' >
            </div>
            <div id='user-info-content'>";

      // user's name

      echo "<h1 class='user-name'>" . $user['name'] . "</h1>";

      // Code for follow/unfollow button
      // user must login to a visitor account if they want to follow
      if (!isset($_SESSION['valid_member']) && !isset($_SESSION['valid_visitor'])) {
        echo "<p class='user-action-button-container'><a href='login_visitor_authenticate.php' class='button' id='follow-button'>Follow</a></p>";
      }

      // if they are a visitor
      else if (isset($_SESSION['valid_visitor']) && !isset($_SESSION['valid_member'])) {

        // check if the visitor is following this member already by querying the database
        $follower_id = mysql_escape_string($_SESSION['valid_visitor']);
        $following_query = "SELECT * FROM `followers_table` WHERE `follower_id` =  (SELECT `id` FROM `visitors` WHERE email=\"" . $follower_id . "\") AND `following_id` =  \"" . $userID . "\";";
        $following_result = $db->query($following_query);

        // if already following
        if ($following_result->num_rows > 0) {
          // visitor can unfollow
          echo "<p class='user-action-button-container'><a href='follow.php?unfollow=" . $userID . "' class='button' id='unfollow-button'>Unfollow</a></p>";
        }
        else {
          // if they're not following, they can follow
          echo "<p class='user-action-button-container'><a href='follow.php?follow=" . $userID . "' class='button'>Follow</a></p>";
        }
      }

      // Code for "Edit my account" button if they are a member
      else if (isset($_SESSION['valid_member']) && !isset($_SESSION['valid_visitor'])) {

        // check if this is the member's page
        $member_email = mysql_escape_string($_SESSION['valid_member']);
        $member_query = "SELECT `email` FROM `members` WHERE id=\"" . $userID . "\";";
        $member_result = $db->query($member_query);

        $query_email = mysqli_fetch_array($member_result) [0];

        // if it is the member's page
        if (($member_result->num_rows > 0) && ($query_email == $member_email)) {

          // they can edit their account
          echo "<p class='user-action-button-container'><a href='edit_user_info.php' class='button' id='edit-my-account-button'>Edit my account</a></p>";
        }
      }

      // email address
      echo "<div><a href='mailto:" . $user['email'] . "?Subject=SIAT' target='_top'>" . $user['email'] . "</a>";
      if (!empty($user['phone']) && $user['phone'] !== "NULL") {
        echo " | " . $user['phone'];
        if ($user['is_phone_preferred'] == "1") {
          echo "<div>" . $user['name'] . " prefers to be contacted by phone.</div>";
        }
      }
      echo "</div>";


      // create an unified array of tweets and posts
      $feedContent = [];
      // use vancouver time
      date_default_timezone_set('America/Vancouver');

      echo "<div>";

      // Twitter if they have entered their Twitter handle
      if (!empty($user['twitter_handle']) && $user['twitter_handle'] !== "NULL") {
        echo "Twitter: @<a href=\"http://www.twitter.com/"
        . $user['twitter_handle']
        . "\">"
        . $user['twitter_handle']
        . "</a>";

        // add js AJAX refresh tweets every 30 seconds
        $hasTwitter=True;

        // CODEBIRD GET TWEETS FOR USER
        // Create query get tweets
        $numTweets = 5;
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
          $tweetArray = ["username" => $tweet['user']['screen_name'],
            "date" => strtotime($tweet['created_at']) ,
            "title" => "",
            "content" => $tweetWithLinks,
            "type" => "tweet"];
          array_push($feedContent, $tweetArray);
        }
      }

      // flickr if the user has flickr
      if (!empty($user['flickr_handle']) && $user['flickr_handle'] !== "NULL") {
        $flickrUsername = $user['flickr_handle'];
        // get user id from screen name
        $flickr_user_id = get_flickr_user_id($flickrUsername, $flickr_api_key);

        // if the user id was retrieved
        if (!empty($flickr_user_id)){
          echo " | Flickr: <a href=\"http://www.flickr.com/photos/" . $flickr_user_id . "\">" . $flickrUsername . "</a>";
        }

        $photosPerPage = 10;

        $flickr_public_photos_url ="http://flickr.com/services/rest/?method=flickr.people.getPublicPhotos"
          ."&user_id=".$flickr_user_id
          ."&api_key=".$flickr_api_key
          ."&per_page=".$photosPerPage;

        $flickr_public_photos_xml = simplexml_load_file($flickr_public_photos_url) or die("Unable to contact Flickr");
      }

      echo "</div>"; // twitter | flickr

      // High school info
      echo "<p>Graduated from " . $user['high_school'] . " in " . $user['grad_year'] . ".</p>";

      // Current city
      echo "<p>Currently lives in " . $user['location'] . ".</p>";

      // Bio
      if (!empty($user['bio']) && $user['bio'] !== "NULL") {
        echo "<p>" . nl2br($user['bio']) . "</p>";
      }

      echo "</div></div>";

      // show some of user's flickr photos
      if ($flickr_public_photos_xml->photos->photo) {
        if ($flickr_public_photos_xml->photos->photo->Count() > 0) {
          echo "<div class='container' id='flickr-photos'>";

          foreach($flickr_public_photos_xml->photos->photo as $photo){
            echo "<div class='flickr_thumb'>";
            if($link_option == 1){
              print "\n". '<a href="'.photo_url($photo,'s').'" target="_blank">'."\n";
            }
            else{
              print "\n". '<a href="'.flickr_page_url($photo, $flickr_user_id).'" target="_blank">'."\n";
            }
            print '<img src="'.photo_url($photo,'s'). '"'.' alt="'.$photo->title.'"/>'."</a>"."\n";

            print "</div>"."\n";
          }

          echo "</div>";
        }
      }

      // user's posts
      $user_posts_query = "SELECT * FROM posts WHERE user_id=" . $userID . " ORDER BY date DESC;";
      $user_posts_result = $db->query($user_posts_query);
      echo "<div id='user-posts' class='container'>
            <div id='user-posts-header'>
            <div id='toggle-posts' class='active'>Posts</div>
            <div id='toggle-tweets' class='active'>Tweets</div>
            </div>";

      if ($user_posts_result) {

        // if this user has any posts
        if ($user_posts_result->num_rows > 0) {

          // loop through them all
          while ($post = $user_posts_result->fetch_assoc()) {

            // add posts to the array in standard format
            $postArray = ["username" => $user['name'],
              "date" => strtotime($post['date']),
              "title" => $post['title'],
              "content" => $post['content'], "type" => "post"];
            array_push($feedContent, $postArray);
          }
        }
      }

      // sort tweets + posts by timestamp
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
                echo get_user_picture($user['id']);
                echo "' alt='User Profile Picture'>
                <div class='user-name'>";
        if ($post['type'] == "tweet") {
          echo "@<a href='http://www.twitter.com/".$post['username']."'>".$post['username']."</a>";
        }
        else {
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
              <p>" . nl2br($post['content']) . "</p>
            </div>
          </div>
        ";
      }

      echo "</div>";
    }
    else {
      echo "<h1 class='main-header'>User not found!</h1>";
    }
  }
  else {
    echo "<h1 class='main-header'>Query failed!</h1>";
  }

  // close database connection
  $db->close();
}
else {
  echo "<h1 class='main-header'>User not found!</h1>";
}

?>
</div>

<?php
// add twitter auto referesh script if the user has twitter
if ($hasTwitter) {
  // moment.js for parsing timestamps easier
  echo "<script src=\"js/vendor/moment.min.js\"></script>";
  echo "<script src=\"js/refresh_tweets.js\"></script>";
}

require_once ("includes/footer.php");
?>