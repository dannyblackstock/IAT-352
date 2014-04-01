<?php
require_once ("includes/header.php");

// Main menu bar for all pages
require_once ("includes/main_menu_bar.php");

// connect to database
require_once ("includes/database_info.php");
?>
<div id="content-container">
<?php
if(isset($_GET['search_query'])) {
    // search through members and posts
    if (strlen($_GET['search_query']) > 3) {
      $search_query =
      "SELECT name AS title, id, 'member' AS type
      FROM members
      WHERE bio LIKE '%".$_GET['search_query']."%' OR
      email LIKE '%".$_GET['search_query']."%' OR
      flickr_handle LIKE '%".$_GET['search_query']."%' OR
      grad_year LIKE '%".$_GET['search_query']."%' OR
      high_school LIKE '%".$_GET['search_query']."%' OR
      location LIKE '%".$_GET['search_query']."%' OR
      name LIKE '%".$_GET['search_query']."%' OR
      phone LIKE '%".$_GET['search_query']."%' OR
      twitter_handle LIKE '%".$_GET['search_query']."%'

      UNION ALL

      SELECT title, user_id AS id, 'post' AS type
      FROM posts
      WHERE title LIKE '%".$_GET['search_query']."%' OR
      content LIKE '%".$_GET['search_query']."%'";

      $search_query_result = $db->query($search_query);

      // if there are any results
      if ($search_query_result->num_rows > 0) {

        echo "<div class=\"container\">
                <h1>Search results containing \"".$_GET['search_query']."\"</h1><ul>";

        while ($result = $search_query_result->fetch_assoc()) {
          echo "
                  <li><b>". ucfirst($result["type"]). "</b> – <a href=\"user.php?id=".$result["id"]."\">"
                  . $result["title"]. "</a></li>";
        }

        echo "</ul>";
      }
      else {
      echo "<div class=\"container\">
            <p>
            No search results were found for \"".$_GET['search_query']."\"!
            <p>";
      }
    }
    else {
      echo "<div class=\"container\">
            <p>
            Please try your search again, with more than 3 characters.
            <p>";
    }
}
else {
  echo "<div class=\"container\">
      <p>
      Please try your search again, by typing in the search bar above.
      <p>";
}

?>
</div>
</div>
<?php
require_once ("includes/footer.php");
?>