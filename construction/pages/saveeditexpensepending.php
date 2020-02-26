<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
/* $from1 = $_POST['from1'];
$to1 = $_POST['to1']; */
$a = $_POST['name'];
$b = $_POST['date'];
$c = $_POST['description'];
$d = $_POST['amount'];
$e = $_POST['sc'];
$f = $_POST['status'];
$g = $_POST['school'];
$h = $_POST['trans'];
$i = $_POST['bank'];
$bill_id = $id;
$t=0;
$tt=-$d;
$oldamount = $_POST['oldamount'];
$bal = $_POST['bal'];
if($f=="Pending")
{
		$sql = "UPDATE expensepending
				SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, school=?
				WHERE pending_id=?";
		$q = $db->prepare($sql);
		$q->execute(array($a,$b,$c,$d,$e,$g,$id));
		/* $sql = "UPDATE expense
				SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, school=?
				WHERE pending_id=?";
		$q = $db->prepare($sql);
		$q->execute(array($a,$b,$c,$d,$e,$g,$id)); */
		
		/* Image Insert */
		$datetime 	= 	date('d-m-Y-h-i-s-a');
		$bill_name	=	"Bill"; 
		$bill_name_id	=	$bill_name.'-'.$bill_id;
					
		$partsaddrow = $_POST['partsaddrow'];
		
		$ct="Uploads/Bill/".$bill_name_id;
		if(!is_dir($ct)){
		mkdir("Uploads/Bill/".$bill_name_id, 0777);
		}
		for($ii=0;$ii<=$partsaddrow;$ii++)
		{
			include_once('connect-db.php');
			/*  Start Forecast File Attachment File Upload Function     */

			$info = pathinfo($_FILES['bill_file'.$ii]['name']);
			$ext = $info['extension']; 	
			$newname = $bill_name_id.$ii."-".$datetime.".".$ext; 

			$targets = 'Uploads/Bill/'.$bill_name_id.'/'.$newname;

			$bill_file='Uploads/Bill/'.$bill_name_id.'/'.$newname;
			move_uploaded_file( $_FILES['bill_file'.$ii]['tmp_name'], $targets);
				
			/*  End Forecast Attachment File Upload Function     */ 
			if($bill_file!="")
			{
			$query="INSERT INTO `bill_file`(`pending_id`, `bill_attach`) VALUES ('$bill_id','$bill_file')";

			$res=mysql_query($query,$connection) or die ("could not insert record2".mysql_error());
			}
		}
	//header("Location: expensepending.php?no=".$c."&frm=".$from1."&too=".$to1);
	header("location: expensepending.php");
}
else if($f=="Paid")
{
	if($h=="Cash")
	{
			$sql = "UPDATE expensepending
				SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, school=?
				WHERE pending_id=?";
			$q = $db->prepare($sql);
			$q->execute(array($a,$b,$c,$d,$e,$g,$id));
			
			$sql = "UPDATE expense
				SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, school=?
				WHERE pending_id=?";
			$q = $db->prepare($sql);
			$q->execute(array($a,$b,$c,$d,$e,$g,$id));
		header("location: expensepending.php");
	}
	else if($h=="Bank")
	{
			$sql = "UPDATE expensepending
				SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, bank=?, school=?
				WHERE pending_id=?";
			$q = $db->prepare($sql);
			$q->execute(array($a,$b,$c,$d,$e,$i,$g,$id));
			
			$sql = "UPDATE expense
				SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, bank=?, school=?
				WHERE pending_id=?";
			$q = $db->prepare($sql);
			$q->execute(array($a,$b,$c,$d,$e,$i,$g,$id));
			
			$sql = "UPDATE bankentry
				SET school=?, account=?, date=?, description=?, amount=?, debit_amount=?, balance=?, accname=?, accno=?
				WHERE pending_id=?";
			$q = $db->prepare($sql);
			$q->execute(array($g,$i,$b,$c,$t,$d,$tt,$i,$i,$id));
	}
header("location: expensepending.php");
}
else
{
echo "<script>alert('Please Put Valid Entry');</script>";
header("location: expensepending.php");
}
?>