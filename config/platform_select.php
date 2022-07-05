<?php
// load config json
$config = file_get_contents('config.json');

// decode json to associative array
$json_arr2 = json_decode($config, true);

$platform = $json_arr2[1]['Amount'];

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
if ($platform == "") {
  $selected1 = " selected=selected";
} elseif ($platform == stadia) {
  $selected1 = " selected=selected";
} elseif ($platform == stadia) {
  $selected2 = " selected=selected";
} elseif ($platform == steam) {
  $selected3 = " selected=selected";
} elseif ($platform == tournament) {
  $selected4 = " selected=selected";
} elseif ($platform == psn) {
  $selected5 = " selected=selected";
} elseif ($platform == xbox) {
  $selected6 = " selected=selected";
}

?>
