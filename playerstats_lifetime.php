<?php

//set variable to prevent errors
$fppselected = "";
$tppselected = "";

//pull name, mode, tpp, and season from the form
if (isset($_GET['name'])) {
    $name = $_GET['name'];
} else {
    $name = "";
}

if (isset($_POST['mode'])) {
    $mode = $_POST['mode'];
} else {
    $mode = "squad-fpp";
}

if (isset($_POST['tpp'])) {
    $tpp = $_POST['tpp'];
} else {
    $tpp = "false";
}

//set the selected variable based on tpp
if ($tpp == "false") {
    $fppselected = "selected=selected";
} elseif ($tpp == "false") {
    $fppselected = "selected=selected";
} elseif ($tpp == "false") {
    $fppselected = "selected=selected";
} elseif ($tpp == "true") {
    $tppselected = "selected=selected";
}

//check if the file exists to try and save some API calls
$myFile = "data/" . $name. "/". $name . "_lifetime.json";//specify the file
if (file_exists($myFile)) {
} else {
   header("location: pull_lifestats.php?user=$name&page=playerstats_lifetime.php?name=$name",  true,  301 );
   exit;
}
?>
<html>
<head>
    <title><?php echo $name ?> Lifetime PUBg Stats</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<center>
<form method="get" action="playerstats_lifetime.php" target="_blank">
<input type="text" name="name">&nbsp;<input type="submit" name="submit" class="button" value="Search">   <input class="button" type="button" value="Close" onclick="self.close()">
</form>
<table style="height:70px">
<tr colspan="2">
<td colspan="2">
    <font color="#dedede" size="5"><b>
<?php
$myFile = "data/" . $name. "/". $name . "_lifetime.json";//specify the file
if (file_exists($myFile)) {
echo $name;
} else {
echo $name . " Not Found";
}
?>
</b></font>
<br>
</center>
    </td>
    </tr>
    <tr>
<?php
$myFile = "data/" . $name. "/". $name . "_lifetime.json";//specify the file
if (file_exists($myFile)) {
    include 'links.php';
}
?>
</table>
    <form method="post" name="update" action="playerstats_lifetime.php?name=<?php echo $name; ?>">
    <table>
    <thead>
        <tr>
        <th colspan="1">
            <form method="post" name="update" action="playerstats_lifetime.php?name=<?php echo $name; ?>">
                <select name="tpp" id="tpp" onchange="update.submit()" class="select">
                    <option value = false <?php echo $fppselected; ?>>FPP</option>
                    <option value = true <?php echo $tppselected; ?>>TPP</option>
                </select>
        </th>
            </form>
        <th colspan="2">
            <form action="pull_lifestats.php">
                <input type="hidden" name="page" value="playerstats_lifetime.php?name=<?php echo $name; ?>">
                <input type="hidden" name="user" value="<?php echo $name; ?>">
        </th>
    </thead>
    </table>
                <input type="submit" name="submit" class="button" value="Update">
            </form>

<table>
    <tr>
        <td>
        <table class="tg">
<?php
//check if tpp is selected and change mode
if ($tpp == "") {
    $mode = "solo-fpp";
} elseif ($tpp == "true") {
    $mode = "solo";
} elseif ($tpp == "false") {
    $mode = "solo-fpp";
}

$myFile = "data/" . $name. "/". $name . "_lifetime.json";//specify the file
if (file_exists($myFile)) {
    echo "<tr>";
    echo "\n";
    echo "  <td class=tg1 colspan=2><center><b><font color=#914B16>Solos</font></b></center></td>";
    echo "\n";
    echo "</tr>";
    echo "\n";
    include 'stats_lifetime.php';//pull the stats script
}
?>
</table>
        </td>
        <td>
<table class="tg">
<?php
//check if tpp is selected and change mode
if ($tpp == "") {
    $mode = "duo-fpp";
} elseif ($tpp == "true") {
    $mode = "duo";
} elseif ($tpp == "false") {
    $mode = "duo-fpp";
}

$myFile = "data/" . $name. "/". $name . "_lifetime.json";//specify the file
if (file_exists($myFile)) {
    echo "<tr>";
    echo "\n";
    echo "  <td class=tg1 colspan=2><center><b><font color=#368480>Duos</font></b></center></td>";
    echo "\n";
    echo "</tr>";
    echo "\n";
    include 'stats_lifetime.php';//pull the stats script
}
?>

</table>
</td>
<td>
<table class="tg">
<?php
//check if tpp is selected and change mode
if ($tpp == "") {
    $mode = "squad-fpp";
} elseif ($tpp == "true") {
    $mode = "squad";
} elseif ($tpp == "false") {
    $mode = "squad-fpp";
}
$myFile = "data/" . $name. "/". $name . "_lifetime.json";//specify the file
if (file_exists($myFile)) {
    echo "<tr>";
    echo "\n";
    echo "  <td class=tg1 colspan=2><center><b><font color=#48447C>Squads</font></b></center></td>";
    echo "\n";
    echo "</tr>";
    echo "\n";
    include 'stats_lifetime.php';//pull the stats script
}
?>
</table>
</tr>
</table>
</body>
</html>
