<?php
global $user; //set user to be global
$user = $argv[1]; //pull our user name from the command line

global $season; //set season to be global
$season = $argv[2]; //pull our season name from the command line

$myFile = "data/".$user."/".$user.".json"; //set up our file name
//see if the file exists, if not make the directory
if (file_exists($myFile)) {
} else {
mkdir("data/$user"); //make our directory for the player files
}

//function to do the API pull
function getID(){
  global $store; //set store to global for error checking
  global $user; //set user to global for other functions
  $myFile = "data/".$user."/".$user.".json"; //set up our file name

  // load config json
  $config = file_get_contents('config/config.json');

  // decode json to associative array
  $json_arr2 = json_decode($config, true);

  // set platform and key
  $platform = $json_arr2[1]['Amount'];
  $key = $json_arr2[2]['Amount'];

  //check to see if we already have the players information to save API calls
  if (file_exists($myFile)) {
  } else {

  //set the headers required to authenticate
  $headers = array(
       'Authorization: Bearer ' .$key.'',
       'Accept: application/vnd.api+json'
  );

  //set the filepath and curl
  $fp = fopen($myFile, "w+");
  $ch = curl_init();

  //setup out URL for curl
  curl_setopt($ch, CURLOPT_URL,"https://api.pubg.com/shards/".$platform."/players?filter[playerNames]=$user");

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
}

//run the function
getID();

//function to do the API pull
function getSeason(){
  global $store; //set store to global for error checking
  global $user; //set user
  global $season; //set season

  //pull the account id
  $myFile = "data/".$user."/".$user.".json"; //set our file name
  $lines = file_get_contents($myFile); //file in to an array
  $data = json_decode($lines, true); //decode the json
  $account = $data["data"][0]["id"]; //set our account id

  $myFile = "data/".$user."/".$user."_".$season.".json"; //set up our file name

  // load config json
  $config = file_get_contents('config/config.json');

  // decode json to associative array
  $json_arr2 = json_decode($config, true);

  // set platform and key
  $platform = $json_arr2[1]['Amount'];
  $key = $json_arr2[2]['Amount'];

  //set the headers required to authenticate
  $headers = array(
       'Authorization: Bearer ' .$key.'',
       'Accept: application/vnd.api+json'
  );

  //set the filepath and curl
  $fp = fopen($myFile, "w+");
  $ch = curl_init();

  //setup out URL for curl
  curl_setopt($ch, CURLOPT_URL,"https://api.pubg.com/shards/$platform/players/$account/seasons/$season");
  //set a timeout, because PUBg API can hang randomly
  curl_setopt($ch, CURLOPT_TIMEOUT, 4);
  //set out headers
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
getSeason();
?>
