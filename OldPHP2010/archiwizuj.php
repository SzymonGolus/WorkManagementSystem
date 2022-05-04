<?php

	include("up.php");
	include("connect.php");
	$query2="SELECT start_status, mat_status, teren_status, operat_status, przekazanie_status, rozliczenie_status FROM status WHERE id_roboty=$_GET[id_roboty]";
	$wynik2=mysql_query("$query2");

	$query_data2=mysql_fetch_row($wynik2);

	if (!($query_data2[0]=='NIE' OR $query_data2[1]=='NIE' OR $query_data2[2]=='NIE' OR $query_data2[3]=='NIE' OR $query_data2[4]=='NIE' OR $query_data2[5]=='NIE')) {
	$query="UPDATE status SET dodatkowe=1 WHERE id_roboty=$_GET[id_roboty]";
	$wynik=mysql_query("$query");
	echo "Robota zostala przeniesiona do archiwum.";
	echo "<br>";
	echo "<meta http-equiv='refresh' content='1; url=wysw_robota_full_arch.php?id_roboty=" . $_GET[id_roboty] . "'>";
	}
	else {
	echo "Robota nie moze zostac przeniesiona do archiwum - nie zostala zakonczona";
	echo "<meta http-equiv='refresh' content='1; url=wysw_robota_full.php?id_roboty=" . $_GET[id_roboty] . "'>";
	}

include("down.php");
?>
