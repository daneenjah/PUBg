<?php
//load up seasons data
$seasons = "data/seasons.txt";
$lines = file($seasons);//file in to an array

//set selected state for currently selected season
$season1 = preg_replace('/\s+/', '', $lines[0]);
$season2 = preg_replace('/\s+/', '', $lines[1]);
$season3 = preg_replace('/\s+/', '', $lines[2]);
$season4 = preg_replace('/\s+/', '', $lines[3]);
$season5 = preg_replace('/\s+/', '', $lines[4]);
$season6 = preg_replace('/\s+/', '', $lines[5]);
$season7 = preg_replace('/\s+/', '', $lines[6]);
$season8 = preg_replace('/\s+/', '', $lines[7]);
$season9 = preg_replace('/\s+/', '', $lines[8]);
$season10 = preg_replace('/\s+/', '', $lines[9]);

//set our variable to blanks to prevent error
$selected1 = "";
$selected2 = "";
$selected3 = "";
$selected4 = "";
$selected5 = "";
$selected6 = "";
$selected7 = "";
$selected8 = "";
$selected9 = "";
$selected10 = "";

//set out selected state for currently selected season
if ($season == "") {
    $season = $season1;
} elseif ($season == $season1) {
    $selected1 = " selected=selected";
} elseif ($season == $season2) {
    $selected2 = " selected=selected";
} elseif ($season == $season3) {
    $selected3 = " selected=selected";
} elseif ($season == $season4) {
    $selected4 = " selected=selected";
} elseif ($season == $season5) {
    $selected5 = " selected=selected";
} elseif ($season == $season6) {
    $selected6 = " selected=selected";
} elseif ($season == $season7) {
    $selected7 = " selected=selected";
} elseif ($season == $season8) {
    $selected8 = " selected=selected";
} elseif ($season == $season9) {
    $selected9 = " selected=selected";
} elseif ($season == $season10) {
    $selected10 = " selected=selected";
}
?>
