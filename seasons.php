<?php
//function to pull the seasons information
function getSeasons(){
  $myFile = "data/seasons.json"; //set up our file name

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
  curl_setopt($ch, CURLOPT_URL,"https://api.pubg.com/shards/$platform/seasons");
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

  //tidy up
  curl_close ($ch);
  fclose($fp);
}

//run the function
getSeasons();

//a simple loop to keep trying until it passes for 3 tries

$i = 0;
while (($success != "true") && ($i++ < 3))
{
  if($store){ //check for true/false
      $success = "true";
  }else{
      $success = "false";
      getSeasons(); //run it again
  }
}

$myFile = "data/seasons.json";//set the file path
$lines = file_get_contents($myFile);//file in to an array

$data = json_decode($lines, true);

//make the seasons.txt file
$file = fopen('data/seasons.txt', 'w');
fwrite($file);
fclose($file);

//count how many seasons there are
$total = 0;
foreach ($data["data"] as $value) {
    if($value["id"]!=""){
        $total = $total+1;
    }
}

$seasons = $total;

//run a loop writing the seasons to the text file
$i = 0;
while ($i++ < $seasons)
{
${"season$i"} = $data["data"][$count]["id"];
$file = fopen('data/seasons.txt', 'a+');
fwrite($file, $data["data"][$count]["id"]);
fwrite($file, "\n");
fclose($file);
$count = $count+1;
}

//make the seasons2.txt file
$file = fopen('data/seasons2.txt', 'w');
fwrite($file);
fclose($file);

//reverse the lines, PUBg sends API with newest at the bottom of JSON
$file = file('data/seasons.txt');
$read_rev = array_reverse($file);
$count=0;
foreach ($read_rev as $dis_line) {
$nfile = fopen('data/seasons2.txt', 'a+');
fwrite($nfile, $dis_line);
fclose($nfile);
}

//copy seasons2.txt that was created to seasons.txt and delete the others
copy("data/seasons2.txt","data/seasons.txt");
unlink("data/seasons2.txt");
?>
