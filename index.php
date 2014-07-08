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
                //Set form variables to be sent via JSON
                var numWords       = $('input[name=numWords]').val();
                var SpecChar       = document.getElementById("SpecChar").checked ? 1 : 0;
                var capFirstChar   = document.getElementById("capFirstChar").checked ? 1 : 0;
                var caseOpt        = $('input:radio[name=caseOpt]:checked').val();
                var incNum         = document.getElementById("incNum").checked ? 1 : 0;
                var maxLength      = $('input[name=maxLength]').val();

                var proceed = true;

                // Quick client-side verification to make sure only number was entered in number box
                if ((maxLength > -1) && (maxLength < 100) && (maxLength != '')) {} else {
                    $('input[name=maxLength]').css('border-color','red');
                    proceed = false;
                }

                if(proceed)
                {
                    // JSON data sent to PHP form for processing
                    post_data = {'numWords':numWords, 'SpecChar':SpecChar, 'capFirstChar':capFirstChar, 'caseOpt':caseOpt, 'incNum':incNum, 'maxLength':maxLength};

                    //Ajax response
                    $.post('logic.php', post_data, function(response){

                        // Load JSON data and display
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

            //reset form when new options selected
            $("#passwd_form input, #passwd_form textarea").keyup(function() {
                $("#passwd_form input, #passwd_form textarea").css('border-color','');
                $("#result").slideUp();
            });

        });

    </script>

</head>

<body>

    <!--  XKCD Password Form  -->
    <fieldset id="passwd_form">
    <legend>XKCD Password Options</legend>
    <div id="result"></div>

        <label for="numWords"><span>Word Length:</span>
            2 <input name="numWords" id="numWords" type="range" min="2" max="8" step="1" value="2"/> 8
        </label>

        <label for="SpecChar"><span>Special Character?</span>
            <input name="SpecChar" id="SpecChar" type="checkbox"/>
        </label>

        <label for="incNum"><span>Include Number?</span>
            <input name="incNum" id="incNum" type="checkbox"/>
        </label>

        <label for="caseOpt"><span>Case Options:</span><br/>
            <input type="radio" name="caseOpt" id="caseOpt" value="allLower" checked><span>* Case (ALL)</span><br/>
            <input type="radio" name="caseOpt" id="caseOpt" value="allUpper"><span>* UPPER CASE (ALL)</span><br/>
            <input type="radio" name="caseOpt" id="caseOpt" value="firstUpper"><span>* Upper Case (All First Letters)</span>
        </label>

        <label for="capFirstChar"><span>Upper case first word?</span>
            <input name="capFirstChar" id="capFirstChar" type="checkbox"/>
        </label>

        <label for="maxLength"><span>Max Length (1-99 : 0 = No Max) </span>
            <input name="maxLength" id="maxLength" type="number" min="0" max="99" value="0">
        </label>

        <label><span>&nbsp;</span>
            <button class="submit_btn" id="submit_btn">Submit</button>
        </label>
    </fieldset>
    <div id="info">
        <p>The XKCD Password Generator is a handy tool that creates secure<br/>passwords based on combinations of everyday words.</p>
        <p>Additional options are available to further personalize your password.</p>
        <p>This tool was inspired by the popular XKCD comic:</p>
        <a href="http://xkcd.com/936/"><img class="displayed" src="images/xkcd_passwd.png" alt=""></a>
    </div>

</body>
</html>