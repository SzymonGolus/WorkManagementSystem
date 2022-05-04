<?php
include("up.php");
include("connect.php");
$haslo = $_POST[kod];
if ($haslo=='') {

	$data_wyk=strtotime($_POST[data_wyk]);
	$query="UPDATE status SET ";
	$query.= $_POST[etap];
	$query.="_wykonal='$_POST[wykonal]', ";
	$query.= $_POST[etap];
	$query.="_data_wyk='$data_wyk', ";
	$query.= $_POST[etap];
	$query.="_status='$_POST[status]' WHERE id_roboty=$_POST[id_roboty]";
	$wynik=mysql_query("$query");
	echo "Status zostal zmieniony.";
	echo "<br>";
}
else {
echo "Bledny kod";
}

echo "<meta http-equiv='refresh' content='1; url=wysw_robota_full.php?id_roboty=" . $_POST[id_roboty] . "'>";
include("down.php");
?>
