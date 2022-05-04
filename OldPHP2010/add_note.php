<?php
include("up.php");
include("connect.php");
$data=mktime();
$query="INSERT INTO notes_roboty (id_roboty, data, notatka) VALUES('$_POST[id_roboty]', $data, '$_POST[notatka]')";
$wynik=mysql_query("$query");

echo "Notatka zosta³a dodana";
echo "<meta http-equiv='refresh' content='1; url=wysw_robota_full.php?id_roboty=" . $_POST[id_roboty] . "'>";
include("down.php");
//UPDATE klienci SET klienci.nazwa="Szymon Golus" where klienci.id_klient=3 
?>