<?php
include("up.php");
include("connect.php");

$query="SELECT MAX(nr_roboty) FROM roboty WHERE rok=" . date('Y');
$wynik=mysql_query("$query");
$rok=mysql_fetch_row($wynik);
$rok[0]++;

echo "<center>";
echo "<table width=700 border=0 cellspacing=0 cellpadding=0><tr><td><div align=center><p><strong>Dodawanie roboty:<br><br>";
echo "Numer roboty: <font size='+2'>RG" . $rok[0] . "/" . date('Y') . "</font>";
echo "</strong></p>";
echo "<center><table width=480 border=0 cellspacing=0 cellpadding=0><tr><td width=240 align=left valign=middle>";
echo "<form  method=POST action=add_robota.php>";
echo "<br>Zleceniodawca:";
echo "</td><td width=310 align=center valign=middle>";
echo "<select name=id_klient>";
$query="SELECT id_klient, nazwa FROM klienci ORDER BY klienci.nazwa";
$wynik=mysql_query("$query");
while($query_data=mysql_fetch_row($wynik)) {
echo "<option value=" . $query_data[0] . ">" . $query_data[1] . "</option>";
}
$dat=mktime();
echo "</select>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";
echo "Obiekt:";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=obiekt type=text size=50>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";
echo "Obiekt(skrot):";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=obiekt_skrot type=text size=50>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";
echo "Asortyment:";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=asortyment type=text size=50>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";
echo "Klucz asortymentu:";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=id_asort type=text size=50>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";
echo "Data zakonczenia<br>(RRRR-MM-DD):";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=data_zak type=text size=50>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";	
echo "Wykonawca:";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=wykonawca type=text size=50>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";	
echo "Nr DZ:";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=dz type=text size=50>";
echo "</td></tr><tr><td width=170 align=left valign=middle>";
echo "Data zgloszenia";
echo "</td><td width=310 align=center valign=middle>";
echo "<input name=data_zgl type=text size=50 value='" . date('Y-m-d') . "'>";
echo "</td></tr></table>";

//echo "<input type=hidden name=data_zgl value=" . $dat . ">";
echo "<input name=nr_roboty type=hidden value=" . $rok[0] . "><input name=rok type=hidden value=" . date('Y') . ">";

echo "Komentarz:<br><textarea name=komentarz cols=60 rows=7></textarea><br><br>";

echo "Robota pilna: ";
echo "<input name=pilna type=checkbox value=1><br>";
echo "KOD: <input name='kod' type='password' size='3'> ";
echo "<input type=submit name=Submit value='Dodaj robote'></form></center>";
include("down.php");


?>