<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM catagory3 WHERE cat_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>