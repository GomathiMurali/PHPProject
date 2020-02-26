<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
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
if($f=="Pending")
{
	$sk = "UPDATE mess_supervisor
		SET date=?, catagory=?, subcatagory=?, description=?, amount=?, debit_amount=?, trans=?, bank=?, school=?
		WHERE mess_id=?";
	$qq = $db->prepare($sk);
	$qq->execute(array($b,$a,$e,$c,$d,$t,$h,$i,$g,$id));
	
		/* Image Insert */
	$datetime 	= 	date('d-m-Y-h-i-s-a');
	$bill_name	=	"Mess"; 
	$bill_name_id	=	$bill_name.'-'.$bill_id;
				
	$partsaddrow = $_POST['partsaddrow'];
	
	$ct="Uploadmess/Mess/".$bill_name_id;
	if(!is_dir($ct)){
	mkdir("Uploadmess/Mess/".$bill_name_id, 0777);
	}
	for($ii=0;$ii<=$partsaddrow;$ii++)
	{
		include_once('connect-db.php');
		/*  Start Forecast File Attachment File Upload Function     */

		$info = pathinfo($_FILES['bill_file'.$ii]['name']);
		$ext = $info['extension']; 	
		$newname = $bill_name_id.$ii."-".$datetime.".".$ext; 

		$targets = 'Uploadmess/Mess/'.$bill_name_id.'/'.$newname;

		$bill_file='Uploadmess/Mess/'.$bill_name_id.'/'.$newname;
		move_uploaded_file( $_FILES['bill_file'.$ii]['tmp_name'], $targets);
			
		/*  End Forecast Attachment File Upload Function     */ 
		if($bill_file!="")
		{
		$query="INSERT INTO `mess_file`(`mess_id`, `bill`) VALUES ('$bill_id','$bill_file')";

		$res=mysql_query($query,$connection) or die ("could not insert record2".mysql_error());
		}
	}
header("location: messpurchase.php");
}
else if($f=="Paid")
{
		$sk = "UPDATE mess_supervisor
			SET date=?, catagory=?, subcatagory=?, description=?, amount=?, debit_amount=?, trans=?, bank=?, school=?
			WHERE mess_id=?";
		$qq = $db->prepare($sk);
		$qq->execute(array($b,$a,$e,$c,$t,$d,$h,$i,$g,$id));
	/* else if($h=="Bank")
	{
			$sql = "UPDATE expensepending
				SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, bank=?, school=?
				WHERE pending_id=?";
			$q = $db->prepare($sql);
			$q->execute(array($a,$b,$c,$d,$e,$i,$g,$id));
			
			$sk = "UPDATE mess_supervisor
			SET date=?, supervisor_name=?, debit_amount=?, bank=?, school=?
			WHERE pending_id=?";
			$qq = $db->prepare($sk);
			$qq->execute(array($b,$c,$d,$i,$g,$id));
	} */
header("location: messpurchase.php");
}
else
{
echo "<script>alert('Please Put Valid Entry');</script>";
header("location: messpurchase.php");
}
?>