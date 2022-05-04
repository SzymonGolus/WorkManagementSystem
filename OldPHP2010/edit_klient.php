<?php
include("up.php");
include("connect.php");
if ($_POST[kod]=='' OR '') {

	$query="UPDATE klienci SET nazwa='$_POST[nazwa]', adres='$_POST[adres]', nip='$_POST[nip]', osoba='$_POST[osoba]', telefon='$_POST[telefon]', email='$_POST[email]', komentarz='$_POST[komentarz]', nazwa_skrot='$_POST[nazwa_skrot]' WHERE id_klient=" . $_POST[id_klient];

	$wynik=mysql_query("$query");
	echo "Dane klienta zosta�y zmienione";
}
else echo "Bledny kod";

include("down.php");
//UPDATE klienci SET klienci.nazwa="Szymon Golus" where klienci.id_klient=3 
?>