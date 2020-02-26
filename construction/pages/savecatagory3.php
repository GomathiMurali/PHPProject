<?php
session_start();
include('connect.php');
$a = $_POST['name'];
$sql = "INSERT INTO catagory3 (catagory_name) VALUES (?)";
$q = $db->prepare($sql);
$q->execute(array($a));
header("location: catagory3.php");
?>