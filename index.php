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

    <title>Cinemotion</title>
</head>

<body>
<?php include("navbar.php"); ?>
<br><br>
<div class="container-fluid">
    <div class="mx-auto" style="width: 640px;">
        <video
            id="my-video"
            class="video-js"
            preload="auto"
            controls
            width="640"
            height="264"
            poster="posters/reef.jpg"
            data-setup="{}"
        >
            <source src="videos/reef.mp4" type="video/mp4" />
        <!--    <source src="videos/reef.webm" type="video/webm" />-->
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank"
                >supports HTML5 video</a
                >
            </p>
        </video>
       <br>
        <?php

        $buttonText = file_get_contents("buttons.txt");
        $buttonList = explode("\n",$buttonText);
        $numButtons = count($buttonList);
        $buttonsWidth = $numButtons * 100;

        echo "<input type=hidden id=\"numButtons\" value=\"$numButtons\">";
        echo "<div class=\"mx-auto\" style=\"width: $buttonsWidth"."px;\">";


                $buttonCounter = 1;
                foreach ($buttonList as $buttonItem) {

                    echo "<button type=\"button\" class=\"btn btn-outline-success\" id=\"button$buttonCounter\" name=\"$buttonItem\" onClick=\"doButtonClick($buttonCounter);\">$buttonItem</button> ";
                    ++$buttonCounter;
                }

                echo "<br><button type=\"button\" class=\"btn btn-outline-secondary\" id=\"buttonOff\" onClick=\"doButtonOff($numButtons);\">All off</button>";
            ?>


        </div>
    <br>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Event log</h5>
                <p class="card-text" id="eventLog"></p>
            </div>
        </div>
    </div>
</div>




<script src="https://vjs.zencdn.net/7.7.5/video.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="js/cinemotion.js"></script>
</body>
