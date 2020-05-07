<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Video.js -->
    <link href="https://vjs.zencdn.net/7.7.5/video-js.css" rel="stylesheet" />

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Our custom CSS -->
    <link rel="stylesheet" href="css/main.css">

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

    //Load in instruction cards from files
    $instructionFiles = glob("config/$studyid/instructions*.html");
    $numInstructionScreens = 0;
    foreach ($instructionFiles as $instructionFile) {

            ++$numInstructionScreens;
            if ($numInstructionScreens > 1) {
                $instructionClass = "instructionScreenNotFirst";
            } else {
                $instructionClass = "instructionScreenFirst";
            }

            echo "<div id=instructions$numInstructionScreens class=\"alert alert-dark instructionScreen $instructionClass\"><p class=\"card-text\">";
            include($instructionFile);
            echo "</p><br><br><br>";
            echo "<div class=\"text-center\"><button type=\"button\" class=\"btn btn-success\" onClick=\"nextInstructionScreen($numInstructionScreens);\">Next</button></div>";

            echo "</div>";

        }
    ?>


    <div class="card overflow-auto" id="eventCard">
        <div class="card-body">
            <h5 class="card-title">Event log</h5>
            <p class="card-text" id="eventLog"></p>
        </div>
    </div>
</div>



<script src="https://vjs.zencdn.net/7.7.5/video.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="   crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="js/instructions.js"></script>
</body>
