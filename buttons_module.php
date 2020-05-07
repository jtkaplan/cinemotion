<?php
echo "<div class=\"mx-auto\" style=\"width: $buttonsWidth"."px;\">";

echo "<div class=\"row text-center\">";
$buttonCounter = 1;
foreach ($button_names as $button_name) {

    $thisButton = $button_data[$button_name];
    $buttonKey = $thisButton["key"];
    $buttonColor = $thisButton["color"];
    echo "<div class=\"col- text-center\">";
    echo "<button type=\"button\" class=\"btn emobutton emobutton-off\" style=\"background-color: $buttonColor;\" id=\"button$buttonKey\" name=\"$button_name\" onClick=\"doButtonClick('$buttonKey');\">$button_name</button><br>$buttonKey";
    echo "</div>";

    ++$buttonCounter;
}
echo "<div class=\"col- text-center\">";
echo "<button type=\"button\" class=\"btn btn-outline-secondary\" id=\"buttonOff\" onClick=\"doButtonOff($numButtons);\">All off</button><br>$all_off_key</div>";

echo "</div>";

echo "</div>";

?>