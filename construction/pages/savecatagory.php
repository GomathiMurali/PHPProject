<?php
session_start();
include('connect.php');
$a = $_POST['sno'];
$b = $_POST['bill_num'];
$c = $_POST['egg_type'];
$d = $_POST['total_tray'];
$e = $_POST['total_egg'];
$f = $_POST['egg_rate'];
$g = $_POST['avg_rate'];
$h = $_POST['total'];
$i = $_POST['grand_total'];

$sql = "INSERT INTO catagory_new (sno, bill_num, egg_type, total_tray, total_egg, egg_rate, avg_rate, total, grand_total) VALUES (?,?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$i));
header("location: catagory.php");
?>