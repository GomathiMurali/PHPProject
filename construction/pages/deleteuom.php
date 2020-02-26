<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM addunit_new WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: uom.php");
?>