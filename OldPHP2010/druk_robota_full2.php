<?php

include("connect.php");


echo "<table><tr><td><div align=left><center>";

$query="SELECT * FROM roboty, klienci WHERE roboty.id_klient=klienci.id_klient AND roboty.id_roboty=" . $_GET[id_roboty];
$wynik = mysql_query($query);
$query_data=mysql_fetch_row($wynik);

echo "<table width='700' border='0' align='center' cellpadding='0' cellspacing='0'><tr><td align=left valign='top'><img src='logo.jpg' width=250></td><td><div align='right'>";
echo "<table width='250' border='1' cellspacing='0' cellpadding='0'><tr><td colspan='2'><div align='center'><strong><font face='garamond'>";
echo "<font size='+2'>RG" . $query_data[1] . "/" . $query_data[2] . "</font>";
echo "</font></strong></div></td></tr><tr><td width='132'><div align='center'><font face='garamond' size='+1'>Data zg³oszenia:</font></div></td><td width='112'><div align='center'><font face='garamond' size='+1'>";
$query_data[8]=date('Y-m-d', $query_data[8]);
echo $query_data[8];
echo "</font></div></td></tr><tr><td><div align='center'><font face='garamond' size='+1'>Data zakoñczenia:</font></div></td><td><div align='center'><font face='garamond' size'+1'>";

if (!($query_data[9]=='0')) {
$query_data[9]=date('Y-m-d', $query_data[9]);
echo $query_data[9];
}
else {
echo "";
}
echo "</font></div></td></tr><tr><td><div align='center'><font face='garamond' size='+1'>Wykonawca</font></div></td><td><div align='center'><font face='garamond' size='+1'>";
echo $query_data[4];
echo "</font></div></td></tr><tr><td colspan='2'><p align='center'><font face='garamond' size='+1'>";
echo "Data wydruku: " . date('Y-m-d');
echo "</font></p></td></tr></table></tr></table>";

echo "<br><br></b><font face='garamond' size='+3'><center>"; 
echo $query_data[15];
echo "</center></font></b><br><br>";

echo "<br><div align='center'>";
echo "<table width='700' border='1' cellspacing='0' cellpadding='3'><tr><td width='100'><div align='right'><strong><font face='garamond'>Obiekt:</font></strong></div></td><td width='574'><strong><font face='garamond'>";
echo $query_data[7];
echo "</font></strong></td></tr><tr><td><div align='right'><strong><font face='garamond'>Asortyment:</font></strong></div></td><td><strong><font face='garamond'>";
echo $query_data[5];
echo "</font></strong></td></tr><tr><td><div align='right'><strong><font face='garamond'>Komentarz:</font></strong></div></td><td><strong><font face='garamond'>";
echo $query_data[11];
echo "</font></strong></td></tr><tr><td><div align='right'><strong><font face='garamond'>Kod roboty:</font></strong></div></td><td><strong><font face='garamond'>";
echo "RG" . $query_data[1] . "-" . $query_data[2] . "#" . $query_data[13] . "#" . $query_data[22] . "#" . $query_data[6];
echo "</font></strong></td></tr><tr><td colspan='2'><font face='garamond'><strong>";
echo "Robota pilna: ";
if ($query_data[10]==1) {
echo "TAK";
}
else {
echo "NIE";
}
echo "; Numer DZ: " . $query_data[12];
echo "</strong></font></td></tr></table><font face='garamond'><br></font>";

//Zleceniodawca

echo "<table width='700' border='1' cellspacing='0' cellpadding='3'><tr><td colspan='2'><div align='center'><font face='garamond'><strong>Zleceniodawca - dane do faktury</strong></font></div></td>";
echo "</tr><tr><td width='150'><div align='right'><strong><font face='garamond'>Pe³na nazwa:</font></strong></div></td><td width='580'><font face='garamond'>";
echo $query_data[15];
echo "</font></td></tr><tr><td><div align='right'><strong><font face='garamond'>Adres:</font></strong></div></td><td><font face='garamond'>";
echo $query_data[16];
echo "</font></td></tr><tr><td><div align='right'><strong><font face='garamond'>NIP:</font></strong></div></td><td><font face='garamond'>";
echo $query_data[17];
echo "</font></td></tr></table></div></div></td></tr></table>";
echo "<br>";

echo "<table width='700' border='1' cellspacing='0' cellpadding='3'><tr><td colspan='2'><div align='center'><font face='garamond'><strong>Osoba kontaktowa</strong></font></div></td>";

echo "</font></td></tr><tr><td width='150'><div align='right'><strong><font face='garamond'>Imie i nazwisko:</font></strong></div></td><td><font face='garamond'>";
echo $query_data[18];
echo "</font></td></tr><tr><td><div align='right'><strong><font face='garamond'>Telefon:</font></strong></div></td><td><font face='garamond'>";
echo $query_data[19];
echo "</font></td></tr><tr><td><div align='right'><strong><font face='garamond'>E-mail:</font></strong></div></td><td><font face='garamond'>";
echo $query_data[20];
echo "</font></td></tr><tr><td><div align='right'><strong><font face='garamond'>Komentarz:</font></strong></div></td><td><font face='garamond'>";
echo nl2br($query_data[21]);
echo "</font></td></tr></table></div></div></td></tr></table>";


//notatki
$query2="SELECT * FROM notes_roboty WHERE notes_roboty.id_roboty=$_GET[id_roboty] ORDER BY data";//60
$wynik2 = mysql_query($query2);
echo "<br><table width=700 border=1 cellspacing=0 cellpadding=3><tr><td colspan=2><div align=center><font face=garamond><b>Notatki</b><font></div></td></tr>";
if (!($wynik2==0)) {

while ($query_data2=mysql_fetch_row($wynik2)) {

echo "<tr><td width=100><div align=right><font face=garamond>";
$query_data2[2]=date('Y-m-d', $query_data2[2]);
echo $query_data2[2];
echo "</td><td width=600><div align=left>";
echo $query_data2[3];
echo "</td></tr>";

}
}





echo "</div></td></tr></table>";

echo "<br><br><hr align=left width=700>";
echo "<br><hr align=left width=700>";
echo "<br><hr align=left width=700>";

echo "</table>";




?>