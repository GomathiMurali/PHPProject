<?php
session_start();
include('connect.php');
$a = $_POST['sno'];
$b = $_POST['invoice'];
$c = $_POST['master_type'];
$d = $_POST['quantity'];
$e = $_POST['rate'];
$g = $_POST['medicine'];
$i = $_POST['radi_rate'];
$j = $_POST['total'];
$k = $_POST['grand_total'];
$sql = "INSERT INTO addunit_new (sno, invoice, master_type, quantity, rate, medicine, radi_rate, total, grand_total) VALUES (?,?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$g,$i,$j,$k));
header("location: uom.php");
?>