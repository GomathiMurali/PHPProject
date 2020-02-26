<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['year'];
$b = $_POST['date'];
$c = $_POST['malarterm1'];
$d = $_POST['malarterm2'];
$e = $_POST['cbseterm1'];
$f = $_POST['cbseterm2'];
$g = $_POST['kidzterm1'];
$h = $_POST['kidzterm2'];
// query
$sql = "UPDATE hostelfee
        SET year=?, date=?, malarterm1=?, malarterm2=?, cbseterm1=?, cbseterm2=?, kidzterm1=?, kidzterm2=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$id));
header("location: hostelfees.php");

?>