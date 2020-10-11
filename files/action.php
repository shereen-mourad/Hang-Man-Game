<!DOCTYBE html>
  
<?php
      include 'class.php';
//session_start();
//$_SESSION['guess']="";
	  
//class hangman
//{
//    public function get_ran_word($filename)
//    {
//
//        $lines = array();
//        $fp = fopen($filename, 'r');
//        while (!feof($fp)) {
//            $line = fgets($fp);
//
////process line however you like
//            $line = trim($line);
////https://www.w3schools.com/php/func_string_trim.asp
//
////add to array
//            $lines[] = $line;
//
//        }
//
//        $key = array_rand($lines);
//
//        fclose($fp);
//        return $lines[$key];
//
//
//    }
//
//    public function read_file($filename)
//    {
//        $lines = array();
//        $fp = fopen($filename, 'r');
//        while (!feof($fp)) {
//            $line = fgets($fp);
//
////process line however you like
//            $line = trim($line);
////https://www.w3schools.com/php/func_string_trim.asp
//
////add to array
//            $lines[] = $line;
//
//        }
//        return $lines;
//    }
//
//    public function enter_user($username)
//    {
//        $userfile = 'users.txt';
//// Open the file to get existing content
//        $current = file_get_contents($userfile);
//// Append a new person to the file
//        $current .= $username;
//// Write the contents back to the file
//        file_put_contents($userfile, $current);
//
//    }
//
//    public function delete_user()
//    {
//        $myfile = "users.txt";
//        $fh = fopen($myfile, 'w') or die ("can't open file");
//        $stringdata = "";
//        fwrite($fh, $stringdata);
//        fclose($fh);
//
//    }
//
//    public function dashes($word)
//    {
//
//        $len = strlen($word);
//        for ($i = 0; $i < $len; $i++)
//            $guesstemplate = str_repeat("-", $len);
//        return $guesstemplate;
//
//    }
//
//    public function check_letter($word, $char, &$b, &$gess)
//    {
//        $ans = false;
//        $len = strlen($word);
//        $word = str_split($word);
//        if (!isset($_SESSION['guess'])) {
//            $_SESSION['guess'] = $gess;
//        }
//
//        for ($i = 0; $i < $len; $i++) {
//            if ($word[$i] == $char) {
//                $gess[$i] = $char;
//                $_SESSION['guess'][$i] = $char;
//// echo $str[$i];
//                $ans = true;
//            }
//        }
////  =$str ;
//        if ($ans == false) {
//            $b = false;
//        }
//        return $_SESSION['guess'];
//    }
//
//    public function hint($word, &$gess)
//    {
//        $len = strlen($word);
//
//        $word = str_split($word);
//
//        if (!isset($_SESSION['guess'])) {
//            $_SESSION['guess'] = $gess;
//        }
//
//        for ($i = 0; $i < $len; $i++) {
//            if ($_SESSION['guess'][$i] == "-") {
//                $var = $word[$i];
//                for ($j = $i; $j < $len; $j++) {
//                    if ($word[$j] == $var) {
//                        $gess[$i] = $var;
//                        $_SESSION['guess'][$j] = $var;
//
//                    }
//                }
//                break;
//            }
//        }
//    }
//
//    public function check_wrong($char)
//    {
//		if(!isset($_SESSION['wrong_letters']))
//			$_SESSION['wrong_letters']=[];
//        if(!in_array($char , $_SESSION['wrong_letters']))
//            $_SESSION['wrong_letters'][] = $char;
//
//        //print_r($_SESSION['wrong_letters']);
//    }
//    public function count_wrong()
//    {
//		if(!isset($_SESSION['wrong_letters']))
//			$_SESSION['wrong_letters']=[];
//        return count($_SESSION['wrong_letters']);
//    }
//
//    public function draw_img($count)
//    {
//        if(!isset($count))
//            $count=0;
//        $imagearray=["hang_photos/hangman_0.gif","hang_photos/hangman_1.gif","hang_photos/hangman_2.gif","hang_photos/hangman_3.gif","hang_photos/hangman_4.gif","hang_photos/hangman_5.gif","hang_photos/hangman_6.gif","hang_photos/hangman_7.gif","hang_photos/hangman_8.gif","hang_photos/hangman_9.gif"];
//        return $imagearray[$count];
//    }
//}
?>



<html>

        <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">

        <input type="text" name="letter">
    <!--	  <input type="submit" name="hint" value="Hint">-->
         <input type="submit" name="submit">
         </form>

        <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
         <input type="submit" name="hint" value="Hint">
		 <input  type="submit" name="reset" value="reset"> 
       </form>
       <form method="post" action="Untitled-2.php" >
            <input type="submit" name="pause" value="Pause">
            
       </form> 

		<?php

$obj= new hangman();

$filename="words.txt";

if(!isset($_SESSION['word'])) {
    $_SESSION['word'] = $obj->get_ran_word($filename);
//$_SESSION['word']=$word;
}

$word = $_SESSION['word'];

// $word="mohammed";
$len =  strlen($word);

$gess= $obj->dashes($word) ;
$gess= str_split($gess);
$b=true;
$lost =0;
echo $word;
echo "</br>";
$image = "hang_photos/hangman_0.gif";
	  
	  
	  
if(isset($_POST["submit"])) {
    $char = $_POST["letter"];
    $obj->check_letter($word, $char, $b, $gess);
//print_r ($guss);
    if ($b == false) {
        echo "wrong";
        $obj->check_wrong($char);
        echo "<br>";
        echo implode(' ', $_SESSION['guess']);
    } 
	else {
        for ($i = 0; $i < $len; $i++) {
            if ($i == $len - 1) {
//var_dump($_SESSION['guess']); //implode(' ',$_SESSION['guess']);
                echo implode(' ', $_SESSION['guess']);
            }
        }
    }
	$count_wrong = $obj->count_wrong();
	
    $image = $obj->draw_img($count_wrong);
	if($count_wrong==9)
	{
		$lost = 1;
		$_SESSION = [];
	}
}
else if(isset($_POST["hint"])) 
{
//echo "hello";
/*if(isset($_SESSION['hint_flag']))
{
if($_SESSION['hint_flag']==1){
	//echo "You are already used your hint!!";
	//echo "<script>alert('You are already used your hint!!')</script>";
}
}
	else*/
	
		//$_SESSION['hint_flag']=1;
	
    $obj->hint($word, $gess);
		$count_wrong = $obj->count_wrong();
	
    $image = $obj->draw_img($count_wrong);
    echo implode(' ', $_SESSION['guess']);
	
}
	else if(isset($_POST["reset"])) {
		
        //unset($_SESSION);
		$_SESSION = [];
		 header('Location: '.$_SERVER['REQUEST_URI']);
		
}
/*else {
//Delete All Guesses Save In Session
     $_SESSION = [];
}*/
?>

    <div class="hang"><img src="<?php echo $image;?>" id="mainimage" width= 350 height=350></div>
	<?php if($lost==1) echo 'You lost';?>
		
    </html>