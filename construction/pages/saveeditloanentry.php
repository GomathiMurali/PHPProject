<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$trans = $_POST['trans'];
$a = $_POST['school'];
$b = $_POST['name'];
$c = $_POST['date'];
$d = $_POST['description'];
$e = $_POST['camount'];
$f = $_POST['damount'];
$g = $e-$f;

$i = $_POST['no1'];
// query
if($trans=="Cash")
{
	$sql = "UPDATE loanentry
			SET school=?, account=?, date=?, description=?, amount=?, debit_amount=?, balance=?, accname=?, accno=?
			WHERE id=?";
	$q = $db->prepare($sql);
	$q->execute(array($a,$b,$c,$d,$e,$f,$g,$i,$i,$id));
	//
	$sql = "UPDATE bankentry
			SET school=?, account=?, date=?, description=?, amount=?, debit_amount=?, balance=?, accname=?, accno=?
			WHERE id=?";
	$q = $db->prepare($sql);
	$q->execute(array($a,$d,$c,$b,$e,$f,$g,$d,$d,$id));
}
else if($trans=="Bank")
{
	$sql = "UPDATE loanentry
			SET school=?, account=?, date=?, description=?, amount=?, debit_amount=?, balance=?, accname=?, accno=?
			WHERE id=?";
	$q = $db->prepare($sql);
	$q->execute(array($a,$b,$c,$d,$e,$f,$g,$i,$i,$id));
	//
	$sql = "UPDATE bankentry
			SET school=?, account=?, date=?, description=?, amount=?, debit_amount=?, balance=?, accname=?, accno=?
			WHERE id=?";
	$q = $db->prepare($sql);
	$q->execute(array($a,$d,$c,$b,$e,$f,$g,$d,$d,$id));
}
header("location: loanentry.php?no=$i");

?>