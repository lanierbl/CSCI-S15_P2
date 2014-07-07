<?php
error_reporting(-1); # Report all PHP errors
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Brent Lanier - P2 - CSCI S-15 (Summer 2014)</title>

    <!-- Site PHP logic -->
    <?php require 'logic.php' ?>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css" />
    <!-- Site CSS -->
    <link rel='stylesheet' href='style.css' type='text/css'>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#submit_btn").click(function() {
                //get input field values
                var numWords       = $('input[name=numWords]').val();
                var SpecChar       = document.getElementById("SpecChar").checked ? 1 : 0;
                var capFirstChar   = document.getElementById("capFirstChar").checked ? 1 : 0;
                var incNum         = document.getElementById("incNum").checked ? 1 : 0;

                var proceed = true;

                if(proceed)
                {
                    //data to be sent to server
                    post_data = {'numWords':numWords, 'SpecChar':SpecChar, 'capFirstChar':capFirstChar, 'incNum':incNum};

                    //Ajax post data to server
                    $.post('logic.php', post_data, function(response){

                        //load json data from server and output message
                        if(response.type == 'error')
                        {
                            output = '<div class="error">'+response.text+'</div>';
                        } else {
                            output = '<div class="success">'+response.text+'</div>';
                        }

                        $("#result").hide().html(output).slideDown();
                    }, 'json');

                }
            });

            //reset previously set border colors and hide all message on .keyup()
            $("#passwd_form input, #passwd_form textarea").keyup(function() {
                $("#passwd_form input, #passwd_form textarea").css('border-color','');
                $("#result").slideUp();
            });

        });
    </script>

</head>

<body>

    <fieldset id="passwd_form">
    <legend>XKCD Password Options</legend>
    <div id="result"></div>
        <label for="numWords"><span>Password Length:  </span>
            <input name="numWords" id="numWords" type="range" min="2" max="8" step="1" value="2"/>
        </label>

        <label for="SpecChar"><span>Special Character?</span>
            <input name="SpecChar" id="SpecChar" type="checkbox"/>
        </label>

        <label for="capFirstChar"><span>Uppercase first character?</span>
            <input name="capFirstChar" id="capFirstChar" type="checkbox"/>
        </label>

        <label for="incNum"><span>Include Number?</span>
            <input name="incNum" id="incNum" type="checkbox"/>
        </label>

        <label><span>&nbsp;</span>
            <button class="submit_btn" id="submit_btn">Submit</button>
        </label>

    </fieldset>


</body>
</html>