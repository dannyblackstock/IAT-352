<?php
 
	$api_key = 'M66KKQZ9';
 
	$url = 'http://isbndb.com/api/v2/json/'.$api_key.'/authors?q=richards';

	$content = file_get_contents($url);
	file_put_contents("author.txt", $content);
 
	echo "Successfully loaded";
?>