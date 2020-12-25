<?php
$config = include('config/config.php'); //include the config file for user information
$players = $config['players']['number']; //pull name

//set the default variables to 0
$tmatches = 0;
$kills = 0;
$damage = 0;
$kdrr = 0;
$adrr = 0;
$winsr = 0;
$top10r = 0;

//set our variables for the loop
$num = 1;
$count = 0;

//set up a loop to run based on how many players are defined
while ($count < $players)
{
//get the player names and set the file location
$name = $config['player' . $num . '']['name']; //pull name
$myFile = "data/" . $name. "/". $name . "_" . $season . ".json";//specify the file

//get the datat pulled
$lines = file_get_contents($myFile);
$data = json_decode($lines, true);

//pull our information from the json
${'damageDealt' . $num} = $data["data"]["attributes"]["gameModeStats"]["squad-fpp"]["damageDealt"];
${'kills' . $num} = $data["data"]["attributes"]["gameModeStats"]["squad-fpp"]["kills"];
${'losses' . $num} = $data["data"]["attributes"]["gameModeStats"]["squad-fpp"]["losses"];
${'roundsPlayed' . $num} = $data["data"]["attributes"]["gameModeStats"]["squad-fpp"]["roundsPlayed"];
${'top10s' . $num} = $data["data"]["attributes"]["gameModeStats"]["squad-fpp"]["top10s"];
${'wins' . $num} = $data["data"]["attributes"]["gameModeStats"]["squad-fpp"]["wins"];

${'tmatches' . $num} = ${'roundsPlayed' . $num} - ${'wins' . $num};//subtract matches won from total matches
${'kdr' . $num} = ${'kills' . $num} / ${'tmatches' . $num};//get the kdr from kills divided by $tmatches
${'adr' . $num} = ${'damageDealt' . $num} / ${'tmatches' . $num};//get the kdr from kills divided by $tmatches
${'winsr' . $num} = ${'wins' . $num} / ${'roundsPlayed' . $num} * 100;//wins devided by matches

$tmatches = $tmatches + ${'tmatches' . $num};//subtract matches won from total matches

//add our variables up while the loop cycles
$kills = $kills + ${'kills' . $num};
$damage = $damage + ${'damageDealt' . $num};
$kdrr = $kdrr + ${'kdr' . $num};
$adrr = $adrr + ${'adr' . $num};
$wins = $winsr + ${'winsr' . $num};

$top10rr = ${'top10s' . $num} / ${'roundsPlayed' . $num};
$top10r = $top10r + $top10rr;

$count = $count+1;
$num = $num+1;
}

//do some math for kdr/adr/top 10%
$kdr = $kdrr / $players;
$adr = $adrr / $players;
$top10 = $top10r * 100 / $players;

$hcolor = "<font color=#48447C>";//set the color of the title text

if ($kdr >= 4) {
  $kdrc = "#ff0000";
} elseif ($kdr >= 3) {
  $kdrc = "#C95847";
} elseif ($kdr >= 2) {
  $kdrc = "#FF9526";
} elseif ($kdr >= 1) {
  $kdrc = "#00892a";
} elseif ($kdr <= 1) {
  $kdrc = "#00a1ce";
}

//set colors for different adr threshholds
if ($adr >= 500) {
  $adrc = "#ff0000";
} elseif ($adr >= 400) {
  $adrc = "#C95847";
} elseif ($adr >= 300) {
  $adrc = "#FF9526";
} elseif ($adr >= 200) {
  $adrc = "#00892a";
} elseif ($adr >= 100) {
  $adrc = "#00ce84";
} elseif ($adr < 100) {
  $adrc = "#00a1ce";
}


echo "<tr><th class=tg1><center><font color=" . $kdrc . " size=4><b>KDR: </b>" . number_format((float)$kdr, 2, '.', '') . "</th>";
echo "<th class=tg1><center><font color=" . $adrc . " size=4><b>ADR: </b>" . number_format((float)$adr, 0, '.', '') . "</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Win: </font></b>" . number_format((float)$wins, 2, '.', '') . "%</th>";
echo "<th class=tg1><b>" . $hcolor . "Top 10: </font></b>" . number_format((float)$top10, 2, '.', '') . "%</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Kills: </font></b>" . number_format($kills) . "</th>";
echo "<th class=tg1><b>" . $hcolor . "Dmg: </font></b>" . number_format($damage) . "</th></tr>";
?>
