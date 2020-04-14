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
<?php

include("navbar.php");

//Extract options from config file
$configText = file_get_contents("config.json");
$config_json = json_decode($configText,true);

//Movie options
$movie_filename = $config_json["movie"]["filename"];
$movie_type = $config_json["movie"]["type"];
$movie_poster = $config_json["movie"]["poster"];
$movie_width = $config_json["movie"]["width"];
$movie_height = $config_json["movie"]["height"];

//Button options
$button_data = $config_json["buttons"];
$numButtons = count($button_data);
$buttonsWidth = ($numButtons) * 100;
$button_names = array_keys($button_data);
$all_off_key = $config_json["AllOff"]["key"];

?>
<br><br>
<div class="container-fluid">
    <div class="mx-auto" style="width: 640px;">
        <video
            id="my-video"
            class="video-js"
            preload="auto"
            controls
            width="<?=$movie_width?>"
            height="<?=$movie_height?>"
            poster="posters/<?=$movie_poster?>"
            data-setup="{}"
        >

            <source src="videos/<?=$movie_filename?>" type="video/<?=$movie_type?>" />

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

        //some values we need to give to javascript
        echo "<input type=hidden id=\"allOffKey\" value=\"$all_off_key\">";

        echo "<div class=\"mx-auto\" style=\"width: $buttonsWidth"."px;\">";

                $buttonCounter = 1;
                foreach ($button_names as $button_name) {

                    $thisButton = $button_data[$button_name];
                    $buttonKey = $thisButton["key"];
                    $buttonColor = $thisButton["color"];

                    echo "<button type=\"button\" class=\"btn emobutton emobutton-off\" style=\"background-color: $buttonColor;\" id=\"button$buttonKey\" name=\"$button_name\" onClick=\"doButtonClick('$buttonKey');\">$button_name</button> ";
                    ++$buttonCounter;
                }

                echo "<button type=\"button\" class=\"btn btn-outline-secondary\" id=\"buttonOff\" onClick=\"doButtonOff($numButtons);\">All off</button>";
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
