<?php
session_start();
include('connect.php');
$a = $_POST['name'];
$b = $_POST['accno'];
$c = $_POST['branch'];
$d = $_POST['ifsc'];
$e = $_POST['holder'];

$sql = "INSERT INTO addbank (bankname,accno,branch,ifsc,holder) VALUES (?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e));
header("location: addbank.php");
?>