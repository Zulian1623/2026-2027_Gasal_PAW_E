<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

$newFruits = array("Durian", "Elderberry", "Fig", "Grape", "Mango");

for ($i = 0; $i < count($newFruits); $i++) {
    array_push($fruits, $newFruits[$i]);
}

$arrlength = count($fruits);

echo "Panjang array: " . $arrlength . "<br>";
echo "Isi array fruits:<br>";

for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x] . "<br>";
}
?>