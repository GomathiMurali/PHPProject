<?php
session_start();
include('connect.php');
$a = $_POST['school'];
$b = $_POST['name'];
$c = $_POST['date'];
$d = $_POST['description'];
$e = $_POST['camount'];
$f = $_POST['damount'];
$g = $e-$f;

$i = $_POST['no1'];

$sql = "INSERT INTO loanentry (school,account,date,description,amount,debit_amount,balance,accname,accno) VALUES (?,?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$i,$i));

//query
//$sql = "INSERT INTO balance (date,credit,debit,balance) SELECT date,SUM(amount),SUM(debit_amount),SUM(balance) FROM bankentry GROUP BY date";
//$q = $db->prepare($sql);
//$q->execute();
$sql = "INSERT INTO bankentry (school,account,date,description,amount,debit_amount,balance,accname,accno) VALUES (?,?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$d,$c,$b,$e,$f,$g,$d,$d));
header("location: loanentry.php?no=$i");

?>