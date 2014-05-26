<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SFU SIAT Outreach</title>
    <meta name="description" content="The School of Interactive Art and Technology's website for connecting past, present, and future  students.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Danny Blackstock">

    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- CSS -->
    <link rel="stylesheet" href="styles/main.css" type="text/css" />
    <link rel="stylesheet" href="styles/dropit.css" type="text/css" />
</head>
<body>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

<?php
// function to return the user's profile picture if it exists
function get_user_picture($userID) {
    // if the user has a profile picture, use it
    if (file_exists("img/profile_pictures/".$userID.".jpg")) {
        return $userID.".jpg";
    }
    elseif (file_exists("img/profile_pictures/".$userID.".jpeg")) {
        return $userID.".jpeg";
    }
    elseif (file_exists("img/profile_pictures/".$userID.".png")) {
        return $userID.".png";
    }
    elseif (file_exists("img/profile_pictures/".$userID.".gif")) {
        return $userID.".gif";
    }
    // otherwise show the default
    else {
        return "user_icon.jpg";
    }
}
?>