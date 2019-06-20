$(document).ready(function() {
  const playButton = $(".controlButton.play img");
  playButton.mouseenter(function(event) {
    event.target.src = "assets/images/icons/play-active-white.png";
    playButton.css("transform", "scale(1.1)");
  });

  playButton.mouseleave(function(event) {
    event.target.src = "assets/images/icons/play.png";
    playButton.css("transform", "scale(1)");
  });
});

function Audio() {
  this.audio = document.createElement("audio");
  this.currentlyPlaying;

  this.setTrack = function(src) {
    this.audio.src = src;
  };
}
