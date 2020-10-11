<?php require_once('head.php');?>
    <link rel="stylesheet" href="CSS/page_2.css" type="text/css">
    <audio id="Audio">
        <source src="sound/pop.WAV" type="audio/ogg">
    </audio>
    <audio id="Sound" repeated loop autoplay src="sound/start.mp3" type="audio/mpeg"> </audio>

    <div class="sound"><input type="image"  id="img" src="images/sound.png" width="60px" height="60px"  onclick="gamesound()" ></div><br>


    <h1> Hangman <img class ="logo" src="images/Capture.PNG" height=100px border-radius=50%></h1>

     <form  action="" method="post" >
      <div class="div1"><label for="name">Name</label> <input  id="name" type="text" maxlength="15" name="username" placeholder="Type Your Name" size="100"  required pattern="[Aa-Zz]" > 
          </div>
         <h4>select category :</h4>
        
     <div class="category"> 
         <input id="Countries" type="radio" name="categories" required  value="Countries"  hidden="hidden" onclick="playAudio()">
     <label for="Countries" ><img src="images/ssssss.jpg" width="270" height="150" alt="Image 1" border-radius=50% ></label>
      <input id="Movies" type="radio" name="categories"  required  value="Movies"  hidden="hidden" onclick="playAudio()">
     <label for="Movies" ><img src="images/images_(2).jpg" width="270" height="150" alt="Image 1" ></label>
      <input id="Animals" type="radio" name="categories" required  value="Animals"  hidden="hidden" onclick="playAudio()">
     <label for="Animals" ><img src="images/download_(3).jpg" width="270" height="150" alt="Image 1" ></label>
       <input id="vegetables" type="radio" name="categories"  value="vegetables" required  hidden="hidden" onclick="playAudio()"> 
     <label for="vegetables" ><img src="images/czz.PNG" width="270" height="150" alt="Image 1" ></label>
    </div> 
       <div class="div3">
           <input  id="Easy"type="radio"  name= "level" value="Easy"  required><label class="level" for="Easy">Easy</label>
           <input  id="Medium" type="radio"  name= "level" value="Medium" required><label class="level" for="Medium">Medium</label>
           <input  id="Hard"  type="radio"  name= "level" value="Hard" required><label class="level" for="Hard">Hard</label>
     </div>
     <button  type="submit" name="Go" value="Go" onclick="playAudio()"> Go</button>
     
    
     </form>
<?php require_once('footer.php');?>