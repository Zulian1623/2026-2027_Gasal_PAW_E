<?php
$weight = array(
    "Andy" => "65",
    "Barry" => "70",
    "Charlie" => "60"
);

$names = array_keys($weight);
$arrlength = count($weight);

for ($i = 0; $i < $arrlength; $i++) {
    echo $names[$i] . " memiliki berat " .
         $weight[$names[$i]] . " kg<br>";
}
?>