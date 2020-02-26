<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['sno'];

// query
$sql = "UPDATE addunit_new 
        SET sno=?,
        invoice=?,
        master_type=?,
        quantity=?,
        rate=?,
        medicine=?,
        radi_rate=?,
        total=?,
        grand_total=?,
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$id));
header("location: uom.php");

?>