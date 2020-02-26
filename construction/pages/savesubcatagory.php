<?php
session_start();
include('connect.php');
$a = $_POST['name'];
$sql = "INSERT INTO subcatagory (catagory_name) VALUES (?)";
$q = $db->prepare($sql);
$q->execute(array($a));
header("location: subcategory.php");
?>