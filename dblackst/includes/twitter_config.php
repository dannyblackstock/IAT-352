<?php
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
?>