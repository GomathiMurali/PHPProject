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
$ff="";
// query
/* $sql = "UPDATE income
        SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, trans=?, bank=?
		WHERE in_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$id)); */

/* $ss=mysql_query("select trans from income where in_id='$id'");
$k=mysql_fetch_array($ss);
$prev=$k['trans']; */
if($g=="Bank" && $pp=="Bank")
{
	
	$sql = "UPDATE income
			SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, trans=?, bank=?, school=?
			WHERE in_id=?";
	$q = $db->prepare($sql);
	$q->execute(array($a,$b,$c,$d,$e,$g,$h,$i,$id));
	$sk = "UPDATE bankentry
			SET school=?, account=?, date=?, description=?, amount=?, debit_amount=?, balance=?, accname=?, accno=?
			WHERE income_id=?";
	$qq = $db->prepare($sk);
	$qq->execute(array($i,$h,$b,$c,$d,$ff,$d,$h,$h,$id));
}
else if($g=="Cash" && $pp=="Bank")
{
	$sql1 = "UPDATE income
			SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, trans=?, bank=?, school=?
			WHERE in_id=?";
	$q1 = $db->prepare($sql1);
	$q1->execute(array($a,$b,$c,$d,$e,$g,$h,$i,$id));
	
	//$ss=mysql_query("delete from bankentry where income_id='$id'");
	$sk1 = "delete from bankentry WHERE income_id=?";
	$qq1 = $db->prepare($sk1);
	$qq1->execute(array($id));
}
else if($g=="Bank" && $pp=="Cash")
{
	$sql2 = "UPDATE income
			SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, trans=?, bank=?, school=?
			WHERE in_id=?";
	$q2 = $db->prepare($sql2);
	$q2->execute(array($a,$b,$c,$d,$e,$g,$h,$i,$id));
	$ss2="INSERT INTO bankentry (income_id,school,account,date,description,amount,debit_amount,balance,accname,accno) VALUES (?,?,?,?,?,?,?,?,?,?)";
	$q3 = $db->prepare($ss2);
	$q3->execute(array($id,$i,$h,$b,$c,$d,$ff,$d,$h,$h));
}
else if($g=="Cash" && $pp=="Cash")
{
	$sql3 = "UPDATE income
			SET catagory_name=?, date=?, description=?, amount=?, subcatagory=?, trans=?, bank=?, school=?
			WHERE in_id=?";
	$q4 = $db->prepare($sql3);
	$q4->execute(array($a,$b,$c,$d,$e,$g,$h,$i,$id));
}
//if($g=='Cash' && $pp=='Cash')
header("location: income.php");

?>