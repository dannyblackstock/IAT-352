<?php

$api_key = 'bad522f6cd3050b69e3476f4700ab2f7';
$tag = 'puppy';
$perPage = 5;

$url = "http://api.flickr.com/services/feeds/photos_public.gne?id=34864759@N05&lang=en-us&format=rss_200";
$xmlFileData = file_get_contents($url);

file_put_contents("flickr_output.xml", $xmlFileData);

//$xmlFileData = file_get_contents($url);
$xmlData = new SimpleXMLElement($xmlFileData);
//Uncomment the lines below to see the human readable version of SimpleXML object
 echo"<pre>";
 print_r($xmlData);
 echo"</pre>";



foreach($xmlData->channel->item as $item) { 

	// Define variables
	$title = $item->title;
	$link = $item->link;
	$description = $item->description;

	// Build and output photos
	$content = "<h2>" . $title . "</h2>";
	$content .= "<a href=\"" . $link . "\" target=\"_blank\">View on Flickr</a><br />";
	$content .= $description . "<br />";
	echo $content ;
} 