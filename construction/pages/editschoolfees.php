<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM schoolfee WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>


	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">




<br>
<br>
<br>
<form action="saveeditschoolfees.php" method="post" class = "form-group">
<div id="ac">
<input type="hidden" class = "form-control" name="memi" value="<?php echo $id; ?>" />
<span>Year : </span><input type="text" class = "form-control"  name="year" value="<?php echo $row['year']; ?>" />
<span>Date : </span><input type="text" class = "form-control"  name="date" value="<?php echo $row['date']; ?>" />
<span>Malar Term-I : </span><input type="text" class = "form-control"  name="malarterm1" value="<?php echo $row['malarterm1']; ?>" />

<span>Malar Term-II : </span><input type="text" class = "form-control"  name="malarterm2" value="<?php echo $row['malarterm2']; ?>" />
<span>CBSE Term-I : </span><input type="text" class = "form-control"  name="cbseterm1" value="<?php echo $row['cbseterm1']; ?>" />
<span>CBSE Term-II : </span><input type="text" class = "form-control"  name="cbseterm2" value="<?php echo $row['cbseterm2']; ?>" />
<span>Kidz Term-I : </span><input type="text" class = "form-control"  name="kidzterm1" value="<?php echo $row['kidzterm1']; ?>" />
<span>Kidz Term-II : </span><input type="text" class = "form-control"  name="kidzterm2" value="<?php echo $row['kidzterm2']; ?>" />



<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" value="save" class = "form-control" />
</div>
</form>
<?php
}
?>