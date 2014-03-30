<?php
// custom substr_replace function to support multibyte strings from Twitter
// from http://stackoverflow.com/questions/20515282/substr-replace-function-returns-weird-symbols-along-with-the-string
if (function_exists('mb_substr_replace') === false)
 {
     function mb_substr_replace($string, $replacement, $start, $length = null, $encoding = null)
     {
         if (extension_loaded('mbstring') === true)
         {
             $string_length = (is_null($encoding) === true) ? mb_strlen($string) : mb_strlen($string, $encoding);

             if ($start < 0)
             {
                 $start = max(0, $string_length + $start);
             }

             else if ($start > $string_length)
             {
                 $start = $string_length;
             }

             if ($length < 0)
             {
                 $length = max(0, $string_length - $start + $length);
             }

             else if ((is_null($length) === true) || ($length > $string_length))
             {
                 $length = $string_length;
             }

             if (($start + $length) > $string_length)
             {
                 $length = $string_length - $start;
             }

             if (is_null($encoding) === true)
             {
                 return mb_substr($string, 0, $start) . $replacement . mb_substr($string, $start + $length, $string_length - $start - $length);
             }

             return mb_substr($string, 0, $start, $encoding) . $replacement . mb_substr($string, $start + $length, $string_length - $start - $length, $encoding);
         }

         return (is_null($length) === true) ? substr_replace($string, $replacement, $start) : substr_replace($string, $replacement, $start, $length);
     }
 }
function twitterify($ret) {
  $ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2", $ret);
  $ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2", $ret);
  $ret = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $ret);
  $ret = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $ret);
return $ret;
}
?>