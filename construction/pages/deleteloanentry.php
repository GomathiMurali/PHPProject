<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM expense WHERE expense_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	$rs = $result->fetch();
	$trans=$rs['trans'];
	if($trans=="Cash")
	{
		$result = $db->prepare("DELETE FROM loanentry WHERE expense_id= :memid");
		$result->bindParam(':memid', $id);
		$result->execute();
		$result = $db->prepare("DELETE FROM expense WHERE expense_id= :memid");
		$result->bindParam(':memid', $id);
		$result->execute();
	}
	else if($trans=="Bank")
	{
		$result = $db->prepare("DELETE FROM loanentry WHERE expense_id= :memid");
		$result->bindParam(':memid', $id);
		$result->execute();
		$result = $db->prepare("DELETE FROM expense WHERE expense_id= :memid");
		$result->bindParam(':memid', $id);
		$result->execute();
		$result = $db->prepare("DELETE FROM bankentry WHERE expense_id= :memid");
		$result->bindParam(':memid', $id);
		$result->execute();
	}
?>