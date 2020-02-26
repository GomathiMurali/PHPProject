<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];

// query
$sql = "UPDATE incomesubcatagory 
        SET catagory_name=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$id));
header("location: incomesubcatagory.php");

?>