<?php
 
	$api_key = 'M66KKQZ9';
 
	$url = 'http://isbndb.com/api/v2/xml/'.$api_key.'/book/084930315X';
	 
	//$url = 'http://isbndb.com/api/v2/xml/'.$api_key.'/books?q=science';

	$content = file_get_contents($url);
	file_put_contents("books.txt", $content);
 
	echo "Successfully loaded";
?>