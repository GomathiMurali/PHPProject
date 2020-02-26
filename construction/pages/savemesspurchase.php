<?php
session_start();
include('connect.php');

$a = $_POST['name'];
$b = $_POST['date'];
$c = $_POST['description'];
$d = $_POST['amount'];
$e = $_POST['sc'];
$f = $_POST['status'];
$g = $_POST['trans'];
$h = $_POST['bank'];
$i = $_POST['school'];
$bill_id = $_POST['mess_id'];
$mess_id= $_POST['mess_id'];
$gg="Credited";
$ii="";
$t=0;
$tt=-$d;
$gk="Credit";

if($f=="Pending")
{
		$sql = "INSERT INTO `mess_supervisor`(`date`, `catagory`, `subcatagory`, `description`, `amount`, `debit_amount`, `trans`, `bank`, `school`, `status`, `expense_id`, `mess_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
		$q = $db->prepare($sql);
		$q->execute(array($b,$a,$e,$c,$d,$t,$g,$h,$i,$f,$t,$mess_id));
		
		$datetime 	= 	date('d-m-Y-h-i-s-a');
		$bill_name	=	"Mess"; 
		$bill_name_id	=	$bill_name.'-'.$bill_id;
					
		$partsaddrow = $_POST['partsaddrow'];

		mkdir("Uploadmess/Mess/".$bill_name_id, 0777);

		for($ii=0;$ii<=$partsaddrow;$ii++)
		{
			include_once('connect-db.php');
			/*  Start Forecast File Attachment File Upload Function     */

			$info = pathinfo($_FILES['bill_file'.$ii]['name']);
			$ext = $info['extension']; 	
			$newname = $bill_name_id.$ii."-".$datetime.".".$ext; 

			$targets = 'Uploadmess/Mess/'.$bill_name_id.'/'.$newname;

			$bill_file='Uploadmess/Mess/'.$bill_name_id.'/'.$newname;
			if($bill_file!="")
			{
			move_uploaded_file( $_FILES['bill_file'.$ii]['tmp_name'], $targets);
				
			/*  End Forecast Attachment File Upload Function     */ 
			
			$query="INSERT INTO `mess_file`(`mess_id`, `bill`) VALUES ('$mess_id','$bill_file')";

			$res=mysql_query($query,$connection);
			}
		}
	header("location: messpurchase.php");
}
else if($f=="Paid")
{
		$sql = "INSERT INTO `mess_supervisor`(`date`, `catagory`, `subcatagory`, `description`, `amount`, `debit_amount`, `trans`, `bank`, `school`, `status`, `expense_id`, `mess_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
		$q = $db->prepare($sql);
		$q->execute(array($b,$a,$e,$c,$t,$d,$g,$h,$i,$f,$t,$mess_id));
		header("location: messpurchase.php");
}
else
{
echo "<script>alert('Please Put Valid Entry');</script>";
header("location: messpurchase.php");
}
?>