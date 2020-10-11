<!DOCTYBE html>
  <html>
      
     <form method="post" action="action.php" >
            <input type="submit" name="con" value="Continue">
        
       </form> 
      
      
      <form method="post" action="" >
    
         <input type="submit" name="new" value="New Game">
       </form> 
      
    
      
      
      
      
    <?php
      session_start();

      
     
      
      if (isset($_POST['new']))
      {  
          
          
        session_destroy(); 
        header('Location:action.php'); 
          
          
      }
      
      
      
      
      
      ?>
      
      
       </html>