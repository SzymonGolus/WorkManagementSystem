<?php
include("up.php");
include("connect.php");
echo "<center><hr color=black width=700><b>Roboty</b><br><hr color=black width=700>";
echo "<form  method=POST action=wysw_roboty_arch.php><select name=po_czym><option value=nr_roboty>Nr roboty</option><br><option value=nazwa>Nazwa klienta</option><br><option value=asortyment>Asortyment</option><br><option value=obiekt>Obiekt</option><br><option value=dz>Numer DZ</option><br><option value=wykonawca>Wykonawca</option></select>";
echo "<input type=hidden name=wyszukane value=1><input type=text name=czego size=20><input type=submit name=Submit value='Szukaj roboty'></form>";
echo "<hr color=black width=700>";


if ($_POST[po_czym]=="") { 
$po_czym=$_GET[po_czym];
}
else {
$po_czym=$_POST[po_czym];
}
if ($_POST[czego]=="") { 
$czego=$_GET[czego];
}
else {
$czego=$_POST[czego];
}

if ($_POST[wyszukane]=="") { 
$wyszukane=$_GET[wyszukane];
}
else {
$wyszukane=$_POST[wyszukane];
}

if ($_POST[wyszukane]==0) {


$query="SELECT * FROM roboty, klienci, status WHERE roboty.id_klient=klienci.id_klient AND status.id_roboty=roboty.id_roboty AND status.dodatkowe='1' ORDER BY rok DESC, nr_roboty DESC";

}
if ($wyszukane==1) {
	if ($po_czym=="nazwa") {
	$query="SELECT * FROM roboty, klienci, status WHERE klienci.nazwa LIKE '%" . $czego . "%' AND roboty.id_klient=klienci.id_klient AND status.id_roboty=roboty.id_roboty AND status.dodatkowe='1'";
	}

	if (!($po_czym=="nazwa")) {
	$query="SELECT * FROM roboty, klienci, status WHERE roboty." . $po_czym ." LIKE '%" . $czego . "%' AND roboty.id_klient=klienci.id_klient AND status.id_roboty=roboty.id_roboty AND status.dodatkowe='1'";
	}
	if ($po_czym=="nr_roboty") {
	$query="SELECT * FROM roboty, klienci, status WHERE roboty." . $po_czym . "=" . $czego . " AND roboty.id_klient=klienci.id_klient AND status.id_roboty=roboty.id_roboty AND status.dodatkowe='1'";
	}
}


$wynik=mysql_query("$query");


$ile_robot=mysql_num_rows($wynik);

//modyfikacja query
$query= $query . " LIMIT ". $_GET[strona]*30 . ", 30";

$wynik=mysql_query("$query");

$ile_stron=ceil($ile_robot/30);
echo "Strona ";
echo $_GET[strona]+1 . " z " . $ile_stron . " [ ";

for ($i=0; $i<$ile_stron; $i++) {


$link= "wysw_roboty_arch.php?strona=" . $i;
if ($po_czym!="") {
$link.= "&po_czym=" . $po_czym;
}
if ($czego!="") {
$link.= "&czego=" . $czego;
}
if (wyszukano!=0) {
$link.= "&wyszukane=" . $wyszukane;
}


echo "<a href='" . $link . "'>";
echo $i+1; 
echo "</a> ";
}
echo " ]<br><br><table width=600 cellpadding=0 cellspacing=0><tr><td>";
while($query_data=mysql_fetch_row($wynik)) {

echo "<div align=left><a href=wysw_robota_full_arch.php?id_roboty=" . $query_data[0] . ">RG" . $query_data[1] . "/" . $query_data[2] . "#" . $query_data[13] . "#" . $query_data[22] . "#" . $query_data[6] . "</a>";
echo "</div>";
 
}
echo "</td></tr></table>";
include("down.php");
//UPDATE klienci SET klienci.nazwa="Szymon Golus" where klienci.id_klient=3 
?>