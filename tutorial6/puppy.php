<?php
 
// standard Flickr format
// http://www.flickr.com/photos/tags/{tag}/
 
$api_key = 'dbf69d38608f495fc54387e9eaffd143';
$tag = 'puppy';
$perPage = 5;

$url = 'http://api.flickr.com/services/rest/?method=flickr.photos.search';
$url.= '&api_key='.$api_key;
$url.= '&tags='.$tag;
$url.= '&per_page='.$perPage;
 
$content = file_get_contents($url);
file_put_contents("flickr_output.txt", $content);

echo "call ended";
 
?>