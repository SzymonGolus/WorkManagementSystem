<?php
include("up.php");
include("connect.php");


echo "<center><hr color=black width=700><b>Robota</b><br><hr color=black width=700>";

echo "<table><tr><td><div align=left><center>";

$query="SELECT * FROM roboty, klienci WHERE roboty.id_klient=klienci.id_klient AND roboty.id_roboty=" . $_GET[id_roboty];
$wynik = mysql_query($query);
$query_data=mysql_fetch_row($wynik);

echo "<table width='700' border='0' align='center' cellpadding='0' cellspacing='0'><tr> <td><div align='right'>";
echo "<table width='250' border='1' cellspacing='0' cellpadding='0'><tr><td colspan='2'><div align='center'><strong><font face='garamond'>";
echo "<font size='+2'>RG" . $query_data[1] . "/" . $query_data[2] . "</font>";
echo "</font></strong></div></td></tr><tr><td width='132'><div align='center'><font face='garamond'>Data zg³oszenia:</font></div></td><td width='112'><div align='center'><font face='garamond'>";
$query_data[8]=date('Y-m-d', $query_data[8]);
echo $query_data[8];
echo "</font></div></td></tr><tr><td><div align='center'><font face='garamond'>Data zakoñczenia:</font></div></td><td><div align='center'><font face='garamond'>";

if (!($query_data[9]=='0')) {
$query_data[9]=date('Y-m-d', $query_data[9]);
echo $query_data[9];
}
else {
echo "";
}
echo "</font></div></td></tr><tr><td><div align='center'><font face='garamond'>Wykonawca</font></div></td><td><div align='center'><font face='garamond'>";
echo $query_data[4];
echo "</font></div></td></tr><tr><td colspan='2'><p align='center'><font face='garamond'>";

echo "<a href='przywroc.php?id_roboty=" . $_GET[id_roboty] . "'>(Przywroc)</a> <a href='druk_robota_full.php?id_roboty=" . $_GET[id_roboty] . "'>(Wersja do druku)</a>";

echo "</font></p></td></tr></table>";

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

//Postep prac

$query0="SELECT * FROM status WHERE id_roboty=$_GET[id_roboty]";
$wynik0=mysql_query("$query0");
$query_data0=mysql_fetch_row($wynik0);

echo "<br><table width=700 border=1 cellspacing=0 cellpadding=3><tr><td colspan=4><div align=center><font face=garamond><strong>Postep prac</strong></font></div></td>";
echo "</tr><tr><td width=150><div align=center><strong><font face=garamond>Etap</font></strong></div></td>";
echo "<td width=100><div align=center><strong><font face=garamond>Wykonany</font></strong></div></td>";
echo "<td width=150><div align=center><strong><font face=garamond>Data wykonania</font></strong></div></td>";
echo "<td width=100><div align=center><strong><font face=garamond>Wykonawca</font></strong></div></td>";
echo "</tr>";

//start

echo "</tr><tr><td width=200><div align=center><font face=garamond>Start</font></div></td>";
echo "<td width=150><div align=center><font face=garamond>";
echo $query_data0[1];
echo "</font></div></td>";
echo "<td width=150><div align=center><font face=garamond>";

if (!($query_data0[1]=='NIE')) {
echo date('Y-m-d', $query_data0[2]);
}

echo "</font></div></td>";
echo "<td width=100><div align=center><font face=garamond>";

echo $query_data0[3];


echo "</font></div></td>";
echo "</tr>";

//materialy

echo "</tr><tr><td width=200><div align=center><font face=garamond>Materialy</font></div></td>";
echo "<td width=150><div align=center><font face=garamond>";
echo $query_data0[4];
echo "</font></div></td>";

echo "<td width=150><div align=center><font face=garamond>";

if (!($query_data0[4]=='NIE')) {
echo date('Y-m-d', $query_data0[5]);
}

echo "</font></div></td>";
echo "<td width=100><div align=center><font face=garamond>";

echo $query_data0[6];

echo "</font></div></td>";
echo "</tr>";

//teren

echo "</tr><tr><td width=200><div align=center><font face=garamond>Pomiar</font></div></td>";
echo "<td width=150><div align=center><font face=garamond>";
echo $query_data0[7];
echo "</font></div></td>";

echo "<td width=150><div align=center><font face=garamond>";

if (!($query_data0[7]=='NIE')) {
echo date('Y-m-d', $query_data0[8]);
}


echo "</font></div></td>";
echo "<td width=100><div align=center><font face=garamond>";

echo $query_data0[9];

echo "</font></div></td>";
echo "</tr>";

//operat

echo "</tr><tr><td width=200><div align=center><font face=garamond>Operat</font></div></td>";
echo "<td width=150><div align=center><font face=garamond>";
echo $query_data0[10];
echo "</font></div></td>";

echo "<td width=150><div align=center><font face=garamond>";

if (!($query_data0[10]=='NIE')) {
echo date('Y-m-d', $query_data0[11]);
}


echo "</font></div></td>";
echo "<td width=100><div align=center><font face=garamond>";

echo $query_data0[12];

echo "</font></div></td>";
echo "</tr>";

//przekazanie

echo "</tr><tr><td width=200><div align=center><font face=garamond>Przekazanie</font></div></td>";
echo "<td width=150><div align=center><font face=garamond>";
echo $query_data0[13];
echo "</font></div></td>";
echo "<td width=150><div align=center><font face=garamond>";

if (!($query_data0[13]=='NIE')) {
echo date('Y-m-d', $query_data0[14]);
}


echo "</font></div></td>";
echo "<td width=100><div align=center><font face=garamond>";

echo $query_data0[15];

echo "</font></div></td>";
echo "</tr>";

//rozliczenie

echo "</tr><tr><td width=200><div align=center><font face=garamond>Rozliczenie</font></div></td>";
echo "<td width=150><div align=center><font face=garamond>";
echo $query_data0[16];
echo "</font></div></td>";
echo "<td width=150><div align=center><font face=garamond>";

if (!($query_data0[16]=='NIE')) {
echo date('Y-m-d', $query_data0[17]);
}


echo "</font></div></td>";
echo "<td width=100><div align=center><font face=garamond>";

echo $query_data0[18];

echo "</font></div></td>";
echo "</tr>";



echo "</table>";








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
echo "</table>";

echo "<br><table width=700 border=1 cellspacing=0 cellpadding=3><tr><td colspan=5><div align=center><font face=garamond><b>Zadania</b><font></div></td></tr>";
echo "<tr><td width=100><center>Dodano</center></td><td width=100><center>Termin</center></td><td width=100><center>Odpowiedzialny</center></td><td width=100><center>Wykona³</center></td><td width=150><center>Data wykonania</center></td></tr>";
$query3="SELECT * FROM zadania WHERE zadania.id_robota=$_GET[id_roboty] ORDER BY id_zadanie";
$wynik3=mysql_query($query3);
if (!($wynik3==0)) {

while ($query_data3=mysql_fetch_row($wynik3)) {
$query_data3[2]=date('Y-m-d', $query_data3[2]);
$query_data3[3]=date('Y-m-d', $query_data3[3]);

echo "<tr><td width=100><center>" . $query_data3[2] ."</center></td><td width=100><center>" . $query_data3[3] . "</center></td>";
echo "<td width=100><center>" . $query_data3[4] . "</center></td><td width=100><center>";

if (!($query_data3[5]==0)) {
echo $query_data3[6];
}
else {
echo "";
}

echo "</center></td><td width=150><center>";

if (!($query_data3[5]==0)) {
echo date('Y-m-d', $query_data3[5]);
}
else {
echo "";
}

echo "</center></td>";



echo "</tr>";
echo "<tr><td colspan=6><center>";
echo $query_data3[7];
echo "<hr width=600 color=black>";
echo "</center></tr></tr>";

}
}

echo "</table>";



//DOKUMENTY

echo "<br><table border=1 cellspacing=0 cellpaddind=3 width=700><tr><td colspan=3><strong><center>Dokumenty</center></strong></td><tr>";
echo "<tr><td width=100 align=center>Data</td><td width=200 align=center>Nazwa</td><td width=400 align=center>Lokalizacja</td></tr>";

$arch_query="SELECT data, forma, lokalizacja FROM archiwum WHERE id_roboty=$_GET[id_roboty] ORDER BY data";
$arch_wynik=mysql_query($arch_query);

if (!($arch_wynik==0)) {
while($arch_data=mysql_fetch_row($arch_wynik)) {

echo "<tr><td width=100 align=center>" . date('Y-m-d', $arch_data[0]) . "</td><td width=200 align=center>" . $arch_data[1] . "</td><td width=400 align=left>" . $arch_data[2] . "</td></tr>";

}
}
echo "</table>";

//DOKUMENTY END

//DOKUMENTY ADD

echo "<br><br><form method=POST action=add_dok.php><input type=hidden name=id_roboty value=" . $_GET[id_roboty] . "><input type=hidden name=data value=" . mktime() . ">Nazwa: <input type=text name=forma size=20><br>Lokalizacja:<br><textarea name=lokalizacja cols=60 rows=3></textarea><br><input type=submit name=submit value='Dodaj dokument'></form>";

//DOKUMENTY ADD END




echo "</div></td></tr></table>";


include("down.php");

?>