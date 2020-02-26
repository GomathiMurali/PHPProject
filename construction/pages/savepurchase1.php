<?php
session_start();
include('connect.php');

$a = $_POST['invoice'];
$b = $_POST['supplier'];
$c = $_POST['date'];
$d = $_POST['product'];
$f = $_POST['qty'];
$result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
$result->bindParam(':userid', $d);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){	
	$g=$row['price'];
}
$h = $g*$f;
$k = $_POST['cgst'];
$s = $_POST['sgst'];
$t = $_POST['igst'];
$gc = $h*$k/100;
$gs = $h*$s/100;
$gi = $h*$t/100;

$n = $h+$gc+$gs+$gi;
$o = $_POST['discount'];
$p = $n-$o;
$date = date('d-m-Y');

$dmonth = date('F');
$dyear = date('Y');
$sp = $_POST['groupname'];
//edit qty
$sql = "UPDATE products 
        SET qty_left=qty_left-?
		WHERE product_code=?";
$q = $db->prepare($sql);
$q->execute(array($f,$d));
// query
	$sql = "INSERT INTO salesform (invoice,date,student,product,price,qty,amount,cgst,tamount,discount,total_amount,sgst,igst,cgstamt,sgstamt,igstamt) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p)";
	$q = $db->prepare($sql);
	$q->execute(array(':a'=>$a,':b'=>$date,':c'=>$b,':d'=>$d,':e'=>$g,':f'=>$f,':g'=>$h,':h'=>$k,':i'=>$n,':j'=>$o,':k'=>$p,':l'=>$s,':m'=>$t,':n'=>$gc,':o'=>$gs,':p'=>$gi));
	header("location:sales.php?invoice=$a&groupname=$sp");


?>