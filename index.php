<!DOCTYPE html>
<html>
<head>
  <title>Clapp'in Cheeks PUBg Stats</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
  <center>
    <form method="get" action="playerstats.php" target ="_blank">
      <input type="text" name="name">&nbsp;<input type="submit" name="query" class="button" value="Search"/>
    </form>
<br />
<?php
$mode = $_POST['mode'];//pull the mode from the form
$tpp = $_POST['tpp'];//pull tpp from the form
$season = $_POST['season'];//pull the season from the form

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

//set out selected state for currently selected season
if ($season == "") {
  $season = $season1;
} elseif ($season == $season1) {
  $selected1 = "selected=selected";
} elseif ($season == $season2) {
  $selected2 = "selected=selected";
} elseif ($season == $season3) {
  $selected3 = "selected=selected";
} elseif ($season == $season4) {
  $selected4 = "selected=selected";
} elseif ($season == $season5) {
  $selected5 = "selected=selected";
} elseif ($season == $season6) {
  $selected6 = "selected=selected";
} elseif ($season == $season7) {
  $selected7 = "selected=selected";
} elseif ($season == $season8) {
  $selected8 = "selected=selected";
} elseif ($season == $season9) {
  $selected9 = "selected=selected";
} elseif ($season == $season10) {
  $selected10 = "selected=selected";
}

//if tpp isn't selected, append mode with -fpp and set the selected variable
if (($tpp == "false") && ($mode == "squad")) {
  $mode = "squad-fpp";
  $fppselected = "selected=selected";
} elseif (($tpp == "false") && ($mode == "duo")) {
  $mode = "duo-fpp";
  $fppselected = "selected=selected";
} elseif (($tpp == "false") && ($mode == "solo")) {
  $mode = "solo-fpp";
  $fppselected = "selected=selected";
} elseif ($tpp == "true") {
  $tppselected = "selected=selected";
}

//if tpp is selected, change mode to reflect
if (($tpp == "true") && ($mode == "squad-fpp")) {
  $mode = "squad";
  $tppselected = "selected=selected";
} elseif (($tpp == "true") && ($mode == "duo-fpp")) {
  $mode = "duo";
  $tppselected = "selected=selected";
} elseif (($tpp == "true") && ($mode == "solo-fpp")) {
  $mode = "solo";
  $tppselected = "selected=selected";
}

//set default mode to squad-fpp for first load
if ($mode == "") {
  $mode = "squad-fpp";
}

//an array to be called by the update button
if(array_key_exists('submit', $_POST)) {
  submit();
}
//function to run update stats
function submit() {
  $name = $_POST['name'];//pull the name from the form
  $season = $_POST['season'];//pull the season from the form
  shell_exec('php pull_seasonstats.php '.$name.' '.$season.'');
}

?>

<form method="post" action="index.php" name="update">
   <table class="tg2">
   <thead>
     <tr>
       <th class="tg2" colspan="1">
         <select name="tpp" id="tpp" onchange="update.submit()" class="select">
           <option value = false <?php echo $fppselected; ?>>FPP</option>
           <option value = true <?php echo $tppselected; ?>>TPP</option>
        </select>
       </th>
       <th class="tg2" colspan="2">
         <input type="hidden" id="mode" name="mode" value = <?php echo $mode; ?> >
         <select name="season" id="season" onchange="update.submit()" class="select">
           <option value = <?php echo $season1; ?> <?php echo $selected1; ?>>Current Season</option>
           <option value = <?php echo $season2; ?> <?php echo $selected2; ?>>Previous Season</option>
           <option value = <?php echo $season3; ?> <?php echo $selected3; ?>>Previous Season 1</option>
           <option value = <?php echo $season4; ?> <?php echo $selected4; ?>>Previous Season 2</option>
           <option value = <?php echo $season5; ?> <?php echo $selected5; ?>>Previous Season 3</option>
           <option value = <?php echo $season6; ?> <?php echo $selected6; ?>>Previous Season 4</option>
           <option value = <?php echo $season7; ?> <?php echo $selected7; ?>>Previous Season 5</option>
           <option value = <?php echo $season8; ?> <?php echo $selected8; ?>>Previous Season 6</option>
           <option value = <?php echo $season9; ?> <?php echo $selected9; ?>>Previous Season 7</option>
           <option value = <?php echo $season10; ?> <?php echo $selected10; ?>>Previous Season 8</option>
        </select>
       </th>
     </tr>
     <tr>
       <th class="tg2">
         <button type="submit" name="mode" class="button" value="solo"/>Solos</button>
       </th>
       <th class="tg2">
         <button type="submit" name="mode" class="button" value="duo"/>Duos</button>
       </th>
       <th class="tg2">
         <button type="submit" name="mode" class="button" value="squad"/>Squads</button>
       </th>
     </tr>
   </thead>
   </table>
</form>
<br />

<table>
  <tr>
    <?php
    include('config/config.php'); //include the config file for user information
    include('players.php')
    ?>
    </tr>
</table>

          <table class="tg">
              <tr>
                <td class="tg1" colspan="2">
                  <center>
                      <b>Squads Overall</b>
                  </center>
                </td>
              </tr>

<?php
include 'overall.php';//pull the overall stats script
?>

</table>

<font size="2" color="#545454">
<?php
include 'counter.php';//pull the counter script
?>
</font>

</center>
</body>
</html>
