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

foreach ($height as $name => $value) {
    echo $name . " memiliki tinggi " . $value . " cm<br>";
}
?>