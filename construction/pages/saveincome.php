<?php
session_start();
include('connect.php');
$a = $_POST['name'];
$b = $_POST['date'];
$c = $_POST['description'];
$d = $_POST['amount'];
$e = $_POST['sc'];
$g = $_POST['trans'];
$h = $_POST['bank'];
$i = $_POST['school'];
$j = $_POST['income_id'];
//$f = -$d;
$f="";
$tq=0;
$sql = "INSERT INTO income (income_id,catagory_name,date,description,amount,subcatagory,trans,bank,school) VALUES (?,?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($j,$a,$b,$c,$d,$e,$g,$h,$i));
//
/* if($g=='Bank') {
$sql = "INSERT INTO bankentry (account,date,description,amount,balance,accno) VALUES (?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($e,$b,$c,$d,$f,$e));} */

if($g=='Bank') {
$ss="INSERT INTO bankentry (income_id,school,account,date,description,amount,debit_amount,balance,accname,accno,expense_id) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
$q = $db->prepare($ss);
$q->execute(array($j,$i,$h,$b,$c,$d,$f,$d,$h,$h,$tq));}
header("location: income.php");
?>