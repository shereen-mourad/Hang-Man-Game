<?php require_once('head.php');?>
<link rel="stylesheet" href="CSS/page_5.css" type="text/css">
     <audio id="Audio">

  <source src="sound/pop.WAV" type="audio/ogg">
</audio>
     <audio id="Sound" repeated loop autoplay src="sound/start.mp3" type="audio/mpeg"> </audio>
 
<div class="sound"><input type="image"  id="img" src="images/sound.png" width="60px" height="60px"  onclick="gamesound('sound/Track.mp3')" ></div><br>


       <form>
       <a href="action.php">
	   <button class="one"  type="button"  value="Resume" onclick="playAudio()" >Resume</button></a>
           
    <a href="page2_en.php"><button class="two" type="button" name ="New game" value="New game" onclick="playAudio()">New game</button></a>
            <a href="index.php"><button class="three" type="button" name ="menu" value="menu" onclick="playAudio()" >menu</button></a>
     </form>
   <?php require_once('footer.php');?>