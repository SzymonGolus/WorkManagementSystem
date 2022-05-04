<?php
include("up.php");
include("connect.php");

$query="UPDATE status SET dodatkowe='' WHERE id_roboty=$_GET[id_roboty]";
$wynik=mysql_query("$query");
echo "Robota zostala przywrocona.";
echo "<br>";
echo "<meta http-equiv='refresh' content='1; url=wysw_robota_full.php?id_roboty=" . $_GET[id_roboty] . "'>";


include("down.php");
?>
