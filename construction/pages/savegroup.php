<?php
session_start();
include('connect.php');
//$id =$_POST['id'];
$sno = $_POST['sno'];
$date = $_POST['date'];
$monor = $_POST['monor'];
$binder = $_POST['binder'];
$plumber= $_POST['plumber'];
$painter = $_POST['painter'];
$others= $_POST['others'];
$remarks = $_POST['remarks'];
//$i = $_POST['total'];
$sql = "INSERT INTO addgroup1 (sno, date, monor, binder, plumber, painter, others, remarks) VALUES (?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($sno,$date,$monor,$binder,$plumber,$painter,$others,$remarks));
header("location: group.php");
?>





