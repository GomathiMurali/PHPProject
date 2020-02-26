<?php
	include('connect.php');
	$id=$_GET['id'];
	$c=$_GET['invoice'];
	//$sdsd=$_GET['dle'];
	$qty=$_GET['qty'];
	$wapak=$_GET['code'];
	$bank=$_GET['bank'];
	//$refinvoice=$_GET['refinvoice'];
	$groupname=$_GET['groupname'];
	//edit qty
	//$sql = "UPDATE products 
			//SET qty_left=qty_left+?
			//WHERE product_code=?";
	//$q = $db->prepare($sql);
	//$q->execute(array($qty,$wapak));

	$result = $db->prepare("DELETE FROM purchaseorder WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: purchasesalesorder.php?id=$sdsd&invoice=$c&bank=$bank&groupname=$groupname");
?>