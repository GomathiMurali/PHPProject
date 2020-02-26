<?php
$hostname="localhost";
$username="root";
$password="";
$db = "bss_poultry_ppf";
$dbh = new PDO("MySQL:host=$hostname;dbname=$db", $username, $password);
foreach($dbh->query('SELECT SUM(total_birds) 
FROM percentage') as $row) {
echo "<tr>";
echo "<td>" . $row['SUM(total_birds)'] . "</td>";
echo "</tr>"; 
}
?>