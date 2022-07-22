<!DOCTYPE html>
<html>
<head>
    <title>Clapp'in Cheeks PUBg Settings</title>
<link rel="stylesheet" type="text/css" href="../stylesheet.css">
</head>

<form method=post>

<?php
// Password protect this content
require_once('protect.php');

// load players json
$data = file_get_contents('players.json');

// decode json to associative array
$json_arr = json_decode($data, true);

// load config json
$config = file_get_contents('config.json');

// decode json to associative array
$json_arr2 = json_decode($config, true);

// set players/platform/api
$players = $json_arr2[0]['Amount'];
$platform = $json_arr2[1]['Amount'];
$api = $json_arr2[2]['Amount'];

// set a counter for a the loop
$count = 0;

// run out loop to list all of our players
while ($count < $players)
{
    echo "<table class=tg width=500>";
    echo "\n";
    echo "  <tr>";
    echo "\n";
    echo "    <td class=tg1><input type=text name=" . $count . " value=" . $json_arr[$count]['Name'] . "></td>";
    echo "\n";
    echo "    <td class=tg1 rowspan=2><img src=" . $json_arr[$count]['Image'] . " width=70 heigh=70></td>";
    echo "\n";
    echo "  </tr>";
    echo "\n";
    echo "  <tr>";
    echo "\n";
    echo "    <td class=tg1><input type=text name=image-" . $count . " size=110 value=" . $json_arr[$count]['Image'] . "></td>";
    echo "\n";
    echo "  </tr>";
    echo "\n";
    echo "</table>";
    echo "<br> \n";
    $count = $count+1;
}

// an array to be called by the player update button
if(array_key_exists('submitplayer', $_POST)) {
    submitplayer();
}

// setup the update function
function submitplayer() {
    $playersn = $_POST['players'];//pull the number of players from the form
    $platformn = $_POST['platform'];//pull the platform from the form
    $apin = $_POST['api'];//pull the key from the form

    // load config json
    $config = file_get_contents('config.json');

    // decode json to associative array
    $json_arr = json_decode($config, true);

    // set the players
    $players = $json_arr[0]['Amount'];

    // set the platform
    $platform = $json_arr[1]['Amount'];

    // check to see if what's in the config.json matches what the form sent
    if ($playersn !== $players) {

        // read file
        $data = file_get_contents('config.json');

        // decode json to array
        $json_arr = json_decode($data, true);

        // setup our json to input our player count into the config.json
        foreach ($json_arr as $key => $value) {
            if ($value['Code'] == 'Players') {
                $json_arr[$key]['Amount'] = $playersn;
            }
        }

        // encode array to json and save to file
        file_put_contents('config.json', json_encode($json_arr));
    }

    // check to see if what's in the config.json matches what the form sent
    if ($platformn !== $platform) {

        // read file
        $data = file_get_contents('config.json');

        // decode json to array
        $json_arr = json_decode($data, true);

        // setup our json to input our platform into the config.json
        foreach ($json_arr as $key => $value) {
            if ($value['Code'] == 'Platform') {
                $json_arr[$key]['Amount'] = $platformn;
            }
        }

        // encode array to json and save to file
        file_put_contents('config.json', json_encode($json_arr));
    }

    // load config json
    $config = file_get_contents('config.json');

    // decode json to associative array
    $json_arr2 = json_decode($config, true);

    // set api
    $api = $json_arr2[2]['Amount'];

    // check to see if what's in the config.json matches what the form sent
    if ($apin !== $api) {

        // read file
        $data = file_get_contents('config.json');

        // decode json to array
        $json_arr = json_decode($data, true);

        // setup our json to input our platform into the config.json
        foreach ($json_arr as $key => $value) {
            if ($value['Code'] == 'Key') {
                $json_arr[$key]['Amount'] = $apin;
            }
        }

        // encode array to json and save to file
        file_put_contents('config.json', json_encode($json_arr));
    }

    // setup our json decode for players.json
    $data = file_get_contents('players.json');
    $json_arr = json_decode($data, true);

    // set our counter for the loop
    $countw = 0;

    //write player names to json
    while ($countw < $players)
    {
        $name = $_POST["$countw"];
        foreach ($json_arr as $key => $value) {
            if ($value['Code'] == $countw) {
                $json_arr[$key]['Name'] = $name;
            }
        }

        $countw = $countw+1;

    }


    $countwi = 0;

    // loop to write the player names
    while ($countwi < $players)
    {
        $image = $_POST["image-$countwi"];
        foreach ($json_arr as $key => $value) {
            if ($value['Code'] == $countwi) {
                $json_arr[$key]['Image'] = $image;
            }
        }

        $countwi = $countwi+1;

    }
    // encode array to json and save to file
    file_put_contents('players.json', json_encode($json_arr));

    header("Refresh:0");
}

// this file sets the form below to show the correctly selected number
include('player_select.php');
?>

<label for="players">Players:</label>
<select name="players" id="players" class="select">
    <option value="1" <?php echo $selected1;?>>1</option>
    <option value="2" <?php echo $selected2;?>>2</option>
    <option value="3" <?php echo $selected3;?>>3</option>
    <option value="4" <?php echo $selected4;?>>4</option>
    <option value="5" <?php echo $selected5;?>>5</option>
    <option value="6" <?php echo $selected6;?>>6</option>
    <option value="7" <?php echo $selected7;?>>7</option>
    <option value="8" <?php echo $selected8;?>>8</option>
    <option value="9" <?php echo $selected9;?>>9</option>
    <option value="10" <?php echo $selected10;?>>10</option>
</select>

<?php
// this file sets the form below to show the correctly selected number
include('platform_select.php');
?>

<br><br>

<label for="platform">Platform:</label>
<select name="platform" id="platform" class="select">
    <option value="kakao" <?php echo $selected1;?>>kakao</option>
    <option value="stadia" <?php echo $selected2;?>>stadia</option>
    <option value="steam" <?php echo $selected3;?>>steam</option>
    <option value="tournament" <?php echo $selected4;?>>tournament</option>
    <option value="psn" <?php echo $selected5;?>>psn</option>
    <option value="xbox" <?php echo $selected6;?>>xbox</option>
</select>
<br><br>
<label for="key">Key:</label>
<br>
<textarea name="api" rows="3" cols="120"><?php echo $api; ?></textarea>
<br><br>
<input type="submit" name="submitplayer" class="button" value="Update">
</form>
<br>
<form action="seasons.php">
    <input type="hidden" name="page" value="settings.php">
    <input type="submit" name="submit" class="button" value="Update Seasons">
</form>
<br>
<form action="cleanup.php">
    <input type="hidden" name="page" value="settings.php">
    <input type="submit" name="submit" class="button" value="Cleanup Data">
</form>
</body>
</html>
