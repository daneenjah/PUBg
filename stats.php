<?php

$lines = file_get_contents($myFile); //file in to an array

$data = json_decode($lines, true); //decode the json

//if the mode isn't set, lets set it to fpp squad and set our colors per mode

if ($mode == "") {
  $mode = "squad-fpp";
  $hcolor = "<font color=#48447C>";
} elseif ($mode == "squad-fpp") {
  $hcolor = "<font color=#48447C>";
} elseif ($mode == "duo-fpp") {
  $hcolor = "<font color=#368480>";
} elseif ($mode == "solo-fpp") {
  $hcolor = "<font color=#914B16>";
} elseif ($mode == "squad") {
  $hcolor = "<font color=#48447C>";
} elseif ($mode == "duo") {
  $hcolor = "<font color=#368480>";
} elseif ($mode == "solo") {
  $hcolor = "<font color=#914B16>";
}

//pull our data from the json
$assists = $data["data"]["attributes"]["gameModeStats"][$mode]["assists"];
$boosts = $data["data"]["attributes"]["gameModeStats"][$mode]["boosts"];
$dBNOs = $data["data"]["attributes"]["gameModeStats"][$mode]["dBNOs"];
$damageDealt = $data["data"]["attributes"]["gameModeStats"][$mode]["damageDealt"];
$headshotKills = $data["data"]["attributes"]["gameModeStats"][$mode]["headshotKills"];
$heals = $data["data"]["attributes"]["gameModeStats"][$mode]["heals"];
$kills = $data["data"]["attributes"]["gameModeStats"][$mode]["kills"];
$longestKill = $data["data"]["attributes"]["gameModeStats"][$mode]["longestKill"];
$longestTimeSurvived = $data["data"]["attributes"]["gameModeStats"][$mode]["longestTimeSurvived"];
$losses = $data["data"]["attributes"]["gameModeStats"][$mode]["losses"];
$maxKillStreaks = $data["data"]["attributes"]["gameModeStats"][$mode]["maxKillStreaks"];
$revives = $data["data"]["attributes"]["gameModeStats"][$mode]["revives"];
$rideDistance = $data["data"]["attributes"]["gameModeStats"][$mode]["rideDistance"];
$roundMostKills = $data["data"]["attributes"]["gameModeStats"][$mode]["roundMostKills"];
$roundsPlayed = $data["data"]["attributes"]["gameModeStats"][$mode]["roundsPlayed"];
$suicides = $data["data"]["attributes"]["gameModeStats"][$mode]["suicides"];
$swimDistance = $data["data"]["attributes"]["gameModeStats"][$mode]["swimDistance"];
$teamKills = $data["data"]["attributes"]["gameModeStats"][$mode]["teamKills"];
$timeSurvived = $data["data"]["attributes"]["gameModeStats"][$mode]["timeSurvived"];
$top10s = $data["data"]["attributes"]["gameModeStats"][$mode]["top10s"];
$vehicleDestroys = $data["data"]["attributes"]["gameModeStats"][$mode]["vehicleDestroys"];
$walkDistance = $data["data"]["attributes"]["gameModeStats"][$mode]["walkDistance"];
$weaponsAcquired = $data["data"]["attributes"]["gameModeStats"][$mode]["weaponsAcquired"];
$wins = $data["data"]["attributes"]["gameModeStats"][$mode]["wins"];

$tmatches = $roundsPlayed - $wins;//subtract matches won from total matches

//if there are matches, set the rest of the variables
if ($tmatches != 0) {
$kdr = $kills / $tmatches;//get the kdr from kills divided by $tmatches

$adr = number_format($damageDealt / $roundsPlayed);//divide damage by matches for adr
$adrr = $damageDealt / $roundsPlayed;//get adr as raw output for the colors to work correctly

$top10 = ($top10s / $roundsPlayed) * 100;//get the top 10 percentage

$avgsurvive =  (($timeSurvived / 60) / 60) / $roundsPlayed * 60;//get our average survived time

$kda = ($kills + $assists) / $tmatches;//add our kills and assists, then divide by $tmatches for our KDA

$heals = $heals / $roundsPlayed;//make heals an average per match

$boosts = $boosts / $roundsPlayed;//make boosts an average per match

$headshotr = ($kills - $headshotKills) * 100;//subtract our headshot kills from overall kills
$headshot = 100 - ($headshotr / $kills);//make headshots a percentage


$winperc = number_format(($wins / $roundsPlayed) * 100);
}
//set colors for different kdr threshholds
if ($kdr >= 8) {
  $kdrc = "#fc0584";
} elseif ($kdr >= 4) {
    $kdrc = "#ff0000";
} elseif ($kdr >= 3) {
  $kdrc = "#C95847";
} elseif ($kdr >= 2) {
  $kdrc = "#FF9526";
} elseif ($kdr >= 1) {
  $kdrc = "#00892a";
} elseif ($kdr < 1) {
  $kdrc = "#00a1ce";
}

//set colors for different adr threshholds
if ($adrr >= 800) {
  $adrc = "#fc0584";
} elseif ($adrr >= 500) {
  $adrc = "#ff0000";
} elseif ($adrr >= 400) {
  $adrc = "#C95847";
} elseif ($adrr >= 300) {
  $adrc = "#FF9526";
} elseif ($adrr >= 200) {
  $adrc = "#00892a";
} elseif ($adrr >= 100) {
  $adrc = "#00ce84";
} elseif ($adrr <= 100) {
  $adrc = "#00a1ce";
}

echo "<tr>";
echo "\n";
echo "  <th class=tg1 colspan=2><center><font color=545454 size=2><b>Updated: " . date ("M d H:i:s", filemtime($myFile)) . " EST</b></font></center>";

echo "\n";
echo "</tr>";
echo "\n";

//echo all the things, html for tables and some number formating to make things cleaner.
echo "<tr>";
echo "\n";
echo "  <th class=tg1><center><font color=" . $kdrc . " size=4><b>KDR: </b>" . number_format((float)$kdr, 2, '.', '') . "</font></center></th>";
echo "\n";
echo "  <th class=tg1><center><font color=" . $adrc . " size=4><b>ADR: </b>" . $adr . "</font></center></th>";

echo "\n";
echo "</tr>";
echo "\n";

echo "<tr>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Win %: </font></b>" . $winperc . "%</th>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Top 10 %: </font></b>" . number_format((float)$top10, 2, '.', '') . "%</th>";

echo "\n";
echo "</tr>";
echo "\n";

echo "<tr>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Lng Kill: </font></b>" . number_format((float)$longestKill, 0, '.', '') . "m</th>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Heads: </font></b>". number_format((float)$headshot, 1, '.', '') . "%</th>";

echo "\n";
echo "</tr>";
echo "\n";

echo "<tr>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Top 10s: </font></b>" . $top10s . "</th>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Avg Svd: </font></b>" . number_format((float)$avgsurvive, 1, '.', '') . "m</th>";

echo "\n";
echo "</tr>";
echo "\n";

echo "<tr>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Most Kills: </font></b>" . $roundMostKills . "</th>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "KDA: </font></b>" . number_format((float)$kda, 2, '.', '') . "</th>";

echo "\n";
echo "</tr>";
echo "\n";

echo "<tr>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Assists: </font></b>" . $assists . "</th>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Wins: </font></b>" . $wins . "</th>";

echo "\n";
echo "</tr>";
echo "\n";

echo "<tr>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Dmg: </font></b>" . number_format($damageDealt) . "</th>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Kills: </font></b>" . $kills . "</th>";

echo "\n";
echo "</tr>";
echo "\n";

echo "<tr>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Heals: </font></b>" . number_format((float)$heals, 2, '.', '') . "</th>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Boosts: </font></b>" . number_format((float)$boosts, 2, '.', '') . "</th>";

echo "\n";
echo "</tr>";
echo "\n";

echo "<tr>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "dBNOs: </font></b>" . $dBNOs . "</th>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Lng Svd: </font></b>" . number_format((float)($longestTimeSurvived / 60), 1, '.', '') . "m</th>";

echo "\n";
echo "</tr>";
echo "\n";

echo "<tr>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Losses: </font></b>" . $losses . "</th>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Matches: </font></b>" . $roundsPlayed . "</th>";

echo "\n";
echo "</tr>";
echo "\n";

echo "<tr>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Time Alive: </font></b>" . number_format(($timeSurvived / 60) / 60) . "h</th>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Wpn Aqd: </font></b>" . number_format($weaponsAcquired) . "</th>";

echo "\n";
echo "</tr>";
echo "\n";

echo "<tr>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Killstreak: </font></b>" . $maxKillStreaks . "</th>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Team Kills: </font></b>" . $teamKills . "</th>";

echo "\n";
echo "</tr>";
echo "\n";

echo "<tr>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Revives: </font></b>" . $revives . "</th>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Suicides: </font></b>" . $suicides . "</th>";

echo "\n";
echo "</tr>";
echo "\n";
echo "<tr>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Swam: </font></b>" . number_format($swimDistance) . "m</th>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Cars Dstrd: </font></b>" . $vehicleDestroys . "</th>";

echo "\n";
echo "</tr>";
echo "\n";

echo "<tr>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Ride: </font></b>" . number_format($rideDistance / 1000) . "km</th>";
echo "\n";
echo "  <th class=tg1><b>" . $hcolor . "Walk: </font></b>" . number_format($walkDistance / 1000) . "km</th>";
echo "\n";
echo "</tr>";
echo "\n";
?>
