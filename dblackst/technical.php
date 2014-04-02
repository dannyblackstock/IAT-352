<?php
require_once ("includes/header.php");

// Main menu bar for all pages
require_once ("includes/main_menu_bar.php");

// connect to database
require_once ("includes/database_info.php");
?>
<div id="content-container">
  <h1 class="main-header">Technical Details</h1>
  <div class="container">
    <p>
      This site uses PHP and Apache for the back end, and MySQL for the database.
       It uses SSL encryption on pages where sensitive information is being transferred (eg. sign up and login pages)
       The responsive front-end was built with HTML5, SASS, and Javascript.
       It was developed using Git (<a href="https://github.com/dannyblackstock/IAT-352-Project" target="_blank">on Github</a>) and XAMPP for OSX.
    </p>
    <p>Libraries and plugins used:</p>
    <ul>
      <li><a href="http://jquery.com/" target="_blank">JQuery</a></li>
      <li><a href="http://dev7studios.com/dropit/" target="_blank">Dropit</a></li>
      <li><a href="http://momentjs.com/Moment.js" target="_blank">Moment.js</a></li>
      <li><a href="http://modernizr.com/" target="_blank">Modernizr</a></li>
      <li><a href="http://bourbon.io/" target="_blank">Bourbon</a></li>
      <li><a href="http://neat.bourbon.io/" target="_blank">Bourbon Neat</a></li>
      <li><a href="https://github.com/jublonet/codebird-php" target="_blank">Codebird PHP</a></li>
      <li><a href="https://github.com/mzsanford/twitter-text-php" target="_blank">Twitter Text PHP</a></li>
    </ul>
    <p>Anyone on the site can:</p>
    <ul>
      <li>browse for members via their names or high schools attended</li>
      <li>search through the database for members and posts</li>
      <li>see members' details and posts</li>
      <li>toggle showing tweets or posts on a user's page</li>
    </ul>
    <p>Member accounts are able to:</p>
    <ul>
      <li>register with the website, by providing their name, email, phone, high school they attended, high school graduation year, bio</li>
      <li>optionally provide their phone number, if they prefer to be contacted by phone, upload a profile photo, and enter Twitter and Flickr usernames
      <li>post short (text) blog-style messages about their experiences in SIAT</li>
      <li>display tweets from their Twitter account on their page (tweets are refreshed automatically with AJAX and a custom PHP generated XML response, then added to the user's page, every 7 seconds)</li>
      <li>display images from their Flickr account on their page</li>
    </ul>
    <p>Visitor accounts are able to:</p>
    <ul>
      <li>register with the website, by providing their name, email, and password</li>
      <li>select members to follow</li>
      <li>view activity from members they follow on the site through a "News Feed" page</li>
    </ul>
    <br>
    <img class="center-img" src="img/er_diagram.png">
    <p class="center-text">
      Early ER diagram for the database design
    </p>
    <br>
    <img class="center-img" src="img/database.png">
    <p class="center-text">
      Final database design
    </p>
  </div>
</div>
<?php
require_once ("includes/footer.php");
?>