<?php require_once('head.php');?>

    <link rel="stylesheet" href="CSS/page_1.css" type="text/css">
    <audio id="Audio">
        <source src="sound/pop.WAV" type="audio/ogg">
    </audio>
	
    <audio id="Sound" repeated loop autoplay src="sound/start.mp3" type="audio/mpeg"> </audio>

    <div class="sound"><input type="image"  id="img" src="images/sound.png" width="60px" height="60px"  onclick="gamesound()" ></div><br>


    <h1>Hangman <img class ="logo" src="images/Capture.PNG" height=100px border-radius=50%></h1>

 <div class="form">
    
    <form>
	        <a href="action.php" ><button class="three" type="button" name ="Continue" value="Continue" onclick="playAudio()">Continue</button></a>
    <a href="page2_en.php"><button class="one" type="button" name ="New game" value="New game" onclick="playAudio()">New game</button></a>
   <a target="_blank" href="https://en.wikipedia.org/wiki/Hangman_(game)"> <button class="two"  type="button"  value="Help" onclick="playAudio()">Help</button></a>

    </form>
    </div>
<?php require_once('footer.php');?>