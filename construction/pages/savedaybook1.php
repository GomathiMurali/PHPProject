<?php
session_start();
include('connect.php');

$a = $_POST['date'];
$b = $_POST['obh'];
$c = $_POST['obb'];



//
$sql = "INSERT INTO daybook (date,thand,tbank) VALUES (:a,:b,:c)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c));
header("location:daybookentrydate.php");



?>