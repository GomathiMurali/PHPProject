<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM expense WHERE expense_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	$result = $db->prepare("DELETE FROM mess_supervisor WHERE expense_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	$result = $db->prepare("DELETE FROM expense_file WHERE expense_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	$result = $db->prepare("DELETE FROM bankentry WHERE expense_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: expense.php");
?>