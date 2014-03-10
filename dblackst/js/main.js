$(document).ready(function() {
    $('#user-dropdown').dropit();
});

// show/hide posts or tweets
$("#toggle-posts").click(function() {
  $(this).toggleClass("active");
  $(".post-container.post").slideToggle("fast");
});
$("#toggle-tweets").click(function() {
  $(this).toggleClass("active");
  $(".post-container.tweet").slideToggle("fast");
});