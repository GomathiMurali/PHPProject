<?php
session_start();
include('connect.php');

$a = $_POST['invoice'];
$b = $_POST['date'];
$c = $_POST['supplier'];
$d = $_POST['date_delivered'];
$e = $_POST['product'];
$f = $_POST['qty'];
//$status = $_POST['status'];
$result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
$result->bindParam(':userid', $e);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){	
	$g=$row['cost'];
}
$h=$g*$f;
$j = $_POST['stinno'];
$k = $_POST['vatper'];
$gc = $g*$k/100;
$lc = $g-$gc;
$l = $lc*$f;
$m = $gc*$f;
$n = $l+$m;
$o = $_POST['paydate'];
$dstatus = $_POST['dstatus'];
// query
$sql = "INSERT INTO purchases (invoice_number,date_order,suplier,date_deliver,p_name,qty,cost,stinno,vatper,amount,vat,total_amount,pay_date,d_status) VALUES (:a,:b,:c,:d,:e,:f,:h,:j,:k,:l,:m,:n,:o,:p)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':h'=>$lc,':j'=>$j,':k'=>$k,':l'=>$l,':m'=>$m,':n'=>$n,':o'=>$o,':p'=>$dstatus));



$z = $_POST['invoice'];
$x = $_POST['product'];
$y = $_POST['qty'];
$result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
$result->bindParam(':userid', $x);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){	
	$asasa=$row['cost'];
}

//edit qty
$sql = "UPDATE products 
        SET qty_left=qty_left+?
		WHERE product_code=?";
$q = $db->prepare($sql);
$q->execute(array($f,$e));

$w=$asasa*$y;

$date = date('d-m-Y');
$dmonth = date('F');
$dyear = date('Y');

// query
$sql = "INSERT INTO purchases_item (name,qty,cost,invoice,date,supplier,stinno,vatper,amount,vat,total_amount,month,year,d_status) VALUES (:x,:y,:w,:z,:u,:o,:p,:q,:r,:s,:t,:n,:m,:l)";
$q = $db->prepare($sql);
$q->execute(array(':x'=>$x,':y'=>$y,':w'=>$lc,':z'=>$a,':u'=>$b,':o'=>$c,':p'=>$j,':q'=>$k,':r'=>$l,':s'=>$m,':t'=>$n,':n'=>$dmonth,':m'=>$dyear,':l'=>$dstatus));
header("location: purchase.php?invoice=$a&name=$c");
?>