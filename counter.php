<?php

//Add correct path to your count.txt file.
$path = 'counter.txt';

//Opens file to read the number of hits.
$file  = fopen($path, 'r');
$count = fgets($file, 1000);
fclose( $file );

//Update the count.
$count = abs( intval( $count ) ) + 1;

//Output the updated count.
echo "Hits: {$count}";
echo "\n";

//Opens countlog.txt to change new hit number.
$file = fopen($path, 'w');
fwrite($file, $count);
fclose($file);
?>
