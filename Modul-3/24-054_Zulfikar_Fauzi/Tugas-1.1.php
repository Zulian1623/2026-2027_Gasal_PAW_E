<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

array_push($fruits, "Durian", "Elderberry", "Fig", "Grape", "Mango");

$lastIndex = array_key_last($fruits);
print_r($fruits);
echo '<br>'."Buah dengan indeks tertinggi: " . $fruits[$lastIndex];
?>
