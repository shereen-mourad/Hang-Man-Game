<?php
class hangman{
	
	public function user_word ($level,$category)
	{
		
		$file_name = './files/'.$category.$level.'.txt';
		$array_words= $this->read_file($file_name);
	
		return $this->get_ran_word($array_words);
		
	}
	
	
	
	
	
	public function get_ran_word($array_words){
		
		$the_word=$array_words[array_rand($array_words)];
		/*if($the_word == '' || empty($the_word))
		{
			$the_word=$array_words[array_rand($array_words)];
			
		}*/
		$the_word=strtolower(trim($the_word));
		
		return $the_word;
		
		
	}

		
    public function read_file($filename)
    {
        $lines = array();
        $fp = fopen($filename, 'r');
        while (!feof($fp)) {
            $line = fgets($fp);

//process line however you like
            $line = trim($line);

//add to array
            $lines[] = $line;

        }
        return $lines;
    }

   /* public function enter_user($username)
    {
        $userfile = 'users.txt';
// Open the file to get existing content
        $current = file_get_contents($userfile);
// Append a new person to the file
        $current .= $username;
// Write the contents back to the file
        file_put_contents($userfile, $current);

    }*/

  /*  public function delete_user()
    {
        $myfile = "users.txt";
        $fh = fopen($myfile, 'w') or die ("can't open file");
        $stringdata = "";
        fwrite($fh, $stringdata);
        fclose($fh);

    }*/

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
            if ($word[$i] == $char)
				{
                $gess[$i] = $char;
                $_SESSION['guess'][$i] = $char;
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
                return 1;
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
        $imagearray=["images/hangman_0.gif","images/hangman_1.gif","images/hangman_2.gif",
		"images/hangman_3.gif","images/hangman_4.gif","images/hangman_5.gif","images/hangman_6.gif",
		"images/hangman_7.gif","images/hangman_8.gif","images/hangman_9.gif"];
        return $imagearray[$count];
    }
	
	public function check_won()
	{
		if(implode($_SESSION['guess']) == $_SESSION['word'] )
		{
			return 1;
		}
		return 0;
	}
}