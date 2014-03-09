<?php

$flickr_api_key = "dcdcde0689a91c08675cce3fc4135ca8";
$link_option = 2;   //link to the original pic
//line_option = 2 -> link to the flickr page

function photo_url($p, $size='t', $ext='jpg'){
  return "http://static.flickr.com/".$p['server']."/".$p['id']."_".$p['secret']."_$size.{$ext}";
}

function flickr_page_url($p, $uid){
  return "http://www.flickr.com/photos/".$uid."/".$p['id']."/";
}

function get_user_id($screenName, $flickr_api_key) {
    // get user id from screen name
  $user_id_url ="http://flickr.com/services/rest/?method=flickr.people.findByUsername"."&username=".$screenName."&api_key=".$flickr_api_key;
  $user_id_xml = simplexml_load_file($user_id_url) or die("Unable to contact Flickr");

  // if the user id can be retreived
  if ($user_id_xml->user->Count() > 0) {
    $user_id = $user_id_xml->user->attributes()->nsid;
    return $user_id;
  } else {
    return NULL;
  }
}
?>