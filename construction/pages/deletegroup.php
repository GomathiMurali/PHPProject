<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM addgroup1 WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: group.php");
?>