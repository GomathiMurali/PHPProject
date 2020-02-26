<?php
session_start();
include('connect.php');

$a = $_POST['name'];
$b = $_POST['date'];
$c = $_POST['description'];
$d = $_POST['amount'];
$e = $_POST['sc'];
$f = $_POST['status'];
$id = $_POST['income_id'];
$bill_id = $_POST['pending_id'];
$ggg = $_POST['trans'];
$ff = $_POST['bank'];
$iii = $_POST['school'];
$gg="Credited";
$ii="";
$t=0;
$tt=-$d;
$gk="Credit";

if($f=="Pending")
{
	$sql = "INSERT INTO expensepending (pending_id,catagory_name,date,description,amount,subcatagory,status,trans,bank,school,paidamount) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
	$q = $db->prepare($sql);
	$q->execute(array($bill_id,$a,$b,$c,$d,$e,$f,$ggg,$ff,$iii,$t));
	
/* 	$sqll = "INSERT INTO expense (expense_id,catagory_name,date,description,amount,subcatagory,trans,bank,school,pending_id) VALUES (?,?,?,?,?,?,?,?,?,?)";
	$ql = $db->prepare($sqll);
	$ql->execute(array($id,$a,$b,$c,$d,$e,$gk,$ff,$iii,$bill_id)); */

	$datetime 	= 	date('d-m-Y-h-i-s-a');
	$bill_name	=	"Bill"; 
	$bill_name_id	=	$bill_name.'-'.$bill_id;
				
	$partsaddrow = $_POST['partsaddrow'];

	mkdir("Uploads/Bill/".$bill_name_id, 0777);

	for($ii=0;$ii<=$partsaddrow;$ii++)
	{
		include_once('connect-db.php');
		/*  Start Forecast File Attachment File Upload Function     */

		$info = pathinfo($_FILES['bill_file'.$ii]['name']);
		$ext = $info['extension']; 	
		$newname = $bill_name_id.$ii."-".$datetime.".".$ext; 

		$targets = 'Uploads/Bill/'.$bill_name_id.'/'.$newname;

		$bill_file='Uploads/Bill/'.$bill_name_id.'/'.$newname;
		if($bill_file!="")
		{
		move_uploaded_file( $_FILES['bill_file'.$ii]['tmp_name'], $targets);
			
		/*  End Forecast Attachment File Upload Function     */ 
		
		$query="INSERT INTO `bill_file`(`pending_id`, `bill_attach`) VALUES ('$bill_id','$bill_file')";

		$res=mysql_query($query,$connection);
		}
	}
	//header("Location: expensepending.php?no=".$c."&frm=".$frm."&too=".$too);
	header("location: expensepending.php");
}
else if($f=="Paid")
{
		if($ggg=="Cash")
		{
		$sql = "INSERT INTO expensepending (pending_id,catagory_name,date,description,amount,subcatagory,status,trans,bank,school,paidamount) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		$q = $db->prepare($sql);
		$q->execute(array($bill_id,$a,$b,$c,$t,$e,$f,$ggg,$ff,$iii,$d));
		
		$sqll = "INSERT INTO expense (expense_id,catagory_name,date,description,amount,subcatagory,trans,bank,school,pending_id) VALUES (?,?,?,?,?,?,?,?,?,?)";
		$ql = $db->prepare($sqll);
		$ql->execute(array($id,$a,$b,$c,$d,$e,$ggg,$ff,$iii,$bill_id));
		}
		else if($ggg=="Bank")
		{
			$sql = "INSERT INTO expensepending (pending_id,catagory_name,date,description,amount,subcatagory,status,trans,bank,school,paidamount) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
			$q = $db->prepare($sql);
			$q->execute(array($bill_id,$a,$b,$c,$t,$e,$f,$ggg,$ff,$iii,$d));
			
			$sqll = "INSERT INTO expense (expense_id,catagory_name,date,description,amount,subcatagory,trans,bank,school,pending_id,credit_type) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
			$ql = $db->prepare($sqll);
			$ql->execute(array($id,$a,$b,$c,$d,$e,$ggg,$ff,$iii,$bill_id,$gg));
			
			$ssr="INSERT INTO bankentry (income_id,school,account,date,description,amount,debit_amount,balance,accname,accno,expense_id,pending_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
			$qr = $db->prepare($ssr);
			$qr->execute(array($t,$iii,$ff,$b,$c,$t,$d,$tt,$ff,$ff,$id,$bill_id));
		}
	header("location: expensepending.php");
}
else
{
echo "<script>alert('Please Put Valid Entry');</script>";
header("location: expensepending.php");
}
?>