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
    // to compare dates with pulled tweets, get the most recent tweet's time posted
    var lastTweetDate = $(".post-container.tweet .time-posted").first().html().replace("Posted ", "").replace("at", "").trim();

    // normalize to unix timestamp of most recent displayed tweet
    var lastTweetTimestamp = Math.round((moment(lastTweetDate, "MMM D, YYYY  h:ma").unix())/1000); // divide by 100 to ignore seconds in unix timestamp

      $(xml).find('tweet').each(function() {

        var tweetTimestamp = Math.round(($(this).find("date").html())/1000); // divide by 100 to ignore seconds in unix timestamp

        console.log("newest tweet: \n" + tweetTimestamp);
        console.log("last tweet: \n" + lastTweetTimestamp);

        // compare the pulled tweet to the most recent tweet dispalyed on the page
        if (tweetTimestamp > lastTweetTimestamp) {
          console.log("$(this).find(\"date\").html(): " + $(this).find("date").html());

          // created nicely formatted date
          var tweetDate = moment.unix($(this).find("date").html())
            .format("MMM D, YYYY");
          var tweetTime = moment.unix($(this).find("date").html())
            .format("h:ma");
          var tweetPostedDateFormatted = tweetDate + " at " + tweetTime;

          // add back slashes because JS needs them for multiline strings
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
                      Posted " + tweetPostedDateFormatted + "\
                  </div>\
                </div>\
              </div>\
              <div class=\"post-contents\">\
                <b></b>\
                <p>" + $(this).find("content").html() + "</p>\
              </div>\
            </div>"
          );
        }
    });
  });

  request.fail(function(jqXHR, textStatus) {
      alert( "Request failed: " + textStatus );
  });

}, 30000);// get new tweets every 30 seconds