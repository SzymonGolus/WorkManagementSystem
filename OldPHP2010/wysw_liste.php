<?php
include("up.php");
include("connect.php");



$query="SELECT * FROM roboty, klienci, status WHERE roboty.id_klient=klienci.id_klient AND status.id_roboty=roboty.id_roboty AND status.dodatkowe='' ORDER BY rok DESC, nr_roboty DESC";

$wynik=mysql_query("$query");

$ile_robot=mysql_num_rows($wynik);

while($query_data=mysql_fetch_row($wynik)) {

echo "<div align=left>RG" . $query_data[1] . "/" . $query_data[2] . "#" . $query_data[13] . "#" . $query_data[22] . "#" . $query_data[6];
echo "</div>";
 
}
include("down.php");
?>