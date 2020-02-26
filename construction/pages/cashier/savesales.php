
<?php
session_start();
include('connect.php');
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = $_POST['date'];
$d = $_POST['ptype'];
$e = $_POST['tamount'];

$pamount = $_POST['p_amount'];
$cname = $_POST['cname'];
$vat= $_POST['tvat'];

$date = date('m-d-Y');

$dmonth = date('F');
$dyear = date('Y');
$g = $_POST['tvatper'];
$h = $_POST['btype'];
$i = $_POST['tcharge'];
$j = $_POST['tdiscount'];
$h = $e+$i-$j;

if($d=='credit') {
	$f = $_POST['due'];
	$sql = "INSERT INTO sales (invoice_number,cashier,date,type,total_amount,due_date,name,month,year,balance,p_amount,vat,vatper,btype,tcharge,tdiscount) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:k,:j,:l,:m,:n,:o,:p)";
	$q = $db->prepare($sql);
	$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$h,':f'=>$f,':g'=>$cname,':h'=>$dmonth,':i'=>$dyear,':k'=>$e,':j'=>$pamount,':l'=>$vat,':m'=>$g,':n'=>$h,':o'=>$i,':p'=>$j));
	header("location: preview.php?invoice=$a");
	exit();
}
if($d=='cash') {
	$f = $_POST['cash'];
	$sql = "INSERT INTO sales (invoice_number,cashier,date,type,total_amount,cash,name,month,year,p_amount,vat,vatper,btype,tcharge,tdiscount) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:k,:j,:m,:n,:o,:p)";
	$q = $db->prepare($sql);
	$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$h,':f'=>$f,':g'=>$cname,':h'=>$dmonth,':i'=>$dyear,':k'=>$pamount,':j'=>$vat,':m'=>$g,':n'=>$h,':o'=>$i,':p'=>$j));
	header("location: preview.php?invoice=$a");
	exit();
}
// query
?>