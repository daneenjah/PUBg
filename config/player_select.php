<?php
// load config json
$config = file_get_contents('config.json');

// decode json to associative array
$json_arr2 = json_decode($config, true);

$players = $json_arr2[0]['Amount'];

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
if ($players == "") {
  $selected1 = " selected=selected";
} elseif ($players == 1) {
  $selected1 = " selected=selected";
} elseif ($players == 2) {
  $selected2 = " selected=selected";
} elseif ($players == 3) {
  $selected3 = " selected=selected";
} elseif ($players == 4) {
  $selected4 = " selected=selected";
} elseif ($players == 5) {
  $selected5 = " selected=selected";
} elseif ($players == 6) {
  $selected6 = " selected=selected";
} elseif ($players == 7) {
  $selected7 = " selected=selected";
} elseif ($players == 8) {
  $selected8 = " selected=selected";
} elseif ($players == 9) {
  $selected9 = " selected=selected";
} elseif ($players == 10) {
  $selected10 = " selected=selected";
}

?>
