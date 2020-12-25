<?php
$config = include('config/config.php'); //include the config file for user information
$players = $config['players']['number']; //pull name

$num = 1;
$count = 0;

//set up a loop to run based on how many players are defined
while ($count < $players)
{
$name = $config['player' . $num . '']['name']; //pull name
$image = $config['player' . $num . '']['image']; //pull image
echo "  <td>";
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
echo "            <div class=column>";
echo "\n";
echo "              <b><font size=4>" . $name . " </font></b>";
echo "\n";
echo "  <br /><br />";
echo "\n";
echo "        <form method=post>";
echo "\n";
echo "          <input type=hidden name=name value=" . $name . " />";
echo "\n";
echo "          <input type=hidden name=season value=" . $season . " />";
echo "\n";
echo "          <input type=submit name=submit class=button value=Update></form>";
echo "\n";
echo "            </div>";
echo "\n";
echo "            </div>";
echo "\n";
echo "        </center>";
echo "\n";
echo "      </td>";
echo "\n";
echo "    </tr>";

$myFile = "data/" . $name. "/". $name . "_" . $season . ".json";//specify the file
include 'links.php';//pull the links script
include 'stats.php';//pull the stats script
echo "\n";
echo "  </table>";
echo "\n";
$count = $count+1;
$num = $num+1;
}
?>
