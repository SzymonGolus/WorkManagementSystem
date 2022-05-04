<?php
include("up.php");
include("connect.php");

$data_plus = strtotime($date)+7*24*60*60;

$query="SELECT roboty.id_roboty, roboty.nr_roboty, roboty.rok, roboty.obiekt_skrot, klienci.nazwa_skrot, roboty.id_asort, roboty.wykonawca FROM roboty, klienci, status WHERE roboty.id_klient=klienci.id_klient AND roboty.data_zak<$data_plus AND roboty.data_zak<>'' AND roboty.data_zak>" . strtotime($date) . " AND roboty.id_roboty=status.id_roboty AND (status.start_status='NIE' OR status.mat_status='NIE' OR status.teren_status='NIE' OR status.operat_status='NIE' OR status.przekazanie_status='NIE') ORDER BY roboty.wykonawca";

echo "<center><table cellspacing=0 cellpadding=0><tr><td width=700><hr color=black width=700><b><center>Najblizsze roboty ( mniej niz 7 dni )</center></b><hr color=black width=700><br>";
$wynik=mysql_query("$query");

while($query_data=mysql_fetch_row($wynik)) {
echo "<div align=left><a href=wysw_robota_full.php?id_roboty=" . $query_data[0] . ">RG" . $query_data[1] . "/" . $query_data[2] . "#" . $query_data[3] . "#" . $query_data[4] . "#" . $query_data[5] . "</a>";
echo " - " . $query_data[6];
}

$query="SELECT roboty.id_roboty, roboty.nr_roboty, roboty.rok, roboty.obiekt_skrot, klienci.nazwa_skrot, roboty.id_asort, roboty.wykonawca FROM roboty, klienci, status WHERE roboty.id_klient=klienci.id_klient AND roboty.data_zak<>'' AND roboty.data_zak<=" . strtotime($date) . " AND roboty.id_roboty=status.id_roboty AND (status.start_status='NIE' OR status.mat_status='NIE' OR status.teren_status='NIE' OR status.operat_status='NIE' OR status.przekazanie_status='NIE') ORDER BY wykonawca";

echo "<center><hr color=black width=700><b>Roboty opoznione</b><br><hr color=black width=700><br>";
$wynik=mysql_query("$query");

while($query_data=mysql_fetch_row($wynik)) {
echo "<div align=left><a href=wysw_robota_full.php?id_roboty=" . $query_data[0] . ">RG" . $query_data[1] . "/" . $query_data[2] . "#" . $query_data[3] . "#" . $query_data[4] . "#" . $query_data[5] . "</a>";
echo " - " . $query_data[6];
}

$query="SELECT roboty.id_roboty, roboty.nr_roboty, roboty.rok, roboty.obiekt_skrot, klienci.nazwa_skrot, roboty.id_asort, roboty.wykonawca FROM roboty, klienci, status WHERE roboty.id_klient=klienci.id_klient AND roboty.data_zak='' AND roboty.id_roboty=status.id_roboty AND (status.start_status='NIE' OR status.mat_status='NIE' OR status.teren_status='NIE' OR status.operat_status='NIE' OR status.przekazanie_status='NIE') ORDER BY wykonawca";

echo "<center><hr color=black width=700><b>Roboty bez terminu</b><br><hr color=black width=700><br>";
$wynik=mysql_query("$query");

while($query_data=mysql_fetch_row($wynik)) {
echo "<div align=left><a href=wysw_robota_full.php?id_roboty=" . $query_data[0] . ">RG" . $query_data[1] . "/" . $query_data[2] . "#" . $query_data[3] . "#" . $query_data[4] . "#" . $query_data[5] . "</a>";
echo " - " . $query_data[6];
echo "</div>";
}




echo "</td></tr></table>";

include("down.php");

//UPDATE klienci SET klienci.nazwa="Szymon Golus" where klienci.id_klient=3 

?>