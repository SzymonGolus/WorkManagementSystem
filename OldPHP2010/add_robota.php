<?php
include("up.php");
include("connect.php");
if ($_POST[kod]=='' OR '') {
	echo $data_zak;
	if ($_POST[data_zak]=="") {
	$data_zak=0;
	}
	else {
	$data_zak=strtotime($_POST['data_zak']);
	}

	$data_zgl=strtotime($_POST['data_zgl']);

	$query="INSERT INTO roboty (nr_roboty, rok, id_klient, wykonawca, asortyment, id_asort, obiekt, data_zgl, data_zak, pilna, komentarz, dz, obiekt_skrot)";
	$query.=" VALUES('$_POST[nr_roboty]', '$_POST[rok]', '$_POST[id_klient]', '$_POST[wykonawca]', '$_POST[asortyment]', '$_POST[id_asort]', '$_POST[obiekt]', '$data_zgl', '$data_zak', '$_POST[pilna]', '$_POST[komentarz]', '$_POST[dz]', '$_POST[obiekt_skrot]')";
	$wynik=mysql_query("$query");

	$query2="SELECT id_roboty FROM roboty WHERE nr_roboty=$_POST[nr_roboty] AND rok=$_POST[rok]";
	$wynik2=mysql_query("$query2");
	$query_data2=mysql_fetch_row($wynik2);


	$query3="INSERT INTO status (id_roboty, start_status, mat_status, teren_status, operat_status, przekazanie_status, rozliczenie_status) VALUES ('$query_data2[0]', 'NIE', 'NIE', 'NIE', 'NIE', 'NIE', 'NIE')";
	$wynik3=mysql_query("$query3");


	echo "Robota zosta�a dodana.";
}
else {
echo "Bledny kod";
}
include("down.php");
?>
