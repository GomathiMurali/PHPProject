<?php
session_start();
include('connect.php');
$a = $_POST['fname'];
$e = $_POST['mname'];
$f = $_POST['lname'];
$b = $_POST['address'];
$c = $_POST['phone'];
$d = $_POST['memno'];
$g = $_POST['group'];
$h = $_POST['gstno'];
$i = $_POST['bank'];
$j = $_POST['gsttype'];
$k = $_POST['panno'];
$l = $_POST['cname'];
$m = $_POST['mobile'];
$n = $_POST['email'];
$o = $_POST['emailcc'];
$p = $_POST['accno'];
$r = $_POST['branch'];
$s = $_POST['ifsc'];
// query
$sql = "INSERT INTO customer (first_name,address,contact,membership_number,last_name,middle_name,customer_name,groupname,gstno,bank,gsttype,panno,cname,mobile,email,emailcc,accno,branch,ifsc) VALUES (:a,:b,:c,:d,:e,:f,:h,:i,:j,:k,:l,:m,:n,:o,:p,:q,:r,:s,:t)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$f,':f'=>$e,':h'=>$a,':i'=>$g,':j'=>$h,':k'=>$i,':l'=>$j,':m'=>$k,':n'=>$l,':o'=>$m,':p'=>$n,':q'=>$o,':r'=>$p,':s'=>$r,':t'=>$s));
header("location: customer.php");


?>