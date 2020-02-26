<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['phone'];
$d = $_POST['memno'];
$e = $_POST['tname'];
$f = $_POST['pname'];
$g = $_POST['gstno'];
$h = $_POST['panno'];
$i = $_POST['mobile'];
$j = $_POST['email'];
// query
$sql = "UPDATE customer 
        SET customer_name=?, address=?, contact=?, membership_number=?, middle_name=?, last_name=?, gstno=?, panno=?, mobile=?, email=?
		WHERE customer_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$id));
header("location: customer.php");

?>