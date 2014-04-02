<?php
require_once ("includes/header.php");

// Main menu bar for all pages
require_once ("includes/main_menu_bar.php");

// connect to database
require_once ("includes/database_info.php");
?>
<div id="content-container">
  <h1 class="main-header">About this site</h1>
  <div class="container">
    <p>
      This website is meant to be used to provide better information about the SIAT program at SFU to visitors, especially prospective students.
       It aims to do this by connecting current SIAT students and alumni with high school and other prospective students.
    </p>
    <p>
      Prospective high school students may appreciate seeing someone from their high school doing well,
      so this website enables prospective high school students find, "follow,” and (optionally) contact
      current SIAT students and alumni (members) from their school. Posts from members appear in the visitor's "News Feed."
    </p>
    <p>
      Alumni and current students in SIAT can post updates on their work or lives, add their contact information, and can also display their Flickr and Twitter updates.
    </p>
  </div>
</div>
<?php
require_once ("includes/footer.php");
?>