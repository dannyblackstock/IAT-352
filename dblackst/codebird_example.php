<?php
	// Require codebird
	require_once('includes/codebird-php/src/codebird.php');

	// Require authentication parameters
	$consumer_key = "IsWFCmLS8E2fPQ8EXMWmTw";
	$consumer_secret = "9PzcgDOZFaYDt4yNLEdLQNoZOzoSicfMFGDbnpidvQ";
	$access_token = "15258069-RCZ5iUXcT2LPqVQv9mp8Gr9Nu8hTtuzIQ5ww2jwZz";
	$access_token_secret = "bcRb6Nu7grKNqGn68A1uvXB6kTxBcdxJhj04qwidYYVdo";

	// Set connection parameters and instantiate Codebird
	\Codebird\Codebird::setConsumerKey($consumer_key, $consumer_secret);
	$cb = \Codebird\Codebird::getInstance();
	$cb->setToken($access_token, $access_token_secret);

	$reply = $cb->oauth2_token();
	$bearer_token = $reply->access_token;

	// App authentication
	\Codebird\Codebird::setBearerToken($bearer_token);

	// Create query
	$params = array(
		'screen_name' => 'The_Blackstock',
		'count' => 5
	);

	// Make the REST call
	$res = (array) $cb->statuses_userTimeline($params);
	// Convert results to an associative array
	$tweets = json_decode(json_encode($res), true);

	// Optionally, store results in a file
	file_put_contents("single_mu.json", json_encode($res));

	echo "<img src=\"".$tweets['0']['user']['profile_image_url']."\"/>"; //getting the profile image
	echo "Name: ".$tweets['0']['user']['name']."<br/>"; //getting the username
	echo "Web: ".$tweets['0']['user']['url']."<br/>"; //getting the web site address
	echo "Location: ".$tweets['0']['user']['location']."<br/>"; //user location
	echo "Updates: ".$tweets['0']['user']['statuses_count']."<br/>"; //number of updates
	echo "Follower: ".$tweets['0']['user']['followers_count']."<br/>"; //number of followers
	echo "Following: ".$tweets['0']['user']['friends_count']."<br/>"; // following
	echo "Description: ".$tweets['0']['user']['description']."<br/>"; //user description

	echo '<br/>';
	echo '<br/>';
	foreach ($tweets as $item){
		echo '<p>';
			echo $item['text'];
			echo '<br/>';
			echo $item['created_at'];
			echo '<br/>';
			if(!empty($item['entities']['media']['0']['media_url'])){
				echo "<img src=\"".$item['entities']['media']['0']['media_url']."\" width=\"200\" height=\"200\"/>"; //getting the profile image
			}
		echo '</p>';
		echo '<br/>';
	}
?>