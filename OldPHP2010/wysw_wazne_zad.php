<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2">
</head>
<?php
include("up.php");
include("connect.php");





$query="SELECT * FROM zadania WHERE zadania.termin<=" . strtotime(0) . " AND zadania.wykonal='' AND zadania.odpowiedzialny<>'KTR' ORDER BY odpowiedzialny";

echo "<center><hr color=black width=700><b><font color=red>ZADANIA OPóźNIONE</font></b><br><hr color=black width=700><br>";

$wynik=mysql_query($query);
if (!($wynik==0)) {
echo "<table cellspacing=0 cellpadding=0><tr><td width=600>";
while ($query_data=mysql_fetch_row($wynik)) {
$query_data[3]=date('Y-m-d', $query_data[3]);

echo $query_data[4] . " - " . $query_data[3];
echo " - " . $query_data[7];

$query2="SELECT * FROM roboty, klienci WHERE roboty.id_klient=klienci.id_klient AND roboty.id_roboty=$query_data[1]";
$wynik2=mysql_query("$query2");
while($query_data2=mysql_fetch_row($wynik2)) {

echo "<div align=left>dotyczy: <a href=wysw_robota_full.php?id_roboty=" . $query_data2[0] . ">RG" . $query_data2[1] . "/" . $query_data2[2] . "#" . $query_data2[13] . "#" . $query_data2[22] . "#" . $query_data2[6] . "</a>";
echo "</div><br>";

}



echo "<hr width=600 color=black>";

}
}
echo "</td></tr></table>";

$data_plus = strtotime(0)+7*24*60*60;

echo "<center><hr color=black width=700><b><center>PILNE ZADANIA ( mniej niz 7 dni )</center></b><hr color=black width=700><br>";


$query="SELECT * FROM zadania WHERE zadania.termin<=$data_plus AND zadania.wykonal='' AND zadania.odpowiedzialny<>'KTR' AND zadania.termin>" . strtotime(0) . " ORDER BY zadania.odpowiedzialny";

$wynik=mysql_query($query);
if (!($wynik==0)) {
echo "<table cellspacing=0 cellpadding=0><tr><td width=600>";
while ($query_data=mysql_fetch_row($wynik)) {
$query_data[3]=date('Y-m-d', $query_data[3]);

echo $query_data[4] . " - " . $query_data[3];
echo " - " . $query_data[7];

$query2="SELECT * FROM roboty, klienci WHERE roboty.id_klient=klienci.id_klient AND roboty.id_roboty=$query_data[1]";
$wynik2=mysql_query("$query2");
while($query_data2=mysql_fetch_row($wynik2)) {

echo "<div align=left>dotyczy: <a href=wysw_robota_full.php?id_roboty=" . $query_data2[0] . ">RG" . $query_data2[1] . "/" . $query_data2[2] . "#" . $query_data2[13] . "#" . $query_data2[22] . "#" . $query_data2[6] . "</a>";
echo "</div><br>";

}



echo "<hr width=600 color=black>";

}
}
echo "</td></tr></table>";



$data_plus2 = strtotime(0)+14*24*60*60;



echo "<center><hr color=black width=700><b><center>Najblizsze zadania ( mniej niz 14 dni )</center></b><hr color=black width=700><br>";


$query="SELECT * FROM zadania WHERE zadania.termin<=$data_plus2 AND zadania.termin>$data_plus AND zadania.wykonal='' AND zadania.odpowiedzialny<>'KTR' AND zadania.termin>" . strtotime(0) . " ORDER BY zadania.odpowiedzialny";

$wynik=mysql_query($query);
if (!($wynik==0)) {
echo "<table cellspacing=0 cellpadding=0><tr><td width=600>";
while ($query_data=mysql_fetch_row($wynik)) {
$query_data[3]=date('Y-m-d', $query_data[3]);

echo $query_data[4] . " - " . $query_data[3];
echo " - " . $query_data[7];

$query2="SELECT * FROM roboty, klienci WHERE roboty.id_klient=klienci.id_klient AND roboty.id_roboty=$query_data[1]";
$wynik2=mysql_query("$query2");
while($query_data2=mysql_fetch_row($wynik2)) {

echo "<div align=left>dotyczy: <a href=wysw_robota_full.php?id_roboty=" . $query_data2[0] . ">RG" . $query_data2[1] . "/" . $query_data2[2] . "#" . $query_data2[13] . "#" . $query_data2[22] . "#" . $query_data2[6] . "</a>";
echo "</div><br>";

}



echo "<hr width=600 color=black>";

}
}
echo "</td></tr></table>";


$data_plus3 = strtotime(0)+21*24*60*60;



echo "<center><hr color=black width=700><b><center>Najblizsze zadania ( mniej niz 21 dni )</center></b><hr color=black width=700><br>";


$query="SELECT * FROM zadania WHERE zadania.termin<=$data_plus3 AND zadania.termin>$data_plus2 AND zadania.wykonal='' AND zadania.odpowiedzialny<>'KTR' AND zadania.termin>" . strtotime(0) . " ORDER BY zadania.odpowiedzialny";

$wynik=mysql_query($query);
if (!($wynik==0)) {
echo "<table cellspacing=0 cellpadding=0><tr><td width=600>";
while ($query_data=mysql_fetch_row($wynik)) {
$query_data[3]=date('Y-m-d', $query_data[3]);

echo $query_data[4] . " - " . $query_data[3];
echo " - " . $query_data[7];

$query2="SELECT * FROM roboty, klienci WHERE roboty.id_klient=klienci.id_klient AND roboty.id_roboty=$query_data[1]";
$wynik2=mysql_query("$query2");
while($query_data2=mysql_fetch_row($wynik2)) {

echo "<div align=left>dotyczy: <a href=wysw_robota_full.php?id_roboty=" . $query_data2[0] . ">RG" . $query_data2[1] . "/" . $query_data2[2] . "#" . $query_data2[13] . "#" . $query_data2[22] . "#" . $query_data2[6] . "</a>";
echo "</div><br>";

}



echo "<hr width=600 color=black>";

}
}
echo "</td></tr></table>";

$data_plus4 = strtotime(0)+30*24*60*60;



echo "<center><hr color=black width=700><b><center>Najblizsze zadania ( mniej niz 30 dni )</center></b><hr color=black width=700><br>";


$query="SELECT * FROM zadania WHERE zadania.termin<=$data_plus4 AND zadania.termin>$data_plus3 AND zadania.wykonal='' AND zadania.odpowiedzialny<>'KTR' AND zadania.termin>" . strtotime(0) . " ORDER BY zadania.odpowiedzialny";

$wynik=mysql_query($query);
if (!($wynik==0)) {
echo "<table cellspacing=0 cellpadding=0><tr><td width=600>";
while ($query_data=mysql_fetch_row($wynik)) {
$query_data[3]=date('Y-m-d', $query_data[3]);

echo $query_data[4] . " - " . $query_data[3];
echo " - " . $query_data[7];

$query2="SELECT * FROM roboty, klienci WHERE roboty.id_klient=klienci.id_klient AND roboty.id_roboty=$query_data[1]";
$wynik2=mysql_query("$query2");
while($query_data2=mysql_fetch_row($wynik2)) {

echo "<div align=left>dotyczy: <a href=wysw_robota_full.php?id_roboty=" . $query_data2[0] . ">RG" . $query_data2[1] . "/" . $query_data2[2] . "#" . $query_data2[13] . "#" . $query_data2[22] . "#" . $query_data2[6] . "</a>";
echo "</div><br>";

}



echo "<hr width=600 color=black>";

}
}
echo "</td></tr></table>";

include("down.php");

//UPDATE klienci SET klienci.nazwa="Szymon Golus" where klienci.id_klient=3

?>
</html>
