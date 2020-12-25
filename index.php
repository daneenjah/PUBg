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

//set variable to prevent errors
$fppselected = "";
$tppselected = "";

//pull mode, tpp, and season from the form
if (isset($_POST['mode'])) {
    $mode = $_POST['mode'];
} else {
    $mode = "squad";
}

if (isset($_POST['tpp'])) {
    $tpp = $_POST['tpp'];
} else {
    $tpp = "false";
}

if (isset($_POST['season'])) {
    $season = $_POST['season'];
} else {
    $season = "";
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

//an array to be called by the update button
if(array_key_exists('submitall', $_POST)) {
  submitall();
}
//function to run update all stats
function submitall() {
  $season = $_POST['season'];//pull the season from the form
  shell_exec('php pull_all.php '.$season.'');
}

?>
<form method="post" action="index.php" name="update">
   <table class="tg2">
   <thead>
     <tr>
       <th class="tg2" colspan="1">
         <select name="tpp" id="tpp" onchange="update.submit()" class="select">
           <option value=false <?php echo $fppselected;?>>FPP</option>
           <option value=true <?php echo $tppselected;?>>TPP</option>
        </select>
       </th>
       <th class="tg2" colspan="2">
         <input type="hidden" id="mode" name="mode" value = <?php echo $mode; ?> >
<?php
include('season_select.php')
?>
            <select name="season" id="season" onchange="update.submit()" class="select">
                <option value=<?php echo $season1; echo $selected1;?>>Current Season</option>
                <option value=<?php echo $season2; echo $selected2;?>>Previous Season</option>
                <option value=<?php echo $season3; echo $selected3;?>>Previous Season 1</option>
                <option value=<?php echo $season4; echo $selected4;?>>Previous Season 2</option>
                <option value=<?php echo $season5; echo $selected5;?>>Previous Season 3</option>
                <option value=<?php echo $season6; echo $selected6;?>>Previous Season 4</option>
                <option value=<?php echo $season7; echo $selected7;?>>Previous Season 5</option>
                <option value=<?php echo $season8; echo $selected8;?>>Previous Season 6</option>
                <option value=<?php echo $season9; echo $selected9;?>>Previous Season 7</option>
                <option value=<?php echo $season10; echo $selected10;?>>Previous Season 8</option>
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

<form method=post>
  <input type=hidden name=season value=<?php echo  $season ?> />
  <input type=submit name=submitall class=button value="Update All">
</form>

<table>
  <tr>
    <?php
    include('config/config.php'); //include the config file for user information
    include('players.php')
    ?>
    </tr>
</table>

<?php
$squads = "no";

if ($mode == "squad") {
  $squads = "yes";
} elseif ($mode == "squad-fpp"){
  $squads = "yes";
}

if ($squads == "yes") {
  echo "<table class=tg>";
  echo "\n";
  echo "  <tr>";
  echo "\n";
  echo "    <td class=tg1 colspan=2>";
  echo "\n";
  echo "     <center>";
  echo "\n";
  echo "      <b>Squads Overall</b>";
  echo "\n";
  echo "     </center>";
  echo "\n";
  echo "    </td>";
  echo "\n";
  echo "   </tr>";
  echo "\n";
  echo "\n";
  include 'overall.php';//pull the overall stats script
}
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
