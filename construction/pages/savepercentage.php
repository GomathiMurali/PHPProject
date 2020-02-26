<?php
session_start();
include('connect.php');
$a = $_POST['sno'];
$c = $_POST['batch1'];
$d = $_POST['total_birds'];
$e = $_POST['total_morality'];
$f = $_POST['percentage'];

$sql = "INSERT INTO percentage (sno, batch1, total_birds, total_morality, percentage) VALUES (?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$c,$d,$e,$f));
header("location: group.php");
?>