<?php
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170"
);

$height["David"] = "180";
$height["Emma"] = "168";
$height["Frank"] = "175";
$height["Grace"] = "162";
$height["Henry"] = "178";

$lastKey = array_key_last($height);
echo "Data terakhir: " . $lastKey . " = " . $height[$lastKey] . " cm<br>";

unset($height["Grace"]);

$lastKey = array_key_last($height);
echo "Setelah penghapusan: " . $lastKey . " = " . $height[$lastKey] . " cm";
?>