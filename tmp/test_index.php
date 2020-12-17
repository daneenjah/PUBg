<!DOCTYPE html>
<html>
<head>
  <title>Clapp'in Cheeks PUBg Stats</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<br />
  <center>
    <form method="get" action="playertest.php" target ="_blank">
      <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
      <input type="text" name="name">&nbsp;<input type="submit" name="query" class="button" value="Search"/>
    </form>
<br />
      <table class="tg2">
      <thead>
        <tr>
          <th class="tg2">
            <form method="post" action="index.php">
              <input type="hidden" name="mode" value="solo" />
              <input type="submit" name="query" class="button" value="Solos"/>
            </form>
          </th>
          <th class="tg2">
            <form method="post" action="index.php">
              <input type="hidden" name="mode" value="duo" />
              <input type="submit" name="query" class="button" value="Duos"/>
            </form>
          </th>

          <th class="tg2">
            <form method="post" action="index.php">
              <input type="hidden" name="mode" value="squad" />
              <input type="submit" name="query" class="button" value="Squads"/>
            </form>
          </th>
        </tr>
      </thead>
      </table>
<br />
<table>
  <tr>
    <td>
  <table class="tg" style="width:250px">
      <tr>
        <td class="tg2" colspan="2">
          <center>
            <div class="row">
 <div class="column">
   <a href="playertest.php?name=Acer803" target="_blank"><img width="70" height="70" src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/02/02503da2acf7b353223f18c63790f57829e82dde_full.jpg"></a><br />
 </div>
 <div class="column">
   <b><font size="4">Acer803</font></b>
   <br /><br />
   <form method="post">
      <input type="submit" name="acer" class="button" value="Update"/></form>
 </div>
</div>
          </center>
        </td>
      </tr>

<?php
$mode = $_POST['mode'];
$myFile = "data/Acer803_stats.txt";//specify the file
include 'links.php';
include 'test.php';//pull the stats script

// an array to be called by the button that will run pull.py and refresh the page
    if(array_key_exists('acer', $_POST)) {
        acer();
    }
    function acer() {
        $command = 'python3 pull.py Acer803';
        exec($command, $out, $status);
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>

</table>

  <td>
  <table class="tg" style="width:250px">
    <tr>
      <td class="tg2" colspan="2">
        <center>
          <div class="row">
<div class="column">
 <a href="playertest.php?name=BigHomie" target="_blank"><img width="70" height="70" src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/57/57da248e3c693120e8da3e2dc442bd362e940a4f_full.jpg"></a><br />
</div>
<div class="column">
 <b><font size="4">BigHomie</font></b>
 <br /><br />
 <form method="post">
    <input type="submit" name="bighomie" class="button" value="Update"/></form>
</div>
</div>
        </center>
      </td>
    </tr>

<?php
$myFile = "data/BigHomie_stats.txt";//specify the file
include 'links.php';
include 'test.php';//pull the stats script

// an array to be called by the button that will run pull.py and refresh the page
    if(array_key_exists('bighomie', $_POST)) {
        bighomie();
    }
    function bighomie() {
        $command = 'python3 pull.py BigHomie';
        exec($command, $out, $status);
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>

</table>

<td>
  <table class="tg" style="width:250px">
  <tr>
    <td class="tg2" colspan="2">
      <center>
        <div class="row">
<div class="column">
<a href="playertest.php?name=DaNeenjah" target="_blank"><img width="70" height="70" src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/07/07a7bbabb17a94f3bccd1d38d366448192b19b8b_full.jpg"></a><br />
</div>
<div class="column">
<b><font size="4">DaNeenjah</font></b>
<br /><br />
<form method="post">
  <input type="submit" name="daneenjah" class="button" value="Update"/></form>
</div>
</div>
      </center>
    </td>
  </tr>

<?php
$myFile = "data/DaNeenjah_stats.txt";//specify the file
include 'links.php';
include 'test.php';//pull the stats script

// an array to be called by the button that will run pull.py and refresh the page
    if(array_key_exists('daneenjah', $_POST)) {
        daneenjah();
    }
    function daneenjah() {
        $command = 'python3 pull.py DaNeenjah';
        exec($command, $out, $status);
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>

</table>
</td>
    <td>
  <table class="tg" style="width:250px">
      <tr>
        <td class="tg2" colspan="2">
          <center>
            <div class="row">
    <div class="column">
    <a href="playertest.php?name=ks-elo" target="_blank"><img width="70" height="70" src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg"></a><br />
    </div>
    <div class="column">
    <b><font size="4">ks-elo</font></b>
    <br /><br />
    <form method="post">
      <input type="submit" name="elo" class="button" value="Update"/>
    </form>
    </div>
    </div>
          </center>
        </td>
      </tr>

<?php
$myFile = "data/ks-elo_stats.txt";//specify the file
include 'links.php';
include 'test.php';//pull the stats script

// an array to be called by the button that will run pull.py and refresh the page
    if(array_key_exists('elo', $_POST)) {
        elo();
        echo "<meta http-equiv='refresh' content='0'>";
    }
    function elo() {
        $command = 'python3 pull.py ks-elo';
        exec($command, $out, $status);
    }
?>

</table>
  <td>
  <table class="tg" style="width:250px">
        <tr>
          <td class="tg2" colspan="2">
            <center>
              <div class="row">
      <div class="column">
      <a href="playertest.php?name=MeWinYouMad" target="_blank"><img width="70" height="70" src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/ea/ea4565822b69737ebbdf06dc3f4ee85da586ee24_full.jpg"></a><br />
      </div>
      <div class="column">
      <b><font size="3">MeWinYouMad</font></b>
      <br /><br />
      <form method="post">
        <input type="submit" name="mewin" class="button" value="Update"/>
      </form>
      </div>
      </div>
            </center>
          </td>
        </tr>

<?php
$myFile = "data/MeWinYouMad_stats.txt";//specify the file
include 'links.php';
include 'test.php';//pull the stats script

// an array to be called by the button that will run pull.py and refresh the page
    if(array_key_exists('mewin', $_POST)) {
        mewin();
    }
    function mewin() {
        $command = 'python3 pull.py MeWinYouMad';
        exec($command, $out, $status);
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>

</table>
</td></tr>
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
// specify all the data files for the 5 players average
$myFile1 = "data/DaNeenjah_stats.txt";//specify the file
$myFile2 = "data/BigHomie_stats.txt";//specify the file
$myFile3 = "data/Acer803_stats.txt";//specify the file
$myFile4 = "data/ks-elo_stats.txt";//specify the file
$myFile5 = "data/MeWinYouMad_stats.txt";//specify the file
include 'overall.php';//pull the stats script
?>

</table>
</center>
</body>
</html>
