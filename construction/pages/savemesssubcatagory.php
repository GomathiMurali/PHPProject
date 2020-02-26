<?php
session_start();
include('connect.php');
$a = $_POST['name'];
$sql = "INSERT INTO messsubcatagory (mess_subcatagory) VALUES (?)";
$q = $db->prepare($sql);
$q->execute(array($a));
header("location: messsubcatagory.php");
?>