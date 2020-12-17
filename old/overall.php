<?php
$lines1 = file($myFile1);//file in to an array
$lines2 = file($myFile2);
$lines3 = file($myFile3);
$lines4 = file($myFile4);
$lines5 = file($myFile5);

$tmatches1 = $lines1[14] - $lines1[23];//subtract matches won from total matches
$tmatches2 = $lines2[14] - $lines2[23];
$tmatches3 = $lines3[14] - $lines3[23];
$tmatches4 = $lines4[14] - $lines4[23];
$tmatches5 = $lines5[14] - $lines5[23];

$tmatches = ($tmatches1 + $tmatches2 + $tmatches3 + $tmatches4 + $tmatches5) / 5;

$kdr1 = $lines1[6] / $tmatches;//get the kdr from kills divided by $tmatches
$kdr2 = $lines2[6] / $tmatches;
$kdr3 = $lines3[6] / $tmatches;
$kdr4 = $lines4[6] / $tmatches;
$kdr5 = $lines5[6] / $tmatches;

$kdr = ($kdr1 + $kdr2 + $kdr3 + $kdr4 + $kdr5) / 5;//get the average

$k1 = $lines1[6];//get the kills
$k2 = $lines2[6];
$k3 = $lines3[6];
$k4 = $lines4[6];
$k5 = $lines5[6];

$kills = ($k1 + $k2 + $k3 + $k4 + $k5);//get the average

$d1 = $lines1[3];//get the kills
$d2 = $lines2[3];
$d3 = $lines3[3];
$d4 = $lines4[3];
$d5 = $lines5[3];

$damage = ($d1 + $d2 + $d3 + $d4 + $kd);//get the average

$adr1 = $lines1[3] / $lines1[14];//damage dealt divided by matches
$adr2 = $lines2[3] / $lines2[14];
$adr3 = $lines3[3] / $lines3[14];
$adr4 = $lines4[3] / $lines4[14];
$adr5 = $lines5[3] / $lines5[14];

$adr = ($adr1 + $adr2 + $adr3 + $adr4 + $adr5) / 5;//get the average

$win1 = $lines1[23] / $lines1[14] * 100;//wins devided by matches
$win2 = $lines2[23] / $lines2[14] * 100;
$win3 = $lines3[23] / $lines3[14] * 100;
$win4 = $lines4[23] / $lines4[14] * 100;
$win5 = $lines5[23] / $lines5[14] * 100;

$win = ($win1 + $win2 + $win3 + $win4 + $win5) / 5;//get the average

$top1 = $lines1[19] / $lines1[14] * 100;//get the top 10 percentage
$top2 = $lines2[19] / $lines2[14] * 100;
$top3 = $lines3[19] / $lines3[14] * 100;
$top4 = $lines4[19] / $lines4[14] * 100;
$top5 = $lines5[19] / $lines5[14] * 100;

$top10 = ($top1 + $top2 + $top3 + $top4 + $top5) / 5;//get the average

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
