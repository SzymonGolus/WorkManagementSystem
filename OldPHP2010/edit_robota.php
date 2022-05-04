<?php
include("up.php");
include("connect.php");
$haslo = $_POST[kod];
if ($haslo=='') {
	$data_zgl=strtotime($_POST[data_zgl]);
	if ($_POST[data_zak]=="") {
	$data_zak=0;
	}
	else {
	$data_zak=strtotime($_POST['data_zak']);
	}

	if ($_POST[pilna]==1) {
	$pilna=1;
	}
	else {
	$pilna=0;
	}

	$query="UPDATE roboty SET id_klient='$_POST[id_klient]', obiekt='$_POST[obiekt]', obiekt_skrot='$_POST[obiekt_skrot]', asortyment='$_POST[asortyment]', id_asort='$_POST[id_asort]', data_zak='$data_zak', wykonawca='$_POST[wykonawca]', dz='$_POST[dz]', data_zgl=$data_zgl, komentarz='$_POST[komentarz]', pilna='$pilna' WHERE id_roboty=" . $_POST[id_roboty];

	$wynik=mysql_query("$query");
	echo "Dane roboty zosta�y zmienione";
}
else echo "Bledny kod";

echo "<meta http-equiv='refresh' content='1; url=wysw_robota_full.php?id_roboty=" . $_POST[id_roboty] . "'>";
include("down.php");
//UPDATE klienci SET klienci.nazwa="Szymon Golus" where klienci.id_klient=3 
?>