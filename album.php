<?php include "includes/header.php";
if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
} else {
    header("location: index.php");
}

$album = new Album($con, $albumId);
$artist = $album->getArtist();
?>

<div class="entityInfo">

  <div class="leftSection">
    <img src="<?php echo $album->getArtworkPath(); ?>" alt="">
  </div>

  <div class="rightSection">
    <h1><?php echo $album->getTitle(); ?></h1>
    <p>
      By <span class="artistLink"><?php echo $artist->getName(); ?></span>
    </p>
    <div>
      <span><?php echo $album->getYear(); ?></span>
      <span> &#9679; </span>
      <span><?php echo $album->getNumberOfSongs(); ?> songs, </span>
      <span><?php echo $album->getLength(); ?> </span>
    </div>
    <div class="albumControls">
      <button class="playAlbumButton">PLAY</button>
      <button class="saveAlbumButton">SAVE</button>
    </div>
  </div>

  <div class="trackListContainer">
    <ul class="trackList">
      <?php
$songIdArray = $album->getSongIds();
$i = 1;
foreach ($songIdArray as $songId) {
    $albumSong = new Song($con, $songId);
    $songArtist = $albumSong->getArtist();
    echo "<li class='tracklistRow'>
            <div class='trackCount'>
              <img class='play' src='assets/images/icons/play-white.png'>
              <span class='trackNumber'>$i.</span>
            </div>
            <div class='trackInfo'>
              <span class='trackName'>" . $albumSong->getTitle() . "</span>
              <span class='artistName'>" . $songArtist->getName() . "</span>
            </div>
            <div class='trackOptions'>
              <img class='optionsButton' src='assets/images/icons/more.png'>
            </div>
            <div class='trackDuration'>
              <span class='duration'>" . $albumSong->getDuration() . "</span>
            </div>
          </li>";

    $i++;

}
?>
    </ul>
  </div>

</div>



<?php include "includes/footer.php";
