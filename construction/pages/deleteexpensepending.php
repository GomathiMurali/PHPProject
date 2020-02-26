<?php
	include('connect.php');
	$id=$_GET['id'];
	$c=$_GET['c'];
	/* $from1	=$_GET['from1'];
	$to1	=$_GET['to1']; */
	$status=$_GET['status'];
	if($status=="Pending")
	{
	$result = $db->prepare("DELETE FROM expensepending WHERE pending_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	$result = $db->prepare("DELETE FROM bill_file WHERE pending_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	/* $result = $db->prepare("DELETE FROM expensepending_balance WHERE pending_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute(); */
	$result = $db->prepare("DELETE FROM expense WHERE pending_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: expensepending.php?no=$c");
	//header("Location: expensepending.php?no=".$c."&frm=".$from1."&too=".$to1);
	}
	else if($status=="Paid")
	{
	$result = $db->prepare("DELETE FROM expensepending WHERE pending_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	$result = $db->prepare("DELETE FROM bill_file WHERE pending_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	$result = $db->prepare("DELETE FROM expense WHERE pending_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	$result = $db->prepare("DELETE FROM bankentry WHERE pending_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	$result = $db->prepare("DELETE FROM mess_supervisor WHERE pending_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	/* $result = $db->prepare("DELETE FROM expensepending_balance WHERE pending_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute(); */
	header("location: expensepending.php?no=$c");
	}
?>