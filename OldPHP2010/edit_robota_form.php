<?php
include("up.php");
include("connect.php");

$query="SELECT * FROM roboty WHERE id_roboty=$_GET[id_roboty]";
$wynik=mysql_query("$query");
$query_data=mysql_fetch_row($wynik);


echo "<center>";
echo "<table width=700 border=0 cellspacing=0 cellpadding=0><tr><td><div align=center><p><strong>Edycja roboty roboty:<br><br>";
echo "Numer roboty: <font size='+2'>RG" . $query_data[1] . "/" . $query_data[2] . "</font>";
echo "</strong></p>";
echo "<center><table width=480 border=0 cellspacing=0 cellpadding=0><tr><td width=240 align=left valign=middle>";
echo "<form  method=POST action=edit_robota.php>";
echo "<br>Zleceniodawca:";
echo "</td><td width=310 align=center valign=middle>";
echo "<select name=id_klient>";
$query2="SELECT id_klient, nazwa FROM klienci ORDER BY klienci.nazwa";
$wynik2=mysql_query("$query2");
while($query_data2=mysql_fetch_row($wynik2)) {
echo "<option value=" . $query_data2[0];
if ($query_data[3]==$query_data2[0]) {
echo " selected ";
}
echo ">" . $query_data2[1] . "</option>";
}

echo "</select>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";
echo "Obiekt:";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=obiekt type=text size=50 value='";
echo $query_data[7];
echo "'>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";
echo "Obiekt(skrot):";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=obiekt_skrot type=text size=50 value='";
echo $query_data[13];
echo "'>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";
echo "Asortyment:";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=asortyment type=text size=50 value='";
echo $query_data[5];
echo "'>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";
echo "Klucz asortymentu:";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=id_asort type=text size=50 value='";
echo $query_data[6];
echo "'>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";
echo "Data zakonczenia<br>(RRRR-MM-DD):";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=data_zak type=text size=50 value='";
if (!($query_data[9]==0)) {
echo date('Y-m-d', $query_data[9]);
}
echo "'>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";	
echo "Wykonawca:";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=wykonawca type=text size=50 value='";
echo $query_data[4];
echo "'>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";	
echo "Nr DZ:";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=dz type=text size=50 value='";
echo $query_data[12];
echo "'>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";
echo "Data zgloszenia";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=data_zgl type=text size=50 value='";
echo date('Y-m-d', $query_data[8]);
echo "'>";
echo "</td></tr></table>";

//echo "<input type=hidden name=data_zgl value=" . $dat . ">";

echo "Komentarz:<br><textarea name=komentarz cols=60 rows=7>" . $query_data[11] . "</textarea><br><br>";

echo "Robota pilna: ";
echo "<input name=pilna type=checkbox value=1";
if ($query_data[10]=="1") {
echo " checked";
}
echo "><br>";
echo "<input type=hidden name=id_roboty value=" . $_GET[id_roboty] . ">";
echo "KOD: <input name=kod type=password size=3> <input type=submit name=Submit value='Zapisz zmiany'></form></center>";

include("down.php");
?>