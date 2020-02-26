<?php
session_start();
include('connect.php');
$b = $_POST['week'];
$c = $_POST['days'];
$d = $_POST['oneday'];
$e = $_POST['total_feeds'];
$f = $_POST['chicken_weight'];

$sql = "INSERT INTO default_statement (week, days, oneday, total_feeds, chicken_weight) VALUES (?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($b,$c,$d,$e,$f));
header("location: group.php");
?>