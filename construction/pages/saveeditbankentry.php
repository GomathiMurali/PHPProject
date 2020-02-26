<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['school'];
$b = $_POST['name'];
$c = $_POST['date'];
$d = $_POST['description'];
$e = $_POST['camount'];
$f = $_POST['damount'];
$g = $e-$f;

$i = $_POST['no1'];
// query
$sql = "UPDATE bankentry
        SET school=?, account=?, date=?, description=?, amount=?, debit_amount=?, balance=?, accname=?, accno=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$i,$i,$id));
header("location: bankentry.php?no=$i");

?>