<?php
//clear our counts
$time = 0;
$timer = 0;
$totalr = 0;
$matchesr = 0;
$matchesrr = 0;

//set num to 1 to start at first line of file
$numr = 1;
//read the lines in season.txt into variables
if ($file = fopen("data/seasons.txt", "r")) {
    while(!feof($file)) {
        $textperline = fgets($file);
        ${'season' . $numr} = $textperline;
        $numr = $numr+1;
     }
    fclose($file);
 }

//count how many lines are in seasons.txt
$file = "data/seasons.txt";
$all_lines = file($file);

$seasonsr = count($all_lines);

//set our counts for the loop
$countr = 0;
$numr = 1;

  //loop to run based on how many seasons there are
while ($countr < $seasonsr)
  {
    $seasonr = trim(${'season' . $numr});//set the season and trim the blank spaces

    $myFiler = "data/" . $name. "/". $name . "_" . $seasonr . ".json";//specify the file

    //check if the file exists
    if (file_exists($myFiler)) {
      $lines = file_get_contents($myFiler); //file in to an array
      $data = json_decode($lines, true); //decode the json

      //pull our time survived and add it to the the total time
      $timeSurvivedr = $data["data"]["attributes"]["gameModeStats"][$mode]["timeSurvived"];
      $time = $time + $timeSurvivedr;

      $matchesr = $data["data"]["attributes"]["gameModeStats"][$mode]["roundsPlayed"];
      $matchesrr = $matchesrr + $matchesr;
    } else {
      $countr = $seasonsr;//if the file doesn't exist, we'll close the loop
    }
    //add our increments for the loop
    $countr = $countr+1;
    $numr = $numr+1;
  }

$timer = ($time / 60) / 60;//do some math on our time (it's in seconds)

//echo everything
echo "<tr>";
echo "\n";
echo "  <th class=tg1 colspan=2><center><font color=545454 size=2><b>Total Hrs Alive: " . number_format($timer). "</b></font></center>";

echo "\n";
echo "</tr>";
echo "\n";

echo "<tr>";
echo "\n";
echo "  <th class=tg1 colspan=2><center><font color=545454 size=2><b>Total Matches: " . number_format($matchesrr) . "</b></font></center>";

echo "\n";
echo "</tr>";
echo "\n";
?>
