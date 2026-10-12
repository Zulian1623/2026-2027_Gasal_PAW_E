<?php
// 1. array_push()
$fruits = array("Apple", "Banana", "Cherry");
array_push($fruits, "Mango", "Orange");

echo "<h3>1. array_push()</h3>";
echo "<pre>";
print_r($fruits);
echo "</pre>";

// 2. array_merge()
$fruits1 = array("Apple", "Banana");
$fruits2 = array("Cherry", "Mango");

$merged = array_merge($fruits1, $fruits2);

echo "<h3>2. array_merge()</h3>";
echo "<pre>";
print_r($merged);
echo "</pre>";

// 3. array_values()
$height = array(
    "Andy" => 176,
    "Barry" => 165,
    "Charlie" => 170
);

$values = array_values($height);

echo "<h3>3. array_values()</h3>";
echo "<pre>";
print_r($values);
echo "</pre>";

// 4. array_search()
$search = array_search("Banana", $fruits);

echo "<h3>4. array_search()</h3>";
echo "Indeks Banana: " . $search . "<br>";

// 5. array_filter()
$numbers = array(10, 15, 20, 25, 30);

$filtered = array_filter($numbers, function($number) {
    return $number > 20;
});

echo "<h3>5. array_filter()</h3>";
echo "<pre>";
print_r($filtered);
echo "</pre>";

// 6. Sorting array terindeks
$numbers = array(40, 10, 30, 20);

sort($numbers);
echo "<h3>6. sort()</h3>";
print_r($numbers);

rsort($numbers);
echo "<br><h3>7. rsort()</h3>";
print_r($numbers);

// 7. Sorting array asosiatif berdasarkan nilai
$height = array(
    "Andy" => 176,
    "Barry" => 165,
    "Charlie" => 170
);

asort($height);
echo "<h3>8. asort()</h3>";
echo "<pre>";
print_r($height);
echo "</pre>";

arsort($height);
echo "<h3>9. arsort()</h3>";
echo "<pre>";
print_r($height);
echo "</pre>";

// 8. Sorting array asosiatif berdasarkan kunci
ksort($height);
echo "<h3>10. ksort()</h3>";
echo "<pre>";
print_r($height);
echo "</pre>";

krsort($height);
echo "<h3>11. krsort()</h3>";
echo "<pre>";
print_r($height);
echo "</pre>";
?>