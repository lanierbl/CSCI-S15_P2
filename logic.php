<?php
if($_POST)
{
    //check $_POST vars are set, exit if any missing
    if(!isset($_POST["numWords"]) || !isset($_POST["capFirstChar"]) || !isset($_POST["caseOpt"]))
    {
        $output = json_encode(array('type'=>'error', 'text' => 'Input fields are empty!'));
        die($output);
    }

    $numWords       = $_POST["numWords"];
    $SpecChar       = $_POST["SpecChar"] == 1 ? true : false;
    $capFirstChar   = $_POST["capFirstChar"] == 1 ? true : false;
    $caseOpt        = $_POST["caseOpt"];
    $incNum         = $_POST["incNum"] == 1 ? true : false;
    $maxLength      = $_POST["maxLength"];

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
        if (($i == 0) and ($capFirstChar)) {
            $passwd = $passwd.trim(ucwords($file->current()));
        } else {
            $passwd = $passwd.trim(($caseOpt == 'firstUpper') ? ucwords($file->current()) : $file->current());
        }
        // If loop continuing, add a "-" between words
        if ($i < ($numWords - 1)) {
            $passwd = $passwd."-";
        }
    }
    if (($caseOpt == 'allLower') and !($capFirstChar)) {
        $passwd = strtolower($passwd);
    }

    if ($caseOpt == 'allUpper') {
        $passwd = strtoupper($passwd);
    }

    if ($maxLength != 0)  {
        $passwd = substr($passwd,0,$maxLength);
    }

    $output = json_encode(array('type'=>'message', 'text'=>$passwd));
    die($output);

}

