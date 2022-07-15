<?php
// load players json
$data = file_get_contents('config/players.json');

// decode json to associative array
$json_arr = json_decode($data, true);

// load config json
$config = file_get_contents('config/config.json');

// decode json to associative array
$json_arr2 = json_decode($config, true);

// set player amount
$players = $json_arr2[0]['Amount'];

// set a counter for a the loop
$count = 0;

//set up a loop to run based on how many players are defined
while ($count < $players)
{
    $name = $json_arr[$count]['Name']; //pull name
    $image = $json_arr[$count]['Image']; //pull image
    echo " <td>";
    echo "\n";
    echo "  <table class=tg>";
    echo "\n";
    echo "    <tr>";
    echo "\n";
    echo "      <td class=tg2 colspan=2>";
    echo "\n";
    echo "        <center>";
    echo "\n";
    echo "          <div class=row>";
    echo "\n";
    echo "            <div class=column>";
    echo "\n";
    echo "              <a href='playerstats.php?name=" . $name . "' target=_blank><img width=70 height=70 src=" . $image . "></a><br />";
    echo "\n";
    echo "            </div>";
    echo "\n";
    echo "          <div class=column>";
    echo "\n";
    echo "            <b><font size=4>" . $name . " </font></b>";
    echo "\n";
    echo "  <br /><br />";
    echo "\n";
    echo "        <form method=post>";
    echo "\n";
    echo "            <input type=hidden name=name value=" . $name . " />";
    echo "\n";
    echo "            <input type=hidden name=season value=" . $season . " />";
    echo "\n";
    echo "            <input type=submit name=submit class=button value=Update></form>";
    echo "\n";
    echo "          </div>";
    echo "\n";
    echo "          </div>";
    echo "\n";
    echo "        </center>";
    echo "\n";
    echo "      </td>";
    echo "\n";
    echo "    </tr>";

    $myFile = "data/" . $name. "/". $name . "_" . $season . ".json";//specify the file
    include 'links.php';//pull the links script
    include 'stats.php';//pull the stats script
    include 'stats_overall.php';//pull the stats script
    echo "  </table>";
    echo "\n";
    $count = $count+1;
}
?>
