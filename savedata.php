<?php
//Receives data and writes it to data file

$studyid = htmlentities($_POST['$studyid'], ENT_QUOTES, 'UTF-8');
$subjectid = htmlentities($_POST['subjectid'], ENT_QUOTES, 'UTF-8');

$eventData = $_POST['dataLog'];

$filepath = "config/$studyid/data/$studyid-$subjectid-data.txt";

$result = file_put_contents($filepath,$eventData);

echo "Attempting to save to $filepath... ";
echo "Result of save is: $result";

?>