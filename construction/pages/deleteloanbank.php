<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM loanbank WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>