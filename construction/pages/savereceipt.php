<?php
session_start();
include('connect.php');
$a = $_POST['voucherno'];
$b = $_POST['date'];
$c = $_POST['acchead'];
$d = $_POST['towards'];
$e = $_POST['amount'];
$sql = "INSERT INTO receipt (voucherno,date,acchead,towards,amount) VALUES (?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e));
header("location: printreceipt.php?voucherno=$a&date=$b&acchead=$c&towards=$d&amount=$e");
?>