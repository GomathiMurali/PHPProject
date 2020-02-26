<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$sno = $_POST['sno'];
$date = $_POST['date'];
$monor = $_POST['monor'];
$binder = $_POST['binder'];
$plumber = $_POST['plumber'];
$painter = $_POST['painter'];
$others = $_POST['others'];
$remarks = $_POST['remarks'];
//$i = $_POST['total'];

// query
$sql = "UPDATE addgroup2 
        SET sno=?,
        date=?,
        monor=?,
        binder=?,
        plumber=?,
        painter=?,
        others=?,
        remarks=?
        

		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($sno,$date,$monor,$binder,$plumber,$painter,$others,$remarks,$id));
header("location: uom.php");

?>




