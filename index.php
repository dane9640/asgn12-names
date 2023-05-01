<?php
include 'functions/utility-functions.php';
include 'functions/names-functions.php';

$fileName = 'names-short-list.txt';
$fullNames = loadFullNames($fileName);

$firstNames = loadFirstNames($fullNames);
$lastNames = loadLastNames($fullNames);

// Get valid names
for($i = 0; $i < sizeof($fullNames); $i++) {
    // jam the first and last name toghether without a comma, then test for alpha-only characters
    if(ctype_alpha($lastNames[$i].$firstNames[$i])) {
        $validFirstNames[$i] = $firstNames[$i];
        $validLastNames[$i] = $lastNames[$i];
        $validFullNames[$i] = $validLastNames[$i] . ", " . $validFirstNames[$i];
    }
}

// ~~~~~~~~~~~~ Display results ~~~~~~~~~~~~ //

echo '<h1>Names - Results</h1>';

echo '<h2>All Names</h2>';
echo "<p>There are " . sizeof($fullNames) . " total names</p>";
echo '<ul style="list-style-type:none">';    
foreach($fullNames as $fullName) {
  echo "<li>$fullName</li>";
}
echo "</ul>";

echo '<h2>All Valid Names</h2>';
echo "<p>There are " . sizeof($validFullNames) . " valid names</p>";
echo '<ul style="list-style-type:none">';    
foreach($validFullNames as $validFullName) {
  echo "<li>$validFullName</li>";
}
echo "</ul>";

echo '<h2>Unique Names</h2>';
$uniqueValidNames = (array_unique($validFullNames));
echo ("<p>There are " . sizeof($uniqueValidNames) . " Unique names</p>");
echo '<ul style="list-style-type:none">';    
foreach($uniqueValidNames as $uniqueValidNames) {
  echo "<li>$uniqueValidNames</li>";
}
echo "</ul>";

echo '<h2>Common First Names</h2>';
$commonFirstNames = getCommonNames($validFirstNames);
echo ("<p>The most common first names in order of appearance: </p>");
echo '<ul style="list-style-type:none">';    
foreach($commonFirstNames as $commonFirstName) {
  echo "<li>".array_search($commonFirstName, $commonFirstNames).", appearing $commonFirstName times</li>";
  array_shift($commonFirstNames);
}
echo "</ul>";

echo '<h2>Common Last Names</h2>';
$commonLastNames = getCommonNames($validLastNames);
echo ("<p>The most common last names in order of appearance: </p>");
echo '<ul style="list-style-type:none">';    
foreach($commonLastNames as $commonLastName) {
  echo "<li>".array_search($commonLastName, $commonLastNames).", appearing $commonLastName times</li>";
  array_shift($commonLastNames);
}
echo "</ul>";

?>








