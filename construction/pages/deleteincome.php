<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM income WHERE income_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	$result = $db->prepare("DELETE FROM bankentry WHERE income_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: income.php");
?>