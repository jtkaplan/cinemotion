<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="   crossorigin="anonymous"></script>

    <!-- Popper -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- Video.js -->
    <link href="https://vjs.zencdn.net/7.7.5/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/7.7.5/video.js"></script>

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- 2) Import HeadphoneCheck.js (minified) from McDermott S3 server -->
    <script type="text/javascript" src="js/HeadphoneCheck.js"></script>
    <!-- 2) Import HeadphoneCheck.css from McDermott S3 server -->
    <link rel="stylesheet" type="text/css" href="css/HeadphoneCheckStyle.css">

    <!-- Our custom CSS -->
    <link rel="stylesheet" href="css/main.css">

    <!-- Our custom Javascript -->
    <script src="js/instructions.js"></script>

    <title>Cinemotion - instructions</title>
</head>

<body>
<?php

include("navbar.php");

?>
<br><br>
<div class="container-fluid">

    <?php

    include('checkvariables.php');
    include('parse_config.php');

    if ($password == $_GET['password']) {
        //Load in instruction cards from files
        $instructionFiles = glob("config/$studyid/instructions*.html");
        $numInstructionScreens = 0;
        foreach ($instructionFiles as $instructionFile) {

            ++$numInstructionScreens;
            if ($numInstructionScreens > 1) {
                $instructionClass = "instructionScreenNotFirst";
                echo "<div id=instructions$numInstructionScreens class=\"alert alert-dark instructionScreen $instructionClass\"><p class=\"card-text\">";
                include($instructionFile);
                echo "</p><br><br><br>";
                echo "<div class=\"text-center\"><button type=\"button\" class=\"btn btn-success\" onClick=\"nextInstructionScreen($numInstructionScreens);\">Next</button></div>";
            } else {
                $instructionClass = "instructionScreenFirst";
                echo "<div id=instructions$numInstructionScreens class=\"alert alert-dark instructionScreen $instructionClass\"><p class=\"card-text\">";
                include($instructionFile);
                echo "</p><br><br><br</div>";

                if ($headphonecheck) {
                    echo "<div class=\"text-center\"><button type=\"button\" class=\"btn btn-success\" onClick=\"showHeadphoneCheck();\">Begin</button></div>";
                } else {
                    echo "<div class=\"text-center\"><button type=\"button\" class=\"btn btn-success\" onClick=\"nextInstructionScreen($numInstructionScreens);\">Begin</button></div>";
                }

            }

            echo "</div>";

        }
        if ($headphonecheck) {

            echo "<div id=\"headphonecheckScreen\" class=\"alert alert-dark instructionScreen headphonecheckScreen\">";
            echo "<p class=\"card-text\">";
            echo "<div id=\"hc-container\"></div>";
            echo "</p>";
            echo "</div>";
            echo "<input type=hidden id=\"headphonecheckMaxAttempts\" value=\"$headphonecheckMaxAttempts\">";
        }
    } else {
        echo "Invalid password.<br>";
    }
    ?>


    <div class="card overflow-auto" id="eventCard">
        <div class="card-body">
            <h5 class="card-title">Event log</h5>
            <p class="card-text" id="eventLog"></p>
        </div>
    </div>
</div>




</body>
