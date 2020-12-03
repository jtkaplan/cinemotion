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
$movie2_filename = "config/$studyid/video/".$config_json["movie2"]["filename"];
$movie2_type = $config_json["movie2"]["type"];

//captions
$captions_file = "config/$studyid/video/".$config_json["captions"]["file"];
$captions_lang = $config_json["captions"]["lang"];
$captions_label = $config_json["captions"]["label"];

//Button options
$button_data = $config_json["buttons"];
$numButtons = count($button_data);
$buttonsWidth = ($numButtons) * 85;
$button_names = array_keys($button_data);
$all_off_key = $config_json["AllOff"]["key"];
$all_off_ignore = $config_json["AllOff"]["hidden"];

//data options
$data_uploadInterval = $config_json["dataUploadInterval"]["seconds"];

//headphonecheck options
$headphonecheck = $config_json["options"]["headphonecheck"];
$headphonecheckMaxAttempts = $config_json["options"]["headphonecheckMaxAttempts"];

//general options
$clickableButtons = $config_json["options"]["clickableButtons"];
$controls = $config_json["options"]["controls"];
$password = $config_json["options"]["password"];
?>