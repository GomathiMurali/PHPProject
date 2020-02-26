<?php
session_start();
include('connect.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['gstno'];
$d = $_POST['panno'];
$e = $_POST['phone'];
$f = $_POST['bank'];
$g = $_POST['gsttype'];
$h = $_POST['cname'];
$i = $_POST['mobile'];
$j = $_POST['email'];
$k = $_POST['emailcc'];
$l = $_POST['accno'];
$m = $_POST['branch'];
$n = $_POST['ifsc'];
$sql = "INSERT INTO supliers (suplier_name,address,gstno,panno,phone,bank,gsttype,cname,mobile,email,emailcc,accno,branch,ifsc) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n));
header("location: supplier.php");
?>