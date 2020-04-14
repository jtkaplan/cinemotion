<?php
//Receives data and writes it to data file

$filename = htmlentities($_POST['filename'], ENT_QUOTES, 'UTF-8');
//$eventData = htmlentities($_POST['dataLog'], ENT_QUOTES, 'UTF-8');
$eventData = $_POST['dataLog'];

$filepath = "data/$filename";

$result = file_put_contents($filepath,$eventData);

echo "Attempting to save to $filepath... ";
echo "Result of save is: $result";

?>