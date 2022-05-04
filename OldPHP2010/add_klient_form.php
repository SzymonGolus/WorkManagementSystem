<?php
include("up.php");
echo "<center><form  method='POST' action='add_klient.php'>";

echo "<table width=700 border=0 cellspacing=0 cellpadding=0><tr><td><div align=center><p><strong>Dodawanie klienta:</strong></p>";
echo "<table width=510 border=0 cellspacing=0 cellpadding=0>";

echo "<tr><td width=200>Pe³na nazwa/Imie i nazwisko</td>";
echo "<td width=310 align=center><input name='nazwa' type='text' size='50'></td></tr>";

echo "<tr><td width=200>Nazwa (skrot):</td>";
echo "<td width=310 align=center><input name=nazwa_skrot type=text size=50></td></tr>";

echo "<tr><td width=200>Pe³en adres:</td>";
echo "<td width=310 align=center><input name='adres' type='text' size='50'></td></tr>";

echo "<tr><td width=200>NIP:</td>";
echo "<td width=310 align=center><input name='nip' type='text' size='50'></td></tr>";

echo "<tr><td width=200>Osoba kontaktowa:</td>";
echo "<td width=310 align=center><input name='osoba' type='text' size='50'></td></tr>";

echo "<tr><td width=200>Telefon:</td>";
echo "<td width=310 align=center><input name='telefon' type='text' size='50'></td></tr>";

echo "<tr><td width=200>E-mail:</td>";
echo "<td width=310 align=center><input name='email' type='text' size='50'></td></tr>";


echo "</table>";
echo "Komentarz:<br><textarea name=komentarz type=textarea cols=60 rows=7></textarea><br><br>";	
echo "KOD: <input name='kod' type='password' size='3'> ";
echo "<input type='submit' name='Submit' value='Dodaj klienta'></td></tr></table></form></center>";
include("down.php");
?>