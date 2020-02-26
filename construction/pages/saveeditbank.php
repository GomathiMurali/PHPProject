<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['accno'];
$c = $_POST['branch'];
$d = $_POST['ifsc'];
$e = $_POST['holder'];
// query
$sql = "UPDATE addbank 
        SET bankname=?, accno=?, branch=?, ifsc=?, holder=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$id));
header("location: addbank.php");

?>