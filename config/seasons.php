<?php
//password protect this content
require_once('protect.php');

$page = $_GET['page'];//set page from url

//function to pull the seasons information
function getSeasons(){
    $myFile = "../data/seasons.json";//set up our file name

    // load config json
    $config = file_get_contents('config.json');

    // decode json to associative array
    $json_arr = json_decode($config, true);

    // set platform and key
    $platform = $json_arr[1]['Amount'];
    $key = $json_arr[2]['Amount'];

    //set the headers required to authenticate
    $headers = array(
        'Authorization: Bearer ' .$key.'',
        'Accept: application/vnd.api+json'
    );

    //set the filepath and curl
    $fp = fopen($myFile, "w+");
    $ch = curl_init();

    //setup our URL for curl
    curl_setopt($ch, CURLOPT_URL,"https://api.pubg.com/shards/$platform/seasons");
    //set a timeout, because PUBg API can hang randomly
    curl_setopt($ch, CURLOPT_TIMEOUT, 4);
    //set our headers
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //return if it failed or not, used later in the loop
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //set what we're doing
    curl_setopt($ch, CURLOPT_FILE, $fp);
    //execute it
    $store = curl_exec ($ch);

    //some fallback in case the pull fails
    $retry = 0;
    while(curl_errno($ch) == 28 && $retry < 5){
        $store = curl_exec($ch);
        $retry++;
    }

    //tidy up
    curl_close ($ch);
    fclose($fp);
}

//run the function
getSeasons();

$myFile = "../data/seasons.json";//set the file path
$lines = file_get_contents($myFile);//file in to an array

$data = json_decode($lines, true);//decode the json

//make the seasons.txt file
$file = fopen('../data/seasons.txt', 'w');
fwrite($file, "");
fclose($file);

//count how many seasons there are
$total = 0;
foreach ($data["data"] as $value) {
    if($value["id"]!=""){
        $total = $total+1;
    }
}

$seasons = $total;//set how many seasons there are total

//run a loop writing the seasons to the text file
$i = 0;
$count = 0;
while ($i++ < $seasons)
{
    ${"season$i"} = $data["data"][$count]["id"];
    $file = fopen('../data/seasons.txt', 'a+');
    fwrite($file, $data["data"][$count]["id"]);
    fwrite($file, "\n");
    fclose($file);
    $count = $count+1;
}

//send us back to the previous page
header("location:" .$page);
exit();
?>
