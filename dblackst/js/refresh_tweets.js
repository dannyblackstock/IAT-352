setInterval(function() {

  var data = {
    // user id from URL
    id : window.location.search.replace( "?id=", "" ),
    // most recent tweet time
    time_posted : $(".post-container.tweet .time-posted").first().html().replace("Posted ", "")
  };

  var request = $.ajax({
      url: "get_tweets.php",
      data: data,
      type: "GET",
      dataType: "xml"
  });

  request.done(function(xml) {
    // add slashes because JS needs them for multiline strings
      $(xml).find('tweet').each(function(){
        $("#user-posts-header").after(
          "<div class=\"post-container tweet\">\
            <div class=\"post-info\">\
              <div class=\"post-info-left\">\
                <img class=\"user-profile-pic\" src=\"img/user_icon.png\" alt=\"User Profile Picture\">\
                <div class=\"user-name\">\
                  @<a href=\"http://www.twitter.com/"+$(this).find("username").html()+"\">"+$(this).find("username").html()+"</a>\
                </div>\
              </div>\
              <div class=\"post-info-right\">\
                <div class=\"time-posted\">\
                    Posted " + $(this).find("date").html() + "\
                </div>\
              </div>\
            </div>\
            <div class=\"post-contents\">\
              <b></b>\
              <p>" + $(this).find("content").html() + "</p>\
            </div>\
          </div>"
          );
      });
  });

  request.fail(function(jqXHR, textStatus) {
      alert( "Request failed: " + textStatus );
  });

}, 5000);