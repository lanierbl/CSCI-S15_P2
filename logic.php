<?php
if($_POST)
{
    //check $_POST vars are set, exit if any missing
    if(!isset($_POST["numWords"]) || !isset($_POST["capFirstChar"]))
    {
        $output = json_encode(array('type'=>'error', 'text' => 'Input fields are empty!'));
        die($output);
    }

    $numWords       = $_POST["numWords"];
    $SpecChar       = $_POST["SpecChar"] == 1 ? true : false;
    $capFirstChar   = $_POST["capFirstChar"] == 1 ? true : false;
    $incNum         = $_POST["incNum"] == 1 ? true : false;

    // Initial password variable initialized
    $passwd = "";
    // Open external file containing list of works
    $file = new SplFileObject('wordlist.txt');
    // Set max word list of external file
    $maxFileWords = 58000;
    // String of random characters
    $randChars = '!@#$%^&*';
    // Loop count = requested password length
    for($i = 0; $i < $numWords; $i++) {
        // Determine random int to determine which word to retrieve
        $fileLine = rand(1,$maxFileWords);
        // Open external file and go to specified line
        $file->seek($fileLine-1);
        // Append special char if desired
        $passwd = $passwd.($SpecChar ? $randChars[rand(0, strlen($randChars)-1)] : '');
        // Append number if desired
        $passwd = $passwd.($incNum ? rand(0,9) : '');
        // Append word to existing passwd string
        $passwd = $passwd.trim($capFirstChar ? ucwords($file->current()) : $file->current());
        // If loop continuing, add a "-" between words
        if ($i < ($numWords - 1)) {
            $passwd = $passwd."-";
        };
    }
    $output = json_encode(array('type'=>'message', 'text'=>$passwd));
    die($output);

}

