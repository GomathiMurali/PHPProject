<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['type'];
$c = $_POST['amount'];
$d = $_POST['date'];
// query
$sql = "UPDATE assets 
        SET name=?, type=?, amount=?, date=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$id));
header("location: assets.php");

?>