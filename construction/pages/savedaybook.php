<?php
session_start();
include('connect.php');

$a = $_POST['date'];
$b = $_POST['obh'];
$c = $_POST['obb'];
$d = $_POST['tincome'];
$e= $_POST['texpense'];
$f = $_POST['cbh'];
$g = $_POST['cbb'];
$h = $_POST['account'];
$i = $_POST['amo'];
$j = $f-$i;
$k = $g+$i;
$l = 'Income&Expense in Hand Transaction';
$m = $k+$j;
//
$sql = "INSERT INTO bankentry (account,date,amount,balance,description) VALUES (:a,:b,:c,:d, :e)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$h,':b'=>$a,':c'=>$i,':d'=>$i, ':e'=>$l));
//
$sql = "INSERT INTO daybook (date,texpense,tincome,balancehand,balancebank,thand,tbank,totalamount) VALUES (:a,:b,:c,:d,:e,:f,:g,:h)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$e,':c'=>$d,':d'=>$f,':e'=>$g,':f'=>$j,':g'=>$k,':h'=>$m));
header("location:home.php");



?>