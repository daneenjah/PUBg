<?php
$lines = file($myFile);//file in to an array

$tmatches = $lines[14] - $lines[23];//subtract matches won from total matches

$kdr = $lines[6] / $tmatches;//get the kdr from kills divided by $tmatches

$adr = number_format($lines[3] / $lines[14]);//divide damage by matches for adr
$adrr = $lines[3] / $lines[14];//get adr as raw output for the colors to work correctly

$top10 = ($lines[19] / $lines[14]) * 100;//get the top 10 percentage

$avgsurvive =  (($lines[18] / 60) / 60) / $lines[14] * 60;//get our average survived time

$kda = ($lines[6] + $lines[0]) / $tmatches;//add our kills and assists, then divide by $tmatches for our KDA

$heals = $lines[5] / $lines[14];//make heals an average per match

$boosts = $lines[1] / $lines[14];//make boosts an average per match

$headshotr = $lines[6] - $lines[4];//subtract our headshot kills from overall kills
$headshot = 100 - ($headshotr / $lines[6] * 100);//make headshots a percentage

$hcolor = "<font color=#48447C>";//set the color of the title text

// set colors for different kdr threshholds
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

// set colors for different adr threshholds
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

// if the mode isn't set, lets set it to fpp squad
if ($mode == "") {
$mode = "squad";
}

echo "<tr><th class=tg1 colspan=2><center><font color=545454 size=2><b>Updated: " . $lines[146] . "EST</b></font></center></th>";

if ($mode == "squad") {
// echo all the things, html for tables and some number formating to make things cleaner.

echo "<tr><th class=tg1><center><font color=" . $kdrc . " size=4><b>KDR: </b>" . number_format((float)$kdr, 2, '.', '') . "</font></center></th>";
echo "<th class=tg1><center><font color=" . $adrc . " size=4><b>ADR: </b>" . $adr . "</font></center></th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Win %: </font></b>" . number_format(($lines[23] / $lines[14]) * 100) . "%</th>";
echo "<th class=tg1><b>" . $hcolor . "Top 10 %: </font></b>" . number_format((float)$top10, 2, '.', '') . "%</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Lng Kill: </font></b>" . number_format((float)$lines[7], 0, '.', '') . "m</th>";
echo "<th class=tg1><b>" . $hcolor . "Heads: </font></b>". number_format((float)$headshot, 1, '.', '') . "%</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Top 10s: </font></b>" . $lines[19] . "</th>";
echo "<th class=tg1><b>" . $hcolor . "Avg Svd: </font></b>" . number_format((float)$avgsurvive, 1, '.', '') . "m</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Most Kills: </font></b>" . $lines[13] . "</th>";
echo "<th class=tg1><b>" . $hcolor . "KDA: </font></b>" . number_format((float)$kda, 2, '.', '') . "</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Assists: </font></b>" . $lines[0] . "</th>";
echo "<th class=tg1><b>" . $hcolor . "Wins: </font></b>" . $lines[23] . "</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Dmg: </font></b>" . number_format($lines[3]) . "</th>";
echo "<th class=tg1><b>" . $hcolor . "Kills: </font></b>" . $lines[6] . "</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Heals: </font></b>" . number_format((float)$heals, 2, '.', '') . "</th>";
echo "<th class=tg1><b>" . $hcolor . "Boosts: </font></b>" . number_format((float)$boosts, 2, '.', '') . "</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "dBNOs: </font></b>" . $lines[2] . "</th>";
echo "<th class=tg1><b>" . $hcolor . "Lng Svd: </font></b>" . number_format((float)($lines[8] / 60), 1, '.', '') . "m</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Losses: </font></b>" . $lines[9] . "</th>";
echo "<th class=tg1><b>" . $hcolor . "Matches: </font></b>" . $lines[14] . "</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Time Alive: </font></b>" . number_format(($lines[18] / 60) / 60) . "h</th>";
echo "<th class=tg1><b>" . $hcolor . "Wpn Aqd: </font></b>" . number_format($lines[22]) . "</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Killstreak: </font></b>" . $lines[10] . "</th>";
echo "<th class=tg1><b>" . $hcolor . "Team Kills: </font></b>" . $lines[17] . "</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Revives: </font></b>" . $lines[11] . "</th>";
echo "<th class=tg1><b>" . $hcolor . "Suicides: </font></b>" . $lines[15] . "</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Swam: </font></b>" . number_format($lines[16]) . "m</th>";
echo "<th class=tg1><b>" . $hcolor . "Cars Dstrd: </font></b>" . $lines[20] . "</th></tr>";

echo "<tr><th class=tg1><b>" . $hcolor . "Ride: </font></b>" . number_format($lines[12] / 1000) . "km</th>";
echo "<th class=tg1><b>" . $hcolor . "Walk: </font></b>" . number_format($lines[21] / 1000) . "km</th></tr>";

// call the fpp duo stats
} elseif ($mode == "duo") {

  $tmatches = $lines[38] - $lines[47];//subtract matches won from total matches

  $kdr = $lines[30] / $tmatches;//get the kdr from kills divided by $tmatches

  $adr = number_format($lines[27] / $lines[38]);//divide damage by matches for adr

  $top10r = $lines[38] - $lines[43];//subtract top 10 fom matches
  $top10 = ($top10r / $lines[38]) * 100;//get the top 10 percentage

  $avgsurvive =  (($lines[42] / 60) / 60) / $lines[38] * 60;//get our average survived time

  $kda = ($lines[30] + $lines[24]) / $tmatches;//add our kills and assists, then divide by $tmatches for our KDA

  $heals = $lines[29] / $lines[38];//make heals an average per match

  $boosts = $lines[25] / $lines[38];//make boosts an average per match

  $headshotr = $lines[30] - $lines[28];//subtract our headshot kills from overall kills
  $headshot = 100 - ($headshotr / $lines[30] * 100);//make headshots a percentage

  $hcolor = "<font color=#368480>";//set the color of the title text

  // set colors for different kdr threshholds
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

// echo all the things, html for tables and some number formating to make things cleaner.
  echo "<tr><th class=tg1><center><font color=" . $kdrc . " size=4><b>KDR: </b>" . number_format((float)$kdr, 2, '.', '') . "</font></center></th>";
  echo "<th class=tg1><center><font color=" . $adrc . " size=4><b>ADR: </b>" . $adr . "</font></center></th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Win %: </font></b>" . number_format(($lines[47] / $lines[38]) * 100) . "%</th>";
  echo "<th class=tg1><b>" . $hcolor . "Top 10 %: </font></b>" . number_format((float)$top10, 2, '.', '') . "%</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Lng Kill: </font></b>" . number_format((float)$lines[31], 0, '.', '') . "m</th>";
  echo "<th class=tg1><b>" . $hcolor . "Heads: </font></b>". number_format((float)$headshot, 1, '.', '') . "%</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Top 10s: </font></b>" . $lines[43] . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Avg Svd: </font></b>" . number_format((float)$avgsurvive, 1, '.', '') . "m</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Most Kills: </font></b>" . $lines[37] . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "KDA: </font></b>" . number_format((float)$kda, 2, '.', '') . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Assists: </font></b>" . $lines[24] . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Wins: </font></b>" . $lines[47] . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Dmg: </font></b>" . number_format($lines[27]) . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Kills: </font></b>" . $lines[30] . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Heals: </font></b>" . number_format((float)$heals, 2, '.', '') . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Boosts: </font></b>" . number_format((float)$boosts, 2, '.', '') . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "dBNOs: </font></b>" . $lines[26] . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Lng Svd: </font></b>" . number_format((float)($lines[32] / 60), 1, '.', '') . "m</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Losses: </font></b>" . $lines[33] . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Matches: </font></b>" . $lines[38] . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Time Alive: </font></b>" . number_format(($lines[42] / 60) / 60) . "h</th>";
  echo "<th class=tg1><b>" . $hcolor . "Wpn Aqd: </font></b>" . number_format($lines[46]) . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Killstreak: </font></b>" . $lines[34] . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Team Kills: </font></b>" . $lines[41] . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Revives: </font></b>" . $lines[35] . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Suicides: </font></b>" . $lines[39] . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Swam: </font></b>" . number_format($lines[40]) . "m</th>";
  echo "<th class=tg1><b>" . $hcolor . "Cars Dstrd: </font></b>" . $lines[44] . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Ride: </font></b>" . number_format($lines[36] / 1000) . "km</th>";
  echo "<th class=tg1><b>" . $hcolor . "Walk: </font></b>" . number_format($lines[45] / 1000) . "km</th></tr>";

// call the fpp solo stats
} elseif ($mode == "solo") {

  $tmatches = $lines[62] - $lines[71];//subtract matches won from total matches

  $kdr = $lines[54] / $tmatches;//get the kdr from kills divided by $tmatches

  $adr = number_format($lines[51] / $lines[62]);//divide damage by matches for adr

  $top10r = $lines[62] - $lines[67];//subtract top 10 fom matches
  $top10 = ($top10r / $lines[62]) * 100;//get the top 10 percentage

  $avgsurvive =  (($lines[66] / 60) / 60) / $lines[62] * 60;//get our average survived time

  $kda = ($lines[54] + $lines[48]) / $tmatches;//add our kills and assists, then divide by $tmatches for our KDA

  $heals = $lines[53] / $lines[62];//make heals an average per match

  $boosts = $lines[49] / $lines[62];//make boosts an average per match

  $headshotr = $lines[54] - $lines[52];//subtract our headshot kills from overall kills
  $headshot = 100 - ($headshotr / $lines[54] * 100);//make headshots a percentage

  $hcolor = "<font color=#914B16>";//set the color of the title text

  // set colors for different kdr threshholds
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

// echo all the things, html for tables and some number formating to make things cleaner.
  echo "<tr><th class=tg1><center><font color=" . $kdrc . " size=4><b>KDR: </b>" . number_format((float)$kdr, 2, '.', '') . "</font></center></th>";
  echo "<th class=tg1><center><font color=" . $adrc . " size=4><b>ADR: </b>" . $adr . "</font></center></th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Win %: </font></b>" . number_format(($lines[71] / $lines[62]) * 100) . "%</th>";
  echo "<th class=tg1><b>" . $hcolor . "Top 10 %: </font></b>" . number_format((float)$top10, 2, '.', '') . "%</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Lng Kill: </font></b>" . number_format((float)$lines[55], 0, '.', '') . "m</th>";
  echo "<th class=tg1><b>" . $hcolor . "Heads: </font></b>". number_format((float)$headshot, 1, '.', '') . "%</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Top 10s: </font></b>" . $lines[67] . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Avg Svd: </font></b>" . number_format((float)$avgsurvive, 1, '.', '') . "m</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Most Kills: </font></b>" . $lines[61] . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "KDA: </font></b>" . number_format((float)$kda, 2, '.', '') . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Assists: </font></b>" . $lines[48] . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Wins: </font></b>" . $lines[71] . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Dmg: </font></b>" . number_format($lines[51]) . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Kills: </font></b>" . $lines[30] . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Heals: </font></b>" . number_format((float)$heals, 2, '.', '') . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Boosts: </font></b>" . number_format((float)$boosts, 2, '.', '') . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "dBNOs: </font></b>" . $lines[26] . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Lng Svd: </font></b>" . number_format((float)($lines[56] / 60), 1, '.', '') . "m</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Losses: </font></b>" . $lines[57] . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Matches: </font></b>" . $lines[62] . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Time Alive: </font></b>" . number_format(($lines[66] / 60) / 60) . "h</th>";
  echo "<th class=tg1><b>" . $hcolor . "Wpn Aqd: </font></b>" . number_format($lines[70]) . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Killstreak: </font></b>" . $lines[58] . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Team Kills: </font></b>" . $lines[65] . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Revives: </font></b>" . $lines[59] . "</th>";
  echo "<th class=tg1><b>" . $hcolor . "Suicides: </font></b>" . $lines[63] . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Swam: </font></b>" . number_format($lines[64]) . "m</th>";
  echo "<th class=tg1><b>" . $hcolor . "Cars Dstrd: </font></b>" . $lines[68] . "</th></tr>";

  echo "<tr><th class=tg1><b>" . $hcolor . "Ride: </font></b>" . number_format($lines[60] / 1000) . "km</th>";
  echo "<th class=tg1><b>" . $hcolor . "Walk: </font></b>" . number_format($lines[69] / 1000) . "km</th></tr>";
}
?>
