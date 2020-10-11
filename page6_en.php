<?php require_once('head.php');?>
<link rel="stylesheet" href="CSS/page_6_7.css" type="text/css">
     <audio id="Audio"><source src="sound/pop.WAV" type="audio/ogg"></audio>
        <audio autoplay  hidden="hidden" id="Sound">
  <source src="sound/applause.mp3" type="audio/mpeg">
</audio>
       <div class="sound"><input type="image"  id="img" src="images/sound.png" width="60px" height="60px"  onclick="gamesound('../game%20sound/applause.mp3')" ></div><br>
<h1>Congratulations</h1>
<a href="page2_en.php"> <button name="play again" value="play again"  onclick="playAudio()">play again </button></a>
<a href="index.php"><button name="menu" value="menu"  onclick="playAudio()">menu </button> </a>
 
  <?php require_once('footer.php');?>