<?php
session_start();
include('connect.php');
$a = $_POST['name'];
$b = $_POST['rate'];
$sql = "INSERT INTO print (catagory_name) VALUES (?)";
$q = $db->prepare($sql);
$q->execute(array($a));
header("location: catagory4.php");
?>