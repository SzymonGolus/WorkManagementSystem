<?php
include("up.php");
include("connect.php");

$query="INSERT INTO archiwum (data, forma, lokalizacja, id_roboty) VALUES('$_POST[data]', '$_POST[forma]', '$_POST[lokalizacja]', '$_POST[id_roboty]')";
mysql_query($query);
echo "Dokument zostal dodany.";

if ($_POST[arch]==1) {
echo "<meta http-equiv='refresh' content='1; url=wysw_robota_full_arch.php?id_roboty=" . $_POST[id_roboty] . "'>";
}
else {
echo "<meta http-equiv='refresh' content='1; url=wysw_robota_full.php?id_roboty=" . $_POST[id_roboty] . "'>";

}
include("down.php");
//UPDATE klienci SET klienci.nazwa="Szymon Golus" where klienci.id_klient=3 
?>