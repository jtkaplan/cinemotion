<?php
//Extract options from config file
$configText = file_get_contents($configFileName);
$config_json = json_decode($configText,true);

//Movie options
$movie_filename = "config/$studyid/video/".$config_json["movie"]["filename"];
$movie_type = $config_json["movie"]["type"];
$movie_poster = "config/$studyid/video/".$config_json["movie"]["poster"];
$movie_width = $config_json["movie"]["width"];
$movie_height = $config_json["movie"]["height"];

//Button options
$button_data = $config_json["buttons"];
$numButtons = count($button_data);
$buttonsWidth = ($numButtons) * 85;
$button_names = array_keys($button_data);
$all_off_key = $config_json["AllOff"]["key"];

//data options
$data_uploadInterval = $config_json["dataUploadInterval"]["seconds"];
?>