<?php
session_start();
class hangman{
public function get_ran_word($filename)
    {

        $lines = array();
        $fp = fopen($filename, 'r');
        while (!feof($fp)) {
            $line = fgets($fp);

//process line however you like
            $line = trim($line);
//https://www.w3schools.com/php/func_string_trim.asp

//add to array
            $lines[] = $line;

        }

        $key = array_rand($lines);

        fclose($fp);
        return $lines[$key];


    }

    public function read_file($filename)
    {
        $lines = array();
        $fp = fopen($filename, 'r');
        while (!feof($fp)) {
            $line = fgets($fp);

//process line however you like
            $line = trim($line);
//https://www.w3schools.com/php/func_string_trim.asp

//add to array
            $lines[] = $line;

        }
        return $lines;
    }

    public function enter_user($username)
    {
        $userfile = 'users.txt';
// Open the file to get existing content
        $current = file_get_contents($userfile);
// Append a new person to the file
        $current .= $username;
// Write the contents back to the file
        file_put_contents($userfile, $current);

    }

    public function delete_user()
    {
        $myfile = "users.txt";
        $fh = fopen($myfile, 'w') or die ("can't open file");
        $stringdata = "";
        fwrite($fh, $stringdata);
        fclose($fh);

    }

    public function dashes($word)
    {

        $len = strlen($word);
        for ($i = 0; $i < $len; $i++)
            $guesstemplate = str_repeat("-", $len);
        return $guesstemplate;

    }

    public function check_letter($word, $char, &$b, &$gess)
    {
        $ans = false;
        $len = strlen($word);
        $word = str_split($word);
        if (!isset($_SESSION['guess'])) {
            $_SESSION['guess'] = $gess;
        }

        for ($i = 0; $i < $len; $i++) {
            if ($word[$i] == $char) {
                $gess[$i] = $char;
                $_SESSION['guess'][$i] = $char;
// echo $str[$i];
                $ans = true;
            }
        }
//  =$str ;
        if ($ans == false) {
            $b = false;
        }
        return $_SESSION['guess'];
    }

    public function hint($word, &$gess)
    {
        $len = strlen($word);

        $word = str_split($word);

        if (!isset($_SESSION['guess'])) {
            $_SESSION['guess'] = $gess;
        }

        for ($i = 0; $i < $len; $i++) {
            if ($_SESSION['guess'][$i] == "-") {
                $var = $word[$i];
                for ($j = $i; $j < $len; $j++) {
                    if ($word[$j] == $var) {
                        $gess[$i] = $var;
                        $_SESSION['guess'][$j] = $var;

                    }
                }
                break;
            }
        }
    }

    public function check_wrong($char)
    {
		if(!isset($_SESSION['wrong_letters']))
			$_SESSION['wrong_letters']=[];
        if(!in_array($char , $_SESSION['wrong_letters']))
            $_SESSION['wrong_letters'][] = $char;

        //print_r($_SESSION['wrong_letters']);
    }
    public function count_wrong()
    {
		if(!isset($_SESSION['wrong_letters']))
			$_SESSION['wrong_letters']=[];
        return count($_SESSION['wrong_letters']);
    }

    public function draw_img($count)
    {
        if(!isset($count))
            $count=0;
        $imagearray=["hang_photos/hangman_0.gif","hang_photos/hangman_1.gif","hang_photos/hangman_2.gif","hang_photos/hangman_3.gif","hang_photos/hangman_4.gif","hang_photos/hangman_5.gif","hang_photos/hangman_6.gif","hang_photos/hangman_7.gif","hang_photos/hangman_8.gif","hang_photos/hangman_9.gif"];
        return $imagearray[$count];
    }
}