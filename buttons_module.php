<?php
echo "<div class=\"mx-auto\" style=\"width: $buttonsWidth"."px;\">";

echo "<div class=\"row text-center\">";
$buttonCounter = 1;


foreach ($button_names as $button_name) {

    $thisButton = $button_data[$button_name];
    $buttonKey = $thisButton["key"];
    $buttonColor = $thisButton["color"];
    $textColor = $thisButton["textcolor"];

    echo "<div class=\"col- text-center\">";
    echo "<button type=\"button\" class=\"btn emobutton emobutton-off\" style=\"background-color: $buttonColor; color: $textColor;\" id=\"button$buttonKey\" name=\"$button_name\" ";

    if ($clickableButtons) {
        echo "onClick=\"doButtonClick('$buttonKey');\"";
    }

    echo ">$button_name</button><br><span style='color:$textColor;'>$buttonKey</span>";

    echo "</div>";

    ++$buttonCounter;
}
echo "<div class=\"col- text-center\">";
if (!$all_off_ignore) {
    echo "<button type=\"button\" style='color:$textColor;' class=\"btn btn-outline-secondary\" id=\"buttonOff\" onClick=\"doButtonOff($numButtons);\">All off</button><br><span style='color:$textColor;'>$all_off_key</span>";
}
echo "</div></div>";

echo "</div>";

?>