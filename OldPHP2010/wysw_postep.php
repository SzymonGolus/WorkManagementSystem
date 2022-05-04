<?php
include("up.php");
include("connect.php");


//Start
echo "<center><table cellspacing=0 cellpadding=0><tr><td width=700><hr color=black width=700><b><center>Roboty do rozpoczecia</center></b><hr color=black width=700><br>";

$query="SELECT roboty.id_roboty, roboty.nr_roboty, roboty.rok, roboty.obiekt_skrot, klienci.nazwa_skrot, roboty.id_asort, roboty.wykonawca, roboty.pilna FROM roboty, klienci, status ";
$query.="WHERE roboty.id_klient=klienci.id_klient AND start_status='NIE' AND data_zak<>0 AND status.id_roboty=roboty.id_roboty AND roboty.data_zgl<=" . (mktime()-0*24*60*60);

$wynik=mysql_query($query);
while($query_data=mysql_fetch_row($wynik)) {
if ($query_data[7]==1) echo "<b>";
echo "<div align=left><a href=wysw_robota_full.php?id_roboty=" . $query_data[0] . ">RG" . $query_data[1] . "/" . $query_data[2] . "#" . $query_data[3] . "#" . $query_data[4] . "#" . $query_data[5] . "</a>";
echo " - " . $query_data[6];
echo "</div></b>";
}

//Materialy
echo "<center><hr color=black width=700><b>Materialy do odebrania</b><br><hr color=black width=700><br>";

$query="SELECT roboty.id_roboty, roboty.nr_roboty, roboty.rok, roboty.obiekt_skrot, klienci.nazwa_skrot, roboty.id_asort, roboty.wykonawca, roboty.pilna FROM roboty, klienci, status WHERE roboty.id_klient=klienci.id_klient AND mat_status='NIE' AND data_zak<>0 AND status.id_roboty=roboty.id_roboty AND status.start_status<>'NIE' AND status.start_data_wyk<=" . (mktime()-0*24*60*60);
$wynik=mysql_query($query);
while($query_data=mysql_fetch_row($wynik)) {
if ($query_data[7]==1) echo "<b>";
echo "<div align=left><a href=wysw_robota_full.php?id_roboty=" . $query_data[0] . ">RG" . $query_data[1] . "/" . $query_data[2] . "#" . $query_data[3] . "#" . $query_data[4] . "#" . $query_data[5] . "</a>";
echo " - " . $query_data[6];
echo "</div></b>";
}

//Teren
echo "<center><hr color=black width=700><b>Prace terenowe do wykonania</b><br><hr color=black width=700><br>";

$query="SELECT roboty.id_roboty, roboty.nr_roboty, roboty.rok, roboty.obiekt_skrot, klienci.nazwa_skrot, roboty.id_asort, roboty.wykonawca, roboty.pilna FROM roboty, klienci, status WHERE roboty.id_klient=klienci.id_klient AND teren_status='NIE' AND data_zak<>0 AND status.id_roboty=roboty.id_roboty AND status.mat_status<>'NIE' AND status.mat_data_wyk<=" . (mktime()-0*24*60*60);
$wynik=mysql_query($query);
while($query_data=mysql_fetch_row($wynik)) {
if ($query_data[7]==1) echo "<b>";
echo "<div align=left><a href=wysw_robota_full.php?id_roboty=" . $query_data[0] . ">RG" . $query_data[1] . "/" . $query_data[2] . "#" . $query_data[3] . "#" . $query_data[4] . "#" . $query_data[5] . "</a>";
echo " - " . $query_data[6];
echo "</div></b>";
}

//Operat
echo "<center><hr color=black width=700><b>Operat do wykonania/Dokumentacja powykonawcza</b><br><hr color=black width=700><br>";

$query="SELECT roboty.id_roboty, roboty.nr_roboty, roboty.rok, roboty.obiekt_skrot, klienci.nazwa_skrot, roboty.id_asort, roboty.wykonawca, roboty.pilna FROM roboty, klienci, status WHERE roboty.id_klient=klienci.id_klient AND operat_status='NIE' AND data_zak<>0 AND status.id_roboty=roboty.id_roboty AND status.teren_status<>'NIE' AND status.teren_data_wyk<=" . (mktime()-0*24*60*60);
$wynik=mysql_query($query);
while($query_data=mysql_fetch_row($wynik)) {
if ($query_data[7]==1) echo "<b>";
echo "<div align=left><a href=wysw_robota_full.php?id_roboty=" . $query_data[0] . ">RG" . $query_data[1] . "/" . $query_data[2] . "#" . $query_data[3] . "#" . $query_data[4] . "#" . $query_data[5] . "</a>";
echo " - " . $query_data[6];
echo "</div></b>";
}

//Przekazanie
echo "<center><hr color=black width=700><b>Odbiór ODGK/Przekazanie dok. powykon.</b><br><hr color=black width=700><br>";

$query="SELECT roboty.id_roboty, roboty.nr_roboty, roboty.rok, roboty.obiekt_skrot, klienci.nazwa_skrot, roboty.id_asort, roboty.wykonawca, roboty.pilna FROM roboty, klienci, status WHERE roboty.id_klient=klienci.id_klient AND przekazanie_status='NIE' AND data_zak<>0 AND status.id_roboty=roboty.id_roboty AND status.operat_status<>'NIE' AND status.operat_data_wyk<=" . (mktime()-0*24*60*60);
$wynik=mysql_query($query);
while($query_data=mysql_fetch_row($wynik)) {
if ($query_data[7]==1) echo "<b>";
echo "<div align=left><a href=wysw_robota_full.php?id_roboty=" . $query_data[0] . ">RG" . $query_data[1] . "/" . $query_data[2] . "#" . $query_data[3] . "#" . $query_data[4] . "#" . $query_data[5] . "</a>";
echo " - " . $query_data[6];
echo "</div></b>";
}

//rozliczenie
echo "<center><hr color=black width=700><b>Roboty do rozliczenia</b><br><hr color=black width=700><br>";

$query="SELECT roboty.id_roboty, roboty.nr_roboty, roboty.rok, roboty.obiekt_skrot, klienci.nazwa_skrot, roboty.id_asort, roboty.wykonawca, roboty.pilna FROM roboty, klienci, status WHERE roboty.id_klient=klienci.id_klient AND rozliczenie_status='NIE' AND data_zak<>0 AND status.id_roboty=roboty.id_roboty AND status.przekazanie_status<>'NIE' AND status.przekazanie_data_wyk<=" . (mktime()-0*24*60*60);
$wynik=mysql_query($query);
while($query_data=mysql_fetch_row($wynik)) {
if ($query_data[7]==1) echo "<b>";
echo "<div align=left><a href=wysw_robota_full.php?id_roboty=" . $query_data[0] . ">RG" . $query_data[1] . "/" . $query_data[2] . "#" . $query_data[3] . "#" . $query_data[4] . "#" . $query_data[5] . "</a>";
echo " - " . $query_data[6];
echo "</div></b>";
}

echo "</td></tr></table>";

include("down.php");


?>
