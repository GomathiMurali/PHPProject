<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['date'];
$c = $_POST['description'];
$d = $_POST['amount'];
$e = $_POST['sc'];
// query
$sql = "UPDATE expense
        SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?
		WHERE ex_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$id));
header("location: expense.php");

?>