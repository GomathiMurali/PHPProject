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
if($e=='Returned'){
$sql = "UPDATE products 
        SET qty_left=qty_left+?
		WHERE product_code=?";
$q = $db->prepare($sql);
$q->execute(array($c,$b));
}



header("location:  saleslist.php");


?>