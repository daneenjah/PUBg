<?php
$lines1 = file_get_contents($myFile1);
$data1 = json_decode($lines1, true);

$lines2 = file_get_contents($myFile2);
$data2 = json_decode($lines2, true);

$lines3 = file_get_contents($myFile3);
$data3 = json_decode($lines3, true);

$lines4 = file_get_contents($myFile4);
$data4 = json_decode($lines4, true);

$lines5 = file_get_contents($myFile5);
$data5 = json_decode($lines5, true);

//pull all the information from the arrays
$damageDealt1 = $data1["data"]["attributes"]["gameModeStats"]["squad-fpp"]["damageDealt"];
$kills1 = $data1["data"]["attributes"]["gameModeStats"]["squad-fpp"]["kills"];
$losses1 = $data1["data"]["attributes"]["gameModeStats"]["squad-fpp"]["losses"];
$roundsPlayed1 = $data1["data"]["attributes"]["gameModeStats"]["squad-fpp"]["roundsPlayed"];
$top10s1 = $data1["data"]["attributes"]["gameModeStats"]["squad-fpp"]["top10s"];
$wins1 = $data1["data"]["attributes"]["gameModeStats"]["squad-fpp"]["wins"];

$damageDealt2 = $data2["data"]["attributes"]["gameModeStats"]["squad-fpp"]["damageDealt"];
$kills2 = $data2["data"]["attributes"]["gameModeStats"]["squad-fpp"]["kills"];
$losses2 = $data2["data"]["attributes"]["gameModeStats"]["squad-fpp"]["losses"];
$roundsPlayed2 = $data2["data"]["attributes"]["gameModeStats"]["squad-fpp"]["roundsPlayed"];
$top10s2 = $data2["data"]["attributes"]["gameModeStats"]["squad-fpp"]["top10s"];
$wins2 = $data2["data"]["attributes"]["gameModeStats"]["squad-fpp"]["wins"];

$damageDealt3 = $data3["data"]["attributes"]["gameModeStats"]["squad-fpp"]["damageDealt"];
$kills3 = $data3["data"]["attributes"]["gameModeStats"]["squad-fpp"]["kills"];
$losses3 = $data3["data"]["attributes"]["gameModeStats"]["squad-fpp"]["losses"];
$roundsPlayed3 = $data3["data"]["attributes"]["gameModeStats"]["squad-fpp"]["roundsPlayed"];
$top10s3 = $data3["data"]["attributes"]["gameModeStats"]["squad-fpp"]["top10s"];
$wins3 = $data3["data"]["attributes"]["gameModeStats"]["squad-fpp"]["wins"];

$damageDealt4 = $data4["data"]["attributes"]["gameModeStats"]["squad-fpp"]["damageDealt"];
$kills4 = $data4["data"]["attributes"]["gameModeStats"]["squad-fpp"]["kills"];
$losses4 = $data4["data"]["attributes"]["gameModeStats"]["squad-fpp"]["losses"];
$roundsPlayed4 = $data4["data"]["attributes"]["gameModeStats"]["squad-fpp"]["roundsPlayed"];
$top10s4 = $data4["data"]["attributes"]["gameModeStats"]["squad-fpp"]["top10s"];
$wins4 = $data4["data"]["attributes"]["gameModeStats"]["squad-fpp"]["wins"];

$damageDealt5 = $data5["data"]["attributes"]["gameModeStats"]["squad-fpp"]["damageDealt"];
$kills5 = $data5["data"]["attributes"]["gameModeStats"]["squad-fpp"]["kills"];
$losses5 = $data5["data"]["attributes"]["gameModeStats"]["squad-fpp"]["losses"];
$roundsPlayed5 = $data5["data"]["attributes"]["gameModeStats"]["squad-fpp"]["roundsPlayed"];
$top10s5 = $data5["data"]["attributes"]["gameModeStats"]["squad-fpp"]["top10s"];
$wins5 = $data5["data"]["attributes"]["gameModeStats"]["squad-fpp"]["wins"];

$tmatches1 = $roundsPlayed1 - $wins1;//subtract matches won from total matches
$tmatches2 = $roundsPlayed2 - $wins2;
$tmatches3 = $roundsPlayed3 - $wins3;
$tmatches4 = $roundsPlayed4 - $wins4;
$tmatches5 = $roundsPlayed5 - $wins5;

$kdr1 = $kills1 / $tmatches1;//get the kdr from kills divided by $tmatches
$kdr2 = $kills2 / $tmatches2;
$kdr3 = $kills3 / $tmatches3;
$kdr4 = $kills4 / $tmatches4;
$kdr5 = $kills5 / $tmatches5;

$kdr = ($kdr1 + $kdr2 + $kdr3 + $kdr4 + $kdr5) / 5;//get the average

$kills = ($kills1 + $kills2 + $kills3 + $kills4 + $kills5);//get the average

$damage = ($damageDealt1 + $damageDealt2 + $damageDealt3 + $damageDealt4 + $damageDealt5);//get the average

$adr1 = $damageDealt1 / $roundsPlayed1;//damage dealt divided by matches
$adr2 = $damageDealt2 / $roundsPlayed2;
$adr3 = $damageDealt3 / $roundsPlayed3;
$adr4 = $damageDealt4 / $roundsPlayed4;
$adr5 = $damageDealt5 / $roundsPlayed5;

$adr = ($adr1 + $adr2 + $adr3 + $adr4 + $adr5) / 5;//get the average

$win1 = $wins1 / $roundsPlayed1 * 100;//wins devided by matches
$win2 = $wins2 / $roundsPlayed2 * 100;
$win3 = $wins3 / $roundsPlayed3 * 100;
$win4 = $wins4 / $roundsPlayed4 * 100;
$win5 = $wins5 / $roundsPlayed5 * 100;

$win = ($win1 + $win2 + $win3 + $win4 + $win5) / 5;//get the average

$top1 = $top10s1 / $roundsPlayed1;//get the top 10 percentage
$top2 = $top10s2 / $roundsPlayed2;
$top3 = $top10s3 / $roundsPlayed3;
$top4 = $top10s4 / $roundsPlayed4;
$top5 = $top10s5 / $roundsPlayed5;

$top10 = ($top1 + $top2 + $top3 + $top4 + $top5) * 100 / 5;//get the average

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

// set colors for different adr threshholds
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

echo "<tr><th class=tg1><b>" . $hcolor . "Win: </font></b>" . number_format((float)$win, 2, '.', '') . "%</th>";
echo "<th class=tg1><b>" . $hcolor . "Top 10: </font></b>" . number_format((float)$top10, 2, '.', '') . "%</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Kills: </font></b>" . number_format($kills) . "</th>";
echo "<th class=tg1><b>" . $hcolor . "Dmg: </font></b>" . number_format($damage) . "</th></tr>";
?>
