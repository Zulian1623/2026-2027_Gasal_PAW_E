<?php
$weight = array(
    "Andy" => "65",
    "Barry" => "70",
    "Charlie" => "60"
);

$secondKey = array_keys($weight)[1];

echo $secondKey . " memiliki berat " . $weight[$secondKey] . " kg.";
?>