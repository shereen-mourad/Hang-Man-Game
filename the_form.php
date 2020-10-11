
<link rel="stylesheet" href="CSS/game.css" type="text/css">
<h1 style="color:#ccc">Welcome: <?php echo $_SESSION['username']?></h1>

  <audio id="Sound" repeated loop autoplay src="sound/Track.mp3" type="audio/mpeg"></audio>

<a href="page5_en.php"><div class="pause" ><input type="image" src="images/pause.png" width="80px" height="70px" onclick="playAudio()"></div></a>
	
<div class="sound"><input type="image"  id="img" src="images/sound.png" width="60px" height="60px"  onclick="gamesound()" ></div><br>


    <div class="hang"><img src="<?php echo $image;?>" id="mainimage" width= 350 height=330></div>
<?php if($lost==1) echo 'You lost';?>

<div class="my-word"><?php echo $dashes_game;?></div>
 
 <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
	<input type="submit" id="reset" value="reset" name="reset" >
	</form>
 
 <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
        <input type="text" maxlength="1"  placeholder="type letter" required  onkeyup="check_char(this.value)";  name="letter" id="letter">

        <input type="submit" name="submit" value="submit" onclick="playAudio()" >
    </form >
	
	
    <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
        <input type="submit" value="Hint" onclick="playAudio()" name="hint" <?php if($_SESSION['hint_flag']==1){echo 'disabled';}?>>
    </form >
	
	
<script>
				  
function check_char(val)
{
	var regex = /^[a-zA-Z]*$/;
	if (regex.test(val)) {
		return true;
	}
	else 
	{
		alert('letter only');
		document.getElementById('letter').value = '';
		return false;
	}		
}</script>
