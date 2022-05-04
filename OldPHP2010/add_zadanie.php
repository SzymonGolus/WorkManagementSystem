<?php
include("up.php");
include("connect.php");

$data_dod=strtotime(date('Y-m-d'));
$termin=strtotime($_POST[termin]);
$query="INSERT INTO zadania (id_robota, data_dod, termin, odpowiedzialny, zadanie)";
$query.=" VALUES('$_POST[id_roboty]', '$data_dod', '$termin', '$_POST[odpowiedzialny]', '$_POST[zadanie]')";
$wynik=mysql_query("$query");
echo "Zadanie zosta³o dodane.";
echo "<br>";
echo "<meta http-equiv='refresh' content='1; url=wysw_robota_full.php?id_roboty=" . $_POST[id_roboty] . "'>";
include("down.php");
?>
