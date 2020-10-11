<?php require('head.php');
include 'classes/class.php';

?>

<?php

$obj= new hangman();
$level=$_SESSION['level'];
$category=$_SESSION['category'];

if(!isset($_SESSION['word'])) {
    $_SESSION['word'] = $obj->user_word ($level,$category);
}
$word = $_SESSION['word'];
//echo ($word);
$len =  strlen($word);

$gess= $obj->dashes($word);
$gess= str_split($gess);
if(!isset($_SESSION['guess']))
	$_SESSION['guess'] = $gess;

$dashes_game = implode('  ', $_SESSION['guess']);
$b=true;
$lost =0;$won=0;
$image = "images/hangman_0.gif";
//pause

$count_wrong = $obj->count_wrong();

$image = $obj->draw_img($count_wrong);
    


if(isset($_POST["submit"])) {
    $char = strtolower($_POST["letter"]);
    $obj->check_letter($word, $char, $b, $gess);
    if ($b == false) {
        $obj->check_wrong($char);
        $dashes_game = implode('  ', $_SESSION['guess']);
    }
    else {
        for ($i = 0; $i < $len; $i++) {
            if ($i == $len - 1) {
//echo implode($_SESSION['guess']); //implode(' ',$_SESSION['guess']);
                $dashes_game = implode('  ', $_SESSION['guess']);
            }
        }
    }
    $count_wrong = $obj->count_wrong();

    $image = $obj->draw_img($count_wrong);
    if($count_wrong==9)
    {
        $lost = 1;
		header('location: page7_en.php');
    }
	$won = $obj->check_won();
}
else if(isset($_POST["hint"]))
{
	if($_SESSION['hint_flag']!=1){
		$_SESSION['hint_flag'] = $obj->hint($word, $gess);
	}
    $count_wrong = $obj->count_wrong();

    $image = $obj->draw_img($count_wrong);
    $dashes_game = implode(' ', $_SESSION['guess']);
	
	$won = $obj->check_won();
}
else if(isset($_POST["reset"])) {

    //unset($_SESSION);
    $username = $_SESSION['username'];
    $category = $_SESSION['category'];
    $level = $_SESSION['level'];
    $_SESSION = [];
	
	$_SESSION['username'] = $username;
    $_SESSION['category'] = $category;
    $_SESSION['level'] = $level;
    $_SESSION['hint_flag'] = 0;
	
    header('Location: '.$_SERVER['REQUEST_URI']);

}
if($won==1)
	header('location: page6_en.php');

?>

<?php require_once('the_form.php');?>
 

<?php require_once('footer.php');?>