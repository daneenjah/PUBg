<!DOCTYPE html>

<?php
$name = $_GET['name'];//pull the name from the form
$tpp = $_POST['tpp'];//pull tpp from the form
$season = $_POST['season'];//pull the season from the form

// load up seasons data
$seasons = "data/seasons.txt";
$lines = file($seasons);//file in to an array

// remove any spaces from the season name
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

// set selected state for currently selected season
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

// set the selected variable based on tpp
if ($tpp == "false") {
  $fppselected = "selected=selected";
} elseif ($tpp == "false") {
  $fppselected = "selected=selected";
} elseif ($tpp == "false") {
  $fppselected = "selected=selected";
} elseif ($tpp == "true") {
  $tppselected = "selected=selected";
}

// check if the file exists to try and save some API calls
$myFile = "data/" . $name. "/". $name . "_" . $season . ".json";//specify the file
if (file_exists($myFile)) {
} else {
  shell_exec('php pull_seasonstats.php '.$name.' '.$season.'');
}

// an array to be called by the update button
if(array_key_exists('submit', $_POST)) {
  submit();
}
// function to run update stats
function submit() {
  $name = $_POST['name'];//pull the name from the form
  $season = $_POST['season'];//pull the season from the form
  shell_exec('php pull_seasonstats.php '.$name.' '.$season.'');
}
?>

<html>
<head>
  <title><?php echo $name ?> PUBg Stats</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<center>
  <form method="get" action="playerstats.php" target="_blank">
    <input type="text" name="name">&nbsp;<input type="submit" name="query" class="button" value="Search"/>   <input class="button" type="button" value="Close" onclick="self.close()">
  </form>
  <br />
  <table style="height:70px">
<tr colspan="2">
  <td colspan="2">
    <center>
    <font color="#dedede" size="5"><b>
      <?php
      $myFile = "data/" . $name. "/". $name . "_" . $season . ".json";//specify the file
      if (file_exists($myFile)) {
      echo $name;
    } else {
      echo $name . " Not Found";
    }
      ?>
    </b></font>
<br /><br />
    </center>
  </td>
</tr>
    <tr>
  <?php
      $myFile = "data/" . $name. "/". $name . "_" . $season . ".json";//specify the file
      if (file_exists($myFile)) {
        include 'links.php';
      }
  ?>
</table>
<br />
   <table class="tg2">
   <thead>
     <tr>
       <th class="tg2" colspan="1">
         <form method="post" name="update" action="playerstats.php?name=<?php echo $name; ?>">
        <input type="hidden" id="mode" name="mode" value = <?php echo $mode; ?> >
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
        </form>
       </th>
      <th class="tg2" colspan="2">
       <form method="post">
         <input type="hidden" name="name" value="<?php echo $name; ?>" />
         <input type="hidden" name="season" value="<?php echo $season; ?>" />
         <input type="submit" name="submit" class="button" value="Update"/></form>
      </th>
     </tr>
   </thead>
   </table>
<table>
  <tr>
    <td>
  <table class="tg" style="width:250px">


<?php
// check if tpp is selected and change mode
if ($tpp == "") {
  $mode = "solo-fpp";
} elseif ($tpp == "true") {
  $mode = "solo";
} elseif ($tpp == "false") {
  $mode = "solo-fpp";
}

      $myFile = "data/" . $name. "/". $name . "_" . $season . ".json";//specify the file
      if (file_exists($myFile)) {
        echo "<tr><td class=tg1 colspan=2><center><b><font color=#914B16>Solos</font></b></center></td></tr>";
        include 'stats.php';//pull the stats script
      }
?>

</table>
  </td>
  <td>

    <table class="tg">

<?php
// check if tpp is selected and change mode
if ($tpp == "") {
  $mode = "duo-fpp";
} elseif ($tpp == "true") {
  $mode = "duo";
} elseif ($tpp == "false") {
  $mode = "duo-fpp";
}

        $myFile = "data/" . $name. "/". $name . "_" . $season . ".json";//specify the file
        if (file_exists($myFile)) {
          echo "<tr><td class=tg1 colspan=2><center><b><font color=#368480>Duos</font></b></center></td></tr>";
          include 'stats.php';//pull the stats script
        }
?>

</table>

  </td>
  <td>

      <table class="tg">

<?php
// check if tpp is selected and change mode
if ($tpp == "") {
  $mode = "squad-fpp";
} elseif ($tpp == "true") {
  $mode = "squad";
} elseif ($tpp == "false") {
  $mode = "squad-fpp";
}
            $myFile = "data/" . $name. "/". $name . "_" . $season . ".json";//specify the file
            if (file_exists($myFile)) {
              echo "<tr><td class=tg1 colspan=2><center><b><font color=#48447C>Squads</font></b></center></td></tr>";
              include 'stats.php';//pull the stats script
            }
?>

</table>
</td></tr>
</table>
</center>
</body>
</html>
