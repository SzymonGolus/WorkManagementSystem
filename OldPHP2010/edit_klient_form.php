<?php
include("up.php");
include("connect.php");

$query="SELECT * FROM klienci WHERE id_klient=" . $_GET[id_klient];
$wynik=mysql_query("$query");
while($query_data=mysql_fetch_row($wynik)) {

echo "<center><form  method='POST' action='edit_klient.php'>";
echo "Imiê i nazwisko/Nazwa firmy:<input name='nazwa' type='text' size='50' value='" . $query_data[1] . "'><br>";
echo "Nazwa (skrot):<input type=text name=nazwa_skrot size='50' value='" . $query_data[8] . "'><br>";
echo "Adres:<input name='adres' type='text' size='50' value='" . $query_data[2] . "'><br>";
echo "NIP:<input name='nip' type='text' size='50' value='" . $query_data[3] . "'><br>";
echo "Osoba kontaktowa:<input name='osoba' type='text' size='6' value='" . $query_data[4] . "'><br>";
echo "Telefon kontaktowy:<input name='telefon' type='text' size='15' value='" . $query_data[5] . "'><br>";
echo "Adres e-mail:<input name='email' type='text' size='50' value='" . $query_data[6] . "'><br>";
echo "Komentarz:<br><textarea name=komentarz type=textarea cols=60 rows=7>" . $query_data[7] . "</textarea><br><br>";
echo "<input type=hidden name=id_klient value=" . $query_data[0] . ">";	
echo "KOD: <input name=kod type=password size=3> <input type='submit' name='Submit' value='Zapisz'></form></center>";

}
include("down.php");

?>