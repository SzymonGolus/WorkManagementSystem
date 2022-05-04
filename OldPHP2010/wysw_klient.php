<?php
include("up.php");
include("connect.php");


echo "<center><hr color=black width=700><b>Klienci</b><hr color=black width=700>";
echo "<form  method=POST action=wysw_klient.php><select name=po_czym><option value=nazwa>Nazwa klienta</option><br><option value=adres>Adres klienta</option><br><option value=telefon>Telefon klienta</option><br><option value=email>E-mail klienta</option><br></select>";
echo "<input type=hidden name=wyszukane value=1><input type=text name=czego size=20><input type=submit name=Submit value='Szukaj klienta'></form>";
echo "<hr color=black width=700>";

if ($_POST[wyszukane]==0) {
$query="SELECT * FROM klienci ORDER BY id_klient";
}
if (!($_POST[wyszukane]==0)) {
$query="SELECT * FROM klienci WHERE " . $_POST[po_czym] . " LIKE '%" . $_POST[czego] . "%' ORDER BY id_klient";
}

$wynik=mysql_query("$query");
while($query_data=mysql_fetch_row($wynik)) {

echo "<table width=600 border=1 cellpadding=0 cellspacing=0 bordercolor=#000000><tr align=center valign=top><td width=114 style='border: 1px outset #000000;'><div align=center><font face=garamond>Numer klienta</font></div></td>";
echo "<td width=130 bordercolor=#000000  style='border: 1px outset #000000;'><div align=center><font face=garamond>" . $query_data[0] . "</font></div></td><td width=79 bordercolor=#000000 style='border: 1px outset #000000;'><div align=center><font face=garamond>Nazwa</font></div></td>";
echo "<td width=267 bordercolor=#000000  style='border: 1px outset #000000;'><div align=center><font face=garamond>" . $query_data[1] . "</font></div></td></tr><tr align=center valign=top><td bordercolor=#000000  style='border: 1px outset #000000;'><div align=center><font face=garamond>Adres</font></div></td>";
echo "<td colspan=3 bordercolor=#000000  style='border: 1px outset #000000;'><div align=center><font face=garamond>" . $query_data[2] . "</font></div><div align=center></div><div align=center></div></td>";
echo "</tr><tr align=center valign=top><td  style='border: 1px outset #000000;'><div align=center><font face=garamond>telefon</font></div></td><td colspan=3  style='border: 1px outset #000000;'><div align=center></div><div align=center></div><div align=center>";
echo $query_data[5] . "</div></td></tr><tr align=center valign=top><td  style='border: 1px outset #000000;'><div align=center><font face=garamond>email</font></div></td><td colspan=3  style='border: 1px outset #000000;'><div align=center></div>";
echo "<div align=center></div><div align=center>" . $query_data[6] . "</div></td></tr><tr align=center valign=top><td  style='border: 1px outset #000000;'><div align=center><font face=garamond>Komentarz</font></div></td><td colspan=3  style='border: 1px outset #000000;'><div align=center></div>";
echo "<div align=center></div><div align=center>" . $query_data[7] . "</div></td></tr><tr align=center valign=top><td  style='border: 1px outset #000000;'><div align=center><font face=garamond>Roboty</font></div></td><td colspan=3  style='border: 1px outset #000000;'><div align=center></div>";
echo "<div align=center></div><div align=center>";
$query2="SELECT roboty.nr_roboty, roboty.rok, roboty.obiekt, klienci.nazwa_skrot, roboty.id_asort, roboty.id_roboty FROM roboty, klienci WHERE roboty.id_klient=klienci.id_klient AND roboty.id_klient=" . $query_data[0] . " ORDER BY data_zak";

$wynik2=mysql_query("$query2");

while($query_data2=mysql_fetch_row($wynik2)) {

echo "<a href=wysw_robota_full.php?id_roboty=" . $query_data2[5] . "><font face=courier>RG" . $query_data2[0] . "/" . $query_data2[1] . "#" . $query_data2[2] . "#" . $query_data2[3] . "#" . $query_data2[4] . "</a></font><br>";

}

echo "</div></td></tr>";
echo "</table>";
echo "<a href='edit_klient_form.php?id_klient=" . $query_data[0] . "'>Edytuj dane o kliencie</a><br>";

echo "<a href='usun_klient.php?id_klient=" . $query_data[0] . "'>USUN KLIENTA!</a><br>";

echo "<hr color=black width=700>";

}
include("down.php");
?>