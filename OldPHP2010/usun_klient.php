<?php
include("up.php");
include("connect.php");

	$query="DELETE FROM klienci WHERE id_klient=" . $_GET[id_klient];
	$wynik=mysql_query("$query");
	echo $wynik;
	echo "Klient zostal usuniety!";


include("down.php");
?>