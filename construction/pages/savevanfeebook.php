<?php
session_start();
include('connect.php');

$a = $_POST['omt1'];
$b = $_POST['omt2'];
$c = $_POST['oct1'];
$d = $_POST['oct2'];
$e = $_POST['okt1'];
$f = $_POST['okt2'];
$g = $_POST['comt1'];
$h = $_POST['comt2'];
$i = $_POST['coct1'];
$j = $_POST['coct2'];
$k = $_POST['cokt1'];
$l = $_POST['cokt2'];

$m = $a-$g;
$n = $b-$h;
$o = $c-$i;
$p = $d-$j;
$q = $e-$k;
$r = $f-$l;
$s = $_POST['year'];

//
$sql = "INSERT INTO vanfee (year,malarterm1,malarterm2,cbseterm1,cbseterm2,kidzterm1,kidzterm2,comt1,comt2,coct1,coct2,cokt1,cokt2) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m)";
$ql = $db->prepare($sql);
$ql->execute(array(':a'=>$s,':b'=>$m,':c'=>$n,':d'=>$o,':e'=>$p,':f'=>$q,':g'=>$r,':h'=>$g,':i'=>$h,':j'=>$i,':k'=>$j,':l'=>$k,':m'=>$l));
header("location:home.php");



?>