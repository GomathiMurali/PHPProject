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
$g = $_POST['trans'];
$h = $_POST['bank'];
$i = $_POST['school'];
$pp = $_POST['pp'];
$bill_id = $id;
$ff="";
$kk=-$d;
$q=0;
// query
/* $sql = "UPDATE expense
        SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?
		WHERE ex_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$id)); */
//pp -> previous
if($g=="Bank" && $pp=="Bank")
{
	$sql = "UPDATE expense
			SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, trans=?, bank=?, school=?
			WHERE expense_id=?";
	$q = $db->prepare($sql);
	$q->execute(array($a,$b,$c,$d,$e,$g,$h,$i,$id));
	
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
		if($bill_file!="")
		{
		move_uploaded_file( $_FILES['bill_file'.$ii]['tmp_name'], $targets);
			
		/*  End Forecast Attachment File Upload Function     */ 
		
		$query="INSERT INTO `expense_file`(`expense_id`, `bill`) VALUES ('$id','$bill_file')";

		$res=mysql_query($query,$connection);
		}
	}
	
	
	$sk = "UPDATE bankentry
			SET school=?, account=?, date=?, description=?, amount=?, debit_amount=?, balance=?, accname=?, accno=?
			WHERE expense_id=?";
	$qq = $db->prepare($sk);
	$qq->execute(array($i,$h,$b,$c,$ff,$d,$kk,$h,$h,$id));
	if($e=="Mess Supervisor Advance")
	{
		$sk = "UPDATE mess_supervisor
			SET date=?, catagory=?, subcatagory=?, description=?, amount=?, debit_amount=?, trans=?, bank=?, school=?
			WHERE expense_id=?";
		$qq = $db->prepare($sk);
		$qq->execute(array($b,$a,$e,$c,$d,$q,$g,$h,$i,$id));
	}
}
else if($g=="Cash" && $pp=="Bank")
{
	$sql1 = "UPDATE expense
			SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, trans=?, bank=?, school=?
			WHERE expense_id=?";
	$q1 = $db->prepare($sql1);
	$q1->execute(array($a,$b,$c,$d,$e,$g,$h,$i,$id));
	
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
		if($bill_file!="")
		{
		move_uploaded_file( $_FILES['bill_file'.$ii]['tmp_name'], $targets);
			
		/*  End Forecast Attachment File Upload Function     */ 
		
		$query="INSERT INTO `expense_file`(`expense_id`, `bill`) VALUES ('$id','$bill_file')";

		$res=mysql_query($query,$connection);
		}
	}
	
	//$ss=mysql_query("delete from bankentry where income_id='$id'");
	$sk1 = "delete from bankentry WHERE expense_id=?";
	$qq1 = $db->prepare($sk1);
	$qq1->execute(array($id));
	
	if($e=="Mess Supervisor Advance")
	{
		$sk = "UPDATE mess_supervisor
			SET date=?, catagory=?, subcatagory=?, description=?, amount=?, debit_amount=?, trans=?, bank=?, school=?
			WHERE expense_id=?";
		$qq = $db->prepare($sk);
		$qq->execute(array($b,$a,$e,$c,$d,$q,$g,$h,$i,$id));
	}
}
else if($g=="Bank" && $pp=="Cash")
{
	$sql2 = "UPDATE expense
			SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, trans=?, bank=?, school=?
			WHERE expense_id=?";
	$q2 = $db->prepare($sql2);
	$q2->execute(array($a,$b,$c,$d,$e,$g,$h,$i,$id));
	$ss2="INSERT INTO bankentry (income_id,school,account,date,description,amount,debit_amount,balance,accname,accno,expense_id) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
	$q3 = $db->prepare($ss2);
	$q3->execute(array($q,$i,$h,$b,$c,$ff,$d,$kk,$h,$h,$id));
	
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
		if($bill_file!="")
		{
		move_uploaded_file( $_FILES['bill_file'.$ii]['tmp_name'], $targets);
			
		/*  End Forecast Attachment File Upload Function     */ 
		
		$query="INSERT INTO `expense_file`(`expense_id`, `bill`) VALUES ('$id','$bill_file')";

		$res=mysql_query($query,$connection);
		}
	}
	
	if($e=="Mess Supervisor Advance")
	{
		$sk = "UPDATE mess_supervisor
			SET date=?, catagory=?, subcatagory=?, description=?, amount=?, debit_amount=?, trans=?, bank=?, school=?
			WHERE expense_id=?";
		$qq = $db->prepare($sk);
		$qq->execute(array($b,$a,$e,$c,$d,$q,$g,$h,$i,$id));
	}
}
else if($g=="Cash" && $pp=="Cash")
{
	$sql3 = "UPDATE expense
			SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, trans=?, bank=?, school=?
			WHERE expense_id=?";
	$q4 = $db->prepare($sql3);
	$q4->execute(array($a,$b,$c,$d,$e,$g,$h,$i,$id));
	
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
		if($bill_file!="")
		{
		move_uploaded_file( $_FILES['bill_file'.$ii]['tmp_name'], $targets);
			
		/*  End Forecast Attachment File Upload Function     */ 
		
		$query="INSERT INTO `expense_file`(`expense_id`, `bill`) VALUES ('$id','$bill_file')";

		$res=mysql_query($query,$connection);
		}
	}
	
	if($e=="Mess Supervisor Advance")
	{
		$sk = "UPDATE mess_supervisor
			SET date=?, catagory=?, subcatagory=?, description=?, amount=?, debit_amount=?, trans=?, bank=?, school=?
			WHERE expense_id=?";
		$qq = $db->prepare($sk);
		$qq->execute(array($b,$a,$e,$c,$d,$q,$g,$h,$i,$id));
	}
}
//if($g=='Cash' && $pp=='Cash')
header("location: expense.php");

?>