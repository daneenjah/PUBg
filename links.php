<?php
$lines = file_get_contents($myFile);//file in to an array
$data = json_decode($lines, true);//decode the json

//pull the account id for pubg.report
$account = $data["data"]["relationships"]["player"]["data"]["id"];

//echo the links
echo "\n";
echo "<tr>";
echo "\n";
echo "  <th class=tg2><center><form action=https://pubg.report/players/" . $account . " target=_blank><button type=submit class=button>Report</button></form></center></th>";
echo "\n";
echo "  <th class=tg2><center><form action=https://pubglookup.com/players/steam/" . $name . " target=_blank><button type=submit class=button>Lookup</button></form></center></th>";
echo "\n";
echo "</tr>";
echo "\n";
?>
