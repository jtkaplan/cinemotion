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
<?php
$configFileName = "config.json";
include('checkvariables.php');
include('parse_config.php');
?>

<body style="background-color:<?=$bgcolor?>;">
<?php

include("navbar.php");

if ($controls) {
    echo "<input type=hidden id='controls' value='true'>";
} else {
    echo "<input type=hidden id='controls' value='false'>";
}

?>

<?php  if ($password == $_GET['password']) {
?>

<br><br>
<div class="hiddenText" id="startscreentext">
    <input type="hidden" id="dataUploadInterval" value="<?=$data_uploadInterval?>">
    <?php
        $filename = "config/$studyid/startscreen.html";
        include($filename);
    ?>
</div>
<div class="container-fluid">
    <?php include('video_module.php') ?>
</div>

<?php
//End screen text if we have any
if (file_exists("config/$studyid/endscreen.html")) {
    echo "<div id=endscreen class=\"endScreen\">";
        include("config/$studyid/endscreen.html");
    echo "</div>";
}
} else {
    echo "Invalid password.<br>";
}

?>



<script src="https://vjs.zencdn.net/7.7.5/video.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="   crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
<script src="js/cinemotion.js"></script>
</body>
