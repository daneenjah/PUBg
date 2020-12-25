<?php
$config = include('config/config.php'); //include the config file for user information

$players = $config['players']['number']; //pull name

global $season; //set season to be global
$season = $argv[1]; //pull our season name from the command line

//set our variables for the loop
$num = 1;
$count = 0;

while ($count < $players)
{
  global $num;
  global $count;
  global $user;
  $user = $config['player' . $num . '']['name']; //pull name

  $count = $count+1;
  $num = $num+1;


  //run the function
  getSeason();
}

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

  include('config/info.php'); //pull the key/platform information

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
?>
