<?php
require_once("phpFlickr/phpFlickr.php");

// include path to phpFlickr
$f = new phpFlickr("dbf69d38608f495fc54387e9eaffd143");
 
// you will get this number when you go to your photoset home page on flickr you will find this number in the web address
// here is an example http://www.flickr.com/photos/33174510@N00/sets/72157625958411834/
$photoset_id = '72157625958411834'; 
 
$photos = $f->photosets_getPhotos($photoset_id);

foreach ($photos['photoset']['photo'] as $photo) {

     // notice the rel attribute added to the href tag.  All we do is add that and presto our Slimbox2 will automatically for for that link and because it is setup in loop now every photo will have it. Boy that was easy
     echo '<a href="'.$f->buildPhotoURL($photo, 'medium').'" title="'.$photo['title'].'" rel="lightbox" >'; 
     echo '<img border="0" alt="'.$photo['title'].'" src="'.$f->buildPhotoURL($photo, "Square").' ">';
     echo '</a>';
}

?>