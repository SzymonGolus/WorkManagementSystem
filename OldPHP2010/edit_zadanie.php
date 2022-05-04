<?php
include("up.php");
include("connect.php");

$data_wyk=strtotime($_POST[data_wyk]);

$query="UPDATE zadania SET wykonal='$_POST[wykonal]', data_wyk='$data_wyk' WHERE id_zadanie=$_POST[id_zadanie]";
$wynik=mysql_query("$query");
echo "Zadanie zosta³o wykonane.";
echo "<br>";

include("down.php");
?>
