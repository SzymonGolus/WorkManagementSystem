<?php

include("connect.php");



$query="SELECT roboty.nr_roboty, roboty.rok, roboty.obiekt, klienci.nazwa FROM klienci, roboty WHERE roboty.id_klient=klienci.id_klient AND klienci.nazwa<>'XXXX'";


$wynik=mysql_query($query);
while($query_data=mysql_fetch_row($wynik)) {

echo "<table width=650 height=100 border=1 cellspacing=0 cellpadding=3><tr><td width=100><table width=100 border=0 cellspacing=0 cellpadding=0><tr><td width=100 align=center valign=middle>";
echo "<span contenteditable style='filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=1);'>";
echo "<b><font size=+3>RG</font></b>";
echo "</span>";
echo "</td></tr><tr><td width=100 align=center valign=middle>";
echo "<span contenteditable style='filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=1);'>";
echo "<b><font size=+2>" . $query_data[0] . "<hr width=50>" . $query_data[1] . "</font></b>";
echo "</span>";
echo "</td></tr></table></td><td width=550><div align=center valign=middle><b><font size=+3><b>" . $query_data[2] . "</b></font><hr width=400><font size=+2>" . $query_data[3] . "</font></b></div></td></tr></table>";
echo "<br>";

}
?>