<?php
session_start();
include('connect.php');
$a = $_POST['name'];
$b = $_POST['type'];
$c = $_POST['amount'];
$d = $_POST['date'];
$sql = "INSERT INTO assets (name,type,amount,date) VALUES (?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d));
header("location: assets.php");
?>