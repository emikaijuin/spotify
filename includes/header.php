<?php
include "includes/config.php";
include "includes/classes/Artist.php";
include "includes/classes/Album.php";
include "includes/classes/Song.php";

if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
    header("Location: register.php");
}
?>

<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin:200,400,700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
  </head>
  <body>

    <script>
      var audioElement = new Audio();
      audioElement.setTrack("assets/music/bensound-acousticbreeze.mp3");
      audioElement.audio.play()
    </script>

    <div id="mainContainer">
      <div id="topContainer">
        <?php include "includes/navBarContainer.php"?>
        <div id="mainViewContainer">
          <div id="mainContent">