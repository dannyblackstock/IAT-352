<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>
<!-- example from http://birdegg.wordpress.com/2006/04/04/flickr-api-example/ -->
<style type="text/css">
	img{
		border: 0px;
	}

	div.float{	
		border: 1px solid #ccc;
		padding: 5px 5px 1px 5px;
		margin: 5px;
		float: left;

	}
	div.container {
		float: center;
		padding: 15px;
		border: 4px dashed #ccc;
		width: 592px;
	/*	background-color: #ffe; */
		margin: 25px 150px 25px 150px;
		background-color: #ffd;
	}
	div.spacer {
		clear: both;
	}

</style>
</head>
<body>
<div class="container">
<div class="spacer">

</div>
<?php
/*
Photos URLs:
http://static.flickr.com/{server-id}/{id}_{secret}.jpg
http://static.flickr.com/{server-id}/{id}_{secret}_[m|s|t|b].jpg
http://static.flickr.com/{server-id}/{id}_{secret}_o.(jpg|gif|png)

s small square 75x75 
t thumbnail, 100 on longest side 
m small, 240 on longest side 
- medium, 500 on longest side 
b large, 1024 on longest side (only exists for very large original images) 
o original image, either a jpg, gif or png, depending on source format 
*/

$user_id = "34864759@N05";
$api_key = "dbf69d38608f495fc54387e9eaffd143";
$link_option = 2; 	//link to the original pic
					//line_option = 2 -> link to the flickr page

function photo_url($p, $size='t', $ext='jpg'){  
  return "http://static.flickr.com/".$p['server']."/".$p['id']."_".$p['secret']."_$size.{$ext}";
}
function flickr_page_url($p, $uid){
	
	return "http://www.flickr.com/photos/".$uid."/".$p['id']."/";	
}

$url ="http://flickr.com/services/rest/?method=flickr.people.getPublicPhotos"."&user_id=".$user_id."&api_key=".$api_key;

$xml = simplexml_load_file($url) or die("Unable to contact Flickr");
// print_r($xml);
$perpage = $xml->photos['perpage'];
$total = $xml->photos['total'];
$pages = $xml->photos['pages'];
$page = $xml->photos['page'];

echo 'Number of pages: 	' . $pages;
echo '<br/>';
echo 'Total photos: 	' . $total;
echo '<br/>';

foreach($xml->photos->photo as $photo){	
	print "\n"."<div class=float>";
	if($link_option == 1){
		print "\n".	'<a href="'.photo_url($photo,'s').'" target="_blank">'."\n";
	}
	else{
		print "\n".	'<a href="'.flickr_page_url($photo, $user_id).'" target="_blank">'."\n";
	}
	print '<img src="'.photo_url($photo,'s'). '"'.' alt="'.$photo->title.'"/>'."</a>"."\n";

	print "</div>"."\n";
}


if($pages>=2){
	for($i=2; $i<=$pages; $i++){
		$url ="http://flickr.com/services/rest/?method=flickr.people.getPublicPhotos"."&user_id=".$user_id."&api_key=".$api_key."&page=".$i;
		$xml = @simplexml_load_file($url) or die("Unable to contact Flickr");
		
		// iterate through photos
		foreach($xml->photos->photo as $photo){	
			print "\n"."<div class=float>";
			if($link_option == 1){
				print "\n".	'<a href="'.photo_url($photo,'o').'" target="_blank">'."\n";
			}
			else{
				print "\n".	'<a href="'.flickr_page_url($photo, $user_id).'" target="_blank">'."\n";
			}
			print '<img src="'.photo_url($photo,'s'). '"'.' alt="'.$photo->title.'"/>'."</a>"."\n";
					
			print "</div>"."\n";
		}
	}
}
?>
<div class="spacer">
</div>
</div>
</body>