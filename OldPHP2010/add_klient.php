<?php
include("up.php");
include("connect.php");
if ($_POST[kod]=='ga7' OR 'GA7') {
	$query="INSERT INTO klienci (nazwa, adres, nip, osoba, telefon, email, komentarz, nazwa_skrot) VALUES('$_POST[nazwa]', '$_POST[adres]', '$_POST[nip]', '$_POST[osoba]', '$_POST[telefon]', '$_POST[email]', '$_POST[komentarz]', '$_POST[nazwa_skrot]')";
	$wynik=mysql_query("$query");
	echo "Klient zosta³ dodany"; 
}
else {
echo "Bledny kod"; 
}
include("down.php");
?>
