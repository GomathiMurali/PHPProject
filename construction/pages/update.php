<?php
session_start();
include('connect.php');
$a = $_POST['invoice'];
$b = $_POST['product_code'];
$c = $_POST['qty'];
$e = $_POST['status'];

$f = $_POST['remark'];
$result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
}

//edit qty
if($e=='Received'){
$sql = "UPDATE products 
        SET qty_left=qty_left+?
		WHERE product_code=?";
$q = $db->prepare($sql);
$q->execute(array($c,$b));
}
if($e=='Returned'){
$sql = "UPDATE products 
        SET qty_left=qty_left-?
		WHERE product_code=?";
$q = $db->prepare($sql);
$q->execute(array($c,$b));
}

// query
$sql1 = "UPDATE purchases_item 
        SET d_status=?
		WHERE invoice = ? AND name = ? ";
$q1 = $db->prepare($sql1);
$q1->execute(array($e,$a,$b));


$sql2 = "UPDATE purchases
        SET d_status=?, remark = ?
		WHERE invoice_number = ? AND p_name = ? ";
$q2 = $db->prepare($sql2);
$q2->execute(array($e,$f,$a,$b));


header("location:  purchaseslist.php");


?>