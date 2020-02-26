<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM messsubcatagory WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: messsubcatagory.php");
?>