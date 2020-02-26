<?php
	include('connect.php');
	$id=$_GET['id'];
	$status=$_GET['status'];
	if($status=="Pending")
	{
	$result = $db->prepare("DELETE FROM mess_supervisor WHERE mess_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	$result = $db->prepare("DELETE FROM mess_file WHERE mess_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: messpurchase.php");
	}
	else if($status=="Paid")
	{
	$result = $db->prepare("DELETE FROM mess_supervisor WHERE mess_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: messpurchase.php");
	}
?>