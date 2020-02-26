<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['school'];
$b = $_POST['name'];
$c = $_POST['no'];
$d = $_POST['hname'];

// query
$sql = "UPDATE loanbank 
        SET school=?, accname=?, accno=?, holder=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$id));
header("location: addloanbank.php");

?>