<?php
	include('connect.php');
	$c=$_GET['invoice'];
	$qty=$_GET['qty'];
	$wapak=$_GET['code'];
    $result = $db->prepare("DELETE FROM purchases WHERE p_name= :memid");
	$result->bindParam(':memid', $wapak);
	$result->execute();
	header("location: purchase.php?invoice=$c&p_name=$wapak");
?>