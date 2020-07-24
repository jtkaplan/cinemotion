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

    <title>Cinemotion - practice</title>
</head>

<body>
<?php

include("navbar.php");
include('checkvariables.php');
include('parse_config.php');

//override video to use practice file
$movie_filename = "videos/waves.mp4";
$movie2_filename = "videos/waves.mp4";
$movie_type = "mp4";
$movie2_type = "mp4";
$movie_poster = "posters/waves.png";
$movie_width = 640;
$movie_height = 360;


?>
<br><br>
<div class="container-fluid">
    <div class="alert">
        <?php

            echo "<div class=\"text-center\">";
            echo "<h2><span id='practiceTitle'>We will now practice</span></h2>";
            echo "<a class=\"btn btn-success\" id='practiceButton' role='button' onClick='doPractice();'>Press Here To Begin The Practice</a></div>";
            echo "<br>";
            include('video_module.php');

        ?>

    </div>

</div>



<script src="https://vjs.zencdn.net/7.7.5/video.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="   crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
<script src="js/practice.js"></script>
</body>
