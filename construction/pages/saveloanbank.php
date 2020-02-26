<?php
session_start();
include('connect.php');
$a = $_POST['school'];
$b = $_POST['name'];
$c = $_POST['no'];
$d = $_POST['hname'];
$sql = "INSERT INTO loanbank (school,accname,accno,holder) VALUES (?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d));
header("location: addloanbank.php");
?>