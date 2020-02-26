<?php
session_start();
include('connect.php');
$a = $_POST['name'];
$b = $_POST['date'];
$c = $_POST['description'];
$d = $_POST['amount'];
$e = $_POST['sc'];
$f = 'Paid';
$gg = $_POST['trans'];
$hh = $_POST['bank'];
$ii = $_POST['school'];
$k = $_POST['income_id'];
$bill_id = $k;
$income_idd = $_POST['income_idd'];
$g = -$d;
$ff="";
$m=0;

if($a=="Vehicle Loan" || $a=="loan from others")
{
	$sql = "INSERT INTO expense (expense_id,catagory_name,date,description,amount,subcatagory,trans,bank,school) VALUES (?,?,?,?,?,?,?,?,?)";
	$q = $db->prepare($sql);
	$q->execute(array($k,$a,$b,$c,$d,$e,$gg,$hh,$ii));
	
	$datetime 	= 	date('d-m-Y-h-i-s-a');
	$bill_name	=	"Expense Bill"; 
	$bill_name_id	=	$bill_name.'-'.$bill_id;
				
	$partsaddrow = $_POST['partsaddrow'];

	mkdir("Uploadexpense/Expense Bill/".$bill_name_id, 0777);

	for($ii=0;$ii<=$partsaddrow;$ii++)
	{
		include_once('connect-db.php');
		/*  Start Forecast File Attachment File Upload Function     */

		$info = pathinfo($_FILES['bill_file'.$ii]['name']);
		$ext = $info['extension']; 	
		$newname = $bill_name_id.$ii."-".$datetime.".".$ext; 

		$targets = 'Uploadexpense/Expense Bill/'.$bill_name_id.'/'.$newname;

		$bill_file='Uploadexpense/Expense Bill/'.$bill_name_id.'/'.$newname;
		if($bill_file!="")
		{
		move_uploaded_file( $_FILES['bill_file'.$ii]['tmp_name'], $targets);
			
		/*  End Forecast Attachment File Upload Function     */ 
		
		$query="INSERT INTO `expense_file`(`expense_id`, `bill`) VALUES ('$k','$bill_file')";

		$res=mysql_query($query,$connection);
		}
	}
	
	$ssa="INSERT INTO `loanentry`(expense_id,`school`, `account`, `date`, `description`, `amount`, `debit_amount`, `balance`, `accname`, `accno`) VALUES (?,?,?,?,?,?,?,?,?,?)";
	$qa = $db->prepare($ssa);
	$qa->execute(array($k,$a,$e,$b,$c,$ff,$d,$g,$e,$e));
	
	if($gg=='Bank') {
	$ss="INSERT INTO bankentry (income_id,school,account,date,description,amount,debit_amount,balance,accname,accno,expense_id) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
	$q = $db->prepare($ss);
	$q->execute(array($m,$ii,$hh,$b,$c,$ff,$d,$g,$hh,$hh,$k));}
	header("location: expense.php");
}
else if($e=="Cash Remittance" && $gg=="Cash")
{
	$sqll = "INSERT INTO expense (expense_id,catagory_name,date,description,amount,subcatagory,trans,bank,school) VALUES (?,?,?,?,?,?,?,?,?)";
	$ql = $db->prepare($sqll);
	$ql->execute(array($k,$a,$b,$c,$d,$e,$gg,$ff,$ii));
	
	$datetime 	= 	date('d-m-Y-h-i-s-a');
	$bill_name	=	"Expense Bill"; 
	$bill_name_id	=	$bill_name.'-'.$bill_id;
				
	$partsaddrow = $_POST['partsaddrow'];

	mkdir("Uploadexpense/Expense Bill/".$bill_name_id, 0777);

	for($ii=0;$ii<=$partsaddrow;$ii++)
	{
		include_once('connect-db.php');
		/*  Start Forecast File Attachment File Upload Function     */

		$info = pathinfo($_FILES['bill_file'.$ii]['name']);
		$ext = $info['extension']; 	
		$newname = $bill_name_id.$ii."-".$datetime.".".$ext; 

		$targets = 'Uploadexpense/Expense Bill/'.$bill_name_id.'/'.$newname;

		$bill_file='Uploadexpense/Expense Bill/'.$bill_name_id.'/'.$newname;
		if($bill_file!="")
		{
		move_uploaded_file( $_FILES['bill_file'.$ii]['tmp_name'], $targets);
			
		/*  End Forecast Attachment File Upload Function     */ 
		
		$query="INSERT INTO `expense_file`(`expense_id`, `bill`) VALUES ('$k','$bill_file')";

		$res=mysql_query($query,$connection);
		}
	}
	
	$ssr="INSERT INTO bankentry (income_id,school,account,date,description,amount,debit_amount,balance,accname,accno,expense_id) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
	$qr = $db->prepare($ssr);
	$qr->execute(array($m,$ii,$hh,$b,$c,$d,$ff,$d,$hh,$hh,$k));
	header("location: expense.php");
}
else if($e=="Cash Withdrawal" && $gg=="Bank")
{
	$sqlr = "INSERT INTO income (income_id,catagory_name,date,description,amount,subcatagory,trans,bank,school) VALUES (?,?,?,?,?,?,?,?,?)";
	$qs = $db->prepare($sqlr);
	$qs->execute(array($income_idd,$a,$b,$c,$d,$e,$gg,$hh,$ii));
	
	$datetime 	= 	date('d-m-Y-h-i-s-a');
	$bill_name	=	"Expense Bill"; 
	$bill_name_id	=	$bill_name.'-'.$bill_id;
				
	$partsaddrow = $_POST['partsaddrow'];

	mkdir("Uploadexpense/Expense Bill/".$bill_name_id, 0777);

	for($ii=0;$ii<=$partsaddrow;$ii++)
	{
		include_once('connect-db.php');
		/*  Start Forecast File Attachment File Upload Function     */

		$info = pathinfo($_FILES['bill_file'.$ii]['name']);
		$ext = $info['extension']; 	
		$newname = $bill_name_id.$ii."-".$datetime.".".$ext; 

		$targets = 'Uploadexpense/Expense Bill/'.$bill_name_id.'/'.$newname;

		$bill_file='Uploadexpense/Expense Bill/'.$bill_name_id.'/'.$newname;
		if($bill_file!="")
		{
		move_uploaded_file( $_FILES['bill_file'.$ii]['tmp_name'], $targets);
			
		/*  End Forecast Attachment File Upload Function     */ 
		
		$query="INSERT INTO `expense_file`(`expense_id`, `bill`) VALUES ('$k','$bill_file')";

		$res=mysql_query($query,$connection);
		}
	}
	
	$ssrs="INSERT INTO bankentry (income_id,school,account,date,description,amount,debit_amount,balance,accname,accno) VALUES (?,?,?,?,?,?,?,?,?,?)";
	$qsr = $db->prepare($ssrs);
	$qsr->execute(array($income_idd,$ii,$hh,$b,$c,$ff,$d,$g,$hh,$hh));
	header("location: expense.php");
}
else if($e!="Cash Remittance" && $e!="Cash Withdrawal" && $a!="Vehicle Loan")
{
	if($e=="Mess Supervisor Advance")
	{
		$sql = "INSERT INTO expense (expense_id,catagory_name,date,description,amount,subcatagory,trans,bank,school) VALUES (?,?,?,?,?,?,?,?,?)";
		$q = $db->prepare($sql);
		$q->execute(array($k,$a,$b,$c,$d,$e,$gg,$hh,$ii));
		
		$ss="INSERT INTO `mess_supervisor`(`date`, `catagory`, `subcatagory`, `description`, `amount`, `debit_amount`, `trans`, `bank`, `school`, `status`, `expense_id`, `mess_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
		$q = $db->prepare($ss);
		$q->execute(array($b,$a,$e,$c,$d,$m,$gg,$hh,$ii,'advance_amount',$k,$ff));
		
		if($gg=='Bank') {
		$ss="INSERT INTO bankentry (income_id,school,account,date,description,amount,debit_amount,balance,accname,accno,expense_id) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		$q = $db->prepare($ss);
		$q->execute(array($m,$ii,$hh,$b,$c,$ff,$d,$g,$hh,$hh,$k));}
		
		header("location: expense.php");
	}
	else if($e!="Mess Supervisor Advance")
	{
		$sql = "INSERT INTO expense (expense_id,catagory_name,date,description,amount,subcatagory,trans,bank,school) VALUES (?,?,?,?,?,?,?,?,?)";
		$q = $db->prepare($sql);
		$q->execute(array($k,$a,$b,$c,$d,$e,$gg,$hh,$ii));
		
			/* Image Insert */
		$datetime 	= 	date('d-m-Y-h-i-s-a');
		$bill_name	=	"Expense Bill"; 
		$bill_name_id	=	$bill_name.'-'.$bill_id;
					
		$partsaddrow = $_POST['partsaddrow'];
		
		$ct="Uploadexpense/Expense Bill/".$bill_name_id;
		if(!is_dir($ct)){
		mkdir("Uploadexpense/Expense Bill/".$bill_name_id, 0777);
		}
		for($ii=0;$ii<=$partsaddrow;$ii++)
		{
			include_once('connect-db.php');
			/*  Start Forecast File Attachment File Upload Function     */

			$info = pathinfo($_FILES['bill_file'.$ii]['name']);
			$ext = $info['extension']; 	
			$newname = $bill_name_id.$ii."-".$datetime.".".$ext; 

			$targets = 'Uploadexpense/Expense Bill/'.$bill_name_id.'/'.$newname;

			$bill_file='Uploadexpense/Expense Bill/'.$bill_name_id.'/'.$newname;
			move_uploaded_file( $_FILES['bill_file'.$ii]['tmp_name'], $targets);
				
			/*  End Forecast Attachment File Upload Function     */ 
			if($bill_file!="")
			{
			$query="INSERT INTO `expense_file`(`expense_id`, `bill`) VALUES ('$k','$bill_file')";

			$res=mysql_query($query,$connection) or die ("could not insert record2".mysql_error());
			}
		}
	
		//update bank
		if($gg=='Bank') {
		$ss="INSERT INTO bankentry (income_id,school,account,date,description,amount,debit_amount,balance,accname,accno,expense_id) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		$q = $db->prepare($ss);
		$q->execute(array($m,$ii,$hh,$b,$c,$ff,$d,$g,$hh,$hh,$k));}
		header("location: expense.php");
	}
}
else
{
	echo "<script>alert('Please Put correct entry');</script>";
	header("location: expense.php");
}

?>