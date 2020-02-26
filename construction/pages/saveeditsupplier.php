<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
//$b = $_POST['address'];
$c = $_POST['gstno'];
$d = $_POST['panno'];
$e = $_POST['phone'];
$f = $_POST['cname'];
$g = $_POST['mobile'];
$h = $_POST['email'];
$i = $_POST['emailcc'];

// query
$sql = "UPDATE supliers 
        SET suplier_name=?, gstno=?, panno=?, phone=?, cname=?, mobile=?, email=?, emailcc=?
		WHERE suplier_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$i,$id));
header("location: supplier.php");

?>