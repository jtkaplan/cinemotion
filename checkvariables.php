<?php
//CHECK FOR SUBJECT ID
$subjectid = "";

if ($_GET['subjectid']) {
    $subjectid = $_GET['subjectid'];
}  elseif ($_GET['PROLIFIC_ID']) {
    $subjectid =$_GET['PROLIFIC_ID'];
}
if (!$subjectid) {
    echo "Subject ID is missing. A subject ID is required<br>";
} else {
    echo "<input type=hidden id='subjectid' value='$subjectid'>";
}

//CHECK FOR STUDY ID
$studyid = $_GET['studyid'];
if (!$studyid) {
    echo "Study ID is missing. A study ID is required<br>";
} else {
    echo "<input type=hidden id='studyid' value='$studyid'>";
}

//CHECK FOR STUDY CONFIG FILE
$configFileName = "config/$studyid/config.json";
if (!file_exists($configFileName)) {
    echo "Cannot find configuration file for study $studyid<br>";
    $configFileFound = 0;
} else {
    $configFileFound = 1;
}



?>