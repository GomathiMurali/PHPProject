<?php
session_start();
include('connect.php');
$a = $_POST['year'];
$b = $_POST['date'];
$c = $_POST['malarterm1'];
$d = $_POST['malarterm2'];
$e = $_POST['cbseterm1'];
$f = $_POST['cbseterm2'];
$g = $_POST['kidzterm1'];
$h = $_POST['kidzterm2'];
$sql = "INSERT INTO vanfee (year,date,malarterm1,malarterm2,cbseterm1,cbseterm2,kidzterm1,kidzterm2) VALUES (?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$h));
header("location: vanfees.php");
?>